<div class="row">
    <div class="col-md-12">
        <h2 class="page-header"> Visitas </h2>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-green">
            <div class="panel-heading">
                <h3 class="panel-title"> Gerenciar Visitas </h3>
            </div>
            <div class="panel-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th><?= $this->Paginator->sort('id') ?></th>
                        <th><?= $this->Paginator->sort('ciclo_id') ?></th>
                        <th><?= $this->Paginator->sort('oxigenio_agua') ?></th>
                        <th><?= $this->Paginator->sort('ionizacao_agua') ?></th>
                        <th><?= $this->Paginator->sort('temperatura_agua') ?></th>
                        <th><?= $this->Paginator->sort('largura_peixes') ?></th>
                        <th><?= $this->Paginator->sort('peso_peixes') ?></th>
                        <th class="actions"><?= __('Actions') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($visitas as $visita): ?>
                    <tr>
                        <td><?= $this->Number->format($visita->id) ?></td>
                        <td><?= $visita->has('ciclo') ? $this->Html->link($visita->ciclo->id, ['controller' => 'Ciclos', 'action' => 'view', $visita->ciclo->id]) : '' ?></td>
                        <td><?= $this->Number->format($visita->oxigenio_agua) ?></td>
                        <td><?= $this->Number->format($visita->ionizacao_agua) ?></td>
                        <td><?= $this->Number->format($visita->temperatura_agua) ?></td>
                        <td><?= $this->Number->format($visita->largura_peixes) ?></td>
                        <td><?= $this->Number->format($visita->peso_peixes) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['action' => 'view', $visita->id]) ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $visita->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $visita->id], ['confirm' => __('Are you sure you want to delete # {0}?', $visita->id)]) ?>
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
