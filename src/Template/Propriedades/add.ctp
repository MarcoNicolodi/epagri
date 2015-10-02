<div class="propriedades form large-9 medium-8 columns content">
    <?= $this->Form->create($propriedade) ?>
    <fieldset>
        <legend><?= __('Add Propriedade') ?></legend>
        <?php
            echo $this->Form->input('nome');
            echo $this->Form->input('tamanho');
            echo $this->Form->input('usuario_id', ['options' => $usuarios]);
            echo $this->Form->input('endereco');
            echo $this->Form->input('cidade_id', ['options' => $cidades, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
