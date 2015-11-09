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
                <table class="table table-striped">
                    <tr>
                        <th><?= __('Tanque') ?></th>
                        <td><?= $ciclo->has('tanque') ? $this->Html->link($ciclo->tanque->id, ['controller' => 'Tanques', 'action' => 'view', $ciclo->tanque->id]) : '' ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Status') ?></th>
                        <td><?= $ciclo->has('status') ? $this->Html->link($ciclo->status->id, ['controller' => 'Status', 'action' => 'view', $ciclo->status->id]) : '' ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Id') ?></th>
                        <td><?= $this->Number->format($ciclo->id) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Povoamento Inicio') ?></th>
                        <td><?= $this->Number->format($ciclo->povoamento_inicio) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Data Inicio') ?></th>
                        <td><?= $this->Time->format($ciclo->data_inicio,'dd/MM/yyyy') ?></tr>
                    </tr>
                    <tr>
                        <th><?= __('Data Fim') ?></th>
                        <td><?= $this->Time->format($ciclo->data_fim,'dd/MM/yyyy') ?></tr>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-green">
            <div class="panel-heading">
                <h3 class="panel-title"> Visitas </h3>
            </div>
            <div class="panel-body">
                <?php if (!empty($ciclo->visitas)): ?>
                <table class="table table-striped">
                    <tr>

                        <th><?= __('Ciclo Id') ?></th>
                        <th><?= __('Oxigenio') ?></th>
                        <th><?= __('Ionizacao') ?></th>
                        <th><?= __('Temperatura') ?></th>
                        <th><?= __('Largura') ?></th>
                        <th><?= __('Peso') ?></th>
                        <th><?= __('Data') ?></th>
                        <th><?= __('Ações') ?></th>
                    </tr>
                    <?php foreach ($ciclo->visitas as $visitas): ?>
                    <tr>
                        <td><?= h($visitas->ciclo_id) ?></td>
                        <td><?= h($visitas->oxigenio_agua) ?></td>
                        <td><?= h($visitas->ionizacao_agua) ?></td>
                        <td><?= h($visitas->temperatura_agua) ?></td>
                        <td><?= h($visitas->largura_peixes) ?></td>
                        <td><?= h($visitas->peso_peixes) ?></td>
                        <td><?= $this->Time->format(h($visitas->data),'dd/MM/yyyy') ?></td>
                        <td>
                            <?= $this->Html->link(__('View'), ['controller' => 'Visitas', 'action' => 'view', $visitas->id]) ?>

                            <?= $this->Html->link(__('Edit'), ['controller' => 'Visitas', 'action' => 'edit', $visitas->id]) ?>

                            <?= $this->Form->postLink(__('Delete'), ['controller' => 'Visitas', 'action' => 'delete', $visitas->id], ['confirm' => __('Are you sure you want to delete # {0}?', $visitas->id)]) ?>

                        </td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            <?php endif; ?>
            </div>
        </div>
    </div>
</div>
