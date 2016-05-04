<div id="signup-box" class="signup-box visible widget-box no-border">
	<div class="widget-body">
		<div class="widget-main">
			<h4 class="header green lighter bigger">
				<i class="icon-group blue"></i>
				New User Registration
			</h4>
			<div class="space-6"></div>
			<p> Enter your details to begin: </p>
			<form>
				<fieldset>
					<label class="block clearfix">
						<span class="block input-icon input-icon-right">
							<input type="email" id="email" class="form-control"
								   placeholder="Email"/>
							<i class="icon-envelope"></i>
						</span>
					</label>
					<label class="block clearfix">
						<span class="block input-icon input-icon-right"> 
							<input type="text" id="username" class="form-control"
								   placeholder="Username"/>
							<i class="icon-user"></i>
						</span>
					</label>
					<label class="block clearfix">
						<span class="block input-icon input-icon-right">
							<input type="password" id="password" class="form-control"
								   placeholder="Password"/>
							<i class="icon-lock"></i>
						</span>
					</label>
					<label class="block clearfix">
						<span class="block input-icon input-icon-right">
							<input type="password" id="re-password" class="form-control"
								   placeholder="Repeat password"/>
							<i class="icon-retweet"></i>
						</span>
					</label>
					<div class="space-24"></div>
					<div class="clearfix">
						<button type="reset" class="width-30 pull-left btn btn-sm">
							<i class="icon-refresh"></i>
							Reset
						</button>
						<button type="button" id="btn-register"
								class="width-65 pull-right btn btn-sm btn-success">
							Register
							<i class="icon-arrow-right icon-on-right"></i>
						</button>
					</div>
				</fieldset>
			</form>
			<div class="alert alert-danger" id="error-display" style="display: none;">
				<strong>
					<i class="icon-remove"></i>
					Oh!
				</strong>
				<span id="error-text"></span>
				<br>
			</div>
		</div>
	</div><!-- /widget-body -->
</div><!-- /signup-box -->
<script>
	$(
			function()
			{
				function onFailed(status,code,message)
				{
					$('#error-display').show();
					$('#error-text').html(message);
				}
				function onSuccess(data)
				{
					//window.location.href = '/';
				}
				function onError(status,payload)
				{
					$('#error-display').show();
					$('#error-text').html(payload);
				}
				function onComplete()
				{

				}
				function beforeSend()
				{
					$('#error-display').hide();
				}
				function submit()
				{
					Api.apiSignIn()
							.setSuccessCallback(onSuccess)
							.setFailedCallback(onFailed)
							.setCompleteCallback(onComplete)
							.setBeforeSendCallback(beforeSend)
							.setErrorCallback(onError)
							.setPayload('email',$('#email').val())
							.setPayload('password',$('#password').val())
							.setPayload('re-password',$('#re-password').val())
							.setPayload('username',$('#username').val())
							.send();
				}

				$('#btn-register').on('click',submit);

			}
	);
</script>