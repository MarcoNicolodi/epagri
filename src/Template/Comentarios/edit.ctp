<div class="comentarios form large-9 medium-8 columns content">
    <?= $this->Form->create($comentario) ?>
    <fieldset>
        <legend><?= __('Edit Comentario') ?></legend>
        <?php
            echo $this->Form->input('conteudo');
            echo $this->Form->input('data');
            echo $this->Form->input('usuario_id', ['options' => $usuarios]);
            echo $this->Form->input('tabela_id');
            echo $this->Form->input('tabela_nome');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
