<?= $this->extend('layouts/dashboard') ?>
<?= $this->section('content') ?>

<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Alta de Aspirante</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Inicio</a></li>
          <li class="breadcrumb-item active">Alta Aspirante</li>
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
            <h3 class="card-title">Registro </h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
            </div>
            <!-- /.card-tools -->
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row mb-3">
              <div class="col-sm-12">
                <h2>Datos personales</h2>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <div class="form-group">
                  <label>Apellido Paterno</label>
                  <input type="text" class="form-control" placeholder="" required>
                </div>
              </div>
              <div class="col-sm-3">
                <div class="form-group">
                  <label>Apellido Materno</label>
                  <input type="text" class="form-control" placeholder="" required>
                </div>
              </div>
              <div class="col-sm-3">
                <div class="form-group">
                  <label>Nombre(s)</label>
                  <input type="text" class="form-control" placeholder="" required>
                </div>
              </div>
              <div class="col-sm-3">
                <div class="form-group">
                  <label>Sexo</label>
                  <select class="form-control" required>
                    <option value="">Seleccione</option>
                    <option value="F">Mujer</option>
                    <option value="M">Hombre</option>

                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-3">
                <div class="form-group">
                  <label>Email</label>
                  <input name="email" class="form-control" type="email" id="email" onkeyup="this.value=this.value.toUpperCase()" placeholder="micorreo@dominio.com">

                </div>
              </div>
              <div class="col-sm-2">
                <div class="form-group">
                  <label>Teléfono</label>
                  <input name="tel" class="form-control" type="tel" id="tel" size="15" maxlength="15" placeholder="Teléfono">
                </div>
              </div>
              <div class="col-sm-2">
                <div class="form-group">
                  <label>Fecha de nacimiento</label>
                  <input type="date" class="form-control" name="fecnac" id="fecnac" require="true" required>
                </div>
              </div>
              <div class="col-sm-2">
                <div class="form-group">
                  <label>Edo. Civil</label>
                  <select name="edociv" class="form-control" id="edociv">
                    <option value="Soltero(a)" selected>Soltero(a)</option>
                    <option value="Casado (a)">Casado(a)</option>
                    <option value="otro">otro</option>
                  </select>
                </div>
              </div>
              <div class="col-sm-3">
                <div class="form-group">
                  <label>Especificar</label>
                  <input name="otro" class="form-control" type="text" id="otro" size="16" onkeyup="this.value=this.value.toUpperCase()" placeholder="otro edo civil">
                </div>
              </div>

            </div>

            <div class="row">
              <div class="col-sm-3">
                <div class="form-group">
                  <label>Teléfono</label>
                  <input name="tel" class="form-control" type="tel" id="tel" size="15" maxlength="15" placeholder="Teléfono">
                </div>
              </div>
              <div class="col-sm-2">
                <div class="form-group">
                  <label>CURP</label>

                  <input name="curp" class="form-control" type="text" id="curp" onkeyup="this.value=this.value.toUpperCase()" size="20" maxlength="18" placeholder="Indique su CURP" required>
                </div>
              </div>
              <div class="col-sm-2">
                <div class="form-group">
                  <label>Con alguna discapacidad</label>

                  <select class="form-control" name="discap" id="discap" required>
                    <option value='' selected>SELECCIONE</option>
                    <option value='1'>S&iacute;</option>
                    <option value='2'>No</option>
                  </select>
                </div>
              </div>
              <div class="col-sm-2">
                <div class="form-group">
                  <label>Alguna lengua/dialecto</label>
                  <select class="form-control" name="dialecto" id="dialecto" required>
                    <option value='' selected>SELECCIONE</option>
                    <option value='1'>S&iacute;</option>
                    <option value='2'>No</option>
                  </select>
                </div>
              </div>
              <div class="col-sm-3">
                <div class="form-group">
                  <label>Ciudad de procedencia(natal):</label>

                  <select class="form-control" name='proc' id='proc' required>
                    <?php
                    $db = \Config\Database::connect();

                    echo "<option value='' selected>Seleccione</option>";

                    $consultedo = $db->query("select * from estado");
                    $estado = $consultedo->getResult();

                    foreach ($estado as $edo) {
                      echo "<option value='$edo->idedo'>$edo->edo</option>";
                    }
                    ?>
                  </select>
                </div>
              </div>

            </div>
            <div class="row mb-3 mt-3">
              <div class="col-sm-12">
                <h2>Domicilio</h2>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-3">
                <div class="form-group">
                  <label>Calle</label>
                  <input name="calle" class="form-control" type="text" onkeyup="this.value=this.value.toUpperCase()" id="calle" size="50" placeholder="Indique la calle" required />
                </div>
              </div>
              <div class="col-sm-3">
                <div class="form-group">
                  <label>Colonia</label>
                  <input name="colonia" class="form-control" type="text" onkeyup="this.value=this.value.toUpperCase()" id="colonia" size="50" placeholder="Indique la colonia" required />
                </div>
              </div>
              <div class="col-sm-1">
                <div class="form-group">
                  <label>Código postal</label>
                  <input type="text" name="cp" class="form-control" id="cp" title="inserte los 5 números de su código postal" size="5" maxlength="5" placeholder="CP" required>
                </div>
              </div>
              <div class="col-sm-3">
                <div class="form-group">
                  <label>Estado</label>
                  <select class="form-control" name='edo' id='edo' required>
                    <?php
                    $consulted = $db->query("select * from estado");
                    $estado1 = $consulted->getResult();

                    echo "<option value='' selected>Seleccione</option>";
                    foreach ($estado1 as $es) {
                      echo "<option value='$es->idedo'>$es->edo</option>";
                    }
                    ?>
                  </select>
                </div>
              </div>
              <div class="col-sm-2">
                <div class="form-group">
                  <label>Ciudad</label>
                  <input class="form-control" name="ciudad" type="text" onkeyup="this.value=this.value.toUpperCase()" id="ciudad" size="50" placeholder="Indique la ciudad" required />
                </div>
              </div>
            </div>

            <div class="row mb-3 mt-3">
              <div class="col-sm-12">
                <h2>Antecedente Escolar</h2>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-2">
                <div class="form-group">
                  <label>Escuela de procedencia</label>

                  <select class="form-control" name='idesc' id='idesc' required>
                    <?php
                    $consulpro = $db->query("select * from procedencia");
                    $proceden = $consulpro->getResult();

                    echo "<option value='' selected>Seleccione</option>";
                    foreach ($proceden as $pr) {
                      echo "<option value='$pr->idesc'>$pr->escuela</option>";
                    }
                    ?>
                  </select>
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