$(function(){

	/***发布话题**/
	$('.fabu_btn').click(function(){
		var title = $('.title').val();
		var gid = $('.gid').val();
		var content = $('.content').val();
		
		$.ajax({
		   type: "POST",
		   url: addHuati,
		   data: "title="+title+"&gid="+gid+"&content="+content,
		   success: function(msg){
		   	window.location.href=direcUrl+'/gid/'+gid;
		      
	   	}
		});


	});


	/***点赞功能的实现**/
	$('.zan_a').click(function(){
		var hid = $(this).attr('hid');
		alert($('.zan_z').html())
		$.ajax({
		   type: "POST",
		   url: dianZan,
		   data:'hid='+hid,
		   success: function(msg){
		   	   if(msg){
		   	   	  
		   	   }  
			}
		});
	});



	$('a[rel*=leanModal]').leanModal({ top :100, closeButton: ".modal_close" });

	$('a[rel*=leanModal]').leanModal();
	$('.dir_reg').click(function(){
		$('.user_login').slideUp('fast');
		$('.user_reg').slideDown('fast');

	});

	$('.dir_login').click(function(){
		$('.user_reg').slideUp('fast');
		$('.user_login').slideDown('fast');

	});


	omask = '<div class="mask"></div>';

	/***表单验证**/
	$('#form_reg').validate({
		debug : true,
		submitHandler : function (form) {
			$(form).ajaxSubmit({
				url : regUrl,
				type:'POST',
				beforeSubmit : function (formData, jqForm, options) {
					$('#reg_submit').val('注册中...');
					$('body').append(omask);
				},
				success : function (responseText,statusText){
					if(responseText){
				/*		$('.mask').remove();
						$('#login').hide();
						$('#lean_overlay').hide();*/
						window.location.href = direcUrl+'/gid/'+gid;
						$('#form_reg').resetForm();
						$('.user_reg').hide();
						$('.user_login').show();
						$('#reg_submit').val('注册');
					}
				}
			});

		},
		errorElement : 'span',
		rules : {
			email :{
				required: true,
				email:true,
				remote : {
					url : checkEmail,
					type : 'POST'
				},				
			},
			nicheng:{
				required:true,
				remote : {
					url : checkNicheng,
					type : 'POST'
				},	
			},
			password:{
				required:true,
				rangelength:[5,16]
			},
			repass:{
				required:true,
				equalTo:'#password'
			}
		},
		messages :{
			email :{
				required:'请输入邮箱!',
				email:'邮箱格式不正确!',
				remote :'该邮箱已被注册'
			},
			nicheng:{
				required:'请输入昵称!',
				remote:'该昵称已被占用'
			},
			password:{
				required:'请输入密码!',
				rangelength:'密码长度在5~16位之间!'				
			},
			repass:{
				required:'请确认密码!',
				equalTo:'无法与你的密码匹配!'
			}
		}


	});

	$('#form_login').validate({
		debug : true,
		submitHandler : function (form) {
			$(form).ajaxSubmit({
				url : loginUrl,
				type:'POST',
				beforeSubmit : function (formData, jqForm, options) {
					$('body').append(omask);
				},
				success : function (responseText,statusText){
					if(responseText){
					/*	$('.mask').remove();
						$('#login').hide();
						$('#lean_overlay').hide();*/
						window.location.href = direcUrl+'/gid/'+gid;
						$('#form_login').resetForm();
					}
				}
			});

		},
		errorElement : 'span',
		rules : {
			password:{
				required:true,
				remote : {
					url : checkUser,
					type : 'POST',
					data : {
						email : function () {
							return $('#login_email').val();
						},
					},
				},
			}
		},
		messages :{

			password:{
				required:'请填写用户名和密码',
				remote : '邮箱或密码错误!',
			}
		}


	});


	/****头部下拉菜单****/
	$('.member').hover(function(){
		$('.user_info_ul').removeClass('hidden');
	},function(){

		$('.user_info_ul').addClass('hidden');
	});

	var gid = $('.hid_gid').val();
	/**发起讨论***/
	$('.fqtl').click(function(){
		$('#user_login').click();
	})


	$('.ask_g_but').click(function(){
		$('.ask_g').addClass('hidden');
		$('.create_group').slideDown('fast');
	})

	$('#create_g_sq').validate({
		debug : true,
		submitHandler : function (form) {
			$(form).ajaxSubmit({
				url : addGroup,
				type:'POST',
				success : function (responseText,statusText){
					if(responseText){
					/*	$('.mask').remove();
						$('#login').hide();
						$('#lean_overlay').hide();*/
						window.location.href = direcUrl;
						$('#create_g_sq').resetForm();
					}
				}
			});

		},
		errorElement : 'span',
		rules : {
			gname:{
				required:true,
				remote : {
					url : checkGroup,
					type : 'POST',
				},

			},
			gintro:{
				required:true,
			}
		},
		messages :{

			gname:{
				required:'请填写圈子名称',
				remote:'该圈子名称已被占用'
			},
			gintro:{
				required:'请填写圈子介绍',
			}
		}

	});











});