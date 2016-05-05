<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js" type="javascript" ></script>
<div class="weui_msg">
    <div class="weui_icon_area"><i class="weui_icon_success weui_icon_msg"></i></div>
    <div class="weui_text_area">
        <h2 class="weui_msg_title">感谢您的到访</h2>
        <p class="weui_msg_desc">我们的客服将尽快联系您，为您排忧解难。祝生活愉快，学习进步，如果有问题请咨询：<b>0797-5633693（傅老师）</b></p>
    </div>
    <div class="weui_opr_area">
        <p class="weui_btn_area">
            <a id="finish" href="javascript:;" class="weui_btn weui_btn_primary">确定</a>
        </p>
    </div>
</div>
<script>
    function init()
    {
        $('#finish').on('click',function(){
            if (typeof WeixinJSBridge !== 'undefined')
            {
                WeixinJSBridge.invoke('closeWindow',{},function(res){});
            }
        });
    }
    $(init);
</script>