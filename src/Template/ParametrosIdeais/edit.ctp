<div class="row">
    <div class="col-md-12">
        <h2 class="page-header"> Parâmetros Ideais </h2>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-green">
            <div class="panel-heading">
                <h3 class="panel-title"> Editar Parâmetros Ideais </h3>
            </div>
            <div class="panel-body">
                <?= $this->Form->create($parametrosIdeal) ?>
                <div class="form-group">
                    <?= $this->Form->input('oxigenio_agua', ['class' => 'form-control', 'label' => 'Nível Ideal de Oxigênio na Água (em ppm)']); ?>
                </div>
                <div class="form-group">
                    <?= $this->Form->input('ionizacao_agua', ['class' => 'form-control', 'label' => 'Nível Ideal de Ionização da Água']); ?>
                </div>
                <div class="form-group">
                    <?= $this->Form->input('amonia_agua', ['class' => 'form-control', 'label' => 'Nível Ideal de Amônia na Água']); ?>
                </div>
                <div class="form-group">
                    <?= $this->Form->input('temperatura_agua', ['class'=>'form-control', 'label' => 'Temperatura Ideal da Água']); ?>
                </div>
                <div class="form-group">
                    <?= $this->Form->input('largura_peixes', ['class'=>'form-control', 'label' => 'Largura Ideal dos Peixes']); ?>
                </div>
                <div class="form-group">
                    <?= $this->Form->input('peso_peixes', ['class'=>'form-control', 'label' => 'Peso Ideal dos Peixes']); ?>
                </div>


                <?= $this->Form->button('Editar',['class'=>'btn btn-lg btn-primary btn-default']) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>
