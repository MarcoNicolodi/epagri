<?php
namespace App\Controller;

use App\Controller\AppController;

class NotificacoesController extends AppController
{
    public function index()
    {
        $this->paginate = [
            'contain' => ['Visitas']
        ];
        $this->set('notificacoes', $this->paginate($this->Notificacoes));
        $this->set('_serialize', ['notificacoes']);
    }

    public function view($id = null)
    {
        $notificacao = $this->Notificacoes->get($id, [
            'contain' => ['Visitas']
        ]);
        $this->set('notificacao', $notificacao);
        $this->set('_serialize', ['notificacao']);
    }

    public function add()
    {
        $notificacao = $this->Notificacoes->newEntity();
        if ($this->request->is('post')) {
            $notificacao = $this->Notificacoes->patchEntity($notificacao, $this->request->data);
            if ($this->Notificacoes->save($notificacao)) {
                $this->Flash->success(__('Notificação cadastrada com sucesso.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Ocorreu um problema ao tentar cadastrar a notificação. Por favor, tente novamente.'));
            }
        }
        $visitas = $this->Notificacoes->Visitas->find('list', ['limit' => 200]);
        $this->set(compact('notificacao', 'visitas'));
        $this->set('_serialize', ['notificacao']);
    }

    public function edit($id = null)
    {
        $notificacao = $this->Notificacoes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $notificacao = $this->Notificacoes->patchEntity($notificacao, $this->request->data);
            if ($this->Notificacoes->save($notificacao)) {
                $this->Flash->success(__('Notificação atualizada com sucesso.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Ocorreu um problema ao tentar atualizar a notificação. Por favor, tente novamente.'));
            }
        }
        $visitas = $this->Notificacoes->Visitas->find('list', ['limit' => 200]);
        $this->set(compact('notificacao', 'visitas'));
        $this->set('_serialize', ['notificacao']);
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $notificacao = $this->Notificacoes->get($id);
        if ($this->Notificacoes->delete($notificacao)) {
            $this->Flash->success(__('Notificação excluída com sucesso.'));
        } else {
            $this->Flash->error(__('Ocorreu um problema ao tentar excluir a notificação. Por favor, tente novamente.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
