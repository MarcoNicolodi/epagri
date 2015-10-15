<div class="tanques view large-9 medium-8 columns content">
    <h3><?= h($tanque->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Cobertura') ?></th>
            <td><?= $tanque->has('cobertura') ? $this->Html->link($tanque->cobertura->id, ['controller' => 'Coberturas', 'action' => 'view', $tanque->cobertura->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Nome') ?></th>
            <td><?= h($tanque->nome) ?></td>
        </tr>
        <tr>
            <th><?= __('Propriedade') ?></th>
            <td><?= $tanque->has('propriedade') ? $this->Html->link($tanque->propriedade->id, ['controller' => 'Propriedades', 'action' => 'view', $tanque->propriedade->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($tanque->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Capacidade') ?></th>
            <td><?= $this->Number->format($tanque->capacidade) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Ciclos') ?></h4>
        <?php if (!empty($tanque->ciclos)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Tanque Id') ?></th>
                <th><?= __('Data Inicio') ?></th>
                <th><?= __('Povoamento Inicio') ?></th>
                <th><?= __('Status Id') ?></th>
                <th><?= __('Data Fim') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($tanque->ciclos as $ciclos): ?>
            <tr>
                <td><?= h($ciclos->id) ?></td>
                <td><?= h($ciclos->tanque_id) ?></td>
                <td><?= h($ciclos->data_inicio) ?></td>
                <td><?= h($ciclos->povoamento_inicio) ?></td>
                <td><?= h($ciclos->status_id) ?></td>
                <td><?= h($ciclos->data_fim) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Ciclos', 'action' => 'view', $ciclos->id]) ?>

                    <?= $this->Html->link(__('Edit'), ['controller' => 'Ciclos', 'action' => 'edit', $ciclos->id]) ?>

                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Ciclos', 'action' => 'delete', $ciclos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ciclos->id)]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
</div>
