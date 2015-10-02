<div class="especies form large-9 medium-8 columns content">
    <?= $this->Form->create($especie) ?>
    <fieldset>
        <legend><?= __('Add Especie') ?></legend>
        <?php
            echo $this->Form->input('nome');
            echo $this->Form->input('descricao');
            echo $this->Form->input('categorias_cultivos._ids', ['options' => $categoriasCultivos]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
