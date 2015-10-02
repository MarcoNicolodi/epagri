<div class="parametrosIdeais view large-9 medium-8 columns content">
    <h3><?= h($parametrosIdeal->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($parametrosIdeal->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Oxigenio Agua') ?></th>
            <td><?= $this->Number->format($parametrosIdeal->oxigenio_agua) ?></td>
        </tr>
        <tr>
            <th><?= __('Ionizacao Agua') ?></th>
            <td><?= $this->Number->format($parametrosIdeal->ionizacao_agua) ?></td>
        </tr>
        <tr>
            <th><?= __('Temperatura Agua') ?></th>
            <td><?= $this->Number->format($parametrosIdeal->temperatura_agua) ?></td>
        </tr>
        <tr>
            <th><?= __('Largura Peixes') ?></th>
            <td><?= $this->Number->format($parametrosIdeal->largura_peixes) ?></td>
        </tr>
        <tr>
            <th><?= __('Peso Peixes') ?></th>
            <td><?= $this->Number->format($parametrosIdeal->peso_peixes) ?></td>
        </tr>
    </table>
</div>
