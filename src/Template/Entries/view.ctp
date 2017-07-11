<?php
/**
  * @var \App\View\AppView $this
  */
use Cake\Routing\Router;
use \Cake\Core\Configure;

echo $this->element('EntryViewScript');

$scoresheet = Configure::read('show_results') && !empty($entry->scoresheet) ?
    $this->Html->link(__('Click to Download'), ['controller' => 'entries', 'action' => 'download', $entry->id]) :
    'none';
$entryData = [
    [__('Entry Number'), $this->Number->format($entry->id)],
    [__('Name'), h($entry->name)],
    [__('Description'), h($entry->description)],
    [__('Special Ingredients'), h($entry->special_ingredients)],
    [__('Honey'), h($entry->honey)],
    [__('Fruit'), h($entry->fruit)],
    [__('Strength'), h($entry->strength)],
    [__('Carbonation'), h($entry->carbonation)],
    [__('Sweetness'), h($entry->sweetness)],
    [__('Style'), '<span class="bjcp">' . h($entry->style) . '</span>'],
    [__('Paid?'), $entry->paid ? __('Y') : __('N')],
    [__('Judging Number'), $this->Number->format($entry->judge_number)],
    [__('Score'), Configure::read('show_results') && $entry->score > 0? $this->Number->format($entry->score) : '-'],
    [__('Pushed to Second Round?'), Configure::read('show_results') && $entry->pushed ? __('Y') : __('N')],
    [__('Place'), Configure::read('show_results') && $entry->place > 0? $this->Number->format($entry->place) : '-'],
    [__('Scoresheet'), $scoresheet],
];
$back = '<span class="glyphicon glyphicon-chevron-left">&nbsp;</span>' . __('Back to Entries');

?>
<div class="entries">
    <div class="page-header">
        <h2><?= h($entry->name) ?></h2>
    </div>
    <table class="table">
        <tbody>
            <?= $this->Html->tableCells($entryData) ?>
        </tbody>
    </table>
    <div>
        <?= $this->Form->button($back,
            [
                'type' => 'button',
                'class' => 'btn btn-primary',
                'onclick' => 'location.href=\'' .
                    Router::url(['controller' => 'entries', 'action' => 'index']) .
                    '\''
            ]);
        ?>
    </div>
</div>
