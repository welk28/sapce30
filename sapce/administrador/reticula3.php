<?php  session_start();  ?>
<!DOCTYPE html >
<html>
<head>
<meta charset="UTF-8">
<title>SAPCE ::: ITIZTAPALAPAII.EDU.MX</title>



</head>

<body>
<div id="cuerpo">
	<header id="cabecera">
		<?php 	include "../usuarios.php";	
		//$periodo=$_SESSION['periodo'];
		//echo"sesion: $quien <br>usuario: $usuario";
		$idcar=$_GET[idcar];
		$fecha=date('d/m/Y');
		$matricula=$_GET[matricula];
		$alumno="select a.app, a.apm, a.nom, a.status, a.idcar, c.descar from alumnos as a, carrera as c where a.idcar=c.idcar and a.matricula='$matricula';";
		$alu=mysql_query($alumno,$conexion);
		$a=mysql_fetch_object($alu);
			?>
		

	</header>
	<section id="seccion">
     <header id="header">
            <table width="555" align="center">
              <tr>
                <td>FECHA:</td>
                <td><u><?php echo"$fecha"; ?></u></td>
                <td width="21%">&nbsp;</td>
                <td width="24%">&nbsp;</td>
              </tr>
              <tr>
                <td width="24%">N&Uacute;MERO DE CONTROL:</td>
                <td width="31%"><u><?php echo"$matricula"; ?></u></td>
                <td>PERIODO:</td>
                <td><u><?php echo"$p->descper"; ?></u></td>
              </tr>
              <tr>
                <td>ESTUDIANTE:</td>
                <td><u><?php echo"$a->app $a->apm $a->nom"; ?></u></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>SEMESTRE:</td>
                <td><u><?php echo"$a->status"; ?></u></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>CARRERA:</td>
                <td><u><?php echo"$a->descar"; ?></u></td>
                <td>CR&Eacute;DITOS:</td>
                <td><u><?php echo"$sumcred"; ?></u></td>
              </tr>
              <tr>
                <td>PLAN:</td>
                <td><u><?php echo"<a href='reticula.php?matricula=$matricula&idcar=$a->idcar' target='_blank'>$a->idcar</a>"; ?></u></td>
                <td>ESPECIALIDAD:</td>
                <td><u>
                  <?php 
                    /*if($idcar=="ITIC-2010-225")
                        echo"ESPECIALIDAD PARA TICS"; 
                    else
                    {
                        if($idcar=="ILOG-2009-202")
                            echo"ESPECIALIDAD PARA LOGISTICA";
                        else
                        {
                            if($idcar=="IADM-2010-213")
                                echo"ESPECIALIDAD PARA ADMINISTRACION";	
                        }
                    }
                    */
                    ?>
                </u></td>
              </tr>
              
            </table><br>
      </header>
    
    <div id="reticula">
