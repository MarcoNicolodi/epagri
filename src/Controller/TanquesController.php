<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Tanques Controller
 *
 * @property \App\Model\Table\TanquesTable $Tanques
 */
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

    public function index()
    {
        $this->paginate = [
            'contain' => ['Coberturas', 'Propriedades']
        ];
        $this->set('tanques', $this->paginate($this->Tanques));
        $this->set('_serialize', ['tanques']);
    }

    /**
     * View method
     *
     * @param string|null $id Tanque id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tanque = $this->Tanques->get($id, [
            'contain' => ['Coberturas', 'Propriedades', 'Ciclos']
        ]);
        $this->set('tanque', $tanque);
        $this->set('_serialize', ['tanque']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tanque = $this->Tanques->newEntity();
        if ($this->request->is('post')) {
            $tanque = $this->Tanques->patchEntity($tanque, $this->request->data);
            if ($this->Tanques->save($tanque)) {
                $this->Flash->success(__('The tanque has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The tanque could not be saved. Please, try again.'));
            }
        }
        $coberturas = $this->Tanques->Coberturas->find('list', ['limit' => 200]);
        $propriedades = $this->Tanques->Propriedades->find('list', ['limit' => 200]);
        $this->set(compact('tanque', 'coberturas', 'propriedades'));
        $this->set('_serialize', ['tanque']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Tanque id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tanque = $this->Tanques->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tanque = $this->Tanques->patchEntity($tanque, $this->request->data);
            if ($this->Tanques->save($tanque)) {
                $this->Flash->success(__('The tanque has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The tanque could not be saved. Please, try again.'));
            }
        }
        $coberturas = $this->Tanques->Coberturas->find('list', ['limit' => 200]);
        $propriedades = $this->Tanques->Propriedades->find('list', ['limit' => 200]);
        $this->set(compact('tanque', 'coberturas', 'propriedades'));
        $this->set('_serialize', ['tanque']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Tanque id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tanque = $this->Tanques->get($id);
        if ($this->Tanques->delete($tanque)) {
            $this->Flash->success(__('The tanque has been deleted.'));
        } else {
            $this->Flash->error(__('The tanque could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
