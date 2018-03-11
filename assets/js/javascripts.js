function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}
function toggleLeftNav() {
    var x = document.getElementById("div-leftnav");
    if (x.className === "left-navigation") {
        x.className += " responsive";
    } else {
        x.className = "left-navigation";
    }
}

function openNav() {
    document.getElementById("mySidenav").style.width = "auto";
    document.getElementById("main").style.marginLeft = "auto";
    document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft= "0";
    document.body.style.backgroundColor = "white";
}

var accordion=function(){
    var tm=sp=10;
    function slider(n){this.nm=n; this.arr=[]}
    slider.prototype.init=function(t,c,k){
        var a,h,s,l,i; a=document.getElementById(t); this.sl=k?k:'';
        h=a.getElementsByTagName('dt'); s=a.getElementsByTagName('dd'); this.l=h.length;
        for(i=0;i<this.l;i++){var d=h[i]; this.arr[i]=d; d.onclick=new Function(this.nm+'.pro(this)'); if(c==i){d.className=this.sl}}
        l=s.length;
        for(i=0;i<l;i++){var d=s[i]; d.mh=d.offsetHeight; if(c!=i){d.style.height=0; d.style.display='none'}}
    }
    slider.prototype.pro=function(d){
        for(var i=0;i<this.l;i++){
            var h=this.arr[i], s=h.nextSibling; s=s.nodeType!=1?s.nextSibling:s; clearInterval(s.tm);
            if(h==d&&s.style.display=='none'){s.style.display=''; su(s,1); h.className=this.sl}
            else if(s.style.display==''){su(s,-1); h.className=''}
        }
    }
    function su(c,f){c.tm=setInterval(function(){sl(c,f)},tm)}
    function sl(c,f){
        var h=c.offsetHeight, m=c.mh, d=f==1?m-h:h; c.style.height=h+(Math.ceil(d/sp)*f)+'px';
        c.style.opacity=h/m; c.style.filter='alpha(opacity='+h*100/m+')';
        if(f==1&&h>=m){clearInterval(c.tm)}else if(f!=1&&h==1){c.style.display='none'; clearInterval(c.tm)}
    }
    return{slider:slider}
}();
var slider1=new accordion.slider('slider1');
slider1.init("slider");

var width = (window.innerWidth > 0) ? window.innerWidth : screen.width;
if(width >= 991){
    document.getElementById("div-leftnav").style.display="block"
}else{
    document.getElementById("div-leftnav").style.display="none"
}

$('document').ready(function(){
    $('.slider dt').click(function(){
        var slider1=new accordion.slider('slider1');
        slider1.init("slider");
    });
});
    
