<div id="login-box" class="login-box visible widget-box no-border">
	<div class="widget-body">
		<div class="widget-main">
			<h4 class="header blue lighter bigger">
				<i class="icon-coffee green"></i>
				Please Enter Your Information
			</h4>

			<div class="space-6"></div>

			<form>
				<fieldset>
					<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="text" class="form-control" id="account"
																   placeholder="Username\Email\Mobile"/>
															<i class="icon-user"></i>
														</span>
					</label>

					<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="password" class="form-control" id="password"
																   placeholder="Password"/>
															<i class="icon-lock"></i>
														</span>
					</label>

					<div class="space"></div>

					<div class="clearfix">
						<label class="inline">
							<input type="checkbox" class="ace" id="remember" checked />
							<span class="lbl"> Remember Me</span>
						</label>

						<button type="button" id="submit"
								class="width-35 pull-right btn btn-sm btn-primary">
							<i class="icon-key"></i>
							Login
						</button>
					</div>

					<div class="space-4"></div>
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

		</div><!-- /widget-main -->

	</div><!-- /widget-body -->
</div><!-- /login-box -->
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
					window.location.href = '/';
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
					Api.apiSignUp()
						.setSuccessCallback(onSuccess)
						.setFailedCallback(onFailed)
						.setCompleteCallback(onComplete)
						.setBeforeSendCallback(beforeSend)
						.setErrorCallback(onError)
						.setPayload('account',$('#account').val())
						.setPayload('password',$('#password').val())
						.setPayload('remember',$('#remember').is(':checked')?1:0)
						.send();
				}

				$('#submit').on('click',submit);

			}
	);
</script>