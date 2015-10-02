<div class="parametrosIdeais index large-9 medium-8 columns content">
    <h3><?= __('Parametros Ideais') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('oxigenio_agua') ?></th>
                <th><?= $this->Paginator->sort('ionizacao_agua') ?></th>
                <th><?= $this->Paginator->sort('temperatura_agua') ?></th>
                <th><?= $this->Paginator->sort('largura_peixes') ?></th>
                <th><?= $this->Paginator->sort('peso_peixes') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($parametrosIdeais as $parametrosIdeal): ?>
            <tr>
                <td><?= $this->Number->format($parametrosIdeal->id) ?></td>
                <td><?= $this->Number->format($parametrosIdeal->oxigenio_agua) ?></td>
                <td><?= $this->Number->format($parametrosIdeal->ionizacao_agua) ?></td>
                <td><?= $this->Number->format($parametrosIdeal->temperatura_agua) ?></td>
                <td><?= $this->Number->format($parametrosIdeal->largura_peixes) ?></td>
                <td><?= $this->Number->format($parametrosIdeal->peso_peixes) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $parametrosIdeal->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $parametrosIdeal->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $parametrosIdeal->id], ['confirm' => __('Are you sure you want to delete # {0}?', $parametrosIdeal->id)]) ?>
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
