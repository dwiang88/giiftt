$(function() {
	/*
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
	*/
	$('.canvas_wrapper').delegate('.filter_effect li', 'click', function(){
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
		var prize = el.attr('data-productprize');
		$('#priceDisplay').html(prize);
		return false;
	});
	$('#albumTab a').click(function (e) {
  		e.preventDefault();
  		$(this).tab('show');
  		var el = $(this);
  		var rel = el.attr('rel');

  		$('#facebookTab').find('#breadcrumbFacebook').hide();
  		$('#facebookTab').find('#breadcrumbFacebook').find('.othersLi').remove();

  		if (el.data('working')) return false;
  		el.data('working', true);
  		$('#facebookTab').find('.galleryPhoto').empty();
  		$('.loader_container').fadeIn();
  		$.post('/ajax/getPhotoAlbum', {
  			type : rel,
  		}, function(data){
  			if (data.album){
  				if (rel == "facebookAlbum"){
  					$('#facebookTab').find('.galleryPhoto').html(data.album);
  				}
  			}
  			$('.loader_container').fadeOut();
  			el.data('working', false);
  		}, 'json');
	});
	var blockImage = '';
	$('.canvas_wrapper').delegate('.btn-change-image', 'click', function(){
		var el = $(this);
		blockImage = el.closest('.block');
		$('#albumTab').find('li:first-child a').click();
		//return false;
	});
	$('.canvas_wrapper').delegate('.jwc_change_image', 'click', function(){
		var el = $(this);
		blockImage = el.closest('.block');
		$('#albumTab').find('li:first-child a').click();
		$('#myModal').modal('show');
	});
	$('#facebookTab').find('.galleryPhoto').delegate('li#album_block', 'click', function(e){
		e.preventDefault();
		var el = $(this);
		var albumName = el.find('span').text();
		var albumid = el.attr('data-albumid');
		if (el.data('working')) return false;
  		el.data('working', true);
  		$('#facebookTab').find('.galleryPhoto').empty();
  		$('.loader_container').fadeIn();

  		$('#facebookTab').find('#breadcrumbFacebook').show();
  		$('#facebookTab').find('#breadcrumbFacebook').append('<li class="othersLi">'+albumName+'</li>');

  		$.post('/ajax/getPhotoAlbum', {
  			type : "facebookAlbumPhoto",
  			id : albumid,
  			Preview : 1
  		}, function(data){
  			if (data.album){
  				$('#facebookTab').find('.galleryPhoto').html(data.album);
  				$('#myModal').find('.modal-footer').show();
  			}
  			$('.loader_container').fadeOut();
  			el.data('working', false);
  		}, 'json');
		return false;
	});
	$('#breadcrumbFacebook').delegate('.breadcrumbBack a', 'click', function(){
		var el = $(this);
		$('#facebookTabButton').click();
		$('#myModal').find('.modal-footer').hide();
		return false;
	});
	$('#myModal').find('.modal-footer').delegate('#selectImage', 'click', function(){
		var el = $(this);
		var albumTab = $('#albumTab').find('li.active');
		var rel = albumTab.attr('rel');
		var img = $('#' + rel).find('img.imgready_click');
		var albumId = img.attr('data-albumid');
		var albumHq = img.attr('data-hq-img');
		var albumOri = img.attr('data-ori-img');
		$('#myModal').modal('hide');
		$('#myModal').find('.modal-footer').hide();
		$('.loader_overlay').show();
		if (blockImage){

			$.post('/ajax/saveImageURL', {
				albumId : albumId,
				albumHq : albumHq,
				albumOri : albumOri
			}, function(data){
				blockImage.empty();

				var t = '<img src="'+data.albumHq+'" alt="Image" style="" ' +
				'data-original-src="'+data.albumHq+'" '+
				'data-crop_x=""' +
				'data-crop_y=""' +
				'data-crop_w=""' +
				'data-crop_h=""' +
				'class="canvas_image" '+
				'/>'+
				'<div class="filter_effect xsmall_block">' +
				'	<ul>' +
				'		<li class="active"><img src="/images/filtereffects/original.jpg" class="img-polaroid" > <span>Original</span></li>' +
				'		<li class=""><img src="/images/filtereffects/1997.jpg" class="img-polaroid" > <span>1977</span></li>' +
				'		<li class=""><img src="/images/filtereffects/brannan.jpg" class="img-polaroid" > <span>Brannan</span></li>' +
				'		<li class=""><img src="/images/filtereffects/gotham.jpg" class="img-polaroid" > <span>Gotham</span></li>' +
				'		<li class=""><img src="/images/filtereffects/have.jpg" class="img-polaroid" > <span>Hefe</span></li>' +
				'		<li class=""><img src="/images/filtereffects/inkwell.jpg" class="img-polaroid" > <span>Inkwell</span></li>' +
				'		<li class=""><img src="/images/filtereffects/lordkelvin.jpg" class="img-polaroid"> <span>Lord Kelvin</span></li>' +
				'		<li class=""><img src="/images/filtereffects/nashville.jpg" class="img-polaroid" > <span>Nashville</span></li>' +
				'		<li class=""><img src="/images/filtereffects/xproii.jpg" class="img-polaroid" > <span>X-PRO II</span></li>' +
				'	</ul>' +
				'</div> ' ;

				blockImage.html(t);

				blockImage.find('img.canvas_image').each(function(){
					//$(this).filterMe();
					$(this).jWindowCrop({
						targetWidth: $(this).parent().width(),
						targetHeight: $(this).parent().height(),
						loadingText: 'Loading ...',
						onChange: function(result) {
							console.log(result);
							$(this).attr('data-crop_x', result.cropX);
							$(this).attr('data-crop_y', result.cropY);
							$(this).attr('data-crop_w', result.cropW);
							$(this).attr('data-crop_h', result.cropH);
						}
					});
				});

				$('.loader_overlay').hide();
			}, 'json');

		}
	});
	$('#tabContent').delegate('#imgready', 'click', function(){
		var el = $(this);
		el.parent().siblings().find('img').removeClass('imgready_click');
		el.addClass('imgready_click');
		return false;
	});
	$('#myModal').delegate('#modelClose', 'click', function(){
		blockImage = "";
	});
});