<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Entry'), ['action' => 'edit', $entry->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Entry'), ['action' => 'delete', $entry->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $entry->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Entries'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Entry'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Flights'), ['controller' => 'Flights', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Flight'), ['controller' => 'Flights', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="entries view large-9 medium-8 columns content">
    <h3><?= h($entry->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $this->Html->link($entry->user_id,
                    ['controller' => 'Users', 'action' => 'view', $entry->user_id]) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($entry->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($entry->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Special Ingredients') ?></th>
            <td><?= h($entry->special_ingredients) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Style') ?></th>
            <td><?= h($entry->style) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Scoresheet') ?></th>
            <td><?= h($entry->scoresheet) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($entry->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Score') ?></th>
            <td><?= $this->Number->format($entry->score) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Judge Number') ?></th>
            <td><?= $this->Number->format($entry->judge_number) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Paid') ?></th>
            <td><?= $entry->paid ? __('Y') : __('N'); ?></td>
        </tr>
    </table>
</div>
