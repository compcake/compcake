<?php ?>

<div class="page-header">
    <h2><?= __('Check In Entry')?></h2>
</div>

<div class="form-group">
    <?= $this->Form->create() ?>
    <fieldset>
        <?= $this->Form->input('id', ['label' => 'Entry Number']) ?>
        <?= $this->Form->input('bin', ['label' => 'Entry Bin']) ?>
        <?= $this->Form->button('<span class="glyphicon glyphicon-ok">&nbsp;</span>' . __('Checkin Entry'),
            [ 'type' => 'submit', 'class' => 'btn btn-primary' ]) ?>
    </fieldset>
    <?= $this->Form->end() ?>
</div>