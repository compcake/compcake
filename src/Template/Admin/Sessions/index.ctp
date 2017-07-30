<?php
/**
  * @var \App\View\AppView $this
  */
use Cake\Routing\Router;

$newSessionUrl = Router::url(['action' => 'add']);
$newSessionBtn = '<button class="btn btn-primary" onclick="location.href=\'' . $newSessionUrl . '\'">' .
    '<span class="glyphicon glyphicon-plus">&nbsp;</span>New Judging Session</button>';
?>
<div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('location_id', __('Location')) ?></th>
                <th scope="col"><?= $this->Paginator->sort('d', __('Date and Time')) ?></th>
                <th scope="col"><?= $this->Paginator->sort('is_bos', __('Is BOS?')) ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($sessions as $session): ?>
            <tr>
                <td><?= $session->has('location') ? $this->Html->link($session->location->name, ['controller' => 'Locations', 'action' => 'view', $session->location->id]) : '' ?></td>
                <td><?= h($session->d) ?></td>
                <td><?= $session->is_bos ? __('Y') : __('N') ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $session->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $session->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $session->id], ['confirm' => __('Are you sure you want to delete # {0}?', $session->id)]) ?>
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
    <?= $newSessionBtn ?>
</div>
