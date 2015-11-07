<div class="row">
    <div class="col-md-12">
        <h2 class="page-header"> Tanques </h2>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-green">
            <div class="panel-heading">
                <h3 class="panel-title"> Editar Tanque </h2>
            </div>
            <div class="panel-body">
                <?= $this->Form->create($tanque) ?>
                <div class="form-group">
                    <?=  $this->Form->input('usuario_id', ['options' => $usuarios, 'class' => 'form-control', 'label' => 'Produtor']); ?>
                </div>
                <div class="form-group">
                    <?=  $this->Form->input('propriedade_id', ['options' => [null => 'Selecione um produtor' ], 'class' => 'form-control']); ?>
                </div>
                <div class="form-group">
                    <?= $this->Form->input('cobertura_id', ['options' => $coberturas, 'empty' => true, 'class' => 'form-control']); ?>
                </div>
                <div class="form-group">
                    <?= $this->Form->input('capacidade', ['class' => 'form-control']); ?>
                </div>
                <div class="form-group">
                    <?= $this->Form->input('nome', ['class' => 'form-control']); ?>
                </div>
                <?= $this->Form->button('Editar', ['class' => 'btn btn-lg btn-primary btn-default']) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>
