<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en" class="html2">
<head>
    <title>哈哈镜 </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
	<link rel="stylesheet" href="/Public/css/set.css">
	<style type="text/css">

	</style>
</head>
<body>
	<div class="wrap_add">
		<header class="pub-header pub-header2">
	        <a href="javascript:history.back(-1);" class="tap-action icon icon-back icon-back2" id="returns"></a>
	        <div class="header-content ui-ellipsis">
	            添加地址
	        </div>
		</header>
		<section class="main main-both add_boxs content">
			<form id="autocomplete-form" class="mod-order-common login-form" onsubmit="return false;"  action="/ActivityTwo/set_address_add" method="post">
		        <ul class="edit-ul">
		            <li class="lis flex">
		                <span class="list_name">联系人：</span>
		                <span class="blocks flexs">
		                    <input class="input addr-input-name" id="name" name="name" type="text" value="" placeholder="收货姓名">
		                </span>
		            </li>
		            <li class="lis flex">
		                <span class="list_name">手机号码：</span>
		                <span class="blocks flexs">
		                	<input id="autocomplete-phone" class="input addr-input-phone" name="mobile" required="" type="tel" maxlength="11" value="" placeholder="收货时联系您的电话" autocomplete="on">
		                </span>
		            </li>
		            <li class="lis flex delX">
		                <span class="list_name">详细地址：</span>
		                <div class="addr-city flexs">
		                   <p class="searchBtn"><input type="text" name="district" class="read input" placeholder="请填写您的住宅小区、大厦或学校" value=""></p>
		                   <input type="text" name="address" class="house input" id="address" placeholder="请输入楼号门牌号等详细信息" value="">
		                </div>
		            </li>
		        </ul>
		        <input type="hidden" name="ticket_list_ids" value="<?php echo ($ticket_list_ids); ?>">
		        <input type="hidden" name="cart_ids" value="<?php echo ($cart_ids); ?>">
		    </form>
	    </section>
	    <div class="Btnsub"><p class="ps"><input type="button" id="btn2" class="btn2 blocks styleinput" value="保存" readonly=""></p></div>
	</div>
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
		loaging.init('加载中...');
		window.onload=function(){
			loaging.close();
		}
		var btns = $('#btn2');
		$(function(){
			btns.off('click').on('click',function(){
			    $('input').blur();
			    var phones = $('#autocomplete-phone').val(),
			        myreg = /^1[3|4|5|7|8]\d{9}$/,
			        names = $('.addr-input-name').val(),
			        dels = $('.read').val(),
			        address = $('#address').val();

			    if(!myreg.test(phones)) 
			    { 
			        loaging.close();
			        loaging.prompts('请输入有效的手机号码！');
			        return false; 
			    } 
			    if(!names){
			        loaging.close();
			        loaging.prompts('姓名不能为空');
			        return false; 
			    }
			    if(!dels){
			        loaging.close();
			        loaging.prompts('收货地址不能为空');
			        return false; 
			    }
			    if(!address){
			        loaging.close();
			        loaging.prompts('门牌号信息不能为空');
			        return false; 
			    }
				document.getElementById("autocomplete-form").submit();

			})
		});

	</script>
</body>
</html>