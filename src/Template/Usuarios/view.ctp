<div class="usuarios view large-9 medium-8 columns content">
    <h3><?= h($usuario->id_usuario) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Username') ?></th>
            <td><?= h($usuario->username) ?></td>
        </tr>
        <tr>
            <th><?= __('Password') ?></th>
            <td><?= h($usuario->password) ?></td>
        </tr>
        <tr>
            <th><?= __('Email') ?></th>
            <td><?= h($usuario->email) ?></td>
        </tr>
        <tr>
            <th><?= __('Endereco') ?></th>
            <td><?= h($usuario->endereco) ?></td>
        </tr>
        <tr>
            <th><?= __('Cidade') ?></th>
            <td><?= $usuario->has('cidade') ? $this->Html->link($usuario->cidade->id, ['controller' => 'Cidades', 'action' => 'view', $usuario->cidade->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id Usuario') ?></th>
            <td><?= $this->Number->format($usuario->id_usuario) ?></td>
        </tr>
        <tr>
            <th><?= __('Autorizacao') ?></th>
            <td><?= $this->Number->format($usuario->autorizacao) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Comentarios') ?></h4>
        <?php if (!empty($usuario->comentarios)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Conteudo') ?></th>
                <th><?= __('Data') ?></th>
                <th><?= __('Updated') ?></th>
                <th><?= __('Usuario Id') ?></th>
                <th><?= __('Tabela Id') ?></th>
                <th><?= __('Tabela Nome') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($usuario->comentarios as $comentarios): ?>
            <tr>
                <td><?= h($comentarios->id) ?></td>
                <td><?= h($comentarios->conteudo) ?></td>
                <td><?= h($comentarios->data) ?></td>
                <td><?= h($comentarios->updated) ?></td>
                <td><?= h($comentarios->usuario_id) ?></td>
                <td><?= h($comentarios->tabela_id) ?></td>
                <td><?= h($comentarios->tabela_nome) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Comentarios', 'action' => 'view', $comentarios->id]) ?>

                    <?= $this->Html->link(__('Edit'), ['controller' => 'Comentarios', 'action' => 'edit', $comentarios->id]) ?>

                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Comentarios', 'action' => 'delete', $comentarios->id], ['confirm' => __('Are you sure you want to delete # {0}?', $comentarios->id)]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Estoques') ?></h4>
        <?php if (!empty($usuario->estoques)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Produto Id') ?></th>
                <th><?= __('Qtde') ?></th>
                <th><?= __('Usuario Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($usuario->estoques as $estoques): ?>
            <tr>
                <td><?= h($estoques->id) ?></td>
                <td><?= h($estoques->produto_id) ?></td>
                <td><?= h($estoques->qtde) ?></td>
                <td><?= h($estoques->usuario_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Estoques', 'action' => 'view', $estoques->id]) ?>

                    <?= $this->Html->link(__('Edit'), ['controller' => 'Estoques', 'action' => 'edit', $estoques->id]) ?>

                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Estoques', 'action' => 'delete', $estoques->id], ['confirm' => __('Are you sure you want to delete # {0}?', $estoques->id)]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Propriedades') ?></h4>
        <?php if (!empty($usuario->propriedades)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Nome') ?></th>
                <th><?= __('Tamanho') ?></th>
                <th><?= __('Usuario Id') ?></th>
                <th><?= __('Endereco') ?></th>
                <th><?= __('Cidade Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($usuario->propriedades as $propriedades): ?>
            <tr>
                <td><?= h($propriedades->id) ?></td>
                <td><?= h($propriedades->nome) ?></td>
                <td><?= h($propriedades->tamanho) ?></td>
                <td><?= h($propriedades->usuario_id) ?></td>
                <td><?= h($propriedades->endereco) ?></td>
                <td><?= h($propriedades->cidade_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Propriedades', 'action' => 'view', $propriedades->id]) ?>

                    <?= $this->Html->link(__('Edit'), ['controller' => 'Propriedades', 'action' => 'edit', $propriedades->id]) ?>

                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Propriedades', 'action' => 'delete', $propriedades->id], ['confirm' => __('Are you sure you want to delete # {0}?', $propriedades->id)]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
</div>
