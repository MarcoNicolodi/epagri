<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;


class PropriedadesController extends AppController
{
    // public function beforeRender(Event $e)
    // {
    //     $this->eventManager()->off($this->Csrf);
    //     $this->response->header('Access-Control-Allow-Origin', '*');
    // }s

    //TODO arrumar autorizacao para metodos ajax
    public function isAuthorized($user = null)
    {
        parent::isAuthorized($this->Auth->user());

        if($this->request->params['action'] == 'index'){
            return true;
        }

        if($this->request->params['action'] == 'getByUsuario'){
            if($this->request->params['pass'][0] == $this->Auth->user('id_usuario'))
                return true;

            return false;
        }

        if($this->Propriedades->find('propOwner',[
            'id' => $this->request->params['pass'][0],
            'id_usuario' => $this->Auth->user('id_usuario')
            ])){
            return true;
        }

        return false
    }

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

        if($this->Auth->user('autorizacao') == 'produtor'){
            $this->set('propriedades', $this->paginate($this->Propriedades->find('all')->where(['id_usuario' => $this->Auth->user('id_usuario')])));
        } else {
            $this->set('propriedades', $this->paginate($this->Propriedades));
        }
        $this->set('_serialize', ['propriedades']);
    }

    public function view($id = null)
    {
        $propriedade = $this->Propriedades->get($id, [
            'contain' => ['Usuarios', 'Cidades' => ['Estados'], 'Tanques' => ['Ciclos' => ['Status']]]
        ]);
        $this->set('propriedade', $propriedade);
        $this->set('_serialize', ['propriedade']);
    }

    public function add()
    {
        $this->response->header('Access-Control-Allow-Origin', '*');
        $propriedade = $this->Propriedades->newEntity();
        if ($this->request->is('post')) {
            $propriedade = $this->Propriedades->patchEntity($propriedade, $this->request->data);
            if ($this->Propriedades->save($propriedade)) {
                if($this->request->is('ajax') || $this->request->is('json')){
                    echo json_encode($propriedade);
                    exit();
                }
                $this->Flash->success(__('Propriedade cadastrada com sucesso.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Ocorreu um problema ao tentar cadastrar a propriedade. Por favor, tente novamente.'));
            }
        }


        $usuarios = $this->Propriedades->Usuarios->find('list', ['limit' => 200,'order' => 'username']);
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
