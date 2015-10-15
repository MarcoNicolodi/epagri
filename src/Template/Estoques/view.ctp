<div class="estoques view large-9 medium-8 columns content">
    <h3><?= h($estoque->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Produto') ?></th>
            <td><?= $estoque->has('produto') ? $this->Html->link($estoque->produto->id, ['controller' => 'Produtos', 'action' => 'view', $estoque->produto->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Usuario') ?></th>
            <td><?= $estoque->has('usuario') ? $this->Html->link($estoque->usuario->id_usuario, ['controller' => 'Usuarios', 'action' => 'view', $estoque->usuario->id_usuario]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($estoque->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Qtde') ?></th>
            <td><?= $this->Number->format($estoque->qtde) ?></td>
        </tr>
    </table>
</div>
