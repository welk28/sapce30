<?= $this->extend('layouts/dashboard') ?>
<?= $this->section('content') ?>

<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Lista de Materias ofertadas</h1>
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
						<h3 class="card-title">Oferta académica </h3>

						<div class="card-tools">
							<button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
						</div>
						<!-- /.card-tools -->
					</div>
					<!-- /.card-header -->
					<div class="card-body">
						<?php if (empty($carreras)) : ?>
							<h1>No hay registros qué mostrar</h1>
						<?php else : ?>


							<table id="listax" class="table table-sm table-bordered table-striped text-sm">
								<thead>
									<tr>
										<th>N</th>
										<th>Grupo</th>
										<th>HrS/Mat</th>
										<th>Sem</th>
										<th>Materia</th>
										<th>Lunes</th>
										<th>Martes</th>
										<th>Miercoles</th>
										<th>Jueves</th>
										<th>Viernes</th>
										<th>Ti</th>
										<th>Lo</th>
										<th>Ad</th>
										<th>Ins</th>
										<th></th>
									</tr>
								</thead>
								<tbody>
									<?php $x = 0;
									foreach ($carreras as $c) : ?>
										<?php
										$periodo = session('periodo');
										$db = \Config\Database::connect();
										$consulta = $db->query("select g.idg, h.idh, h.idmat,p.sem, h.idoc, h.cupo,  p.idcar, d.nomdoc, m.nommat from encarre as e, hgrupo as g, horario as h, posee as p, docente as d, materias as m where e.idg=g.idg and e.idcar=p.idcar and g.idh=h.idh and p.idmat=m.idmat and h.idmat=m.idmat and d.idoc=h.idoc and p.idmat=h.idmat and p.idcar='$c->idcar' and h.periodo='$periodo' order by g.idg, p.sem;");
										$horario = $consulta->getResult();
										?>
										<?php foreach ($horario as $h) : ?>
											<tr>
												<td><?= ++$x; ?></td>
												<td><?= $h->idg; ?></td>
												<td><?= $h->idh . " / " . $h->idmat ?></td>
												<td><?= $h->sem ?></td>
												<td><?= $h->nommat ?><br><?= $h->nomdoc ?></td>
												<!-- LUNES -->
												<?php
												$clunes = $db->query("select * from imparte as i, reloj as r, aula as a where a.ida=i.ida and r.idr=i.idr and i.idh='$h->idh' and i.idia='1'");
												$lunes = $clunes->getResult();
												?>
												<td>
													<?php foreach ($lunes as $l) : ?>
														<?= $l->hora." / ".$l->aula  ?><br>
													<?php endforeach; ?>
												</td>
												<!-- MARTES -->
												<?php
												$cmartes = $db->query("select * from imparte as i, reloj as r, aula as a where a.ida=i.ida and r.idr=i.idr and i.idh='$h->idh' and i.idia='2'");
												$martes = $cmartes->getResult();
												?>
												<td>
													<?php foreach ($martes as $m) : ?>
														<?= $m->hora." / ".$m->aula  ?><br>
													<?php endforeach; ?>
												</td>
												<!-- MIERCOLES -->
												<?php
												$cmiercoles = $db->query("select * from imparte as i, reloj as r, aula as a where a.ida=i.ida and r.idr=i.idr and i.idh='$h->idh' and i.idia='3'");
												$miercoles = $cmiercoles->getResult();
												?>
												<td>
													<?php foreach ($miercoles as $mi) : ?>
														<?= $mi->hora." / ".$mi->aula  ?><br>
													<?php endforeach; ?>
												</td>
												<!-- JUEVES	 -->
												<?php
												$cjueves = $db->query("select * from imparte as i, reloj as r, aula as a where a.ida=i.ida and r.idr=i.idr and i.idh='$h->idh' and i.idia='4'");
												$jueves = $cjueves->getResult();
												?>
												<td>
													<?php foreach ($jueves as $j) : ?>
														<?= $j->hora." / ".$j->aula  ?><br>
													<?php endforeach; ?>
												</td>
												<!-- VIERNES	 -->
												<?php
												$cviernes = $db->query("select * from imparte as i, reloj as r, aula as a where a.ida=i.ida and r.idr=i.idr and i.idh='$h->idh' and i.idia='4'");
												$viernes = $cviernes->getResult();
												?>
												<td>
													<?php foreach ($viernes as $v) : ?>
														<?= $v->hora." / ".$v->aula  ?><br>
													<?php endforeach; ?>
												</td>
												<?php 
													$ctic=$db->query("select distinct c.matricula from alumnos as a, cursa as c, horario as h where a.matricula=c.matricula and h.idh=c.idh and h.idh='$h->idh' and a.idcar='ITIC-2010-225'");
													$tic=$ctic->getNumRows();
												?>
												<td><?= $tic ?></td>
												<?php 
												$clog=$db->query("select distinct c.matricula from alumnos as a, cursa as c, horario as h where a.matricula=c.matricula and h.idh=c.idh and h.idh='$h->idh' and a.idcar='ILOG-2009-202'");
												$log=$clog->getNumRows();
														
												?>
												<td><?= $log ?></td>
												<?php 
													$cadm=$db->query("select distinct c.matricula from alumnos as a, cursa as c, horario as h where a.matricula=c.matricula and h.idh=c.idh and h.idh='$h->idh' and a.idcar='IADM-2010-213'");
													$adm=$cadm->getNumRows();

												?>
												<td><?= $adm ?></td>
												<?php 
													$numero=$db->query("select matricula from cursa where idh='$h->idh'");
													$numi=$numero->getNumRows();

												?>
												<td><?= $numi ?></td>
												<td align="center">
													<div class="btn-group ">
														<a href="" class="btn btn-sm btn-info"><i class="far fa-clock"></i></a>
														<a href="" class="btn btn-sm btn-primary"><span class="far fa-id-card"></span></a>
														<a href="" class="btn btn btn-sm btn-success"><span class="fas fa-th-list"></span></a>

													</div>
												</td>
											</tr>
										<?php endforeach; ?>
									<?php endforeach; ?>
								<tfoot>
									<tr>
										<th>N</th>
										<th>Grupo</th>
										<th>HrS/Mat</th>
										<th>Sem</th>
										<th>Materia</th>
										<th>Lunes</th>
										<th>Martes</th>
										<th>Miercoles</th>
										<th>Jueves</th>
										<th>Viernes</th>
										<th>Ti</th>
										<th>Lo</th>
										<th>Ad</th>
										<th>Ins</th>
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