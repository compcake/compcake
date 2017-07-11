<?php ?>

<?= $this->element('EntryScript') ?>

    <div class="page-header">
        <h2><?= __('New Entry')?></h2>
    </div>

<?= $this->element('EntryForm', ['submitText' => __('Create')]) ?>
