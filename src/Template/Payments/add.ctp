<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Payments'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Entries'), ['controller' => 'Entries', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Entry'), ['controller' => 'Entries', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="payments form large-9 medium-8 columns content">
    <?= $this->Form->create($payment) ?>
    <fieldset>
        <legend><?= __('Add Payment') ?></legend>
        <?php
            echo $this->Form->input('user_id', ['options' => $users, 'empty' => true]);
            echo $this->Form->input('qty');
            echo $this->Form->input('total');
            echo $this->Form->input('paymentid');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
