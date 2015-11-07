<?php
namespace App\Controller;

use App\Controller\AppController;

class CoberturasController extends AppController
{
    public function index()
    {
        $this->set('coberturas', $this->paginate($this->Coberturas));
        $this->set('_serialize', ['coberturas']);
    }

    public function view($id = null)
    {
        $cobertura = $this->Coberturas->get($id, [
            'contain' => ['Tanques']
        ]);
        $this->set('cobertura', $cobertura);
        $this->set('_serialize', ['cobertura']);
    }

    public function add()
    {
        $cobertura = $this->Coberturas->newEntity();
        if ($this->request->is('post')) {
            $cobertura = $this->Coberturas->patchEntity($cobertura, $this->request->data);
            if ($this->Coberturas->save($cobertura)) {
                $this->Flash->success(__('Cobertura cadastrada com sucesso.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Ocorreu um problema ao tentar cadastrar a cobertura. Por favor, tente novamente.'));
            }
        }
        $this->set(compact('cobertura'));
        $this->set('_serialize', ['cobertura']);
    }

    public function edit($id = null)
    {
        $cobertura = $this->Coberturas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cobertura = $this->Coberturas->patchEntity($cobertura, $this->request->data);
            if ($this->Coberturas->save($cobertura)) {
                $this->Flash->success(__('Cobertura atualizada com sucesso.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Ocorreu um problema ao tentar atualizar a cobertura. Por favor, tente novamente.'));
            }
        }
        $this->set(compact('cobertura'));
        $this->set('_serialize', ['cobertura']);
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $cobertura = $this->Coberturas->get($id);
        if ($this->Coberturas->delete($cobertura)) {
            $this->Flash->success(__('Cobertura excluida com sucesso.'));
        } else {
            $this->Flash->error(__('Ocorreu um problema ao tentar excluir a cobertura. Por favor, tente novamente.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
