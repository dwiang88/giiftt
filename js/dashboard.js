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
	$('#albumTab a').click(function (e) {
  		e.preventDefault();
  		$(this).tab('show');
  		var el = $(this);
  		var rel = el.attr('rel');
  		if (el.data('working')) return false;
  		el.data('working', true);
  		$('#facebookTab').find('.galleryPhoto').empty();
  		$('.loader_container').fadeIn();
  		$.post('/ajax/getPhotoAlbum', {
  			type : rel
  		}, function(data){
  			if (data.album){
  				$('#facebookTab').find('.galleryPhoto').html(data.album);
  			}
  			$('.loader_container').fadeOut();
  			el.data('working', false);
  		}, 'json');
	});
	$('.canvas_wrapper').delegate('.btn-change-image', 'click', function(){
		$('#albumTab').find('li:first-child a').click();
		//return false;
	});
	$('#facebookTab').find('.galleryPhoto').delegate('li#album_block', 'click', function(e){
		e.preventDefault();
		var el = $(this);
		var albumid = el.attr('data-albumid');
		if (el.data('working')) return false;
  		el.data('working', true);
  		$('#facebookTab').find('.galleryPhoto').empty();
  		$('.loader_container').fadeIn();
  		$.post('/ajax/getPhotoAlbum', {
  			type : "facebookAlbumPhoto",
  			id : albumid
  		}, function(data){
  			if (data.album){
  				$('#facebookTab').find('.galleryPhoto').html(data.album);
  			}
  			$('.loader_container').fadeOut();
  			el.data('working', false);
  		}, 'json');
		return false;
	});
});