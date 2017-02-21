<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"><meta name="apple-mobile-web-app-capable" content="yes"><meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"><meta name="format-detection" content="telephone=no">
	<title>提现</title>
	<link rel="stylesheet" href="/Public/css/ShopBack/common.css">
  	<script>(function(){var calc = function(){var docElement = document.documentElement;var clientWidthValue = docElement.clientWidth > 480 ? 480 : docElement.clientWidth;docElement.style.fontSize = 10*(clientWidthValue/320) + 'px';};calc();window.addEventListener('resize',calc);})();</script><style type="text/css">.sec_size{padding: 10px 3% 10px;}.sec_size span{color: #666;}.sec_sizes{color:red;padding: 5px 3% 0;font-size: 1.2rem;}.bigbtn{margin-top: 2rem;}#autocomplete-form .inputs{background: #f1f1f1}#autocomplete-form .sec_sizes{border-top: 1px solid #efefef;}.submitCol{background: #ccc}</style>
</head>
<body>
	<div class="main main_log">
		<!--<header class="header"><span class="blocks head_left"><img src="img/logo.png" alt=""></span><p class="centent">哈哈镜</p></header> -->
		<header class="header2"><img src="/Public/image/logo.png" alt="">哈哈镜</header>
		<div class="sec_size">绑定店铺：<span><?php echo ($shop_data['shop_name']); ?></span></div>	
	    <section class="section clearfix">
	    	<form id="autocomplete-form" class="mod-order-common login-form" onsubmit="return false;">

	    		<div class="inputs flex ">
	    		    <input type="text" class="getcode styleinput flexs styleinput2" id="names" placeholder="请填写真实姓名" >
	    		</div>
	    	    <div class="inputs inputs2 flex">
	    	        <input name="phone" id="autocomplete-phone" class="styleinput flexs styleinput2"
	    	        type="tel" placeholder="请填写验证码" maxlength="11" value="">
	    	        <input class="styleinput submit login-send" id="btn" readonly="readonly" type="button"  value="获取验证码">    
	    	    </div>
	    	    <input type="hidden" name="msg" value="<?php echo ($shop_data['msg']); ?>">
	    	    <div class="sec_sizes">请输入微信实名认证的姓名，否则无法提现</div>
	    	    <div type="button" class="bigbtn styleinput bigbtn-one login-submit" id="sub_btn">
	    	        立即绑定
	    	    </div>
	    	</form>
	    </section>
	</div>
	<div class="yans">
	    <div class="yansBoxs">
	        <h2>请填写图形验证码</h2><div class="yans_box"><input type="tel" maxlength="4" id="openSize" class="styleinput blocks" value="" /><span class="styleinput blocks"><img src="/ShopBack/get_code?font_size=20&width=150&height=40" id="yansImg" onclick="this.src='/ShopBack/get_code?font_size=20&width=150&height=40'" alt="" style="cursor: pointer;padding:0;border:0;margin:0;display:block;" title="点击获取" /></span></div>
	            <div class="flex flex_div"><p class="flexs_p oneflex">取消</p><p class="flexs_p twoflex">确认</p></div>
	    </div>
	</div>
	<script type="text/javascript" src="/Public/js/lib/jquery-1.9.1.min.js"></script><script type="text/javascript" src="/Public/js/layer.m/layer.m.js"></script><script type="text/javascript" src="/Public/js/common.js"></script>
	<script type="text/javascript">
		var btn = $("#btn"),
			sub_btn = $('#sub_btn'),
			phones = $('#autocomplete-phone'),
			names = $('#names'),
			inp = $('input'),
			yans = $('.yans'),
			yansImg = $('#yansImg'),
			openSize = $('#openSize'),
			s = 60, t;


			btn.on('click',function(){
			    openSize.val(''); 
			    inp.blur();

		        yans.show();
		        $('.oneflex').off('click');
		        $('.oneflex').on('click',function(){
		            yansImg.click();
		            yans.hide(); 
		        })
		        $('.twoflex').off('click');
		        $('.twoflex').on('click',function(){
		           var vals = openSize.val();
		           if(vals){
		                $('input').blur();
		                layer.closeAll();	    
		                $.ajax({
		                	url: '/ShopBack/set_shop_auth_code',
		                	type: 'POST',
		                	data: {'verify':vals},
		                	success:function(re){
		                		var res = JSON.parse(re);
		                		console.log(res);
		                		if(res.result == 'ok'){
		                			yans.hide();
					                loaging.prompts(res.msg);
					                function times(){
					                    s--;
					                    btn.val('重新获取('+s+')');
					                    btn.attr({'disabled':true}).addClass('submitCol');
					                    t = setTimeout(times, 1000);
					                        if ( s <= 0 ){
					                         s = 60;
					                         clearTimeout(t);
					                         btn.val('获取验证码');
					                         btn.attr('disabled',false).removeClass('submitCol');
					                        }
					                    }
					                   times();
		                		}else{
		                			yansImg.click();
			                        openSize.val('');
			                        loaging.btn(res.msg);

		                		}	
		                		
		                	},error:function(){

		                	}
		                })
		           }else{
		                $('input').blur();
		                layer.closeAll();
			            /*yans.hide();*/ 
		                yansImg.click();
		                openSize.val('');
		                loaging.btn('验证码不能为空');
		           }
		        })
			})
			
			sub_btn.on('click',function(){
			    inp.blur();
			    var phone=phones.val(),
			    	namesval = names.val();
			    	if(!namesval){
			    		loaging.close();
			    		loaging.prompts('姓名不能为空');
			    		return false;
			    	}
			    	if(!phone){
			    		loaging.close();
			    		loaging.prompts('验证码不能为空');
			    		return false;
			    	}
			    	loaging.close();
			    	commoms.post_server('/ShopBack/wx_binding',{user_name: namesval,code:phone},function(result){
			    	    if (result.result == 'ok') {
			    	        loaging.btn(result.msg);
			    	    }else{
			    	        loaging.btn(result.msg);
			    	    }
			    	    console.log(result);

			    	},function(){
			    		loaging.close();
			    	    loaging.btn('请重试');
			    	},false);


			})

		
</script>
</html>