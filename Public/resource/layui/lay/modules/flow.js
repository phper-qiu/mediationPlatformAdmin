/** layui-v1.0.8 MIT License By http://www.layui.com */
 ;layui.define("jquery",function(e){"use strict";var l=layui.jquery,o=function(e){},t='<i class="layui-anim layui-anim-rotate layui-anim-loop layui-icon ">&#xe63e;</i>';o.prototype.load=function(e){var o,i,n,r,a=this,c=0;e=e||{};var u=l(e.elem);if(u[0]){var f=l(e.scrollElem||document),m=e.mb||50,s=!("isAuto"in e)||e.isAuto,y=e.end||"没有更多了",v=e.scrollElem&&e.scrollElem!==document,d="<cite>加载更多</cite>",h=l('<div class="layui-flow-more"><a href="javascript:;">'+d+"</a></div>");u.find(".layui-flow-more")[0]||u.append(h);var p=function(e,t){e=l(e),h.before(e),t=0==t||null,t?h.html(y):h.find("a").html(d),i=t,o=null,n&&n()},g=function(){o=!0,h.find("a").html(t),"function"==typeof e.done&&e.done(++c,p)};if(g(),h.find("a").on("click",function(){l(this);i||o||g()}),e.isLazyimg)var n=a.lazyimg({elem:e.elem+" img",scrollElem:e.scrollElem});return s?(f.on("scroll",function(){var e=l(this),t=e.scrollTop();r&&clearTimeout(r),i||(r=setTimeout(function(){var i=v?e.height():l(window).height(),n=v?e.prop("scrollHeight"):document.documentElement.scrollHeight;n-t-i<=m&&(o||g())},100))}),a):a}},o.prototype.lazyimg=function(e){var o,t=this,i=0;e=e||{};var n=l(e.scrollElem||document),r=e.elem||"img",a=e.scrollElem&&e.scrollElem!==document,c=function(e,l){var o=n.scrollTop(),r=o+l,c=a?function(){return e.offset().top-n.offset().top+o}():e.offset().top;if(c>=o&&c<=r&&!e.attr("src")){var f=e.attr("lay-src");layui.img(f,function(){var l=t.lazyimg.elem.eq(i);e.attr("src",f).removeAttr("lay-src"),l[0]&&u(l),i++})}},u=function(e,o){var u=a?(o||n).height():l(window).height(),f=n.scrollTop(),m=f+u;if(t.lazyimg.elem=l(r),e)c(e,u);else for(var s=0;s<t.lazyimg.elem.length;s++){var y=t.lazyimg.elem.eq(s),v=a?function(){return y.offset().top-n.offset().top+f}():y.offset().top;if(c(y,u),i=s,v>m)break}};if(u(),!o){var f;n.on("scroll",function(){var e=l(this);f&&clearTimeout(f),f=setTimeout(function(){u(null,e)},50)}),o=!0}return u},e("flow",new o)});