<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Especies Controller
 *
 * @property \App\Model\Table\EspeciesTable $Especies
 */
class EspeciesController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('especies', $this->paginate($this->Especies));
        $this->set('_serialize', ['especies']);
    }

    /**
     * View method
     *
     * @param string|null $id Especie id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $especie = $this->Especies->get($id, [
            'contain' => ['CategoriasCultivos']
        ]);
        $this->set('especie', $especie);
        $this->set('_serialize', ['especie']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $especie = $this->Especies->newEntity();
        if ($this->request->is('post')) {
            $especie = $this->Especies->patchEntity($especie, $this->request->data);
            if ($this->Especies->save($especie)) {
                $this->Flash->success(__('The especie has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The especie could not be saved. Please, try again.'));
            }
        }
        $categoriasCultivos = $this->Especies->CategoriasCultivos->find('list', ['limit' => 200]);
        $this->set(compact('especie', 'categoriasCultivos'));
        $this->set('_serialize', ['especie']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Especie id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $especie = $this->Especies->get($id, [
            'contain' => ['CategoriasCultivos']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $especie = $this->Especies->patchEntity($especie, $this->request->data);
            if ($this->Especies->save($especie)) {
                $this->Flash->success(__('The especie has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The especie could not be saved. Please, try again.'));
            }
        }
        $categoriasCultivos = $this->Especies->CategoriasCultivos->find('list', ['limit' => 200]);
        $this->set(compact('especie', 'categoriasCultivos'));
        $this->set('_serialize', ['especie']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Especie id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $especie = $this->Especies->get($id);
        if ($this->Especies->delete($especie)) {
            $this->Flash->success(__('The especie has been deleted.'));
        } else {
            $this->Flash->error(__('The especie could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
