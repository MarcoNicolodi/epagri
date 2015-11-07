<?php
namespace App\Controller;

use App\Controller\AppController;

class ComentariosController extends AppController
{
    public function index()
    {
        $this->paginate = [
            'contain' => ['Usuarios', 'Tabelas']
        ];
        $this->set('comentarios', $this->paginate($this->Comentarios));
        $this->set('_serialize', ['comentarios']);
    }

    public function view($id = null)
    {
        $comentario = $this->Comentarios->get($id, [
            'contain' => ['Usuarios', 'Tabelas']
        ]);
        $this->set('comentario', $comentario);
        $this->set('_serialize', ['comentario']);
    }

    public function add()
    {
        $comentario = $this->Comentarios->newEntity();
        if ($this->request->is('post')) {
            $comentario = $this->Comentarios->patchEntity($comentario, $this->request->data);
            if ($this->Comentarios->save($comentario)) {
                $this->Flash->success(__('Comentário cadastrado com sucesso.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Ocorreu um problema ao tentar cadastrar o comentário. Por favor, tente novamente.'));
            }
        }
        $usuarios = $this->Comentarios->Usuarios->find('list', ['limit' => 200]);
        $tabelas = $this->Comentarios->Tabelas->find('list', ['limit' => 200]);
        $this->set(compact('comentario', 'usuarios', 'tabelas'));
        $this->set('_serialize', ['comentario']);
    }

    public function edit($id = null)
    {
        $comentario = $this->Comentarios->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $comentario = $this->Comentarios->patchEntity($comentario, $this->request->data);
            if ($this->Comentarios->save($comentario)) {
                $this->Flash->success(__('Comentário atualizado com suceso'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Ocorreu um problema ao tentar atualizar o comentário. Por favor, tente novamente.'));
            }
        }
        $usuarios = $this->Comentarios->Usuarios->find('list', ['limit' => 200]);
        $tabelas = $this->Comentarios->Tabelas->find('list', ['limit' => 200]);
        $this->set(compact('comentario', 'usuarios', 'tabelas'));
        $this->set('_serialize', ['comentario']);
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $comentario = $this->Comentarios->get($id);
        if ($this->Comentarios->delete($comentario)) {
            $this->Flash->success(__('Comentario excluído com sucesso'));
        } else {
            $this->Flash->error(__('Ocorreu um problema ao tentar excluir o comentário. Por favor, tente novamente.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
