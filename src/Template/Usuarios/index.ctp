<div class="row">
    <div class="col-md-12">
        <h2 class="page-header"> Usuários </h2>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-green">
            <div class="panel-heading">
                <h3 class="panel-title"> Gerenciar Usuários </h2>
            </div>
            <div class="panel-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th><?= $this->Paginator->sort('username') ?></th>
                            <th><?= $this->Paginator->sort('email') ?></th>
                            <th><?= $this->Paginator->sort('endereco') ?></th>
                            <th><?= $this->Paginator->sort('cidade_id') ?></th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($usuarios as $usuario): ?>
                        <tr>
                            <td><?= $this->Html->link($usuario->username, ['action' => 'view',$usuario->id_usuario]); ?></td>
                            <td><?= h($usuario->email) ?></td>
                            <td><?= h($usuario->endereco) ?></td>
                            <td><?= $usuario->has('cidade') ?  $usuario->cidade->nome.', '.$usuario->cidade->estado->uf : '' ?></td>
                            <td class="actions">
                                <?= $this->Html->link('<i class="fa fa-search fa-white"></i>', ['action' => 'view', $usuario->id_usuario], ['class' => 'btn btn-primary btn-sm', 'escape' => false, 'title' => 'Visualizar']) ?>
                                <?= $this->Html->link('<i class="fa fa-pencil fa-white"></i>', ['action' => 'edit', $usuario->id_usuario], ['class' => 'btn btn-primary btn-sm', 'escape' => false, 'title' => 'Editar']) ?>
                                <?= $this->Form->postLink('<i class="fa fa-times fa-white"></i>', ['action' => 'delete', $usuario->id_usuario], ['class' =>'btn btn-danger btn-sm', 'escape' => false, 'title' => 'Excluir', 'confirm' =>'Tem certeza que deseja apagar o usuário {0}?', $usuario->username]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <div class="paginator">
                    <ul class="pagination">
                        <?= $this->Paginator->prev('< ' . __('Próximo')) ?>
                        <?= $this->Paginator->numbers() ?>
                        <?= $this->Paginator->next(__('Anterior') . ' >') ?>
                    </ul>
                    <p><?= $this->Paginator->counter() ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
