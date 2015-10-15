<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Comentarios Controller
 *
 * @property \App\Model\Table\ComentariosTable $Comentarios
 */
class ComentariosController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Usuarios', 'Tabelas']
        ];
        $this->set('comentarios', $this->paginate($this->Comentarios));
        $this->set('_serialize', ['comentarios']);
    }

    /**
     * View method
     *
     * @param string|null $id Comentario id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $comentario = $this->Comentarios->get($id, [
            'contain' => ['Usuarios', 'Tabelas']
        ]);
        $this->set('comentario', $comentario);
        $this->set('_serialize', ['comentario']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $comentario = $this->Comentarios->newEntity();
        if ($this->request->is('post')) {
            $comentario = $this->Comentarios->patchEntity($comentario, $this->request->data);
            if ($this->Comentarios->save($comentario)) {
                $this->Flash->success(__('The comentario has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The comentario could not be saved. Please, try again.'));
            }
        }
        $usuarios = $this->Comentarios->Usuarios->find('list', ['limit' => 200]);
        $tabelas = $this->Comentarios->Tabelas->find('list', ['limit' => 200]);
        $this->set(compact('comentario', 'usuarios', 'tabelas'));
        $this->set('_serialize', ['comentario']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Comentario id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $comentario = $this->Comentarios->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $comentario = $this->Comentarios->patchEntity($comentario, $this->request->data);
            if ($this->Comentarios->save($comentario)) {
                $this->Flash->success(__('The comentario has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The comentario could not be saved. Please, try again.'));
            }
        }
        $usuarios = $this->Comentarios->Usuarios->find('list', ['limit' => 200]);
        $tabelas = $this->Comentarios->Tabelas->find('list', ['limit' => 200]);
        $this->set(compact('comentario', 'usuarios', 'tabelas'));
        $this->set('_serialize', ['comentario']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Comentario id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $comentario = $this->Comentarios->get($id);
        if ($this->Comentarios->delete($comentario)) {
            $this->Flash->success(__('The comentario has been deleted.'));
        } else {
            $this->Flash->error(__('The comentario could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
