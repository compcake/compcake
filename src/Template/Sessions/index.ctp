<?php
/**
  * @var \App\View\AppView $this
  */
use Cake\Routing\Router;

$header = __('Judging Sessions');
$userid = $this->request->session()->read('Auth.User.id');

$tableHead = [
    $this->Paginator->sort(__('Location')),
    $this->Paginator->sort(__('Date and Time')),
    $this->Paginator->sort(__('Registration')),
    __(''),
];

function dropdown($view, $session_id) {    // Dropdown button to sign up for a judging session
    $dropdownLinks = [
        $view->Html->link(__('As a Judge'), ['controller' => 'judges', 'action' => 'add', 'judge', $session_id]),
        $view->Html->link(__('As a Steward'), ['controller' => 'judges', 'action' => 'add', 'steward', $session_id]),
        $view->Html->link(__('As a Volunteer'), ['controller' => 'judges', 'action' => 'add', 'volunteer', $session_id]),
    ];
    $dropdownBegin =
        <<<HTML
    <div class="btn-group">
  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Register <span class="caret"></span>
  </button>
  <ul class="dropdown-menu">
HTML;
    $dropdownMiddle = '';
    $dropdownEnd =
        <<<HTML
      </ul>
</div>
HTML;
    foreach ($dropdownLinks as $link) {
        $dropdownMiddle .= '<li>' . $link . '</li>';
    }
    return $dropdownBegin . $dropdownMiddle . $dropdownEnd;
}

function judgesLookup($obj, $user_id, $session) {
    $judges = $session['judges'];
    foreach ($judges as $judge) {
        if ($judge->user_id === $user_id) {
            return $judge;
        }
    }
    return null;
}

function removeButton($obj, $judgeRecord)
{
    $url = Router::url(['controller' => 'judges', 'action' => 'delete', $judgeRecord->id]);
    $button = '<button class="btn btn-warning" onclick="location.href=\'' . $url . '\'">' .
        '<span class="glyphicon glyphicon-remove">&nbsp;</span>Remove</button>';
    return $button;
}

$tableRows = array();
foreach ($sessions as $session) {
    $location = $session->has('location') ?
        $this->Html->link(h($session->location->name),
            [
                'controller' => 'locations',
                'action' => 'view',
                $session->location->id
            ])
        : '';
    $judgeRecord = judgesLookup($this, $userid, $session);
    $tableRows[] = [
        $location,
        $session->d,
        $session->is_bos ?
            __('Best of Show Judging') :
            (empty($judgeRecord) ?
                dropdown($this, $session->id) : __('You are currently registered as a ' . $judgeRecord->role)),
        ($session->is_bos || empty($judgeRecord)) ?
            __('') :
            removeButton($this, $judgeRecord),
    ];
}
?>
<div class="sessions">
    <div class="page-header">
        <h2><?= $header ?></h2>
    </div>
    <table class="table">
        <thead>
            <?= $this->Html->tableHeaders($tableHead) ?>
        </thead>
        <tbody>
            <?= $this->Html->tableCells($tableRows) ?>
        </tbody>
    </table>
    <?php if ($this->Paginator->hasPage(2)): ?>
        <div class="paginator">
            <p>
            <ul class="pagination">
                <li><?= $this->Paginator->prev('< ' . __('previous')) ?></li>
                <li><?= $this->Paginator->next(__('next') . ' >') ?></li>
            </ul>
            <?= $this->Paginator->numbers() ?>
            <br />
            <?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?>
            </p>
        </div>
    <?php endif ?>
</div>
