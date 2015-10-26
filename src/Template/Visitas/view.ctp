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
                        <td><?= h($visita->data) ?></tr>
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
                <h3 class="panel-title"> Alimentacao </h3>
            </div>
            <div class="panel-body">
                <p><?= $visita->notificacao->alimentacao ?></p>
            </div>
        </div>
    </div>

</div>
