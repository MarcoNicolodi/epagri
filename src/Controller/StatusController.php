<?php
namespace App\Controller;

use App\Controller\AppController;

class StatusController extends AppController
{

    public function index()
    {
        $this->set('status', $this->paginate($this->Status));
        $this->set('_serialize', ['status']);
    }

    public function view($id = null)
    {
        $status = $this->Status->get($id, [
            'contain' => ['Ciclos']
        ]);
        $this->set('status', $status);
        $this->set('_serialize', ['status']);
    }

    public function add()
    {
        $status = $this->Status->newEntity();
        if ($this->request->is('post')) {
            $status = $this->Status->patchEntity($status, $this->request->data);
            if ($this->Status->save($status)) {
                $this->Flash->success(__('Status cadastrado com sucesso.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Ocorreu um problema ao tentar cadastrar o status. Por favor, tente novamente.'));
            }
        }
        $this->set(compact('status'));
        $this->set('_serialize', ['status']);
    }

    public function edit($id = null)
    {
        $status = $this->Status->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $status = $this->Status->patchEntity($status, $this->request->data);
            if ($this->Status->save($status)) {
                $this->Flash->success(__('Status atualizado com sucesso.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Ocorreu um problema ao tentar atualizar o status. Por favor, tente novamente.'));
            }
        }
        $this->set(compact('status'));
        $this->set('_serialize', ['status']);
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $status = $this->Status->get($id);
        if ($this->Status->delete($status)) {
            $this->Flash->success(__('Status excluido com sucesso.'));
        } else {
            $this->Flash->error(__('Ocorreu um problema ao tentar excluir o status. Por favor, tente novamente.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
