$(function(){

	/**通用遮罩**/
	omask = '<div class="mask"></div>';
	var maskWidth = $(document).width();
	var maskHeight = $(document).height();


	/***登陆弹出框**/
	var reg = $('#user_reg');
	var regWindow = $('#reg');

	var browserScrollTop = $(window).scrollTop();
	var browserScrollLeft = $(window).scrollLeft();
	var regWidth = regWindow.outerWidth(true);
	var regHeight = regWindow.outerHeight(true);
	reg.click(function(){

		Center(regWidth,regHeight,regWindow);
		$('body').append(omask);
		$('.mask').width(maskWidth+'px').height(maskHeight+'px');
		regWindow.show();
	});

	$(window).resize(function(){
		onrisize(regWidth,regHeight,regWindow);
	});

	$('#reg h5').mousedown(function(e){
		drag(e,regWindow);
	});

	$(window).scroll(function(){
		modalScroll(regWidth,regHeight,regWindow);
	});

	/**登陆弹出框结束**/


	









	/***模态框函数***/

	function onrisize(popWidth,popHeight,popWindow){ //传入模态对话框对象
		if(popWindow.is(':visible')){
			var browserWidth = $(window).width();
			var browserHeight = $(window).height();
		
			positionTop = browserHeight/2 - popHeight/2 + browserScrollTop;
			positionLeft = browserWidth/2 - popWidth/2 + browserScrollLeft;
			
			var maskWidth = $(document).width();
			var maskHeight = $(document).height();
			$('.mask').width(maskWidth+'px').height(maskHeight+'px');

			popWindow.animate({
					'left':positionLeft + 'px',
					'top':positionTop + 'px'
			},500).dequeue();	
		}	

	}	
	function Center(width,height,popWindow){ /**传入模态框的宽和高，和需要改变的元素**/
		/**获取可视窗口的高和宽**/
		var browserWidth = $(window).width();
		var browserHeight = $(window).height();

		/**进行窗口位置运算**/
		var positionTop = browserHeight/2 - height/2;
		var positionLeft = browserWidth/2 - width/2;

		popWindow.css({
			'left':positionLeft + 'px',
			'top':positionTop + 'px'
		});

	}


	function drag(e,popWindow){
		var positionDiv = popWindow.offset();
		var distenceX = e.pageX - positionDiv.left;
		var distenceY = e.pageY - positionDiv.top;
		//alert(distenceY)

		$(document).mousemove(function(e){
			var x = e.pageX - distenceX;
			var y = e.pageY - distenceY;
			//alert(x)
			if(x<0){
				x=0;
			}
			if(x>($(window).width() - popWindow.outerWidth())){
				x= $(window).width() - popWindow.outerWidth();
			}
			if(y<0){
				y=0;
			}
			if(y>($(window).height()-popWindow.outerHeight())){
				y=$(window).height()-popWindow.outerHeight();
			}
			popWindow.css({
				'left':x+'px',
				'top':y+'px'
			});
		});

		$(document).mouseup(function(){
			$(document).off('mousemove');
			$(document).off('mouseup');
		});
	}

	function modalScroll(popWidth,popHeight,popWindow){
		if(popWindow.is(':visible')){
			var browserScrollTop = $(window).scrollTop();
			var browserScrollLeft = $(window).scrollLeft();

			var browserWidth = $(window).width();
			var browserHeight = $(window).height();

		 	var positionTop = browserHeight/2 - popHeight/2 + browserScrollTop;
		 	var positionLeft = browserWidth/2 - popWidth/2 + browserScrollLeft;
			
			popWindow.animate({
					'left':positionLeft + 'px',
					'top':positionTop + 'px'
			},500).dequeue();
		}
	}

/*

	/**获取弹出层的高度和宽度*
	var popWidth = popWindow.outerWidth(true);
	var popHeight = popWindow.outerHeight(true);




	//获取可视窗口的高和宽
	var browserWidth = $(window).width();
	var browserHeight = $(window).height();

	//获取滚动条距离上部的位置
	var browserScrollTop = $(window).scrollTop();
	var browserScrollLeft = $(window).scrollLeft();

	//获取弹出层的高和寛
	var popWidth = popWindow.outerWidth(true);
	var popHeight = popWindow.outerHeight(true);

	//得到弹出框的中间位置
	var positionTop = browserHeight/2 - popHeight/2 + browserScrollTop;
	var positionLeft = browserWidth/2 - popWidth/2 + browserScrollLeft;

	//创建遮罩
	omask = '<div class="mask"></div>';

	var maskWidth = $(document).width();

	var maskHeight = $(document).outerHeight();



	popWindow.css('left',positionLeft);

	ob.click(function(){
	//获取滚动条距离上部的位
		
		popWindow.show().animate({
				'left':positionLeft + 'px',
				'top':positionTop + 'px'
		},500);

		$('body').append(omask);
		$('.mask').width(maskWidth+'px').height(maskHeight+'px');


	});

	//窗口大小改变时
	$(window).resize(function(){
		if(popWindow.is(':visible')){
			browserWidth = $(window).width();
			browserHeight = $(window).height();
		
			positionTop = browserHeight/2 - popHeight/2 + browserScrollTop;
			positionLeft = browserWidth/2 - popWidth/2 + browserScrollLeft;
		
			popWindow.animate({
					'left':positionLeft + 'px',
					'top':positionTop + 'px'
			},500).dequeue();	
		}
	});

	/**窗口滚动事件
	$(window).scroll(function(){
		browserScrollTop = $(window).scrollTop();
		if(popWindow.is(':visible')){
			browserScrollTop = $(window).scrollTop();
			browserScrollLeft = $(window).scrollLeft();
		 	positionTop = browserHeight/2 - popHeight/2 + browserScrollTop;
		 	positionLeft = browserWidth/2 - popWidth/2 + browserScrollLeft;

			popWindow.animate({
					'left':positionLeft + 'px',
					'top':positionTop + 'px'
			},500).dequeue();

			$('.mask').width(maskWidth+'px').height(maskHeight+'px');
		}


		/**窗口滚动，热门圈子随之滚动
		top.animate({
				'top':topTop + browserScrollTop + 'px'
		},300).dequeue();

	});


	/**窗口拖曳效果的实现
	$('.head h5').mousedown(function(e){

		var positionDiv = $('.pop-login').offset();
		var distenceX = e.pageX - positionDiv.left;
		var distenceY = e.pageY - positionDiv.top;
		//alert(distenceY)

		$(document).mousemove(function(e){
			var x = e.pageX - distenceX;
			var y = e.pageY - distenceY;
			//alert(x)
			$('.pop-login').css({
				'left':x+'px',
				'top':y+'px'
			});
		});

		$(document).mouseup(function(){
			$(document).off('mousemove');
			$(document).off('mouseup');
		});

	});

	close.click(function(){
		popWindow.fadeOut('fast');
		$('.mask').fadeOut('fast').remove();
	});


*/

});