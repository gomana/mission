/*
* --------------------------------
* FUNCTION JS
* --------------------------------
*/
//클릭 이벤트 모션 중복 처리 변수, 팝업 내용
var motionActive = 0;
var popupTxt = [
    ['<div class="imgbox"><img src="/pjtCom/images/sub/popup/win_img01.png" alt=""></div><div class="txt"><b>축하합니다!!</b><span><strong>애플 맥북 프로 13형 256GB</strong>에 당첨되셨습니다.</span></div><div class="btn_area"><a href="#" onclick="goAgree();return false;" class="btn">개인 정보 입력</a></div><div class="attention">정보 입력 없이 현재 페이지를 닫을 경우<br>경품 수령이 불가합니다.<br>지금 바로 정보 입력을 해 주세요.<br>이벤트 종료 후 2019년 10월 중 경품이 발송됩니다.</div>'],
    ['<div class="imgbox"><img src="/pjtCom/images/sub/popup/win_img02.png" alt=""></div><div class="txt"><b>축하합니다!!</b><span><strong>다이슨 드라이기 수퍼소닉 HD 01</strong>에 당첨되셨습니다.</span></div><div class="btn_area"><a href="#" onclick="goAgree();return false;" class="btn">개인 정보 입력</a></div><div class="attention">정보 입력 없이 현재 페이지를 닫을 경우<br>경품 수령이 불가합니다.<br>지금 바로 정보 입력을 해 주세요.<br>이벤트 종료 후 2019년 10월 중 경품이 발송됩니다.</div>'],
    ['<div class="imgbox"><img src="/pjtCom/images/sub/popup/win_img03.png" alt=""></div><div class="txt"><b>축하합니다!!</b><span><strong>LG 퓨리케어 미니 공기 청정기</strong>에 당첨되셨습니다.</span></div><div class="btn_area"><a href="#" onclick="goAgree();return false;" class="btn">개인 정보 입력</a></div><div class="attention">정보 입력 없이 현재 페이지를 닫을 경우<br>경품 수령이 불가합니다.<br>지금 바로 정보 입력을 해 주세요.<br>이벤트 종료 후 2019년 10월 중 경품이 발송됩니다.</div>'],
    ['<div class="imgbox"><img src="/pjtCom/images/sub/popup/win_img04.png" alt=""></div><div class="txt"><b>축하합니다!!</b><span><strong>BOSE 사운드링크 마이크로 블루투스스피커</strong>에 당첨되셨습니다.</span></div><div class="btn_area"><a href="#" onclick="goAgree();return false;" class="btn">개인 정보 입력</a></div><div class="attention">정보 입력 없이 현재 페이지를 닫을 경우<br>경품 수령이 불가합니다.<br>지금 바로 정보 입력을 해 주세요.<br>이벤트 종료 후 2019년 10월 중 경품이 발송됩니다.</div>'],
    ['<div class="imgbox"><img src="/pjtCom/images/sub/popup/win_img05.png" alt=""></div><div class="txt"><b>축하합니다!!</b><span><strong>CU 모바일 상품권 1만원권</strong>에 당첨되셨습니다.</span></div><div class="btn_area"><a href="#" onclick="goAgree();return false;" class="btn">개인 정보 입력</a></div><div class="attention">정보 입력 없이 현재 페이지를 닫을 경우<br>경품 수령이 불가합니다.<br>지금 바로 정보 입력을 해 주세요.<br>이벤트 종료 후 2019년 10월 중 경품이 발송됩니다.</div>'],
    ['<div class="imgbox"><img src="/pjtCom/images/sub/popup/win_img06.png" alt=""></div><div class="txt"><b>축하합니다!!</b><span><strong>배스킨라빈스 싱글레귤러 아이스크림</strong>에 당첨되셨습니다.</span></div><div class="btn_area"><a href="#" onclick="goAgree();return false;" class="btn">개인 정보 입력</a></div><div class="attention">정보 입력 없이 현재 페이지를 닫을 경우<br>경품 수령이 불가합니다.<br>지금 바로 정보 입력을 해 주세요.<br>이벤트 종료 후 2019년 10월 중 경품이 발송됩니다.</div>'],
    ['<div class="imgbox"><img src="/pjtCom/images/sub/popup/win_img07.png" alt=""></div><div class="txt"><b>다음기회에...</b><span>아쉽지만 경품에 당첨되지 않았습니다.<br>다음에 다시 참여해 주세요.</span></div><div class="btn_area"><a href="#" onclick="goAgree();return false;" class="btn">닫기</a></div>']
];

