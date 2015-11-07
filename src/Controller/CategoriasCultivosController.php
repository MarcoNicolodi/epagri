<?php
namespace App\Controller;

use App\Controller\AppController;

class CategoriasCultivosController extends AppController
{
    public function index()
    {
        $this->set('categoriasCultivos', $this->paginate($this->CategoriasCultivos));
        $this->set('_serialize', ['categoriasCultivos']);
    }

    public function view($id = null)
    {
        $categoriasCultivo = $this->CategoriasCultivos->get($id, [
            'contain' => ['Especies']
        ]);
        $this->set('categoriasCultivo', $categoriasCultivo);
        $this->set('_serialize', ['categoriasCultivo']);
    }

    public function add()
    {
        $categoriasCultivo = $this->CategoriasCultivos->newEntity();
        if ($this->request->is('post')) {
            $categoriasCultivo = $this->CategoriasCultivos->patchEntity($categoriasCultivo, $this->request->data);
            if ($this->CategoriasCultivos->save($categoriasCultivo)) {
                $this->Flash->success(__('A categoria de cultivo foi salva com sucesso.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Ocorreu um problema ao tentar cadastrar a categoria de cultivo. Por favor, tente novamente'));
            }
        }
        $especies = $this->CategoriasCultivos->Especies->find('list', ['limit' => 200]);
        $this->set(compact('categoriasCultivo', 'especies'));
        $this->set('_serialize', ['categoriasCultivo']);
    }

    public function edit($id = null)
    {
        $categoriasCultivo = $this->CategoriasCultivos->get($id, [
            'contain' => ['Especies']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $categoriasCultivo = $this->CategoriasCultivos->patchEntity($categoriasCultivo, $this->request->data);
            if ($this->CategoriasCultivos->save($categoriasCultivo)) {
                $this->Flash->success(__('Categoria de cultivo editada com sucesso.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Ocorreu um problema ao tentar editar a categoria de cultivo. Por favor, tente novamente.'));
            }
        }
        $especies = $this->CategoriasCultivos->Especies->find('list', ['limit' => 200]);
        $this->set(compact('categoriasCultivo', 'especies'));
        $this->set('_serialize', ['categoriasCultivo']);
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $categoriasCultivo = $this->CategoriasCultivos->get($id);
        if ($this->CategoriasCultivos->delete($categoriasCultivo)) {
            $this->Flash->success(__('Categoria de cultivo excluida com sucesso.'));
        } else {
            $this->Flash->error(__('Ocorreu um problema ao tentar excluir a categoria de cultivo. Por favor, tente novamente.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
