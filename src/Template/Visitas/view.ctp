<div class="row">
    <div class="col-md-12">
        <h2 class="page-header"> Visitas <small> <?= h($visita->ciclo->tanque->propriedade->nome) ?></small> <small class="pull-right"> <?= h($visita->data)?> </small></h2>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <h3 class="panel-title"> Dados da visita </h3>
            </div>
            <div class="panel-body">
                <table class="table table-striped">
                    <tr>
                        <th><?= __('Ciclo') ?></th>
                        <td><?= $visita->has('ciclo') ? $this->Html->link($visita->ciclo->id, ['controller' => 'Ciclos', 'action' => 'view', $visita->ciclo->id]) : '' ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Nível de oxigênio da água') ?></th>
                        <td><?= $this->Number->format($visita->oxigenio_agua) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Nível de ionização da água') ?></th>
                        <td><?= $this->Number->format($visita->ionizacao_agua) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Temperatura da água') ?></th>
                        <td><?= $this->Number->format($visita->temperatura_agua) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Largura média dos peixes') ?></th>
                        <td><?= $this->Number->format($visita->largura_peixes) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Peso médio dos peixes') ?></th>
                        <td><?= $this->Number->format($visita->peso_peixes) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Data') ?></th>
                        <td><?= $this->Time->format($visita->data,'dd/MM/yyyy'); ?></tr>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="panel <?= $visita->notificacao->alerta_aeradores == 'success' ? 'panel-green' : ($visita->notificacao->alerta_aeradores == 'warning' ? 'panel-yellow' : 'panel-red') ?>">
            <div class="panel-heading">
                <h3 class="panel-title"> Aeradores </h3>
            </div>
            <div class="panel-body">
                <p><?= $visita->notificacao->aeradores ?></p>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="panel <?= $visita->notificacao->alerta_alimentacao == 'success' ? 'panel-green' : ($visita->notificacao->alerta_alimentacao == 'warning' ? 'panel-yellow' : 'panel-red') ?>">
            <div class="panel-heading">
                <h3 class="panel-title"> Alimentação </h3>
            </div>
            <div class="panel-body">
                <p><?= $visita->notificacao->alimentacao ?></p>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-3">
        <div class="panel panel-green">
            <div class="panel-heading">
                <h3 class="panel-title">Peso dos peixes</h3>
            </div>
            <div class="panel-body">
                <canvas id="chartPesoPeixes" width="150" height="150"></canvas>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="panel panel-green">
            <div class="panel-heading">
                <h3 class="panel-title">Largura dos peixes</h3>
            </div>
            <div class="panel-body">
                <canvas id="chartLarguraPeixes" width="150" height="150"></canvas>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="panel panel-green">
            <div class="panel-heading">
                <h3 class="panel-title">Temperatura da Água</h3>
            </div>
            <div class="panel-body">
                <canvas id="chartTemperaturaAgua" width="150" height="150"></canvas>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="panel panel-green">
            <div class="panel-heading">
                <h3 class="panel-title">Ionizacao da Água</h3>
            </div>
            <div class="panel-body">
                <canvas id="chartIonizacaoAgua" width="150" height="150"></canvas>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="panel panel-green">
            <div class="panel-heading">
                <h3 class="panel-title">Oxigenacao da Agua</h3>
            </div>
            <div class="panel-body">
                <canvas id="chartOxigenioAgua" width="150" height="150"></canvas>
            </div>
        </div>
    </div>
</div>







<?php $this->start('script'); ?>
<?= $this->fetch('script'); ?>
<script type="text/javascript">
    $(document).ready(function(){
        $.ajax({
            method: 'GET',
            url: "<?= $this->Url->build(['controller' => 'Visitas', 'action' => 'getCharts', $visita->id,  'all', '_ext' => 'json'])?>",
            success: function(data){
                var chartData = [];
                chartData.labels = ['Visita','Média'];
                chartData.datasets = [];
                var datasets =
                    {
                        //data: [data.response.chart.data.visita,data.response.chart.data.media],
                        label: "Dados visita",
                        fillColor: "rgba(255,0,0,0.3)",
                        strokeColor: "rgba(220,220,220,0.8)",
                        highlightFill: "rgba(220,220,220,0.75)",
                        highlightStroke: "rgba(220,220,220,1)"
                    };
                var data_chart_peso_peixes = {data:[data.response.chart.data.visita.peso_peixes,data.response.chart.data.medias.media_peso_peixes]};
                var data_chart_largura_peixes = {data:[data.response.chart.data.visita.largura_peixes,data.response.chart.data.medias.media_largura_peixes]};
                var data_chart_temperatura_agua = {data:[data.response.chart.data.visita.temperatura_agua,data.response.chart.data.medias.media_temperatura_agua]};
                var data_chart_oxigenio_agua = {data:[data.response.chart.data.visita.oxigenio_agua,data.response.chart.data.medias.media_oxigenacao_agua]};
                var data_chart_ionizacao_agua = {data:[data.response.chart.data.visita.ionizacao_agua,data.response.chart.data.medias.media_ionizacao_agua]};

                $.extend(datasets,data_chart_peso_peixes);
                var ctx = document.getElementById('chartPesoPeixes').getContext('2d');
                chartData.datasets.push(datasets);
                chart = new Chart(ctx).Bar(chartData,[]);

                $.extend(datasets,data_chart_largura_peixes);
                var ctx = document.getElementById('chartLarguraPeixes').getContext('2d');
                chartData.datasets = [datasets];
                chart = new Chart(ctx).Bar(chartData,[]);

                $.extend(datasets,data_chart_temperatura_agua);
                var ctx = document.getElementById('chartTemperaturaAgua').getContext('2d');
                chartData.datasets = [datasets];
                chart = new Chart(ctx).Bar(chartData,[]);

                $.extend(datasets,data_chart_ionizacao_agua);
                var ctx = document.getElementById('chartIonizacaoAgua').getContext('2d');
                chartData.datasets = [datasets];
                chart = new Chart(ctx).Bar(chartData,[]);

                $.extend(datasets,data_chart_oxigenio_agua);
                var ctx = document.getElementById('chartOxigenioAgua').getContext('2d');
                chartData.datasets = [datasets];
                chart = new Chart(ctx).Bar(chartData,[]);
            },
            error: function(e){
                console.log("Error: "+e);
            }
        });
    });
</script>
<?php $this->end(); ?>
