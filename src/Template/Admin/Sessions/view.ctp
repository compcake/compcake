<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Session'), ['action' => 'edit', $session->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Session'), ['action' => 'delete', $session->id], ['confirm' => __('Are you sure you want to delete # {0}?', $session->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Sessions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Session'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Locations'), ['controller' => 'Locations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Location'), ['controller' => 'Locations', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Flights'), ['controller' => 'Flights', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Flight'), ['controller' => 'Flights', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Judges'), ['controller' => 'Judges', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Judge'), ['controller' => 'Judges', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Staff'), ['controller' => 'Staff', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Staff'), ['controller' => 'Staff', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Stewards'), ['controller' => 'Stewards', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Steward'), ['controller' => 'Stewards', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="sessions view large-9 medium-8 columns content">
    <h3><?= h($session->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Location') ?></th>
            <td><?= $session->has('location') ? $this->Html->link($session->location->name, ['controller' => 'Locations', 'action' => 'view', $session->location->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($session->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('D') ?></th>
            <td><?= h($session->d) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Bos') ?></th>
            <td><?= $session->is_bos ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Flights') ?></h4>
        <?php if (!empty($session->flights)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Session Id') ?></th>
                <th scope="col"><?= __('Steward Id') ?></th>
                <th scope="col"><?= __('Round') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($session->flights as $flights): ?>
            <tr>
                <td><?= h($flights->id) ?></td>
                <td><?= h($flights->session_id) ?></td>
                <td><?= h($flights->steward_id) ?></td>
                <td><?= h($flights->round) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Flights', 'action' => 'view', $flights->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Flights', 'action' => 'edit', $flights->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Flights', 'action' => 'delete', $flights->id], ['confirm' => __('Are you sure you want to delete # {0}?', $flights->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Judges') ?></h4>
        <?php if (!empty($session->judges)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Session Id') ?></th>
                <th scope="col"><?= __('Role') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($session->judges as $judges): ?>
            <tr>
                <td><?= h($judges->id) ?></td>
                <td><?= h($judges->user_id) ?></td>
                <td><?= h($judges->session_id) ?></td>
                <td><?= h($judges->role) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Judges', 'action' => 'view', $judges->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Judges', 'action' => 'edit', $judges->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Judges', 'action' => 'delete', $judges->id], ['confirm' => __('Are you sure you want to delete # {0}?', $judges->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Staff') ?></h4>
        <?php if (!empty($session->staff)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Volunteer Id') ?></th>
                <th scope="col"><?= __('Session Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($session->staff as $staff): ?>
            <tr>
                <td><?= h($staff->id) ?></td>
                <td><?= h($staff->volunteer_id) ?></td>
                <td><?= h($staff->session_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Staff', 'action' => 'view', $staff->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Staff', 'action' => 'edit', $staff->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Staff', 'action' => 'delete', $staff->id], ['confirm' => __('Are you sure you want to delete # {0}?', $staff->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Stewards') ?></h4>
        <?php if (!empty($session->stewards)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Volunteer Id') ?></th>
                <th scope="col"><?= __('Session Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($session->stewards as $stewards): ?>
            <tr>
                <td><?= h($stewards->id) ?></td>
                <td><?= h($stewards->volunteer_id) ?></td>
                <td><?= h($stewards->session_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Stewards', 'action' => 'view', $stewards->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Stewards', 'action' => 'edit', $stewards->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Stewards', 'action' => 'delete', $stewards->id], ['confirm' => __('Are you sure you want to delete # {0}?', $stewards->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
