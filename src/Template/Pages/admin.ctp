<?php
?>
<div>
    <ul>
        <li>
        <?= $this->Html->link(__('Manage Users'), ['controller' => 'users', 'action' => 'index', 'prefix' => 'admin']) ?>
        </li>
        <li>
        <?= $this->html->link(__('Manage Entries'), ['controller' => 'entries', 'action' => 'index', 'prefix' => 'admin']) ?>
        </li>
        <li>
        <?= $this->html->link(__('Manage Locations'), ['controller' => 'locations', 'action' => 'index', 'prefix' => 'admin']) ?>
        </li>
        <li>
        <?= $this->html->link(__('Manage Sessions'), ['controller' => 'sessions', 'action' => 'index', 'prefix' => 'admin']) ?>
        </li>
    </ul>
</div>