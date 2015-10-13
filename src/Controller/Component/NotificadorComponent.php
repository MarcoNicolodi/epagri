<?php

namespace App\Controller\Component;
use Cake\Controller\Component;

/* Componente que recebe os dados inseridos na visita e notifica ao produtor rural quais medidas tomar */
class NotificadorComponent extends Component
{
    public function notificar($data)
    {
        $message = [];

        if($data['temperatura_agua'] >= 25){
            $message['alimentacao'] = 'Alimentar os peixes com quantidade de ração equivalente a 3% da biomassa';
            $message['alerta_alimentacao'] = 'success';
        } else if($data['temperatura_agua'] >= 20 && $data['temperatura_agua'] < 25){
            $message['alimentacao'] = 'Alimentar os peixes com quantidade de ração equivalente a 2.4% da biomassa';
            $message['alerta_alimentacao'] = 'warning';
        } else if($data['temperatura_agua'] >=16 && $data['temperatura_agua'] < 20){
            $message['alimentacao'] = 'Alimentar os peixes com quantidade de ração equivalente a 1.8% da biomassa';
            $message['alerta_alimentacao'] = 'warning';
        } else if($data['temperatura_agua'] >= 13 && $data['temperatura_agua'] < 16){
            $message['alimentacao'] = 'Alimentar os peixes com quantidade de ração equivalente a 1.2% da biomassa';
            $message['alerta_alimentacao'] = 'warning';
        } else  {
            $message['alimentacao'] = 'Não alimentar os peixes';
            $message['alerta_alimentacao'] = 'danger';
        }

        if($data['oxigenio_agua'] >= 4){
            $message['aeradores'] = 'Não é necessário ligar os aeradores';
            $message['alerta_aeradores'] = 'success';
        } else if($data['oxigenio_agua'] >= 3 && $data['oxigenio_agua'] < 4){
            $message['aeradores'] = 'Ligar aeradores durante a noite';
            $message['alerta_aeradores'] = 'warning';
        } else if($data['oxigenio_agua'] >= 2 && $data['oxigenio_agua'] < 3){
            $message['aeradores'] = 'Ligar aeradores';
            $message['alerta_aeradores'] = 'warning';
        } else if($data['oxigenio_agua'] < 2){
            $message['aeradores'] = 'Renovar água';
            $message['alerta_aeradores'] = 'danger';
            $message['alimentacao'] = 'Não alimentar os peixes';
            $message['alerta_alimentacao'] = 'danger';
        }

    }
}
