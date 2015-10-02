<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * SaidaProdutos Controller
 *
 * @property \App\Model\Table\SaidaProdutosTable $SaidaProdutos
 */
class SaidaProdutosController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Produtos']
        ];
        $this->set('saidaProdutos', $this->paginate($this->SaidaProdutos));
        $this->set('_serialize', ['saidaProdutos']);
    }

    /**
     * View method
     *
     * @param string|null $id Saida Produto id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $saidaProduto = $this->SaidaProdutos->get($id, [
            'contain' => ['Produtos']
        ]);
        $this->set('saidaProduto', $saidaProduto);
        $this->set('_serialize', ['saidaProduto']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $saidaProduto = $this->SaidaProdutos->newEntity();
        if ($this->request->is('post')) {
            $saidaProduto = $this->SaidaProdutos->patchEntity($saidaProduto, $this->request->data);
            if ($this->SaidaProdutos->save($saidaProduto)) {
                $this->Flash->success(__('The saida produto has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The saida produto could not be saved. Please, try again.'));
            }
        }
        $produtos = $this->SaidaProdutos->Produtos->find('list', ['limit' => 200]);
        $this->set(compact('saidaProduto', 'produtos'));
        $this->set('_serialize', ['saidaProduto']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Saida Produto id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $saidaProduto = $this->SaidaProdutos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $saidaProduto = $this->SaidaProdutos->patchEntity($saidaProduto, $this->request->data);
            if ($this->SaidaProdutos->save($saidaProduto)) {
                $this->Flash->success(__('The saida produto has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The saida produto could not be saved. Please, try again.'));
            }
        }
        $produtos = $this->SaidaProdutos->Produtos->find('list', ['limit' => 200]);
        $this->set(compact('saidaProduto', 'produtos'));
        $this->set('_serialize', ['saidaProduto']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Saida Produto id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $saidaProduto = $this->SaidaProdutos->get($id);
        if ($this->SaidaProdutos->delete($saidaProduto)) {
            $this->Flash->success(__('The saida produto has been deleted.'));
        } else {
            $this->Flash->error(__('The saida produto could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
