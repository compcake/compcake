<?php
/**
  * @var \App\View\AppView $this
  */
$locationData = array();
$locationData[] = [__('Address'), h($location->address1)];
if ($location->address2 !== '') {
    $locationData[] = [__('Address (cont)'), h($location->address2)];
}
$locationData[] = [__('City'), h($location->city)];
$locationData[] = [__('State'), h($location->state)];
$locationData[] = [__('ZIP'), h($location->zipcode)];
$locationData[] = [__('URL'), $this->Html->link(h($location->url), $location->url)];
$locationData[] = [__('Is a Dropoff Location?'), $location->isdropoff ? __('Y') : __('N')];
$locationData[] = [__('Is a Shipping Location?'), $location->isdshipping ? __('Y') : __('N')];
$locationData[] = [__('Google Maps'), $this->Html->link(__('Click to View'),
        'https://www.google.com/maps/place/' .
        h($location->address1) . '+' .
        h($location->state) . '+' .
        h($location->zipcode), ['target' => '_blank'])];
$back = '<span class="glyphicon glyphicon-chevron-left">&nbsp;</span>' . __('Back');

?>
<div class="locations">
    <div class="page-header">
        <h2><?= h($location->name) ?></h2>
    </div>
    <table class="table">
        <tbody>
            <?= $this->Html->tableCells($locationData) ?>
        </tbody>
    </table>
    <div>
        <?= $this->Form->button($back,
            [
                'type' => 'button',
                'class' => 'btn btn-primary',
                'onclick' => 'window.history.back();'
            ]);
        ?>
    </div>
</div>
