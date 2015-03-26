$('.servicio').hover(function()
{
	$(this).children().stop().animate({
		opacity: '0'
	},500)
},function()
{
	$(this).children().stop().animate({
		opacity: '1'
	},500)
});