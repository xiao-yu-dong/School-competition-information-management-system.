/**
 * 改进版
 */

var MIDDLE_PIC_POS = 1

//计算如何用最短的距离移动到目标
//由于有两种移动方式,向左边移动或者像右边移动,只需要在这两种方式中选择一个小的就行了

    ;(function($){
    var Caroursel = function (caroursel){
        var self = this;
        this.caroursel = caroursel;
        this.posterList = caroursel.find(".poster-list");
        this.posterItems = caroursel.find(".poster-item");
        this.firstPosterItem = this.posterItems.first();
        this.lastPosterItem = this.posterItems.last();
        this.prevBtn = this.caroursel.find(".poster-prev-btn");
        this.nextBtn = this.caroursel.find(".poster-next-btn");

        this.buttonItems = caroursel.find(".index-btn");

        //每个移动元素的位置索引,用于记录每个元素当前的位置,在每次移动的时候,该数组的值都会发生变化
        //数组的下标对应li元素的位置索引
        this.curPositions = [];
        for(var i = 0;i<this.posterItems.length;++i){
            this.curPositions[i] = i+1;
        }

        this.setting = {
            "width":"560",
            "height":"460",
            "posterWidth":"560",
            "posterHeight":"460",
            "scale":"0.8",
            "speed":"1000",
            "isAutoplay":"true",
            "dealy":"1000"
        };

        $.extend(this.setting,this.getSetting());

        this.setFirstPosition();

        this.setSlicePosition();

        this.refreshCss();

        this.rotateFlag = true;
        this.prevBtn.bind("click",function(){
            if(self.rotateFlag){
                self.rotateFlag = false;
                self.rotateAnimate("left")
            }
        });

        this.nextBtn.bind("click",function(){
            if(self.rotateFlag){
                self.rotateFlag = false;
                self.rotateAnimate("right")
            }
        });

        //绑定位置按钮事件

        this.buttonItems.each(function(index){
            var _this = $(this);
            _this.click(function(){
                self.clickPosButtonIndex(index);
            })
        });

        if(this.setting.isAutoplay){
            this.autoPlay();
            this.caroursel.hover(function(){clearInterval(self.timer)},function(){self.autoPlay()})
        }
    };
    Caroursel.prototype = {
        autoPlay:function(){
            var that = this;
            this.timer =  window.setInterval(function(){
                that.nextBtn.click();
            },that.setting.dealy)
        },


        refreshCss:function(){
            var that= this;
            var curFirstPos;//当前位于中间的li元素位置
            this.buttonItems.each(function(index){
                var _this = $(this);
                var curPos = that.curPositions[index];
                if(curPos == 1){
                    _this.addClass('poster-btn-active');
                }
                else{
                    _this.removeClass('poster-btn-active');
                }
            });
        },

        //记录每次移动的状态
        refreshPositions:function(offset){
            //console.log('before refreshPositions',this.curPositions,'the offset is offset ' + offset);
            for(var i = 0; i < this.curPositions.length; ++i)
            {
                var nextPos = this.curPositions[i] + offset;
                if (nextPos > this.curPositions.length) {//移动超过末尾,则位置变成到开头
                    nextPos = nextPos - this.curPositions.length;
                }else
                if (nextPos < 1) {////向左边移动已经移动到开始位置更左边,则位置变成结束
                    nextPos = this.curPositions.length + nextPos;
                }
                this.curPositions[i] = nextPos;
            }
            //console.log('after refreshPositions',this.curPositions);
            this.refreshCss();
        },

        cal_move_path:function(curPos,desPos,arraySize) {
            //console.log("begin cal_move_path ",curPos,desPos,arraySize);
            if(curPos == desPos) return null;
            //往左边移动
            var goRightSteps;
            var goLeftSteps;
            var retDirect;
            var retStep;
            if(curPos > desPos){
                goRightSteps = curPos - desPos;
                goLeftSteps = desPos + (arraySize - curPos);
                retDirect = (goRightSteps <= goLeftSteps) ? "right":"left";
                return {"direct":retDirect,"step":Math.min(goLeftSteps,goRightSteps)};
            }
        },


        //点击位置按钮,根据点击的按钮索引 决定向左还是向右移动[因为只有三个位置,该方法能够仅靠向左或向右就能将
        //指定的位置移动到中间]
        clickPosButtonIndex:function(index){
            //console.log('click the index ' + index,'the curPositions is ',this.curPositions);
            var self = this;
            if(self.rotateFlag == false) {//目前正在移动等移动结束后才能进入
                return;
            }

            var curPos = this.curPositions[index];
            var retPath = this.cal_move_path(curPos,MIDDLE_PIC_POS,this.curPositions.length);
            if (retPath == null){
                return;
            }

            var direct = retPath.direct;
            var step = retPath.step;

            self.rotateFlag = false;
            self.rotateAnimate(direct,step)
        },

        rotateAnimate:function(type,step){
            step = step || 1;
            //console.log('begin rotateAnimate ' + type  + "the step is " + step);
            var that = this;
            var zIndexArr = [];
            var speed = that.setting.speed;
            this.posterItems.each(function(){
                var self = $(this);
                var destPic = null;
                var curPic = self;
                for (var i = 0; i < step;++i){
                    if(type == "left"){// 向左边移动, 下一张图片在自己的右边,所以用next()
                        destPic = curPic.next().get(0)?curPic.next():that.firstPosterItem;
                    }
                    else{
                        destPic = curPic.prev().get(0)?curPic.prev():that.lastPosterItem;
                    }
                    curPic = destPic;
                }

                var width = destPic.css("width");
                var height = destPic.css("height");
                var zIndex = destPic.css("zIndex");
                var opacity = destPic.css("opacity");
                var left = destPic.css("left");
                var top = destPic.css("top");
                zIndexArr.push(zIndex);
                self.animate({
                    "width":width,
                    "height":height,
                    "left":left,
                    "opacity":opacity,
                    "top":top
                },speed,function(){
                    that.rotateFlag = true;
                });
            });
            this.posterItems.each(function(i){
               // alert(Math.max.apply(null, zIndexArr))
                $(this).css("zIndex",zIndexArr[i]);
            });

            if (type == 'right'){
                this.refreshPositions(-step);
            }else{
                this.refreshPositions(step);
            }
        },

        setFirstPosition:function(){
            this.caroursel.css({"width":this.setting.width,"height":this.setting.height});
            this.posterList.css({"width":this.setting.width,"height":this.setting.height});
            var width = (this.setting.width - this.setting.posterWidth) / 2;

            this.prevBtn.css({"width":width , "height":this.setting.height,"zIndex":Math.ceil(this.posterItems.size()/2)});
            this.nextBtn.css({"width":width , "height":this.setting.height,"zIndex":Math.ceil(this.posterItems.size()/2)});
            this.firstPosterItem.css({
                "width":this.setting.posterWidth,
                "height":this.setting.posterHeight,
                "left":width,
                "zIndex":Math.ceil(this.posterItems.size()/2),
                "top":this.setVertialType(this.setting.posterHeight)
            });
        },
        setSlicePosition:function(){
            var _self = this;
            var sliceItems = this.posterItems.slice(1),
                level = Math.floor(this.posterItems.length/2),
                leftItems = sliceItems.slice(0,level),
                rightItems = sliceItems.slice(level),
                posterWidth = this.setting.posterWidth,
                posterHeight = this.setting.posterHeight,
                Btnwidth = (this.setting.width - this.setting.posterWidth) / 2,
                gap = Btnwidth/level,
                containerWidth = this.setting.width;

            var i = 1;
            var leftWidth = posterWidth;
            var leftHeight = posterHeight;
            var zLoop1 = level;
            console.log(leftItems);
            console.log(rightItems);
            leftItems.each(function(index,item){
                var scale = _self.setting.scale;
                if(index==1){
                    scale = scale*scale;
                }
                leftWidth = posterWidth * scale;
                leftHeight = posterHeight*scale;
                console.log(leftWidth)
                console.log(leftHeight)
                $(this).css({
                    "width":leftWidth,
                    "height":leftHeight,
                    "left": Btnwidth - i*gap,
                    "zIndex":zLoop1--,
                    "opacity":1/(i+1),
                    "top":_self.setVertialType(leftHeight)
                });
                i++;
            });

            var j = level;
            var zLoop2 = 1;
            var rightWidth = posterWidth;
            var rightHeight = posterHeight;
            rightItems.each(function(index,item){
                var scale = _self.setting.scale;
                if(index==0){
                    scale = scale*scale;
                }
                var rightWidth = posterWidth * scale;
                var rightHeight = posterHeight*scale;
                $(this).css({
                    "width":rightWidth,
                    "height":rightHeight,
                    "left": containerWidth -( Btnwidth - j*gap + rightWidth),
                    "zIndex":zLoop2++,
                    "opacity":1/(j+1),
                    "top":_self.setVertialType(rightHeight)
                });
                j--;
            });
        },
        getSetting:function(){
            var settting = this.caroursel.attr("data-setting");
            if(settting.length > 0){
                return $.parseJSON(settting);
            }else{
                return {};
            }
        },
        setVertialType:function(height){
            var align = this.setting.align;
            if(align == "top") {
                return 0
            }else if(align == "middle"){
                return (this.setting.posterHeight - height) / 2
            }else if(align == "bottom"){
                return this.setting.posterHeight - height
            }else {
                return (this.setting.posterHeight - height) / 2
            }
        }
    };
    Caroursel.init = function (caroursels){
        caroursels.each(function(index,item){
            new Caroursel($(this));
        })  ;
    };
    window["Caroursel"] = Caroursel;
})(jQuery);