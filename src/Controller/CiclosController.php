<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Ciclos Controller
 *
 * @property \App\Model\Table\CiclosTable $Ciclos
 */
class CiclosController extends AppController
{

    public function getAtivosByTanque($tanque_id)
    {
        $ciclos = $this->Ciclos->find('list')->where(['tanque_id' => $tanque_id, 'status_id' => 1]);
        $this->set('ciclos',$ciclos);
        $this->set('_serialize',['ciclos']);
    }


    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Tanques', 'Status']
        ];
        $this->set('ciclos', $this->paginate($this->Ciclos));
        $this->set('_serialize', ['ciclos']);
    }

    /**
     * View method
     *
     * @param string|null $id Ciclo id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ciclo = $this->Ciclos->get($id, [
            'contain' => ['Tanques', 'Status', 'EspeciesCategoriasCultivos', 'Visitas']
        ]);
        $this->set('ciclo', $ciclo);
        $this->set('_serialize', ['ciclo']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ciclo = $this->Ciclos->newEntity();
        if ($this->request->is('post')) {
            $ciclo = $this->Ciclos->patchEntity($ciclo, $this->request->data);
            if ($this->Ciclos->save($ciclo)) {
                $this->Flash->success(__('Ciclo cadastrado com sucesso.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Ocorreu um erro ao tentar cadastrar o ciclo. Por favor, tente novamente.'));
            }
        }

        $propriedades = $this->Ciclos->Tanques->Propriedades->find('list');
        $tanques = $this->Ciclos->Tanques->find('list')->notMatching('Ciclos', function ($q) {
                                                        return $q->where(['Ciclos.status_id' => 1]);
                                                    });
        $status = $this->Ciclos->Status->find('list');
        $this->set(compact('ciclo', 'tanques', 'status','propriedades'));
        $this->set('_serialize', ['ciclo']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Ciclo id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ciclo = $this->Ciclos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ciclo = $this->Ciclos->patchEntity($ciclo, $this->request->data);
            if ($this->Ciclos->save($ciclo)) {
                $this->Flash->success(__('Ciclo atualizado com sucesso.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('Ocorreu um problema ao tentar atualizar o Ciclo. Por favor, tente novamente');
            }
        }
        $tanques = $this->Ciclos->Tanques->find('list');
        $status = $this->Ciclos->Status->find('list');
        $this->set(compact('ciclo', 'tanques', 'status'));
        $this->set('_serialize', ['ciclo']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Ciclo id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ciclo = $this->Ciclos->get($id);
        if ($this->Ciclos->delete($ciclo)) {
            $this->Flash->success(__('Ciclo excluído com sucesso.'));
        } else {
            $this->Flash->error(__('Ocorreu um problema ao tentar excluir o Ciclo. Por favor, tente novamente.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
