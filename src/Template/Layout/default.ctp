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

    <?= $this->Html->css('bootstrap.min.css') ?>
    <?= $this->Html->css('sb-admin-2.css') ?>
    <?= $this->Html->css('jquery-ui.min.css') ?>
    <?= $this->Html->css('jquery-ui.structure.min.css') ?>
    <?= $this->Html->css('jquery-ui.theme.min.css') ?>

    <?= $this->Html->css('font-awesome/css/font-awesome.min.css') ?>
    <link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" rel="stylesheet" />
    <?= $this->Html->css('select2-bootstrap.css') ?>
    <?= $this->Html->css('custom.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>



</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
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
                            <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Sair</a>
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
                                <a class="active" href="<?= $this->Url->build(['controller' => 'Dashboard', 'action' => 'index'])?>"><i class="fa fa-bar-chart-o fa-fw"></i> Dashboard</a>
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
                                        <a href="flot.html">Gerenciar</a>
                                    </li>
                                    <li>
                                        <a href="morris.html">Cadastrar</a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-pagelines  fa-fw"></i> Propriedades<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level collapse">
                                    <li>
                                        <a href="<?= $this->Url->build(['controller'=>'Propriedades', 'action'=>'index'])?>">Gerenciar</a>
                                    </li>
                                    <li>
                                        <a href="<?= $this->Url->build(['controller'=>'Propriedades', 'action'=>'add'])?>">Cadastrar</a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-sitemap fa-fw"></i> Ciclos<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level collapse">
                                    <li>
                                        <a href="#">Second Level Item</a>
                                    </li>
                                    <li>
                                        <a href="#">Second Level Item</a>
                                    </li>
                                                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-gears fa-fw"></i> Configurações<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level collapse">
                                    <li>
                                        <a href="#">Parâmetros</a>
                                    </li>
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
    <?= $this->fetch('script') ?>
    <!-- select2 plugin CDN -->

    <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>

</body>
</html>
