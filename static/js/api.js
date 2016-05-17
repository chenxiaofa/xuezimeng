/**
 * Created by xiaofa on 2016/1/25.
 */
(
	function()
	{

		/**
		 * @param option
		 * @constructor
		 */
		var BatchAjaxRequest = function(option)
		{
			var bar_this = this;
			var c = console || {log:function(){},debug:function(){}};
			option = option || {};
			var _on_success = function(){c.log('_on_success');},
				_on_failed = function(){c.log('_on_failed');},
				_on_error = function(){c.log('_on_error');},
				_on_complete = function(){c.log('_on_complete');},
				_on_all_complete = function(){c.log('_on_all_complete');},
				_url = option['url'] || '',
				_method = option['method'] || 'GET' ,
				_req_data = [],
				_max_client = option['max_client'] || 1,
				_active = 0,
				_started = 0;
			c.log('BatchAjaxRequest:_url:%s',_url);
			bar_this.success = function(callback){callback && (_on_success = callback);return bar_this;};
			bar_this.failed = function(callback){callback && (_on_failed = callback);return bar_this;};
			bar_this.complete = function(callback){callback && (_on_complete = callback);return bar_this;};
			bar_this.all_complete = function(callback){callback && (_on_all_complete = callback);return bar_this;};
			bar_this.append_data = function(data)
			{
				data['url'] = data['url'] || _url;
				data['method'] = data['method'] || _method;
				c.log('BatchAjaxRequest:append_data(%o)',data);
				_req_data.push(data);
			};
			bar_this.prepend_data = function(data)
			{
				data['url'] = data['url'] || _url;
				data['method'] = data['method'] || _method;
				c.log('BatchAjaxRequest:prepend_data(%o)',data);
				_req_data.unshift(data);
			};


			bar_this.start = function()
			{
				c.log('start_was_called');
				if (_started)return;
				c.log('starting batch ajax request');
				_started = 1;
				_active = 0;
				for(var i = 0;i<_max_client;i++)
					bar_this.next();
			};

			bar_this.next = function()
			{
				c.debug('BatchAjaxRequest:next _req_data.length == %d && _active == %d',_req_data.length,_active);
				if (_req_data.length == 0)
				{
					if (_active == 0)
					{
						_on_all_complete.call(bar_this);
					}
					return;
				}
				_active++;
				do_ajax_request(_req_data.shift());
			};

			function do_ajax_request(data)
			{
				c.log('BatchAjaxRequest:do_ajax_request(%o)',data);
				AjaxRequest(
					{
						'url':data['url'],
						'url_parameter':data['url_parameter'] || {},
						'method':data['method'],
						'post_data':data['post_data'] || {},
						'index':data['index'] || '',
						'complete':function()
						{
							_on_complete.call(this);
							_active--;
							bar_this.next();
						},
						'success':_on_success,
						'failed':_on_failed
					}
				)
			}

		};

		var AjaxRequest = function(option)
		{
			var c = console || {log:function(){}};
			option = option || {};
			var default_option = {
				'url':'',
				'success':function(data){},
				'complete':function(){},
				'error':function(status,payload){},
				'method':'GET',
				'url_parameter':{},
				'post_data':{},
				'index':''
			};
			option = $.extend(default_option,option);

			var get_data = option.url_parameter;
			var url = option.url;
			var url_params = [];
			$.each(get_data,function(k,v){
				url_params.push(encodeURIComponent(k)+'='+encodeURIComponent(v));
			});
			if (url_params.length > 0)
			{
				url += '?'+url_params.join('&');
			}
			$.ajax(
				{
					'url':url,
					'type':option.method,
					'dataType':'json',
					'data':option.post_data,
					'headers':option.header,
					'success':function(data,status,xhr)
					{
						option.xhr = xhr;
						option.success.call(option,data);
					},
					'error':function(XHR,error,exception)
					{
						option.error.call(option,XHR.status,XHR.responseText);
					},
					'complete':function()
					{
						option.complete.call(option);
					}
				}
			);
		};

		var api = function(url,method,urlParam,payload,header)
		{
			var _self = this;
			if (header === undefined)
			{
				header = {};
			}
			this.reset = function()
			{
				header = {};
				urlParam = {};
				payload = {};
			};

			var onFailed = function(status,code,message){ };
			var onSuccess = function(data){ };
			var onComplete = function(){ };
			var onError = function(status,payload){ };
			var beforeSend = function(){ };
			this.setSuccessCallback = function(callback)
			{
				onSuccess = callback;
				return _self;
			};



			this.setFailedCallback = function(callback)
			{
				onFailed = callback;
				return _self;
			};

			this.setCompleteCallback = function(callback)
			{
				onComplete = callback;
				return _self;
			};

			this.setErrorCallback = function(callback)
			{
				onError = callback;
				return _self;
			};

			this.setBeforeSendCallback = function(callback)
			{
				beforeSend = callback;
				return _self;
			};

			this.setUrlParam = function(k,v)
			{
				urlParam[k] = v;
				return _self;
			};

			this.setHeader = function(k,v)
			{
				header[k] = v;
				return _self;
			};

			this.setPayload = function(k,v)
			{
				payload[k] = v;
				return _self;
			};
			this.xhr = null;

			/**
			 * 获取返回Header
			 * @param type
             * @returns {*}
             */
			this.getHeader = function(type)
			{
				if (this.xhr === null)
				{
					return null;
				}
				return this.xhr.getResponseHeader(type);
			};
			this.send = function(_m)
			{
				if (_m)
				{
					method = _m;
				}
				if ( beforeSend.call(_self) === false )
				{
					return;
				}
				new AjaxRequest(
					{
						'url':url,
						'method':method,
						'header':header,
						'success':function(data)
						{
							_self.xhr = this.xhr;
							return onSuccess.call(_self,data);
						},
						'error' : function(status , payload)
						{
							if (status === 422 || status === 423)
							{
								var resJson = {};
								try{
									resJson = $.parseJSON(payload);
								}catch(e){
									resJson = {
										'code':-1,
										'message':payload
									}
								}
								return onFailed.call(_self,status,resJson.code,resJson.message);
							}
							return onError.call(_self,status,payload);//TODO 增加错误处理
						},
						'complete' : function()
						{
							return onComplete.call(_self);
						},
						'url_parameter':urlParam,
						'post_data':payload
					}
				);
			};

		};
		var restApi = function(url)
		{
			var _api = new api(url,'',{},{},{});
			return  {
				'getList':function(page,size,condition,success,failed,error)
				{
					if (typeof failed === 'function')_api.setFailedCallback(failed);
					if (typeof error === 'function')_api.setFailedCallback(error);
					page && _api.setUrlParam('page',page);
					size && _api.setUrlParam('per-page',size);
					_api.setSuccessCallback(
						function(list)
						{
							var currPage = _api.getHeader('X-Pagination-Current-Page');
							var pageCount = _api.getHeader('X-Pagination-Page-Count');
							var perPage = _api.getHeader('X-Pagination-Per-Page');
							var totalCount = _api.getHeader('X-Pagination-Total-Count');
							if (typeof success === 'function')
							{
								success.call(_api,list,parseInt(currPage,10),parseInt(perPage,10),parseInt(pageCount,10),parseInt(totalCount,10));
							}
						}
					);
					$.each(condition,function(k,v){_api.setUrlParam(k,v)});
					_api.send('GET');
				}
			};
			//return rest;
		};
		window.Api = {
			'apiSignUp':function(account,password)
			{
				return new api('/api/account/sign-up','POST',{},{'account':account,'password':password});
			},
			'apiSignIn':function(account,password)
			{
				return new api('/api/account/sign-in','POST',{},{'account':account,'password':password});
			},
			'apiExamSave':function(waid,openid)
			{
				return new api('/api/exam/save','POST',{},{'waid':waid,'openid':openid});
			},
			'restApiExamSession':function()
			{
				return new restApi('/rest/exam-session');
			},
			'apiChangePassword':function(account,password,new_password,re_new_password)
			{
				return new api('/api/account/change-password','POST',{},{'account':account,'password':password,'new_password':new_password,'re_new_password':re_new_password});
			},
			'apiSignOut':function()
			{
				return new api('/api/account/sign-out','GET',{},{});
			}

		};
	}
)();