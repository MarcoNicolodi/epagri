<div class="row">
    <div class="col-md-12">
        <h2 class="page-header"> Coberturas </h2>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-green">
            <div class="panel-heading">
                <h3 class="panel-title"> Editar Cobertura </h3>
            </div>
            <div class="panel-body">
                <?= $this->Form->create($cobertura) ?>
                <div class="form-group">
                    <?= $this->Form->input('nome', ['class' => 'form-control']); ?>
                </div>
                <div class="form-group">
                    <?= $this->Form->input('descricao', ['class' => 'form-control', 'label'=>'Descrição']); ?>
                </div>
                <?= $this->Form->button('Editar', ['class' => 'btn btn-lg btn-primary btn-default']) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>
