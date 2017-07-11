<?php
/**
  * @var \App\View\AppView $this
  */
$header = __('Locations');
$tableHeader = [
    $this->Paginator->sort(__('Location')),
    $this->Paginator->sort(__('URL')),
    $this->Paginator->sort(__('Is a Dropoff Location?')),
    $this->Paginator->sort(__('Is a Shipping Location?')),
    __('Details'),
];
$tableRows = array();
foreach ($locations as $location) {
    $tableRows[] = [
        $this->Html->link(h($location->name),
            ['action' => 'view', $location->id]),
        $this->Html->link(h($location->url),
            $location->url),
        $location->isdropoff ? __('Y') : __('N'),
        $location->isshipping ? __('Y') : __('N'),
        $this->Html->link(__(''),
            ['action' => 'view', $location->id],
            ['class' => 'actions glyphicon glyphicon-eye-open']),
        ];
}
?>
<div class="locations">
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
