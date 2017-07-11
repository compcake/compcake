<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="entries index large-9 medium-8 columns content">
    <h3><?= __('Entries') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id', 'Entry Number') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('description') ?></th>
                <th scope="col"><?= $this->Paginator->sort('special_ingredients') ?></th>
                <th scope="col"><?= $this->Paginator->sort('style') ?></th>
                <th scope="col"><?= $this->Paginator->sort('score') ?></th>
                <th scope="col"><?= $this->Paginator->sort('paid') ?></th>
                <th scope="col"><?= $this->Paginator->sort('scoresheet') ?></th>
                <th scope="col"><?= $this->Paginator->sort('judge_number') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($entries as $entry): ?>
            <tr>
                <td><?= $this->Number->format($entry->id) ?></td>
                <td><?= $entry->has('user') ? $this->Html->link($entry->user->id, ['controller' => 'Users', 'action' => 'view', $entry->user->id]) : '' ?></td>
                <td><?= h($entry->name) ?></td>
                <td><?= h($entry->description) ?></td>
                <td><?= h($entry->special_ingredients) ?></td>
                <td><?= h($entry->style) ?></td>
                <td><?= $this->Number->format($entry->score) ?></td>
                <td><?= h($entry->paid) ?></td>
                <td><?= h($entry->scoresheet) ?></td>
                <td><?= $this->Number->format($entry->judge_number) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View Details'), ['action' => 'view', $entry->id]) ?>
                    &nbsp;|&nbsp;
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $entry->id]) ?>
                    &nbsp;|&nbsp;
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $entry->id], ['confirm' => __('Are you sure you want to delete # {0}?', $entry->id)]) ?>
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
</div>
