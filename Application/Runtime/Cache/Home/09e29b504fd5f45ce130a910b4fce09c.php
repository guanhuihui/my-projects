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
    <style type="text/css">
    	body,html,.mod-container{width:100%;height:100%;background:#ffffff;}
		.header-top{width: 100%;height: 55px;background: #cccccc;padding: 10px 3%;}
		.header-top p{float: left;width: 80%;}
		.header-top .span{display: block;width: 18%;margin-left:2%;height:100%;float: left;text-align: center;line-height:35px;background: #359F57;border-radius: 5px;color: #fff;}
		.header-top p input{display: block;width: 100%;height: 100%;min-height: 35px;}
		.header-top p input{border:none;outline: none;-webkit-appearance:none;border-radius:4px;padding: 5px 0 5px 40px;}
		.header-top p{position: relative;}
		.header-top p:after{content:"";display: block;width: 20px;height: 20px;left: 10px;top:6px;position: absolute;background: url(/Public/image/search_icon.png) no-repeat;background-size: 100% 100%;}
		.scrollers_box{width: 100%;padding: 0 3%;}
		.scrollers_box a{display: block;width: 100%;border-bottom: 1px solid #dadada;line-height: 20px;padding: 5px 0;}
		.scrollers_box a span{display: block;}
		.scrollers_box a p{font-size: 13px;color: #787878;}
    .size{font-size: 14px;text-align: center;line-height: 60px;color: #999;}
    </style>
<body>
<div id="l-map" style="display:none;"></div>
	<div id="r-result">请输入:<input type="text" id="suggestId" size="20" value="百度" style="width:150px;" /></div>
    <div id="mod-container" class="mod-container clearfix" style="background:#ffffff">
        <div id="mod-custom" class="mod-custom">
            <header class="pub-header">
                <a class="tap-action icon icon-back" href="/address/add.html"></a>
                <div class="header-content"></div>
            </header>
            <div class="header-top">
	            <form action="" method="post" name="FrmSearch" target="_self" id="FrmSearch" onsubmit="return checkSubmit()" >
	            	<p>
	            		<input type="search" id="searchs" name="search" placeholder="写字楼、小区、学校、街道">
	            	</p>
	            	<span class="span" id="spansearch">搜索</span>

	            </form>
            </div>
            <div class="main main-top" style="overflow: hidden;top:100px" id="mod-custom-box">
                <div class="scrollers">
                	<div class="scrollers_box" id="searchResultPanel"></div>
                </div>
            </div>
        </div>
    </div>
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
<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=wqBXfIN3HkpM1AHKWujjCdsi"></script> 
<script type="text/javascript">
   	$('.mod-custom').show();
   	var myScroll,
   		cityName=GetQueryString('cityName'),
   		cityCode=GetQueryString('cityCode'),
   		address_id=GetQueryString('address_id'),
   		address=GetQueryString('address'),
    	name=GetQueryString('name'),
    	mobile=GetQueryString('mobile');
	   	function G(id) {
			return document.getElementById(id);
		}
		function ajaxs(as){
      
      var $searchs="";
      cityName ? $searchs = cityName+as : $searchs = as;
		  $.ajax({
            url: 'http://api.map.baidu.com/place/v2/search',
            dataType: "jsonp",
            data: {
                ak: "epx2GlGrgjgEizwW8iYsHwQZ",
                region: cityName,
                q: $searchs,
                output: "json",
                page_size:10
            },
            success: function(t) {
            	var resut=t.results;
            	loaging.close();
            	if(!t.results.length){
            		/*loaging.prompts('未找到');
            		return false;*/
            	}
            	var html="",address="";
            	if(resut.length){
	            	for(var k=0;k<resut.length;k++){
	            		if(resut[k].address==undefined){
	            			address="";

	            		}else{
	            			address=resut[k].address;
	            		}

                  if(!address){
                    html = "<div class='size'>您输入的地址无法识别，请修改后重试</div>";
                  }else{

                    html+='<a href="/address/add.html?district='+resut[k].name+'&x='+resut[k].location.lat+'&y='+resut[k].location.lng+'&cityname='+cityName+'&cityCode='+cityCode+'&address_id='+address_id+'&address='+address+'&name='+name+'&mobile='+mobile+'">'
                          +'<span>'+resut[k].name+'</span>'
                          +'<p>'+address+'</p>'
                        +'</a>'
  	            		}
	            	}
	               $('.scrollers_box').html(html);
	               myScroll.refresh();
	            }
            },
            error: function() {
            	loaging.close();
                loaging.btn('搜索失败，请重新输入');
            }
    	})
	}
	$('#spansearch').on(tapClick(),function(){
    loaging.close();
		loaging.init('加载中，请稍后');
		$('#searchs').blur();
        var result=false,
       		$searchs= $.trim($('#searchs').val());
       		if(!searchs || $searchs == '' || $searchs == null){
            loaging.close();
       			return false;
       		}
       		ajaxs($searchs);
        	return result;
		});
		$('#searchs').off('input');       
		$('#searchs').on('input',function(){
			var $searchs = $.trim(this.value),
          reg = /[\u4E00-\u9FA5\uF900-\uFA2D]/,
          as =  reg.test($searchs);
	   		if(as){
	   			ajaxs($searchs);
	   		}
		})    
	$(document).ready(function() {
		if(cityName){
      $('.header-content').html(cityName+'市');
      myScroll = new IScroll('#mod-custom-box', {probeType: 3,mouseWheel: true,click: true,scrollbars: false}); 
    }
	})
	
	function checkSubmit(){
    loaging.close();
    loaging.init('加载中，请稍后');
	   $('#searchs').blur();
        var result=false,
       		$searchs= $.trim(this.value);
       		if(!searchs || $searchs == '' || $searchs == null){
            loaging.close();
            return false;
       		}
       		ajaxs($searchs);
        	return result;
    }


</script>
</body>
</html>