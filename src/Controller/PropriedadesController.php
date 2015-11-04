<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Propriedades Controller
 *
 * @property \App\Model\Table\PropriedadesTable $Propriedades
 */
class PropriedadesController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Usuarios', 'Cidades']
        ];
        $this->set('propriedades', $this->paginate($this->Propriedades));
        $this->set('_serialize', ['propriedades']);
    }

    /**
     * View method
     *
     * @param string|null $id Propriedade id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $propriedade = $this->Propriedades->get($id, [
            'contain' => ['Usuarios', 'Cidades' => ['Estados'], 'Tanques' => ['Ciclos']]
        ]);
        $this->set('propriedade', $propriedade);
        $this->set('_serialize', ['propriedade']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $propriedade = $this->Propriedades->newEntity();
        if ($this->request->is('post')) {
            $propriedade = $this->Propriedades->patchEntity($propriedade, $this->request->data);
            if ($this->Propriedades->save($propriedade)) {
                $this->Flash->success(__('The propriedade has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The propriedade could not be saved. Please, try again.'));
            }
        }
        $usuarios = $this->Propriedades->Usuarios->find('list', ['limit' => 200]);
        $estados = $this->Propriedades->Cidades->Estados->find('list', ['limit' => 200]);
        $this->set(compact('propriedade', 'usuarios', 'estados'));
        $this->set('_serialize', ['propriedade']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Propriedade id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $propriedade = $this->Propriedades->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $propriedade = $this->Propriedades->patchEntity($propriedade, $this->request->data);
            if ($this->Propriedades->save($propriedade)) {
                $this->Flash->success(__('The propriedade has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The propriedade could not be saved. Please, try again.'));
            }
        }
        $usuarios = $this->Propriedades->Usuarios->find('list', ['limit' => 200]);
        $cidades = $this->Propriedades->Cidades->find('list', ['limit' => 200]);
        $this->set(compact('propriedade', 'usuarios', 'cidades'));
        $this->set('_serialize', ['propriedade']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Propriedade id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $propriedade = $this->Propriedades->get($id);
        if ($this->Propriedades->delete($propriedade)) {
            $this->Flash->success(__('The propriedade has been deleted.'));
        } else {
            $this->Flash->error(__('The propriedade could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
