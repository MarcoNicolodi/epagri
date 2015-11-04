<div class="row">
    <div class="col-md-12">
        <h2 class="page-header"> Propriedade <small><?= $propriedade->nome ?></small> </h2>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-green">
            <div class="panel-heading">
                <h3 class="panel-title">Ações</h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="dropdown">
                            <button class="btn btn-primary btn-block dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
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
                        <?= $this->Html->link('Novo Tanque', ['controller' => 'Tanques', 'action'=> 'add'], ['class'=> 'btn btn-default btn-block']) ?>
                    </div>
                    <div class="col-md-4">
                        <?= $this->Html->link('Editar Propriedade', ['controller' => 'Propriedades', 'action'=> 'add'], ['class'=> 'btn btn-default btn-block']) ?>
                    </div>
                </div>
            </div>
        </div>
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
                        <dd><?= h($propriedade->nome) ?></dd>
                    </dl>
                    <dl>
                        <dt>Produtor</dt>
                        <dd><?= $propriedade->has('usuario') ? $this->Html->link($propriedade->usuario->username, ['controller' => 'Usuarios', 'action' => 'view', $propriedade->usuario->id_usuario]) : '' ?></dd>
                    </dl>
                    <dl>
                        <dt>Endereço</dt>
                        <dd><?= h($propriedade->endereco) ?></dd>
                    </dl>
                    <dl>
                        <dt>Bairro</dt>
                        <dd><?= h($propriedade->bairro) ?></dd>
                    </dl>
                    <dl>
                        <dt>Cidade</dt>
                        <dd><?= $propriedade->has('cidade') ? h($propriedade->cidade->nome) : '--' ?></dd>
                    </dl>
                    <dl>
                        <dt>Estado</dt>
                        <dd><?= $propriedade->has('cidade') ? h($propriedade->cidade->estado->nome) : '--' ?></dd>
                    </dl>
                    <dl>
                        <dt>Tamanho</dt>
                        <dd><?= $this->Number->format($propriedade->tamanho) ?></dd>
                    </tr>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-green">
                <div class="panel-heading">
                    <h3 class="panel-title">Tanques</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <?php if (!empty($propriedade->tanques)){ ?>
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
                        <?php } else {
                            echo "Esta propriedade não tem nenhum tanque cadastrado.";
                        } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-green">
                <div class="panel-heading">
                    <h3 class="panel-title">Ciclos</h3>
                </div>
                <div class="panel-body">
                    <?php if(!empty($propriedade->tanques->ciclos)){  ?>
                    <table class="table table-striped">
                        <tr>
                            <th> Nome </th>
                            <th> Tanque </th>
                            <th> Status </th>
                            <th> Início </th>
                            <th> Término </th>
                        </tr>
                        <?php foreach($propriedade->tanques->ciclos as $c): ?>
                        <tr>
                            <td> <?= h($c->nome) ?> </td>
                            <td> <?= h($c->nome) ?> </td>
                            <td> <?= h($c->nome) ?> </td>
                            <td> <?= h($c->nome) ?> </td>
                            <td> <?= h($c->nome) ?> </td>
                        </tr>
                    <?php endforeach ?>
                    </table>
                    <?php } else {
                        echo "Esta propriedade não está participando de nenhum ciclo.";
                    } ?>
                </div>
            </div>
        </div>
    </div>
