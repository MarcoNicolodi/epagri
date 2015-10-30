<div class="row">
    <div class="col-md-12">
        <h2 class="page-header"> Ciclos </h2>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-green">
            <div class="panel-heading">
                <h3 class="panel-title"> Novo Ciclo </h2>
            </div>
            <div class="panel-body">
                <?= $this->Form->create($ciclo) ?>
                <div class="form-group">
                    <?= $this->Form->input('tanque_id', ['options' => $tanques,'class' => 'form-control']); ?>
                </div>
                <div class="form-group">
                    <?= $this->Form->input('nome', ['class' => 'form-control']); ?>
                </div>
                <div class="form-group">
                    <?= $this->Form->input('data_inicio', ['type' => 'text', 'class' => 'form-control datepicker']); ?>
                </div>
                <div class="form-group">
                    <?= $this->Form->input('povoamento_inicio', ['class' => 'form-control']); ?>
                </div>
                <div class="form-group">
                    <?= $this->Form->input('status_id', ['options' => $status, 'class' => 'form-control']); ?>
                </div>
                <div class="form-group">
                    <?= $this->Form->input('data_fim', ['type' => 'text', 'class' => 'form-control datepicker']); ?>
                </div>
                <?= $this->Form->button('Cadastrar', ['class' => 'btn btn-lg btn-primary btn-default ']) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div<
