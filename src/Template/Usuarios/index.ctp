<div class="usuarios index large-9 medium-8 columns content">
    <h3><?= __('Usuarios') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('username') ?></th>
                <th><?= $this->Paginator->sort('password') ?></th>
                <th><?= $this->Paginator->sort('email') ?></th>
                <th><?= $this->Paginator->sort('endereco') ?></th>
                <th><?= $this->Paginator->sort('cidade_id') ?></th>
                <th><?= $this->Paginator->sort('id_usuario') ?></th>
                <th><?= $this->Paginator->sort('autorizacao') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($usuarios as $usuario): ?>
            <tr>
                <td><?= h($usuario->username) ?></td>
                <td><?= h($usuario->password) ?></td>
                <td><?= h($usuario->email) ?></td>
                <td><?= h($usuario->endereco) ?></td>
                <td><?= $usuario->has('cidade') ? $this->Html->link($usuario->cidade->id, ['controller' => 'Cidades', 'action' => 'view', $usuario->cidade->id]) : '' ?></td>
                <td><?= $this->Number->format($usuario->id_usuario) ?></td>
                <td><?= $this->Number->format($usuario->autorizacao) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $usuario->id_usuario]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $usuario->id_usuario]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $usuario->id_usuario], ['confirm' => __('Are you sure you want to delete # {0}?', $usuario->id_usuario)]) ?>
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
