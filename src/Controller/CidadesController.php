<?php
namespace App\Controller;

use App\Controller\AppController;

class CidadesController extends AppController
{
    //método sem view para ser usado com AJAX
    public function getByEstado($estado_id)
    {
        $cidades = $this->Cidades->find()->where(['estado_id' => $estado_id]);
        $this->set('cidades', $cidades);
        $this->set('_serialize',['cidades']);
    }
}
