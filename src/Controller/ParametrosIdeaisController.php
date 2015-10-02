<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ParametrosIdeais Controller
 *
 * @property \App\Model\Table\ParametrosIdeaisTable $ParametrosIdeais
 */
class ParametrosIdeaisController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('parametrosIdeais', $this->paginate($this->ParametrosIdeais));
        $this->set('_serialize', ['parametrosIdeais']);
    }

    /**
     * View method
     *
     * @param string|null $id Parametros Ideal id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $parametrosIdeal = $this->ParametrosIdeais->get($id, [
            'contain' => []
        ]);
        $this->set('parametrosIdeal', $parametrosIdeal);
        $this->set('_serialize', ['parametrosIdeal']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $parametrosIdeal = $this->ParametrosIdeais->newEntity();
        if ($this->request->is('post')) {
            $parametrosIdeal = $this->ParametrosIdeais->patchEntity($parametrosIdeal, $this->request->data);
            if ($this->ParametrosIdeais->save($parametrosIdeal)) {
                $this->Flash->success(__('The parametros ideal has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The parametros ideal could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('parametrosIdeal'));
        $this->set('_serialize', ['parametrosIdeal']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Parametros Ideal id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $parametrosIdeal = $this->ParametrosIdeais->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $parametrosIdeal = $this->ParametrosIdeais->patchEntity($parametrosIdeal, $this->request->data);
            if ($this->ParametrosIdeais->save($parametrosIdeal)) {
                $this->Flash->success(__('The parametros ideal has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The parametros ideal could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('parametrosIdeal'));
        $this->set('_serialize', ['parametrosIdeal']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Parametros Ideal id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $parametrosIdeal = $this->ParametrosIdeais->get($id);
        if ($this->ParametrosIdeais->delete($parametrosIdeal)) {
            $this->Flash->success(__('The parametros ideal has been deleted.'));
        } else {
            $this->Flash->error(__('The parametros ideal could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
