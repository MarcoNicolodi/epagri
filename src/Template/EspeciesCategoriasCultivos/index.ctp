<div class="especiesCategoriasCultivos index large-9 medium-8 columns content">
    <h3><?= __('Especies Categorias Cultivos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('categorias_cultivo_id') ?></th>
                <th><?= $this->Paginator->sort('especie_id') ?></th>
                <th><?= $this->Paginator->sort('ciclo_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($especiesCategoriasCultivos as $especiesCategoriasCultivo): ?>
            <tr>
                <td><?= $especiesCategoriasCultivo->has('categorias_cultivo') ? $this->Html->link($especiesCategoriasCultivo->categorias_cultivo->id, ['controller' => 'CategoriasCultivos', 'action' => 'view', $especiesCategoriasCultivo->categorias_cultivo->id]) : '' ?></td>
                <td><?= $especiesCategoriasCultivo->has('especie') ? $this->Html->link($especiesCategoriasCultivo->especie->id, ['controller' => 'Especies', 'action' => 'view', $especiesCategoriasCultivo->especie->id]) : '' ?></td>
                <td><?= $especiesCategoriasCultivo->has('ciclo') ? $this->Html->link($especiesCategoriasCultivo->ciclo->id, ['controller' => 'Ciclos', 'action' => 'view', $especiesCategoriasCultivo->ciclo->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $especiesCategoriasCultivo->categorias_cultivo_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $especiesCategoriasCultivo->categorias_cultivo_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $especiesCategoriasCultivo->categorias_cultivo_id], ['confirm' => __('Are you sure you want to delete # {0}?', $especiesCategoriasCultivo->categorias_cultivo_id)]) ?>
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
