<?php ?>

<?= $this->element('EntryScript') ?>

    <div class="page-header">
        <h2><?= __('Edit Entry')?></h2>
    </div>

<?= $this->element('EntryForm', ['submitText' => __('Update')]) ?>
