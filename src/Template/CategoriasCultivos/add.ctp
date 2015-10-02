<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Categorias Cultivos'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Especies'), ['controller' => 'Especies', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Especie'), ['controller' => 'Especies', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="categoriasCultivos form large-9 medium-8 columns content">
    <?= $this->Form->create($categoriasCultivo) ?>
    <fieldset>
        <legend><?= __('Add Categorias Cultivo') ?></legend>
        <?php
            echo $this->Form->input('nome');
            echo $this->Form->input('descricao');
            echo $this->Form->input('especies._ids', ['options' => $especies]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
