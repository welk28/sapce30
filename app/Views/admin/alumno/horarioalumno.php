<?= $this->extend('layouts/dashboard') ?>
<?= $this->section('content') ?>

<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-5">
        <h1 class="m-0 text-dark">Horario Alumno</h1>
      </div><!-- /.col -->
      <div class="col-sm-1">
        <button type="button" class="btn btn-primary btn-print btn-sm ">
          <span class="fa fa-print"> </span> Imprimir</button>
      </div>
      <div class="col-sm-5">
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

          <div class="card-body">
            <div class="row">
              <div class="col-sm-12 mb-3">
                <div class="table-responsive-sm">
                  <table class="table table-sm table-borderless">
                    <thead>
                      <tr>
                        <td rowspan="3" align="center"> <img src="<?= base_url('/') . "/public/img/SGC.jpg"; ?>" alt="" width="80px"> </td>
                        <td rowspan="2" align="left"><strong>Formato de carga académica.</strong></td>
                        <td>Código: Num. De control del estudiante</td>
                      </tr>
                      <tr>
                        <td>Revisión: O</td>
                      </tr>
                      <tr>
                        <td align="left"><strong>Referencia a la Norma ISO 9001-2015: 8.2.1, 8.2.2, 8.2.3, 8.2.4, 8.5.2</strong></td>
                        <td>P&aacute;gina 1 de 1 </td>
                      </tr>
                    </thead>

                  </table>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12 table-responsive">
                <table class="table table-sm table-borderless">
                  <thead>
                    <th class="text-center">
                      <h3>SEP</h3>
                    </th>
                    <th class="text-center">
                      <h3>INSTITUTO TECNOLÓGICO DE IZTAPALAPA II</h3>
                    </th>
                    <th class="text-center">
                      <h3>SES</h3>
                    </th>
                    <th class="text-center" width="">
                      <h3>TNM</h3>
                    </th>
                  </thead>

                </table>
              </div>
            </div>

            <div class="row mt-3">
              <div class="col-sm-12 text-center mb-3">
                <h3>CARGA ACADEMICA AL PERIODO <?= session('descper'); ?></h3>
              </div>
            </div>
            
            <div class="row">
              <div class="col-sm-12 table-responsive">
                <table class="table table-sm table-borderless">
                  <thead>

                    <tr>
                      <td align="">FECHA:</td>
                      <td><u><?php $fecha = date('d/m/Y');
                              echo "$fecha"; ?></u></td>
                      <td></td>
                      <td></td>
                    </tr>

                    <tr>
                      <td width="24%">NUMERO DE CONTROL:</td>
                      <td width="31%"><u><?= $matricula ?></u></td>
                      <td></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td>ESTUDIANTE:</td>
                      <td><u><?= $al->app . " " . $al->apm . " " . $al->nom ?></u></td>
                      <td></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td>SEMESTRE:</td>
                      <td><u><?= $al->status ?></u></td>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td>CARRERA:</td>
                      <td><u><?= $al->descar ?></u></td>
                      <td>CRÉDITOS:</td>
                      <td ><u >
                          <p id="ccred" ></p>
                        </u></td>
                    </tr>
                    <tr>
                      <td>PLAN:</td>
                      <td><u><?= $al->idcar ?></u></td>
                      <td>Especialidad: </td>
                      <td> </td>
                    </tr>
                  </thead>

                </table>
              </div>
            </div>


            
            <div class="row">

              <div class="col-sm-12">
                <div class="table-responsive-sm">
                  <?php if (empty($materias)) : ?>
                    <h1>No hay registros qué mostrar</h1>
                  <?php else : ?>
                    <table class="table table-sm table-bordered table-striped text-sm">
                      <thead>
                        <tr>
                          <th>Materia</th>
                          <th>CLAVE</th>
                          <th>GPO</th>
                          <th>OPORT</th>
                          <th>CR</th>
                          <th>LUNES</th>
                          <th>MARTES</th>
                          <th>MIERCOLES</th>
                          <th>JUEVES</th>
                          <th>VIERNES</th>
                          <th>x</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $totcre = 0;
                        $sopor = 0;
                        $db = \Config\Database::connect(); ?>
                        <?php foreach ($materias as $m) : ?>
                          <?php

                          $grupoc = $db->query("select g.idg, h.idh, h.idmat from hgrupo as g, horario as h,  encarre as e where e.idg=g.idg and g.idh=h.idh and h.idh='$m->idh' and e.idcar='$al->idcar';");
                          $gpo = $grupoc->getRow();
                          ?>
                          <tr>
                            <td> <?= $m->nommat . "<br>" . $m->nomdoc; ?>
                              <?php
                              if ($m->opor == 3)
                                $sopor++;
                              ?>
                            </td>
                            <td> <?= $m->idmat ?> </td>
                            <td><?= $gpo->idg ?></td>
                            <td><?= $m->descopor ?></td>
                            <td><?= $m->credit ?> <?php $totcre += $m->credit; ?> </td>
                            <td>
                              <?php
                              $dialunes = $db->query("select * from imparte as i, reloj as r, aula as a where a.ida=i.ida and r.idr=i.idr and i.idh='$m->idh' and i.idia='1';");
                              $lunes = $dialunes->getResult();
                              if (!empty($lunes)) {
                                foreach ($lunes as $lu) {
                                  echo " $lu->hora / $lu->aula <br>";
                                }
                              }
                              ?>

                            </td>
                            <td>
                              <?php
                              $diamartes = $db->query("select * from imparte as i, reloj as r, aula as a where a.ida=i.ida and r.idr=i.idr and i.idh='$m->idh' and i.idia='2';");
                              $martes = $diamartes->getResult();
                              if (!empty($martes)) {
                                foreach ($martes as $ma) {
                                  echo " $ma->hora / $ma->aula <br>";
                                }
                              }
                              ?>
                            </td>
                            <td>
                              <?php
                              $diamiercoles = $db->query("select * from imparte as i, reloj as r, aula as a where a.ida=i.ida and r.idr=i.idr and i.idh='$m->idh' and i.idia='3';");
                              $miercoles = $diamiercoles->getResult();
                              if (!empty($miercoles)) {
                                foreach ($miercoles as $mi) {
                                  echo " $mi->hora / $mi->aula <br>";
                                }
                              }
                              ?>
                            </td>
                            <td>
                              <?php
                              $diajueves = $db->query("select * from imparte as i, reloj as r, aula as a where a.ida=i.ida and r.idr=i.idr and i.idh='$m->idh' and i.idia='4';");
                              $jueves = $diajueves->getResult();
                              if (!empty($jueves)) {
                                foreach ($jueves as $ju) {
                                  echo " $ju->hora / $ju->aula <br>";
                                }
                              }
                              ?>
                            </td>
                            <td>
                              <?php
                              $diaviernes = $db->query("select * from imparte as i, reloj as r, aula as a where a.ida=i.ida and r.idr=i.idr and i.idh='$m->idh' and i.idia='5';");
                              $viernes = $diaviernes->getResult();
                              if (!empty($viernes)) {
                                foreach ($viernes as $vi) {
                                  echo " $vi->hora / $vi->aula <br>";
                                }
                              }
                              ?>
                            </td>
                          </tr>
                        <?php endforeach; ?>
                        <tr>
                          <td></td>
                          <td></td>
                          <td align='right'>Total de créditos</td>
                          <td></td>
                          <td>
                            <p id="totalc"><?= $totcre ?></p>
                          </td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                        </tr>
                      </tbody>
                    </table>
                  <?php endif; ?>
                </div>
              </div>
            </div>
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