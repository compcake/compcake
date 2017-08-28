<div class="page-header">
    <h2>Login</h2>
</div>
<div class="form-group">
<?php
echo $this->Form->create();
echo $this->Form->input('email');
echo $this->Form->input('password');
echo $this->Form->button('Login');
echo $this->Form->end();
?>
</div>
&nbsp;
<div class="well">
<?= __('Not yet registered? ') . $this->Html->link(__('Create an account'),
        ['action' => 'add']) . '<br/>'; ?>
<?= __('Forgotten password? ') . $this->Html->link(__('Reset password'),
        ['controller' => 'passwordresets', 'action' => 'add']); ?>
</div>