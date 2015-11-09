<?php
namespace App\Controller;

use App\Controller\AppController;

class CiclosController extends AppController
{

    //método sem view para usar com ajax
    public function getAtivosByTanque($tanque_id)
    {
        $ciclos = $this->Ciclos->find()->where(['tanque_id' => $tanque_id, 'status_id' => 1]);
        $this->set('ciclos',$ciclos);
        $this->set('_serialize',['ciclos']);
    }

    public function index()
    {
        $this->paginate = [
            'contain' => ['Tanques', 'Status']
        ];
        $this->set('ciclos', $this->paginate($this->Ciclos));
        $this->set('_serialize', ['ciclos']);
    }

    public function view($id = null)
    {
        $ciclo = $this->Ciclos->get($id, [
            'contain' => ['Tanques', 'Status', 'EspeciesCategoriasCultivos', 'Visitas' => ['Notificacoes']]
        ]);
        $this->set('ciclo', $ciclo);
        $this->set('_serialize', ['ciclo']);
    }

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
