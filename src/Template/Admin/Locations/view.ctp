<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="locations view large-9 medium-8 columns content">
    <h3><?= h($location->name) ?></h3>
    <table class="table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($location->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Address1') ?></th>
            <td><?= h($location->address1) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Address2') ?></th>
            <td><?= h($location->address2) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('City') ?></th>
            <td><?= h($location->city) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('State') ?></th>
            <td><?= h($location->state) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Zipcode') ?></th>
            <td><?= h($location->zipcode) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Url') ?></th>
            <td><?= h($location->url) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($location->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Isdropoff') ?></th>
            <td><?= $location->isdropoff ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Isshipping') ?></th>
            <td><?= $location->isshipping ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div>
        <?php if (!empty($location->sessions)): ?>
        <h3><?= __('Judging Sessions at this Location') ?></h3>
        <table class="table">
            <tr>
                <th scope="col"><?= __('Date and Time') ?></th>
                <th scope="col"><?= __('Is BOS?') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($location->sessions as $sessions): ?>
            <tr>
                <td><?= h($sessions->d) ?></td>
                <td><?= $sessions->is_bos ? __('Y') : __('N') ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Sessions', 'action' => 'view', $sessions->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Sessions', 'action' => 'edit', $sessions->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Sessions', 'action' => 'delete', $sessions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sessions->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php else: ?>
            <p><b>No judging sessions are scheduled at this location.</b></p>
        <?php endif ?>
    </div>
</div>
