<div class="ciclos view large-9 medium-8 columns content">
    <h3><?= h($ciclo->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Tanque') ?></th>
            <td><?= $ciclo->has('tanque') ? $this->Html->link($ciclo->tanque->id, ['controller' => 'Tanques', 'action' => 'view', $ciclo->tanque->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Status') ?></th>
            <td><?= $ciclo->has('status') ? $this->Html->link($ciclo->status->id, ['controller' => 'Status', 'action' => 'view', $ciclo->status->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($ciclo->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Povoamento Inicio') ?></th>
            <td><?= $this->Number->format($ciclo->povoamento_inicio) ?></td>
        </tr>
        <tr>
            <th><?= __('Data Inicio') ?></th>
            <td><?= h($ciclo->data_inicio) ?></tr>
        </tr>
        <tr>
            <th><?= __('Data Fim') ?></th>
            <td><?= h($ciclo->data_fim) ?></tr>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Especies Categorias Cultivos') ?></h4>
        <?php if (!empty($ciclo->especies_categorias_cultivos)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Categorias Cultivo Id') ?></th>
                <th><?= __('Especie Id') ?></th>
                <th><?= __('Ciclo Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($ciclo->especies_categorias_cultivos as $especiesCategoriasCultivos): ?>
            <tr>
                <td><?= h($especiesCategoriasCultivos->categorias_cultivo_id) ?></td>
                <td><?= h($especiesCategoriasCultivos->especie_id) ?></td>
                <td><?= h($especiesCategoriasCultivos->ciclo_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'EspeciesCategoriasCultivos', 'action' => 'view', $especiesCategoriasCultivos->categorias_cultivo_id]) ?>

                    <?= $this->Html->link(__('Edit'), ['controller' => 'EspeciesCategoriasCultivos', 'action' => 'edit', $especiesCategoriasCultivos->categorias_cultivo_id]) ?>

                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'EspeciesCategoriasCultivos', 'action' => 'delete', $especiesCategoriasCultivos->categorias_cultivo_id], ['confirm' => __('Are you sure you want to delete # {0}?', $especiesCategoriasCultivos->categorias_cultivo_id)]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Visitas') ?></h4>
        <?php if (!empty($ciclo->visitas)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Ciclo Id') ?></th>
                <th><?= __('Oxigenio Agua') ?></th>
                <th><?= __('Ionizacao Agua') ?></th>
                <th><?= __('Temperatura Agua') ?></th>
                <th><?= __('Largura Peixes') ?></th>
                <th><?= __('Peso Peixes') ?></th>
                <th><?= __('Data') ?></th>
                <th><?= __('Params Ideais Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($ciclo->visitas as $visitas): ?>
            <tr>
                <td><?= h($visitas->id) ?></td>
                <td><?= h($visitas->ciclo_id) ?></td>
                <td><?= h($visitas->oxigenio_agua) ?></td>
                <td><?= h($visitas->ionizacao_agua) ?></td>
                <td><?= h($visitas->temperatura_agua) ?></td>
                <td><?= h($visitas->largura_peixes) ?></td>
                <td><?= h($visitas->peso_peixes) ?></td>
                <td><?= h($visitas->data) ?></td>
                <td><?= h($visitas->params_ideais_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Visitas', 'action' => 'view', $visitas->id]) ?>

                    <?= $this->Html->link(__('Edit'), ['controller' => 'Visitas', 'action' => 'edit', $visitas->id]) ?>

                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Visitas', 'action' => 'delete', $visitas->id], ['confirm' => __('Are you sure you want to delete # {0}?', $visitas->id)]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
</div>
