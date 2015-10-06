<div class="row">
    <div class="col-md-12">
        <h2 class="page-header"> Propriedade <small><?= $propriedade->nome ?></small> </h2>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h3 class="panel-title">Ações</h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="dropdown">
                            <button class="btn btn-primary btn-default btn-block dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                Novo Ciclo
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                <?php if($propriedade->tanques)
                                        foreach($propriedade->tanques as $t): ?>
                                            <li><?= $this->Html->link($t->nome, ['controller' => 'Ciclos', 'action' => 'add']) ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <?= $this->Html->link('Novo Tanque', ['controller' => 'Tanques', 'action'=> 'add'], ['class'=> 'btn btn-primary btn-default btn-block']) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h3 class="panel-title">Tanques</h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <?php if (!empty($propriedade->tanques)): ?>
                        <table class="table table-striped">
                            <tr>
                                <th><?= __('Id') ?></th>
                                <th><?= __('Cobertura') ?></th>
                                <th><?= __('Capacidade') ?></th>
                                <th><?= __('Nome') ?></th>
                                <th><?= __('Ações') ?></th>
                            </tr>
                            <?php foreach ($propriedade->tanques as $tanques): ?>
                            <tr>
                                <td><?= h($tanques->id) ?></td>
                                <td><?= h($tanques->cobertura_id) ?></td>
                                <td><?= h($tanques->capacidade) ?></td>
                                <td><?= h($tanques->nome) ?></td>
                                <td>
                                    <?= $this->Html->link(__('View'), ['controller' => 'Tanques', 'action' => 'view', $tanques->id]) ?>
                                    <?= $this->Html->link(__('Edit'), ['controller' => 'Tanques', 'action' => 'edit', $tanques->id]) ?>
                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Tanques', 'action' => 'delete', $tanques->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tanques->id)]) ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </table>
                    <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h3 class="panel-title">Informações</h3>
            </div>
            <div class="panel-body">
                <h3><?= h($propriedade->id) ?></h3>
                <table class="table table-striped">
                    <tr>
                        <th><?= __('Nome') ?></th>
                        <td><?= h($propriedade->nome) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Usuario') ?></th>
                        <td><?= $propriedade->has('usuario') ? $this->Html->link($propriedade->usuario->id_usuario, ['controller' => 'Usuarios', 'action' => 'view', $propriedade->usuario->id_usuario]) : '' ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Endereco') ?></th>
                        <td><?= h($propriedade->endereco) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Cidade') ?></th>
                        <td><?= $propriedade->has('cidade') ? $this->Html->link($propriedade->cidade->id, ['controller' => 'Cidades', 'action' => 'view', $propriedade->cidade->id]) : '' ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Id') ?></th>
                        <td><?= $this->Number->format($propriedade->id) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Tamanho') ?></th>
                        <td><?= $this->Number->format($propriedade->tamanho) ?></td>
                    </tr>
                </table>

            </div>
        </div>
    </div>
</div>
