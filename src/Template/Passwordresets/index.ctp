<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="passwordresets index large-9 medium-8 columns content">
    <h3><?= __('Passwordresets') ?></h3>
    <table class="table">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('token') ?></th>
                <th scope="col"><?= $this->Paginator->sort('expiration') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($passwordresets as $passwordreset): ?>
            <tr>
                <td><?= $this->Number->format($passwordreset->id) ?></td>
                <td><?= $passwordreset->has('user') ? $this->Html->link($passwordreset->user->id, ['controller' => 'Users', 'action' => 'view', $passwordreset->user->id]) : '' ?></td>
                <td><?= h($passwordreset->token) ?></td>
                <td><?= h($passwordreset->expiration) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $passwordreset->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $passwordreset->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $passwordreset->id], ['confirm' => __('Are you sure you want to delete # {0}?', $passwordreset->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
