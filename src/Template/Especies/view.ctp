<div class="especies view large-9 medium-8 columns content">
    <h3><?= h($especie->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Nome') ?></th>
            <td><?= h($especie->nome) ?></td>
        </tr>
        <tr>
            <th><?= __('Descricao') ?></th>
            <td><?= h($especie->descricao) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($especie->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Categorias Cultivos') ?></h4>
        <?php if (!empty($especie->categorias_cultivos)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Nome') ?></th>
                <th><?= __('Descricao') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($especie->categorias_cultivos as $categoriasCultivos): ?>
            <tr>
                <td><?= h($categoriasCultivos->id) ?></td>
                <td><?= h($categoriasCultivos->nome) ?></td>
                <td><?= h($categoriasCultivos->descricao) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'CategoriasCultivos', 'action' => 'view', $categoriasCultivos->id]) ?>

                    <?= $this->Html->link(__('Edit'), ['controller' => 'CategoriasCultivos', 'action' => 'edit', $categoriasCultivos->id]) ?>

                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'CategoriasCultivos', 'action' => 'delete', $categoriasCultivos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $categoriasCultivos->id)]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
</div>
