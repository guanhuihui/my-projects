<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"><meta name="apple-mobile-web-app-capable" content="yes"><meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"><meta name="format-detection" content="telephone=no">
	<title>生成二维码</title>
	<link rel="stylesheet" href="/Public/css/ShopBack/common.css">
  	<script>(function(){var calc = function(){var docElement = document.documentElement;var clientWidthValue = docElement.clientWidth > 480 ? 480 : docElement.clientWidth;docElement.style.fontSize = 10*(clientWidthValue/320) + 'px';};calc();window.addEventListener('resize',calc);})();</script> 
	<style type="text/css">.p2_input{width:94%;margin-top:2rem;background:#fff;height:4rem;padding:.5rem 3%}.p2_input input{display:block;height:4rem;font-size:1.6rem;border-color:#ccc}.sec_div2{width:100%;text-align:center;margin-top:3rem;color:#121212;line-height:4rem;font-size:1.4rem}.sec_div2 img{width:40%}</style>
</head>
<body>
	<div class="main main_index2">
		<!--<header class="header"><span class="blocks head_left"><img src="img/logo.png" alt=""></span><p class="centent">哈哈镜</p></header> -->
		<header class="header2"><img src="/Public/image/logo.png" alt="">哈哈镜</header>
		<section class="sec2">
			<div class="inputs p2_input flex"><input name="shop_code" id="shop_code" class="styleinput flexs styleinput2"
		    type="tel" placeholder="请输入商户ID" value=""><input class="styleinput submit login-send" id="btn" readonly="readonly" type="button"  value="生成二维码"></div>
			<div class="sec_div2"><p class="sec_Img1"></p><p class="sec_Img2"></p></div> 
		</section>
	</div>
	<script type="text/javascript" src="/Public/js/lib/jquery-1.9.1.min.js"></script>
	<script type="text/javascript" src="/Public/js/layer.m/layer.m.js"></script>
	<script type="text/javascript">
	var btn=$("#btn"),reg=new RegExp("[0-9]*");btn.on("click",function(){var shop_code=$("#shop_code"),shop_codeVal=$("#shop_code").val();var logs=layer.open({type:2,content:"加载中..."});if(!reg.test(shop_codeVal)){layer.close(logs);var index=layer.open({content:'<p class="center">请输入正确的商户ID，生成二维码</p>',time:2});return false};$.ajax({url:"/ShopBack/get_shop_url_img",type:"POST",data:{shop_code:shop_codeVal},success:function(re){layer.close(logs);var res=JSON.parse(re),sec_Img1=$(".sec_Img1"),sec_Img2=$(".sec_Img2");if(res.result=="ok"){sec_Img2.html('<img src="/ShopBack/get_img?shop_code='+shop_codeVal+'" alt="" />')}else{var index_btn=layer.open({content:'<p class="center">'+res.msg+"</p>",style:"text-align:center",shadeClose:false,btn:["确认"]})}},error:function(){layer.close(logs)}})});
	</script>
</body>
</html>