<div class="comentarios index large-9 medium-8 columns content">
    <h3><?= __('Comentarios') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('data') ?></th>
                <th><?= $this->Paginator->sort('updated') ?></th>
                <th><?= $this->Paginator->sort('usuario_id') ?></th>
                <th><?= $this->Paginator->sort('tabela_id') ?></th>
                <th><?= $this->Paginator->sort('tabela_nome') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($comentarios as $comentario): ?>
            <tr>
                <td><?= $this->Number->format($comentario->id) ?></td>
                <td><?= h($comentario->data) ?></td>
                <td><?= h($comentario->updated) ?></td>
                <td><?= $comentario->has('usuario') ? $this->Html->link($comentario->usuario->id_usuario, ['controller' => 'Usuarios', 'action' => 'view', $comentario->usuario->id_usuario]) : '' ?></td>
                <td><?= $this->Number->format($comentario->tabela_id) ?></td>
                <td><?= h($comentario->tabela_nome) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $comentario->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $comentario->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $comentario->id], ['confirm' => __('Are you sure you want to delete # {0}?', $comentario->id)]) ?>
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
