<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="us">
<head>
	<meta charset="utf-8">
	<script src="__PUBLIC__/Js/jquery-1.10.2.js"></script>
	<script src="__PUBLIC__/Js/jquery-migrate-1.2.1.js"></script>	
	<script src="__PUBLIC__/Js/jquery-ui-1.10.4.custom.js"></script>
	<script src="__PUBLIC__/Js/jquery.validate.js"></script>
	<script type="text/javascript" src="__PUBLIC__/Js/jquery.leanModal.min.js"></script>
	<script type="text/javascript" src="__PUBLIC__/Js/jquery.form.js"></script>
	<script type="text/javascript" src="__PUBLIC__/Js/jquery.cookie.js"></script>

	<script src="__PUBLIC__/Js/index.js"></script>
	<link href="__PUBLIC__/Css/reset.css" rel="stylesheet">
	<link href="__PUBLIC__/Css/header.css" rel="stylesheet">
<title>啤酒与糖的主页</title>
<link href="__PUBLIC__/Css/member.css" rel="stylesheet">
<script>
	var checkGroup = "<?php echo U(checkGroup);?>";
	var addGroup = "<?php echo U(addGroup);?>";
</script>
	<script>
		var regUrl = '<?php echo U("Index/register");?>';
		var checkEmail = '<?php echo U("Index/checkEmail");?>';
		var checkNicheng = '<?php echo U("Index/checkNicheng");?>';
		var checkUser = '<?php echo U("Index/checkUser");?>';
		var loginUrl = '<?php echo U("Index/login");?>';
		var direcUrl = '<?php echo U(index);?>';
	</script>
</head>
<body>
	<header>
		<nav>
			<h5>FIND</h5>
			<ul class="menu">
				<li><a href="__APP__">首页</a></li>
				<li><a href="#">名师</a></li>
				<li><a href="#">发现</a></li>
			</ul>
			<div class="member">
				<?php if(cookie('uid')): ?><a class="user_info" href="#" alt="<?php echo ($user["nicheng"]); ?>"><span></span><?php echo ($user["nicheng"]); ?></a>
				<ul class="user_info_ul hidden">
					<li><a href="__APP__/Member/index">主页</a></li>
					<li><a href="#">消息</a></li>
					<li><a href="<?php echo U('Index/logout');?>">退出</a></li>
				</ul>
					
				<?php else: ?> 
			
				<a id="user_login" rel="leanModal" name="login" href="#login">登陆</a><?php endif; ?>
			</div>
		</nav>
	</header>

<!----登陆框------>

	<div id="login">
		<div class="user_login">
				<div class="login_bar">
					<h5>FIND登陆</h5>
					<span class="modal_close"></span>
				</div>
		
				<form id="form_login" method="post" action="01.html">
					<p>
						<label for="email">邮箱</label>
						<input id="login_email" type="text" name="email"/>

					</p>
					<p>
						<label for="email">密码</label>
						<input id="email" type="password" name="password"/>
					</p>
					<p>
						<input type="submit" value="提交" id="login_submit"/><a href="#"class="dir_reg">注册<span></span></a>
					</p>
				</form>
				
		</div>
		<div class="user_reg hidden">
				<div class="reg_bar">
					<h5>Find注册</h5>
					<span class="modal_close"></span>
				</div>
				<form id="form_reg" method="post" action="01.html">
					<p>
						<label for="email">邮箱</label>
						<input id="email" type="text" name="email"/>

					</p>
					<p>
						<label for="nicheng">昵称</label>
						<input id="nicheng" type="text" name="nicheng"/>
					</p>
					<p>
						<label for="password">密码</label>
						<input id="password" type="password" name="password" />

					</p>
					<p>
						<label for="repass">确认密码</label>
						<input id="repass" type="password" name="repass"/>
					</p>
					<p>
						<input type="submit" value="注册" id="reg_submit" /><a href="#"class="dir_login">登陆<span></span></a>
					</p>
				</form>
		</div>
	</div>

	<div class="lean_overlay"></div>
	<div id="mem_cont_mid">
		<div id="mem_cont">
		<div class="left">
			<div class="mem_info">
				<div class="mem_image">
					<img src="__PUBLIC__/Images/02.jpg">

				</div>
				<div class="mem_intro">
				    <div class="person_info">
						<h5>啤酒与糖</h5>
						<div class="person_sign"><span class="sign_img"></span><span>个性签名:</span><p style="margin-top:5px;color:#555;font-size:12px;">成功的人需要成功的心。。。</p></div>
					</div>
				</div>
			</div>

			<div class="aside_menu">
				<div class="aside_left">
					<ul>
						<li><a href="#">圈子</a></li>
						<li><a href="#">话题</a></li>
						<li><a href="#">问答</a></li>
						<li><a href="#">资料</a></li>
					</ul>
				</div>

				<div class="aside_content">
					<h5>我关注的圈子</h5>
					<div class="gz_group">

					</div>
					<h5>我创建的圈子</h5>
				</div>
			
			</div>

		</div>
		
		<div class="mem_right">
			<?php if($group): ?><div class="ask_g">
					<span>我的圈子</span>
					<a href="javascript:void(0)" class="ask_g_but">申请创建</a>
				</div>

			<?php else: ?>
				<div class="ask_g"><span>您还没有创建自己的圈子</span><a href="javascript:void(0)" class="ask_g_but">立即申请</a>
				</div><?php endif; ?>
			<div class="create_group hidden">
			<form id="create_g_sq">
				<p>圈子名称:<input type="text" name="gname"></p>
				<p class="g_name_p">圈子介绍:<br /><textarea name="gintro"></textarea></p>
				<p>圈子类别:
					<select name="gcat">
						<?php if(is_array($cate)): foreach($cate as $key=>$vo): ?><option value="<?php echo ($vo["cid"]); ?>"><?php echo ($vo["cname"]); ?></option><?php endforeach; endif; ?>
					</select>
				</p>
				<p><input type="submit" value="立即申请"></p>
			</form>
			</div>
		</div>
	</div>
	
	</div>

</body>
</html>