<?php  session_start();  

    ?>
<!DOCTYPE html >
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SAPCE ::: ITIZTAPALAPAII.EDU.MX</title>
<link href="../css/proweb.css" rel="stylesheet" type="text/css">
<meta charset="UTF-8"/>
</head>
<body>

<div id="cuerpo">
	<header id="cabecera">
		<?php 	include "../usuarios.php";	
		$periodo=$_SESSION['periodo'];
		$matricula=$_GET[matricula];
		$fecha=date('d/m/Y');
    $director="select * from control where id=13";
    $dir=mysql_query($director,$conexion);
    $d=mysql_fetch_object($dir);
		$alumnosd="select a.app, a.apm, a.nom, a.status, a.idcar, a.sexo, a.curp, c.descar from alumnos as a, carrera as c where a.idcar=c.idcar and a.matricula='$matricula';";

		$alud=mysql_query($alumnosd,$conexion);
		$ad=mysql_fetch_object($alud);

    $director="select e.iddepto, e.idoc, d.nomdoc from encarga as e, docente as d where d.idoc=e.idoc and e.iddepto='DIR';";
    $dir=mysql_query($director,$conexion);
    $di=mysql_fetch_object($dir);

    $escolares="select e.iddepto, e.idoc, d.nomdoc from encarga as e, docente as d where d.idoc=e.idoc and e.iddepto='SE';";
    $escol=mysql_query($escolares,$conexion);
    $se=mysql_fetch_object($escol);

    $formato="select * from certificado where matricula='$matricula';";
    $fo=mysql_query($formato,$conexion);
    $ft=mysql_fetch_object($fo);

    /*if($fo)
    {
      print"
        <script>
            window.alert('$matricula se ejecutó $fo->foja' );
        </script>
      ";
    }*/
		?>
    
      
        </div>
	</header>
	<section id="seccion">
    
    <div id="certificado" >
      <table>
        <tr>
          <td width="300" >
            <table>
              <tr>
                <td width="50"></td>
                <td height="900"></td>
              </tr>
              <tr>
                <td></td>
                <td align="center">
                <?php echo"No. DE CONTROL <br> <p class='matricula'><b>$matricula</b></p>"; ?>
                  
                  <br><br><p class="registrado">REGISTRADO EN EL <br> DEPARTAMENTO DE <br> SERVICIOS ESCOLARES</p>
                  <br><br><p align="left" class="datos"> <?php echo"
                    CON NO. $ft->numero<br>
                    EN EL LIBRO $ft->libro<br>
                    A FOJAS $ft->foja<br>
                    FECHA $ft->fecha<br>"; ?>
                  </p>
                  
                </td>
              </tr>
              <tr>
                <td></td>
                <td><br><br>
                  <p class="escolar" align="center">
                    <?php echo"$se->nomdoc <br><b>JEFE DE DEPARTAMENTO DE <br>SERVICIOS ESCOLARES</b>"; ?>
                  </p>
                </td>
              </tr>
              <tr><td height="200"></td></tr>
            </table>
          </td>
          <td width="680">  
            <table>
              <tr>
                 
                <td colspan="3" style="text-align: justify;">
                  EL C. <u><b><?php echo"$di->nomdoc"; ?></b></u>, DIRECTOR DEL INSTITUTO TECNOLÓGICO DE IZTAPALAPA II CLAVE <b>09DIT0005O</b>, CERTIFICA, QUE SEGÚN CIRCUNSTANCIAS QUE EXISTEN EN EL ARCHIVO ESCOLAR, 
                  <?php if($ad->sexo=='M') echo" LA "; else echo" EL "; ?> C. <u><b><?php echo"$ad->app $ad->apm $ad->nom"; ?></b></u>, CON CURP <u><b><?php echo"$ad->curp"; ?></b></u>, CURSÓ LAS ASIGNATURAS QUE INTEGRAN EL PLAN DE ESTUDIOS DE <u><b><?php echo"$ad->descar"; ?></b></u> (PLAN-CRÉDITOS) DE <u><b><?php echo"$ft->periodo"; ?></b></u> <br><br>
                </td>

              </tr>
              <tr>
                <!-- EL TOTAL DEBE DSER DE 680px-->
                <th width="480"></th>
                <th width="70"></th>
                <th width="130"></th>   <!-- incrementar para alinear o ajustar -->
              </tr>
              <?php
              $sumcred=0;
              $sumpro=0;
      //$matecar="select * from posee where idcar='$ad->idcar' order by sem;";
              $matecar="select m.idmat, m.nommat from posee as p, materias as m where p.idmat=m.idmat and idcar='$ad->idcar' and (m.idmat<>'SS')order by m.nommat;";
              $maca=mysql_query($matecar,$conexion);$x=0;
              while($mc=mysql_fetch_object($maca))
              {
                $historia="select * from horario as h, cursa as c, materias as m where h.idmat=m.idmat and  h.idh=c.idh and matricula='$matricula' and h.idmat='$mc->idmat' and (h.idmat<>'SS') and (h.idmat<>'RESIDENCIA') and (h.idmat<>'ACTCOMPLE') ";
                $his=mysql_query($historia,$conexion);
                $nm=mysql_num_rows($his);
                if($nm>1)
                {
                  $aprobados="select * from horario as h, cursa as c, materias as m where h.idmat=m.idmat and  h.idh=c.idh and matricula='$matricula' and h.idmat='$mc->idmat' and c.prom>='70';";
                  $his=mysql_query($aprobados,$conexion);
                }
                while($h=mysql_fetch_object($his))
                {         
                  $x++;
                  echo"
                  <tr>
                  <td>$h->nommat</td>
                  <td align='right'>";
                  if($h->prom>=70)
                  {
                    printf("%0.0f",$h->prom);
                    $sumcred+=$h->credit;
                    $sumpro+=$h->prom;
                  }
                  echo"</td>
                  <td align='right'>"; 
                    if($h->credit<10)
                        echo"0";
                  echo"$h->credit </td>
                  </tr>"; 
                }
              }
              $servsoc="select * from horario as h, cursa as c, materias as m where h.idmat=m.idmat and  h.idh=c.idh and matricula='$matricula' and h.idmat='SS';";
              $sers=mysql_query($servsoc,$conexion);
              $so=mysql_fetch_object($sers);
              $son=mysql_num_rows($sers);
              if($son<1)
              {
                print"<script>
                window.alert('No tiene AGREGADO de Servicio social, agregarlo');
                </script>";
              }
              else
              {
                if($so->prom<70)
                {
                 print"<script>
                 window.alert('verifique calificacion de Servicio social, NO TIENE');
                 </script>";
               }
             }
             $reside="select * from horario as h, cursa as c, materias as m where h.idmat=m.idmat and  h.idh=c.idh and matricula='$matricula' and h.idmat='RESIDENCIA';";
             $res=mysql_query($reside,$conexion);
             $resno=mysql_num_rows($res);
             $re=mysql_fetch_object($res);
             if($resno<1)
             {
              print"<script>
              window.alert('No tiene AGREGADO RESIDENCIA, agregarlo');
              </script>";
            }
            else
            {
              if($re->prom<70)
              {
                print"<script>
                window.alert('verifique calificacion de RESIDENCIA, NO TIENE');
                </script>";
              }
            }
            echo"<tr>
            <td>$so->nommat</td>
            <td align='right'>";

            if($so->prom<70) 
            {
              echo"<a href='agregar_a_grupo_modifica1.php?matricula=$matricula&idh=$re->idh&idcar=$ad->idcar' target='_blank'>NA </a>";
            }
            else
            {
              echo"$so->prom";
            }

            echo"</td>
            <td align='right'>$so->credit</td>
            </tr>
            <tr>
            
            <td>$re->nommat</td>
            <td align='right'>"; 
            if($re->prom<70) 
            {
              echo"<a href='agregar_a_grupo_modifica1.php?matricula=$matricula&idh=$re->idh&idcar=$ad->idcar' target='_blank'>NA </a>";
            }
            else
            {
              echo"$re->prom";
            }
            echo"</td>
            <td align='right'>$re->credit</td>
            </tr>
            <tr>
            
            <td>ACTIVIDADES COMPLEMENTARIAS</td>
            <td align='right'>AC</td>
            <td align='right'>05</td>
            </tr>";
            $prom=0;
            $sumpro=$sumpro+$so->prom+$re->prom;
            $prom=$sumpro/($x+2);
            $sumcred=$sumcred+$so->credit+$re->credit+5;
            echo"
            <tr>
            
            <td align='right'></td>
            
            <td align='right'><br><br>";printf("%0.2f",$prom); echo"</td>
            <TD></TD>
            <!--<td align='right'>$sumcred</td>-->
            </tr>
            
            
            <td colspan='3' style='text-align: justify;'><br><br>
            SE EXTIENDE EL PRESENTE CERTIFICADO QUE AMPARA <U>$sumcred</U> CRÉDITOS DE UN TOTAL DE <u>260</u> QUE INTEGRAN EL PLAN DE ESTUDIOS CLAVE <u>$ad->idcar </u> EN LA CIUDAD DE MÉXICO, $ft->fechaexp.
            </td>
            </tr>
            
           
            <td colspan='3' align='center'><br><br>$di->nomdoc <br> DIRECTOR</td>
            </tr>
            </table>";


            echo"
            <p>&nbsp;</p><p>&nbsp;</p>
            <table>

            </table>";
            ?>    </td>
      </tr>
      </table>
	</section>
	
  
	<footer >
		
	</footer>
</div>
</body>
</html>