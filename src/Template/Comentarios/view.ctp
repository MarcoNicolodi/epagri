<div class="comentarios view large-9 medium-8 columns content">
    <h3><?= h($comentario->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Usuario') ?></th>
            <td><?= $comentario->has('usuario') ? $this->Html->link($comentario->usuario->id_usuario, ['controller' => 'Usuarios', 'action' => 'view', $comentario->usuario->id_usuario]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Tabela Nome') ?></th>
            <td><?= h($comentario->tabela_nome) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($comentario->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Tabela Id') ?></th>
            <td><?= $this->Number->format($comentario->tabela_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Data') ?></th>
            <td><?= h($comentario->data) ?></tr>
        </tr>
        <tr>
            <th><?= __('Updated') ?></th>
            <td><?= h($comentario->updated) ?></tr>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Conteudo') ?></h4>
        <?= $this->Text->autoParagraph(h($comentario->conteudo)); ?>
    </div>
</div>
