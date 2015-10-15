<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Notificacoes'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Visitas'), ['controller' => 'Visitas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Visita'), ['controller' => 'Visitas', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="notificacoes form large-9 medium-8 columns content">
    <?= $this->Form->create($notificacao) ?>
    <fieldset>
        <legend><?= __('Add Notificacao') ?></legend>
        <?php
            echo $this->Form->input('visita_id', ['options' => $visitas]);
            echo $this->Form->input('alimentacao');
            echo $this->Form->input('aeradores');
            echo $this->Form->input('alerta_alimentacao');
            echo $this->Form->input('alerta_aeradores');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
