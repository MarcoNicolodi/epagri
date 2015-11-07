<?php
namespace App\Controller;

use App\Controller\AppController;

class TanquesController extends AppController
{
    //método sem view para usar com AJAX
    //retorna tanque sque nao estao participando de ciclos
    public function getInativosByPropriedade($propriedade_id)
    {
        $tanques = $this->Tanques->find('list')->matching('Ciclos', function ($q) {
                                                        return $q->where(['Ciclos.status_id' => 2]);
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
        $this->set('tanques', $this->paginate($this->Tanques));
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
        $coberturas = $this->Tanques->Coberturas->find('list');
        $usuarios = $this->Tanques->Propriedades->Usuarios->find('list');
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
