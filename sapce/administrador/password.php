<?php  session_start();  ?>
<!DOCTYPE html >
<html>
<head>
<meta charset="utf-8" />
<title>SAPCE ::: ITIZTAPALAPAII.EDU.MX</title>
<link href="../css/proweb.css" rel="stylesheet" type="text/css">

</head>

<body>
<div id="cuerpo">
    <header>
		<?php 	include "../usuarios.php";	
		$id=$_POST[id];
		$pass=strtoupper($_POST[pass]);
		$nomdoc=$_POST[nom];
		
	//echo"sesion: $quien <br>usuario: $usuario";
		?>
	</header>
    <section id="seccion">
    
    <header id="header">
			<div class="subtitulo">Modificación de password</div>
        <br>
    </header>

<div id="registros" >
    <?php
    	if(empty($pass))
    	{
    	  if($ses==2) //administrador
            $nombre=$a->nomadm;
            
        if($ses==3) //academico
            $nombre=$a->nomacad;
        
        if($ses==4) //coordinador
            $nombre=$a->nomacor;

        if($ses==5) //division
            $nombre=$a->nomd;

        if($ses==6) //docente
            $nombre=$a->nomdoc;
	     ?>
        <form action='password.php' method='post' name='form1'>
          <table>
            <tr>
              <th colspan="10">Complete los siguientes campos<br></th>
            </tr>
            
            <tr>
            	<td width="96">&nbsp;</td>
              <td width="98">&nbsp;</td>
              <td width="102">&nbsp;</td>
              <td width="108">&nbsp;</td>
              <td width="93">&nbsp;</td>
              <td width="84">&nbsp;</td>
              <td width="78">&nbsp;</td>
              <td width="102">&nbsp;</td>
              <td width="85">&nbsp;</td>
              <td width="90" align="right">&nbsp;</td>
            </tr>
            <tr>
              <td align="center">&nbsp;</td>
              <td colspan="2" align="center"><input name="id"  type="text" id="id" value="<?php echo"$usuario"; ?>" readonly></td>
              <td colspan="3" align="center"><input name="nom" type="text" id="des" value="<?php echo"$usuario"; ?>" readonly></td>
              <td align="right">&nbsp;</td>
              <td colspan="2" align="center"><input name="pass" onKeyUp="this.value=this.value.toUpperCase()" type="password" id="des2" size="10" maxlength="10" required></td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td align="center">&nbsp;</td>
              <td colspan="2" align="center">Identificador</td>
              <td colspan="3" align="center">Nombre del usuario</td>
              <td>&nbsp;</td>
              <td colspan="2" align="center">Password</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td colspan="3" align="center">&nbsp;</td>
              <td colspan="3" align="center">&nbsp;</td>
              <td>&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td colspan="3" align="center"><input name='Aceptar'  type='submit' id='Aceptar' value='Agregar'></td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
          </table>
        </form>
      </div>
      <?php
	}
	else
	{
		
        if($ses==2) //administrador
            $actualiza="update administrador set passadm=sha1('$pass') where adm='$usuario';";
            
        if($ses==3) //academico
             $actualiza="update academico set passacad=sha1('$pass') where idacad='$usuario';";
        
        if($ses==4) //coordinador
            $actualiza="update coordinador set passcor=sha1('$pass') where idcor='$usuario';";

        if($ses==5) //division
             $actualiza="update division set passd=sha1('$pass') where idiv='$usuario';";

        if($ses==6) //docente
             $actualiza="update division set passdoc=sha1('$pass') where idoc='$usuario';";
    
		

    $act=mysql_query($actualiza,$conexion);
		if($act)
		{
			print"
			<script languaje='JavaScript'>
				window.alert('¡Actualizacion Exitosa!');				
				window.location.href='$ip/panel.php';
			</script>";
		}
		else
		{
		echo"error";
		}
	
	}
	  ?>
    </section>
    
    <p>&nbsp;</p>
    <p>&nbsp;</p>
</div>
</body>
</html>
