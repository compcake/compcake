<?php
/**
  * @var \App\View\AppView $this
  */
use Cake\Routing\Router;

$header = __('Your Profile');
$userTable = array();
foreach ($users as $user) {
    $userTable[] = ['Email', h($user->email)];
    $userTable[] = ['Name', h($user->name)];
    $userTable[] = ['Address', h($user->address1)];

    if ($user->address2 !== '') {
        $userTable[] = ['', h($user->address2)];
    }
    if ($user->address3 !== '') {
        $userTable[] = ['', h($user->address3)];
    }
    $userTable[] = ['City', h($user->city)];
    $userTable[] = ['State / Province', h($user->province)];
    $userTable[] = ['Country', h($user->country)];
    $userTable[] = ['ZIP / Postal Code', h($user->postcode)];
    $userTable[] = ['AHA Member ID', h($user->aha_number)];
    $userTable[] = ['Club Affiliation', h($user->affiliation)];
    $userTable[] = ['BJCP ID', h($user->bjcp)];
    $userTable[] = ['Judge?', $user->judge ? __('Y') : __('N')];
    $userTable[] = ['Steward?', $user->steward ? __('Y') : __('N')];
    $userTable[] = ['Volunteer?', $user->staff ? __('Y') : __('N')];
}
?>
<div class="page-header">
    <h2><?= $header ?></h2>
</div>
<div class="table">
    <table class="table">
        <tbody>
            <?= $this->Html->tableCells($userTable); ?>
        </tbody>
    </table>
    <?= $this->Form->button('<span class="glyphicon glyphicon-user">&nbsp;</span>' . __('Edit Profile'),
        [
            'type' => 'button',
            'class' => 'btn btn-primary',
            'onclick' => 'location.href=\'' .
                Router::url(['controller' => 'users', 'action' => 'edit', $user->id]) .
                '\''
        ]);
    ?>
</div>