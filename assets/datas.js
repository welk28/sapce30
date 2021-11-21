
$(document).ready(function () {
  // $(".content").find('.btn-print').on('click', function () {

	// 	//$(".guarda").css("display", "none");
	// 	$.print(".card-body");
  //   //alert("imprimiendo");
	// });
 
  //asignacion de total de creditos del archio horarioalumno.php en encabezado de horario
  $("#ccred").text($("#totalc").text());


  $('.btn-print').click(function () {
    $('.card-body').printThis();
  });
});