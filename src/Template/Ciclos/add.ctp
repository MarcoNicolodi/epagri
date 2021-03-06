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
                    <?= $this->Form->input('propriedade_id', ['empty' => 'Selecione uma propriedade', 'options' => $propriedades,'class' => 'form-control']); ?>
                </div>
                <div class="form-group">
                    <?= $this->Form->input('tanque_id', ['options' => [null => 'Selecione uma propriedade'],'class' => 'form-control']); ?>
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
</div>
<?php $this->start('script'); ?>
<?= $this->fetch('script'); ?>
<script type="text/javascript">
    $("select[name='propriedade_id']").change(function(){
        if(!this.value.length){
            $("select[name='tanque_id']").empty();
            $("select[name='tanque_id']").append("<option value="+null+">Selecione uma propriedade</option>");
            return;
        }

        $.ajax({
            url: "<?= $this->Url->build(['controller' => 'Tanques','action' => 'getInativosByPropriedade'])?>"+"/"+this.value+".json",
            success: function(data){
                $("select[name='tanque_id']").empty();
                if(typeof data.tanques != undefined){
                    $.each(data.tanques, function(k,v){
                        console.log(v.id, v.nome);
                        $("select[name='tanque_id']").append("<option value='"+v.id+"'>"+v.nome+"</option>");
                    })
                } else {
                    $("select[name='tanque_id']").append("<option value="+null+">Selecione uma propriedade</option>");
                }
            },
            error: function(e){
                $("select[name='tanque_id']").append("<option value="+null+">Selecione uma propriedade</option>");
                console.log("Erro: "+e);
            }
        });
    });
</script>
<?php $this->end(); ?>
