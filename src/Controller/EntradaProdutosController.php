<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * EntradaProdutos Controller
 *
 * @property \App\Model\Table\EntradaProdutosTable $EntradaProdutos
 */
class EntradaProdutosController extends AppController
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
        $this->set('entradaProdutos', $this->paginate($this->EntradaProdutos));
        $this->set('_serialize', ['entradaProdutos']);
    }

    /**
     * View method
     *
     * @param string|null $id Entrada Produto id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $entradaProduto = $this->EntradaProdutos->get($id, [
            'contain' => ['Produtos']
        ]);
        $this->set('entradaProduto', $entradaProduto);
        $this->set('_serialize', ['entradaProduto']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $entradaProduto = $this->EntradaProdutos->newEntity();
        if ($this->request->is('post')) {
            $entradaProduto = $this->EntradaProdutos->patchEntity($entradaProduto, $this->request->data);
            if ($this->EntradaProdutos->save($entradaProduto)) {
                $this->Flash->success(__('The entrada produto has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The entrada produto could not be saved. Please, try again.'));
            }
        }
        $produtos = $this->EntradaProdutos->Produtos->find('list', ['limit' => 200]);
        $this->set(compact('entradaProduto', 'produtos'));
        $this->set('_serialize', ['entradaProduto']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Entrada Produto id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $entradaProduto = $this->EntradaProdutos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $entradaProduto = $this->EntradaProdutos->patchEntity($entradaProduto, $this->request->data);
            if ($this->EntradaProdutos->save($entradaProduto)) {
                $this->Flash->success(__('The entrada produto has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The entrada produto could not be saved. Please, try again.'));
            }
        }
        $produtos = $this->EntradaProdutos->Produtos->find('list', ['limit' => 200]);
        $this->set(compact('entradaProduto', 'produtos'));
        $this->set('_serialize', ['entradaProduto']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Entrada Produto id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $entradaProduto = $this->EntradaProdutos->get($id);
        if ($this->EntradaProdutos->delete($entradaProduto)) {
            $this->Flash->success(__('The entrada produto has been deleted.'));
        } else {
            $this->Flash->error(__('The entrada produto could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
