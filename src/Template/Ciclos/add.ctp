<div class="ciclos form large-9 medium-8 columns content">
    <?= $this->Form->create($ciclo) ?>
    <fieldset>
        <legend><?= __('Add Ciclo') ?></legend>
        <?php
            echo $this->Form->input('tanque_id', ['options' => $tanques]);
            echo $this->Form->input('data_inicio');
            echo $this->Form->input('povoamento_inicio');
            echo $this->Form->input('status_id', ['options' => $status]);
            echo $this->Form->input('data_fim', ['empty' => true, 'default' => '']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
