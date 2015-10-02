<div class="tanques form large-9 medium-8 columns content">
    <?= $this->Form->create($tanque) ?>
    <fieldset>
        <legend><?= __('Edit Tanque') ?></legend>
        <?php
            echo $this->Form->input('cobertura_id', ['options' => $coberturas, 'empty' => true]);
            echo $this->Form->input('capacidade');
            echo $this->Form->input('nome');
            echo $this->Form->input('propriedade_id', ['options' => $propriedades, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
