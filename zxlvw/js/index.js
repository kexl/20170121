function autoslider() {
	$timer = setInterval(function() {
		var $obj = $('.tab ol').find('.active1');
		var $i = $('.tab ol li').index($obj);
		if ($i >= $('.tab ol li').length - 1) {
			$k = 0;
		} else {
			$k = $i + 1;
		}
		$('.tab ol li').eq($k).trigger('click');
	}, 3000)
	
}

function autoslider2() {
	$timer = setInterval(function() {
		var $obj2 = $('.F1_tab ol').find('.active2');
		var $i2 = $('.F1_tab ol li').index($obj2);
		if ($i2 >= $('.F1_tab ol li').length - 1) {
			$k2 = 0;
		} else {
			$k2 = $i2 + 1;
		}
		$('.F1_tab ol li').eq($k2).trigger('click');
	}, 3000)
}

function autoslider3() {
	$timer = setInterval(function() {
		var $obj3 = $('.F2_tab ol').find('.active3');
		var $i3 = $('.F2_tab ol li').index($obj3);
		if ($i3 >= $('.F2_tab ol li').length - 1) {
			$k3 = 0;
		} else {
			$k3 = $i3 + 1;
		}
		$('.F2_tab ol li').eq($k3).trigger('click');
	}, 3000)
}

$(document).ready(function() {
	autoslider();
	autoslider2();
	autoslider3();

	$('.menu_box').hover(function() {
		$(this).addClass('menu_border').siblings().removeClass('menu_border');
		var $menu_sub = $('.menu_box').index(this);
		$('.left_menu dl i').eq($menu_sub).css({
			display: "block"
		});
		$('.menu_box .menu_sub').eq($menu_sub).css({
			display: "block"
		});
	}, function() {
		$(this).removeClass('menu_border');
		var $menu_sub = $('.menu_box').index(this);
		$('.left_menu dl i').eq($menu_sub).css({
			display: "none"
		});
		$('.menu_box .menu_sub').eq($menu_sub).css({
			display: "none"
		});
	})

	$('.tab ol>li').click(function() {
		autoslider();
		$(this).addClass('active1').siblings().removeClass('active1');
		var $k = $('.tab ol>li').index(this);
		$('.tab .aa img').eq($k).fadeIn(500).siblings().fadeOut(500);
		clearInterval($timer);
		
	})

	$('.F1_tab ol>li').click(function() {
		autoslider();
		$(this).addClass('active2').siblings().removeClass('active2');
		var $k2 = $('.F1_tab ol>li').index(this);
		$('.F1_tab .bb img').eq($k2).fadeIn(500).siblings().fadeOut(500);
		clearInterval($timer);
	})

	$('.F2_tab ol>li').click(function() {
			autoslider();
			$(this).addClass('active3').siblings().removeClass('active3');
			var $k3 = $('.F2_tab ol>li').index(this);
			$('.F2_tab .bb img').eq($k3).fadeIn(500).siblings().fadeOut(500);
			clearInterval($timer);
		})
		/*------首页--end---*/
	$('.product-side-box ul li').click(function() {
		$(this).addClass('active9').siblings().removeClass('active9');
		var $img = $('.product-side-box ul li').index(this);
		$('.product-side-box .pic img').eq($img).css({
			opacity: "1"
		}).siblings().css({
			opacity: "0"
		})
	});
	
	$(".zhankai_box").click(function() {
			$(".zhankai").toggle('normal');
	});
	$(".zhankai_box1").click(function() {
			$(".zhankai1").toggle('normal');
	});
	$(".zhankai_box2").click(function() {
			$(".zhankai2").toggle('normal');
	});
	$(".zhankai_box3").click(function() {
			$(".zhankai3").toggle('normal');
	})
		$(".zhankai_box4").click(function() {
			$(".zhankai4").toggle();
	})
		/*------pagelist--end---*/
		$('.page_tab1 ol li a').click(function(){
			$(this).addClass('active4').siblings().removeClass('active4');
			var $page_tab = $('.page_tab1 ol li a').index(this);
			var $navbar = $('.navbar').eq($page_tab).offset().top;
			$('body,html').animate({
				scrollTop: $navbar+'px'
		},1000)
		})
		var height =  $('.page_tab1_box').offset().top;
		$(window).scroll(function(){
			var scrollhei = $(document).scrollTop();
			if(scrollhei>=height){
				$('.page_tab1_box').css({position: 'fixed',top:0})
				$('.page_tab1_box .page_tab1>div').css({display:'block'})
			}else{
				$('.page_tab1_box').css({position: ''})
				$('.page_tab1_box .page_tab1>div').css({display:'none'})
			}
		})
		/*------page--end---*/
		$("#demoForm").validate({
			rules:{
				username:{
					required:true,
					remote:"remote.json"
				},
				password:{
					required:true,
					rangelength:[6,16]
				}
			},
			messages:{
				username:{
					required:"请输入账号",
					remote:"用户名已存在"
				},
				password:{
					required:"请输入密码",
					rangelength:"请输入6-16位密码"
				}
			},
			  errorClass:'login-wrong',
			  validClass:'login-wrong2',
			  errorElement:'li',
              wrapper:'ul',
              submitHandler:function(form){
                window.open('http://127.0.0.1:8020/HB/zxlvw/index.html');
            }
		});
		 $('#submit').click(function(){
            alert($('#demoForm').valid()?'登录成功':'请检查您的输入');
        });
		  /*------登录页表单验证--end---*/
		 $('#regForm').validate({
		 	rules:{
		 		txtPhone:{
		 			required:true,
		 			number:true,
		 			rangelength:[11,11]
		 		},
		 		pwd1:{
		 			required:true,
		 			code:true
		 		}
		 	},
		 	messages:{
		 		txtPhone:{
		 			required:"请填写用户名",
		 			number:"手机号码必须是数字",
		 			rangelength:"请填写11位手机号码"
		 		},
		 		pwd1:{
		 			required:"请填写邮箱"
		 		}
		 	},
		 	  errorClass:'reg-wrong',
		 	  validClass:'reg-wrong2',
			  errorElement:'p',
              submitHandler:function(form){
              	window.open('http://127.0.0.1:8020/HB/zxlvw/index.html')
              }
		 });
		 $('#submit2').click(function(){
		 	alert($('#regForm').valid()?'登录成功':'请检查您的输入');
		 });
		 $.validator.addMethod('code',function(value){
			var reg = /^[a-z0-9]+@[a-z0-9]+(\.[a-z]{2,6}){1,7}$/;
			return reg.test(value);
		 },'用户名必须是邮箱格式')
	 /*------注册页表单验证--end---*/

});













