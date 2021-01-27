//下面是获取可视区域的宽高 start
	var body = document.getElementsByTagName("body")[0];
	var numer = body.getBoundingClientRect();
	
	var getw = Math.floor(numer.width*0.88);
	var getH = Math.floor(numer.height*0.50);
	
    $(function(){
    	var box_ul=$(".box-con ul");
    	creatLi(data.letv,0)//根据数据生成li
    	function creatLi(newData,start){//根据数据生成li
    		var html='';
    		for(var i= start;i<newData.length;i++){
				
				html +='<li class=""><a href="javascript:;"></a>' 
		        html += '<img src="'+newData[i].img+'">'; 
		
		        //html += '<div style="opacity: 0; "></div>'; 
		
		        html += '<p class="b_tit"><span class="liPOpacity"></span>'; 
		        html += '<span class="tit">';
				html += '<span>'+newData[i].title+'</span>';
				html += '</span></p></li>' ; 		
			}
    		$(".list")[0].innerHTML = html;
    	}
    	
    	
       var prev=$(".prev")[0];
       var next=$(".next")[0];
       var box_li=$(".box-con li");
       //生成超出五个数量li位置和样式
		for(var i =5;i<box_li.length;i++){
			console.log(i);
			box_li.eq(i).stop().animate({
		      	width:Math.floor(getw*0.18),
		      	height:Math.floor(getH* 0.57),     	
		      	top:Math.floor(getH* 0.22),
		     	left:Math.floor(getw*0.82)
		    },500).css("z-index",10);
		}
		
	  //初始化位置
      box_li.eq(0).stop().animate({
      	width:Math.floor(getw*0.18),
      	height:Math.floor(getH* 0.57),     	
      	top:Math.floor(getH* 0.22),
     	left:0
      },500).css("z-index",20);
      box_li.eq(1).stop().animate({
      	width:Math.floor(getw* 0.24),
      	height:Math.floor(getH* 0.72),
      	left:Math.floor(getw*0.12),
      	top:Math.floor(getH* 0.14)
      },500).css("z-index",30);
      box_li.eq(2).stop().animate({//中间最大
        width:Math.floor(getw* 0.42),
        height:Math.floor(getH* 1),
        left:Math.floor(getw* 0.29),
        top:0
      },500).css("z-index",50);

     box_li.eq(3).stop().animate({
     	width:Math.floor(getw* 0.24),
      	height:Math.floor(getH* 0.72),
      	left:Math.floor(getw*0.66),
      	top:Math.floor(getH* 0.14)
     },500).css("z-index",30).next();

   box_li.eq(4).stop().animate({
   		width:Math.floor(getw*0.18),
      	height:Math.floor(getH* 0.57),     	
      	top:Math.floor(getH* 0.22),
     	left:Math.floor(getw*0.82)
	 },500).css("z-index",20);
   
   
  next.addEventListener('click',nextFun,false);
  prev.addEventListener('click',prevFun,false);
  timer = setInterval(nextFun,10000);
$(".box-con")[0].onmouseover = function(){
	clearInterval(timer);
};

$(".box-con")[0].onmouseout = function(){
	timer = setInterval(nextFun,10000);
};
  
  
  function nextFun(){//向右点击滑动
  	 box_li=$(".box-con li");
     box_li.eq(0).stop().animate({left:0},500,function(){
     	box_li.eq(0).css("left",Math.floor(getw*0.82)).css("z-index",10).appendTo(box_ul);
     });
     box_li.eq(1).stop().animate({
     	width:Math.floor(getw*0.18),
      	height:Math.floor(getH* 0.57),     	
      	top:Math.floor(getH* 0.22),
     	left:0
     },500).css("z-index",30);
     box_li.eq(2).stop().animate({
     	width:Math.floor(getw* 0.24),
      	height:Math.floor(getH* 0.72),
      	left:Math.floor(getw*0.12),
      	top:Math.floor(getH* 0.14)
     },500).css("z-index",30);

     box_li.eq(3).stop().animate({
     	width:Math.floor(getw* 0.42),
        height:Math.floor(getH* 1),
        left:Math.floor(getw* 0.29),
        top:0
    },500).css("z-index",50);
     box_li.eq(4).stop().animate({
     	width:Math.floor(getw* 0.24),
      	height:Math.floor(getH* 0.72),
      	left:Math.floor(getw*0.66),
      	top:Math.floor(getH* 0.14)
     },500).css("z-index",30);
     box_li.eq(5).stop().animate({
     	width:Math.floor(getw*0.18),
      	height:Math.floor(getH* 0.57),     	
      	top:Math.floor(getH* 0.22),
     	left:Math.floor(getw*0.82)
     }).css("z-index",20);
    
  };



  function prevFun(){ //向左滑动
  	box_li=$(".box-con li");
  	$(".box-con li:last").prependTo(box_ul).css("left",0).stop().animate({left:0},500);
     box_li.eq(4).stop().animate({//这是右边隐藏图片
     	width:Math.floor(getw*0.18),
      	height:Math.floor(getH* 0.57),     	
      	top:Math.floor(getH* 0.22),
     	left:Math.floor(getw*0.82)
     },500).css("z-index",10);
     
     box_li.eq(3).stop().animate({//这是第五张
      	width:Math.floor(getw*0.18),
      	height:Math.floor(getH* 0.57),     	
      	top:Math.floor(getH* 0.22),
     	left:Math.floor(getw*0.82)
     },500).css("z-index",20);
     
     box_li.eq(2).stop().animate({//这是第四张
     	width:Math.floor(getw* 0.24),
      	height:Math.floor(getH* 0.72),
      	left:Math.floor(getw*0.66),
      	top:Math.floor(getH* 0.14)
     },500).css("z-index",30);
     
     box_li.eq(1).stop().animate({//这是第三张
     	width:Math.floor(getw* 0.42),
        height:Math.floor(getH* 1),
        left:Math.floor(getw* 0.29),
        top:0
     },500).css("z-index",50);
     box_li.eq(0).stop().animate({ //这是第二张
     	width:Math.floor(getw* 0.24),
      	height:Math.floor(getH* 0.72),
      	left:Math.floor(getw*0.12),
      	top:Math.floor(getH* 0.14)
     },500).css("z-index",30);

  };
 


 

// 封装一个弹出层；


var listA = $(".list li a");

console.log(listA);

for(var i = 0;i<listA.length;i++){
	listAclick(i);
}

function listAclick(i){
	listA[i].onclick = function(){
		console.log(i);
		letvIfraem(data.letv[i].ul);
		
		
	}
}


function letvIfraem(ul){
	
	var letv3D =  document.createElement("div");
	letv3D.className ="letvIframe";
	
	var body = document.getElementsByTagName("body")[0];
	
	body.appendChild(letv3D);
	letv3D.innerHTML ='<span class="letvclose cursor poA">退出</span><iframe src="'+ul+'" width="100%" height="100%"></iframe>';

	var letvclose = document.querySelector(".letvIframe .letvclose");
	
	//console.log(document.parentNode);
	//var quit3D = document.querySelector(".div3D .quit3D");

	//window.parent.document.querySelector(".div3D .quit3D").style.display ="none";//获取iframe父级的元素
	
	letvclose.onclick = function(){
		body.removeChild(letv3D);
//		window.parent.document.querySelector(".div3D .quit3D").style.display ="block";
	}
	
	
	
}


//滑动

isTouchDevice();

//touchstart事件
function touchSatrtFunc(evt) {
    try {
        //evt.preventDefault(); //阻止触摸时浏览器的缩放、滚动条滚动等
        var touch = evt.touches[0]; //获取第一个触点
        var x = Number(touch.pageX); //页面触点X坐标
        var y = Number(touch.pageY); //页面触点Y坐标
        //记录触点初始位置
        startX = x;
        startY = y;
 		touchchange = 0;
 		clearInterval(timer);
    } catch (e) {
        alert('touchSatrtFunc：' + e.message);
    }
}
 
//touchmove事件，这个事件无法获取坐标
var touchchange = 0;
function touchMoveFunc(evt) {
	touchchange = 0;
    try {
        //evt.preventDefault(); //阻止触摸时浏览器的缩放、滚动条滚动等
        var touch = evt.touches[0]; //获取第一个触点
        var x = Number(touch.pageX); //页面触点X坐标
        var y = Number(touch.pageY); //页面触点Y坐标
        
         console.log(x-startX);
        if (x - startX > 70) {
        	touchchange = 1;
        	console.log("向you");
        	
        } else if(x - startX < -70){
        	 console.log("向zuo");
        	 touchchange = 2;
            //swipeLeft();//你自己的方法
           
        }
    } catch (e) {
//      alert('touchMoveFunc：' + e.message);
    }
}
 
//touchend事件
function touchEndFunc(evt) {
	timer = setInterval(nextFun,10000);
	if(touchchange === 2){
		nextFun();
	}else if(touchchange === 1){
		prevFun();
	}
	
    try {
        //evt.preventDefault(); //阻止触摸时浏览器的缩放、滚动条滚动等
 
    } catch (e) {
        alert('touchEndFunc：' + e.message);
    }
}
 
//绑定事件
function bindEvent(box) {
    box.addEventListener('touchstart', touchSatrtFunc, false);
    box.addEventListener('touchmove', touchMoveFunc, false);
    box.addEventListener('touchend', touchEndFunc, false);
}
 
//判断是否支持触摸事件
function isTouchDevice() {
        //document.getElementById("version").innerHTML = navigator.appVersion;
 
    try {
          document.createEvent("TouchEvent");
//        alert("支持TouchEvent事件！");
 
		var box = document.getElementsByClassName("list")[0];
          bindEvent(box); //绑定事件
    } catch (e) {
//      alert("不支持TouchEvent事件！" + e.message);
    }
}


 });