<?php
use Cake\Routing\Router;

$new = '<span class="glyphicon glyphicon-plus-sign">&nbsp;</span>' . __('New Flight');
?>
<div class="page-header">
    <h2><?= __('Flights') ?></h2>
</div>
<div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('session_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('round') ?></th>
                <th scope="col"><?= $this->Paginator->sort('entries') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($flights as $flight): ?>
            <tr>
                <td><?= $this->Number->format($flight->id) ?></td>
                <td><?= $flight->has('session') ? $this->Html->link($flight->session->id,
                        ['controller' => 'Sessions', 'action' => 'view', 'prefix' => null, $flight->session->id]) : '' ?></td>
                <td><?= $this->Number->format($flight->round) ?></td>
                <td>
                    <?php foreach ($flight->entries as $entry): ?>
                        <?= $entry->id . " " ?>
                    <?php endforeach; ?>
                </td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $flight->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $flight->id], ['confirm' => __('Are you sure you want to delete # {0}?', $flight->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
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
    <?= $this->Form->button($new,
        [
            'type' => 'button',
            'class' => 'btn btn-primary',
            'onclick' => 'location.href=\'' .
                Router::url(['controller' => 'flights', 'action' => 'add', 'prefix' => 'staff']) .
                '\''
        ]);
    ?>
</div>
