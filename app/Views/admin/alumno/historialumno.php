<?= $this->extend('layouts/dashboard') ?>
<?= $this->section('content') ?>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Lista historica de alumnos</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                    <li class="breadcrumb-item active"><?= $uri->getSegment(1) ?></li>
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

            <div class="col-sm-12">
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Total de alumnos registrados en SAPCE </h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
                        </div>
                        <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">


                        <?php if (empty($alumnos)) : ?>
                            <h1>No hay registros qué mostrar</h1>
                        <?php else : ?>

                            <table id="listax" class="table table-sm table-bordered table-striped text-sm">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>NOMBRE</th>
                                        <th>sexo</th>
                                        <th>FECNAC</th>
                                        <th>IDCAR </th>
                                        <th>STATUS</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($alumnos as $al) : ?>
                                        <tr>
                                            <td><?= $al->matricula ?></td>
                                            <td><?= $al->app . " " . $al->apm . " " . $al->nom ?></td>
                                            <td><?= $al->sexo ?></td>
                                            <td><?= $al->fecnac ?></td>
                                            <td><?= $al->idcar ?></td>
                                            <td><?= $al->status ?></td>

                                        </tr>
                                    <?php endforeach; ?>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>NOMBRE</th>
                                        <th>sexo</th>
                                        <th>FECNAC</th>
                                        <th>IDCAR </th>
                                        <th>STATUS</th>
                                    </tr>
                                </tfoot>
                            </table>
                        <?php endif; ?>
                        <!-- <a href="#" class="card-link">Card link</a>
                        <a href="#" class="card-link">Another link</a> -->
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

            </div>


        </div>
        <!-- /.row -->
    </div>
    <!--/. container-fluid -->
</section>
<!-- /.content -->
<?= $this->endsection() ?>