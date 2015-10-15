<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Notificacoes Controller
 *
 * @property \App\Model\Table\NotificacoesTable $Notificacoes
 */
class NotificacoesController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Visitas']
        ];
        $this->set('notificacoes', $this->paginate($this->Notificacoes));
        $this->set('_serialize', ['notificacoes']);
    }

    /**
     * View method
     *
     * @param string|null $id Notificacao id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $notificacao = $this->Notificacoes->get($id, [
            'contain' => ['Visitas']
        ]);
        $this->set('notificacao', $notificacao);
        $this->set('_serialize', ['notificacao']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $notificacao = $this->Notificacoes->newEntity();
        if ($this->request->is('post')) {
            $notificacao = $this->Notificacoes->patchEntity($notificacao, $this->request->data);
            if ($this->Notificacoes->save($notificacao)) {
                $this->Flash->success(__('The notificacao has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The notificacao could not be saved. Please, try again.'));
            }
        }
        $visitas = $this->Notificacoes->Visitas->find('list', ['limit' => 200]);
        $this->set(compact('notificacao', 'visitas'));
        $this->set('_serialize', ['notificacao']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Notificacao id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $notificacao = $this->Notificacoes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $notificacao = $this->Notificacoes->patchEntity($notificacao, $this->request->data);
            if ($this->Notificacoes->save($notificacao)) {
                $this->Flash->success(__('The notificacao has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The notificacao could not be saved. Please, try again.'));
            }
        }
        $visitas = $this->Notificacoes->Visitas->find('list', ['limit' => 200]);
        $this->set(compact('notificacao', 'visitas'));
        $this->set('_serialize', ['notificacao']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Notificacao id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $notificacao = $this->Notificacoes->get($id);
        if ($this->Notificacoes->delete($notificacao)) {
            $this->Flash->success(__('The notificacao has been deleted.'));
        } else {
            $this->Flash->error(__('The notificacao could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
