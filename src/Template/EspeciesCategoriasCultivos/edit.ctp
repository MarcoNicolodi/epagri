<div class="especiesCategoriasCultivos form large-9 medium-8 columns content">
    <?= $this->Form->create($especiesCategoriasCultivo) ?>
    <fieldset>
        <legend><?= __('Edit Especies Categorias Cultivo') ?></legend>
        <?php
            echo $this->Form->input('ciclo_id', ['options' => $ciclos]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
