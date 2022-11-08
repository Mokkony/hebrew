
$(document).ready(function() {

	$('.hide').click(function(){
        $('.dropdown').toggleClass('open-menu');
				$('.hide').toggleClass('hide2');
	});
  document.getElementById('links').onclick = function () {
      $('.dropdown').toggleClass('open-menu');
			$('.hide').toggleClass('hide2');
  }
  document.getElementById('links1').onclick = function () {
      $('.dropdown').toggleClass('open-menu');
			$('.hide').toggleClass('hide2');
  }
});
