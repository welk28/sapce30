<?php  session_start();  ?>
<!DOCTYPE html >
<html>
<head>
<meta charset="UTF-8">
<title>SAPCE ::: ITIZTAPALAPAII.EDU.MX</title>
<link rel="stylesheet" type="text/css" href="/css/imprimir.css" media="print" />
</head>

<body>
<div id="cuerpo">
	<header id="cabecera">
		<?php 	include "../usuarios.php";	
		//$periodo=$_SESSION['periodo'];
		//echo"sesion: $quien <br>usuario: $usuario";
		$idoc=$_GET[idoc];
		$nomdoc=$_GET[nomdoc];
		$fecha=date('d/m/Y');
		
			?>
			
		<div class="subtitulo"> <a href="javascript:window.print()"> Imprimir</a>  </div>
	</header>
	<section id="seccion">
    
        <header id="header">
            <div id="revision">
               
            </div>
            <table width="555" align="center">
              <tr>
                <th>FECHA:</th>
                <td><u><?php echo"$fecha"; ?></u></td>
                <td width="21%">&nbsp;</td>
                <td width="24%">&nbsp;</td>
              </tr>
              <tr>
                <th width="24%">Docente:</th>
                <td width="31%"><u><?php echo"$nomdoc"; ?></u></td>
                <th>PERIODO:</th>
                <td><u><?php echo"$perevadoc"; ?></u></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
            </table><br><br>
        </header>

        <div id="registros" >
        <table width="980">
            <tr>
                <th width="140">CLAVE</th>
                <th width="320">Materia</th>
            
                <th width="25">CR</th>        
                <th width="95">LUNES</th>	
                <th width="95">MARTES</th>		
                <th width="95">MIERCOLES</th>	
                <th width="95">JUEVES</th>		
                <th width="95">VIERNES</th>		
             
                <th width="10">Lista</th>
        	</tr>
            <?php
            $horario="select h.idoc, h.idh, h.idmat, m.nommat, m.credit from horario as h, materias as m where h.idmat=m.idmat and h.idoc='$idoc' and h.periodo='$perevadoc';";
				$hora=mysql_query($horario,$conexion);
				$q=0;
				while($h=mysql_fetch_object($hora))
				{					
					echo"
					<tr>
	
						<td>$h->idh / $h->idmat</td>
						<td>$h->nommat </td>
						<td align='center'>$h->credit</td>
						<td align='center'>";
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
						<td><a href='desglose.php?idh=$h->idh&idoc=$h->idoc' target='_blank'>Ver</a></td>
					</tr>
					";
				}
            ?>
        </table>
      </div>
      
        <p>&nbsp;</p>
        <table>
        	<tr>
           	  <td width="98">&nbsp;</td>
              <td width="98">&nbsp;</td>
              <td width="98">&nbsp;</td>
              <td width="98">&nbsp;</td>
              <td width="98">&nbsp;</td>
              <td width="98">&nbsp;</td>
              <td width="98">&nbsp;</td>
              <td width="98">&nbsp;</td>
              <td width="98">&nbsp;</td>
              <td width="98">&nbsp;</td>
          </tr>
            <tr>
           	  <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
      </table>
      
  </section>
	<div style="clear: both; width: 100%;"></div>
	<footer >
		<?php	include "../pie.php";	?>
	</footer>
</div>
</body>
</html>