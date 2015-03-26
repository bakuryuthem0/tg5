$('.letra').hover(function()
				{
					var id = $(this).attr('id').toLowerCase();
					var esto = $('#'+id);
					esto.animate({
						opacity: '1'
					},500)
				},
				function()
				{
					var id = $(this).attr('id').toLowerCase();
					var esto = $('#'+id);
					esto.animate({
						opacity: '0'
					},500)
				})