<table>
            <tr>
                <th>1</th>
                <th>2</th>
                <th>3</th>
                <th>4</th>
                <th>5</th>
                <th>6</th>
                <th>7</th>
                <th>8</th>
                <th>9</th>
            </tr>
        <?php
            $nutic="select idmat from posee where idcar='$idcar' and sem='1' order by idmat;";
			$nuti=mysql_query($nutic,$conexion);
			$nt=mysql_num_rows($nuti);
			
			$c=0;
			$sems=7;
            for($a=0; $a<$sems; $a++)
            {	echo"<tr>";				
			
				//1+++++++++++++++++++++++++++
				$ret1="select p.idmat, m.nommat, m.cred, m.credit from posee as p, materias as m where p.idcar='$idcar' and p.idmat=m.idmat and p.sem='1' order by p.idmat limit $a,1;";
				//$tic="select idmat from posee where idcar='$idcar' and sem='1' order by idmat limit $a,1;";
            	$re1=mysql_query($ret1,$conexion);
				$r1=mysql_fetch_object($re1);
                
				if($c<$nt)
				{
					//MATERIAS DE PRIMER SEMESTRE
                    //buscar la materia
					$historia="select h.idmat, c.prom, c.opor, h.periodo from horario as h, cursa as c, materias as m where h.idmat=m.idmat and  h.idh=c.idh and matricula='$matricula' and h.idmat='$r1->idmat' order by c.idh desc LIMIT 0,1;";
					$his=mysql_query($historia,$conexion);
					$hc=mysql_fetch_object($his);
					$nm=mysql_num_rows($his);
					//si encuentra registros significa que ha cursado
					if($nm>0) //sí encontró
					{
						if(($hc->prom<70)&&($hc->periodo!=$periodo))//si la materia encontrada no es del periodo actual y ademas es reprobatorio, colocarlo como reprobado
						{
							echo"<td valign='bottom' class='repro'>";
							if($hc->opor==1)
							{echo"<p class='reprobo'>A Repetición</p>";}
							else
							{
								if($hc->opor==2)
								{echo"<p class='reprobo'>A Especial</p>";}
								else
								{
									if($hc->opor==3)
									{echo"<p class='reprobo'>Baja def</p>";}
									else
									{
										if($hc->opor==4)
										{echo"<p class='reprobo'>Baja def</p>";}
									}
								}
							}
						}
						else
						{
							if(($hc->prom>=70)&&($hc->periodo!=$periodo)) //si la calificacion es mayor o igual a 70 y es de diferente periodo, colocarlo como aprobatorio
							{
								echo"<td valign='bottom' class='aprob'>";
							}
							else //sino, entonces es del periodo actual
							{
								if($hc->opor==1)
								{
									echo"<td valign='bottom' class='cursaord'>";
								}
								else
								{
									if($hc->opor==2)
									{
										echo"<td valign='bottom' class='cursarep'>";
									}
									else
									{
										if($hc->opor==3)
										{
											echo"<td valign='bottom' class='cursaesp'>";
										}
										else
										{
											if($hc->opor==4)
											{
												echo"<td valign='bottom' class='cursaglo'>";
											}
										}
									}
								}
							}
						}
					}
					else
					{
						echo"<td valign='bottom'>";
					}
					echo"<p class='materia'>$r1->nommat</p> <p class='idmat'>$r1->idmat</p>
					<table class='nums' >
						<tr>
							<td ></td>
							<td >$r1->cred</td>
						</tr>
					</table>
					</td>";
				}
				else
				{
						echo"<td></td>";
				}
				//2+++++++++++++++++++++++++++
				$ret1="select p.idmat, m.nommat, m.cred, m.credit from posee as p, materias as m where p.idcar='$idcar' and p.idmat=m.idmat and p.sem='2' order by p.idmat limit $a,1;";
				//$tic="select idmat from posee where idcar='$idcar' and sem='1' order by idmat limit $a,1;";
            	$re1=mysql_query($ret1,$conexion);
				$r1=mysql_fetch_object($re1);
                
				if($c<$nt)
				{
					//MATERIAS DE PRIMER SEMESTRE
                    //buscar la materia
					$historia="select h.idmat, c.prom, c.opor, h.periodo from horario as h, cursa as c, materias as m where h.idmat=m.idmat and  h.idh=c.idh and matricula='$matricula' and h.idmat='$r1->idmat' order by c.idh desc LIMIT 0,1;";
					$his=mysql_query($historia,$conexion);
					$hc=mysql_fetch_object($his);
					$nm=mysql_num_rows($his);
					//si encuentra registros significa que ha cursado
					if($nm>0) //sí encontró
					{
						if(($hc->prom<70)&&($hc->periodo!=$periodo))//si la materia encontrada no es del periodo actual y ademas es reprobatorio, colocarlo como reprobado
						{
							echo"<td valign='bottom' class='repro'>";
							if($hc->opor==1)
							{echo"<p class='reprobo'>A Repetición</p>";}
							else
							{
								if($hc->opor==2)
								{echo"<p class='reprobo'>A Especial</p>";}
								else
								{
									if($hc->opor==3)
									{echo"<p class='reprobo'>Baja def</p>";}
									else
									{
										if($hc->opor==4)
										{echo"<p class='reprobo'>Baja def</p>";}
									}
								}
							}
						}
						else
						{
							if(($hc->prom>=70)&&($hc->periodo!=$periodo)) //si la calificacion es mayor o igual a 70 y es de diferente periodo, colocarlo como aprobatorio
							{
								echo"<td valign='bottom' class='aprob'>";
							}
							else //sino, entonces es del periodo actual
							{
								if($hc->opor==1)
								{
									echo"<td valign='bottom' class='cursaord'>";
								}
								else
								{
									if($hc->opor==2)
									{
										echo"<td valign='bottom' class='cursarep'>";
									}
									else
									{
										if($hc->opor==3)
										{
											echo"<td valign='bottom' class='cursaesp'>";
										}
										else
										{
											if($hc->opor==4)
											{
												echo"<td valign='bottom' class='cursaglo'>";
											}
										}
									}
								}
							}
						}
					}
					else
					{
						echo"<td valign='bottom'>";
					}
					echo"<p class='materia'>$r1->nommat</p> <p class='idmat'>$r1->idmat</p>
					<table class='nums' >
						<tr>
							<td ></td>
							<td >$r1->cred</td>
						</tr>
					</table>
					</td>";
				}
				else
				{
						echo"<td></td>";
				}
				//3+++++++++++++++++++++++++++
				$ret1="select p.idmat, m.nommat, m.cred, m.credit from posee as p, materias as m where p.idcar='$idcar' and p.idmat=m.idmat and p.sem='3' order by p.idmat limit $a,1;";
				//$tic="select idmat from posee where idcar='$idcar' and sem='1' order by idmat limit $a,1;";
            	$re1=mysql_query($ret1,$conexion);
				$r1=mysql_fetch_object($re1);
                
				if($c<$nt)
				{
					//MATERIAS DE PRIMER SEMESTRE
                    //buscar la materia
					$historia="select h.idmat, c.prom, c.opor, h.periodo from horario as h, cursa as c, materias as m where h.idmat=m.idmat and  h.idh=c.idh and matricula='$matricula' and h.idmat='$r1->idmat' order by c.idh desc LIMIT 0,1;";
					$his=mysql_query($historia,$conexion);
					$hc=mysql_fetch_object($his);
					$nm=mysql_num_rows($his);
					//si encuentra registros significa que ha cursado
					if($nm>0) //sí encontró
					{
						if(($hc->prom<70)&&($hc->periodo!=$periodo))//si la materia encontrada no es del periodo actual y ademas es reprobatorio, colocarlo como reprobado
						{
							echo"<td valign='bottom' class='repro'>";
							if($hc->opor==1)
							{echo"<p class='reprobo'>A Repetición</p>";}
							else
							{
								if($hc->opor==2)
								{echo"<p class='reprobo'>A Especial</p>";}
								else
								{
									if($hc->opor==3)
									{echo"<p class='reprobo'>Baja def</p>";}
									else
									{
										if($hc->opor==4)
										{echo"<p class='reprobo'>Baja def</p>";}
									}
								}
							}
						}
						else
						{
							if(($hc->prom>=70)&&($hc->periodo!=$periodo)) //si la calificacion es mayor o igual a 70 y es de diferente periodo, colocarlo como aprobatorio
							{
								echo"<td valign='bottom' class='aprob'>";
							}
							else //sino, entonces es del periodo actual
							{
								if($hc->opor==1)
								{
									echo"<td valign='bottom' class='cursaord'>";
								}
								else
								{
									if($hc->opor==2)
									{
										echo"<td valign='bottom' class='cursarep'>";
									}
									else
									{
										if($hc->opor==3)
										{
											echo"<td valign='bottom' class='cursaesp'>";
										}
										else
										{
											if($hc->opor==4)
											{
												echo"<td valign='bottom' class='cursaglo'>";
											}
										}
									}
								}
							}
						}
					}
					else
					{
						echo"<td valign='bottom'>";
					}
					echo"<p class='materia'>$r1->nommat</p> <p class='idmat'>$r1->idmat</p>
					<table class='nums' >
						<tr>
							<td ></td>
							<td >$r1->cred</td>
						</tr>
					</table>
					</td>";
				}
				else
				{
						echo"<td></td>";
				}
				
				//4+++++++++++++++++++++++++++
				$ret1="select p.idmat, m.nommat, m.cred, m.credit from posee as p, materias as m where p.idcar='$idcar' and p.idmat=m.idmat and p.sem='4' order by p.idmat limit $a,1;";
				//$tic="select idmat from posee where idcar='$idcar' and sem='1' order by idmat limit $a,1;";
            	$re1=mysql_query($ret1,$conexion);
				$r1=mysql_fetch_object($re1);
                
				if($c<$nt)
				{
					//MATERIAS DE PRIMER SEMESTRE
                    //buscar la materia
					$historia="select h.idmat, c.prom, c.opor, h.periodo from horario as h, cursa as c, materias as m where h.idmat=m.idmat and  h.idh=c.idh and matricula='$matricula' and h.idmat='$r1->idmat' order by c.idh desc LIMIT 0,1;";
					$his=mysql_query($historia,$conexion);
					$hc=mysql_fetch_object($his);
					$nm=mysql_num_rows($his);
					//si encuentra registros significa que ha cursado
					if($nm>0) //sí encontró
					{
						if(($hc->prom<70)&&($hc->periodo!=$periodo))//si la materia encontrada no es del periodo actual y ademas es reprobatorio, colocarlo como reprobado
						{
							echo"<td valign='bottom' class='repro'>";
							if($hc->opor==1)
							{echo"<p class='reprobo'>A Repetición</p>";}
							else
							{
								if($hc->opor==2)
								{echo"<p class='reprobo'>A Especial</p>";}
								else
								{
									if($hc->opor==3)
									{echo"<p class='reprobo'>Baja def</p>";}
									else
									{
										if($hc->opor==4)
										{echo"<p class='reprobo'>Baja def</p>";}
									}
								}
							}
						}
						else
						{
							if(($hc->prom>=70)&&($hc->periodo!=$periodo)) //si la calificacion es mayor o igual a 70 y es de diferente periodo, colocarlo como aprobatorio
							{
								echo"<td valign='bottom' class='aprob'>";
							}
							else //sino, entonces es del periodo actual
							{
								if($hc->opor==1)
								{
									echo"<td valign='bottom' class='cursaord'>";
								}
								else
								{
									if($hc->opor==2)
									{
										echo"<td valign='bottom' class='cursarep'>";
									}
									else
									{
										if($hc->opor==3)
										{
											echo"<td valign='bottom' class='cursaesp'>";
										}
										else
										{
											if($hc->opor==4)
											{
												echo"<td valign='bottom' class='cursaglo'>";
											}
										}
									}
								}
							}
						}
					}
					else
					{
						echo"<td valign='bottom'>";
					}
					echo"<p class='materia'>$r1->nommat</p> <p class='idmat'>$r1->idmat</p>
					<table class='nums' >
						<tr>
							<td ></td>
							<td >$r1->cred</td>
						</tr>
					</table>
					</td>";
				}
				else
				{
						echo"<td></td>";
				}
				
				//5+++++++++++++++++++++++++++
				$ret1="select p.idmat, m.nommat, m.cred, m.credit from posee as p, materias as m where p.idcar='$idcar' and p.idmat=m.idmat and p.sem='5' order by p.idmat limit $a,1;";
				//$tic="select idmat from posee where idcar='$idcar' and sem='1' order by idmat limit $a,1;";
            	$re1=mysql_query($ret1,$conexion);
				$r1=mysql_fetch_object($re1);
                
				if($c<$nt)
				{
					//MATERIAS DE PRIMER SEMESTRE
                    //buscar la materia
					$historia="select h.idmat, c.prom, c.opor, h.periodo from horario as h, cursa as c, materias as m where h.idmat=m.idmat and  h.idh=c.idh and matricula='$matricula' and h.idmat='$r1->idmat' order by c.idh desc LIMIT 0,1;";
					$his=mysql_query($historia,$conexion);
					$hc=mysql_fetch_object($his);
					$nm=mysql_num_rows($his);
					//si encuentra registros significa que ha cursado
					if($nm>0) //sí encontró
					{
						if(($hc->prom<70)&&($hc->periodo!=$periodo))//si la materia encontrada no es del periodo actual y ademas es reprobatorio, colocarlo como reprobado
						{
							echo"<td valign='bottom' class='repro'>";
							if($hc->opor==1)
							{echo"<p class='reprobo'>A Repetición</p>";}
							else
							{
								if($hc->opor==2)
								{echo"<p class='reprobo'>A Especial</p>";}
								else
								{
									if($hc->opor==3)
									{echo"<p class='reprobo'>Baja def</p>";}
									else
									{
										if($hc->opor==4)
										{echo"<p class='reprobo'>Baja def</p>";}
									}
								}
							}
						}
						else
						{
							if(($hc->prom>=70)&&($hc->periodo!=$periodo)) //si la calificacion es mayor o igual a 70 y es de diferente periodo, colocarlo como aprobatorio
							{
								echo"<td valign='bottom' class='aprob'>";
							}
							else //sino, entonces es del periodo actual
							{
								if($hc->opor==1)
								{
									echo"<td valign='bottom' class='cursaord'>";
								}
								else
								{
									if($hc->opor==2)
									{
										echo"<td valign='bottom' class='cursarep'>";
									}
									else
									{
										if($hc->opor==3)
										{
											echo"<td valign='bottom' class='cursaesp'>";
										}
										else
										{
											if($hc->opor==4)
											{
												echo"<td valign='bottom' class='cursaglo'>";
											}
										}
									}
								}
							}
						}
					}
					else
					{
						echo"<td valign='bottom'>";
					}
					echo"<p class='materia'>$r1->nommat</p> <p class='idmat'>$r1->idmat</p>
					<table class='nums' >
						<tr>
							<td ></td>
							<td >$r1->cred</td>
						</tr>
					</table>
					</td>";
				}
				else
				{
						echo"<td></td>";
				}
				
				//6+++++++++++++++++++++++++++
				$ret1="select p.idmat, m.nommat, m.cred, m.credit from posee as p, materias as m where p.idcar='$idcar' and p.idmat=m.idmat and p.sem='6' order by p.idmat limit $a,1;";
				//$tic="select idmat from posee where idcar='$idcar' and sem='1' order by idmat limit $a,1;";
            	$re1=mysql_query($ret1,$conexion);
				$r1=mysql_fetch_object($re1);
                
				if($c<$nt)
				{
					//MATERIAS DE PRIMER SEMESTRE
                    //buscar la materia
					$historia="select h.idmat, c.prom, c.opor, h.periodo from horario as h, cursa as c, materias as m where h.idmat=m.idmat and  h.idh=c.idh and matricula='$matricula' and h.idmat='$r1->idmat' order by c.idh desc LIMIT 0,1;";
					$his=mysql_query($historia,$conexion);
					$hc=mysql_fetch_object($his);
					$nm=mysql_num_rows($his);
					//si encuentra registros significa que ha cursado
					if($nm>0) //sí encontró
					{
						if(($hc->prom<70)&&($hc->periodo!=$periodo))//si la materia encontrada no es del periodo actual y ademas es reprobatorio, colocarlo como reprobado
						{
							echo"<td valign='bottom' class='repro'>";
							if($hc->opor==1)
							{echo"<p class='reprobo'>A Repetición</p>";}
							else
							{
								if($hc->opor==2)
								{echo"<p class='reprobo'>A Especial</p>";}
								else
								{
									if($hc->opor==3)
									{echo"<p class='reprobo'>Baja def</p>";}
									else
									{
										if($hc->opor==4)
										{echo"<p class='reprobo'>Baja def</p>";}
									}
								}
							}
						}
						else
						{
							if(($hc->prom>=70)&&($hc->periodo!=$periodo)) //si la calificacion es mayor o igual a 70 y es de diferente periodo, colocarlo como aprobatorio
							{
								echo"<td valign='bottom' class='aprob'>";
							}
							else //sino, entonces es del periodo actual
							{
								if($hc->opor==1)
								{
									echo"<td valign='bottom' class='cursaord'>";
								}
								else
								{
									if($hc->opor==2)
									{
										echo"<td valign='bottom' class='cursarep'>";
									}
									else
									{
										if($hc->opor==3)
										{
											echo"<td valign='bottom' class='cursaesp'>";
										}
										else
										{
											if($hc->opor==4)
											{
												echo"<td valign='bottom' class='cursaglo'>";
											}
										}
									}
								}
							}
						}
					}
					else
					{
						echo"<td valign='bottom'>";
					}
					echo"<p class='materia'>$r1->nommat</p> <p class='idmat'>$r1->idmat</p>
					<table class='nums' >
						<tr>
							<td ></td>
							<td >$r1->cred</td>
						</tr>
					</table>
					</td>";
				}
				else
				{
						echo"<td></td>";
				}
				
				//7+++++++++++++++++++++++++++
				$ret1="select p.idmat, m.nommat, m.cred, m.credit from posee as p, materias as m where p.idcar='$idcar' and p.idmat=m.idmat and p.sem='7' order by p.idmat limit $a,1;";
				//$tic="select idmat from posee where idcar='$idcar' and sem='1' order by idmat limit $a,1;";
            	$re1=mysql_query($ret1,$conexion);
				$r1=mysql_fetch_object($re1);
                
				if($c<$nt)
				{
					//MATERIAS DE PRIMER SEMESTRE
                    //buscar la materia
					$historia="select h.idmat, c.prom, c.opor, h.periodo from horario as h, cursa as c, materias as m where h.idmat=m.idmat and  h.idh=c.idh and matricula='$matricula' and h.idmat='$r1->idmat' order by c.idh desc LIMIT 0,1;";
					$his=mysql_query($historia,$conexion);
					$hc=mysql_fetch_object($his);
					$nm=mysql_num_rows($his);
					//si encuentra registros significa que ha cursado
					if($nm>0) //sí encontró
					{
						if(($hc->prom<70)&&($hc->periodo!=$periodo))//si la materia encontrada no es del periodo actual y ademas es reprobatorio, colocarlo como reprobado
						{
							echo"<td valign='bottom' class='repro'>";
							if($hc->opor==1)
							{echo"<p class='reprobo'>A Repetición</p>";}
							else
							{
								if($hc->opor==2)
								{echo"<p class='reprobo'>A Especial</p>";}
								else
								{
									if($hc->opor==3)
									{echo"<p class='reprobo'>Baja def</p>";}
									else
									{
										if($hc->opor==4)
										{echo"<p class='reprobo'>Baja def</p>";}
									}
								}
							}
						}
						else
						{
							if(($hc->prom>=70)&&($hc->periodo!=$periodo)) //si la calificacion es mayor o igual a 70 y es de diferente periodo, colocarlo como aprobatorio
							{
								echo"<td valign='bottom' class='aprob'>";
							}
							else //sino, entonces es del periodo actual
							{
								if($hc->opor==1)
								{
									echo"<td valign='bottom' class='cursaord'>";
								}
								else
								{
									if($hc->opor==2)
									{
										echo"<td valign='bottom' class='cursarep'>";
									}
									else
									{
										if($hc->opor==3)
										{
											echo"<td valign='bottom' class='cursaesp'>";
										}
										else
										{
											if($hc->opor==4)
											{
												echo"<td valign='bottom' class='cursaglo'>";
											}
										}
									}
								}
							}
						}
					}
					else
					{
						echo"<td valign='bottom'>";
					}
					echo"<p class='materia'>$r1->nommat</p> <p class='idmat'>$r1->idmat</p>
					<table class='nums' >
						<tr>
							<td ></td>
							<td >$r1->cred</td>
						</tr>
					</table>
					</td>";
				}
				else
				{
						echo"<td></td>";
				}
				
				//8+++++++++++++++++++++++++++
				$ret1="select p.idmat, m.nommat, m.cred, m.credit from posee as p, materias as m where p.idcar='$idcar' and p.idmat=m.idmat and p.sem='8' order by p.idmat limit $a,1;";
				//$tic="select idmat from posee where idcar='$idcar' and sem='1' order by idmat limit $a,1;";
            	$re1=mysql_query($ret1,$conexion);
				$r1=mysql_fetch_object($re1);
                
				if($c<$nt)
				{
					//MATERIAS DE PRIMER SEMESTRE
                    //buscar la materia
					$historia="select h.idmat, c.prom, c.opor, h.periodo from horario as h, cursa as c, materias as m where h.idmat=m.idmat and  h.idh=c.idh and matricula='$matricula' and h.idmat='$r1->idmat' order by c.idh desc LIMIT 0,1;";
					$his=mysql_query($historia,$conexion);
					$hc=mysql_fetch_object($his);
					$nm=mysql_num_rows($his);
					//si encuentra registros significa que ha cursado
					if($nm>0) //sí encontró
					{
						if(($hc->prom<70)&&($hc->periodo!=$periodo))//si la materia encontrada no es del periodo actual y ademas es reprobatorio, colocarlo como reprobado
						{
							echo"<td valign='bottom' class='repro'>";
							if($hc->opor==1)
							{echo"<p class='reprobo'>A Repetición</p>";}
							else
							{
								if($hc->opor==2)
								{echo"<p class='reprobo'>A Especial</p>";}
								else
								{
									if($hc->opor==3)
									{echo"<p class='reprobo'>Baja def</p>";}
									else
									{
										if($hc->opor==4)
										{echo"<p class='reprobo'>Baja def</p>";}
									}
								}
							}
						}
						else
						{
							if(($hc->prom>=70)&&($hc->periodo!=$periodo)) //si la calificacion es mayor o igual a 70 y es de diferente periodo, colocarlo como aprobatorio
							{
								echo"<td valign='bottom' class='aprob'>";
							}
							else //sino, entonces es del periodo actual
							{
								if($hc->opor==1)
								{
									echo"<td valign='bottom' class='cursaord'>";
								}
								else
								{
									if($hc->opor==2)
									{
										echo"<td valign='bottom' class='cursarep'>";
									}
									else
									{
										if($hc->opor==3)
										{
											echo"<td valign='bottom' class='cursaesp'>";
										}
										else
										{
											if($hc->opor==4)
											{
												echo"<td valign='bottom' class='cursaglo'>";
											}
										}
									}
								}
							}
						}
					}
					else
					{
						echo"<td valign='bottom'>";
					}
					echo"<p class='materia'>$r1->nommat</p> <p class='idmat'>$r1->idmat</p>
					<table class='nums' >
						<tr>
							<td ></td>
							<td >$r1->cred</td>
						</tr>
					</table>
					</td>";
				}
				else
				{
						echo"<td></td>";
				}
				
				//9+++++++++++++++++++++++++++
				$ret1="select p.idmat, m.nommat, m.cred, m.credit from posee as p, materias as m where p.idcar='$idcar' and p.idmat=m.idmat and p.sem='9' order by p.idmat limit $a,1;";
				//$tic="select idmat from posee where idcar='$idcar' and sem='1' order by idmat limit $a,1;";
            	$re1=mysql_query($ret1,$conexion);
				$r1=mysql_fetch_object($re1);
                
				if($c<$nt)
				{
					//MATERIAS DE PRIMER SEMESTRE
                    //buscar la materia
					$historia="select h.idmat, c.prom, c.opor, h.periodo from horario as h, cursa as c, materias as m where h.idmat=m.idmat and  h.idh=c.idh and matricula='$matricula' and h.idmat='$r1->idmat' order by c.idh desc LIMIT 0,1;";
					$his=mysql_query($historia,$conexion);
					$hc=mysql_fetch_object($his);
					$nm=mysql_num_rows($his);
					//si encuentra registros significa que ha cursado
					if($nm>0) //sí encontró
					{
						if(($hc->prom<70)&&($hc->periodo!=$periodo))//si la materia encontrada no es del periodo actual y ademas es reprobatorio, colocarlo como reprobado
						{
							echo"<td valign='bottom' class='repro'>";
							if($hc->opor==1)
							{echo"<p class='reprobo'>A Repetición</p>";}
							else
							{
								if($hc->opor==2)
								{echo"<p class='reprobo'>A Especial</p>";}
								else
								{
									if($hc->opor==3)
									{echo"<p class='reprobo'>Baja def</p>";}
									else
									{
										if($hc->opor==4)
										{echo"<p class='reprobo'>Baja def</p>";}
									}
								}
							}
						}
						else
						{
							if(($hc->prom>=70)&&($hc->periodo!=$periodo)) //si la calificacion es mayor o igual a 70 y es de diferente periodo, colocarlo como aprobatorio
							{
								echo"<td valign='bottom' class='aprob'>";
							}
							else //sino, entonces es del periodo actual
							{
								if($hc->opor==1)
								{
									echo"<td valign='bottom' class='cursaord'>";
								}
								else
								{
									if($hc->opor==2)
									{
										echo"<td valign='bottom' class='cursarep'>";
									}
									else
									{
										if($hc->opor==3)
										{
											echo"<td valign='bottom' class='cursaesp'>";
										}
										else
										{
											if($hc->opor==4)
											{
												echo"<td valign='bottom' class='cursaglo'>";
											}
										}
									}
								}
							}
						}
					}
					else
					{
						echo"<td valign='bottom'>";
					}
					echo"<p class='materia'>$r1->nommat</p> <p class='idmat'>$r1->idmat</p>
					<table class='nums' >
						<tr>
							<td ></td>
							<td >$r1->cred</td>
						</tr>
					</table>
					</td>";
				}
				else
				{
						echo"<td></td>";
				}
				
			echo"</tr>";
				
				
				$c++;
            }
			
        ?>  
        <table width="980" border="0">
  <tr>
  	<td class="aprob" align="center">acreditado</td>
    <td class="cursaord" align="center">cursa ordinario</td>
    <td class="cursarep" align="center">cursa repeticion</td>
    <td class="cursaesp" align="center">cursa especial</td>
    <td class="cursaglo" align="center">cursa global</td>
    <td align="center">No cursado</td>
    <td class="repro" align="center">Reprobado (status)</td>
  </tr>
</table>
    </div>
</section>
 
<div style="clear: both; width: 100%;"></div>
     <div id="espacio"></div>
<footer >
		
	</footer>
</div>

</body>
</html>