<?php  session_start();  ?>
<!DOCTYPE html >
<html>
<head>

<title>CAMPUS IZTAPALAPA II </title>

</head>

<body>
<?php
	unset($_SESSION['usuario']);
	unset($_SESSION['ses']);
	unset($_SESSION['evento']);
	session_destroy();
			print"	<script languaje='JavaScript'>
			window.location.href='https://iztapalapa2.tecnm.mx/sapce/index.php';
			</script>";
?>

</body>
</html>
