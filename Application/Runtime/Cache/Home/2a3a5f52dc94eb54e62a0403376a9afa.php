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
    <script type="text/javascript" src="/Public/js/lib/fastclick.js"></script>
    <script type="text/javascript">
       window.addEventListener('load', function() {FastClick.attach(document.body);}, false);  
       document.addEventListener('touchmove', function (e) { e.preventDefault(); }, false);
    </script>
    <style type="text/css">
         ._scroll{
            background: #FFFFFF;
            line-height: 40px;
            clear: both;
            max-width: 550px;
            margin: 0 auto;
        }
         ._scroll li{
            border-bottom: 1px solid #ededed;
            font-size: 15px;
            width: 94%;
            margin: 0 auto;
        }
         ._scroll h2,.hot-city h2{
            background: #ececec;
            width: 100%;
            line-height: 25px;
            padding:0 3%;
            font-size:15px;
        }
    </style>
<body class="mod-addredit-add">
    <div id="mod-container" class="mod-container clearfix">
        <div id="mod-addredit" class="mod-addredit pageview">
            <form id="autocomplete-form" method="post" action="/Address/edit">
            <header class="pub-header bgss">
                <a class="tap-action icon icon-back" href="javascript:void(0);">
                </a>
                <div class="header-content ">
                    修改地址
                </div>
                <span class="header-right header-right-text">
                    <input type="button" class="btn2 blocks styleinput" value="保存"  readonly>
                </span>
            </header>
            <div class="main main-both addmain">
                <div class="content scrollers">                    
                        <ul class="edit-ul">
                            <li class="lis">
                                <span class="list_name">联系人</span>
                                <span class="addr-address">
                                    <input class="input addr-input-name" id="name" name="name" type="text" value=""
                                    placeholder="收货姓名">
                                </span>
                            </li>
                            <div class="hairline"></div>
                            <li class="lis">
                                <span class="list_name">手机号码</span>
                                <input id="autocomplete-phone" class="input addr-input-phone" name="mobile"
                                required="" type="tel" maxlength="11" value="" placeholder="收货时联系您的电话"
                                autocomplete="on">
                            </li>
                            <div class="hairline"></div>
                            <li class="lis" id="cityBtn">
                                <span class="list_name">所在城市</span>
                                <input class="addr-input-city" name="city" type="text"  readonly="readonly" value="" placeholder="请选择城市">
                                <span class="LogBtn"><img src="/Public/image/dingwei.png" alt=""></span>
                            </li>
                            <div class="hairline"></div>
                            <li class="ui-nowrap addr-city-address">
                                <span class="list_name">收货地区</span>
                                <div class="addr-city">
                                   <p class="searchBtn"><input type="text" name="district" class="read" readonly="readonly" placeholder="请选择您的住宅小区、大厦或学校" value=""></p>
                                   <div class="hairline"></div>
                                   <input type="text" name="address" class="house" id="address" placeholder="请输入楼号门牌号等详细信息" value="">
                                </div>
                            </li>
                        </ul>
                        <input type="hidden" name="lats" id="lats" value="" />
                        <input type="hidden" name="lngs" id="lngs" value="" />
                        <input type="hidden" name="city_baiducode" id="city_baiducode" value="" />
                        <input type="hidden" name="hide_cityname" id="hide_cityname" value="">
                        <input type="hidden" name="address_id" id="address_id" value="">
                        <div class="edit-submit">
                            <span class="Del">删除当前地址</span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="hideBoxs" id="hideBoxs">
        <div>
            <div id="_scroll" class="_scroll">
            <?php if(is_array($city_list_dat)): foreach($city_list_dat as $key=>$vo): ?><ul>
                    <h2><?php echo ($key); ?></h2>
                    <?php if(is_array($vo)): foreach($vo as $key=>$val): ?><li class="item" data-city="<?php echo ($val["city_id"]); ?>" baidu-code="<?php echo ($val["city_baiducode"]); ?>"><?php echo ($val["city_name"]); ?></li><?php endforeach; endif; ?>
                </ul><?php endforeach; endif; ?>
            </div>
        </div>
    </div>
    <div class="divs">A</div>
    <div class="shu">
        <?php if(is_array($city_list_dat)): foreach($city_list_dat as $key=>$vo): ?><p><?php echo ($key); ?></p><?php endforeach; endif; ?>
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
<script type="text/javascript">
    var myScroll,myScrol2,
    lists={preventDefault:false,probeType: 2,scrollbars: false,mouseWheel: true,fadeScrollbars: true,bounce: false,interactiveScrollbars: true,shrinkScrollbars: 'scale',click: true,momentum: true},
    showName=GetQueryString('name'),
    district=GetQueryString('district'),
    hide_lngs=GetQueryString('x'),
    hide_lats=GetQueryString('y'),
    hide_cityname=GetQueryString('cityname'),
    hide_cityCode=GetQueryString('cityCode'),
    address_id=GetQueryString('address_id'),
    address=GetQueryString('address'),
    name=GetQueryString('name'),
    mobile=GetQueryString('mobile'),
    atrr=[],
    floor=$(".shu p"),
    layout=$("._scroll ul"),
    dal_btn = $('.edit-submit .Del'),
    cityval = $('.addr-input-city'),
    seabtn = $('.searchBtn'),
    searchBtn = $('.searchBtn input'),
    $lats = $('#lats'),
    $lngs = $('#lngs'),
    hidecityname = $('#hide_cityname'),
    city_baiducode = $('#city_baiducode'),
    add_id = $('#address_id'),
    $address = $('#address'),
    $name = $('#name'),
    $auto_phone = $('#autocomplete-phone');
    for(var i=0; i<layout.length; i++){
     var  Top=layout.eq(i).offset().top-80;
     atrr.push(Top); 
    };
    $('.btn2').on(tapClick(),function(){
        $('input').blur();
        var phones = $('#autocomplete-phone').val(),
            myreg = /^1[3|4|5|7|8]\d{9}$/,
            names = $('.addr-input-name').val(),
            dels = $('.read').val();

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
      document.getElementById("autocomplete-form").submit();

    })
    $(document).ready(function() { 
        $('.mod-addredit').show();
        iscrollAll();
        clicks();
        getdatas();
        function getdatas(){
            cityval.val(hide_cityname);
            searchBtn.val(district);
            $lats.val(hide_lats);
            $lngs.val(hide_lngs);
            hidecityname.val(hide_cityname);
            city_baiducode.val(hide_cityCode);
            add_id.val(address_id);
            $address.val(address);
            $name.val(name);
            $auto_phone.val(mobile);
        }
        returnBth();
         function returnBth(){
            var icon_back = $('.icon-back');
            icon_back.on(tapClick(),function(){
                var parentName=$(this).parents('div').attr('class');
                if(parentName.indexOf('mod-addredit') > -1){
                     window.history.go(-1);
                }
            })
        }
        function clicks(){
            var $hideBoxs=$('.hideBoxs'),
                $addr_input=cityval,
                $addr_inputVal=$addr_input.val();
            $('.LogBtn').on(tapClick(),function(){
                var cityName=$addr_input.val();
                var address_id=add_id.val();
                var address=$address.val();
                var name=$name.val();
                var mobile=$auto_phone.val();
                location.href='/Address/edit_location.html?cityName='+cityName+'&address_id='+address_id+'&address='+address+'&name='+name+'&mobile='+mobile;
            })
            var transl = {'-webkit-transform':'translate3d(0,0,0)','transform':'translate3d(0,0,0)'},
                transl2 = {'-webkit-transform':'translate3d(0,100%,0)','transform':'translate3d(0,100%,0)'};
            cityval.on(tapClick(),function(){
                $hideBoxs.css(transl);
                $('.shu,.divs').show();
            })
            $('._scroll .item').on(tapClick(),function(){
                var txt=$(this).text();
                $hideBoxs.css(transl2);
                $('.shu,.divs').hide();
                $addr_input.val(txt);
                $baiducode=$(this).attr('baidu-code');
                city_baiducode.val($baiducode);
            })
            seabtn.on(tapClick(),function(){           
                if($addr_input.val() == '' || $addr_input.val() == null){
                   loaging.prompts('请选择城市');
                    return false;
                }
                var cityName=$addr_input.val();
                var cityCode=city_baiducode.val();
                var address_id=add_id.val();
                var address=$address.val();
                var name=$name.val();
                var mobile=$auto_phone.val();
                location.href='/Address/edit_custom.html?cityName='+cityName+'&cityCode='+cityCode+'&address_id='+address_id+'&address='+address+'&name='+name+'&mobile='+mobile;
            })  
            //点击删除
            dal_btn.on(tapClick(),function(){
                var dataId=address_id;
                var index=$(this).parents('li').index();
                var index2=layer.open({
                        content:'<div class="box-mask-html"><h2 style="color:#000000">确定删除改地址</h2></div>',
                        style: 'width:100%;border:none;text-align:center;color:#4DB4F9;font-size:16px;',
                        shadeClose: false,
                        btn: ['确定','取消'],
                        yes: function(){
                            layer.close(index2);
                            /*删除事件*/
                            commoms.post_server('/Address/del',{id:dataId},function(result){
                                if(result.result == 'ok'){
                                    layer.closeAll();
                                    $('.shipping-adds_list .list_item').eq(index).remove();
                                    location.href="/Address/index";
                                }else{
                                    layer.close(index2);
                                    loaging.btn('删除失败!');
                                }
                            },function(){
                                loaging.closeAll();
                            },false);
                        }
                })
            })          
        }
        function iscrollAll(){
                myScroll = new IScroll('#hideBoxs', lists);
                myScroll.on('scroll',Starts);
                myScroll.on('scrollEnd',function () {
                });
                function Starts() {
                    for(var j=0; j<atrr.length; j++){
                        var k=-(atrr[j]-atrr[0]-10);
                         if( this.y <= k){                             
                            $('.divs').html(floor.eq(j).text());
                         };
                     };         
                }
            }
            $(".shu p").bind('click',function(){
                var index=$(this).index();
                 var num2=-((atrr[index])-atrr[0]);
                 $('.divs').html(floor.eq(index).text());
                 myScroll.scrollTo(0,num2,0);
            });

        
    })
</script>
</body>
</html>