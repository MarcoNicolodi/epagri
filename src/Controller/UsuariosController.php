<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

class UsuariosController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow('add');
    }

    public function index()
    {
        $this->paginate = [
            'contain' => ['Cidades']
        ];
        $this->set('usuarios', $this->paginate($this->Usuarios));
        $this->set('_serialize', ['usuarios']);
    }

    public function view($id = null)
    {
        $usuario = $this->Usuarios->get($id, [
            'contain' => ['Cidades', 'Comentarios', 'Estoques', 'Propriedades']
        ]);
        $this->set('usuario', $usuario);
        $this->set('_serialize', ['usuario']);
    }

    public function add()
    {
        $usuario = $this->Usuarios->newEntity();
        $estados = $this->Usuarios->Cidades->Estados->find('list');
        $autorizacao = ['admin' => 'Administrador', 'epagri' => 'Epagri', 'produtor' => 'Produtor'];
        if ($this->request->is('post')) {
            $usuario = $this->Usuarios->patchEntity($usuario, $this->request->data);
            if ($this->Usuarios->save($usuario)) {
                $this->Flash->success(__('Usuário cadastrado com sucesso.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Ocorreu um problema ao tentar cadastrar o usuário. Por favor, tente novamente.'));
            }
        }
        $this->set(compact('usuario', 'estados', 'autorizacao'));
        $this->set('_serialize', ['usuario']);
    }

    public function edit($id = null)
    {
        $usuario = $this->Usuarios->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $usuario = $this->Usuarios->patchEntity($usuario, $this->request->data);
            if ($this->Usuarios->save($usuario)) {
                $this->Flash->success(__('Usuário cadastrado com sucesso.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Ocorreu um problema ao tentar atualizar o usuário. Por favor, tente novamente.'));
            }
        }
        $autorizacao = ['admin' => 'Administrador', 'epagri' => 'Epagri', 'produtor' => 'Produtor'];
        $estados = $this->Usuarios->Cidades->Estados->find('list');
        $this->set(compact('usuario', 'estados', 'autorizacao'));
        $this->set('_serialize', ['usuario']);
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $usuario = $this->Usuarios->get($id);
        if ($this->Usuarios->delete($usuario)) {
            $this->Flash->success(__('Usuário excluído com sucesso.'));
        } else {
            $this->Flash->error(__('Ocorreu um problema ao tentar excluir o usuário. Por favor, tente novamente.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    public function login()
    {
        if($this->Auth->user()){
            $this->Flash->error("Você já está logado.");
            return $this->redirect(['action' => 'index']);
        }

        $this->viewBuilder()->layout('login');

        if($this->request->is('post')){
            $user = $this->Auth->identify();
            if($user){
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            } else {
                $this->Flash->error('Usuário ou senha incorretos');
            }
        }
    }

    public function logout()
    {
        if(!$this->Auth->user()){
            $this->Flash->error("Você não está logado.");
            return $this->redirect($this->Auth->logout());
        }
        return $this->redirect($this->Auth->logout());
    }

}
