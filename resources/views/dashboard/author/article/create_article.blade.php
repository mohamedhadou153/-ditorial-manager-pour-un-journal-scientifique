@extends('dashboard.author.home')
@section('style')


	<script >

         !function(a,b){function c(a,b){o(a).push(b)}function d(d,e,f){var g=d.children(e.headerTag),h=d.children(e.bodyTag);g.length>h.length?R(Z,"contents"):g.length<h.length&&R(Z,"titles");var i=e.startIndex;if(f.stepCount=g.length,e.saveState&&a.cookie){var j=a.cookie(U+q(d)),k=parseInt(j,0);!isNaN(k)&&k<f.stepCount&&(i=k)}f.currentIndex=i,g.each(function(e){var f=a(this),g=h.eq(e),i=g.data("mode"),j=null==i?$.html:r($,/^\s*$/.test(i)||isNaN(i)?i:parseInt(i,0)),k=j===$.html||g.data("url")===b?"":g.data("url"),l=j!==$.html&&"1"===g.data("loaded"),m=a.extend({},bb,{title:f.html(),content:j===$.html?g.html():"",contentUrl:k,contentMode:j,contentLoaded:l});c(d,m)})}function e(a){a.triggerHandler("canceled")}function f(a,b){return a.currentIndex-b}function g(b,c){var d=i(b);b.unbind(d).removeData("uid").removeData("options").removeData("state").removeData("steps").removeData("eventNamespace").find(".actions a").unbind(d),b.removeClass(c.clearFixCssClass+" vertical");var e=b.find(".content > *");e.removeData("loaded").removeData("mode").removeData("url"),e.removeAttr("id").removeAttr("role").removeAttr("tabindex").removeAttr("class").removeAttr("style")._removeAria("labelledby")._removeAria("hidden"),b.find(".content > [data-mode='async'],.content > [data-mode='iframe']").empty();var f=a('<{0} class="{1}"></{0}>'.format(b.get(0).tagName,b.attr("class"))),g=b._id();return null!=g&&""!==g&&f._id(g),f.html(b.find(".content").html()),b.after(f),b.remove(),f}function h(a,b){var c=a.find(".steps li").eq(b.currentIndex);a.triggerHandler("finishing",[b.currentIndex])?(c.addClass("done").removeClass("error"),a.triggerHandler("finished",[b.currentIndex])):c.addClass("error")}function i(a){var b=a.data("eventNamespace");return null==b&&(b="."+q(a),a.data("eventNamespace",b)),b}function j(a,b){var c=q(a);return a.find("#"+c+V+b)}function k(a,b){var c=q(a);return a.find("#"+c+W+b)}function l(a,b){var c=q(a);return a.find("#"+c+X+b)}function m(a){return a.data("options")}function n(a){return a.data("state")}function o(a){return a.data("steps")}function p(a,b){var c=o(a);return(0>b||b>=c.length)&&R(Y),c[b]}function q(a){var b=a.data("uid");return null==b&&(b=a._id(),null==b&&(b="steps-uid-".concat(T),a._id(b)),T++,a.data("uid",b)),b}function r(a,c){if(S("enumType",a),S("keyOrValue",c),"string"==typeof c){var d=a[c];return d===b&&R("The enum key '{0}' does not exist.",c),d}if("number"==typeof c){for(var e in a)if(a[e]===c)return c;R("Invalid enum value '{0}'.",c)}else R("Invalid key or value type.")}function s(a,b,c){return B(a,b,c,v(c,1))}function t(a,b,c){return B(a,b,c,f(c,1))}function u(a,b,c,d){if((0>d||d>=c.stepCount)&&R(Y),!(b.forceMoveForward&&d<c.currentIndex)){var e=c.currentIndex;return a.triggerHandler("stepChanging",[c.currentIndex,d])?(c.currentIndex=d,O(a,b,c),E(a,b,c,e),D(a,b,c),A(a,b,c),P(a,b,c,d,e,function(){a.triggerHandler("stepChanged",[d,e])})):a.find(".steps li").eq(e).addClass("error"),!0}}function v(a,b){return a.currentIndex+b}function w(b){var c=a.extend(!0,{},cb,b);return this.each(function(){var b=a(this),e={currentIndex:c.startIndex,currentStep:null,stepCount:0,transitionElement:null};b.data("options",c),b.data("state",e),b.data("steps",[]),d(b,c,e),J(b,c,e),G(b,c),c.autoFocus&&0===T&&j(b,c.startIndex).focus(),b.triggerHandler("init",[c.startIndex])})}function x(b,c,d,e,f){(0>e||e>d.stepCount)&&R(Y),f=a.extend({},bb,f),y(b,e,f),d.currentIndex!==d.stepCount&&d.currentIndex>=e&&(d.currentIndex++,O(b,c,d)),d.stepCount++;var g=b.find(".content"),h=a("<{0}>{1}</{0}>".format(c.headerTag,f.title)),i=a("<{0}></{0}>".format(c.bodyTag));return(null==f.contentMode||f.contentMode===$.html)&&i.html(f.content),0===e?g.prepend(i).prepend(h):k(b,e-1).after(i).after(h),K(b,d,i,e),N(b,c,d,h,e),F(b,c,d,e),e===d.currentIndex&&E(b,c,d),D(b,c,d),b}function y(a,b,c){o(a).splice(b,0,c)}function z(b){var c=a(this),d=m(c),e=n(c);if(d.suppressPaginationOnFocus&&c.find(":focus").is(":input"))return b.preventDefault(),!1;var f={left:37,right:39};b.keyCode===f.left?(b.preventDefault(),t(c,d,e)):b.keyCode===f.right&&(b.preventDefault(),s(c,d,e))}function A(b,c,d){if(d.stepCount>0){var e=d.currentIndex,f=p(b,e);if(!c.enableContentCache||!f.contentLoaded)switch(r($,f.contentMode)){case $.iframe:b.find(".content > .body").eq(d.currentIndex).empty().html('<iframe src="'+f.contentUrl+'" frameborder="0" scrolling="no" />').data("loaded","1");break;case $.async:var g=k(b,e)._aria("busy","true").empty().append(M(c.loadingTemplate,{text:c.labels.loading}));a.ajax({url:f.contentUrl,cache:!1}).done(function(a){g.empty().html(a)._aria("busy","false").data("loaded","1"),b.triggerHandler("contentLoaded",[e])})}}}function B(a,b,c,d){var e=c.currentIndex;if(d>=0&&d<c.stepCount&&!(b.forceMoveForward&&d<c.currentIndex)){var f=j(a,d),g=f.parent(),h=g.hasClass("disabled");return g._enableAria(),f.click(),e===c.currentIndex&&h?(g._enableAria(!1),!1):!0}return!1}function C(b){b.preventDefault();var c=a(this),d=c.parent().parent().parent().parent(),f=m(d),g=n(d),i=c.attr("href");switch(i.substring(i.lastIndexOf("#")+1)){case"cancel":e(d);break;case"finish":h(d,g);break;case"next":s(d,f,g);break;case"previous":t(d,f,g)}}function D(a,b,c){if(b.enablePagination){var d=a.find(".actions a[href$='#finish']").parent(),e=a.find(".actions a[href$='#next']").parent();if(!b.forceMoveForward){var f=a.find(".actions a[href$='#previous']").parent();f._enableAria(c.currentIndex>0)}b.enableFinishButton&&b.showFinishButtonAlways?(d._enableAria(c.stepCount>0),e._enableAria(c.stepCount>1&&c.stepCount>c.currentIndex+1)):(d._showAria(b.enableFinishButton&&c.stepCount===c.currentIndex+1),e._showAria(0===c.stepCount||c.stepCount>c.currentIndex+1)._enableAria(c.stepCount>c.currentIndex+1||!b.enableFinishButton))}}function E(b,c,d,e){var f=j(b,d.currentIndex),g=a('<span class="current-info audible">'+c.labels.current+" </span>"),h=b.find(".content > .title");if(null!=e){var i=j(b,e);i.parent().addClass("done").removeClass("error")._selectAria(!1),h.eq(e).removeClass("current").next(".body").removeClass("current"),g=i.find(".current-info"),f.focus()}f.prepend(g).parent()._selectAria().removeClass("done")._enableAria(),h.eq(d.currentIndex).addClass("current").next(".body").addClass("current")}function F(a,b,c,d){for(var e=q(a),f=d;f<c.stepCount;f++){var g=e+V+f,h=e+W+f,i=e+X+f,j=a.find(".title").eq(f)._id(i);a.find(".steps a").eq(f)._id(g)._aria("controls",h).attr("href","#"+i).html(M(b.titleTemplate,{index:f+1,title:j.html()})),a.find(".body").eq(f)._id(h)._aria("labelledby",i)}}function G(a,b){var c=i(a);a.bind("canceled"+c,b.onCanceled),a.bind("contentLoaded"+c,b.onContentLoaded),a.bind("finishing"+c,b.onFinishing),a.bind("finished"+c,b.onFinished),a.bind("init"+c,b.onInit),a.bind("stepChanging"+c,b.onStepChanging),a.bind("stepChanged"+c,b.onStepChanged),b.enableKeyNavigation&&a.bind("keyup"+c,z),a.find(".actions a").bind("click"+c,C)}function H(a,b,c,d){return 0>d||d>=c.stepCount||c.currentIndex===d?!1:(I(a,d),c.currentIndex>d&&(c.currentIndex--,O(a,b,c)),c.stepCount--,l(a,d).remove(),k(a,d).remove(),j(a,d).parent().remove(),0===d&&a.find(".steps li").first().addClass("first"),d===c.stepCount&&a.find(".steps li").eq(d).addClass("last"),F(a,b,c,d),D(a,b,c),!0)}function I(a,b){o(a).splice(b,1)}function J(b,c,d){var e='<{0} class="{1}">{2}</{0}>',f=r(_,c.stepsOrientation),g=f===_.vertical?" vertical":"",h=a(e.format(c.contentContainerTag,"content "+c.clearFixCssClass,b.html())),i=a(e.format(c.stepsContainerTag,"steps "+c.clearFixCssClass,'<ul role="tablist"></ul>')),j=h.children(c.headerTag),k=h.children(c.bodyTag);b.attr("role","application").empty().append(i).append(h).addClass(c.cssClass+" "+c.clearFixCssClass+g),k.each(function(c){K(b,d,a(this),c)}),j.each(function(e){N(b,c,d,a(this),e)}),E(b,c,d),L(b,c,d)}function K(a,b,c,d){var e=q(a),f=e+W+d,g=e+X+d;c._id(f).attr("role","tabpanel")._aria("labelledby",g).addClass("body")._showAria(b.currentIndex===d)}function L(a,b,c){if(b.enablePagination){var d='<{0} class="actions {1}"><ul role="menu" aria-label="{2}">{3}</ul></{0}>',e='<li><a href="#{0}" role="menuitem">{1}</a></li>',f="";b.forceMoveForward||(f+=e.format("previous",b.labels.previous)),f+=e.format("next",b.labels.next),a.append(d.format(b.actionContainerTag,b.clearFixCssClass,b.labels.pagination,f)),D(a,b,c),A(a,b,c)}}function M(a,c){for(var d=a.match(/#([a-z]*)#/gi),e=0;e<d.length;e++){var f=d[e],g=f.substring(1,f.length-1);c[g]===b&&R("The key '{0}' does not exist in the substitute collection!",g),a=a.replace(f,c[g])}return a}function N(b,c,d,e,f){var g=q(b),h=g+V+f,j=g+W+f,k=g+X+f,l=b.find(".steps > ul"),m=M(c.titleTemplate,{index:f+1,title:e.html()}),n=a('<li role="tab"><a id="'+h+'" href="#'+k+'" aria-controls="'+j+'">'+m+"</a></li>");n._enableAria(c.enableAllSteps||d.currentIndex>f),d.currentIndex>f&&n.addClass("done"),e._id(k).attr("tabindex","-1").addClass("title"),0===f?l.prepend(n):l.find("li").eq(f-1).after(n),0===f&&l.find("li").removeClass("first").eq(f).addClass("first"),f===d.stepCount-1&&l.find("li").removeClass("last").eq(f).addClass("last"),n.children("a").bind("click"+i(b),Q)}function O(b,c,d){c.saveState&&a.cookie&&a.cookie(U+q(b),d.currentIndex)}function P(b,c,d,e,f,g){var h=b.find(".content > .body"),i=r(ab,c.transitionEffect),j=c.transitionEffectSpeed,k=h.eq(e),l=h.eq(f);switch(i){case ab.fade:case ab.slide:var m=i===ab.fade?"fadeOut":"slideUp",o=i===ab.fade?"fadeIn":"slideDown";d.transitionElement=k,l[m](j,function(){var b=a(this)._showAria(!1).parent().parent(),c=n(b);c.transitionElement&&(c.transitionElement[o](j,function(){a(this)._showAria()}).promise().done(g),c.transitionElement=null)});break;case ab.slideLeft:var p=l.outerWidth(!0),q=e>f?-p:p,s=e>f?p:-p;a.when(l.animate({left:q},j,function(){a(this)._showAria(!1)}),k.css("left",s+"px")._showAria().animate({left:0},j)).done(g);break;default:a.when(l._showAria(!1),k._showAria()).done(g)}}function Q(b){b.preventDefault();var c=a(this),d=c.parent().parent().parent().parent(),e=m(d),f=n(d),g=f.currentIndex;if(c.parent().is(":not(.disabled):not(.current)")){var h=c.attr("href"),i=parseInt(h.substring(h.lastIndexOf("-")+1),0);u(d,e,f,i)}return g===f.currentIndex?(j(d,g).focus(),!1):void 0}function R(a){throw arguments.length>1&&(a=a.format(Array.prototype.slice.call(arguments,1))),new Error(a)}function S(a,b){null==b&&R("The argument '{0}' is null or undefined.",a)}a.fn.extend({_aria:function(a,b){return this.attr("aria-"+a,b)},_removeAria:function(a){return this.removeAttr("aria-"+a)},_enableAria:function(a){return null==a||a?this.removeClass("disabled")._aria("disabled","false"):this.addClass("disabled")._aria("disabled","true")},_showAria:function(a){return null==a||a?this.show()._aria("hidden","false"):this.hide()._aria("hidden","true")},_selectAria:function(a){return null==a||a?this.addClass("current")._aria("selected","true"):this.removeClass("current")._aria("selected","false")},_id:function(a){return a?this.attr("id",a):this.attr("id")}}),String.prototype.format||(String.prototype.format=function(){for(var b=1===arguments.length&&a.isArray(arguments[0])?arguments[0]:arguments,c=this,d=0;d<b.length;d++){var e=new RegExp("\\{"+d+"\\}","gm");c=c.replace(e,b[d])}return c});var T=0,U="jQu3ry_5teps_St@te_",V="-t-",W="-p-",X="-h-",Y="Index out of range.",Z="One or more corresponding step {0} are missing.";a.fn.steps=function(b){return a.fn.steps[b]?a.fn.steps[b].apply(this,Array.prototype.slice.call(arguments,1)):"object"!=typeof b&&b?void a.error("Method "+b+" does not exist on jQuery.steps"):w.apply(this,arguments)},a.fn.steps.add=function(a){var b=n(this);return x(this,m(this),b,b.stepCount,a)},a.fn.steps.destroy=function(){return g(this,m(this))},a.fn.steps.finish=function(){h(this,n(this))},a.fn.steps.getCurrentIndex=function(){return n(this).currentIndex},a.fn.steps.getCurrentStep=function(){return p(this,n(this).currentIndex)},a.fn.steps.getStep=function(a){return p(this,a)},a.fn.steps.insert=function(a,b){return x(this,m(this),n(this),a,b)},a.fn.steps.next=function(){return s(this,m(this),n(this))},a.fn.steps.previous=function(){return t(this,m(this),n(this))},a.fn.steps.remove=function(a){return H(this,m(this),n(this),a)},a.fn.steps.setStep=function(){throw new Error("Not yet implemented!")},a.fn.steps.skip=function(){throw new Error("Not yet implemented!")};var $=a.fn.steps.contentMode={html:0,iframe:1,async:2},_=a.fn.steps.stepsOrientation={horizontal:0,vertical:1},ab=a.fn.steps.transitionEffect={none:0,fade:1,slide:2,slideLeft:3},bb=a.fn.steps.stepModel={title:"",content:"",contentUrl:"",contentMode:$.html,contentLoaded:!1},cb=a.fn.steps.defaults={headerTag:"h1",bodyTag:"div",contentContainerTag:"div",actionContainerTag:"div",stepsContainerTag:"div",cssClass:"wizard",clearFixCssClass:"clearfix",stepsOrientation:_.horizontal,titleTemplate:'<span class="number">#index#.</span> #title#',loadingTemplate:'<span class="spinner"></span> #text#',autoFocus:!1,enableAllSteps:!1,enableKeyNavigation:!0,enablePagination:!0,suppressPaginationOnFocus:!0,enableContentCache:!0,enableCancelButton:!1,enableFinishButton:!0,preloadContent:!1,showFinishButtonAlways:!1,forceMoveForward:!1,saveState:!1,startIndex:0,transitionEffect:ab.none,transitionEffectSpeed:200,onStepChanging:function(){return!0},onStepChanged:function(){},onCanceled:function(){},onFinishing:function(){return!0},onFinished:function(){},onContentLoaded:function(){},onInit:function(){},labels:{cancel:"Cancel",current:"current step:",pagination:"Pagination",finish:"Finish",next:"Next",previous:"Previous",loading:"Loading ..."}}}(jQuery);
	</script>
	<style>
		*{
			-webkit-box-sizing: border-box;
			-moz-box-sizing: border-box;
			box-sizing: border-box
		}
		body{
				font-family: "Poppins-Regular";
				font-size: 15px;color: #666;
				background-color: #6645eb;
				margin: 0
			}
		:focus{
			outline: none
			}
		
		input, textarea, select, button{
			font-family: "Poppins-Regular";
			font-size: 15px;
			color: black
		}
		textarea{
			height:100px
		}
		ul{
			padding: 0;
			margin: 0;
			list-style: none
		}
			img{max-width: 100%;vertical-align: middle}
			.wrapper{max-width: 600px;height: 100vh;margin: auto;display: flex;align-items: center}
			.wrapper .image-holder{width: 51%}
			.wrapper form{width: 100%}
			.wizard >.steps .current-info, .wizard >.steps .number{display: none}
			#wizard{min-height: 570px;background: #fff;margin-right: 60px;padding: 107px 75px 65px;margin-top: 20px;margin-bottom: 20px}
			.steps{margin-bottom: 30px}.steps ul{display: flex;position: relative}
			.steps ul li{width: 25%;margin-right: 10px}
			.steps ul li a{display: inline-block;width: 100%;height: 7px;background: #e6e6e6;border-radius: 3.5px}
			.steps ul li.first a, .steps ul li.checked a{background: #6645eb;transition: all 0.5s ease}
			.steps ul:before{content: "informations";font-size: 22px;font-family: "Poppins-SemiBold";color: #333;top: -38px;position: absolute}
			.steps ul.step-2:before{content: "Abstract"}
			.steps ul.step-3:before{content: "Upload file"}
			.steps ul.step-4:before{content: "Upload pic"}
			.steps ul.step-5:before{content: "Final"}
			h3{font-family: "Poppins-SemiBold"}
			.form-row{margin-bottom: 24px}
			.form-row label{margin-bottom: 8px;display: block}
			.form-row.form-group{display: flex}
			.form-row.form-group .form-holder{width: 50%;margin-right: 21px}
			.form-row.form-group .form-holder:last-child{margin-right: 0}
			.form-holder{position: relative}
			.form-holder i{position: absolute;top: 11px;right: 19px;font-size: 17px;color: #999}
			.form-control{height: 42px;border: 2px solid ;border-color: black;background: none;width: 100%;padding: 0 18px}
			.form-control:focus{border-color: #f3d4b7}
			.form-control::-webkit-input-placeholder{color: black;font-size: 13px}
			.form-control::-moz-placeholder{color: black;font-size: 13px}
			.form-control:-ms-input-placeholder{color: black;font-size: 13px}
			.form-control:-moz-placeholder{color: black;font-size: 13px}
			textarea.form-control{padding-top: 11px;padding-bottom: 11px}
			.option{color: #999}
			.actions ul{display: flex;margin-top: 30px;justify-content: space-between}
			.actions ul.step-last{justify-content: flex-end}
			.actions ul.step-last li:first-child{display: none}
			.actions li a{padding: 0;border: none;display: inline-flex;height: 51px;width: 135px;align-items: center;
				background: #6200EA;cursor: pointer;color: #fff !important;
			position: relative;padding-left: 41px;text-decoration: none;
			-webkit-transform: perspective(1px) translateZ(0);transform: perspective(1px) translateZ(0);-webkit-transition-duration: 0.3s;
			transition-duration: 0.3s;font-weight: 400}.actions li a:before{content: '\f178';position: absolute;top: 15px;
			right: 41px;color:#fff;font-family: "FontAwesome";-webkit-transform: translateZ(0);transform: translateZ(0)}
			.actions li a:hover{background: #6200eaba}
			.actions li a:hover:before{-webkit-animation-name: hvr-icon-wobble-horizontal;animation-name: hvr-icon-wobble-horizontal;
			-webkit-animation-duration: 1s;animation-duration: 1s;-webkit-animation-timing-function: ease-in-out;animation-timing-function: ease-in-out;
			-webkit-animation-iteration-count: 1;animation-iteration-count: 1}
			.actions li[aria-disabled="true"] a{display: none}
			.actions li:first-child a{padding-left: 48px}
			.actions li:first-child a:before{content: '\f177';left: 26px}
			.actions li:last-child a{padding-left: 29px;width: 167px;font-weight: 400}
			.actions li:last-child a:before{right: 30px}
			.checkbox{position: relative}
			.checkbox label{padding-left: 21px;cursor: pointer;color: #999}
			.checkbox input{position: absolute;opacity: 0;cursor: pointer}
			.checkbox input:checked ~ .checkmark:after{display: block}
			.checkmark{position: absolute;top: 50%;left: 0;transform: translateY(-50%);height: 12px;width: 13px;border-radius: 2px;
			background-color: #ebebeb;border: 1px solid #ccc;font-family: "Font Awesome";color: #000;font-size: 10px;font-weight: bolder}
			.checkmark:after{position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);display: none;content: '\f178'}
			.checkbox-circle{margin-top: 41px;margin-bottom: 46px}
			.checkbox-circle label{cursor: pointer;padding-left: 26px;color: #999;display: block;margin-bottom: 15px;position: relative}
			.checkbox-circle label.active .tooltip{display: block}
			.checkbox-circle input{position: absolute;opacity: 0;cursor: pointer}
			.checkbox-circle input:checked ~ .checkmark:after{display: block}
			.checkbox-circle .checkmark{position: absolute;top: 11px;left: 0;height: 14px;width: 14px;border-radius: 50%;
			background: #ebebeb;border: 1px solid #cdcdcd}
			.checkbox-circle .checkmark:after{content: "";top: 6px;left: 6px;width: 6px;height: 6px;border-radius: 50%;
			background: #666666;position: absolute;display: none}
			.checkbox-circle .tooltip{padding: 9px 22px;background: #f2f2f2;line-height: 1.8;position: relative;
			margin-top: 16px;margin-bottom: 28px;display: none}
			.checkbox-circle .tooltip:before{content: "";border-bottom: 10px solid #f2f2f2;
			border-right: 9px solid transparent;border-left: 9px solid transparent;position: absolute;bottom: 100%}
			.product{margin-bottom: 33px}
			.item{display: flex;justify-content: space-between;align-items: center;padding-bottom: 30px;border-bottom: 1px solid #e6e6e6;margin-bottom: 30px}
			.item:last-child{margin-bottom: 0;padding-bottom: 0;border: none}.item .left{display: flex;align-items: center}
			.item .thumb{display: inline-flex;width: 100px;height: 90px;justify-content: center;align-items: center;border: 1px solid #f2f2f2}
			.item .purchase{display: inline-block;margin-left: 21px}
			.item .purchase h6{font-family: "Poppins-Medium";font-size: 16px;margin-bottom: 4px;font-weight: 500}
			.item .purchase h6 a{color: #333}.item .price{font-size: 16px}.checkout{margin-bottom: 44px}
			.checkout span.heading{font-family: "Poppins-Medium";font-weight: 500;margin-right: 5px}
			.checkout .subtotal{margin-bottom: 18px}.checkout .shipping{margin-bottom: 19px}
			.checkout .shipping span.heading{margin-right: 4px}
			.checkout .total-price{font-family: "Muli-Bold";color: #333;font-weight: 700}
			@-webkit-keyframes hvr-icon-wobble-horizontal{16.65%{-webkit-transform: translateX(6px);
				transform: translateX(6px)}33.3%{-webkit-transform: translateX(-5px);
			transform: translateX(-5px)}49.95%{-webkit-transform: translateX(4px);transform: translateX(4px)}66.6%{-webkit-transform: translateX(-2px);
			transform: translateX(-2px)}83.25%{-webkit-transform: translateX(1px);transform: translateX(1px)}100%{-webkit-transform: translateX(0);
			transform: translateX(0)}}@keyframes hvr-icon-wobble-horizontal{16.65%{-webkit-transform: translateX(6px);
			transform: translateX(6px)}33.3%{-webkit-transform: translateX(-5px);transform: translateX(-5px)}49.95%{
			-webkit-transform: translateX(4px);transform: translateX(4px)}66.6%{-webkit-transform: translateX(-2px);
			transform: translateX(-2px)}83.25%{-webkit-transform: translateX(1px);transform: translateX(1px)}100%{
			-webkit-transform: translateX(0);transform: translateX(0)}}@media (max-width: 1500px){.wrapper{height: auto}}
			@media (max-width: 1199px){.wrapper{height: 100vh}#wizard{margin-right: 40px;min-height: 829px;padding-left: 60px;
			padding-right: 60px}}@media (max-width: 991px){.wrapper{justify-content: center}
			.wrapper .image-holder{display: none}.wrapper form{width: 60%}#wizard{margin-right: 0;padding-left: 40px;padding-right: 40px}}
			@media (max-width: 767px){.wrapper{height: auto;display: block}.wrapper .image-holder{width: 100%;display: block}
			.wrapper form{width: 100%}#wizard{min-height: unset;padding: 70px 20px 40px}.form-row.form-group{display: block}
			.form-row.form-group .form-holder{width: 100%;margin-right: 0;margin-bottom: 24px}.item .purchase{margin-left: 11px}}
			.card{border: 0;border-radius: 0px;margin-bottom: 30px;-webkit-box-shadow: 0 2px 3px rgba(0, 0, 0, 0.03);
			box-shadow: 0 2px 3px rgba(0, 0, 0, 0.03);-webkit-transition: .5s;transition: .5s}
			.padding{padding: 3rem !important}h5.card-title{font-size: 15px}.fw-400{font-weight: 400 !important}
			.card-title{font-family: Roboto, sans-serif;font-weight: 300;line-height: 1.5;margin-bottom: 0;padding: 15px 20px;
			border-bottom: 1px solid rgba(77, 82, 89, 0.07)}.card-body{-ms-flex: 1 1 auto;flex: 1 1 auto;padding: 1.25rem}
			.form-group{margin-bottom: 1rem}.form-control{border-color: gray;border-radius: 2px;color: black;
			padding: 5px 12px;font-size: 14px;line-height: inherit;-webkit-transition: 0.2s linear;transition: 0.2s linear}
			.card-body>*:last-child{margin-bottom: 0}.btn-primary{background-color: #33cabb;border-color: #33cabb;color: #fff}
			.btn-bold{font-family: Roboto, sans-serif;text-transform: uppercase;font-weight: 500;font-size: 12px}
			.btn-primary:hover{background-color: #52d3c7;border-color: #52d3c7;color: #fff}.btn:hover{cursor: pointer}
			.form-control:focus{border-color: #6545eb;color: black;-webkit-box-shadow: 0 0 0 0.1rem rgba(51, 202, 187, 0);
			box-shadow: 0 0 0 0.1rem rgba(101, 69, 235, 0)}.custom-radio{cursor: pointer}
			.custom-control{display: -webkit-box;display: flex;min-width: 18px}.heading{color: #6645eb}
			.total{float: right;color: #6645eb}svg{width: 100px;display: block;margin: 40px auto 0}
			.path{stroke-dasharray: 1000;stroke-dashoffset: 0;&.circle{-webkit-animation: dash .9s ease-in-out;
			animation: dash .9s ease-in-out}&.line{stroke-dashoffset: 1000;-webkit-animation: dash .9s .35s ease-in-out forwards;
			animation: dash .9s .35s ease-in-out forwards}&.check{stroke-dashoffset: -100;-webkit-animation: dash-check .9s .35s ease-in-out forwards;
			animation: dash-check .9s .35s ease-in-out forwards}}p{text-align: center;margin: 20px 0 60px;
			font-size: 1.25em;&.success{color: #73AF55}&.error{color: #D06079}}@-webkit-keyframes dash{0%{stroke-dashoffset: 1000}100%{stroke-dashoffset: 0}}
			@keyframes dash{0%{stroke-dashoffset: 1000}100%{stroke-dashoffset: 0}}
			@-webkit-keyframes dash-check{0%{stroke-dashoffset: -100}100%{stroke-dashoffset: 900}}
			@keyframes dash-check{0%{stroke-dashoffset: -100}100%{stroke-dashoffset: 900}}
			.med{
				background:#6200EA;
				width:167px;
				font-weight: 400;
				padding: 0;
                border: none;
                cursor: pointer;
				color: #fff !important;
				position: relative;
				margin-left:100px;
				height:50px
			}
			.med:hover{background: #6200eaba}
			
	</style>

	<script>
		$(function(){
			$("#wizard").steps({
				headerTag: "h4",
				bodyTag: "section",
				transitionEffect: "fade",
				enableAllSteps: true,
				transitionEffectSpeed: 500,
				onStepChanging: function (event, currentIndex, newIndex) { 
					if ( newIndex === 1 ) {
						$('.steps ul').addClass('step-2');
					} else {
						$('.steps ul').removeClass('step-2');
					}

					if ( newIndex === 2 ) {
						$('.steps ul').addClass('step-3');
					} else {
						$('.steps ul').removeClass('step-3');
					}
					if ( newIndex === 3 ) {
						$('.steps ul').addClass('step-4');
					} else {
						$('.steps ul').removeClass('step-4');
					}

					if ( newIndex === 4 ) {
						$('.steps ul').addClass('step-5');
						$('.actions ul').addClass('step-last');
					} else {
						$('.steps ul').removeClass('step-5');
						$('.actions ul').removeClass('step-last');
					}
					return true; 
				},
				labels: {
					
					next: "Next",
					previous: "Previous"
				}
			});
			// Custom Steps Jquery Steps
			$('.wizard > .steps li a').click(function(){
				$(this).parent().addClass('checked');
				$(this).parent().prevAll().addClass('checked');
				$(this).parent().nextAll().removeClass('checked');
			});
			// Custom Button Jquery Steps
			$('.forward').click(function(){
				$("#wizard").steps('next');
			})
			$('.backward').click(function(){
				$("#wizard").steps('previous');
			})
			// Checkbox
			$('.checkbox-circle label').click(function(){
				$('.checkbox-circle label').removeClass('active');
				$(this).addClass('active');
			})
		})
		function app_sel(valeur) { // Le param valeur servira à savoir quel select afficher
			var sels = document.getElementById("select2").getElementsByTagName("select"); // On récupère tous les selects dans le span id="select2"
			for(var i=0,l=sels.length;i<l;i++) { // Et on les cache tous
			sels[i].style.display = "none";
			}
			document.getElementById("select2"+valeur).style.display = "inline"; // pour n'afficher finalement que celui qu'on veut.
		}
	</script>
@endsection
@section('content')
<div class="wrapper">
    <form method="POST" action="{{ route('author.uploade') }}"  enctype="multipart/form-data">
	@csrf
        <div id="wizard">
            <!-- SECTION 1 -->
            <h4></h4>
            <section>
                <div class="form-row"> <input type="text" class="form-control" name="title" placeholder="Title"> </div>
                <div class="form-row"> 
					<select id="select1" name="category" class="form-control" onchange="app_sel(this.value);" >
							<option value="1">info</option>
							<option value="2">lettre</option>
							<option value="3">ppl</option>
					</select>
				</div>
                <div class="form-row">  
					<span id="select2" name="type">
					<select id="select21"class="form-control" style="display:inline;">
					<option value="1">info</option>
					<option value="2">l</option>
					<option value="3">c</option>
					</select>
					
					<select id="select22" class="form-control" style="display:none;">
					<option value="4">letre</option>
					<option value="5">b</option>
					<option value="6">c</option>
					</select>
					
					<select id="select23" class="form-control" style="display:none;">
					<option value="7">ppl</option>
					<option value="8">l</option>
					<option value="9">j</option>
					</select>
					</span> 
				</div>
                <div class="form-row"> <input type="text" class="form-control" name="Nombre de figures" placeholder="Nombre de figures"> </div>
            </section> <!-- SECTION 2 -->
            <h4></h4>
            <section>
                <div class="form-row"> <textarea name="abstract" class="form-control" cols="30" rows="10" placeholder="abstract"></textarea> </div>
            </section> <!-- SECTION 3 -->
            <h4></h4>
            <section>
						<!-- component -->
 
       
            <svg class="text-indigo-500 w-24 mx-auto mb-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" /></svg>
            <div class="input_field flex flex-col w-max mx-auto text-center">
                <label>
                    
					<div>
								<input type="file" name="obj_pdf">
								</div>
                </label> 
              </div>

            </section> <!-- SECTION 4 -->
            <h4></h4>
			<section>
						<!-- component -->
 
       
            <svg class="text-indigo-500 w-24 mx-auto mb-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" /></svg>
            <div class="input_field flex flex-col w-max mx-auto text-center">
                <label>
                    
					<div>
								<input type="file" name="pic">
								</div>
                </label> 
              </div>

            </section> <!-- SECTION 4 -->
            <h4></h4>
            <section>
                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 130.2 130.2">
                    <circle class="path circle" fill="none" stroke="#73AF55" stroke-width="6" stroke-miterlimit="10" cx="65.1" cy="65.1" r="62.1" />
                    <polyline class="path check" fill="none" stroke="#73AF55" stroke-width="6" stroke-linecap="round" stroke-miterlimit="10" points="100.2,40.2 51.5,88.8 29.8,67.5 " />
                </svg>
                <p class="success">Order placed successfully. Your order will be dispacted soon. meanwhile you can track your order in my order section.</p>
                <input type="submit" class="med" value="Create article" >
			</section>
        </div>
    </form>
</div>
@endsection
