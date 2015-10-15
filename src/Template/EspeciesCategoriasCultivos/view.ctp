<div class="especiesCategoriasCultivos view large-9 medium-8 columns content">
    <h3><?= h($especiesCategoriasCultivo->categorias_cultivo_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Categorias Cultivo') ?></th>
            <td><?= $especiesCategoriasCultivo->has('categorias_cultivo') ? $this->Html->link($especiesCategoriasCultivo->categorias_cultivo->id, ['controller' => 'CategoriasCultivos', 'action' => 'view', $especiesCategoriasCultivo->categorias_cultivo->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Especie') ?></th>
            <td><?= $especiesCategoriasCultivo->has('especie') ? $this->Html->link($especiesCategoriasCultivo->especie->id, ['controller' => 'Especies', 'action' => 'view', $especiesCategoriasCultivo->especie->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Ciclo') ?></th>
            <td><?= $especiesCategoriasCultivo->has('ciclo') ? $this->Html->link($especiesCategoriasCultivo->ciclo->id, ['controller' => 'Ciclos', 'action' => 'view', $especiesCategoriasCultivo->ciclo->id]) : '' ?></td>
        </tr>
    </table>
</div>
