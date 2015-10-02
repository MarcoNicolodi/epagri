<div class="visitas form large-9 medium-8 columns content">
    <?= $this->Form->create($visita) ?>
    <fieldset>
        <legend><?= __('Edit Visita') ?></legend>
        <?php
            echo $this->Form->input('oxigenio_agua');
            echo $this->Form->input('ionizacao_agua');
            echo $this->Form->input('temperatura_agua');
            echo $this->Form->input('largura_peixes');
            echo $this->Form->input('peso_peixes');
            echo $this->Form->input('data');
            echo $this->Form->input('params_ideais_id', ['options' => $parametrosIdeais]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
