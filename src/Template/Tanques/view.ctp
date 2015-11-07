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
                    <dd> </dd>
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
                        <th><?= __('Status') ?></th>
                        <th><?= __('Data Fim') ?></th>
                        <th class="actions"><?= __('Actions') ?></th>
                    </tr>
                    <?php foreach ($tanque->ciclos as $ciclos): ?>
                    <tr>
                        <td><?= h($ciclos->tanque_id) ?></td>
                        <td><?= h($ciclos->data_inicio) ?></td>
                        <td><?= h($ciclos->status_id) ?></td>
                        <td><?= h($ciclos->data_fim) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['controller' => 'Ciclos', 'action' => 'view', $ciclos->id]) ?>
                            <?= $this->Html->link(__('Edit'), ['controller' => 'Ciclos', 'action' => 'edit', $ciclos->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['controller' => 'Ciclos', 'action' => 'delete', $ciclos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ciclos->id)]) ?>
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
