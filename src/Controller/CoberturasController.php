<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Coberturas Controller
 *
 * @property \App\Model\Table\CoberturasTable $Coberturas
 */
class CoberturasController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('coberturas', $this->paginate($this->Coberturas));
        $this->set('_serialize', ['coberturas']);
    }

    /**
     * View method
     *
     * @param string|null $id Cobertura id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $cobertura = $this->Coberturas->get($id, [
            'contain' => ['Tanques']
        ]);
        $this->set('cobertura', $cobertura);
        $this->set('_serialize', ['cobertura']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $cobertura = $this->Coberturas->newEntity();
        if ($this->request->is('post')) {
            $cobertura = $this->Coberturas->patchEntity($cobertura, $this->request->data);
            if ($this->Coberturas->save($cobertura)) {
                $this->Flash->success(__('The cobertura has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The cobertura could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('cobertura'));
        $this->set('_serialize', ['cobertura']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Cobertura id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $cobertura = $this->Coberturas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cobertura = $this->Coberturas->patchEntity($cobertura, $this->request->data);
            if ($this->Coberturas->save($cobertura)) {
                $this->Flash->success(__('The cobertura has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The cobertura could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('cobertura'));
        $this->set('_serialize', ['cobertura']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Cobertura id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $cobertura = $this->Coberturas->get($id);
        if ($this->Coberturas->delete($cobertura)) {
            $this->Flash->success(__('The cobertura has been deleted.'));
        } else {
            $this->Flash->error(__('The cobertura could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
