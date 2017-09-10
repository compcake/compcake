<?php
use Cake\Routing\Router;
?>

<?= $this->element('EntryScript') ?>

<div class="page-header">
    <h2><?= __('New Flight')?></h2>
</div>

<div>
    <?php
    if (isset($flight)) {
        echo $this->Form->create($flight);
    } else {
        echo $this->Form->create(null, ['type' => 'get']);
    }
    ?>
    <fieldset>
        <?php
            if (isset($flight)) {
                echo $this->Form->input('session_id', ['options' => $sessions]);
                echo $this->Form->hidden('style');
                echo $this->Form->input('round');
                echo $this->Form->input('entries._ids', ['options' => $entries]);
                echo $this->Form->input('judges._ids', ['options' => $judges]);
            } else {
                echo $this->Form->input('style', ['type' => 'select']);
                echo $this->Form->input('session_id', ['options' => $sessions]);
            }
        ?>
    </fieldset>
    <?= $this->Form->button('<span class="glyphicon glyphicon-ok">&nbsp;</span>' . __('Submit'),
        [ 'type' => 'submit', 'class' => 'btn btn-primary' ]) ?>&nbsp;
    <?= $this->Form->button('<span class="glyphicon glyphicon-remove">&nbsp;</span>' . __('Cancel'),
        [
            'type' => 'button',
            'class' => 'btn btn-danger',
            'onclick' => 'location.href=\'' .
                Router::url(['controller' => 'flights', 'action' => 'index', 'prefix' => 'staff']) .
                '\''
        ]);
    ?>
    <?= $this->Form->end() ?>
</div>
