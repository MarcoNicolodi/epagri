<div class="row">
    <div class="col-md-12">
        <h2 class="page-header"> Propriedades </h2>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-green">
            <div class="panel-heading">
                <h3 class="panel-title"> Nova Propriedade </h2>
            </div>
        <div class="panel-body">
            <?= $this->Form->create($propriedade) ?>
            <div class="form-group">
                <?= $this->Form->input('nome',['class' => 'form-control']); ?>
            </div>
            <div class="form-group">
                <?= $this->Form->input('tamanho',['class' => 'form-control']); ?>
            </div>
            <div class="form-group">
                <?= $this->Form->input('usuario_id',['class' => 'form-control']); ?>
            </div>
            <div class="form-group">
                <?= $this->Form->input('endereço',['class' => 'form-control']); ?>
            </div>
            <div class="form-group">
                <?= $this->Form->input('cidade_id',['class' => 'form-control']); ?>
            </div>
            <?= $this->Form->button('Cadastrar', ['class' => 'btn btn-lg btn-primary btn-default']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
