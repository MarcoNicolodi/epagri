<div class="row">
    <div class="col-md-12">
        <h3 class="page-header">Tanque <small> <?= h($tanque->nome) ?> </small></h3>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <h3 class="panel-title">Informações</h3>
            </div>
            <div class="panel-body">
                <dl>
                    <dt>Nome</dt>
                    <dd><?= h($tanque->nome) ?></dd>
                </dl>
                <dl>
                    <dt>Cobertura</dt>
                    <dd><?= $tanque->has('cobertura') ? $this->Html->link($tanque->cobertura->id, ['controller' => 'Coberturas', 'action' => 'view', $tanque->cobertura->id]) : '--' ?></dd>
                </dl>
                <dl>
                    <dt>Propriedade</dt>
                    <dd><?= $tanque->has('propriedade') ? $this->Html->link($tanque->propriedade->nome, ['controller' => 'Propriedades', 'action' => 'view', $tanque->propriedade->id]) : '--' ?></dd>
                </dl>
                <dl>
                    <dt>Proprietário</dt>
                    <dd><?= h($tanque->propriedade->usuario->username) ?></dd>
                </dl>
                <dl>
                    <dt>Capacidade</dt>
                    <dd><?= $tanque->capacidade ? $this->Number->format($tanque->capacidade) : '--' ?></dd>
                </dl>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <h3 class="panel-title">Ciclos</h3>
            </div>
            <div class="panel-body">
                <?php if (!empty($tanque->ciclos)){ ?>
                <table class="table table-striped">
                    <tr>
                        <th><?= __('Tanque') ?></th>
                        <th><?= __('Data Inicio') ?></th>
                        <th><?= __('Data Fim') ?></th>
                        <th><?= __('Status') ?></th>
                        <th class="actions"><?= __('Actions') ?></th>
                    </tr>
                    <?php  foreach ($tanque->ciclos as $ciclos): ?>
                    <tr>
                        <td><?= $this->Html->link($ciclos->nome,['controller' => 'ciclos','action' => 'view',$ciclos->id]) ?></td>
                        <td><?= h($ciclos->data_inicio->format('d/m/Y')) ?></td>
                        <td><?= h($ciclos->data_fim->format('d/m/Y')); ?></td>
                        <td><?= $ciclos->status_id == 1 ? "<span class='label label-success'>ativo</span>" : "<span class='label label-warning'>finalizado</span>" ?></span></td>
                        <td class="actions">
                            <?= $this->Html->link('<i class="fa fa-search fa-white"></i>', ['controller' => 'ciclos', 'action' => 'view', $ciclos->id], ['class' => 'btn btn-primary btn-sm', 'escape' => false, 'title' => 'Visualizar']) ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            <?php } else {
                    echo "<p> Esse tanque não participou de nenhum ciclo </p>";
                } ?>
            </div>
        </div>
    </div>
</div>
