<?php  session_start(); 
 ?>

<!DOCTYPE html >
<html>
<head>
<meta charset="UTF-8">
<title>	CAMPUS</title>
<link href="css/proweb.css" rel="stylesheet" type="text/css">

</head>

<body>
<div id="cuerpo">
	<header>
		<?php 	include "usuarios.php";	
		//$periodo=$_SESSION['periodo'];
	//echo"sesion: $quien <br>usuario: $usuario";
	if(($ses==1)||($ses==6))
	{
	print"
				<script languaje='JavaScript'>
				alert('No tiene permisos de acceso a esta página');
				window.location.href='index.php';
				</script>
				";
	}
		?>
	</header>

	<section id="seccion">


    


    <header id="header">


			<div class="subtitulo">Lista de alumnos inscritos en el semestre actual <?php echo"$periodo: $p->descper"?></div>


        <br>


    </header>





    <div id="registros" >


    <table>


    	<tr>


        


            


			<td >idcar</td>


            <th width="">CURP</th>


            <th width="">NOMBRE</th>


            <th width="">CLAVE PLANTEL</th>


            <th width="">CARRERA</th>


            <th width="">NOMBRE CARRERA</th>


            <th width="">PERIODOS</th>


            <th width="">TIPO PERIODO</th>


            <th width="">PERIODO ACTUAL</th>


 


            <th width="">PROMEDIO ANTERIOR</th>


            <th width="">PROMEDIO GENERAL</th>


            <th width="">MATRICULA</th>


            <th width="">REGULAR</th>


            <th width="">ESTATUS</th>


        </tr>


        <?php


		$alumnos="select distinct a.matricula, a.curp, a.app, a.apm, a.nom, a.status, a.propre, a.fecnac, a.sexo, a.idcar, ca.descar, a.email  from alumnos as a, carrera as ca, horario as h, cursa as c where ca.idcar=a.idcar and h.idh=c.idh and a.matricula=c.matricula and a.idcar='IADM-2010-213' and h.periodo='$periodo' order by a.idcar, a.status;";


		$als=mysql_query($alumnos,$conexion); 


		$f=0;


		while($a=mysql_fetch_object($als))


		{


			$f++;


			echo"


			<tr>			


				<td>$f</td>	


				<td>$a->curp</td>


				<td>$a->app $a->apm $a->nom</td>


				<td align='center'>09DIT0005O</td>


				<td>$a->idcar</td>


				<td>$a->descar</td>


				<td>12</td>


				<td>6</td>


				<td>$a->status</td>


				";


				


				//promedio actual





				if($a->status == 1)


				{


					echo"<td> 


					$a->propre </td> 


					<td> $a->propre </td>";


				}


				else


			


				{ 


					echo"<td>";


					$fecha=date('d/m/Y');


					$alumnosd="select a.app, a.apm, a.nom, a.status,a.propre, a.idcar, c.descar from alumnos as a, carrera as c where a.idcar=c.idcar and a.matricula='$a->matricula';";


					$alud=mysql_query($alumnosd,$conexion);


					$ad=mysql_fetch_object($alud);


					$sumcred=0;


					$sumpro=0;


					$matecar="select * from posee where idcar='$ad->idcar' order by sem;";


					$maca=mysql_query($matecar,$conexion);$x=0;


					while($mc=mysql_fetch_object($maca))


					{

						//promedio del semestre anterior
						$historia="select * from horario as h, cursa as c, materias as m where h.idmat=m.idmat and  h.idh=c.idh and matricula='$a->matricula' and h.idmat='$mc->idmat' and h.periodo='2019-2' order by h.periodo;";


						$his=mysql_query($historia,$conexion);


						$nm=mysql_num_rows($his);


						


						if($nm>1)


						{


							$aprobados="select * from horario as h, cursa as c, materias as m where h.idmat=m.idmat and  h.idh=c.idh and matricula='$a->matricula' and h.idmat='$mc->idmat' order by c.idh desc LIMIT 0,1;";


							$his=mysql_query($aprobados,$conexion);


							


						}


						


						while($h=mysql_fetch_object($his))


						{					


							$x++;


							$semestre="select * from posee where idcar='$ad->idcar' and idmat='$mc->idmat';";


							$seme=mysql_query($semestre,$conexion);


							$se=mysql_fetch_object($seme);


							if($h->prom>=70)


							{


								$sumcred+=$h->credit;


								$sumpro+=$h->prom;


							}	


						}


					}


					$proma=0;


					$proma=$sumpro/$x;


					//echo"$a->status "; 


					printf("%0.1f",$proma);


					echo"</td>";


					echo"<td>";


						$sumcred=0;


			  		//promedio general


					$sumpro=0;


				  	$matecar="select * from posee where idcar='$ad->idcar' order by sem;";


				  	$maca=mysql_query($matecar,$conexion);$x=0;


				  	while($mc=mysql_fetch_object($maca))


				  	{


				  		$historia="select * from horario as h, cursa as c, materias as m where h.idmat=m.idmat and  h.idh=c.idh and matricula='$a->matricula' and h.idmat='$mc->idmat' and h.periodo!='$periodo' order by h.periodo;";


				  		$his=mysql_query($historia,$conexion);


				  		$nm=mysql_num_rows($his);


				  		


				  		if($nm>1)


				  		{


				  			$aprobados="select * from horario as h, cursa as c, materias as m where h.idmat=m.idmat and  h.idh=c.idh and matricula='$a->matricula' and h.idmat='$mc->idmat' and h.periodo!='$periodo' order by c.idh desc LIMIT 0,1;";


				  			$his=mysql_query($aprobados,$conexion);


				  		}


				  			


				  		while($h=mysql_fetch_object($his))


				  		{					


				  			$x++;		


				  			if($h->prom>=70)     


				            $sumcred+=$h->credit;


				  			$sumpro+=$h->prom;





				  		}


				  	}


				


				$prom=0;


				$prom=$sumpro/$x;


				printf("%0.1f",$prom); 





				echo"</td>";


				}


				echo"


				<td>$a->matricula</td>


				<td>"; 


				if($a->status==1)


					echo"1";


				else


				{


					if($proma<70)


						echo"0";


					else


						echo"1";


				}	


					


				echo"</td>


				<td>1</td>


							


				</tr>


						"; 





		}


		?>


    </table>


	</div>


        


	</section>


	<div style="clear: both; width: 100%;"></div>


	


</div>


</body>


</html>