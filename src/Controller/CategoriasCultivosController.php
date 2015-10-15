<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CategoriasCultivos Controller
 *
 * @property \App\Model\Table\CategoriasCultivosTable $CategoriasCultivos
 */
class CategoriasCultivosController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('categoriasCultivos', $this->paginate($this->CategoriasCultivos));
        $this->set('_serialize', ['categoriasCultivos']);
    }

    /**
     * View method
     *
     * @param string|null $id Categorias Cultivo id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $categoriasCultivo = $this->CategoriasCultivos->get($id, [
            'contain' => ['Especies']
        ]);
        $this->set('categoriasCultivo', $categoriasCultivo);
        $this->set('_serialize', ['categoriasCultivo']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $categoriasCultivo = $this->CategoriasCultivos->newEntity();
        if ($this->request->is('post')) {
            $categoriasCultivo = $this->CategoriasCultivos->patchEntity($categoriasCultivo, $this->request->data);
            if ($this->CategoriasCultivos->save($categoriasCultivo)) {
                $this->Flash->success(__('The categorias cultivo has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The categorias cultivo could not be saved. Please, try again.'));
            }
        }
        $especies = $this->CategoriasCultivos->Especies->find('list', ['limit' => 200]);
        $this->set(compact('categoriasCultivo', 'especies'));
        $this->set('_serialize', ['categoriasCultivo']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Categorias Cultivo id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $categoriasCultivo = $this->CategoriasCultivos->get($id, [
            'contain' => ['Especies']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $categoriasCultivo = $this->CategoriasCultivos->patchEntity($categoriasCultivo, $this->request->data);
            if ($this->CategoriasCultivos->save($categoriasCultivo)) {
                $this->Flash->success(__('The categorias cultivo has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The categorias cultivo could not be saved. Please, try again.'));
            }
        }
        $especies = $this->CategoriasCultivos->Especies->find('list', ['limit' => 200]);
        $this->set(compact('categoriasCultivo', 'especies'));
        $this->set('_serialize', ['categoriasCultivo']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Categorias Cultivo id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $categoriasCultivo = $this->CategoriasCultivos->get($id);
        if ($this->CategoriasCultivos->delete($categoriasCultivo)) {
            $this->Flash->success(__('The categorias cultivo has been deleted.'));
        } else {
            $this->Flash->error(__('The categorias cultivo could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
