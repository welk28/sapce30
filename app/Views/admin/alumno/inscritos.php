<?= $this->extend('layouts/dashboard') ?>
<?= $this->section('content') ?>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Lista de alumnos Inscritos en periodo actual</h1>
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
                        <h3 class="card-title">Alumnos inscritos periodo </h3>

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
                                        <th>Control</th>
                                        <th>NOMBRE</th>
                                        <th>S</th>
                                        <th>FECNAC</th>
                                        <th>Ed</th>
                                        <th>Sem </th>
                                        <th>IDCAR </th>
                                        <th></th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($alumnos as $al) : ?>
                                        <?php 
                                        $fechanacimiento=$al->fecnac;
                                        list($ano,$mes,$dia) = explode("-",$fechanacimiento);
                                        $edad= date("Y") - $ano;
                                        ?>
                                        <tr>
                                            <td><?= $al->matricula ?></td>
                                            <td><?= $al->app . " " . $al->apm . " " . $al->nom ?></td>
                                            <td><?= $al->sexo ?></td>
                                            <td><?= $al->fecnac ?></td>
                                            <td><?= $edad ?></td>
                                            <td><?= $al->status ?></td>
                                            <td><?= $al->idcar ?></td>
                                            <td align="center">
                                                <div class="btn-group ">
                                                    
                              <a href="<?php echo base_url(); ?>/horario/<?= $al->matricula ?>" class="btn btn-success btn-xs" title="Ver los datos generales del usuario"><i class="far fa-clock"></i></a>

                                                    <a href="" class="btn btn-sm btn-primary"><span class="far fa-id-card"></span></a>
                                                    <a href="" class="btn btn btn-sm btn-success"><span class="fas fa-th-list"></span></a>
                                                
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>NOMBRE</th>
                                        <th>S</th>
                                        <th>FECNAC</th>
                                        <th>Ed</th>
                                        <th>Sem </th>
                                        <th>IDCAR </th>
                                        <th></th>
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
        
    </div>
    <!--/. container-fluid -->
</section>
<!-- /.content -->
<?= $this->endsection() ?>