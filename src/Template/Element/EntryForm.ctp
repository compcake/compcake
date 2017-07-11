<?php
use Cake\Routing\Router;
?>

<div class="form-group">
    <?= $this->Form->create($entry) ?>
<fieldset>
    <?php
    $val = h($entry->style);
    echo $this->Form->input('name');
    echo $this->Form->input('description', ['label' => 'Description / Base Style']);
    echo $this->Form->input('style', ['type' => 'select', 'options' => [$val => $val], 'default' => $val]);
    ?>
    <div id="mead">
        <?= $this->Form->input('honey', ['label' => 'Varieties of Honey Used']) ?>
        <div class="radio">
            <b>Strength:</b><br/>
            <?= $this->Form->radio('strength',
                ['Hydromel' => 'Hydromel', 'Standard' => 'Standard', 'Sack' => 'Sack']) ?>
        </div>
    </div>
    <div id="cider">
        <?= $this->Form->input('fruit', ['label' => 'Varieties of Fruit Used']) ?>
    </div>
    <?= $this->Form->input('special_ingredients', ['label' => 'Special Ingredients (if applicable)']) ?>
    <div id="meadcider">
        <div class="radio">
            <b>Carbonation:</b><br/>
            <?= $this->Form->radio('carbonation',
                ['Still' => 'Still', 'Petillant' => 'Petillant', 'Sparkling' => 'Sparkling']) ?>
        </div>
        <div class="radio">
            <b>Sweetness:</b><br/>
            <?= $this->Form->radio('sweetness', ['Dry' => 'Dry', 'Medium' => 'Medium', 'Sweet' => 'Sweet']) ?>
        </div>
    </div>
</fieldset>
<?= $this->Form->button('<span class="glyphicon glyphicon-ok">&nbsp;</span>' . $submitText,
    [ 'type' => 'submit', 'class' => 'btn btn-primary' ]) ?>&nbsp;
<?= $this->Form->button('<span class="glyphicon glyphicon-remove">&nbsp;</span>' . __('Cancel'),
    [
        'type' => 'button',
        'class' => 'btn btn-danger',
        'onclick' => 'location.href=\'' .
            Router::url(['controller' => 'entries', 'action' => 'index']) .
            '\''
    ]);
?>
<?= $this->Form->end() ?>
</div>