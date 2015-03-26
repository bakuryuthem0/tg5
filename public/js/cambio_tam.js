$(document).ready(inicia);
function inicia ()
{
	$("html").niceScroll();
	$(window).resize(function(){
		if (document.body) 
		{
			var width = document.body.clientWidth;	
			var height = document.body.clientHeight;
		}else
		{
			var width = window.width;
			var height = window.height;
		}
		$('.contenedorGrande').css('min-height',height-100);

	});
	if (document.body) 
	{
		var width = document.body.clientWidth;	
		var height = document.body.clientHeight;
	}else
	{
		var width = window.width;
		var height = window.height;
	}
	alert(height+' '+height-100)
	$('.contenedorGrande').css('min-height',height-100);
}