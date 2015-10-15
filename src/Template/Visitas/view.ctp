<div class="visitas view large-9 medium-8 columns content">
    <h3><?= h($visita->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Ciclo') ?></th>
            <td><?= $visita->has('ciclo') ? $this->Html->link($visita->ciclo->id, ['controller' => 'Ciclos', 'action' => 'view', $visita->ciclo->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Parametros Ideal') ?></th>
            <td><?= $visita->has('parametros_ideal') ? $this->Html->link($visita->parametros_ideal->id, ['controller' => 'ParametrosIdeais', 'action' => 'view', $visita->parametros_ideal->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($visita->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Oxigenio Agua') ?></th>
            <td><?= $this->Number->format($visita->oxigenio_agua) ?></td>
        </tr>
        <tr>
            <th><?= __('Ionizacao Agua') ?></th>
            <td><?= $this->Number->format($visita->ionizacao_agua) ?></td>
        </tr>
        <tr>
            <th><?= __('Temperatura Agua') ?></th>
            <td><?= $this->Number->format($visita->temperatura_agua) ?></td>
        </tr>
        <tr>
            <th><?= __('Largura Peixes') ?></th>
            <td><?= $this->Number->format($visita->largura_peixes) ?></td>
        </tr>
        <tr>
            <th><?= __('Peso Peixes') ?></th>
            <td><?= $this->Number->format($visita->peso_peixes) ?></td>
        </tr>
        <tr>
            <th><?= __('Data') ?></th>
            <td><?= h($visita->data) ?></tr>
        </tr>
    </table>
</div>
