<?php
namespace App\Controller;

use App\Controller\AppController;

class EspeciesController extends AppController
{

    public function index()
    {
        $this->set('especies', $this->paginate($this->Especies));
        $this->set('_serialize', ['especies']);
    }

    public function view($id = null)
    {
        $especie = $this->Especies->get($id, [
            'contain' => ['CategoriasCultivos']
        ]);
        $this->set('especie', $especie);
        $this->set('_serialize', ['especie']);
    }

    public function add()
    {
        $especie = $this->Especies->newEntity();
        if ($this->request->is('post')) {
            $especie = $this->Especies->patchEntity($especie, $this->request->data);
            if ($this->Especies->save($especie)) {
                $this->Flash->success(__('Espécie cadastrada com sucesso'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Ocorreu um problema ao tentar cadastrar a espécie. Por favor, tente novamente.'));
            }
        }
        $categoriasCultivos = $this->Especies->CategoriasCultivos->find('list', ['limit' => 200]);
        $this->set(compact('especie', 'categoriasCultivos'));
        $this->set('_serialize', ['especie']);
    }

    public function edit($id = null)
    {
        $especie = $this->Especies->get($id, [
            'contain' => ['CategoriasCultivos']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $especie = $this->Especies->patchEntity($especie, $this->request->data);
            if ($this->Especies->save($especie)) {
                $this->Flash->success(__('Espécie atualizada com sucesso'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Ocorreu um problema ao tentar atualizar a espécie. Por favor, tente novamente'));
            }
        }
        $categoriasCultivos = $this->Especies->CategoriasCultivos->find('list', ['limit' => 200]);
        $this->set(compact('especie', 'categoriasCultivos'));
        $this->set('_serialize', ['especie']);
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $especie = $this->Especies->get($id);
        if ($this->Especies->delete($especie)) {
            $this->Flash->success(__('Espécie excluída com sucesso.'));
        } else {
            $this->Flash->error(__('Ocorreu um problema ao tentar excluir a espécie. Por favor, tente novamente.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
