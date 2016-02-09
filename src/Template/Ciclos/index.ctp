<div class="row">
    <div class="col-md-12">
        <h2 class="page-header"> Ciclos </h2>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-green">
            <div class="panel-heading">
                <h3 class="panel-title"> Listar Ciclos </h3>
            </div>
            <div class="panel-body">
                <h3><?= __('Ciclos') ?></h3>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th><?= $this->Paginator->sort('id') ?></th>
                            <th><?= $this->Paginator->sort('tanque_id') ?></th>
                            <th><?= $this->Paginator->sort('data_inicio') ?></th>
                            <th><?= $this->Paginator->sort('povoamento_inicio') ?></th>
                            <th><?= $this->Paginator->sort('status_id') ?></th>
                            <th><?= $this->Paginator->sort('data_fim') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($ciclos as $ciclo): ?>
                        <tr>
                            <td><?= $this->Number->format($ciclo->id) ?></td>
                            <td><?= $ciclo->has('tanque') ? $this->Html->link($ciclo->tanque->nome, ['controller' => 'Tanques', 'action' => 'view', $ciclo->tanque->id]) : '' ?></td>
                            <td><?= h($ciclo->data_inicio) ?></td>
                            <td><?= $this->Number->format($ciclo->povoamento_inicio) ?></td>
                            <td><?= $ciclo->has('status') ? $this->Html->link($ciclo->status->nome, ['controller' => 'Status', 'action' => 'view', $ciclo->status->id]) : '' ?></td>
                            <td><?= h($ciclo->data_fim) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['action' => 'view', $ciclo->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $ciclo->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $ciclo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ciclo->id)]) ?>
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
    </div>
</div>
