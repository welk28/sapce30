
$(document).ready(function () {
  // $(".content").find('.btn-print').on('click', function () {

	// 	//$(".guarda").css("display", "none");
	// 	$.print(".card-body");
  //   //alert("imprimiendo");
	// });
  $('.btn-print').click(function () {
    $('.card-body').printThis();
  });
});