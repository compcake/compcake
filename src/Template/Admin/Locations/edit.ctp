<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="locations form large-9 medium-8 columns content">
    <?= $this->Form->create($location) ?>
    <fieldset>
        <legend><?= __('Edit Location') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('address1');
            echo $this->Form->input('address2');
            echo $this->Form->input('city');
            echo $this->Form->input('state');
            echo $this->Form->input('zipcode');
            echo $this->Form->input('url');
            echo $this->Form->input('isdropoff');
            echo $this->Form->input('isshipping');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
