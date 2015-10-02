<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Categorias Cultivo'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Especies'), ['controller' => 'Especies', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Especie'), ['controller' => 'Especies', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="categoriasCultivos index large-9 medium-8 columns content">
    <h3><?= __('Categorias Cultivos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('nome') ?></th>
                <th><?= $this->Paginator->sort('descricao') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($categoriasCultivos as $categoriasCultivo): ?>
            <tr>
                <td><?= $this->Number->format($categoriasCultivo->id) ?></td>
                <td><?= h($categoriasCultivo->nome) ?></td>
                <td><?= h($categoriasCultivo->descricao) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $categoriasCultivo->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $categoriasCultivo->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $categoriasCultivo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $categoriasCultivo->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
