<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Volunteers'), ['controller' => 'Volunteers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Volunteer'), ['controller' => 'Volunteers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Entries'), ['controller' => 'Entries', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Entry'), ['controller' => 'Entries', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Roles'), ['controller' => 'Roles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Role'), ['controller' => 'Roles', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="users view large-9 medium-8 columns content">
    <h3><?= h($user->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($user->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Password') ?></th>
            <td><?= h($user->password) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('First Name') ?></th>
            <td><?= h($user->first_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Last Name') ?></th>
            <td><?= h($user->last_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Address1') ?></th>
            <td><?= h($user->address1) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Address2') ?></th>
            <td><?= h($user->address2) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Address3') ?></th>
            <td><?= h($user->address3) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('City') ?></th>
            <td><?= h($user->city) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Province') ?></th>
            <td><?= h($user->province) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Country') ?></th>
            <td><?= h($user->country) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Postcode') ?></th>
            <td><?= h($user->postcode) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Aha Number') ?></th>
            <td><?= h($user->aha_number) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Volunteer') ?></th>
            <td><?= $user->has('volunteer') ? $this->Html->link($user->volunteer->id, ['controller' => 'Volunteers', 'action' => 'view', $user->volunteer->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($user->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Entries') ?></h4>
        <?php if (!empty($user->entries)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Special Ingredients') ?></th>
                <th scope="col"><?= __('Style') ?></th>
                <th scope="col"><?= __('Paid') ?></th>
                <th scope="col"><?= __('Score') ?></th>
                <th scope="col"><?= __('Pushed') ?></th>
                <th scope="col"><?= __('Place') ?></th>
                <th scope="col"><?= __('Scoresheet') ?></th>
                <th scope="col"><?= __('Judge Number') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->entries as $entries): ?>
            <tr>
                <td><?= h($entries->id) ?></td>
                <td><?= h($entries->user_id) ?></td>
                <td><?= h($entries->name) ?></td>
                <td><?= h($entries->description) ?></td>
                <td><?= h($entries->special_ingredients) ?></td>
                <td><?= h($entries->style) ?></td>
                <td><?= h($entries->paid) ?></td>
                <td><?= h($entries->score) ?></td>
                <td><?= h($entries->pushed) ?></td>
                <td><?= h($entries->place) ?></td>
                <td><?= h($entries->scoresheet) ?></td>
                <td><?= h($entries->judge_number) ?></td>
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
    <div class="related">
        <h4><?= __('Related Roles') ?></h4>
        <?php if (!empty($user->roles)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Role') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->roles as $roles): ?>
            <tr>
                <td><?= h($roles->id) ?></td>
                <td><?= h($roles->role) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Roles', 'action' => 'view', $roles->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Roles', 'action' => 'edit', $roles->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Roles', 'action' => 'delete', $roles->id], ['confirm' => __('Are you sure you want to delete # {0}?', $roles->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
