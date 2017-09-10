<?php
use Cake\Routing\Router;

?>
<div class="page-header">
    <h2><?= __('Flight ' . h($flight->id) . __(', round') . $this->Number->format($flight->round)) ?></h2>
</div>
<div>
    <div class="related">
        <?php if (!empty($flight->entries)): ?>
        <table class="table">
            <tr>
                <th scope="col"><?= __('Entry ID') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Special Ingredients') ?></th>
                <th scope="col"><?= __('Carbonation') ?></th>
                <th scope="col"><?= __('Sweetness') ?></th>
                <th scope="col"><?= __('Strength') ?></th>
                <th scope="col"><?= __('Honey') ?></th>
                <th scope="col"><?= __('Fruit') ?></th>
                <th scope="col"><?= __('Style') ?></th>
                <th scope="col"><?= __('Bin') ?></th>
            </tr>
            <?php foreach ($flight->entries as $entries): ?>
            <tr>
                <td><?= h($entries->id) ?></td>
                <td><?= h($entries->description) ?></td>
                <td><?= h($entries->special_ingredients) ?></td>
                <td><?= h($entries->carbonation) ?></td>
                <td><?= h($entries->sweetness) ?></td>
                <td><?= h($entries->strength) ?></td>
                <td><?= h($entries->honey) ?></td>
                <td><?= h($entries->fruit) ?></td>
                <td><?= h($entries->style) ?></td>
                <td><?= h($entries->bin) ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <?= $this->Form->button(__('Done'),
        [
            'type' => 'button',
            'class' => 'btn btn-primary',
            'onclick' => 'location.href=\'' .
                Router::url(['controller' => 'flights', 'action' => 'index', 'prefix' => 'staff']) .
                '\''
        ]);
    ?>

</div>
