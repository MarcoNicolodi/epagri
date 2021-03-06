<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'EPAGRI Propaga Jundiá';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('bootstrap.css') ?>
    <?= $this->Html->css('sb-admin-2.css') ?>
    <?= $this->Html->css('jquery-ui.min.css') ?>
    <?= $this->Html->css('jquery-ui.structure.min.css') ?>
    <?= $this->Html->css('jquery-ui.theme.min.css') ?>

    <?= $this->Html->css('font-awesome/css/font-awesome.min.css') ?>
    <?= $this->Html->css('custom.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>

</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    </button>
                    <a class="navbar-brand" href="<?= $this->Url->build('/')?>">PJsis ALFA</a>
                </div>
                <!-- /.navbar-header -->

                <ul class="nav navbar-top-links navbar-right">
                    <li class="dropdown">
                        <a aria-expanded="false" class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#"><i class="fa fa-user fa-fw"></i> Perfil</a>
                            </li>
                            <li><a href="#"><i class="fa fa-gear fa-fw"></i> Configurações</a>
                            </li>
                            <li class="divider"></li>
                            <li><?= $this->Html->link("<i class='fa fa-sign-out fa-fw'></i>Sair",['controller' => 'Usuarios','action' => 'logout'], ['escape' => false]) ?>
                            </li>
                        </ul>
                        <!-- /.dropdown-user -->
                    </li>
                    <!-- /.dropdown -->
                </ul>
                <!-- /.navbar-top-links -->

                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav in" id="side-menu">
                            <li>
                                <a href="<?= $this->Url->build(['controller' => 'Dashboard', 'action' => 'index'])?>"><i class="fa fa-bar-chart-o fa-fw"></i> Dashboard</a>
                            </li>
                            <li>
                                <a href="tables.html"><i class="fa fa-shopping-cart fa-fw"></i> Controle de Estoque</a>
                            </li>
                            <li>
                                <a href="tables.html"><i class="fa fa-calendar fa-fw"></i> Calendário</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-users fa-fw"></i> Usuários<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level collapse">
                                    <li>
                                        <?= $this->Html->link('Gerenciar', ["controller" => "Usuarios","action" => "index"]); ?>
                                    </li>
                                    <li>
                                        <?= $this->Html->link('Cadastrar', ["controller" => "Usuarios","action" => "add"]); ?>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-pagelines fa-fw"></i> Propriedades<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level collapse">
                                    <li>
                                        <!-- link criado sem o helper, pois como propriedades eh root do sistema, fica com a class active sempre(bug) -->
                                        <?= "<a href='http://{$_SERVER['SERVER_NAME']}/epagri/propriedades'>Gerenciar</a>"//$this->Html->link("Gerenciar", ["controller" => "Propriedades","action" => "index"]); ?>
                                    </li>
                                    <li>
                                        <?= $this->Html->link('Cadastrar', ["controller" => "Propriedades","action" => "add"]); ?>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-tint fa-fw"></i> Tanques<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level collapse">
                                    <li>
                                        <?= $this->Html->link('Gerenciar', ["controller" => "Tanques","action" => "index"]); ?>
                                    </li>
                                    <li>
                                        <?= $this->Html->link('Cadastrar', ["controller" => "Tanques","action" => "add"]); ?>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-sitemap fa-fw"></i> Ciclos<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level collapse">
                                    <li>
                                        <?= $this->Html->link('Gerenciar', ["controller" => "Ciclos","action" => "index"]); ?>
                                    </li>
                                    <li>
                                        <?= $this->Html->link('Cadastrar', ["controller" => "Ciclos","action" => "add"]); ?>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-suitcase fa-fw"></i> Visitas<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level collapse">
                                    <li>
                                        <?= $this->Html->link('Gerenciar', ["controller" => "Visitas","action" => "index"]); ?>
                                    </li>
                                    <li>
                                        <?= $this->Html->link('Cadastrar', ["controller" => "Visitas","action" => "add"]); ?>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-gears fa-fw"></i> Configurações<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level collapse">
                                    <li>
                                        <a href="#">Categorias de Cultivos</a>
                                    </li>
                                    <li>
                                        <a href="#">Espécies</a>
                                    </li>
                                    <li>
                                        <a href="#">Coberturas</a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                        </ul>
                    </div>
                    <!-- /.sidebar-collapse -->
                </div>
                <!-- /.navbar-static-side -->
            </nav>
            <div id="page-wrapper">
                <?= $this->Flash->render() ?>
                <?= $this->Flash->render('auth') ?>


        <section class="container-fluid">
            <?= $this->fetch('content') ?>
        </section>
    </div>
    </div>
    <?= $this->Html->script('jquery.js') ?>
    <?= $this->Html->script('bootstrap.min.js') ?>
    <?= $this->Html->script('jquery-ui.min.js') ?>
    <?= $this->Html->script('sb-admin-2.js') ?>
    <?= $this->Html->script('metisMenu.js') ?>
    <?= $this->Html->script('custom.js') ?>
    <?= $this->Html->script('../bower_components/Chart.js/Chart.js') ?>
    <?= $this->Html->script('../bower_components/highcharts/highcharts.js') ?>
    <?= $this->fetch('script') ?>


</body>
</html>
