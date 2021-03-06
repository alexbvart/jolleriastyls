<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Jolleria Styls |</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="/adminlte/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="/adminlte/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  @yield('estilos')

</head>

<body class="hold-transition sidebar-mini">
  <!-- Site wrapper -->
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" 
              data-widget="pushmenu" 
              href="#" 
              role="button">
              <i class="fas fa-bars"></i>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-light-primary elevation-2">
      <!-- Brand Logo -->
      <a href="#" class="brand-link d-flex  justify-content-center">
        <strong class="brand-text font-weight-light">Jolleria Styls</strong>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image ">
            <img src="https://lh3.googleusercontent.com/fife/ABSRlIowRMuXEGsA0GKj6mE2qI4hxWp-sIzmhHvVShIWeK5zgEgCXEusxZG7hfO_DoCvWh1e7FSQERb9M8F5fHjliPm3Q6YXl3DTK7hxSFf8YkyS-7uXJxfhCxKVAJyITMBuX93LnbGVIhKx3Sn2At1RHto6zfmyL-dT8RPupIj_DfzaXZ9SGs6h8YDl3R1L8aAr6LV6p6Ac0J5HyOL2lBJ-4TY5fdp8OF0IyTRIKdFQEVPmyJcAZS-FU73pNVxybYyiHsB_lp12_VSFzcuODItQtJErk-jlTEWSlHkFrKrjBjh0IVVHZKwbJ1fPTRX9-n-l0clLnVM40odnHJyunX51Nu_16hTcO2LG0P4ZSKY0uU2e8hysyXsb1Us3a5vKGi5yg0PaqkqAEuWRnlg5oYOqMnxcnumrcpE6NDQXSH4lGC_B_jOKhZ8sse9kfeUkY78-2r_VC6B-aIfdhg7cZEivhSMt7FC19pB4oYyd_5NBnQAzXCqdU_3OqOOxeicsGivSumacGlNwnQkWCIu87Vj6FFJp1UvtareYc4dlRciOqMv0jbPzwvkApYGKOYY34bhnea1yRqMFdqmIgWvU5db9DTKuBLY1vY8gehnMaR1NqQdz1M7WX-WlXaYu6Al0KpLCVFKgTwtS3rpXnfVkO_imjmmJ7wMHk9lRMq3K9HiGW7twf5YluTA6MmMc9j1J4FjfV8GvJfSUBAWuWrwKA6Tqc_I3KcbbAfTtydjgp_m2=s83-c" 
                  class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">Nuri Tasilla</a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-table"></i>
                <p>
                  Mantenedor
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ URL::to('/categoria') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Categorias</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ URL::to('/unidad') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Unidades</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ URL::to('/productos') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Productos</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('clientes.index') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Clientes</p>
                  </a>
                </li>
              </ul>
            </li>

            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-list-alt"></i>
                <p>
                  Procesos
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ URL::to('/ventas') }}" class="nav-link">
                    <i class="fas fa-shopping-cart nav-icon"></i>
                    <p>Registrar venta</p>
                  </a>
                </li>
              </ul>
            </li>

            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-cog"></i>
                <p>
                  Cuenta
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="btn-primary btn-block" type="submit">Cerrar Sesión</button>
                  </form>
                </li>
              </ul>
            </li>

          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->


      <!-- Main content -->
      <section class="content">
        @yield('contenido')
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->



    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="/adminlte/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

  @yield('script')

  <!-- AdminLTE App -->
  <script src="/adminlte/dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="/adminlte/dist/js/demo.js"></script>
</body>

</html>