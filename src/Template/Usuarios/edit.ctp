<div class="row">
    <div class="col-md-12">
        <h2 class="page-header"> Usuários </h2>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-green">
            <div class="panel-heading">
                <h3 class="panel-title"> Editar Usuário </h2>
            </div>
            <div class="panel-body">
                <?= $this->Form->create($usuario) ?>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <?= $this->Form->input('username', ['class' => 'form-control', 'label' => 'Nome']); ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <?= $this->Form->input('sobrenome', ['class' => 'form-control']); ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <?= $this->Form->input('password', ['class' => 'form-control', 'label' => 'Senha']); ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <?= $this->Form->input('password2', ['class' => 'form-control', 'label' => 'Confirmar Senha']); ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <?= $this->Form->input('telefone1', ['class' => 'form-control', 'label' => 'Telefone 1']); ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <?= $this->Form->input('telefone2', ['class' => 'form-control', 'label' => 'Telefone 2']); ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <?= $this->Form->input('email', ['class' => 'form-control']); ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <?= $this->Form->input('autorizacao', ['class' => 'form-control', 'label' => 'Autorização']); ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <?= $this->Form->input('endereco', ['class' => 'form-control', 'label' => 'Logradouro']); ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <?= $this->Form->input('bairro', ['class' => 'form-control']); ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <?= $this->Form->input('estado_id', ['options' => [], 'class' => 'form-control', 'empty' => true]); ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <?= $this->Form->input('cidade_id', ['options' => [], 'class' => 'form-control', 'empty' => true]); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <?= $this->Form->button('Editar',['class' => 'btn btn-primary btn-lg']) ?>
                </div>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>
