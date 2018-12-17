<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>CV Manager</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?= base_url('assets/adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css')?>">
    <!-- Font awesome -->
    <link rel="stylesheet" href="<?= base_url('assets/adminlte/bower_components/font-awesome/css/font-awesome.min.css')?>">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?= base_url('assets/adminlte/bower_components/Ionicons/css/ionicons.min.css')?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('assets/adminlte/dist/css/AdminLTE.min.css')?>">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
        folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?= base_url('assets/adminlte/dist/css/skins/_all-skins.min.css')?>">

    <!-- Custom css -->
    <link href="<?= base_url('assets/css/main.css')?>" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <header class="main-header">
            <!-- Logo -->
            <a href="<?= base_url() ?>" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>Cv</b>M</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>Cv</b>Manager</span>
            </a>

            <!-- Header Navbar -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Abrir/Fechar menu</span>
                </a>
                <!-- Navbar Right Menu -->
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- User Account Menu -->
                        <li>
                            <!-- Menu Toggle Button -->
                            <a href="logout" title="<?= $this->lang->line('exit'); ?>">
                                <!-- The user image in the navbar-->
                                <!-- <img src="#" class="user-image" alt="User Image"> -->
                                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                                <i class="fa fa-sign-out"></i>
                                
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>