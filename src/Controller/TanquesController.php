<?php
namespace App\Controller;

use App\Controller\AppController;

class TanquesController extends AppController
{

    //TODO arrumar autorizacao para metodos ajax
    public function isAuthorized($user = null)
    {
        if(parent::isAuthorized($this->Auth->user()))
            return true;

        if($this->request->params['action'] == 'index' || $this->request->params['action'] == 'add'){
            return true;
        }

        if($this->request->params['action'] == 'getInativosByPropriedade' || $this->request->params['action'] == 'getAtivosByPropriedade'){
            return $this->Tanques->Propriedades->getOwner($this->request->params['pass'][0]) == $this->Auth->user('id_usuario');
        }

        //checa se o tanque passado por parametro pertence a uma propriedade do usuario logado
        return $this->Tanques->getOwner($this->request->params['pass'][0]) == $this->Auth->user('id_usuario');
    }

    //método sem view para usar com AJAX
    //retorna tanques que nao estao participando de ciclos
    public function getInativosByPropriedade($propriedade_id)
    {
        $tanques = $this->Tanques->find()->where(['propriedade_id' => $propriedade_id])->notMatching('Ciclos', function ($q) {
                                                        return $q->where(['Ciclos.status_id' => 1]);
                                                    });

        $this->set('tanques',$tanques);
        $this->set('_serialize',['tanques']);
    }

    //retorna tanques que estao participando de ciclos
    public function getAtivosByPropriedade($propriedade_id)
    {
        $tanques = $this->Tanques->find()->where(['propriedade_id' => $propriedade_id])->matching('Ciclos', function ($q) {
                                                        return $q->where(['Ciclos.status_id' => 1]);
                                                    });
        $this->set('tanques',$tanques);
        $this->set('_serialize',['tanques']);
    }

    public function index()
    {
        $this->paginate = [
            'contain' => ['Coberturas', 'Propriedades']
        ];

        if($this->Auth->user('autorizacao') == 'admin' || $this->Auth->user('autorizacao') == 'epagri'){
            $this->set('tanques', $this->paginate($this->Tanques));
        } else {
            $this->set('tanques', $this->paginate($this->Tanques->find()->matching('Propriedades',function($q){
                                                                                        return $q->where(['Propriedades.usuario_id' => $this->Auth->user('id_usuario')]);
                                                                                    })));
        }
        $this->set('_serialize', ['tanques']);
    }

    public function view($id = null)
    {
        $tanque = $this->Tanques->get($id, [
            'contain' => ['Coberturas', 'Propriedades' => ['Usuarios'], 'Ciclos' => ['Status']]
        ]);
        $this->set('tanque', $tanque);
        $this->set('_serialize', ['tanque']);
    }

    public function add()
    {
        $tanque = $this->Tanques->newEntity();
        if ($this->request->is('post')) {
            $tanque = $this->Tanques->patchEntity($tanque, $this->request->data);
            if ($this->Tanques->save($tanque)) {
                $this->Flash->success(__('Tanque cadastrado com sucesso.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Ocorreu um problema ao tentar cadastrar o tanque. Por favor, tente novamente.'));
            }
        }
        $coberturas = $this->Tanques->Coberturas->find('list',['order' => 'nome']);

        if($this->Auth->user('autorizacao') == 'produtor'){
            $usuarios = $this->Tanques->Propriedades->Usuarios->find('list')->where(['id_usuario' => $this->Auth->user('id_usuario')]);

        } else {
            $usuarios = $this->Tanques->Propriedades->Usuarios->find('list', ['limit' => 200,'order' => 'username']);
        }
        $this->set(compact('tanque', 'coberturas', 'usuarios'));
        $this->set('_serialize', ['tanque']);
    }

    public function edit($id = null)
    {
        $tanque = $this->Tanques->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tanque = $this->Tanques->patchEntity($tanque, $this->request->data);
            debug($tanque);
            if ($this->Tanques->save($tanque)) {
                $this->Flash->success(__('Tanque atualizado com sucesso.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Ocorreu um problema ao tentar atualizar o tanque. Por favor, tente novamente.'));
            }
        }

        $coberturas = $this->Tanques->Coberturas->find('list', ['limit' => 200, 'order' => 'nome']);
        $this->set(compact('tanque', 'coberturas', 'propriedades'));
        $this->set('_serialize', ['tanque']);
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tanque = $this->Tanques->get($id);
        if ($this->Tanques->delete($tanque)) {
            $this->Flash->success(__('Tanque excluído com sucesso.'));
        } else {
            $this->Flash->error(__('Ocorreu um problema ao tentar excluir o tanque. Por favor, tente novamente.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
