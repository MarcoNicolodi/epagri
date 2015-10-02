<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Visitas Controller
 *
 * @property \App\Model\Table\VisitasTable $Visitas
 */
class VisitasController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Ciclos', 'ParametrosIdeais']
        ];
        $this->set('visitas', $this->paginate($this->Visitas));
        $this->set('_serialize', ['visitas']);
    }

    /**
     * View method
     *
     * @param string|null $id Visita id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $visita = $this->Visitas->get($id, [
            'contain' => ['Ciclos', 'ParametrosIdeais']
        ]);
        $this->set('visita', $visita);
        $this->set('_serialize', ['visita']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $visita = $this->Visitas->newEntity();
        if ($this->request->is('post')) {
            $visita = $this->Visitas->patchEntity($visita, $this->request->data);
            if ($this->Visitas->save($visita)) {
                $this->Flash->success(__('The visita has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The visita could not be saved. Please, try again.'));
            }
        }
        $ciclos = $this->Visitas->Ciclos->find('list', ['limit' => 200]);
        $parametrosIdeais = $this->Visitas->ParametrosIdeais->find('list', ['limit' => 200]);
        $this->set(compact('visita', 'ciclos', 'parametrosIdeais'));
        $this->set('_serialize', ['visita']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Visita id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $visita = $this->Visitas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $visita = $this->Visitas->patchEntity($visita, $this->request->data);
            if ($this->Visitas->save($visita)) {
                $this->Flash->success(__('The visita has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The visita could not be saved. Please, try again.'));
            }
        }
        $ciclos = $this->Visitas->Ciclos->find('list', ['limit' => 200]);
        $parametrosIdeais = $this->Visitas->ParametrosIdeais->find('list', ['limit' => 200]);
        $this->set(compact('visita', 'ciclos', 'parametrosIdeais'));
        $this->set('_serialize', ['visita']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Visita id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $visita = $this->Visitas->get($id);
        if ($this->Visitas->delete($visita)) {
            $this->Flash->success(__('The visita has been deleted.'));
        } else {
            $this->Flash->error(__('The visita could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}