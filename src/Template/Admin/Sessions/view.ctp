<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div>
    <h3><?= __('Session: ') . h($session->id) ?></h3>
    <table class="table">
        <tr>
            <th scope="row"><?= __('Location') ?></th>
            <td><?= $session->has('location') ? $this->Html->link($session->location->name, ['controller' => 'Locations', 'action' => 'view', $session->location->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date and Time') ?></th>
            <td><?= h($session->d) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is BOS?') ?></th>
            <td><?= $session->is_bos ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
