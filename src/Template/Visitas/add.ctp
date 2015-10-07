<div class="row">
    <div class="col-md-12">
        <h2 class="page-header"> Visitas </h2>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h3 class="panel-title"> Nova Visita </h3>
            </div>
            <div class="panel-body">
                <?= $this->Form->create($visita) ?>
                    <div class="form-group">
                        <?=  $this->Form->input('ciclo', ['class' => 'form-control']); ?>
                    </div>
                    <div class="form-group">
                        <?=  $this->Form->input('oxigenio_agua', ['class' => 'form-control', 'label' => 'Nível de Oxigenação da Água']); ?>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->input('ionizacao_agua', ['class' => 'form-control', 'label' => 'Nível de Ionização da Água']); ?>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->input('temperatura_agua' , ['class' => 'form-control', 'label' => 'Temperatura da Água']); ?>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->input('largura_peixes', ['class' => 'form-control']); ?>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->input('peso_peixes', ['class' => 'form-control']); ?>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->input('data', ['type' => 'text', 'class' => 'form-control datepicker']); ?>
                    </div>
                <?= $this->Form->button('Cadastrar', ['class' => 'btn btn-lg btn-primary btn-default']) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>
