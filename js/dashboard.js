$(function() {
	$('.canvas').find('img.canvas_image').each(function(){
		//$(this).filterMe();
		$(this).jWindowCrop({
			targetWidth: $(this).parent().width(),
			targetHeight: $(this).parent().height(),
			loadingText: 'Loading ...',
			onChange: function(result) {
				console.log(result);
			}
		});
	});
	$('.canvas').find('.filter_effect').find('li').on('click', function(){
		var el = $(this);
		var c = el.closest('.block');
		var img = c.find('img:first');
		var p = img.parent();
		var t = el.find('span').text();
		var src = img.attr('src');
		el.siblings().removeClass('active');
		el.addClass('active');
		img.attr('data-filter', t);
		img.filterMe();
		return false;
	});
	$('#selectTemplate').find('li').on('click', function(){
		var el = $(this);
		el.siblings().removeClass('tmpl_active');
		el.addClass('tmpl_active');
		var tmpl = el.attr('data-template');
		var tmpl_temp = $('#canvas_temp_' + tmpl).html();
		$('.canvas_wrapper').empty();
		$('.canvas_wrapper').html(tmpl_temp);
		return false;
	});
	$('#selectTemplate').find('li:first-child').click();
	$('#selectSize').find('li').on('click', function(){
		var el = $(this);
		el.siblings().removeClass('tmpl_active');
		el.addClass('tmpl_active');
		return false;
	});
});