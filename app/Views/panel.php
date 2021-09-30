
<?= $this->extend('layouts/dashboard') ?>
<?= $this->section('content') ?>

    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Bienvenido a SAPCE 3.0</h1>
          </div>
          <!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inicio</a></li>
              <li class="breadcrumb-item active">Ruta actual</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        
        

        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <div class="col-md-12">
            <div class="card card-primary ">
              <div class="card-body">
                 <h5 class="card-title">Bienvenida (o) a SAPCE 3.0</h5> 

                <p class="card-text">
                  Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro temporibus suscipit sequi? Fuga recusandae consequatur, quod placeat, dolores aliquid quos in sequi, dolor quo ipsa numquam alias cupiditate ullam culpa.
                </p>
                
                <a href="#" class="card-link">Card link</a>
                <a href="#" class="card-link">Another link</a>
              </div>
            </div>
          </div>

          
        </div>
        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
<?= $this->endsection() ?>