<!-- Modal Calcular Média de Peso dos Peixes-->
<div class="modal fade" id="calc-peso-modal" tabindex="-1" role="dialog" aria-labelledby="calc-peso-modalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Calcular Peso Médio dos Peixes</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label> Peso </label>
                    <input class="form-control" name="peso_peixes[]">
                    <a class="btn btn-danger" > <i class="fa fa-minus"></i></a>
                </div>
            </div>
            <div id="teste">
            </div>
            <div class="modal-footer">
                <div class="pull-left">
                    <a class="btn btn-success" onClick="duplicateNode()"> <i class="fa fa-plus"></i></a>
                </div>
                <button type="button" class="btn btn-warning" data-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary btn-default" onClick="calculateFishWeight()">Calcular</button>
            </div>
        </div>
    </div>
</div>
<!--- Fim Modal -->

<div class="row">
    <div class="col-md-12">
        <h2 class="page-header"> Visitas </h2>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h3 class="panel-title"> Ações </h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-3">
                        <button class="btn btn-primary btn-default btn-block" data-toggle="modal" data-target="#calc-peso-modal"> Calcular média de peso dos peixes </button>
                    </div>
                    <div class="col-md-3">
                        <button class="btn btn-primary btn-default btn-block" data-toggle="modal" data-target="#calc-altura-modal"> Calcular média de altura dos peixes </button>
                    </div>
                </div>
            </div>
        </div>
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
                        <?= $this->Form->input('largura_peixes', ['class' => 'form-control', 'label' => 'Largura Média dos Peixes']); ?>
                    </div>

                    <div class="form-group">
                        <?= $this->Form->input('peso', ['class' => 'form-control', 'label' => 'Peso Médio dos Peixes']); ?>
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
<?php $this->start('script'); ?>
<?= $this->fetch('script'); ?>
<script type="text/javascript">

        // function deleteNode(){
        //     $(event.target).parent().remove();
        // }

        function duplicateNode(){
            $(".modal-body").append('<div class=\"form-group\"><label> Peso </label><input class=\"form-control\" name=\"peso_peixes[]\"><a class=\"btn btn-danger\" onClick=\"deleteNode(this)\"><i class=\"fa fa-minus\"></i></a></div>');
        }

        function deleteNode(elt){
            $(elt).closest("div").remove();
        }

        function calculateFishWeight(){
            inputs = document.getElementsByName('peso_peixes[]');
            count = 0;
            soma = 0;
            for(i=0; i<=inputs.length-1; i++){
                soma += parseFloat(inputs[i].value);
                count++;
            }
            media = soma/count;
            console.log(media);
        }


</script>
<?php $this->end(); ?>