var fn = (function() {
    'use strict';

    return {

        popupOpen : function(obj,id,type){
            if (typeof obj === 'object') {
                obj = obj.attributes.href.value
            }
            var $obj = $(obj);
            if(id != undefined && id  != ""){

            	var video_id = $("#YT_VIDEO_ID_"+id).val();

            	var video_id = $("#YT_VIDEO_ID_"+id).val();
            	var ad_img_save = $("#AD_IMG_SAVE_"+id).val();
            	var ad_copy = $("#AD_COPY_"+id).val();

            	var media_subject = $("#MEDIA_SUBJECT_"+id).val();
            	var media_desc = $("#MEDIA_DESC_"+id).val();

            	var user_name = $("#USER_NAME_"+id).val();
            	var vote_total = $("#VOTE_TOTAL_"+id).val();
            	var share_url = $("#SHARE_URL_"+id).val()+"#citi_event";

            	//console.log("1.url", share_url);
            	$obj.find('.cont').find("#layer_user_name").text(user_name);
            	$obj.find('.cont').find("#layer_vote_total").text(vote_total);
            	//$obj.find('.cont').find("#layer_share_url").data("clipboard-text", share_url );

            	//console.log("2. data", $obj.find('.cont').find("#layer_share_url").data("clipboard-text"));
            	var clip_html = "<a href='#' id='layer_share_url' class='btn_share' data-clipboard-text='"+share_url+"'>공유하기</a>";
            	$obj.find('.cont').find("#layer_share_url").remove();
            	$obj.find('.cont').find(".btn_area #layer_vote_btn").after(clip_html);


                if(type == 'ytb'){

	            	$obj.find('.cont').find("#layer_media_subject").text(media_subject);
	            	$obj.find('.cont').find("#layer_media_desc").text(media_desc);

                    $obj.find('.cont').prepend('<iframe width="100%" src="https://www.youtube-nocookie.com/embed/' + video_id + '?version=3&amp;rel=0&amp;loop=1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>');

                }else if(type == 'img'){

	            	$obj.find('.cont').find("#layer_media_subject").text(media_subject);
	            	$obj.find('.cont').find("#layer_media_desc").text(media_desc);

                    $obj.find('.cont').prepend('<div class="contestImg"><img src="' + ad_img_save + '" alt=""></div>');
                }else if(type == 'copy'){

                	$obj.find('.cont').find("#layer_media_subject").text(ad_copy);
	            	$obj.find('.cont').find("#layer_media_desc").text(media_desc);

                }

                $obj.find('.cont').find("#layer_vote_btn").attr('onclick', '').unbind('click');
                //$obj.find('.cont').find("#layer_vote_btn").off();
                $obj.find('.cont').find("#layer_vote_btn").click(function(){
                	doVote(id);
                });
            }

            /* 화면 고정처리 */
            var winScr = '-' + $(window).scrollTop()+'px';
            document.body.classList.add('fixed');
            $('body').css({'top':winScr});
            $obj.fadeIn(600);
            $obj.find('.popinner').animate({'top':'50%'});
        },

        popupClose : function(callback){
            var $obj = $('.popup');

            /* 화면 고정해제 */
            if(document.body.classList.contains('fixed')){
                document.body.classList.remove('fixed');
                var winScr = parseInt(document.body.style.top);
                $('body').attr({'style':''});
                window.scrollTo(0,-winScr);
            }else{
                var winScr = window.scrollY;
                $('body').attr({'style':''});
                window.scrollTo(0,winScr);
            }

            $obj.find('.popinner').animate({'top':'60%'});
            $obj.fadeOut(400);

            setTimeout(function(){
                $obj.find('iframe').remove();
                $obj.find('.contestImg').remove();
            },400);

            if (callback) {
                setTimeout(function(){
                    callback();
                }, 400);
            }
        },

        //file
        filebox : function(obj){
            var $obj = $(obj);
            var fileTarget = $obj.find('.upload_hidden');
        	fileTarget.on('change', function(){
        		if(window.FileReader){
        			var filename = $(this)[0].files[0].name;
        		} else {
        			var filename = $(this).val().split('/').pop().split('\\').pop();
        		}
        		$(this).siblings('.upload_name').val(filename);
        	});
        },

		//탭메뉴
        tabMenu : function(e, obj){
            var $obj = $(obj),
                objHref = obj.attributes.href.value;

            if (objHref.indexOf('#') != -1) {
                e.preventDefault();

                $obj.closest('.tab_menu').find('a').removeClass('active');
    			$obj.addClass('active');

    			$obj.closest('.tab_menu').siblings('.tab_contents').removeClass('active on').stop().hide();
    			$(objHref).addClass('active').stop().show();
            }
        },

        //toggleClass
		toggleClass : function(obj){
            $(obj).toggleClass("active");
        },

        //addClass
		addClass : function(obj){
            $(obj).addClass("active");
        },

        //removeClass
		removeClass : function(obj){
            $(obj).removeClass("active");
        },

        //loading
        loading : function(){
            fn.toggleClass('#loadingbar');
        },

        present : function(code){
            if(motionActive == 0){
    			motionActive = 1;

    			var half,
    				c,
    				hh;

                fn.popupOpen('#popupPrizes');

    			switch(code){
    				case 'G001':
    					$('.sandbox .cont').html(popupTxt[0]);
    					break;
    				case 'G002':
    					$('.sandbox .cont').html(popupTxt[1]);
    					break;
    				case 'G003':
    					$('.sandbox .cont').html(popupTxt[2]);
    					break;
    				case 'G004':
    					$('.sandbox .cont').html(popupTxt[3]);
    					break;
    				case 'G005':
    					$('.sandbox .cont').html(popupTxt[4]);
    					break;
    				case 'G006':
    					$('.sandbox .cont').html(popupTxt[5]);
    					break;

    				default :
    					$('.sandbox .cont').html(popupTxt[6]);
    					break;
    			}

    			$('.sandbox .cont').imagesLoaded(function(){
    				half = $('.motionobj').offset().top;
    				c = $('.motionobj').height() * 0.178771;
    				hh = $('.popup.popupPrizes .popinner_type2').height();

    				//gif 이미지캐시 초기화
    				$('.flash').attr({'src':$('.flash').attr('src')+'?' + (new Date()).getTime()});
    				$('.cloud').attr({'src':$('.cloud').attr('src')+'?' + (new Date()).getTime()});
    				$('.particle').attr({'src':$('.particle').attr('src')+'?' + (new Date()).getTime()});

                    setTimeout(function(){
                        $('.motionobj').find('.flash').show();
                    },600);

    				$('.popup.popupPrizes .popinner_type2').velocity('stop').delay(1600).velocity({'translateY':'0%','scale':0.284},0).velocity({'top':(half + c) - 0.52* hh + 'px','translateY':'-50%','scale':0.284},{'duration':1200,'easing':'ease-in-out','complete':function(){

    					$('.sandbox').velocity({'height':'100%'},0);
    					$('.motionobj').delay(700).velocity({'translateX':'-50%','translateY':'-50%','scale':1},0).velocity({'translateX':'-50%','translateY':'-50%','scale':0},600);

                        if(code == 'G001' || code == 'G002' || code == 'G003' || code == 'G004' || code == 'G005' || code == 'G006'){
                            setTimeout(function(){
        						$('.popup.popupPrizes .particle').show();
                            },600);

                            setTimeout(function(){
        						$('.popup.popupPrizes .particle').hide();
        					},2900);
                        }else{
                            setTimeout(function(){
                                $('.popup.popupPrizes .cloud').fadeIn();
                                $('.popup.popupPrizes .rain').fadeIn();
                            },1400);
                        }

    					$(this).delay(600).velocity({'top':'50%','translateY':'-50%','scale':1},{'duration':600,'complete':function(){
    						$(this).addClass('active');
    					}});
    				}});

                    half=null,
        			c=null,
        			hh=null;
    			});
    		}
        },

        presentInit : function(){
    		$('.popinner_type2').removeClass('active');
    		$('.motionobj').delay(600).velocity({'translateX':'-50%','translateY':'-50%','scale':1},{'duration':0,'complete':function(){
        		$('.popup.popupPrizes .particle').hide();
        		$('.popup.popupPrizes .cloud').hide();
        		$('.popup.popupPrizes .rain').hide();
                $('.sandbox').attr({'style':''});
                $('.popup.popupPrizes .popinner_type2').velocity('stop').velocity({'top':'50vh','translateY':'0%','scale':0.284},0);
            }});
    		motionActive = 0;
        }
    }
})();
