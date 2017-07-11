<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="entries form large-9 medium-8 columns content">
    <?= $this->Form->create($entry) ?>
    <fieldset>
        <legend><?= __('Edit Entry') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('description');
            echo $this->Form->input('special_ingredients');
            echo $this->Form->input('style');
            echo $this->Form->input('paid');
            echo $this->Form->input('score');
            echo $this->Form->input('pushed');
            echo $this->Form->input('place');
            echo $this->Form->input('scoresheet');
            echo $this->Form->input('judge_number');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
