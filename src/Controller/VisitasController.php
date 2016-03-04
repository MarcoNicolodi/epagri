<?php
namespace App\Controller;

use App\Controller\AppController;

class VisitasController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        $this->LoadComponent('Notificador');
    }

    public function isAuthorized($user = null)
    {
        parent::isAuthorized($this->Auth->user());

        if($this->request->params['action'] == 'index' || $this->request->params['action'] == 'add')
            return true;

        return $this->Visitas->getOwner($this->request->params['pass'][0]) == $this->Auth->user('id_usuario');
    }

    public function index()
    {
        $this->paginate = [
            'contain' => ['Ciclos']
        ];
        $this->set('visitas', $this->paginate($this->Visitas));
        $this->set('_serialize', ['visitas']);
    }

    public function view($id = null)
    {
        $visita = $this->Visitas->get($id, [
            'contain' => ['Ciclos' =>['Tanques' =>['Propriedades']], 'Notificacoes']
        ]);
        $medias = $this->Visitas->getAllMedias($this->Visitas->getCicloId($id));
        $this->set(compact('visita', 'medias'));
        $this->set('_serialize', ['visita']);
    }

    public function add()
    {
        $visita = $this->Visitas->newEntity();
        if ($this->request->is('post')) {
            $visita = $this->Visitas->patchEntity($visita, $this->request->data);

            if ($this->Visitas->save($visita)){
                $notificacao = $this->Visitas->Notificacoes->newEntity();
                foreach($this->Notificador->notificar($this->request->data) as $k=>$v){
                    $notificacao_data[$k] = $v;
                }
                $notificacao_data['visita_id'] = $visita->id;
                $notificacao = $this->Visitas->Notificacoes->patchEntity($notificacao,$notificacao_data);

                if($this->Visitas->Notificacoes->save($notificacao)){
                    $this->Flash->success(__('As notificações foram geradas com sucesso.'));
                } else {
                    $this->Flash->error(__('Ocorreu um erro ao tentar gerar as notificações dessa visita.'));
                }
                $this->Flash->success(__('Os dados da visita foram salvos.'));
                return $this->redirect(['action' => 'view', $visita->id]);
            } else {
                $this->Flash->error(__('Ocorreu um erro ao tentar salvar os dados da visita. Por favor, tente novamente.'));
            }
        }
        $usuarios = $this->Visitas->Ciclos->Tanques->Propriedades->Usuarios->find('list');
        $this->set(compact('visita', 'usuarios'));
        $this->set('_serialize', ['visita']);
    }

    public function edit($id = null)
    {
        $visita = $this->Visitas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $visita = $this->Visitas->patchEntity($visita, $this->request->data);
            if ($this->Visitas->save($visita)) {
                $this->Flash->success(__('Visita atualizada com sucesso.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Ocorreu um problema ao tentar atualizar a visita. Por favor, tente novamente.'));
            }
        }
        $ciclos = $this->Visitas->Ciclos->find('list', ['limit' => 200]);
        $this->set(compact('visita', 'ciclos', 'parametrosIdeais'));
        $this->set('_serialize', ['visita']);
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $visita = $this->Visitas->get($id);
        if ($this->Visitas->delete($visita)) {
            $this->Flash->success(__('Visita excluída com sucesso.'));
        } else {
            $this->Flash->error(__('Ocorreu um problema ao tentar excluir a visita. Por favor, tente novamente.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
