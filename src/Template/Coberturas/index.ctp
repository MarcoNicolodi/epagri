<div class="row">
    <div class="col-md-12">
        <h2 class="page-header"> Coberturas </h2>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-green">
            <div class="panel-heading">
                <h3 class="panel-title"> Listar Cobertura </h3>
            </div>
            <div class="panel-body">

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th><?= $this->Paginator->sort('id') ?></th>
                            <th><?= $this->Paginator->sort('nome') ?></th>
                            <th><?= $this->Paginator->sort('descricao') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($coberturas as $cobertura): ?>
                        <tr>
                            <td><?= $this->Number->format($cobertura->id) ?></td>
                            <td><?= h($cobertura->nome) ?></td>
                            <td><?= h($cobertura->descricao) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['action' => 'view', $cobertura->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $cobertura->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $cobertura->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cobertura->id)]) ?>
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
        </div>
    </div>
</div>
