<?php
namespace App\Controller;

use App\Controller\AppController;

class PropriedadesController extends AppController
{
    //método sem view para usar com AJAX
    public function getByUsuario($usuario_id)
    {
        $propriedades = $this->Propriedades->find()->where(['usuario_id' => $usuario_id]);
        $this->set('propriedades',$propriedades);
        $this->set('_serialize',['propriedades']);
    }

    public function index()
    {
        $this->paginate = [
            'contain' => ['Usuarios', 'Cidades']
        ];
        $this->set('propriedades', $this->paginate($this->Propriedades));
        $this->set('_serialize', ['propriedades']);
    }

    public function view($id = null)
    {
        $propriedade = $this->Propriedades->get($id, [
            'contain' => ['Usuarios', 'Cidades' => ['Estados'], 'Tanques' => ['Ciclos']]
        ]);
        $this->set('propriedade', $propriedade);
        $this->set('_serialize', ['propriedade']);
    }

    public function add()
    {
        $propriedade = $this->Propriedades->newEntity();
        if ($this->request->is('post')) {
            $propriedade = $this->Propriedades->patchEntity($propriedade, $this->request->data);
            if ($this->Propriedades->save($propriedade)) {
                $this->Flash->success(__('Propriedade cadastrada com sucesso.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Ocorreu um problema ao tentar cadastrar a propriedade. Por favor, tente novamente.'));
            }
        }
        $usuarios = $this->Propriedades->Usuarios->find('list', ['limit' => 200]);
        $estados = $this->Propriedades->Cidades->Estados->find('list', ['limit' => 200]);
        $this->set(compact('propriedade', 'usuarios', 'estados'));
        $this->set('_serialize', ['propriedade']);
    }

    public function edit($id = null)
    {
        $propriedade = $this->Propriedades->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $propriedade = $this->Propriedades->patchEntity($propriedade, $this->request->data);
            if ($this->Propriedades->save($propriedade)) {
                $this->Flash->success(__('Propriedade atualizada com sucesso.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Ocorreu um problema ao tentar atualizar a propriedade. Por favor, tente novamente.'));
            }
        }
        $usuarios = $this->Propriedades->Usuarios->find('list', ['limit' => 200]);
        $cidades = $this->Propriedades->Cidades->find('list', ['limit' => 200]);
        $this->set(compact('propriedade', 'usuarios', 'cidades'));
        $this->set('_serialize', ['propriedade']);
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $propriedade = $this->Propriedades->get($id);
        if ($this->Propriedades->delete($propriedade)) {
            $this->Flash->success(__('Propriedade excluida com sucesso.'));
        } else {
            $this->Flash->error(__('Ocorreu um problema ao tentar excluir a propriedade. Por favor, tente novamente.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
