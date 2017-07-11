<?php
use Cake\Core\Configure;
?>
<div class="jumbotron"><h1>Welcome to the <?= Configure::read('competition') ?> competition site!</h1>
    <p><?= Configure::read('intro_text') ?></p>
    <p>Entry registration is currently <?= Configure::read('accepting_entries') ? 'open' : 'closed' ?>.</p>
</div>
<div>
</div>