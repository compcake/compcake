<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="entries view large-9 medium-8 columns content">
    <h3><?= h($entry->name) ?></h3>
    <table class="table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $this->Html->link(h($entry->user->first_name . " " . $entry->user->last_name),
                    ['controller' => 'Users', 'action' => 'view', $entry->user_id]) .
                    ' - ' . h($entry->user->club) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Entry Name') ?></th>
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
            <th scope="row"><?= __('Entry Number') ?></th>
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
