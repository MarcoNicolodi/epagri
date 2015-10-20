<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Notificacao'), ['action' => 'edit', $notificacao->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Notificacao'), ['action' => 'delete', $notificacao->id], ['confirm' => __('Are you sure you want to delete # {0}?', $notificacao->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Notificacoes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Notificacao'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Visitas'), ['controller' => 'Visitas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Visita'), ['controller' => 'Visitas', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="notificacoes view large-9 medium-8 columns content">
    <h3><?= h($notificacao->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Visita') ?></th>
            <td><?= $notificacao->has('visita') ? $this->Html->link($notificacao->visita->id, ['controller' => 'Visitas', 'action' => 'view', $notificacao->visita->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Alimentacao') ?></th>
            <td><?= h($notificacao->alimentacao) ?></td>
        </tr>
        <tr>
            <th><?= __('Aeradores') ?></th>
            <td><?= h($notificacao->aeradores) ?></td>
        </tr>
        <tr>
            <th><?= __('Alerta Alimentacao') ?></th>
            <td><?= h($notificacao->alerta_alimentacao) ?></td>
        </tr>
        <tr>
            <th><?= __('Alerta Aeradores') ?></th>
            <td><?= h($notificacao->alerta_aeradores) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($notificacao->id) ?></td>
        </tr>
    </table>
</div>
