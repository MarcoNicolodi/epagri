<div class="propriedades view large-9 medium-8 columns content">
    <h3><?= h($propriedade->id) ?></h3>
    <table class="vertical-table">
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
    <div class="related">
        <h4><?= __('Related Tanques') ?></h4>
        <?php if (!empty($propriedade->tanques)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Cobertura Id') ?></th>
                <th><?= __('Capacidade') ?></th>
                <th><?= __('Nome') ?></th>
                <th><?= __('Propriedade Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($propriedade->tanques as $tanques): ?>
            <tr>
                <td><?= h($tanques->id) ?></td>
                <td><?= h($tanques->cobertura_id) ?></td>
                <td><?= h($tanques->capacidade) ?></td>
                <td><?= h($tanques->nome) ?></td>
                <td><?= h($tanques->propriedade_id) ?></td>
                <td class="actions">
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
