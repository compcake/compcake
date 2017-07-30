<?php
/**
  * @var \App\View\AppView $this
  */
use Cake\Routing\Router;

$newLocationUrl = Router::url(['action' => 'add']);
$newLocationBtn = '<button class="btn btn-primary" onclick="location.href=\'' . $newLocationUrl . '\'">' .
    '<span class="glyphicon glyphicon-plus">&nbsp;</span>New Location</button>';
?>
<div>
    <h3><?= __('Locations') ?></h3>
    <table  class="table">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('address1') ?></th>
                <th scope="col"><?= $this->Paginator->sort('address2') ?></th>
                <th scope="col"><?= $this->Paginator->sort('city') ?></th>
                <th scope="col"><?= $this->Paginator->sort('state') ?></th>
                <th scope="col"><?= $this->Paginator->sort('zipcode') ?></th>
                <th scope="col"><?= $this->Paginator->sort('url') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Dropoff Location?') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Shipping Location?') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($locations as $location): ?>
            <tr>
                <td><?= h($location->name) ?></td>
                <td><?= h($location->address1) ?></td>
                <td><?= h($location->address2) ?></td>
                <td><?= h($location->city) ?></td>
                <td><?= h($location->state) ?></td>
                <td><?= h($location->zipcode) ?></td>
                <td><?= h($location->url) ?></td>
                <td><?= $location->isdropoff ? __('Y') : __('N') ?></td>
                <td><?= $location->isshipping ? __('Y') : __('N') ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $location->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $location->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $location->id], ['confirm' => __('Are you sure you want to delete # {0}?', $location->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php if ($this->Paginator->hasPage(2)): ?>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
    <?php endif ?>
</div>
<?= $newLocationBtn ?>