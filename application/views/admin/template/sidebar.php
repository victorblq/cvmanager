<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar" style="height: auto;">
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu tree" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
                <li class="<?= $active_menu == 'dashboard' ? 'active' : '' ?>">
                    <a href="<?= base_url('admin')?>">
                        <i class="fa fa-dashboard"></i> 
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="<?= $active_menu == 'personalinfo' ? 'active' : ''?>">
                    <a href="<?= base_url('admin/personalinfo')?>">
                        <i class="fa fa-user"></i> 
                        <span><?= $this->lang->line('personal_info'); ?></span>
                    </a>
                </li>
                <li class="<?= $active_menu == 'graduation' ? 'active menu-open' : '' ?> treeview">
                    <a href="#">
                        <i class="fa fa-graduation-cap"></i> 
                        <span><?= $this->lang->line('graduation'); ?></span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>

                    <ul class="treeview-menu">
                        <li class="active"><a href="index.html"><i class="fa fa-circle"></i><?= $this->lang->line('list'); ?></a></li>
                        <li><a href="index2.html"><i class="fa fa-circle-o"></i><?= $this->lang->line('add'); ?></a></li>
                    </ul>
                </li>
                <li class="<?= $active_menu == 'professional_experience' ? 'active menu-open' : '' ?> treeview">
                    <a href="#">
                        <i class="fa fa-briefcase"></i> 
                        <span><?= $this->lang->line('professional_experience'); ?></span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>

                    <ul class="treeview-menu">
                        <li class="active"><a href="index.html"><i class="fa fa-circle"></i><?= $this->lang->line('list'); ?></a></li>
                        <li><a href="index2.html"><i class="fa fa-circle-o"></i><?= $this->lang->line('add'); ?></a></li>
                    </ul>
                </li>

                <li class="<?= $active_menu == 'qualifications' ? 'active menu-open' : '' ?> treeview">
                    <a href="#">
                        <i class="fa fa-angle-double-up"></i> 
                        <span><?= $this->lang->line('qualifications'); ?></span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>

                    <ul class="treeview-menu">
                        <li class="active"><a href="index.html"><i class="fa fa-circle"></i><?= $this->lang->line('list'); ?></a></li>
                        <li><a href="index2.html"><i class="fa fa-circle-o"></i><?= $this->lang->line('add'); ?></a></li>
                    </ul>
                </li>

                <li class="<?= $active_menu == 'projects' ? 'active menu-open' : '' ?> treeview">
                    <a href="#">
                        <i class="fa fa-wrench"></i> 
                        <span><?= $this->lang->line('projects'); ?></span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>

                    <ul class="treeview-menu">
                        <li class="active"><a href="index.html"><i class="fa fa-circle"></i><?= $this->lang->line('list'); ?></a></li>
                        <li><a href="index2.html"><i class="fa fa-circle-o"></i><?= $this->lang->line('add'); ?></a></li>
                    </ul>
                </li>

                <li class="<?= $active_menu == 'extra_activities' ? 'active menu-open' : '' ?> treeview">
                    <a href="#">
                        <i class="fa fa-book"></i> 
                        <span><?= $this->lang->line('extra_activities'); ?></span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>

                    <ul class="treeview-menu">
                        <li class="active"><a href="index.html"><i class="fa fa-circle"></i><?= $this->lang->line('list'); ?></a></li>
                        <li><a href="index2.html"><i class="fa fa-circle-o"></i><?= $this->lang->line('add'); ?></a></li>
                    </ul>
                </li>
            </li>
        </ul>
    </section>
<!-- /.sidebar -->
</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?= $titulo ?>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">