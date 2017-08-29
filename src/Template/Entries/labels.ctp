<?php
/**
  * @var \App\View\AppView $this
  */
use Cake\Routing\Router;
use Cake\Core\Configure;

echo $this->element('PrintScript');

$entryData = [
    [Configure::read('competition')],
    [__('Entry Number'), $this->Number->format($entry->id)],
    [__('Name'), h($entry->name)],
    [__('Description'), h($entry->description)],
    [__('Special Ingredients'), h($entry->special_ingredients)],
    [__('Honey'), h($entry->honey)],
    [__('Fruit'), h($entry->fruit)],
    [__('Style'), h($entry->style)],
];
$backbtn = '<span class="glyphicon glyphicon-chevron-left">&nbsp;</span>' . __('Back to Entries');
$printbtn = '<span class="glyphicon glyphicon-print">&nbsp;</span>' . __('Print');
?>
<div class="entries">
    <div class="jumbotron">
        <h1><?= 'Instructions'?></h1>
        <?= __('Cut out labels and affix to each bottle using a rubber band. DO NOT USE TAPE!') ?>
        <?= __('If labels do not print, you need to enable popups for this website in your browser.') ?>
    </div>
    <div class="printable-area">
    <hr/>
    <table class="table">
        <tbody>
        <?= $this->Html->tableCells($entryData) ?>
        </tbody>
    </table>
    <hr/>
    <table class="table">
        <tbody>
        <?= $this->Html->tableCells($entryData) ?>
        </tbody>
    </table>
    <hr/>
    <table class="table">
        <tbody>
        <?= $this->Html->tableCells($entryData) ?>
        </tbody>
    </table>
    <hr/>
    <table class="table">
        <tbody>
        <?= $this->Html->tableCells($entryData) ?>
        </tbody>
    </table>
    <hr/>
    </div>
    <div>
        <?= $this->Form->button($backbtn,
            [
                'type' => 'button',
                'class' => 'btn btn-primary',
                'onclick' => 'location.href=\'' .
                    Router::url(['controller' => 'entries', 'action' => 'index']) .
                    '\''
            ]);
        ?>
        <?= $this->Form->button($printbtn,
            [
                'type' => 'button',
                'class' => 'btn btn-primary',
                'onclick' => 'printLabels()'
            ]);
        ?>
    </div>
</div>
