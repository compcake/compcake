<?php
/**
  * @var \App\View\AppView $this
  */
use Cake\Routing\Router;
use Cake\Core\Configure;

echo $this->element('EntryViewScript');

$header = __('Entries');
$new = '<span class="glyphicon glyphicon-plus-sign">&nbsp;</span>' . __('New Entry');
$payment = '<span class="glyphicon glyphicon-usd">&nbsp;</span>' . __('Pay for Entries');

$tableHeader = [
    $this->Paginator->sort('id', __('Entry Number')),
    $this->Paginator->sort('name'),
    $this->Paginator->sort('description'),
    $this->Paginator->sort('special_ingredients'),
    $this->Paginator->sort('style'),
    __(''),
];
$tableRows = array();
foreach ($entries as $entry) {
    $deleteLink = '';
    if (!$entry->paid && empty($entry->score) && empty($entry->scoresheet)) {
        $deleteLink = '&nbsp;&nbsp;|&nbsp;&nbsp;' .
            $this->Form->postLink(__(' '),
                ['action' => 'delete', $entry->id],
                [
                    'class' => 'glyphicon glyphicon-trash',
                    'confirm' => __('Are you sure you want to delete entry {0}?', $entry->id)
                ]);
    }
    $editLink = '';
    if (Configure::read('accepting_entries')) {
        $editLink = '&nbsp;&nbsp;|&nbsp;&nbsp;' .
            $this->Html->link(__(''),
                ['action' => 'edit', $entry->id],
                ['class' => 'glyphicon glyphicon-pencil']);
    }
    $tableRows[] = [
        $this->Html->link($this->Number->format($entry->id),
            ['action' => 'view', $entry->id]),
        h($entry->name),
        h($entry->description),
        h($entry->special_ingredients),
        '<span class="bjcp">' . h($entry->style) . '</span>',
        $this->Html->link(__(''),
            ['action' => 'view', $entry->id],
            ['class' => 'glyphicon glyphicon-eye-open']) .
        $editLink .
        '&nbsp;&nbsp;|&nbsp;&nbsp;' .
        $this->Html->link(__(''),
            ['action' => 'labels', $entry->id],
            ['class' => 'glyphicon glyphicon-print']) .
        $deleteLink
    ];
}
?>
<div class="entries">
    <div class="page-header">
        <h2><?= $header ?></h2>
    </div>
    <table class="table">
        <thead>
            <?= $this->Html->tableHeaders($tableHeader) ?>
        </thead>
        <tbody>
            <?= $this->Html->tableCells($tableRows) ?>
        </tbody>
    </table>
    <div>
    <?php if (Configure::read('accepting_entries')): ?>
        <?= $this->Form->button($new,
            [
                'type' => 'button',
                'class' => 'btn btn-primary',
                'onclick' => 'location.href=\'' .
                    Router::url(['controller' => 'entries', 'action' => 'add']) .
                    '\''
            ]);
        ?>
    <?php endif ?>
    <?php if ($unpaidEntries): ?>
        <?= $this->Form->button($payment,
            [
                'type' => 'button',
                'class' => 'btn btn-primary',
                'onclick' => 'location.href=\'' .
                    Router::url(['controller' => 'payments', 'action' => 'add']) .
                    '\''
            ]);
        ?>
    <?php endif ?>
    </div>
    <?php if ($this->Paginator->hasPage(2)): ?>
    <div class="paginator">
        <p>
        <ul class="pagination">
            <li><?= $this->Paginator->prev('< ' . __('previous')) ?></li>
            <li><?= $this->Paginator->next(__('next') . ' >') ?></li>
        </ul>
        <?= $this->Paginator->numbers() ?>
        <br />
        <?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?>
        </p>
    </div>
    <?php endif ?>
</div>
