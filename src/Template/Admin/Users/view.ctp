<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="users view large-9 medium-8 columns content">
    <h3><?= h($user->first_name) . " " . h($user->last_name) ?></h3>
    <table class="table">
        <tr>
            <th scope="row"><?= __('User ID') ?></th>
            <td><?= h($user->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($user->email) ?></td>
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
            <th scope="row"><?= __('State / Province') ?></th>
            <td><?= h($user->province) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Country') ?></th>
            <td><?= h($user->country) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ZIP / Postal Code') ?></th>
            <td><?= h($user->postcode) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('AHA Number') ?></th>
            <td><?= h($user->aha_number) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('BJCP ID') ?></th>
            <td><?= h($user->bjcp) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Club') ?></th>
            <td><?= h($user->club) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Interested in Judging?') ?></th>
            <td><?= $user->judge ? __('Yes') : __('No') ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Interested in Stewarding?') ?></th>
            <td><?= $user->steward ? __('Yes') : __('No') ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Interested in Volunteering?') ?></th>
            <td><?= $user->staff ? __('Yes') : __('No') ?></td>
        </tr>
    </table>
    <div>
        <?php if (!empty($user->roles)): ?>
        <h3><?= __('User Roles') ?></h3>
        <ul>
            <?php foreach ($user->roles as $role): ?>
            <li><?= h($role->role) ?></li>
            <?php endforeach; ?>
        </ul>
        <?php endif; ?>
    </div>
    <div>
        <?php if (!empty($user->entries)): ?>
            <h3><?= __('Registered Entries') ?></h3>
            <table class="table">
                <tr>
                    <th scope="col"><?= __('Name') ?></th>
                    <th scope="col"><?= __('Description') ?></th>
                    <th scope="col"><?= __('Style') ?></th>
                    <th scope="col"><?= __('Paid') ?></th>
                    <th scope="col"><?= __('Judge Number') ?></th>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
                <?php foreach ($user->entries as $entries): ?>
                    <tr>
                        <td><?= h($entries->name) ?></td>
                        <td><?= h($entries->description) ?></td>
                        <td><?= h($entries->style) ?></td>
                        <td><?= h($entries->paid) ?></td>
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
</div>
