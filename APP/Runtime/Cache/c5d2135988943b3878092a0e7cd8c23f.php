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
	<title>Find - 小组--海文考研--的空间</title>

	<link href="__PUBLIC__/Css/group.css" rel="stylesheet">
<script>
	var addHuati = "<?php echo U(addHuati);?>";
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
<div id="g_cont">
	<div class="left">
		<div class="g_info">
			<img src="__PUBLIC__/Images/02.jpg">
			<div class="g_i_tro">
				<div><h5><?php echo ($group["gname"]); ?></h5></div>
				<p><?php echo ($group["gintro"]); ?></p>
				<input type="hidden" class="hid_gid" value="<?php echo ($group["gid"]); ?>" />
				<div class="g_info_tool"><span>已有25人加入...</span>&nbsp;&nbsp;<a href="javascript:void(0);">马上加入</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>话题&nbsp;200条</span></div>

			</div>
		</div>
		<div class="gonggao">
			<h5>公告栏:</h5>
			<p>暂无公告...</p>
			<ul>
				<li>海文考研今天下午在J5-211举办海文英语集训会<span>2014-09-07</span></li>
				<li>海文考研今天下午在J5-211举办海文英语集训会海文考研今天下午在J5-211举办海文英语集训会海文考研今天下午在J5-211举办海文英语集训会<span>2014-09-07</span></li>
			</ul>
		</div>

		<div id="g_huati">
			<h5>话题:</h5>
			<ul>
				<?php if(is_array($huati)): foreach($huati as $key=>$vo): ?><li>
					<a href="__APP__/Group/huati/hid/<?php echo ($vo["hid"]); ?>"><?php echo ($vo["title"]); ?></a><span>23人参与讨论</span></li><?php endforeach; endif; ?>

			</ul>
			<div class="g_page"><?php echo ($page); ?></div>

		</div>
		<div id="g_ask">
			<h5 style="margin-bottom:15px;float:left;">发起讨论</h5>
			<?php if(cookie('uid')): ?><div id="g_a_form"  action="" method="post">
					<div style="font-size:12px;clear:both;">标题:<input class="title" type="text" name="title" placeholder="好的标题，吸引更多人关注..."/>
					<input type="hidden" value="<?php echo ($group["gid"]); ?>" class="gid" name="gid">
					</div><br />
					<div ><span style="float:left;font-size:12px;">内容:</span>
					<textarea class="content" name="content" placeholder="添加话题描述..."></textarea>
					</div>
					<div><button class="fabu_btn">发布</button>
					</div>
				</div>
			
			<?php else: ?>
				<span class="fqtl">您还没有登陆，暂不能发起讨论...</span><?php endif; ?>
		</div>
	</div>
	<div class="right">
	</div>

</div>
</body>
</html>