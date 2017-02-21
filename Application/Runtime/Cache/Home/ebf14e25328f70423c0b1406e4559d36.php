<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en" class="htmls">
<head>
    <title>哈哈镜美食</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
	<link rel="stylesheet" href="/Public/css/set_common.css"><script>(function(){var calc = function(){var docElement = document.documentElement;var clientWidthValue = docElement.clientWidth > 480 ? 480 : docElement.clientWidth;docElement.style.fontSize = 10*(clientWidthValue/320) + 'px';};calc();window.addEventListener('resize',calc);})();</script><style type="text/css">body,html{width:100%;height:100%;background-color:#ddd}.container{width:96%;margin:2% auto;border-radius:6px;background-color:#fff}.share-top{background-color:#57b259;color:#fff;text-align:center;padding:1.4rem 0 1rem}.head-info{font-size:12px;padding-top:5px}.head-info .head-info-span{margin:0 6px}.share-top .img{width:5rem;display:inline-block;border-radius:50%}.share-top .head-title{font-size:16px;line-height:2.8rem}.mens_details_x{margin-left:40%}.mens_details_x img{width:16px;height:16px}.wrap_x{width:90px;height:13px;background:url(/Public/image/star_v.png) no-repeat;background-position:0 0;-webkit-transform:scale(0.9);transform:scale(0.9);margin-left:-5px}.generic-title{position:relative;text-align:center;padding:0 15%;height:44px;line-height:0}.generic-title .line-size,.generic-title i{display:block}.generic-title .line-size{margin:0 3%;line-height:44px;color:#666;font-size:15px}.generic-title .line{height:1px;background:#777;margin-bottom:.5px;margin-top:22px}.h3{width:100%;height:20px;background:url(/Public/image/Category/share-icon2.png) no-repeat;background-size:100% auto}.h3.h32{width:100%;height:20px;background:url(/Public/image/Category/share-icon3.png) no-repeat;background-size:100% auto}.sec-imgs img{border:1px solid #ccc;border-radius:8px;width:10.5rem;height:10.5rem;display:inline;margin-right:.5rem}.sec-imgs img:last-child{margin-right:0rem}.sec-imgs{text-align:center;width:21.6rem;margin:0 auto}.sec-info .sec-top{color:#57b259;font-size:12px;line-height:24px;padding:1rem 3% 0}.foot-info{padding:1rem 2.2rem 5rem;position:relative}.foot-info .foot-div{color:#57b259;border:1px solid #57b259;border-radius:6px;margin:0 1rem;text-align:center;line-height:38px;font-size:16px}.foot-span{position:absolute;left:11%;top:5.6rem;font-size:12px;display:block;border-radius:4px;border:1px solid #57b259;padding:.2rem 1.4rem;color:#57b259}.foot-span:after{content:"";width:14px;height:14px;background:url(/Public/image/Category/top-icons.png) no-repeat;background-size:100% 100%;position:absolute;left:3rem;top:-10px}.foot-div2{background:#57b259}.foot-div a{color:#57b259}.foot-div2 a{color:#fff}.mod_coupnss{padding:0 5%}.mod_coupnss img{display:block;width:100%;border-radius:8px}.paddingr{padding:0 3%}</style>
</head>
<body>
	<div class="container share-contanier" id="container">
		<div class="share-top">
			<div class="head-img"><img src="<?php echo ($shop_data['shop_avatar']); ?>" alt="" class="img"></div>
			<h2 class="head-title"><?php echo ($shop_data['shop_name']); ?></h2>
			<div class="mens_details_x">
			   <div class="wrap_x" id='wrap_x0' data-index="<?php echo ($shop_data["score"]); ?>" data-id="0">
			        <div id="cur" class="cur"></div>
			    </div>
			</div>
			<p class="head-info">
				<span>配送范围 <b><?php echo ($shop_data["shop_deliverscope"]); ?>公里</b></span>
				<span class="head-info-span">|</span>
				<span>起送价 <b><?php echo ($shop_data["shop_updeliverfee"]); ?>元</b></span>
			</p>
		</div>
		<section class="sec-info">
			<div class="sec-top">
				<?php if(is_array($shop_data['shop_notice1'])): foreach($shop_data['shop_notice1'] as $key=>$vo): ?><p><?php echo ($vo); ?></p><?php endforeach; endif; ?>
			</div>
			<h3 class="h3"></h3>
			<div class="paddingr">
				<div class="generic-title flex"><i class="line flexs line-l"></i><span class="line-size">店内优惠</span><i class="line flexs line-r"></i></div>
				<div class="mod_coupnss" id="mod_coupnss">
					<a href="javascript:;"><img src="http://hahajing.oss-cn-beijing.aliyuncs.com/userfiles/banner/2016-06-16/20160616140224.jpg" alt=""></a>
	            </div>
				<div class="generic-title flex"><i class="line flexs line-l"></i><span class="line-size">热销商品</span><i class="line flexs line-r"></i></div>
				<div class="sec-imgs flex">
					<?php if(is_array($shop_data['goods_list'])): foreach($shop_data['goods_list'] as $key=>$vo): ?><!-- <p class="flexs2"></p> --><img class="imgs" src="<?php echo ($vo['goods_pic']); ?>" alt=""><?php endforeach; endif; ?>
				</div>
			</div>
			<h3 class="h3 h32"></h3>
			<footer class="foot-info flex">
				<div class="foot-div flexs">
					<a href="http://www.hahajing.com/download/" class="foota">下载app</a>
				</div>
				<div class="foot-div foot-div2 flexs">
					<a href="http://weixin.hahajing.com/Category/index/shop_id/<?php echo ($shop_id); ?>" class="foota">快速进店</a>
				</div>
				<span class="blocks foot-span">新用户注册，首单立减10元</span>
			</footer>
			
		</section>
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
		score('container','wrap_x');
	</script>
</body>
</html>