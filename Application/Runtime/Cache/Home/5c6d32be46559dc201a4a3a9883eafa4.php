<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <title>哈哈镜便捷购</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="format-detection" content="telephone=no">
    <script type=text/javascript>
	var docElement = document.documentElement;
	var clientWidthValue = docElement.clientWidth > 480 ? 480 : docElement.clientWidth;
	docElement.style.fontSize = 10*(clientWidthValue/320) + 'px';
</script>
<link rel="stylesheet" href="/Public/css/style.css">
<script type="text/javascript" src="/Public/js/layer.m/layer.m.js"></script>
<script type="text/javascript" src="/Public/js/lib/fastclick.js"></script>
    <script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=wqBXfIN3HkpM1AHKWujjCdsi"></script>
    <style type="text/css">
		#l-map{height:200px;width:100%;}
		.map_main{width: 100%;background: #ffffff;padding:5px 0 5px 4%;}
		.map_main>h2{padding:5px 0;color: red;}
		.map_main>h2 img{display: block;float: left;width: 15px;height:18px;margin:2px 5px 0 0px;}
		.map_main p{padding:4px 0;border-bottom: 1px solid #dadede;font-size: 13px;color: #999999;}
		.map_main h3{font-weight: normal;padding: 4px 0 10px 0;}
    </style>
<body>
<div id="mod-container" class="mod-container clearfix">
    <div id="mod-success" class="mod-success pageview">
        <header class="pub-header">
            <a class="tap-action icon icon-back" href="/Address/add.html"></a>
            <div class="header-content "></div>
            <span class="header-right header-right-text"></span>
        </header>
        <div id="iscroll-success" class="main main-top" style="overflow: hidden;">
            <div class="scrollers" style="padding-bottom:30px;">
              	<div id="l-map"></div>
				<div class="map_main">
				</div>
            </div> 
        </div>
    </div>
</div>
<div id="allmap" style="display:none;"></div>
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
var myScroll;
var citys=GetQueryString('cityName');
var address_id=GetQueryString('address_id');
var address=GetQueryString('address');
var name=GetQueryString('name');
var mobile=GetQueryString('mobile');
var map = new BMap.Map("l-map");

if(citys){
		map.centerAndZoom(citys,12); 
	}else{
		map.centerAndZoom("北京",12); 
	}
    $(document).ready(function(){
        init();
        function init(){
        	$('.mod-success').show(); 
        	myScroll = new IScroll('#iscroll-success', {probeType: 3,mouseWheel: true,click: true,scrollbars: false}); 
        	common.geolocation();
        }  
	})
	function jsonpCallbacks(data) {
		if(data){
			var addComp = data.result,
				cityName=addComp.addressComponent.city,
				regionName=addComp.addressComponent.district,
				streetnName=addComp.addressComponent.street,
				juti=addComp.addressComponent.street_number,
				cityCode=addComp.cityCode,
                s=addComp.location.lat,
                k=addComp.location.lng;
				var pp = new BMap.Point(k,s);
				map.centerAndZoom(pp, 14);
				map.addOverlay(new BMap.Marker(pp));   
				var circle = new BMap.Circle(pp,500,{strokeColor:"blue", strokeWeight:2, strokeOpacity:0.5}); 
				  	map.addOverlay(circle);	
				var html='<h2><img src="/Public/image/positio_icon.png" alt=""><span class="default_city">'+cityName+regionName+streetnName+'</span></h2>'
						+'<p>'+addComp.formatted_address+'</p>'
						+'<ul>'
						for(var i=0, len=addComp.pois.length; i<len; i++){
							var arr=addComp.pois[i];
							html+='<li><a href="/Address/add.html?district='+arr.name+'&x='+k+'&y='+s+'&cityCode='+cityCode+'&cityname='+cityName+'&address_id='+address_id+'&address='+address+'&name='+name+'&mobile='+mobile+'">'
									+'<h3>'+arr.name+'</h3>'
									+'<p>'+arr.addr+'</p>'
									+'</a></li>'
						}
			     	html+='</ul>'
			$('.map_main').html(html)
			myScroll.refresh();	
		} 
	}







</script>
</body>
</html>