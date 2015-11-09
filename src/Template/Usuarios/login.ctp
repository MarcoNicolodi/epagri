<div class="row">
      <div class="col-md-4 col-md-offset-4">
          <div class="login-panel panel panel-green">
              <div class="panel-heading">
                  <h3 class="panel-title">Entrar</h3>
              </div>
              <div class="panel-body">
                  <?= $this->Form->create() ?>
                      <fieldset>
                          <div class="form-group">
                              <?= $this->Form->input('email', ['class' => 'form-control', 'placeholder' => 'Email', 'label' => false, 'autofocus' => true]); ?>
                          </div>
                          <div class="form-group">
                              <?= $this->Form->input('password', ['class' => 'form-control', 'placeholder' => 'Senha', 'label' => false]); ?>
                          </div>
                          <?= $this->Form->button('Entrar',['class' => 'btn btn-lg btn-primary btn-block']) ?>
                      </fieldset>
                      <p> Não possui uma conta? <?= $this->Html->link('Clique aqui para se cadastrar',['controller' => 'Usuarios', 'action' => 'add']); ?> </p>
                  </form>
              </div>
          </div>
      </div>
  </div>
