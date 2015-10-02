<div class="parametrosIdeais form large-9 medium-8 columns content">
    <?= $this->Form->create($parametrosIdeal) ?>
    <fieldset>
        <legend><?= __('Add Parametros Ideal') ?></legend>
        <?php
            echo $this->Form->input('oxigenio_agua');
            echo $this->Form->input('ionizacao_agua');
            echo $this->Form->input('temperatura_agua');
            echo $this->Form->input('largura_peixes');
            echo $this->Form->input('peso_peixes');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
