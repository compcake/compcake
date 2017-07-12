<?php
/**
  * @var \App\View\AppView $this
  */
use Cake\Core\Configure;
?>
<div class="page-header">
    <h2><?= __('Create an Account') ?></h2>
</div>
<div class="form-group">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <?php
            echo $this->Form->input('email');
            echo $this->Form->input('password');
            echo $this->Form->input('confirm_password',
                [ 'type' => 'password', 'label' => 'Confirm Password', 'required' => true ]);
            echo $this->Form->input('first_name');
            echo $this->Form->input('last_name');
            echo $this->Form->input('address1');
            echo $this->Form->input('address2');
            echo $this->Form->input('address3');
            echo $this->Form->input('city');
            echo $this->Form->input('province', [ 'label' => 'State / Province' ]);
            echo $this->Form->input('country', [ 'value' => 'United States']);
            echo $this->Form->input('postcode', [ 'label' => 'ZIP / Postal Code' ]);
            echo $this->Form->input('aha_number', [ 'label' => 'AHA Member ID' ]);
            echo $this->Form->input('bjcp', [ 'id' => 'bjcpid', 'label' => 'BJCP ID' ]);
            echo $this->Form->input('judge', [ 'label' => 'Interested in Judging?' ]);
            echo $this->Form->input('steward', [ 'label' => 'Interested in Stewarding?' ]);
            echo $this->Form->input('staff', [ 'label' => 'Interested in Volunteering?' ]);
        ?>
    </fieldset>
    <?= $this->Recaptcha->display() ?>
    <?= $this->Form->button(__('Register'), ['type' => 'submit', 'class' => 'btn btn-primary submitBtn']) ?>
    <?= $this->Form->end() ?>
</div>
