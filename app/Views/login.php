<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SAPCE 3</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url() ?>/assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url() ?>/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url() ?>/assets/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <a href="../../index2.html"><b>SAPCE</b> 3</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Indique sus datos para acceder: CUBS740623 1234</p>
        <?php if($mensaje):?>
        <div class="alert alert-danger">
          <p><?php echo $mensaje;?></p>
        </div>
      <?php endif; ?>
        <form action="<?php echo base_url('/auth')?>" method="post">
          <div class="input-group mb-3">
            
            <select class="custom-select" id="rol" name="rol" required>
              <option value="" selected>Seleccione</option>
              <?php foreach ($roles as $rol):?>
                <option value="<?= $rol->idr ?>"><?= $rol->tipo ?></option>
              <?php endforeach;?>
            </select>
            <div class="input-group-append">
              <div class="input-group-text">
                <i class="fas fa-user"></i>
              </div>
            </div>
          </div>
          
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="" id="rfcp" name="rfcp" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <i class="fas fa-user-edit"></i>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Contraseña" id="contra" name="contra" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <i class="fas fa-key"></i>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12 ">
              <button type="submit" class="btn btn-primary btn-block">Sign In</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
        
        <hr>

        <!-- /.social-auth-links -->

        <p class="mb-1">
          <a href="forgot-password.html">No recuerdo mi contraseña.</a>
        </p>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="<?php echo base_url() ?>/assets/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?php echo base_url() ?>/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo base_url() ?>/assets/dist/js/adminlte.min.js"></script>

</body>

</html>