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
	<title>Find - 专业大学生交流平台</title>
	<link href="__PUBLIC__/Css/index.css" rel="stylesheet">
<script>
	var dianZan = "<?php echo U(dianZan);?>";
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
	<div id="cont">
			<div class="left">
				<!--<div class="dalaba">
					<h3>大喇叭<span></span></h3>
					<p>1.国庆节放假安排<br />
					   2.考研同学注意了,今天晚上J5-216举行海文讲座<br />
					   3.上<a href="#">饿了么</a>网订餐，满十元立减5元，还等什么，饿了么帮你省钱！
					</p>
				</div>
			-->
				<h2>热门话题</h2>
				<?php if(is_array($huati)): foreach($huati as $key=>$vo): ?><div class="content">
					<div class="title"><a href="__APP__/Group/huati/hid/<?php echo ($vo["hid"]); ?>" class="biaoti"><?php echo ($vo["title"]); ?></a></h3> &nbsp;<span>来自</span>&nbsp;<a href="__APP__/Group/index/gid/<?php echo ($vo["gid"]); ?>"><?php echo ($vo["gname"]); ?></a></div>
					<p class="summary">
						<?php echo ($vo["content"]); ?>
					</p>
					<div class="footer"><a href="javascript:void(0)" hid="<?php echo ($vo["hid"]); ?>"class="zan_a" nid="zan<?php echo ($vo["hid"]); ?>"><span class="zan"></span>赞(<span class="zan_z"><?php echo ($vo["znum"]); ?></span>)</a><a href="#"><span class="taolun"></span>讨论(<?php echo ($vo["pnum"]); ?>)</a>
					</div>
				</div><?php endforeach; endif; ?>
			<div class="page" style="float:left;font-size:13px;"><?php echo ($page); ?></div>
			</div>


			<div class="right">
				<div class="hot_biaoqian">
					<h5>热门标签</h5>
					<button>学习</button><button>社团</button><button>考研</button><button>考证</button><button>体育</button><button>创业</button><button>兼职</button><button>研究</button><button>名师</button>
				</div>
				<div class="hot_group">
					<h5>精选圈子<span class="huanyipi"></span></h5>
					<ul>
						<li>
							<a href="#" class="group_img"><img src="__PUBLIC__/Images/02.jpg"/></a>
							<div class="hot_group_info">
								<a href="#">海文考研</a><span>26人加入</span>
								<p class="qianming">考研兄弟们快来考研兄弟们快来们快来吧来吧</p>
							</div>
						</li>

						<li>
							<a href="#" class="group_img"><img src="__PUBLIC__/Images/02.jpg"/></a>
							<div class="hot_group_info">
								<a href="#">学生联合会</a><span>25人加入</span>
								<p class="qianming">学生联合会--大学最具有影响力的组织</p>
							</div>
						</li>

						<li>
							<a href="#" class="group_img"><img src="__PUBLIC__/Images/02.jpg"/></a>
							<div class="hot_group_info">
								<a href="#">计算机考证</a><span>100人加入</span>
								<p class="qianming">计算机考证的最新消息...</p>
							</div>
						</li>
					</ul>
				</div>
				<div class="teacher">
					<h5>名师解答</h5>
					<ul>
						<li>
							<a href="#">李向红老师</a>&nbsp;<span>回答->啤酒与糖</span>
							<p><span class="wenti"></span>研究生方向怎样去选择？？</p>
							<p><a href="#">对于你说的研究生方向问题,我在这里做了详细的回答</a></p>
						</li>
						<li>
							<a href="#">王老师</a>&nbsp;<span>回答->开着拖拉机迎接冬天的到来</span>
							<p><span class="wenti"></span>怎样去创业？</p>
							<p><a href="#">对于你说的研究生方向问题,我在这里做了详细的回答</a></p>
						</li>
						<li>
							<a href="#">那图鲁教授</a>&nbsp;<span>回答->布宜诺斯艾利斯的玫瑰</span>
							<p><span class="wenti"></span>经济学如何去学好</p>
							<p><a href="#">看国外的书籍很重要...</a></p>
						</li>
					</ul>
				</div>

			</div>
	</div>
</body>
</html>