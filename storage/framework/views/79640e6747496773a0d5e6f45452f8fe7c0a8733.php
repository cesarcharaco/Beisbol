<aside class="main-sidebar">
<!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
    <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php echo e(asset('/images/logo.jpg')); ?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?php echo e(Auth::user()->name); ?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> En línea</a>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MENU DE NAVEGACIÓN</li>
            <li class="active treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Representantes</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="active"><a href="<?php echo e(url('admin/representantes')); ?>"><i class="fa fa-circle-o"></i> Registrados</a></li>
                    <li><a href="<?php echo e(url('admin/representantes/create')); ?>"><i class="fa fa-circle-o"></i>Nuevo</a></li>
                </ul>
            </li>
            <li class="active treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Personal</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="active"><a href="<?php echo e(url('admin/personal')); ?>"><i class="fa fa-circle-o"></i> Registrados</a></li>
                    <li><a href="<?php echo e(url('admin/personal/create')); ?>"><i class="fa fa-circle-o"></i>Nuevo</a></li>
                </ul>
            </li>
            <li class="active treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Atletas</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="active"><a href="<?php echo e(url('admin/atletas')); ?>"><i class="fa fa-circle-o"></i> Registrados</a></li>
                    <li><a href="<?php echo e(url('admin/atletas/create')); ?>"><i class="fa fa-circle-o"></i>Nuevo</a></li>
                </ul>
            </li>
            <li class="active treeview">
                <a href="#">
                    <i class="fa fa-money"></i> <span>Cuotas</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="active"><a href="<?php echo e(url('admin/cuotascampeonatos')); ?>"><i class="fa fa-circle-o"></i>Montos de Campeonatos</a></li>
                    <li><a href="<?php echo e(url('admin/pagos')); ?>"><i class="fa fa-circle-o"></i>Montos de Matrícula</a></li>
                    <li><a href="<?php echo e(url('admin/estadospagos')); ?>"><i class="fa fa-circle-o"></i>Estado de Pagos</a></li>
                </ul>
            </li>
        </ul>
    </section>
<!-- /.sidebar -->
</aside>