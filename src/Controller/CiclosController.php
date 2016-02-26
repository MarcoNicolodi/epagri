<?php
namespace App\Controller;

use App\Controller\AppController;

class CiclosController extends AppController
{

    public function isAuthorized($user = null)
    {
        parent::isAuthorized($this->Auth->user());

        if($this->request->action == 'index' || $this->request->action == 'add'){
            return true;
        }

        if($this->Ciclos->getOwner($this->request->params['pass'][0]) == $this->Auth->user('id_usuario'))
            return true;

        return false;
    }

    //método sem view para usar com ajax
    public function getAtivosByTanque($tanque_id)
    {
        $ciclos = $this->Ciclos->find()->where(['tanque_id' => $tanque_id, 'status_id' => 1]);
        $this->set('ciclos',$ciclos);
        $this->set('_serialize',['ciclos']);
    }

    public function index()
    {
        $this->paginate = [
            'contain' => ['Tanques', 'Status']
        ];
        if($this->Auth->user('autorizacao') == 'produtor'){
            $this->set('ciclos', $this->paginate($this->Ciclos->find()->matching('Tanques.Propriedades',function($q){
                return $q->where(['Propriedades.usuario_id' => $this->Auth->user('id_usuario')]);
            })));
        } else {
            $this->set('ciclos', $this->paginate($this->Ciclos));
        }
        $this->set('_serialize', ['ciclos']);
    }

    public function view($id = null)
    {
        $ciclo = $this->Ciclos->get($id, [
            'contain' => ['Tanques', 'Status', 'EspeciesCategoriasCultivos', 'Visitas' => ['Notificacoes']]
        ]);
        $this->set('ciclo', $ciclo);
        $this->set('_serialize', ['ciclo']);
    }

    public function add()
    {
        $ciclo = $this->Ciclos->newEntity();
        if ($this->request->is('post')) {
            $ciclo = $this->Ciclos->patchEntity($ciclo, $this->request->data);
            if ($this->Ciclos->save($ciclo)) {
                $this->Flash->success(__('Ciclo cadastrado com sucesso.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Ocorreu um erro ao tentar cadastrar o ciclo. Por favor, tente novamente.'));
            }
        }

        if($this->Auth->user('autorizacao') == 'produtor'){
            $propriedades = $this->Ciclos->Tanques->Propriedades->find('list')->where(['usuario_id' => $this->Auth->user('id_usuario')]);
        } else {
            $propriedades = $this->Ciclos->Tanques->Propriedades->find('list');
        }
        // $tanques = $this->Ciclos->Tanques->find('list')->notMatching('Ciclos', function ($q) {
        //                                                 return $q->where(['Ciclos.status_id' => 1]);
        //                                             });
        $status = $this->Ciclos->Status->find('list',['order' => 'nome']);
        $this->set(compact('ciclo',  'status','propriedades'));
        $this->set('_serialize', ['ciclo']);
    }

    public function edit($id = null)
    {
        $ciclo = $this->Ciclos->get($id, [
            'contain' => []
        ]);
        $ciclo->data_inicio = $ciclo->data_inicio->format('d/m/Y');
        $ciclo->data_fim->format('d/m/Y');
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ciclo = $this->Ciclos->patchEntity($ciclo, $this->request->data);
            if ($this->Ciclos->save($ciclo)) {
                $this->Flash->success(__('Ciclo atualizado com sucesso.'));
                return $this->redirect(['action' => 'index']);
            } else {
                debug($ciclo);
                $this->Flash->error('Ocorreu um problema ao tentar atualizar o Ciclo. Por favor, tente novamente');
            }
        }
        $tanques = $this->Ciclos->Tanques->find('list');
        $status = $this->Ciclos->Status->find('list');
        $this->set(compact('ciclo', 'tanques', 'status'));
        $this->set('_serialize', ['ciclo']);
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ciclo = $this->Ciclos->get($id);
        if ($this->Ciclos->delete($ciclo)) {
            $this->Flash->success(__('Ciclo excluído com sucesso.'));
        } else {
            $this->Flash->error(__('Ocorreu um problema ao tentar excluir o Ciclo. Por favor, tente novamente.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
