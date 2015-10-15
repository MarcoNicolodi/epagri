<div class="coberturas view large-9 medium-8 columns content">
    <h3><?= h($cobertura->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Nome') ?></th>
            <td><?= h($cobertura->nome) ?></td>
        </tr>
        <tr>
            <th><?= __('Descricao') ?></th>
            <td><?= h($cobertura->descricao) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($cobertura->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Tanques') ?></h4>
        <?php if (!empty($cobertura->tanques)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Cobertura Id') ?></th>
                <th><?= __('Capacidade') ?></th>
                <th><?= __('Nome') ?></th>
                <th><?= __('Propriedade Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($cobertura->tanques as $tanques): ?>
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
