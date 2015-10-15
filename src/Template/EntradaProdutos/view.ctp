<div class="entradaProdutos view large-9 medium-8 columns content">
    <h3><?= h($entradaProduto->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Produto') ?></th>
            <td><?= $entradaProduto->has('produto') ? $this->Html->link($entradaProduto->produto->id, ['controller' => 'Produtos', 'action' => 'view', $entradaProduto->produto->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($entradaProduto->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Qtde') ?></th>
            <td><?= $this->Number->format($entradaProduto->qtde) ?></td>
        </tr>
        <tr>
            <th><?= __('Data') ?></th>
            <td><?= h($entradaProduto->data) ?></tr>
        </tr>
    </table>
</div>
