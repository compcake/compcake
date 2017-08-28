<div class="page-header">
    <h2>Reset Password</h2>
</div>
<div class="form-group">
<?php
echo $this->Form->create();
echo $this->Form->input('password', [ 'type' => 'password', 'required' => true ]);
echo $this->Form->input('confirm_password',
    [ 'type' => 'password', 'label' => 'Confirm Password' ]);
echo $this->Form->input('token', [ 'type' => 'hidden', 'value' => $r->token ]);
echo $this->Form->button('Submit');
echo $this->Form->end();
?>
</div>