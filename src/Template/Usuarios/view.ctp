<div class="row">
    <div class="col-md-12">
        <h2 class="page-header"> Usuário <small> <?= h($usuario->username." ".$usuario->sobrenome) ?></small>  </h2>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <h3 class="panel-title"> Dados do Usuário </h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <dl>
                            <dt> Nome </dt>
                            <dd> <?= $usuario->username." ".$usuario->sobrenome ?></dd>
                            <br>
                            <dt> Endereço </dt>
                            <dd> <?= $usuario->endereco ?></dd>
                            <br>
                            <dt> Bairro </dt>
                            <dd> <?= $usuario->bairro ?></dd>
                            <br>
                            <dt> Cidade </dt>
                            <dd> <?= $usuario->has('cidades') ? $usuario->cidades->nome : '--' ?></dd>
                            <br>
                            <dt> Estado </dt>
                            <dd> <?= $usuario->has('cidades') ? $usuario->cidades->estados->nome : '--' ?></dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-green">
                <div class="panel-heading">
                    <h3 class="panel-title"> Propriedades </h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                        <?php if (!empty($usuario->propriedades)){ ?>
                            <table class="table table-striped">
                                <tr>
                                    <th><?= __('Nome') ?></th>
                                    <th><?= __('Endereco') ?></th>
                                    <th><?= __('Cidade') ?></th>
                                    <th><?= __('Ações') ?></th>
                                </tr>
                                <?php foreach ($usuario->propriedades as $propriedades): ?>
                                <tr>
                                    <td><?= h($propriedades->nome) ?></td>
                                    <td><?= h($propriedades->endereco) ?></td>
                                    <td><?= h($propriedades->cidade_id) ?></td>
                                    <td>
                                        <?= $this->Html->link(__('View'), ['controller' => 'Propriedades', 'action' => 'view', $propriedades->id]) ?>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </table>
                        <?php } else {
                            echo "<p> Este usuário não possui nenhuma propriedade cadastrada </p>";
                        } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-green">
                <div class="panel-heading">
                    <h3 class="panel-title"> Ciclos </h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                        <?php if (!empty($usuario->propriedades->ciclos)){ ?>
                            <table class="table table-striped">

                            </table>
                        <?php } else {
                            echo "<p> Este usuário não está participando de nenhum ciclo no momento <p>";
                        } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
