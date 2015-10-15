<div class="row">
    <div class="col-md-12">
        <h2 class="page-header"> Categorias de Cultivos </h2>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-green">
            <div class="panel-heading">
                <h3 class="panel-title"> Nova Categoria de Cultivo </h2>
            </div>
            <div class="panel-body">
                <?= $this->Form->create($categoriasCultivo) ?>
                <?php
                    echo $this->Form->input('nome');
                    echo $this->Form->input('descricao');
                    echo $this->Form->input('especies._ids', ['options' => $especies]);
                ?>
                <?= $this->Form->button('Cadastrar', ['btn btn-lg btn-primary btn-default']) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>
