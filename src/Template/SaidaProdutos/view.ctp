<div class="saidaProdutos view large-9 medium-8 columns content">
    <h3><?= h($saidaProduto->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Produto') ?></th>
            <td><?= $saidaProduto->has('produto') ? $this->Html->link($saidaProduto->produto->id, ['controller' => 'Produtos', 'action' => 'view', $saidaProduto->produto->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($saidaProduto->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Qtde') ?></th>
            <td><?= $this->Number->format($saidaProduto->qtde) ?></td>
        </tr>
        <tr>
            <th><?= __('Data') ?></th>
            <td><?= h($saidaProduto->data) ?></tr>
        </tr>
    </table>
</div>
