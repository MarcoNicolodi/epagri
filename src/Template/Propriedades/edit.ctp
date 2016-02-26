<div class="row">
    <div class="col-md-12">
        <h2 class="page-header"> Propriedades <small class="pull-right"> <?= $propriedade->nome ?></small></h2>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-green">
            <div class="panel-heading">
                <h3 class="panel-title"> Editar Propriedade </h2>
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
                <?= $this->Form->input('endereco',['class' => 'form-control']); ?>
            </div>
            <div class="form-group">
                <?= $this->Form->input('estado_id',['options' => $estados, 'class' => 'form-control']); ?>
            </div>
            <div class="form-group">
                <?= $this->Form->input('cidade_id',['class' => 'form-control']); ?>
            </div>
            <?= $this->Form->button('Editar', ['class' => 'btn btn-lg btn-primary btn-default']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
<?php $this->start('script'); ?>
<?= $this->fetch('script'); ?>
<script type="text/javascript">
    $("select[name='estado_id']").change(function(){
        $.ajax({
            url: "<?= $this->Url->build(['controller' => 'Cidades','action' => 'getByEstado'])?>"+"/"+this.value+".json",
            success: function(data){
                $("select[name='cidade_id']").empty();
                $.each(data.cidades, function(k,v){
                    console.log(v.id, v.nome);
                    $("select[name='cidade_id']").append("<option value='"+v.id+"'>"+v.nome+"</option>");
                })
            },
            error: function(e){
                console.log("Erro: "+e);
            }
        });
    });
</script>
<?php $this->end(); ?>
