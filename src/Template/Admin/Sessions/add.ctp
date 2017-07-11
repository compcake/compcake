<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Sessions'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Locations'), ['controller' => 'Locations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Location'), ['controller' => 'Locations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Flights'), ['controller' => 'Flights', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Flight'), ['controller' => 'Flights', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Judges'), ['controller' => 'Judges', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Judge'), ['controller' => 'Judges', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Staff'), ['controller' => 'Staff', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Staff'), ['controller' => 'Staff', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Stewards'), ['controller' => 'Stewards', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Steward'), ['controller' => 'Stewards', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="sessions form large-9 medium-8 columns content">
    <?= $this->Form->create($session) ?>
    <fieldset>
        <legend><?= __('Add Session') ?></legend>
        <?php
            echo $this->Form->input('location_id', ['options' => $locations]);
            echo $this->Form->input('d');
            echo $this->Form->input('is_bos');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
