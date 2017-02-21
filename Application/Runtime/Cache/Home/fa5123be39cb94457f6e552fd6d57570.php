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
    <script type="text/javascript">
       /*window.addEventListener('load', function() {FastClick.attach(document.body);}, false);  */
    </script>
<body>
	<div id="mod-container" class="mod-container clearfix" >
        <div id="modcity-list" class=" modcity-list pageview" style="display:block;">
            <header class="pub-header bgss" style="border-bottom: none;">
                <div class="header-content">
                	<div class="headBs">
                		<form action="" class="forms" method="post" name="FrmSearch" target="_self" id="FrmSearch" onsubmit="return checkSubmit()" >
	    	            	<p class="head-Inp"><input type="search"  id="searchs" name="search" class="styleinput" placeholder="请输入你要搜索的地址"></p>
	    	            </form>
                	</div>
                </div>
                <a class="header-right" href="javascript:history.go(-1);">
                	取消
                </a>
            </header>
            <div class="main main-top" id="mod-custom-boxs">
                <div class="scrollers" id="scrollers">
                <?php if(($address_search_list_arr) != ""): ?><div class="hHistorical_Search">
                		<div class="Search_lis" id="Search_lis">
                			<p>历史搜索</p>
                			<span id="remove_Btn"><img src="/Public/image/remove_icon.png" alt=""></span>
                		</div>
                		<ul class="Search_menu <?php if(count($address_search_list_arr) < 4): ?>Search_auto<?php endif; ?>">
                			<?php if(is_array($address_search_list_arr)): foreach($address_search_list_arr as $key=>$vo): ?><li class="Search_li ui-ellipsis">
                				<a href="/address/index?district=<?php echo ($vo["address_name"]); ?>&x=<?php echo ($vo["address_lng"]); ?>&y=<?php echo ($vo["address_lat"]); ?>&hiden=1"><?php echo ($vo["address_name"]); ?></a>
                			</li><?php endforeach; endif; ?>
                		</ul>
                		<?php if(count($address_search_list_arr) > 4): ?><div class="Search_Img">更多历史<span><img src="/Public/image/me_arrow_up.png" alt=""></span></div><?php endif; ?>

                	</div><?php endif; ?>
                	<div class="Near-address">
                		<div class="Search_lis">
                			<p>附近地址</p>
                		</div>
            			<div class="scrollers_box">
            				<?php if(is_array($shop_near_list)): foreach($shop_near_list as $key=>$vo): ?><a href="/Category/index/shop_id/<?php echo ($vo["shop_id"]); ?>" class="listBoxa blocks">
		            				<span class="span spanColor1"><?php echo ($key + 1); ?></span>
		            				<div class="div-item">
		            					<span><?php echo ($vo["shop_name"]); ?></span>
		            					<p><?php echo ($vo["shop_address"]); ?></p>
		            				</div>
		            			</a><?php endforeach; endif; ?>
            			</div>
                	</div>
                </div>
            </div>
        </div>
	</div>




<input type="hidden" name="hidden" id="code" value="">
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
   	var myScroll,myScrol2,
   		cityName=GetQueryString('cityName'),
   		cityCode=GetQueryString('cityCode'),
   		address_id=GetQueryString('address_id'),
   		address=GetQueryString('address'),
    	name=GetQueryString('name'),
    	mobile=GetQueryString('mobile'),
    	headcon = $('.header-content'),
		headspan = $('.header-right span'),
		addsection =  $('#adds_selection'),
		Search_menu = $('.Search_menu'),
		menu_lis = $('.Search_menu li'),
		Search_btn = $('.Search_Img'),
		btn_img = Search_btn.find('img'),
		remove_Btn = $('#remove_Btn'),
		Search_li = $('#Search_lis'),
		sea_bigBox = $('.hHistorical_Search'),
		scrollers = $('.scrollers'),
		list = {probeType: 3,mouseWheel: true,click: true,scrollbars: false};
	$(document).ready(function() {
		init();
		returnBth();
		function init(){
			if(GetQueryString('cityName')){
				cityName = GetQueryString('cityName'); 
				headspan.html(cityName);
			}else{
				headspan.html('请选择城市');
			}
			
			myScroll = new IScroll('#mod-custom-boxs',list);
		}
		Search_btn.on(tapClick(),function(){
			if(btn_img.hasClass('Ig')){
				Search_menu.removeClass('Search_auto');
				btn_img.removeClass('Ig')
			}else{
				btn_img.addClass('Ig');
				Search_menu.addClass('Search_auto');
			}
			myScroll.refresh();
		})
		remove_Btn.on(tapClick(),function(){
			commoms.post_server('/Since/search_del',{},function(re){
				if(re.result == 'ok'){
					loaging.close();
					loaging.btn(re.data);
					sea_bigBox.remove();
					myScroll.refresh();
				}
			},function(){},false);
			
		})
		 function returnBth(){
	        $('.icon-back').on(tapClick(),function(){
	            $('input,textarea').blur();
	            var parentName=$(this).parents('div').attr('class');
	            if(parentName.indexOf('adds_selection')>-1){
	               addsection.hide();
	            }  
	        })
	    }     	
	})
	function checkSubmit(){
	        var result=false,
	       		$searchs=$('#searchs').val(),
	       		txt = GetQueryString('cityName');
	       		if(txt == '请选择城市'){
	       			loaging.prompts('请点击选择城市');
	       			return false;
	       		}
	       		if($searchs == '' || $searchs == null){
	       			loaging.prompts('请输入地址信息');
	       			return false;
	       		}
				$.ajax({
		            url: 'http://api.map.baidu.com/place/v2/search?query='+$searchs+'&page_size=15&page_num=0&scope=1&region='+txt+'&output=json&ak=wqBXfIN3HkpM1AHKWujjCdsi',
		            dataType: "jsonp",
		            beforeSend:function(){
                        loaging.init('加载中...');
                    },
		            success: function(t) {
		            	if(t.status == 0){
			            	loaging.close();
			            	var resut=t.results;
			            	if(!resut.length){
			            		loaging.prompts('未找到');
			            		return false;
			            	}
			            	var html="",address="";
			            	for(var k=0;k<resut.length;k++){
			            		if(resut[k].address == undefined){
			            			address="&nbsp;"
			            		}else{
			            			address=resut[k].address;
			            		}
			            		if(resut.length){
	                           var x = resut[k].location.lng
	                               y = resut[k].location.lat,
	                               code = $('#code').val();
				            		html+='<a href="/address/index?type=add&district='+resut[k].name+'&x='+x+'&y='+y+'&hiden=1&baidu_code='+code+'" class="listBoxa blocks">'
				            				+'<span class="span"><img src="/Public/image/icon-d.png" alt="" class="imgs" /></span>'
				            				+'<div class="div-item">'
				            					+'<span>'+resut[k].name+'</span>'
				            					+'<p>'+address+'</p>'
				            				+'</div>'
				            			+'</a>'
			            		}
			            	}
			               $('.scrollers').html(html);
			               myScroll.refresh();
		               }
		            },
		            error: function() {
		            	loaging.close();
		                loaging.btn('获取失败，请重新输入');
		            }
	        	})

	        	return result;
	    }
</script>	

</body>
</html>