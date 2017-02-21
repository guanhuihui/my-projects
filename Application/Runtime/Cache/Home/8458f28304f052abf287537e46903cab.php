<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en" class="htmls">
<head>
    <title>哈哈镜美食</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
	<link rel="stylesheet" href="/Public/css/set_common.css">
	<script>(function(){var calc = function(){var docElement = document.documentElement;var clientWidthValue = docElement.clientWidth > 480 ? 480 : docElement.clientWidth;docElement.style.fontSize = 10*(clientWidthValue/320) + 'px';};calc();window.addEventListener('resize',calc);})();</script> 
	<style type="text/css">html.htmls{background-color:#f6e7ae}.wrap_logs .blacks{display:block;width:100%}.wrap_logInfo{width:80%;margin:2.2rem auto}.wrap_logs .spans{margin:0 auto;margin-top:2rem}.wrap_logs .spans .phone1{width:100%;border:1px solid #daaf85;height:48px;border-radius:28px;padding:4px 10px;background:#fff;font-size:17px;z-index:999}.wrap_logs .spans .phone::-webkit-input-placeholder,.wrap_logs .spans .phone::-webkit-input-placeholder{text-align:center;font-size:17px;color:#999}.wrap_logs .spans.spans2{width:13rem;text-align:center;line-height:48px;border-radius:20px;background:#fb5034;color:#fff;font-size:1.7rem;letter-spacing:5px}.imgs{width:100%}.foo{width:100%;background:#fff;padding:1rem;position:fixed;left:0;bottom:0}.foo .imgs{width:50%;margin:0 auto}.hide-msg{position: fixed;z-index: 9;left: 0;top: 0;width: 100%;height: 100%;background-color: rgba(0,0,0,.8);display: none;}.hide-msg .hide_box{width: 76%;margin:30% auto 0;background: #FB5032;padding: 1rem;border-radius: 5px;}.hide_box_small{background: #FCF0C6;border-radius: 5px;text-align: center;padding: 3rem;color: #FC242F;font-size: 1.5rem;}.hide_box_small .size2{margin: 1.5rem 0;}.hide_box_small .btn2s{width: 7rem;line-height:40px;text-align: center;background:#FC242F;border-radius: 8px; margin: 3rem auto 0;}.hide_box_small .btn2s a{color: #fff;}
	</style>
</head>
<body>
	<div class="hide-msg">
		<div class="hide_box">
			<div class="hide_box_small">
				<p class="size1">领取成功！</p>
				<p class="size2">马上去下单！</p>
				<div class="btn2s">
					<a href="javascript:;">确定</a>
				</div>
			</div>
		</div>
	</div>
	<div class="wrap_logs">
		<form id="autocomplete-form" class="mod-order-common login-form" onsubmit="return false;"  action="">
			<div class="wrap_img"><img src="/Public/image/quan/acts/banner.jpg" alt="" class="blacks"></div>
			<div class="wrap_logInfo wrap_logInfo1">
				<img class="blocks imgs" src="/Public/image/quan/acts/bg.png" alt="">
				<span class="spans blocks"><input name="phone" id="phones1" class="phone phone1 blocks styleinput" type="tel" placeholder="请输入手机号码，立即领券" maxlength="11" value=""></span>
				<span class="log_btn spans spans2  blocks" id="log_btn">立即领取<!--<input type="button" id="btn1" class="btn1 blocks styleinput" data-index="0" value="" readonly="">--></span>
			</div>
		</form>
		<footer class="foo"><img class="blocks imgs" src="/Public/image/quan/acts/foo.png" alt=""></footer>
	</div>
	<input type="hidden" name="pid" id="pid" value="<?php echo ($pid); ?>">
	<script type="text/javascript" src="/Public/js/layer.m/layer.m.js"></script>
	<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "//hm.baidu.com/hm.js?c2d2766f7586737e9c94a580840a7bfd";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>
<script src="/Public/js/lib/all.js" type="text/javascript" charset="utf-8"></script>
	<script type="text/javascript">
	var myDate = new Date();
	var y = myDate.getYear(); //获取当前年份(2位)
	var Y = myDate.getFullYear(); //获取完整的年份(4位,1970-????)
	var M = myDate.getMonth(); //获取当前月份(0-11,0代表1月)
	var data = myDate.getDate();
		loaging.init('加载中...');
		var ua = navigator.userAgent.toLowerCase();	
			function connectWebViewJavascriptBridge(callback) {
				if (window.WebViewJavascriptBridge) {
				callback(WebViewJavascriptBridge)
				} else {
				document.addEventListener('WebViewJavascriptBridgeReady', function() {
				callback(WebViewJavascriptBridge)
				}, false)
				}
			}
	    	var btn = $('#log_btn');
	    		btn.off('tap');
	    		btn.on('tap',function(){
	    			loaging.close();
	    			loaging.init('加载中，请稍后...');    			
	    				$('input').blur();
	    				setTimeout(function(){
							var phones = "",
								phones = $('#phones1'),hide_msg = $('.hide-msg')
							var that = $(this),
								myreg = /^1[3|4|5|7|8]\d{9}$/,
								phoneVal = phones.val();
							if(!myreg.test(phoneVal)){ 
								loaging.close();
								loaging.prompts('请输入有效的手机号码！');
								return false; 
							}
							
								$.ajax({
									url: '/ActivityTwo/get_act_ticket',
									type: 'POST',
									data: {phone: phoneVal,pid:$('#pid').val()},
									success:function(rs){
										var re = JSON.parse(rs);
										console.log(re);
										loaging.close();
										if(re.result == "ok"){  						
											// loaging.btn(re.msg); 
											hide_msg.show();
											$('.btn2s').on('tap',function(){
												loaging.close();
												loaging.init('加载中，请稍后...');
												var ua = navigator.userAgent.toLowerCase();	
												if(ua.match(/MicroMessenger/i)=="micromessenger"){
													// document.location.replace("https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx78a74ae276f5adb5&redirect_uri=http%3A%2F%2Fweixin.hahajing.com%2FLoad%2Findex&response_type=code&scope=snsapi_base&state=abc#wechat_redirect");
													top.location.href="https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx78a74ae276f5adb5&redirect_uri=http%3A%2F%2Fweixin.hahajing.com%2FLoad%2Findex&response_type=code&scope=snsapi_base&state=abc#wechat_redirect";
												}else if (/iphone|ipad|ipod/.test(ua)) {
													loaging.close();
													connectWebViewJavascriptBridge(function(bridge) {
														var mycars={'type':'8'};
														bridge.send(mycars);
													});
													console.log('i')
												} else if (/android/.test(ua)) {
													console.log('a')
													loaging.close();
													window.mWebView.is_pop_new("4","");
												}

												
											})
										}else{
											loaging.prompts(re.msg);
										}
									},error:function(){
										loaging.close();
									}
								})	
							
							
	    				})			
	    		})
		window.onload=function(){
			loaging.close();
			layer.open({
				content:'活动已结束',
				shadeClose:false,
				style:'text-align:center;font-size:16px;'
			});
			// if(Y >= 2017 && (M+1) >= 1 && data > 17){
			// 	layer.open({
			// 		content:'活动已结束',
			// 		shadeClose:false,
			// 		style:'text-align:center;font-size:16px;'
			// 	});
			// }
		}
	</script>
	<script type="text/javascript">
		var url = window.location.href;
		weixins(url,"ones");
	</script>
	<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "https://hm.baidu.com/hm.js?e7b83cbf37b0d3a938e48f748bfcc3af";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>

</body>
</html>