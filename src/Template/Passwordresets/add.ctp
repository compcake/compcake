<div class="page-header">
    <h2>Password Reset</h2>
</div>
<div class="form-group">
    <?php
    echo $this->Form->create();
    echo $this->Form->input('email');
    echo $this->Form->button('Send Reset E-mail');
    echo $this->Form->end();
    ?>
</div>