<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Categorias Cultivo'), ['action' => 'edit', $categoriasCultivo->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Categorias Cultivo'), ['action' => 'delete', $categoriasCultivo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $categoriasCultivo->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Categorias Cultivos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Categorias Cultivo'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Especies'), ['controller' => 'Especies', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Especie'), ['controller' => 'Especies', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="categoriasCultivos view large-9 medium-8 columns content">
    <h3><?= h($categoriasCultivo->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Nome') ?></th>
            <td><?= h($categoriasCultivo->nome) ?></td>
        </tr>
        <tr>
            <th><?= __('Descricao') ?></th>
            <td><?= h($categoriasCultivo->descricao) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($categoriasCultivo->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Especies') ?></h4>
        <?php if (!empty($categoriasCultivo->especies)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Nome') ?></th>
                <th><?= __('Descricao') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($categoriasCultivo->especies as $especies): ?>
            <tr>
                <td><?= h($especies->id) ?></td>
                <td><?= h($especies->nome) ?></td>
                <td><?= h($especies->descricao) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Especies', 'action' => 'view', $especies->id]) ?>

                    <?= $this->Html->link(__('Edit'), ['controller' => 'Especies', 'action' => 'edit', $especies->id]) ?>

                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Especies', 'action' => 'delete', $especies->id], ['confirm' => __('Are you sure you want to delete # {0}?', $especies->id)]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
</div>
