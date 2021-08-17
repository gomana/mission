/*
* --------------------------------
* citi JS
* --------------------------------
*/
"use strict";

$(document).ready(function(){
	//common
	$('a[href^="#"]').click(function(e){
		e.preventDefault();
	});

	//클립보드 적용
	var clipboard = new ClipboardJS('.btn_share');
	clipboard.on('success', function(e) {
		var txt = '<div id="cliptxt">클립보드에 복사되었습니다.</div>';
		$('#cliptxt').remove();
		$('body').append(txt);
		$('#cliptxt').delay(1600).fadeOut(600);
	    e.clearSelection();
	});

	//path
	var path1 = $("body").attr("class");
	var path2 = $("#wrap").attr("class");
	var path3 = $("#contents").attr("class");

	//main
	switch (path2) {
		//home
		case "main" :
			$('.fold').click(function(e){
				e.preventDefault();
				$(this).toggleClass('active');
				if($(this).hasClass('active')){
					$(this).siblings('.fold_cont').slideDown(400);
				}else{
					$(this).siblings('.fold_cont').slideUp(400);
				}
			});
			$('.section:not(.sec3) .fold').siblings('.fold_cont').slideUp(0);
			$('.section.sec3 .fold').addClass('active');

			//배너스크롤
			var ticking = false;
			var winScr = $(window).scrollTop();
			var bannerpoint = $('#bannerpoint').offset().top;
			var bannnerObj = $('.banner');

			window.addEventListener('resize', function(e) {
				winScr = $(window).scrollTop();
				bannerpoint = $('#bannerpoint').offset().top;
				bannnerObj = $('.banner');
	        });

			window.addEventListener('scroll', function(e) {
				if (!ticking) {
					window.requestAnimationFrame(function() {
						doSomething();
						ticking = false;
					});

					ticking = true;
				}
	        });
			function doSomething() {
	            // scroll 위치에 대한 작업을 하세요
	            winScr = $(window).scrollTop();
				bannerpoint = $('#eventApply').offset().top;

				if(winScr >= bannerpoint - 300){
					bannnerObj.addClass('active');
				}else{
					bannnerObj.removeClass('active');
				}
	        }
			$('.banner .btn_close').click(function(e){
				e.preventDefault();
				$('.banner').hide();
			});

			$('.banner .quick').click(function(e){
				e.preventDefault();
				if($('.banner').hasClass('active')){
					window.scrollTo(0, 0);
				}else{
					window.scrollTo(0, bannerpoint);
				}
			});

			function preloading (imageArray) {
				let n = imageArray.length;
				for (let i = 0; i < n; i++){
					let img = new Image(); img.src = imageArray[i];
				}
			}
			preloading(['/pjtCom/images/sub/popup/win_img01.png',
			'/pjtCom/web/images/sub/popup/win_img02.png',
			'/pjtCom/web/images/sub/popup/win_img03.png',
			'/pjtCom/web/images/sub/popup/win_img04.png',
			'/pjtCom/web/images/sub/popup/win_img05.png',
			'/pjtCom/web/images/sub/popup/win_img06.png',
			'/pjtCom/web/images/sub/popup/win_img07.png']);
		break;

		case "apply" :
			if(path3 == "write"){
				function changeApply(obj){
					$('.applytype').removeClass('active');
					$(obj.attr('data-sort')).addClass('active');

					$('.hidecopy').show();
					$('.hide_chk').hide();
					if(obj.attr('data-sort') == "#applyCopy"){
						$('.hidecopy').hide();
					}
					if(obj.attr('data-sort') == "#applyVdo"){
						$('.hide_chk').show();
					}
				}
				fn.filebox('.filebox');

				$('.rdo_area input[type="radio"]').change(function(){
					changeApply($(this));
				});

				$('.rdo_area input[type="radio"]:checked').trigger('change');
			}
		break;


		default :

		break;

	}
});
