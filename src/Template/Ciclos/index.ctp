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
                            <th><?= $this->Paginator->sort('nome') ?></th>
                            <th><?= $this->Paginator->sort('tanque_id') ?></th>
                            <th><?= $this->Paginator->sort('data_inicio') ?></th>
                            <th><?= $this->Paginator->sort('povoamento_inicio','Povoamento Inicial') ?></th>
                            <th><?= $this->Paginator->sort('status_id') ?></th>
                            <th><?= $this->Paginator->sort('data_fim') ?></th>
                            <th class="actions"><?= __('Ações') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($ciclos as $ciclo): ?>
                        <tr>
                            <td><?= $ciclo->nome ?></td>
                            <td><?= $ciclo->has('tanque') ? $this->Html->link($ciclo->tanque->nome, ['controller' => 'Tanques', 'action' => 'view', $ciclo->tanque->id]) : '' ?></td>
                            <td><?= $this->Time->format($ciclo->data_inicio,'dd/MM/yyyy') ?></td>
                            <td><?= $ciclo->povoamento_inicio ?></td>
                            <td><?= $ciclo->has('status') ? ($ciclo->status_id == 1 ? "<span class='label label-success'> ativo </span>" : "<span class='label label-warning'> finalizado </span>") : '' ?></td>
                            <td><?= $this->Time->format($ciclo->data_fim,'dd/MM/yyyy'); ?></td>
                            <td class="actions">
                                <?= $this->Html->link('<i class="fa fa-search fa-white"></i>', ['action' => 'view', $ciclo->id], ['class' => 'btn btn-primary btn-sm', 'escape' => false, 'title' => 'Visualizar']) ?>
                                <?= $this->Html->link('<i class="fa fa-pencil fa-white"></i>', ['action' => 'edit', $ciclo->id], ['class' => 'btn btn-primary btn-sm', 'escape' => false, 'title' => 'Editar']) ?>
                                <?= $this->Form->postLink('<i class="fa fa-times fa-white"></i>', ['action' => 'delete', $ciclo->id], ['class' =>'btn btn-danger btn-sm', 'escape' => false, 'title' => 'Excluir', 'confirm' =>'Tem certeza que deseja apagar o ciclo {0}?', $ciclo->id]) ?>
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
