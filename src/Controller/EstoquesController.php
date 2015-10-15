<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Estoques Controller
 *
 * @property \App\Model\Table\EstoquesTable $Estoques
 */
class EstoquesController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Produtos', 'Usuarios']
        ];
        $this->set('estoques', $this->paginate($this->Estoques));
        $this->set('_serialize', ['estoques']);
    }

    /**
     * View method
     *
     * @param string|null $id Estoque id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $estoque = $this->Estoques->get($id, [
            'contain' => ['Produtos', 'Usuarios']
        ]);
        $this->set('estoque', $estoque);
        $this->set('_serialize', ['estoque']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $estoque = $this->Estoques->newEntity();
        if ($this->request->is('post')) {
            $estoque = $this->Estoques->patchEntity($estoque, $this->request->data);
            if ($this->Estoques->save($estoque)) {
                $this->Flash->success(__('The estoque has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The estoque could not be saved. Please, try again.'));
            }
        }
        $produtos = $this->Estoques->Produtos->find('list', ['limit' => 200]);
        $usuarios = $this->Estoques->Usuarios->find('list', ['limit' => 200]);
        $this->set(compact('estoque', 'produtos', 'usuarios'));
        $this->set('_serialize', ['estoque']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Estoque id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $estoque = $this->Estoques->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $estoque = $this->Estoques->patchEntity($estoque, $this->request->data);
            if ($this->Estoques->save($estoque)) {
                $this->Flash->success(__('The estoque has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The estoque could not be saved. Please, try again.'));
            }
        }
        $produtos = $this->Estoques->Produtos->find('list', ['limit' => 200]);
        $usuarios = $this->Estoques->Usuarios->find('list', ['limit' => 200]);
        $this->set(compact('estoque', 'produtos', 'usuarios'));
        $this->set('_serialize', ['estoque']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Estoque id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $estoque = $this->Estoques->get($id);
        if ($this->Estoques->delete($estoque)) {
            $this->Flash->success(__('The estoque has been deleted.'));
        } else {
            $this->Flash->error(__('The estoque could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
