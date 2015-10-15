<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Ciclos Controller
 *
 * @property \App\Model\Table\CiclosTable $Ciclos
 */
class CiclosController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Tanques', 'Status']
        ];
        $this->set('ciclos', $this->paginate($this->Ciclos));
        $this->set('_serialize', ['ciclos']);
    }

    /**
     * View method
     *
     * @param string|null $id Ciclo id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ciclo = $this->Ciclos->get($id, [
            'contain' => ['Tanques', 'Status', 'EspeciesCategoriasCultivos', 'Visitas']
        ]);
        $this->set('ciclo', $ciclo);
        $this->set('_serialize', ['ciclo']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ciclo = $this->Ciclos->newEntity();
        if ($this->request->is('post')) {
            $ciclo = $this->Ciclos->patchEntity($ciclo, $this->request->data);
            if ($this->Ciclos->save($ciclo)) {
                dump($ciclo->toArray());
                $this->Flash->success(__('The ciclo has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The ciclo could not be saved. Please, try again.'));
            }
        }
        $tanques = $this->Ciclos->Tanques->find('list', ['limit' => 200]);
        $status = $this->Ciclos->Status->find('list', ['limit' => 200]);
        $this->set(compact('ciclo', 'tanques', 'status'));
        $this->set('_serialize', ['ciclo']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Ciclo id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ciclo = $this->Ciclos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ciclo = $this->Ciclos->patchEntity($ciclo, $this->request->data);
            if ($this->Ciclos->save($ciclo)) {
                $this->Flash->success(__('The ciclo has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The ciclo could not be saved. Please, try again.'));
            }
        }
        $tanques = $this->Ciclos->Tanques->find('list', ['limit' => 200]);
        $status = $this->Ciclos->Status->find('list', ['limit' => 200]);
        $this->set(compact('ciclo', 'tanques', 'status'));
        $this->set('_serialize', ['ciclo']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Ciclo id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ciclo = $this->Ciclos->get($id);
        if ($this->Ciclos->delete($ciclo)) {
            $this->Flash->success(__('The ciclo has been deleted.'));
        } else {
            $this->Flash->error(__('The ciclo could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
