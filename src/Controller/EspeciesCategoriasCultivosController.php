<?php
namespace App\Controller;

use App\Controller\AppController;

class EspeciesCategoriasCultivosController extends AppController
{

    public function index()
    {
        $this->paginate = [
            'contain' => ['CategoriasCultivos', 'Especies', 'Ciclos']
        ];
        $this->set('especiesCategoriasCultivos', $this->paginate($this->EspeciesCategoriasCultivos));
        $this->set('_serialize', ['especiesCategoriasCultivos']);
    }

    public function view($id = null)
    {
        $especiesCategoriasCultivo = $this->EspeciesCategoriasCultivos->get($id, [
            'contain' => ['CategoriasCultivos', 'Especies', 'Ciclos']
        ]);
        $this->set('especiesCategoriasCultivo', $especiesCategoriasCultivo);
        $this->set('_serialize', ['especiesCategoriasCultivo']);
    }

    public function add()
    {
        $especiesCategoriasCultivo = $this->EspeciesCategoriasCultivos->newEntity();
        if ($this->request->is('post')) {
            $especiesCategoriasCultivo = $this->EspeciesCategoriasCultivos->patchEntity($especiesCategoriasCultivo, $this->request->data);
            if ($this->EspeciesCategoriasCultivos->save($especiesCategoriasCultivo)) {
                $this->Flash->success(__('The especies categorias cultivo has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The especies categorias cultivo could not be saved. Please, try again.'));
            }
        }
        $categoriasCultivos = $this->EspeciesCategoriasCultivos->CategoriasCultivos->find('list', ['limit' => 200]);
        $especies = $this->EspeciesCategoriasCultivos->Especies->find('list', ['limit' => 200]);
        $ciclos = $this->EspeciesCategoriasCultivos->Ciclos->find('list', ['limit' => 200]);
        $this->set(compact('especiesCategoriasCultivo', 'categoriasCultivos', 'especies', 'ciclos'));
        $this->set('_serialize', ['especiesCategoriasCultivo']);
    }

    public function edit($id = null)
    {
        $especiesCategoriasCultivo = $this->EspeciesCategoriasCultivos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $especiesCategoriasCultivo = $this->EspeciesCategoriasCultivos->patchEntity($especiesCategoriasCultivo, $this->request->data);
            if ($this->EspeciesCategoriasCultivos->save($especiesCategoriasCultivo)) {
                $this->Flash->success(__('The especies categorias cultivo has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The especies categorias cultivo could not be saved. Please, try again.'));
            }
        }
        $categoriasCultivos = $this->EspeciesCategoriasCultivos->CategoriasCultivos->find('list', ['limit' => 200]);
        $especies = $this->EspeciesCategoriasCultivos->Especies->find('list', ['limit' => 200]);
        $ciclos = $this->EspeciesCategoriasCultivos->Ciclos->find('list', ['limit' => 200]);
        $this->set(compact('especiesCategoriasCultivo', 'categoriasCultivos', 'especies', 'ciclos'));
        $this->set('_serialize', ['especiesCategoriasCultivo']);
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $especiesCategoriasCultivo = $this->EspeciesCategoriasCultivos->get($id);
        if ($this->EspeciesCategoriasCultivos->delete($especiesCategoriasCultivo)) {
            $this->Flash->success(__('The especies categorias cultivo has been deleted.'));
        } else {
            $this->Flash->error(__('The especies categorias cultivo could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
