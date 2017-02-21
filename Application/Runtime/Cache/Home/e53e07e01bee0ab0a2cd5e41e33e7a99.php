<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <title>哈哈镜便捷购</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="format-detection" content="telephone=no">
  <!--<script type=text/javascript>//var docElement = document.documentElement;var clientWidthValue = docElement.clientWidth > 480 ? 480 : docElement.clientWidth;docElement.style.fontSize = 10*(clientWidthValue/320) + 'px';</script>-->
<script>(function(){var calc = function(){var docElement = document.documentElement;var clientWidthValue = docElement.clientWidth > 480 ? 480 : docElement.clientWidth;docElement.style.fontSize = 10*(clientWidthValue/320) + 'px';};calc();window.addEventListener('resize',calc);})();</script> <link rel="stylesheet" href="/Public/css/style.css"><script type="text/javascript" src="/Public/js/layer.m/layer.m.js"></script><script type="text/javascript" src="/Public/js/lib/fastclick.js"></script>
    <style type="text/css">
        body,html,.mod-nav-div{width:100%;height:100%;overflow: hidden;}.mod-nav,.boxs{width: 100%;height:100%;}#l-map{width: 100%;height:100%;margin:0;font-family:"微软雅黑";}
    </style>
    <style type="text/css">
   html,body{margin:0;padding:0;}
   .iw_poi_title {color:#CC5522;font-size:14px;font-weight:bold;overflow:hidden;padding-right:13px;white-space:nowrap}
   .iw_poi_content {font:12px arial,sans-serif;overflow:visible;padding-top:4px;white-space:-moz-pre-wrap;word-wrap:break-word}
</style>
<script type="text/javascript" src="http://api.map.baidu.com/api?key=&v=1.1&services=true"></script>




</head>
<body>
<div id="mod-container" class="mod-container mod-navs clearfix">
        <div id="mod-nav" class="mod-nav " >
             <header class="pub-header">
	            <a class="tap-action icon icon-back" href="javascript:history.go(-1)"></a>
	            <div class="mod-navs">
	            	<ul class="mod-nav-uls">
                    <li class="navsbg">驾车</li>
                    <li>公交</li>
                    <li>走路</li>
                </ul>
	            </div>
	            <span class="header-right header-right-text"></span>
	        </header>
	        <div class="boxs">
	        	<div id="l-map"></div>
	        </div>
        </div>
</div>
<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=wqBXfIN3HkpM1AHKWujjCdsi"></script> 
<script type="text/javascript" src="http://api.map.baidu.com/library/AreaRestriction/1.2/src/AreaRestriction_min.js"></script>
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
    var user=GetQueryString('user'),
        shop=GetQueryString('shop'),
        user_x=GetQueryString('user_x'),
        user_y=GetQueryString('user_y'),
        shop_x=GetQueryString('shop_x'),
        shop_y=GetQueryString('shop_y'),
        lis = $('.mod-nav-uls li');
        loaging.init('加载中...');
   //$(function(){
            /*loaging.close();








            //3、调用百度地图

            var map = new BMap.Map("l-map"); // 创建地图实例

            var point = new BMap.Point(111.818239, 41.386087); // 创建点坐标

            map.centerAndZoom(point, 5); // 初始化地图，设置中心点坐标和地图级别

            map.enableScrollWheelZoom();

            map.addControl(new BMap.NavigationControl()); //添加默认缩放平移控件

            //4、添加缩放平移控件

            map.addControl(new BMap.NavigationControl()); //添加默认缩放平移控件

            map.addControl(new BMap.NavigationControl({anchor: BMAP_ANCHOR_TOP_RIGHT, type: BMAP_NAVIGATION_CONTROL_SMALL})); //右上角，仅包含平移和缩放按钮

            map.addControl(new BMap.NavigationControl({anchor: BMAP_ANCHOR_BOTTOM_LEFT, type: BMAP_NAVIGATION_CONTROL_PAN})); //左下角，仅包含平移按钮

            map.addControl(new BMap.NavigationControl({anchor: BMAP_ANCHOR_BOTTOM_RIGHT, type: BMAP_NAVIGATION_CONTROL_ZOOM})); //右下角，仅包含缩放按钮

            map.enableScrollWheelZoom(); //启用滚轮放大缩小，默认禁用

            map.enableContinuousZoom(); //启用地图惯性拖拽，默认禁用

            //5、区域限制必须引入上面的区域限制js
            //区域限制例子是只显示北京市

            var b = new BMap.Bounds(new BMap.Point(116.027143, 39.772348),

            new BMap.Point(116.832025, 40.126349));

            try {

            BMapLib.AreaRestriction.setBounds(map, b);

            } catch (e) {

            alert(e);

            }

            //6、添加覆盖物，计时器调用覆盖物

            //添加覆盖物

            function getBoundary(){

            var bdary = new BMap.Boundary();

            bdary.get("内蒙古", function(rs){ //获取行政区域

            var count = rs.boundaries.length; //行政区域的点有多少个

            for(var i = 0; i < count; i++){

            var ply = new BMap.Polygon(rs.boundaries[i], {strokeWeight: 2, strokeColor: "#0000ff" ,fillColor: ""}); //建立多边形覆盖物 fillColor 字体显示出来

            map.addOverlay(ply); //添加覆盖物

            map.setViewport(ply.getPath()); //调整视野

            }

            });

            }

            //计时器调用添加覆盖物

            setTimeout(function(){

            //清除地图覆盖物

            map.clearOverlays();

            map.centerAndZoom(111.818239, 41.386087, 6); // 设置地图坐标，级别

            //添加行政区域覆盖

            getBoundary();

            }, 1000);

            //7、添加标注

            //point经纬度，txtinfo提示信息，type图片类型

            function addMarker(point, txtInfo, type) {

            var infoWindow = "";

            var marker = new BMap.Marker(point, { icon: mapIcon(type) });

            marker.addEventListener("click", function() {

            infoWindow = new BMap.InfoWindow(txtInfo);

            this.openInfoWindow(infoWindow);

            });

            map.addOverlay(marker); //添加标注

            }

            //创建ICON

            function mapIcon(type) {

            var mappng;

            switch (parseInt(type)) {

            case 1:

            mappng = "${pageContext.request.contextPath}/images/triangle.png";

            break;

            case 2:

            mappng = "${pageContext.request.contextPath}/images/ban.png";

            break;

            }

            var mapIcon = new BMap.Icon(mappng,

            new BMap.Size(24, 24), {

            offset: new BMap.Size(0, -5),

            imageOffset: new BMap.Size(0, 0)

            });

            return mapIcon;

            }

            //8、移除标注





*/








/*     //创建和初始化地图函数：
   function initMap(){
       createMap();//创建地图
       setMapEvent();//设置地图事件
       addMapControl();//向地图添加控件
       addMarker();//向地图中添加marker
   }
   
   //创建地图函数：
   function createMap(){
       var map = new BMap.Map("l-map");//在百度地图容器中创建一个地图
       var point = new BMap.Point(115.949652,28.693851);//定义一个中心点坐标
       map.centerAndZoom(point,18);//设定地图的中心点和坐标并将地图显示在地图容器中
       window.map = map;//将map变量存储在全局
   }
   
   //地图事件设置函数：
   function setMapEvent(){
       map.enableDragging();//启用地图拖拽事件，默认启用(可不写)
       map.enableScrollWheelZoom();//启用地图滚轮放大缩小
       map.enableDoubleClickZoom();//启用鼠标双击放大，默认启用(可不写)
       map.enableKeyboard();//启用键盘上下左右键移动地图
   }
   
   //地图控件添加函数：
   function addMapControl(){
       //向地图中添加缩放控件
var ctrl_nav = new BMap.NavigationControl({anchor:BMAP_ANCHOR_TOP_LEFT,type:BMAP_NAVIGATION_CONTROL_LARGE});
map.addControl(ctrl_nav);
       //向地图中添加缩略图控件
var ctrl_ove = new BMap.OverviewMapControl({anchor:BMAP_ANCHOR_BOTTOM_RIGHT,isOpen:1});
map.addControl(ctrl_ove);
       //向地图中添加比例尺控件
var ctrl_sca = new BMap.ScaleControl({anchor:BMAP_ANCHOR_BOTTOM_LEFT});
map.addControl(ctrl_sca);
   }
   
   //标注点数组
   var markerArr = [{title:"百恒网络",content:"电话：0791-88117053<br/>手机：15079002975",point:"115.950312|28.693447",isOpen:1,icon:{w:23,h:25,l:46,t:21,x:9,lb:12}}
  ];
   //创建marker
   function addMarker(){
       for(var i=0;i<markerArr.length;i++){
           var json = markerArr[i];
           var p0 = json.point.split("|")[0];
           var p1 = json.point.split("|")[1];
           var point = new BMap.Point(p0,p1);
  var iconImg = createIcon(json.icon);
           var marker = new BMap.Marker(point,{icon:iconImg});
  var iw = createInfoWindow(i);
  var label = new BMap.Label(json.title,{"offset":new BMap.Size(json.icon.lb-json.icon.x+10,-20)});
  marker.setLabel(label);
           map.addOverlay(marker);
           label.setStyle({
                       borderColor:"#00f",
                       color:"#333",
                       cursor:"pointer"
           });
  
  (function(){
   var index = i;
   var _iw = createInfoWindow(i);
   var _marker = marker;
   _marker.addEventListener("click",function(){
       this.openInfoWindow(_iw);
      });
      _iw.addEventListener("open",function(){
       _marker.getLabel().hide();
      })
      _iw.addEventListener("close",function(){
       _marker.getLabel().show();
      })
   label.addEventListener("click",function(){
       _marker.openInfoWindow(_iw);
      })
   if(!!json.isOpen){
    label.hide();
    _marker.openInfoWindow(_iw);
   }
  })()
       }
   }
   //创建InfoWindow
   function createInfoWindow(i){
       var json = markerArr[i];
       var iw = new BMap.InfoWindow("<b class='iw_poi_title' title='" + json.title + "'>" + json.title + "</b><div class='iw_poi_content'>"+json.content+"</div>");
       return iw;
   }
   //创建一个Icon
   function createIcon(json){
       var icon = new BMap.Icon("http://map.baidu.com/image/us_cursor.gif", new BMap.Size(json.w,json.h),{imageOffset: new BMap.Size(-json.l,-json.t),infoWindowOffset:new BMap.Size(json.lb+5,1),offset:new BMap.Size(json.x,json.h)})
       return icon;
   }
   
   initMap();//创建和初始化地图*/

    

        /* var a=116.43689459808,
            b=39.946383953647,   
            map = new BMap.Map("l-map"),
            starts = user+'|'+user_y+','+user_y_x,
            ends = shop+'|'+shop_y+','+shop_x;   
            map.centerAndZoom('北京', 15);
            lis.click(function(){
                var index=$(this).index();
                $(this).addClass('navsbg').siblings().removeClass('navsbg');
                if(index == 0){
                    ones();
                }else if(index == 1){
                    twos();
                    loaging.init('加载中...');
                }else if(index == 2){
                    threes();
                    loaging.init('加载中...');
                }
                map.clearOverlays();
            })
            lis.eq(0).click();
            function ones(){
                if(user && shop){
                    $.ajax({
                        url: 'http://api.map.baidu.com/direction/v1?mode=driving&origin='+starts+'&destination='+ends+'&origin_region=北京&destination_region=北京&output=json&ak=wqBXfIN3HkpM1AHKWujjCdsi',
                        type: 'GET',
                        dataType: 'jsonp',
                        success:function(re){
                          loaging.close();
                          if(re.status == 0){
                            var datas = re.result.routes[0].steps;
                              getlines(datas);
                          }
                        },
                        error:function(){
                          loaging.close();
                          loaging.btn('失败');
                        }
                    })  
                }
              
            }
            function twos(){
                var url='http://api.map.baidu.com/direction/v1?mode=transit&origin='+starts+'&destination='+ends+'&origin_region=北京&destination_region=北京&output=json&ak=wqBXfIN3HkpM1AHKWujjCdsi'
                $.ajax({
                    url: url,
                    type: 'GET',
                    dataType: 'jsonp',
                    success:function(re){
                        var datas = re.result.routes[0].scheme[0].steps,
                            ars = [];
                        if(datas.length){
                            for(var k=0;k<datas.length;k++){
                              ars.push(datas[k][0])
                            }
                        } 
                       getlines(ars);
                    },
                    error:function(){
                        loaging.close();
                    }
                })
            }
            function threes(){
                var url='http://api.map.baidu.com/direction/v1?mode=walking&origin='+starts+'&destination='+ends+'&region=北京&output=json&ak=wqBXfIN3HkpM1AHKWujjCdsi'
                $.ajax({
                    url: url,
                    type: 'GET',
                    dataType: 'jsonp',
                    success:function(re){
                        console.log(re);
                        var datas = re.result.routes[0].steps;
                        getlines(datas);
                    },
                    error:function(){
                        loaging.close();
                        loaging.btn('失败');
                    }
                })

            }
        function getlines(data){
            var arrs = [];
            if(data.length){
                for(var k=0;k<data.length;k++){
                    var stepLoa = data[k].stepOriginLocation;
                    arrs.push(new BMap.Point(stepLoa.lng,stepLoa.lat));
                }
            } 
            loaging.close();
            var polyline = new BMap.Polyline(arrs,{strokeColor:"blue", strokeWeight:4, strokeOpacity:0.5});    
                map.addOverlay(polyline);   

        }*/
   // });
/*$(document).ready(function () {
//用正则表达式获取url传递的地址参数，split后获得地址数组
var bmap = new BMap.Map('l-map');
var point = new BMap.Point(116.404, 39.915);//地图中心点
bmap.centerAndZoom(point, 15);//调整缩放以及设立中心点
bmap.enableScrollWheelZoom();
var locations = ["天安门", "北京邮电大学", "地坛公园", "北京师范大学"];
var i = 0;
var points=[];//保存目标点用于调整viewport
var driving = new BMap.DrivingRoute(bmap, {
policy : BMAP_DRIVING_POLICY_LEAST_TIME,
onSearchComplete : function (results) {

var path = results.getPlan(0).getRoute(0).getPath();
var pathpoly = new BMap.Polyline(path, {
    strokeColor : "blue",
    strokeWeight : 4,
    strokeOpacity : 0.5
    });





if (i === 0) {
    console.log('起点' + results.getStart());
    var start = new BMap.Marker(results.getStart().point);
    start.setTitle('起点：' + results.getStart().title);
    bmap.addOverlay(start);
    points.push(results.getStart().point);
}
    var marker = new BMap.Marker(results.getEnd().point);
    points.push(results.getEnd().point);


    marker.setTitle('经过点' + (i + 1) + '：' + results.getEnd().title);
    bmap.addOverlay(pathpoly);
    bmap.addOverlay(marker);



    i++;






    if (i < locations.length - 1) {
        setTimeout(driving.search(locations[i], locations[i + 1]), 10000);//调用后面的路径
    } 
bmap.setViewport(points);
    } 

});

console.log(locations[0]);
console.log(locations[1]);
driving.search(locations[0], locations[1]);//调用第一条路径


});
*/


</script>
<script type="text/javascript">
    var user=GetQueryString('user'),
        shop=GetQueryString('shop'),
        user_x=GetQueryString('user_x'),
        user_y=GetQueryString('user_y'),
        shop_x=GetQueryString('shop_x'),
        shop_y=GetQueryString('shop_y'),
        lis = $('.mod-nav-uls li');
        loaging.init('加载中...');
    $(function(){
        //http://192.168.0.166:9002/shop/navigation?user=%E5%8C%97%E4%BA%AC%E5%B8%82%E4%B8%9C%E5%9F%8E%E5%8C%BA%E4%B8%AD%E5%8D%8E%E8%B7%AF%E7%94%B210%E5%8F%B7&shop=%E5%8C%97%E4%BA%AC%E5%B8%82%E4%B8%9C%E5%9F%8E%E5%8C%BA%E4%B8%9C%E4%B8%AD%E8%A1%9744%E5%8F%B7%E6%A5%BC%E5%BA%95%E5%95%86&user_x=116.40387396999994&user_y=39.91488915704603&shop_x=116.443623000000&shop_y=39.941529000000
        var a=116.43689459808,
            b=39.946383953647,   
            map = new BMap.Map("l-map"),
            starts = user+'|'+user_y+','+user_x,
            ends = shop+'|'+shop_y+','+shop_x;   
            map.centerAndZoom('北京', 13);
            lis.click(function(){
                var index=$(this).index();
                $(this).addClass('navsbg').siblings().removeClass('navsbg');
                if(index == 0){
                    ones();
                }else if(index == 1){
                    twos();
                    loaging.init('加载中...');
                }else if(index == 2){
                    threes();
                    loaging.init('加载中...');
                }
                map.clearOverlays();
            })
            lis.eq(0).click();
            function ones(){
                if(user && shop){
                    $.ajax({
                        url: 'http://api.map.baidu.com/direction/v1?mode=driving&origin='+starts+'&destination='+ends+'&origin_region=北京&destination_region=北京&output=json&ak=wqBXfIN3HkpM1AHKWujjCdsi',
                        type: 'GET',
                        dataType: 'jsonp',
                        success:function(re){
                          loaging.close();
                          if(re.status == 0){
                            var datas = re.result.routes[0].steps;
                              getlines(datas);
                          }
                        },
                        error:function(){
                          loaging.close();
                          loaging.btn('失败');
                        }
                    })  
                }
              
            }
            function twos(){
                var url='http://api.map.baidu.com/direction/v1?mode=transit&origin='+starts+'&destination='+ends+'&origin_region=北京&destination_region=北京&output=json&ak=wqBXfIN3HkpM1AHKWujjCdsi'
                $.ajax({
                    url: url,
                    type: 'GET',
                    dataType: 'jsonp',
                    success:function(re){
                        var datas = re.result.routes[0].scheme[0].steps,
                            ars = [];
                        if(datas.length){
                            for(var k=0;k<datas.length;k++){
                              ars.push(datas[k][0])
                            }
                        } 
                         getlines(ars);
                    },
                    error:function(){
                        loaging.close();
                    }
                })
            }
            function threes(){
                var url='http://api.map.baidu.com/direction/v1?mode=walking&origin='+starts+'&destination='+ends+'&region=北京&output=json&ak=wqBXfIN3HkpM1AHKWujjCdsi'
                $.ajax({
                    url: url,
                    type: 'GET',
                    dataType: 'jsonp',
                    success:function(re){
                        console.log(re);

                        var datas = re.result.routes[0].steps;
                        getlines(datas);
                    },
                    error:function(){
                        loaging.close();
                        loaging.btn('失败');
                    }
                })

            }
        function getlines(data){
          console.log(data);
            var arrs = [];
            if(data.length){
                for(var k=0;k<data.length;k++){
                    var stepLoa = data[k].stepOriginLocation;
                    arrs.push(new BMap.Point(stepLoa.lng,stepLoa.lat));
                }



                
            } 
            loaging.close();
            var polyline = new BMap.Polyline(arrs,{strokeColor:"blue", strokeWeight:4, strokeOpacity:0.5});    
                map.addOverlay(polyline);  


                //https://code.csdn.net/snippets/1868570#snippets1868570

                  /*function addMarker(point){
                    var marker = new BMap.Marker(point);
                    map.addOverlay(marker);
                  }
                  var hotelInfo = [{location:[[user_x],[user_y]]},{location:[[shop_x],[shop_y]]}];
                    for (var i = 0; i < hotelInfo.length; i++) {
                      var point = new BMap.Point(hotelInfo[i].location[0],hotelInfo[i].location[1]);
                      console.log(hotelInfo[i].location[0],hotelInfo[i].location[1]);
                      addMarker(point);
                  }*/
        


        }
    });
</script>
</body>

</html>