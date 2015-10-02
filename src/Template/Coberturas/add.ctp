<div class="coberturas form large-9 medium-8 columns content">
    <?= $this->Form->create($cobertura) ?>
    <fieldset>
        <legend><?= __('Add Cobertura') ?></legend>
        <?php
            echo $this->Form->input('nome');
            echo $this->Form->input('descricao');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
