<?php
namespace App\Controller;

use App\Controller\AppController;

class EntradaProdutosController extends AppController
{

    public function index()
    {
        $this->paginate = [
            'contain' => ['Produtos']
        ];
        $this->set('entradaProdutos', $this->paginate($this->EntradaProdutos));
        $this->set('_serialize', ['entradaProdutos']);
    }

    public function view($id = null)
    {
        $entradaProduto = $this->EntradaProdutos->get($id, [
            'contain' => ['Produtos']
        ]);
        $this->set('entradaProduto', $entradaProduto);
        $this->set('_serialize', ['entradaProduto']);
    }

    public function add()
    {
        $entradaProduto = $this->EntradaProdutos->newEntity();
        if ($this->request->is('post')) {
            $entradaProduto = $this->EntradaProdutos->patchEntity($entradaProduto, $this->request->data);
            if ($this->EntradaProdutos->save($entradaProduto)) {
                $this->Flash->success(__('Entrada de produto cadastrada com sucesso.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Ocorreu um problema ao tentar cadastrar a entrada de produto. Por favor, tente novamente.'));
            }
        }
        $produtos = $this->EntradaProdutos->Produtos->find('list', ['limit' => 200]);
        $this->set(compact('entradaProduto', 'produtos'));
        $this->set('_serialize', ['entradaProduto']);
    }

    public function edit($id = null)
    {
        $entradaProduto = $this->EntradaProdutos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $entradaProduto = $this->EntradaProdutos->patchEntity($entradaProduto, $this->request->data);
            if ($this->EntradaProdutos->save($entradaProduto)) {
                $this->Flash->success(__('Entrada de produto atualizada com sucesso'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Ocorreu um problema ao tentar atualizar a entrada de produto. Por favor, tente novamente.'));
            }
        }
        $produtos = $this->EntradaProdutos->Produtos->find('list', ['limit' => 200]);
        $this->set(compact('entradaProduto', 'produtos'));
        $this->set('_serialize', ['entradaProduto']);
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $entradaProduto = $this->EntradaProdutos->get($id);
        if ($this->EntradaProdutos->delete($entradaProduto)) {
            $this->Flash->success(__('Entrada de produto excluída com sucesso.'));
        } else {
            $this->Flash->error(__('Ocorreu um problema ao tentar excluir a entrada de produto. Por favor, tente novamente.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
