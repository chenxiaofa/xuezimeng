<div class="row">
    <div class="col-md-12">
        <form class="form-horizontal">
            <div class="tabbable">
                <ul class="nav nav-tabs padding-16">
                    <li class="active">
                        <a data-toggle="tab" href="#edit-password">
                            <i class="blue icon-key bigger-125"></i>
                            密码
                        </a>
                    </li>
                </ul>

                <div class="tab-content profile-edit-tab-content">

                    <div id="edit-password" class="tab-pane active">
                        <div class="space-10"></div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-pass1">旧密码</label>

                            <div class="col-sm-9">
                                <input type="password" id="password">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-pass1">新密码</label>

                            <div class="col-sm-9">
                                <input type="password" id="new_password">
                            </div>
                        </div>

                        <div class="space-4"></div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-pass2">确认密码</label>

                            <div class="col-sm-9">
                                <input type="password" id="re_new_password">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="clearfix form-actions">
                <div class="col-md-offset-3 col-md-9">
                    <button class="btn btn-info" id="change-password" type="button">
                        <i class="icon-ok bigger-110"></i>
                        保存
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
<script src="/static/js/bootbox.min.js"></script>
<script>
    (function(){
        var changePasswordFunction = function()
        {
            $('#change-password').on(
                'click',
                function()
                {
                    var account = '<?php echo \Yii::$app->user->identity->username;?>';
                    var password = $('#password');
                    var new_password = $('#new_password');
                    var re_new_password = $('#re_new_password');
                    Api.apiChangePassword(account,password,new_password,re_new_password)
                        //.send();
                }
            )
        };
        $(changePasswordFunction());
    })()
</script>