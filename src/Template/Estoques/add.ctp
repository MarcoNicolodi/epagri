<div class="estoques form large-9 medium-8 columns content">
    <?= $this->Form->create($estoque) ?>
    <fieldset>
        <legend><?= __('Add Estoque') ?></legend>
        <?php
            echo $this->Form->input('produto_id', ['options' => $produtos]);
            echo $this->Form->input('qtde');
            echo $this->Form->input('usuario_id', ['options' => $usuarios]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
