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
		$matricula=$_GET[matricula];
		$fecha=date('d/m/Y');
		$alumno="select a.app, a.apm, a.nom, a.status, a.idcar, c.descar from alumnos as a, carrera as c where a.idcar=c.idcar and a.matricula='$matricula';";
		$alu=mysql_query($alumno,$conexion);
		$a=mysql_fetch_object($alu);
			?>
			
		<div class="subtitulo"> <a href="javascript:window.print()"> Imprimir</a>  
		<?php 
		if($ses!=1)
		{
			echo"<a href='historial.php?matricula=$matricula' target='_blank' title='Ver historial'> Historial</a>";
		}
		
		$creditos="select h.idh, h.idoc, d.nomdoc, h.idmat, m.nommat, m.credit, o.opor, o.descopor from oportunidad as o, cursa as c, horario as h, docente as d, materias as m where c.idh=h.idh and h.idoc=d.idoc and h.idmat=m.idmat and o.opor=c.opor and h.periodo='$periodo' and c.matricula='$matricula'";
		$credi=mysql_query($creditos,$conexion);
		$sucr=0;
		while($c=mysql_fetch_object($credi))
		{$sucr+=$c->credit;
			}
		?></div>
	</header>
	<section id="seccion">
    
        <header id="header">
            <div id="revision">
               <br>
                <table  border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#000000">
                  <tr>
                    <td width="100px" rowspan="3"><img src="../img/logodgest.png" alt="dgest" width="130" height="60" /></td>
                    <td width="800px" rowspan="2" align="left"><strong>Formato de carga acad&eacute;mica.</strong></td>
                    <td width="180px" >C&oacute;digo: N/A </td>
                  </tr>
                  <tr>
                    <td>Revisi&oacute;n: O </td>
                  </tr>
                  <tr>
                    <td align="left"><strong>Referencia a la Norma ISO 9001-2008: 7.2.1, 7.2.2, 7.2.3, 7.5.3</strong></td>
                    <td>P&aacute;gina 1 de 1 </td>
                  </tr>
                </table><br><br><br><br>
            </div>
            <table width="555" align="center">
              <tr>
                <td align="">FECHA:</td>
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
                <td>CRÉDITOS:</td>
                <td><u><?php echo"$sucr"; ?></u></td>
              </tr>
              <tr>
                <td>PLAN:</td>
                <td><u><?php echo"<a href='reticula.php?matricula=$matricula&idcar=$a->idcar' target='_blank'>$a->idcar</a>"; ?></u></td>
                <td>FECHA: </td>
                <td><u>
                  <?php echo"$fecha";
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
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
            </table><br><br><br><br>
        </header>

        <div id="registros" >
        <?php
		if($sucr>=32)
		{
			echo"<div class='avisono'>No puede cargar más materias, Máximo 32 créditos, o la autorización del coordinador</div>";
		}
		?>
        <table width="980">
             <tr>
             <th width="65">GPO</th>
    	<th width="130">CLAVE</th>
    	<th width="300">Materia</th>
		
		<th width="75">OPORT</th>
		<th width="25">CR</th>        
    	<th width="95">LUNES</th>	
    	<th width="95">MARTES</th>		
    	<th width="95">MIERCOLES</th>	
    	<th width="95">JUEVES</th>		
    	<th width="95">VIERNES</th>		
        <th width="10">x</th>
  	</tr>
            <?php
            $horario="select h.idh, h.idoc, d.nomdoc, h.idmat, m.nommat, m.credit, o.opor, o.descopor from oportunidad as o, cursa as c, horario as h, docente as d, materias as m where c.idh=h.idh and h.idoc=d.idoc and h.idmat=m.idmat and o.opor=c.opor and h.periodo='$periodo' and c.matricula='$matricula'";
				$hora=mysql_query($horario,$conexion);
				$q=0;
				$totcre=0;
				while($h=mysql_fetch_object($hora))
				{//select h.idh, h.idmat, h.idoc, m.nommat, d.nomdoc from horario as h, materias as m, docente as d where h.idoc=d.idoc and h.idmat=m.idmat and h.periodo='$periodo' order by h.idh;
					$grupo="select g.idg, h.idh, h.idmat from hgrupo as g, horario as h,  encarre as e where e.idg=g.idg and g.idh=h.idh and h.idh='$h->idh' and e.idcar='$a->idcar';";
					$gru=mysql_query($grupo,$conexion);
					$gr=mysql_fetch_object($gru);
					echo"
					<tr>
						<td>$gr->idg</td>
						<td>$h->idh / $h->idmat</td>
						<td>$h->nommat <br> ** $h->nomdoc";
            $ligasmat="select l.idmat1 from liga as l where l.idmat2='$h->idmat' and l.idcar='$a->idcar';";
           
            $ligas=mysql_query($ligasmat,$conexion);
            $lig=mysql_num_rows($ligas);
            
            if($lig>0)
            {
              echo"<p class='ligado'> "; 
              while($li=mysql_fetch_object($ligas))
              {
                $matacred="select c.prom from cursa as c, horario as h where c.prom>=70 and c.matricula='$matricula';";
                $matacr=mysql_query($matacred,$conexion);
                $nmata=mysql_num_rows($matacr);

                $nombremat="select nommat from materias where idmat='$li->idmat1';";
                $nombrem=mysql_query($nombremat,$conexion);
                $nmat=mysql_fetch_object($nombrem);
                if($nmata<1)
                echo"$nmat->nommat "; 

                echo "<br>";
              }
              echo" </p>";
            }
            echo"</td>
						
						<td><a href='cambiaopor.php?matricula=$matricula&idh=$h->idh&opor=$h->opor' >$h->descopor</a></td>
						<td align='center'>$h->credit</td>
						<td align='center'>";
						$totcre+=$h->credit;
						$lunes="select * from imparte as i, reloj as r, aula as a where a.ida=i.ida and r.idr=i.idr and i.idh='$h->idh' and i.idia='1';";
						
						$lu=mysql_query($lunes,$conexion);
						$rlu=mysql_num_rows($lu);
						if($rlu>0)
						{
							while($l=mysql_fetch_object($lu))
							{echo"$l->hora / $l->aula <br>";}
						}
						echo"</td>
						<td align='center'>";
						$martes="select * from imparte as i, reloj as r, aula as a where a.ida=i.ida and r.idr=i.idr and i.idh='$h->idh' and i.idia='2';";
						$ma=mysql_query($martes,$conexion);
						while($m=mysql_fetch_object($ma))
						{echo"$m->hora / $m->aula <br>";}
						echo"</td>
						<td align='center'>
						";
						$miercoles="select * from imparte as i, reloj as r, aula as a where a.ida=i.ida and r.idr=i.idr and i.idh='$h->idh' and i.idia='3';";
						$mie=mysql_query($miercoles,$conexion);
						while($mi=mysql_fetch_object($mie))
						{echo"$mi->hora / $mi->aula<br>";}
						echo"</td>
						<td align='center'>
						";
						$jueves="select * from imparte as i, reloj as r, aula as a where a.ida=i.ida and r.idr=i.idr and i.idh='$h->idh' and i.idia='4';";
						$ju=mysql_query($jueves,$conexion);
						while($j=mysql_fetch_object($ju))
						{echo"$j->hora / $j->aula<br>";}
						echo"</td>
						<td align='center'>
						";
						$viernes="select * from imparte as i, reloj as r, aula as a where a.ida=i.ida and r.idr=i.idr and i.idh='$h->idh' and i.idia='5';";
						$vi=mysql_query($viernes,$conexion);
						while($v=mysql_fetch_object($vi))
						{echo"$v->hora / $v->aula<br>";}
						echo"</td>
						
						
						<td>";
						if(($ses==2)||($ses==4)||($ses==5))
						{echo"
						<a href='quitamat.php?matricula=$matricula&idh=$h->idh' target='_self'>X</a>";
						}
					echo"</td></tr>
					";
				}
				echo"
				<tr>
					<td></td>
					<td></td>
					<td align='right'>Total de créditos</td>
					<td></td>
					<td>$totcre</td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				";
            ?>
        </table>
      </div>
      <?php 
	  if(($ses==2)||($ses==4)||($ses==5))echo"<div class='liga'><a href='horario.php?matricula=$matricula' target='_self'>Agregar Materia</a></div> <br><br><br>
	  <div class='liga'> <a href='vaciar.php?matricula=$matricula' target='_self' title='Vaciar horario'>Vaciar horario</a></div>
      <div class='liga'>  <a href='cargag.php?matricula=$matricula' target='_self' title='Cargar materias de grupo determinado'>Cargar grupo</a></div>
	  "; 
	  if(($ses==2)||($ses==4)||($ses==5))
	  {
	  echo"
      <p>&nbsp;</p>
        <table>
        	<tr>
           	  <td colspan='4' align='center'><img src='../img/anawalle.png' width='204' height='100'></td>
              <td width='98'>&nbsp;</td>
              <td width='98'>&nbsp;</td>
              <td colspan='4' align='center'>__________________________<br>
              Estudiante</td>
          </tr>
            <tr>
           	  <td width='98'>&nbsp;</td>
              <td width='98'>&nbsp;</td>
              <td width='98'>&nbsp;</td>
              <td width='98'>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td width='98'>&nbsp;</td>
              <td width='98'>&nbsp;</td>
              <td width='98'>&nbsp;</td>
              <td width='98'>&nbsp;</td>
            </tr>
      </table>";
	  
	  
	  echo"
	  
       ";
	  }
	  ?>
  </section>
 
	<div style="clear: both; width: 100%;"></div>
     <div id="espacio"></div>
	<footer >
		<table>
        	<tr>
           	  <td width="98"><?php echo"$matricula";?></td>
              <td width="98">&nbsp;</td>
              <td width="98">&nbsp;</td>
              <td width="98">&nbsp;</td>
              <td width="98">&nbsp;</td>
              <td width="98">&nbsp;</td>
              <td width="98">&nbsp;</td>
              <td width="98">&nbsp;</td>
              <td width="98">&nbsp;</td>
              <td width="98" align="right">Rev. O</td>
                           
          </tr>
            
      </table>
	</footer>
</div>
</body>
</html>