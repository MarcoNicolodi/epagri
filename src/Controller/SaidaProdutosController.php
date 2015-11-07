<?php
namespace App\Controller;

use App\Controller\AppController;

class SaidaProdutosController extends AppController
{

    public function index()
    {
        $this->paginate = [
            'contain' => ['Produtos']
        ];
        $this->set('saidaProdutos', $this->paginate($this->SaidaProdutos));
        $this->set('_serialize', ['saidaProdutos']);
    }

    public function view($id = null)
    {
        $saidaProduto = $this->SaidaProdutos->get($id, [
            'contain' => ['Produtos']
        ]);
        $this->set('saidaProduto', $saidaProduto);
        $this->set('_serialize', ['saidaProduto']);
    }

    public function add()
    {
        $saidaProduto = $this->SaidaProdutos->newEntity();
        if ($this->request->is('post')) {
            $saidaProduto = $this->SaidaProdutos->patchEntity($saidaProduto, $this->request->data);
            if ($this->SaidaProdutos->save($saidaProduto)) {
                $this->Flash->success(__('Saída de produto cadastrada com sucesso.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Ocorreu um problema ao tentar cadastrar a saída de produto. Por favor, tente novamente.'));
            }
        }
        $produtos = $this->SaidaProdutos->Produtos->find('list', ['limit' => 200]);
        $this->set(compact('saidaProduto', 'produtos'));
        $this->set('_serialize', ['saidaProduto']);
    }

    public function edit($id = null)
    {
        $saidaProduto = $this->SaidaProdutos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $saidaProduto = $this->SaidaProdutos->patchEntity($saidaProduto, $this->request->data);
            if ($this->SaidaProdutos->save($saidaProduto)) {
                $this->Flash->success(__('Saída de produto atualizada com sucesso'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Ocorreu um problema ao tentar atualizar a saída de produto. Por favor, tente novamente.'));
            }
        }
        $produtos = $this->SaidaProdutos->Produtos->find('list', ['limit' => 200]);
        $this->set(compact('saidaProduto', 'produtos'));
        $this->set('_serialize', ['saidaProduto']);
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $saidaProduto = $this->SaidaProdutos->get($id);
        if ($this->SaidaProdutos->delete($saidaProduto)) {
            $this->Flash->success(__('Saída de produto excluída com sucesso.'));
        } else {
            $this->Flash->error(__('Ocorreu um problema ao tentar excluir a saída de produto. Por favor, tente novamente.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
