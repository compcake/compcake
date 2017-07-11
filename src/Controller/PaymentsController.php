<?php
namespace App\Controller;

use Cake\Network\Exception\NotFoundException;
use Cake\ORM\TableRegistry;
use Cake\Core\Configure;
use Cake\Routing\Router;
use PayPal\Api\Amount;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;

/**
 * Payments Controller
 *
 * @property \App\Model\Table\PaymentsTable $Payments
 */
class PaymentsController extends AppController
{
    /**
     * View method
     *
     * @param string|null $id Payment id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $payment = $this->Payments->get($id, [
            'contain' => ['Entries']
        ]);

        $this->set('payment', $payment);
        $this->set('_serialize', ['payment']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $uid = $this->Auth->user('id');
        $entriesTable = TableRegistry::get('Entries');
        $unpaidQuery = $entriesTable->find()->where(['user_id' => $uid, 'paid' => false]);
        $qty = $unpaidQuery->count();
        if ($qty == 0) {
            $this->Flash->success(__('You have no unpaid entries.'));
            return $this->redirect(['controller' => 'entries', 'action' => 'index']);
        }
        $total = Configure::read('entry_fee') * $qty;
        $payment = $this->Payments->newEntity();
        $payment = $this->Payments->patchEntity($payment,
            [
                'qty' => $qty,
                'total' => $total,
                'user_id' => $uid,
                'paymentid' => 0
            ]);
        if ($this->Payments->save($payment)) {
            /*
             * Successfully created a payment record. Mark all unpaid entries as 'belonging' to this
             * payment record, but do not mark them as paid yet -- that will happen after the
             * transaction has been completed.
             */
            $unpaidUpdate = $entriesTable->query();
            $unpaidUpdate->update()
                ->set(['payment_id' => $payment->id])
                ->where(['user_id' => $uid, 'paid' => false])
                ->execute();

            /*
             * Create a apiContext object and set up the payment transaction.
             */
            $apiContext = new \PayPal\Rest\ApiContext(
                new \PayPal\Auth\OAuthTokenCredential(
                    Configure::read('paypal_clientid'),
                    Configure::read('paypal_secret'))
            );
            $payer = new Payer();
            $payer->setPaymentMethod("paypal");
            $items = array();
            foreach ($unpaidQuery as $entry) {
                $item = new Item();
                $item->setName('Entry Fee')
                    ->setDescription($entry->name)
                    ->setCurrency('USD')
                    ->setQuantity(1)
                    ->setSku($entry->id)
                    ->setPrice(Configure::read('entry_fee'));
                $items[] = $item;
            }
            $itemList = new ItemList();
            $itemList->setItems($items);
            $amount = new Amount();
            $amount->setCurrency("USD")
                ->setTotal($total);
            $transaction = new Transaction();
            $transaction->setAmount($amount)
                ->setItemList($itemList)
                ->setDescription(Configure::read('competition'))
                ->setInvoiceNumber($payment->id);
            $redirectUrls = new RedirectUrls();
            $redirectUrls->setReturnUrl(Router::url(['action' => 'complete', $payment->id], true))
                ->setCancelUrl(Router::url(['action' => 'delete', $payment->id], true));
            $payment = new Payment();
            $payment->setIntent("sale")
                ->setPayer($payer)
                ->setRedirectUrls($redirectUrls)
                ->setTransactions(array($transaction));
            try {
                $payment->create($apiContext);
            } catch (Exception $ex) {
                $this->Flash->error(__('PayPal payment failed. Please try again later.'));
                return $this->redirect(['controller' => 'entries', 'action' => 'index']);
            }
            return $this->redirect($payment->getApprovalLink());
        } else {
            $this->Flash->error(__('A new payment transaction could not be created. Please try again.'));
            return $this->redirect(['controller' => 'entries', 'action' => 'index']);
        }
    }

    /**
     * Complete method
     *
     * Redirect callback from PayPal to complete a payment transaction.
     *
     * @param string|null $id Payment id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function complete($id = null)
    {
        $this->request->allowMethod(['get', 'complete']);
        $uid = $this->Auth->user('id');
        $entriesTable = TableRegistry::get('Entries');
        $payment = $this->Payments->get($id);
        if ($payment->user_id != $uid) {
            throw new NotFoundException;
        }
        $payment = $this->Payments->patchEntity($payment, ['paymentid' => $this->request->param('paymentId')]);
        $this->Payments->save($payment);
        $paidEntriesUpdate = $entriesTable->query();
        $paidEntriesUpdate->update()
            ->set(['paid' => true])
            ->where(['user_id' => $uid, 'payment_id' => $payment->id])
            ->execute();
        $this->Flash->success(__('Thank you for your payment!'));
        return $this->redirect(['controller' => 'entries', 'action' => 'index']);
    }

    /**
     * Delete method
     *
     * Redirect callback from PayPal to delete a payment if the transactions has been canceled.
     *
     * @param string|null $id Payment id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['get', 'delete']);
        $payment = $this->Payments->get($id);
        if ($payment->user_id != $this->Auth->user('id')) {
            throw new NotFoundException;
        }
        if ($payment->paymentid > 0) {
            $this->Flash->error(__('Cannot cancel a payment that has been processed.'));
        } else {
            if ($this->Payments->delete($payment)) {
                $this->Flash->success(__('The payment has been successfully canceled.'));
            } else {
                $this->Flash->error(__('The payment record was not be deleted, but the payment was canceled.'));
            }
        }
        return $this->redirect(['controller' => 'entries', 'action' => 'index']);
    }
}
