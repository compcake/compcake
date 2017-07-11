<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Payment'), ['action' => 'edit', $payment->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Payment'), ['action' => 'delete', $payment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $payment->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Payments'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Payment'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Entries'), ['controller' => 'Entries', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Entry'), ['controller' => 'Entries', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="payments view large-9 medium-8 columns content">
    <h3><?= h($payment->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $payment->has('user') ? $this->Html->link($payment->user->id, ['controller' => 'Users', 'action' => 'view', $payment->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($payment->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Qty') ?></th>
            <td><?= $this->Number->format($payment->qty) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Total') ?></th>
            <td><?= $this->Number->format($payment->total) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Paymentid') ?></th>
            <td><?= $this->Number->format($payment->paymentid) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Entries') ?></h4>
        <?php if (!empty($payment->entries)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Special Ingredients') ?></th>
                <th scope="col"><?= __('Carbonation') ?></th>
                <th scope="col"><?= __('Sweetness') ?></th>
                <th scope="col"><?= __('Honey') ?></th>
                <th scope="col"><?= __('Fruit') ?></th>
                <th scope="col"><?= __('Strength') ?></th>
                <th scope="col"><?= __('Style') ?></th>
                <th scope="col"><?= __('Payment Id') ?></th>
                <th scope="col"><?= __('Score') ?></th>
                <th scope="col"><?= __('Pushed') ?></th>
                <th scope="col"><?= __('Place') ?></th>
                <th scope="col"><?= __('Scoresheet') ?></th>
                <th scope="col"><?= __('Judge Number') ?></th>
                <th scope="col"><?= __('Bin') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($payment->entries as $entries): ?>
            <tr>
                <td><?= h($entries->id) ?></td>
                <td><?= h($entries->user_id) ?></td>
                <td><?= h($entries->name) ?></td>
                <td><?= h($entries->description) ?></td>
                <td><?= h($entries->special_ingredients) ?></td>
                <td><?= h($entries->carbonation) ?></td>
                <td><?= h($entries->sweetness) ?></td>
                <td><?= h($entries->honey) ?></td>
                <td><?= h($entries->fruit) ?></td>
                <td><?= h($entries->strength) ?></td>
                <td><?= h($entries->style) ?></td>
                <td><?= h($entries->payment_id) ?></td>
                <td><?= h($entries->score) ?></td>
                <td><?= h($entries->pushed) ?></td>
                <td><?= h($entries->place) ?></td>
                <td><?= h($entries->scoresheet) ?></td>
                <td><?= h($entries->judge_number) ?></td>
                <td><?= h($entries->bin) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Entries', 'action' => 'view', $entries->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Entries', 'action' => 'edit', $entries->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Entries', 'action' => 'delete', $entries->id], ['confirm' => __('Are you sure you want to delete # {0}?', $entries->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
