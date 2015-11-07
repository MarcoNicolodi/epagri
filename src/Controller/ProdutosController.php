<?php
namespace App\Controller;

use App\Controller\AppController;

class ProdutosController extends AppController
{

    public function index()
    {
        $this->set('produtos', $this->paginate($this->Produtos));
        $this->set('_serialize', ['produtos']);
    }

    public function view($id = null)
    {
        $produto = $this->Produtos->get($id, [
            'contain' => ['Estoques']
        ]);
        $this->set('produto', $produto);
        $this->set('_serialize', ['produto']);
    }

    public function add()
    {
        $produto = $this->Produtos->newEntity();
        if ($this->request->is('post')) {
            $produto = $this->Produtos->patchEntity($produto, $this->request->data);
            if ($this->Produtos->save($produto)) {
                $this->Flash->success(__('Produto cadastrado com sucesso.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Ocorreu um problema ao tentar cadastrar o produto. Por favor, tente novamente.'));
            }
        }
        $this->set(compact('produto'));
        $this->set('_serialize', ['produto']);
    }

    public function edit($id = null)
    {
        $produto = $this->Produtos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $produto = $this->Produtos->patchEntity($produto, $this->request->data);
            if ($this->Produtos->save($produto)) {
                $this->Flash->success(__('Produto atualizado com sucesso'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Ocorreu um problema ao tentar atualizar o produto. Por favor, tente novamente.'));
            }
        }
        $this->set(compact('produto'));
        $this->set('_serialize', ['produto']);
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $produto = $this->Produtos->get($id);
        if ($this->Produtos->delete($produto)) {
            $this->Flash->success(__('Produto excluído com sucesso.'));
        } else {
            $this->Flash->error(__('Ocorreu um problema ao tentar excluir o produto. Por favor, tente novamente.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
