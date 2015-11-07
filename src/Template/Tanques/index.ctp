<div class="row">
    <div class="col-md-12">
        <h3 class="page-header">Tanques</h2>
    </div>
</div>

<div class="panel panel-green">
    <div class="panel-heading">
        <h3 class="panel-title">Gerenciar Tanques</h3>
    </div>
    <div class="panel-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('nome') ?></th>
                    <th><?= $this->Paginator->sort('cobertura_id') ?></th>
                    <th><?= $this->Paginator->sort('capacidade') ?></th>
                    <th><?= $this->Paginator->sort('propriedade_id') ?></th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tanques as $tanque): ?>
                <tr>
                    <td><?= h($tanque->nome) ?></td>
                    <td><?= $tanque->has('cobertura') ? $this->Html->link($tanque->cobertura->nome, ['controller' => 'Coberturas', 'action' => 'view', $tanque->cobertura->id]) : '' ?></td>
                    <td><?= $this->Number->format($tanque->capacidade) ?></td>
                    <td><?= $tanque->has('propriedade') ? $this->Html->link($tanque->propriedade->nome, ['controller' => 'Propriedades', 'action' => 'view', $tanque->propriedade->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $tanque->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $tanque->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $tanque->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tanque->id)]) ?>
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
</div>
