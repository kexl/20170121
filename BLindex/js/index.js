/**
 * Created by Administrator on 2016/11/7.
 */
window.onload = function(){
  var hD_li1 = document.getElementById('hd_top_li1');
  var hD_ol = document.getElementById('hd_ol');
  var hD_ol_li = hD_ol.children;
    hD_li1.onmouseover = function () {
        hD_ol.style.display = 'block';
    };
    hD_li1.onmouseout = function () {
        hD_ol.style.display = 'none';
    };
    for(var i = 0 ; i < hD_ol_li.length ;i++){
        hD_ol_li[i].onmouseover = function () {
            this.style.background = '#fff';
        };
        hD_ol_li[i].onmouseout = function () {
            this.style.background = '';
        }
    }
    var Top_pic = document.getElementById('top_pic');
    var pic_span = Top_pic.children[1];
    pic_span.onclick = function(){
        Top_pic.style.display = 'none';
    };
    var oTxt = document.getElementById('txt');
    var value = oTxt.value ;
    oTxt.onfocus = function (){
        oTxt.value  = '';
    };
    oTxt.onblur = function (){
        oTxt.value = value;
    };


    var oB_pic = document.getElementById('banner_pic');
    var oWrap = document.getElementById('wrap');
    var oLi = oWrap.getElementsByTagName('li');
    var oSpan_box = document.getElementById('span_box');
    var oSpan = oSpan_box.getElementsByTagName('span');
    var iNow = 0;
    var timer = null;
    for(var i = 0 ; i<oSpan.length ; i++){
        oSpan[i].index = i ;
        oSpan[i].onclick = function(){
            iNow = this.index;
            tab();
        }
    }
    function tab(){
        for(var i = 0 ; i<oSpan.length ; i++){
            oSpan[i].className = '';
            move(oLi[i],{opacity:0})
        }
        oSpan[iNow].className = 'active';
        move(oLi[iNow],{opacity:1})
    }
    function next(){
        iNow++;
        if(iNow == oSpan.length) iNow = 0;
        tab();
    }
    timer = setInterval(next,2000);
    oB_pic.onmouseover = function(){
        clearInterval(timer);
    };
    oB_pic.onmouseout = function(){
        timer = setInterval(next,2000);
    };



    var dIty_L = document.getElementById('commodity_L');
    var dI_Li =  dIty_L.getElementsByTagName('li');
    var oP = dIty_L.getElementsByTagName('div');
    for(var i = 0 ; i <dI_Li.length ; i++){
        dI_Li[i].index = i ;
        dI_Li[i].onmouseover = function(){
            for(var i = 0 ; i <dI_Li.length ; i++){
                oP[this.index].style.display = 'block';
            }
            this.style.background = '#f7f6f6';
        };
        dI_Li[i].onmouseout = function(){
            for(var i = 0 ; i <dI_Li.length ; i++){
                oP[this.index].style.display = 'none';
            }
            this.style.background = '';
        }
    }
    var bn_rig = document.getElementById('banner_rig');
    var oSpa1_2 = bn_rig.getElementsByTagName('span');
    var oUl1 = bn_rig.getElementsByTagName('ul');
    for(var i = 0 ; i < oSpa1_2.length ;i++){
        oSpa1_2[i].index = i ;
        oSpa1_2[i].onmouseover = function(){
            for(var i = 0 ; i < oSpa1_2.length ;i++){
                oSpa1_2[i].className = 'span3';
                oSpa1_2[0].style.borderRight = '1px solid #cccccc';
                oSpa1_2[1].style.borderLeft = 'none';
                oUl1[i].style.display = 'none';
            }
            this.className = '';
            oUl1[this.index].style.display = 'block';
        }
    }
    window.onscroll = function(){
        var Top_btn = document.getElementById('top');
        var timer1 = null;
        var oScroll = document.documentElement.scrollTop || document.body.scrollTop;
        if(oScroll > 400){
            Top_btn.style.display = 'block';
        }else{
            Top_btn.style.display = 'none';
        }
        Top_btn.onclick = function() {
            clearInterval(timer1);
            var start = document.documentElement.scrollTop || document.body.scrollTop;
            var dis = 0 - start;
            var count = Math.floor(1000 / 30);
            var n = 0;
            timer1 = setInterval(function () {
                n++;
                var a = 1 - n / count;
                var cur = start + dis * ( 1 - a*a*a);
                document.documentElement.scrollTop = document.body.scrollTop = cur ;
                if( n == count){
                    clearInterval(timer1);
                }
            }, 30)
        }
    }

};

