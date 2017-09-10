<?php
?>
<div>
    <ul>
        <li>
            <?= $this->Html->link(__('Check-in Entries'), ['controller' => 'entries', 'action' => 'checkin']) ?>
        </li>
        <li>
            <?= $this->Html->link(__('Manage Flights'), ['controller' => 'flights', 'action' => 'index', 'prefix' => 'staff']) ?>
        </li>

    </ul>
</div>