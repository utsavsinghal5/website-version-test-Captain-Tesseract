<?php die("Access Denied"); ?>#x#a:2:{s:6:"result";a:4:{s:9:"filemtime";i:1608452235;s:4:"etag";s:32:"6038b3c66fda78bbfd5a526f9fadd285";s:8:"contents";s:29233:"try {
/*!
 * Bootstrap.js by @fat & @mdo
 * Copyright 2012 Twitter, Inc.
 * http://www.apache.org/licenses/LICENSE-2.0.txt
 *
 * Custom version for Joomla!
 */
!function(t){"use strict";t(function(){t.support.transition=function(){var t=function(){var t,e=document.createElement("bootstrap"),i={WebkitTransition:"webkitTransitionEnd",MozTransition:"transitionend",OTransition:"oTransitionEnd otransitionend",transition:"transitionend"};for(t in i)if(void 0!==e.style[t])return i[t]}();return t&&{end:t}}()})}(window.jQuery),function(t){"use strict";var e='[data-dismiss="alert"]',i=function(i){t(i).on("click",e,this.close)};i.prototype.close=function(e){function i(){n.trigger("closed").remove()}var n,o=t(this),s=o.attr("data-target");s||(s="#"===(s=(s=o.attr("href"))&&s.replace(/.*(?=#[^\s]*$)/,""))?"":s),n=t(document).find(s),e&&e.preventDefault(),n.length||(n=o.hasClass("alert")?o:o.parent()),n.trigger(e=t.Event("close")),e.isDefaultPrevented()||(n.removeClass("in"),t.support.transition&&n.hasClass("fade")?n.on(t.support.transition.end,i):i())};var n=t.fn.alert;t.fn.alert=function(e){return this.each(function(){var n=t(this),o=n.data("alert");o||n.data("alert",o=new i(this)),"string"==typeof e&&o[e].call(n)})},t.fn.alert.Constructor=i,t.fn.alert.noConflict=function(){return t.fn.alert=n,this},t(document).on("click.alert.data-api",e,i.prototype.close)}(window.jQuery),function(t){"use strict";var e=function(e,i){this.$element=t(e),this.options=t.extend({},t.fn.button.defaults,i)};e.prototype.setState=function(t){var e="disabled",i=this.$element,n=i.data(),o=i.is("input")?"val":"html";t+="Text",n.resetText||i.data("resetText",i[o]()),i[o](n[t]||this.options[t]),setTimeout(function(){"loadingText"==t?i.addClass(e).attr(e,e):i.removeClass(e).removeAttr(e)},0)},e.prototype.toggle=function(){var t=this.$element.closest('[data-toggle="buttons-radio"]');t&&t.find(".active").removeClass("active"),this.$element.toggleClass("active")};var i=t.fn.button;t.fn.button=function(i){return this.each(function(){var n=t(this),o=n.data("button"),s="object"==typeof i&&i;o||n.data("button",o=new e(this,s)),"toggle"==i?o.toggle():i&&o.setState(i)})},t.fn.button.defaults={loadingText:"loading..."},t.fn.button.Constructor=e,t.fn.button.noConflict=function(){return t.fn.button=i,this},t(document).on("click.button.data-api","[data-toggle^=button]",function(e){var i=t(e.target);i.hasClass("btn")||(i=i.closest(".btn")),i.button("toggle")})}(window.jQuery),function(t){"use strict";var e=function(e,i){this.$element=t(e),this.$indicators=this.$element.find(".carousel-indicators"),this.options=i,"hover"==this.options.pause&&this.$element.on("mouseenter",t.proxy(this.pause,this)).on("mouseleave",t.proxy(this.cycle,this))};e.prototype={cycle:function(e){return e||(this.paused=!1),this.interval&&clearInterval(this.interval),this.options.interval&&!this.paused&&(this.interval=setInterval(t.proxy(this.next,this),this.options.interval)),this},getActiveIndex:function(){return this.$active=this.$element.find(".item.active"),this.$items=this.$active.parent().children(),this.$items.index(this.$active)},to:function(e){var i=this.getActiveIndex(),n=this;if(!(e>this.$items.length-1||e<0))return this.sliding?this.$element.one("slid",function(){n.to(e)}):i==e?this.pause().cycle():this.slide(e>i?"next":"prev",t(this.$items[e]))},pause:function(e){return e||(this.paused=!0),this.$element.find(".next, .prev").length&&t.support.transition.end&&(this.$element.trigger(t.support.transition.end),this.cycle(!0)),clearInterval(this.interval),this.interval=null,this},next:function(){if(!this.sliding)return this.slide("next")},prev:function(){if(!this.sliding)return this.slide("prev")},slide:function(e,i){var n,o=this.$element.find(".item.active"),s=i||o[e](),a=this.interval,r="next"==e?"left":"right",h="next"==e?"first":"last",l=this;if(this.sliding=!0,a&&this.pause(),s=s.length?s:this.$element.find(".item")[h](),n=t.Event("slide",{relatedTarget:s[0],direction:r}),!s.hasClass("active")){if(this.$indicators.length&&(this.$indicators.find(".active").removeClass("active"),this.$element.one("slid",function(){var e=t(l.$indicators.children()[l.getActiveIndex()]);e&&e.addClass("active")})),t.support.transition&&this.$element.hasClass("slide")){if(this.$element.trigger(n),n.isDefaultPrevented())return;s.addClass(e),s[0].offsetWidth,o.addClass(r),s.addClass(r),this.$element.one(t.support.transition.end,function(){s.removeClass([e,r].join(" ")).addClass("active"),o.removeClass(["active",r].join(" ")),l.sliding=!1,setTimeout(function(){l.$element.trigger("slid")},0)})}else{if(this.$element.trigger(n),n.isDefaultPrevented())return;o.removeClass("active"),s.addClass("active"),this.sliding=!1,this.$element.trigger("slid")}return a&&this.cycle(),this}}};var i=t.fn.carousel;t.fn.carousel=function(i){return this.each(function(){var n=t(this),o=n.data("carousel"),s=t.extend({},t.fn.carousel.defaults,"object"==typeof i&&i),a="string"==typeof i?i:s.slide;o||n.data("carousel",o=new e(this,s)),"number"==typeof i?o.to(i):a?o[a]():s.interval&&o.pause().cycle()})},t.fn.carousel.defaults={interval:5e3,pause:"hover"},t.fn.carousel.Constructor=e,t.fn.carousel.noConflict=function(){return t.fn.carousel=i,this},t(document).on("click.carousel.data-api","[data-slide], [data-slide-to]",function(e){var i,n,o,s=t(this),a=s.attr("data-target");a||(a="#"===(a=(a=s.attr("href"))&&a.replace(/.*(?=#[^\s]+$)/,""))?"":a),i=t(document).find(a),n=t.extend({},i.data(),s.data()),i.carousel(n),(o=s.attr("data-slide-to"))&&i.data("carousel").pause().to(o).cycle(),e.preventDefault()})}(window.jQuery),function(t){"use strict";var e=function(e,i){this.$element=t(e),this.options=t.extend({},t.fn.collapse.defaults,i),this.options.parent&&(this.$parent=t(this.options.parent)),this.options.toggle&&this.toggle()};e.prototype={constructor:e,dimension:function(){return this.$element.hasClass("width")?"width":"height"},show:function(){var e,i,n,o;if(!this.transitioning&&!this.$element.hasClass("in")){if(e=this.dimension(),i=t.camelCase(["scroll",e].join("-")),(n=this.$parent&&this.$parent.find("> .accordion-group > .in"))&&n.length){if((o=n.data("collapse"))&&o.transitioning)return;n.collapse("hide"),o||n.data("collapse",null)}this.$element[e](0),this.transition("addClass",t.Event("show"),"shown"),t.support.transition&&this.$element[e](this.$element[0][i])}},hide:function(){var e;!this.transitioning&&this.$element.hasClass("in")&&(e=this.dimension(),this.reset(this.$element[e]()),this.transition("removeClass",t.Event("hideme"),"hidden"),this.$element[e](0))},reset:function(t){var e=this.dimension();return this.$element.removeClass("collapse")[e](t||"auto")[0].offsetWidth,this.$element[null!==t?"addClass":"removeClass"]("collapse"),this},transition:function(e,i,n){var o=this,s=function(){"show"==i.type&&o.reset(),o.transitioning=0,o.$element.trigger(n)};this.$element.trigger(i),i.isDefaultPrevented()||(this.transitioning=1,this.$element[e]("in"),t.support.transition&&this.$element.hasClass("collapse")?this.$element.one(t.support.transition.end,s):s())},toggle:function(){this[this.$element.hasClass("in")?"hide":"show"]()}};var i=t.fn.collapse;t.fn.collapse=function(i){return this.each(function(){var n=t(this),o=n.data("collapse"),s=t.extend({},t.fn.collapse.defaults,n.data(),"object"==typeof i&&i);o||n.data("collapse",o=new e(this,s)),"string"==typeof i&&o[i]()})},t.fn.collapse.defaults={toggle:!0},t.fn.collapse.Constructor=e,t.fn.collapse.noConflict=function(){return t.fn.collapse=i,this},t(document).on("click.collapse.data-api","[data-toggle=collapse]",function(e){var i,n,o=t(this),s=o.attr("data-target");s||(e.preventDefault(),s="#"===(s=(s=o.attr("href"))&&s.replace(/.*(?=#[^\s]+$)/,""))?"":s),i=(n=t(document).find(s)).data("collapse")?"toggle":o.data(),o[n.hasClass("in")?"addClass":"removeClass"]("collapsed"),n.collapse(i)})}(window.jQuery),function(t){"use strict";function e(){t(n).parent().parent().removeClass("nav-hover"),t(".dropdown-backdrop").remove(),t(n).each(function(){i(t(this)).removeClass("open")})}function i(e){var i,n=e.attr("data-target");return n||(n=(n=e.attr("href"))&&/#/.test(n)&&n.replace(/.*(?=#[^\s]+$)/,"")),n="#"===n?[]:n,(i=n&&t(document).find(n))&&i.length||(i=e.parent()),i}var n="[data-toggle=dropdown]",o=function(e){var i=t(e).on("click.dropdown.data-api",this.toggle).on("mouseover.dropdown.data-api",this.toggle);t("html").on("click.dropdown.data-api",function(){i.parent().parent().removeClass("nav-hover"),i.parent().removeClass("open")})};o.prototype={constructor:o,toggle:function(n){var o,s,a,r,h=t(this);if(!h.is(".disabled, :disabled")&&(o=i(h),s=o.hasClass("open"),(r=o.parent().hasClass("nav-hover"))||"mouseover"!=n.type)){if(a=h.attr("href"),"click"!=n.type||!a||"#"===a)return e(),(!s&&"mouseover"!=n.type||r&&"mouseover"==n.type)&&("ontouchstart"in document.documentElement&&(t('<div class="dropdown-backdrop"/>').insertBefore(t(this)).on("click",e),h.on("hover",function(){t(".dropdown-backdrop").remove()})),o.parent().toggleClass("nav-hover"),o.toggleClass("open")),h.focus(),!1;window.location=a}},keydown:function(e){var o,s,a,r,h;if(/(38|40|27)/.test(e.keyCode)&&(o=t(this),e.preventDefault(),e.stopPropagation(),!o.is(".disabled, :disabled"))){if(a=i(o),!(r=a.hasClass("open"))||r&&27==e.keyCode)return 27==e.which&&a.find(n).focus(),o.click();(s=t("[role=menu] li:not(.divider):visible a",a)).length&&(h=s.index(s.filter(":focus")),38==e.keyCode&&h>0&&h--,40==e.keyCode&&h<s.length-1&&h++,~h||(h=0),s.eq(h).focus())}}};var s=t.fn.dropdown;t.fn.dropdown=function(e){return this.each(function(){var i=t(this),n=i.data("dropdown");n||i.data("dropdown",n=new o(this)),"string"==typeof e&&n[e].call(i)})},t.fn.dropdown.Constructor=o,t.fn.dropdown.noConflict=function(){return t.fn.dropdown=s,this},t(document).on("click.dropdown.data-api",e).on("click.dropdown.data-api",".dropdown form",function(t){t.stopPropagation()}).on("click.dropdown.data-api",n,o.prototype.toggle).on("keydown.dropdown.data-api",n+", [role=menu]",o.prototype.keydown).on("mouseover.dropdown.data-api",n,o.prototype.toggle)}(window.jQuery),function(t){"use strict";var e=function(e,i){this.options=i,this.$element=t(e).delegate('[data-dismiss="modal"]',"click.dismiss.modal",t.proxy(this.hide,this)),this.options.remote&&this.$element.find(".modal-body").load(this.options.remote)};e.prototype={constructor:e,toggle:function(){return this[this.isShown?"hide":"show"]()},show:function(){var e=this,i=t.Event("show");this.$element.trigger(i),this.isShown||i.isDefaultPrevented()||(this.isShown=!0,this.escape(),this.backdrop(function(){var i=t.support.transition&&e.$element.hasClass("fade");e.$element.parent().length||e.$element.appendTo(document.body),e.$element.show(),i&&e.$element[0].offsetWidth,e.$element.addClass("in").attr("aria-hidden",!1),e.enforceFocus(),i?e.$element.one(t.support.transition.end,function(){e.$element.focus().trigger("shown")}):e.$element.focus().trigger("shown")}))},hide:function(e){e&&e.preventDefault();e=t.Event("hide"),this.$element.trigger(e),this.isShown&&!e.isDefaultPrevented()&&(this.isShown=!1,this.escape(),t(document).off("focusin.modal"),this.$element.removeClass("in").attr("aria-hidden",!0),t.support.transition&&this.$element.hasClass("fade")?this.hideWithTransition():this.hideModal())},enforceFocus:function(){var e=this;t(document).on("focusin.modal",function(t){e.$element[0]===t.target||e.$element.has(t.target).length||e.$element.focus()})},escape:function(){var t=this;this.isShown&&this.options.keyboard?this.$element.on("keyup.dismiss.modal",function(e){27==e.which&&t.hide()}):this.isShown||this.$element.off("keyup.dismiss.modal")},hideWithTransition:function(){var e=this,i=setTimeout(function(){e.$element.off(t.support.transition.end),e.hideModal()},500);this.$element.one(t.support.transition.end,function(){clearTimeout(i),e.hideModal()})},hideModal:function(){var t=this;this.$element.hide(),this.backdrop(function(){t.removeBackdrop(),t.$element.trigger("hidden")})},removeBackdrop:function(){this.$backdrop&&this.$backdrop.remove(),this.$backdrop=null},backdrop:function(e){var i=this.$element.hasClass("fade")?"fade":"";if(this.isShown&&this.options.backdrop){var n=t.support.transition&&i;if(this.$backdrop=t('<div class="modal-backdrop '+i+'" />').appendTo(document.body),this.$backdrop.click("static"==this.options.backdrop?t.proxy(this.$element[0].focus,this.$element[0]):t.proxy(this.hide,this)),n&&this.$backdrop[0].offsetWidth,this.$backdrop.addClass("in"),!e)return;n?this.$backdrop.one(t.support.transition.end,e):e()}else!this.isShown&&this.$backdrop?(this.$backdrop.removeClass("in"),t.support.transition&&this.$element.hasClass("fade")?this.$backdrop.one(t.support.transition.end,e):e()):e&&e()}};var i=t.fn.modal;t.fn.modal=function(i){return this.each(function(){var n=t(this),o=n.data("modal"),s=t.extend({},t.fn.modal.defaults,n.data(),"object"==typeof i&&i);o||n.data("modal",o=new e(this,s)),"string"==typeof i?o[i]():s.show&&o.show()})},t.fn.modal.defaults={backdrop:!0,keyboard:!0,show:!0},t.fn.modal.Constructor=e,t.fn.modal.noConflict=function(){return t.fn.modal=i,this},t(document).on("click.modal.data-api",'[data-toggle="modal"]',function(e){var i,n,o=t(this),s=o.attr("href"),a=o.attr("data-target");e.preventDefault(),a||(a="#"===(a=(a=s)&&a.replace(/.*(?=#[^\s]+$)/,""))?"":a),n=(i=t(document).find(a)).data("modal")?"toggle":t.extend({remote:!/#/.test(s)&&s},i.data(),o.data()),i.modal(n).one("hide",function(){o.focus()})})}(window.jQuery),function(t){"use strict";var e=function(t,e){this.init("tooltip",t,e)};e.prototype={constructor:e,init:function(e,i,n){var o,s,a,r,h;for(this.type=e,this.$element=t(i),this.options=this.getOptions(n),this.enabled=!0,h=(a=this.options.trigger.split(" ")).length;h--;)"click"==(r=a[h])?this.$element.on("click."+this.type,this.options.selector,t.proxy(this.toggle,this)):"manual"!=r&&(o="hover"==r?"mouseenter":"focus",s="hover"==r?"mouseleave":"blur",this.$element.on(o+"."+this.type,this.options.selector,t.proxy(this.enter,this)),this.$element.on(s+"."+this.type,this.options.selector,t.proxy(this.leave,this)));this.options.selector?this._options=t.extend({},this.options,{trigger:"manual",selector:""}):this.fixTitle()},getOptions:function(e){return(e=t.extend({},t.fn[this.type].defaults,this.$element.data(),e)).delay&&"number"==typeof e.delay&&(e.delay={show:e.delay,hide:e.delay}),e},enter:function(e){var i,n=t.fn[this.type].defaults,o={};if(this._options&&t.each(this._options,function(t,e){n[t]!=e&&(o[t]=e)},this),!(i=t(e.currentTarget)[this.type](o).data(this.type)).options.delay||!i.options.delay.show)return i.show();clearTimeout(this.timeout),i.hoverState="in",this.timeout=setTimeout(function(){"in"==i.hoverState&&i.show()},i.options.delay.show)},leave:function(e){var i=t(e.currentTarget)[this.type](this._options).data(this.type);if(this.timeout&&clearTimeout(this.timeout),!i.options.delay||!i.options.delay.hide)return i.hide();i.hoverState="out",this.timeout=setTimeout(function(){"out"==i.hoverState&&i.hide()},i.options.delay.hide)},show:function(){var e,i,n,o,s,a,r=t.Event("show");if(this.hasContent()&&this.enabled){if(this.$element.trigger(r),r.isDefaultPrevented())return;switch(e=this.tip(),this.setContent(),this.options.animation&&e.addClass("fade"),s="function"==typeof this.options.placement?this.options.placement.call(this,e[0],this.$element[0]):this.options.placement,e.detach().css({top:0,left:0,display:"block"}),this.options.container?e.appendTo(this.options.container):e.insertAfter(this.$element),i=this.getPosition(),n=e[0].offsetWidth,o=e[0].offsetHeight,s){case"bottom":a={top:i.top+i.height,left:i.left+i.width/2-n/2};break;case"top":a={top:i.top-o,left:i.left+i.width/2-n/2};break;case"left":a={top:i.top+i.height/2-o/2,left:i.left-n};break;case"right":a={top:i.top+i.height/2-o/2,left:i.left+i.width}}this.applyPlacement(a,s),this.$element.trigger("shown")}},applyPlacement:function(t,e){var i,n,o,s,a=this.tip(),r=a[0].offsetWidth,h=a[0].offsetHeight;a.offset(t).addClass(e).addClass("in"),i=a[0].offsetWidth,n=a[0].offsetHeight,"top"==e&&n!=h&&(t.top=t.top+h-n,s=!0),"bottom"==e||"top"==e?(o=0,t.left<0&&(o=-2*t.left,t.left=0,a.offset(t),i=a[0].offsetWidth,n=a[0].offsetHeight),this.replaceArrow(o-r+i,i,"left")):this.replaceArrow(n-h,n,"top"),s&&a.offset(t)},replaceArrow:function(t,e,i){this.arrow().css(i,t?50*(1-t/e)+"%":"")},setContent:function(){var t=this.tip(),e=this.getTitle();t.find(".tooltip-inner")[this.options.html?"html":"text"](e),t.removeClass("fade in top bottom left right")},hide:function(){var e=this.tip(),i=t.Event("hideme");if(this.$element.trigger(i),!i.isDefaultPrevented())return e.removeClass("in"),t.support.transition&&this.$tip.hasClass("fade")?function(){var i=setTimeout(function(){e.off(t.support.transition.end).detach()},500);e.one(t.support.transition.end,function(){clearTimeout(i),e.detach()})}():e.detach(),this.$element.trigger("hidden"),this},fixTitle:function(){var t=this.$element;(t.attr("title")||"string"!=typeof t.attr("data-original-title"))&&t.attr("data-original-title",t.attr("title")||"").attr("title","")},hasContent:function(){return this.getTitle()},getPosition:function(){var e=this.$element[0];return t.extend({},"function"==typeof e.getBoundingClientRect?e.getBoundingClientRect():{width:e.offsetWidth,height:e.offsetHeight},this.$element.offset())},getTitle:function(){var t=this.$element,e=this.options;return t.attr("data-original-title")||("function"==typeof e.title?e.title.call(t[0]):e.title)},tip:function(){return this.$tip=this.$tip||t(this.options.template)},arrow:function(){return this.$arrow=this.$arrow||this.tip().find(".tooltip-arrow")},validate:function(){this.$element[0].parentNode||(this.hide(),this.$element=null,this.options=null)},enable:function(){this.enabled=!0},disable:function(){this.enabled=!1},toggleEnabled:function(){this.enabled=!this.enabled},toggle:function(e){var i=e?t(e.currentTarget)[this.type](this._options).data(this.type):this;i.tip().hasClass("in")?i.hide():i.show()},destroy:function(){this.hide().$element.off("."+this.type).removeData(this.type)}};var i=t.fn.tooltip;t.fn.tooltip=function(i){return this.each(function(){var n=t(this),o=n.data("tooltip"),s="object"==typeof i&&i;o||n.data("tooltip",o=new e(this,s)),"string"==typeof i&&o[i]()})},t.fn.tooltip.Constructor=e,t.fn.tooltip.defaults={animation:!0,placement:"top",selector:!1,template:'<div class="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner"></div></div>',trigger:"hover focus",title:"",delay:0,html:!0,container:!1},t.fn.tooltip.noConflict=function(){return t.fn.tooltip=i,this}}(window.jQuery),function(t){"use strict";var e=function(t,e){this.init("popover",t,e)};e.prototype=t.extend({},t.fn.tooltip.Constructor.prototype,{constructor:e,setContent:function(){var t=this.tip(),e=this.getTitle(),i=this.getContent();t.find(".popover-title")[this.options.html?"html":"text"](e),t.find(".popover-content")[this.options.html?"html":"text"](i),t.removeClass("fade top bottom left right in")},hasContent:function(){return this.getTitle()||this.getContent()},getContent:function(){var t=this.$element,e=this.options;return("function"==typeof e.content?e.content.call(t[0]):e.content)||t.attr("data-content")},tip:function(){return this.$tip||(this.$tip=t(this.options.template)),this.$tip},destroy:function(){this.hide().$element.off("."+this.type).removeData(this.type)}});var i=t.fn.popover;t.fn.popover=function(i){return this.each(function(){var n=t(this),o=n.data("popover"),s="object"==typeof i&&i;o||n.data("popover",o=new e(this,s)),"string"==typeof i&&o[i]()})},t.fn.popover.Constructor=e,t.fn.popover.defaults=t.extend({},t.fn.tooltip.defaults,{placement:"right",trigger:"click",content:"",template:'<div class="popover"><div class="arrow"></div><h3 class="popover-title"></h3><div class="popover-content"></div></div>'}),t.fn.popover.noConflict=function(){return t.fn.popover=i,this}}(window.jQuery),function(t){"use strict";function e(e,i){var n,o=t.proxy(this.process,this),s=t(t(e).is("body")?window:e);this.options=t.extend({},t.fn.scrollspy.defaults,i),this.$scrollElement=s.on("scroll.scroll-spy.data-api",o),this.selector=(this.options.target||(n=t(e).attr("href"))&&n.replace(/.*(?=#[^\s]+$)/,"")||"")+" .nav li > a",this.$body=t("body"),this.refresh(),this.process()}e.prototype={constructor:e,refresh:function(){var e=this;this.offsets=t([]),this.targets=t([]),this.$body.find(this.selector).map(function(){var i=t(this),n=i.data("target")||i.attr("href"),o=/^#\w/.test(n)&&t(n);return o&&o.length&&[[o.position().top+(!t.isWindow(e.$scrollElement.get(0))&&e.$scrollElement.scrollTop()),n]]||null}).sort(function(t,e){return t[0]-e[0]}).each(function(){e.offsets.push(this[0]),e.targets.push(this[1])})},process:function(){var t,e=this.$scrollElement.scrollTop()+this.options.offset,i=(this.$scrollElement[0].scrollHeight||this.$body[0].scrollHeight)-this.$scrollElement.height(),n=this.offsets,o=this.targets,s=this.activeTarget;if(e>=i)return s!=(t=o.last()[0])&&this.activate(t);for(t=n.length;t--;)s!=o[t]&&e>=n[t]&&(!n[t+1]||e<=n[t+1])&&this.activate(o[t])},activate:function(e){var i,n;this.activeTarget=e,t(this.selector).parent(".active").removeClass("active"),n=this.selector+'[data-target="'+e+'"],'+this.selector+'[href="'+e+'"]',(i=t(document).find(n).parent("li").addClass("active")).parent(".dropdown-menu").length&&(i=i.closest("li.dropdown").addClass("active")),i.trigger("activate")}};var i=t.fn.scrollspy;t.fn.scrollspy=function(i){return this.each(function(){var n=t(this),o=n.data("scrollspy"),s="object"==typeof i&&i;o||n.data("scrollspy",o=new e(this,s)),"string"==typeof i&&o[i]()})},t.fn.scrollspy.Constructor=e,t.fn.scrollspy.defaults={offset:10},t.fn.scrollspy.noConflict=function(){return t.fn.scrollspy=i,this},t(window).on("load",function(){t('[data-spy="scroll"]').each(function(){var e=t(this);e.scrollspy(e.data())})})}(window.jQuery),function(t){"use strict";var e=function(e){this.element=t(e)};e.prototype={constructor:e,show:function(){var e,i,n,o=this.element,s=o.closest("ul:not(.dropdown-menu)"),a=o.attr("data-target");a||(a=(a=o.attr("href"))&&a.replace(/.*(?=#[^\s]*$)/,"")),o.parent("li").hasClass("active")||(e=s.find(".active:last a")[0],n=t.Event("show",{relatedTarget:e}),o.trigger(n),n.isDefaultPrevented()||(i=t(document).find(a),this.activate(o.parent("li"),s),this.activate(i,i.parent(),function(){o.trigger({type:"shown",relatedTarget:e})})))},activate:function(e,i,n){function o(){s.removeClass("active").find("> .dropdown-menu > .active").removeClass("active"),e.addClass("active"),a?(e[0].offsetWidth,e.addClass("in")):e.removeClass("fade"),e.parent(".dropdown-menu")&&e.closest("li.dropdown").addClass("active"),n&&n()}var s=i.find("> .active"),a=n&&t.support.transition&&s.hasClass("fade");a?s.one(t.support.transition.end,o):o(),s.removeClass("in")}};var i=t.fn.tab;t.fn.tab=function(i){return this.each(function(){var n=t(this),o=n.data("tab");o||n.data("tab",o=new e(this)),"string"==typeof i&&o[i]()})},t.fn.tab.Constructor=e,t.fn.tab.noConflict=function(){return t.fn.tab=i,this},t(document).on("click.tab.data-api",'[data-toggle="tab"], [data-toggle="pill"]',function(e){e.preventDefault(),t(this).tab("show")})}(window.jQuery),function(t){"use strict";var e=function(e,i){this.$element=t(e),this.options=t.extend({},t.fn.typeahead.defaults,i),this.matcher=this.options.matcher||this.matcher,this.sorter=this.options.sorter||this.sorter,this.highlighter=this.options.highlighter||this.highlighter,this.updater=this.options.updater||this.updater,this.source=this.options.source,this.$menu=t(this.options.menu),this.shown=!1,this.listen()};e.prototype={constructor:e,select:function(){var t=this.$menu.find(".active").attr("data-value");return this.$element.val(this.updater(t)).change(),this.hide()},updater:function(t){return t},show:function(){var e=t.extend({},this.$element.position(),{height:this.$element[0].offsetHeight});return this.$menu.insertAfter(this.$element).css({top:e.top+e.height,left:e.left}).show(),this.shown=!0,this},hide:function(){return this.$menu.hide(),this.shown=!1,this},lookup:function(e){var i;return this.query=this.$element.val(),!this.query||this.query.length<this.options.minLength?this.shown?this.hide():this:(i=t.isFunction(this.source)?this.source(this.query,t.proxy(this.process,this)):this.source,i?this.process(i):this)},process:function(e){var i=this;return e=t.grep(e,function(t){return i.matcher(t)}),e=this.sorter(e),e.length?this.render(e.slice(0,this.options.items)).show():this.shown?this.hide():this},matcher:function(t){return~t.toLowerCase().indexOf(this.query.toLowerCase())},sorter:function(t){for(var e,i=[],n=[],o=[];e=t.shift();)e.toLowerCase().indexOf(this.query.toLowerCase())?~e.indexOf(this.query)?n.push(e):o.push(e):i.push(e);return i.concat(n,o)},highlighter:function(t){var e=this.query.replace(/[\-\[\]{}()*+?.,\\\^$|#\s]/g,"\\$&");return t.replace(new RegExp("("+e+")","ig"),function(t,e){return"<strong>"+e+"</strong>"})},render:function(e){var i=this;return(e=t(e).map(function(e,n){return(e=t(i.options.item).attr("data-value",n)).find("a").html(i.highlighter(n)),e[0]})).first().addClass("active"),this.$menu.html(e),this},next:function(e){var i=this.$menu.find(".active").removeClass("active").next();i.length||(i=t(this.$menu.find("li")[0])),i.addClass("active")},prev:function(t){var e=this.$menu.find(".active").removeClass("active").prev();e.length||(e=this.$menu.find("li").last()),e.addClass("active")},listen:function(){this.$element.on("focus",t.proxy(this.focus,this)).on("blur",t.proxy(this.blur,this)).on("keypress",t.proxy(this.keypress,this)).on("keyup",t.proxy(this.keyup,this)),this.eventSupported("keydown")&&this.$element.on("keydown",t.proxy(this.keydown,this)),this.$menu.on("click",t.proxy(this.click,this)).on("mouseenter","li",t.proxy(this.mouseenter,this)).on("mouseleave","li",t.proxy(this.mouseleave,this))},eventSupported:function(t){var e=t in this.$element;return e||(this.$element.setAttribute(t,"return;"),e="function"==typeof this.$element[t]),e},move:function(t){if(this.shown){switch(t.keyCode){case 9:case 13:case 27:t.preventDefault();break;case 38:t.preventDefault(),this.prev();break;case 40:t.preventDefault(),this.next()}t.stopPropagation()}},keydown:function(e){this.suppressKeyPressRepeat=~t.inArray(e.keyCode,[40,38,9,13,27]),this.move(e)},keypress:function(t){this.suppressKeyPressRepeat||this.move(t)},keyup:function(t){switch(t.keyCode){case 40:case 38:case 16:case 17:case 18:break;case 9:case 13:if(!this.shown)return;this.select();break;case 27:if(!this.shown)return;this.hide();break;default:this.lookup()}t.stopPropagation(),t.preventDefault()},focus:function(t){this.focused=!0},blur:function(t){this.focused=!1,!this.mousedover&&this.shown&&this.hide()},click:function(t){t.stopPropagation(),t.preventDefault(),this.select(),this.$element.focus()},mouseenter:function(e){this.mousedover=!0,this.$menu.find(".active").removeClass("active"),t(e.currentTarget).addClass("active")},mouseleave:function(t){this.mousedover=!1,!this.focused&&this.shown&&this.hide()}};var i=t.fn.typeahead;t.fn.typeahead=function(i){return this.each(function(){var n=t(this),o=n.data("typeahead"),s="object"==typeof i&&i;o||n.data("typeahead",o=new e(this,s)),"string"==typeof i&&o[i]()})},t.fn.typeahead.defaults={source:[],items:8,menu:'<ul class="typeahead dropdown-menu"></ul>',item:'<li><a href="#"></a></li>',minLength:1},t.fn.typeahead.Constructor=e,t.fn.typeahead.noConflict=function(){return t.fn.typeahead=i,this},t(document).on("focus.typeahead.data-api",'[data-provide="typeahead"]',function(e){var i=t(this);i.data("typeahead")||i.typeahead(i.data())})}(window.jQuery),function(t){"use strict";var e=function(e,i){this.options=t.extend({},t.fn.affix.defaults,i),this.$window=t(window).on("scroll.affix.data-api",t.proxy(this.checkPosition,this)).on("click.affix.data-api",t.proxy(function(){setTimeout(t.proxy(this.checkPosition,this),1)},this)),this.$element=t(e),this.checkPosition()};e.prototype.checkPosition=function(){if(this.$element.is(":visible")){var e,i=t(document).height(),n=this.$window.scrollTop(),o=this.$element.offset(),s=this.options.offset,a=s.bottom,r=s.top;"object"!=typeof s&&(a=r=s),"function"==typeof r&&(r=s.top()),"function"==typeof a&&(a=s.bottom()),e=!(null!=this.unpin&&n+this.unpin<=o.top)&&(null!=a&&o.top+this.$element.height()>=i-a?"bottom":null!=r&&n<=r&&"top"),this.affixed!==e&&(this.affixed=e,this.unpin="bottom"==e?o.top-n:null,this.$element.removeClass("affix affix-top affix-bottom").addClass("affix"+(e?"-"+e:"")))}};var i=t.fn.affix;t.fn.affix=function(i){return this.each(function(){var n=t(this),o=n.data("affix"),s="object"==typeof i&&i;o||n.data("affix",o=new e(this,s)),"string"==typeof i&&o[i]()})},t.fn.affix.Constructor=e,t.fn.affix.defaults={offset:0},t.fn.affix.noConflict=function(){return t.fn.affix=i,this},t(window).on("load",function(){t('[data-spy="affix"]').each(function(){var e=t(this),i=e.data();i.offset=i.offset||{},i.offsetBottom&&(i.offset.bottom=i.offsetBottom),i.offsetTop&&(i.offset.top=i.offsetTop),e.affix(i)})})}(window.jQuery);
} catch (e) {
console.error('Error in file:/media/jui/js/bootstrap.min.js; Error:' + e.message);
};
";s:12:"critical_css";s:0:"";}s:6:"output";s:0:"";}