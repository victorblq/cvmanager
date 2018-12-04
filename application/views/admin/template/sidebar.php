<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php echo base_url('assets/img/user-icon.png')?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?=$userdata['nome']?></p>
                <!-- Status -->
                <!-- <a href="#">
                    <i class="fa fa-circle text-success"></i> Online</a> -->
            </div>
        </div>

        <!-- search form (Optional) -->
        <!-- <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                        <i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form> -->
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">Menu</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="<?= $activeMenu == 'imovel' ? 'active' : ''?>">
                <a href="<?= base_url('admin')?>">
                    <i class="fa fa-dashboard"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="treeview <?= $activeMenu == 'usuario' ? 'active' : ''?>">
                <a href="#">
                    <i class="fa fa-user"></i>
                    <span>Usuários</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?= $activeSubMenu == 'listarUsuario' ? 'active' : ''?>">
                        <a href="<?= base_url('admin/usuarios/listar') ?>">Listar</a>
                    </li>
                    <li class="<?= $activeSubMenu == 'cadastroUsuario' ? 'active' : ''?>">
                        <a href="<?= base_url('admin/usuarios/cadastrar') ?>">Cadastrar</a>
                    </li>
                </ul>
            </li>

            <li class="<?= $activeMenu == 'personalizar' ? 'active' : ''?>">
                <a href="<?= base_url('admin/personalizar');?>">
                    <i class="fa fa-edit"></i>
                    <span>Personalizar</span>
                </a>
            </li>

        </ul>
        <!-- /.sidebar-menu -->
    </section>
<!-- /.sidebar -->
</aside>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?= $titulo ?>
            <!-- <small>Optional description</small> -->
        </h1>
        <!-- <ol class="breadcrumb">
            <li>
                <a href="#">
                    <i class="fa fa-dashboard"></i> Level</a>
            </li>
            <li class="active">Here</li>
        </ol> -->
    </section>

    <!-- Main content -->
    <section class="content container-fluid">