<?php  session_start();  ?>
<!DOCTYPE html >
<html>
<head>

<title>SAPCE ::: ITIZTAPALAPAII.EDU.MX</title>

<meta charset="UTF-8">
</head>

<body>
<div id="cuerpo">
	<header>
		<?php 	
		$usuario=$_SESSION['usuario'];
	
		include "usuarios.php";	?>
	</header>
	
	
	<section id="seccion">
		
		<div id="registros">
			<b>Estimado Alumno: </b><br>
							En nuestro Instituto Tecnológico tenemos la misión y el firme compromiso de satisfacer plenamente tus necesidades y 
							requerimientos en los servicios que ofrecemos, buscando mejorar permanentemente nuestro desempeño y servirte mejor. <br><br>
							Para lograr esto, lo más valioso es su opinión, por lo que se solicita responder con sinceridad un breve cuestionario anexo, 
							cuya respuesta será la mejor ayuda para superarnos. <br><br><br><br>
			<?php 
			//CENTRO DE COMPUTO
			$computo="select i.ida from imparte as i, horario as h, cursa as c where i.idh=h.idh and i.idh=c.idh and h.idh=c.idh and (i.ida='2' or i.ida='15' or i.ida='16' or i.ida='17') and c.matricula='$usuario' and h.periodo='$periodo';";
			$comp=mysql_query($computo,$conexion);
			$cc=mysql_num_rows($comp);

			//RESIDENCIA
			$residencia="select h.idh from horario as h, cursa as c where h.idh=c.idh and h.periodo='$periodo' and h.idmat='RESIDENCIA' and c.matricula='$usuario';";
			$resi=mysql_query($residencia,$conexion);
			$re=mysql_num_rows($resi);
			
			//SERVICIO SOCIAL
			$servicio="select h.idh from horario as h, cursa as c where h.idh=c.idh and h.periodo='$periodo' and h.idmat='SS' and c.matricula='$usuario';";
			$ser=mysql_query($servicio,$conexion);
			$ss=mysql_num_rows($ser);

			//SEMESTRE
			$semestre="select status from alumnos where matricula='$usuario';";
			$seme=mysql_query($semestre,$conexion);
			$se=mysql_fetch_object($seme);

			//echo"computo: $cc <br> residencia: $re <br> serv social: $ss <br> Semestre: $se->status <br>idcar: $d->idcar";
			?>
			<table>
				<tr>
					<th>No</th>
					<th>SERVICIO</th>
					<th>EVALUAR</th>
				</tr>
				<?php
				$servicios="select s.idser, s.descs, a.noev from servicio as s, auditoria as a where a.idser=s.idser and a.periodo='$periodo' ;";
				$serv=mysql_query($servicios,$conexion);
				$n=0;
				$X=0;
				$z=0;
				while($s=mysql_fetch_object($serv))
				{
					$preguntas="select p.nop, p.descp from preguntaudita as p, auditoria as a where p.idser=a.idser and a.idser='$s->idser' and not exists(select r.nop from respondaudita as r where a.noev=r.noev and r.nop=p.nop and r.matricula='$usuario' and r.noev='$s->noev');";
					$pregu=mysql_query($preguntas,$conexion);
					$cp=mysql_num_rows($pregu);
					
					
					

					$buscomenta="select * from responcomenta where noev='$s->noev' and matricula='$usuario';";
					$busco=mysql_query($buscomenta,$conexion);
					$bc=mysql_num_rows($busco);

					$n++;
					if(($s->idser=='CC')||($s->idser=='RESIDENCIA')||($s->idser=='SS')||($s->idser=='SE'))
					{
						if((($s->idser=='CC')&&($cc>0))||(($s->idser=='RESIDENCIA')&&($re>0))||(($s->idser=='SE')&&($se->status>1))||(($s->idser=='SS')&&($ss>0)))
						{
						
							echo"
							<tr>
								<td>$n</td>	
								<td>$s->descs</td>
								<td> ";
								if(($cp!=0)||($bc<1))
									echo"<a href='evaserv.php?noev=$s->noev&idser=$s->idser'>evaluar ";
								echo"</td>
							</tr>
							";
						}
					}
					else
					{

						//
						//if(($s->idser=='$d->idcar')&&($se->status>1))
						if((($s->idser=='IADM-2010-213')||($s->idser=='ILOG-2009-202')||($s->idser=='ITIC-2010-225'))&&($se->status>1))
						{
							$auditoria="select noev from auditoria where idser='$d->idcar' and periodo='$periodo';";
						$audi=mysql_query($auditoria,$conexion);
						$au=mysql_fetch_object($audi);
						$noev=$au->noev;
						
						$preguntasc="select p.nop, p.descp from preguntaudita as p, auditoria as a where p.idser=a.idser and a.idser='$d->idcar' and not exists(select r.nop from respondaudita as r where a.noev=r.noev and r.nop=p.nop and r.matricula='$usuario' and r.noev='$noev');";
					$preguc=mysql_query($preguntasc,$conexion);
					$cpc=mysql_num_rows($preguc);
					
					$buscomentac="select * from responcomenta where noev='$noev' and matricula='$usuario';";
					$buscoc=mysql_query($buscomentac,$conexion);
					$bcc=mysql_num_rows($buscoc);
					
							$cor="COORD";
							$x++;
							if($x==1)
							{
								echo"
								<tr>
									<td>$n</td>	
									<td>COORDINACION DE CARRERA</td>
									<td>";
								if(($cpc!=0)||($bcc<1))
									echo"<a href='evaserv.php?noev=$noev&idser=$d->idcar&cor=$cor'> evaluar";

								echo"</td>
								</tr>
								";
							}
						}
						else
						{
							if((($s->idser=='IADM-2010-213')||($s->idser=='ILOG-2009-202')||($s->idser=='ITIC-2010-225'))&&($se->status==1))
							{
								$z++;
								if($z==1)
								{
									echo"
									<tr>
										<td>$n</td>	
										<td>COORDINACION DE CARRERA</td>
										<td>NO APLICA</td>
									</tr>
									";
								}
							}
							else
							{
								echo"
								<tr>
									<td>$n</td>	
									<td>$s->descs</td>
									<td>";
								if(($cp!=0)||($bc<1))
									echo"<a href='evaserv.php?noev=$s->noev&idser=$s->idser'>evaluar";

								echo"</td>
								</tr>";
							}
						}

					}
				}
				?>
			</table>
		</div>
		
	</section>
	<div style="clear: both; width: 100%;"></div>
	<footer >
		<?php	include "../pie.php";	?>
	</footer>
</div>

</body>
</html>
