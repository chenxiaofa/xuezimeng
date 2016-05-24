
<header id="head" class="secondary">
    <div class="container">
        <h1>联系我们</h1>
    </div>
</header>

<section class="location">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h3>我们的位置</h3>
                <br>
            </div>
            <div class="col-md-8">
                <iframe width="100%" height="600px"  src="http://3gimg.qq.com/lightmap/v1/marker/?type=0&marker=coord%3A25.599904,115.800952%3Btitle%3A%E8%B5%A3%E5%B7%9E%E5%AD%A6%E5%AD%90%E6%A2%A6%E5%9F%B9%E8%AE%AD%3Baddr%3A%E6%B1%9F%E8%A5%BF%E7%9C%81%E8%B5%A3%E5%B7%9E%E5%B8%82%E4%BC%9A%E6%98%8C%E5%8E%BF%E7%BA%A2%E6%97%97%E5%A4%A7%E9%81%93326%E5%8F%B7&key=OB4BZ-D4W3U-B7VVO-4PJWW-6TKDJ-WPB77&referer=myapp">

                </iframe>
            </div>
            <div class="col-md-4">
                <div class="contact-info">
                    <h5>地址</h5>
                    <p>江西省赣州市会昌县红旗大道326号</p>
                    <h5>联系电话</h5>
                    <p><?php echo \Yii::$app->params['contact_phone'];?></p>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3 class="section-title">给我们留言</h3>
            <p>
                你或你的孩子有什么学习上的困难,欢迎大家给我们留言,学子梦培训将竭尽全力为你服务.
            </p>


            <form name="sentMessage" id="contactForm" onsubmit="return false;">
                <div class="control-group">
                    <div class="controls">
                        <input type="text" class="form-control" placeholder="姓名" id="name" >
                        <p class="help-block"></p>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <input type="text" class="form-control" placeholder="电话" id="phone" >
                        <p class="help-block"></p>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <input type="email" class="form-control" placeholder="QQ" id="qq" >
                        <p class="help-block"></p>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <textarea rows="10" cols="100" class="form-control" id="message"  style="resize:none"></textarea>
                    </div>
                </div>
                <div id="success"> </div> <!-- For success/fail messages -->
                <button class="btn btn-primary pull-right" id="js-submit">提交</button><br>
            </form>
        </div>

    </div>
</div>
<script>window.$ = window.jQuery;</script>
<script src="/static/js/api.js"></script>
<script>
    jQuery('#js-submit').on(
        'click',
        function()
        {
            var name = $('#name').val();
            var phone = $('#phone').val();
            var qq = $('#qq').val();
            var message = $('#message').val();

            if (phone.length == 0 && qq.length == 0)
            {
                alert('请至少留下QQ号码、微信号或者手机号码,方便跟进你的情况','完善信息');
                return;
            }

            if (message.length == 0)
            {
                alert('请填写留言');
                return;
            }


            Api.apiExamSave()
                .setSuccessCallback(
                    function()
                    {
                        alert('提交成功');
                    }
                )
                .setPayload('name',name)
                .setPayload('phone',phone)
                .setPayload('qq',qq)
                .setPayload('message',message)
                .send();
            return false;
        }
    )
</script>

