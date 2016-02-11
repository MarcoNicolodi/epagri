<?php
namespace App\Controller;

use App\Controller\AppController;

class TanquesController extends AppController
{

    //TODO arrumar autorizacao para metodos ajax
    public function isAuthorized($user = null)
    {
        parent::isAuthorized($this->Auth->user());

        if($this->request->params['action'] == 'index'){
            return true;
        }

        //checa se o tanque passado por parametro pertence a uma propriedade do usuario logado
        return $check = $this->Tanques->find()->where(['Tanques.id' => $this->request->params['pass'][0]])->matching('Propriedades',function($q){
                                                                                        return $q->where(['Propriedades.usuario_id' => $this->Auth->user('id_usuario')]);
                                                                                    })->count() > 0;


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
        $usuarios = $this->Tanques->Propriedades->Usuarios->find('list', ['order' => 'username']);
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
            if ($this->Tanques->save($tanque)) {
                $this->Flash->success(__('Tanque atualizado com sucesso.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Ocorreu um problema ao tentar atualizar o tanque. Por favor, tente novamente.'));
            }
        }
        $coberturas = $this->Tanques->Coberturas->find('list', ['limit' => 200]);
        $propriedades = $this->Tanques->Propriedades->find('list', ['limit' => 200]);
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
