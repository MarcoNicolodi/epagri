<div class="cidades view large-9 medium-8 columns content">
    <h3><?= h($cidade->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Nome') ?></th>
            <td><?= h($cidade->nome) ?></td>
        </tr>
        <tr>
            <th><?= __('Estado') ?></th>
            <td><?= $cidade->has('estado') ? $this->Html->link($cidade->estado->id, ['controller' => 'Estados', 'action' => 'view', $cidade->estado->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($cidade->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Propriedades') ?></h4>
        <?php if (!empty($cidade->propriedades)): ?>
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
            <?php foreach ($cidade->propriedades as $propriedades): ?>
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
    <div class="related">
        <h4><?= __('Related Usuarios') ?></h4>
        <?php if (!empty($cidade->usuarios)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Username') ?></th>
                <th><?= __('Password') ?></th>
                <th><?= __('Email') ?></th>
                <th><?= __('Endereco') ?></th>
                <th><?= __('Cidade Id') ?></th>
                <th><?= __('Id Usuario') ?></th>
                <th><?= __('Autorizacao') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($cidade->usuarios as $usuarios): ?>
            <tr>
                <td><?= h($usuarios->username) ?></td>
                <td><?= h($usuarios->password) ?></td>
                <td><?= h($usuarios->email) ?></td>
                <td><?= h($usuarios->endereco) ?></td>
                <td><?= h($usuarios->cidade_id) ?></td>
                <td><?= h($usuarios->id_usuario) ?></td>
                <td><?= h($usuarios->autorizacao) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Usuarios', 'action' => 'view', $usuarios->id_usuario]) ?>

                    <?= $this->Html->link(__('Edit'), ['controller' => 'Usuarios', 'action' => 'edit', $usuarios->id_usuario]) ?>

                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Usuarios', 'action' => 'delete', $usuarios->id_usuario], ['confirm' => __('Are you sure you want to delete # {0}?', $usuarios->id_usuario)]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
</div>
