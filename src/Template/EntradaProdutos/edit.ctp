<div class="entradaProdutos form large-9 medium-8 columns content">
    <?= $this->Form->create($entradaProduto) ?>
    <fieldset>
        <legend><?= __('Edit Entrada Produto') ?></legend>
        <?php
            echo $this->Form->input('qtde');
            echo $this->Form->input('data');
            echo $this->Form->input('produto_id', ['options' => $produtos]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
