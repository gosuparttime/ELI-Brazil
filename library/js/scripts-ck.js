/* imgsizer (flexible images for fluid sites) */function addTwitterBSClass(e){var t=$(e).attr("title");if(t){var n=t.split(" ");if(n[0]){var r=parseInt(n[0]);r>0&&$(e).addClass("label");r==2&&$(e).addClass("label label-info");r>2&&r<4&&$(e).addClass("label label-success");r>=5&&r<10&&$(e).addClass("label label-warning");r>=10&&$(e).addClass("label label-important")}}else $(e).addClass("label");return!0}var imgSizer={Config:{imgCache:[],spacer:"/path/to/your/spacer.gif"},collate:function(e){var t=document.all&&!window.opera&&!window.XDomainRequest?1:0;if(t&&document.getElementsByTagName){var n=imgSizer,r=n.Config.imgCache,i=e&&e.length?e:document.getElementsByTagName("img");for(var s=0;s<i.length;s++){i[s].origWidth=i[s].offsetWidth;i[s].origHeight=i[s].offsetHeight;r.push(i[s]);n.ieAlpha(i[s]);i[s].style.width="100%"}r.length&&n.resize(function(){for(var e=0;e<r.length;e++){var t=r[e].offsetWidth/r[e].origWidth;r[e].style.height=r[e].origHeight*t+"px"}})}},ieAlpha:function(e){var t=imgSizer;e.oldSrc&&(e.src=e.oldSrc);var n=e.src;e.style.width=e.offsetWidth+"px";e.style.height=e.offsetHeight+"px";e.style.filter="progid:DXImageTransform.Microsoft.AlphaImageLoader(src='"+n+"', sizingMethod='scale')";e.oldSrc=n;e.src=t.Config.spacer},resize:function(e){var t=window.onresize;typeof window.onresize!="function"?window.onresize=e:window.onresize=function(){t&&t();e()}}};$(document).ready(function(){$("#tag-cloud a").each(function(){addTwitterBSClass(this);return!0});$("p.tags a").each(function(){addTwitterBSClass(this);return!0});$("ol.commentlist a.comment-reply-link").each(function(){$(this).addClass("btn btn-success btn-mini");return!0});$("#cancel-comment-reply-link").each(function(){$(this).addClass("btn btn-danger btn-mini");return!0});$("article.post").hover(function(){$("a.edit-post").show()},function(){$("a.edit-post").hide()});$("[placeholder]").focus(function(){var e=$(this);if(e.val()==e.attr("placeholder")){e.val("");e.removeClass("placeholder")}}).blur(function(){var e=$(this);if(e.val()==""||e.val()==e.attr("placeholder")){e.addClass("placeholder");e.val(e.attr("placeholder"))}}).blur();$("[placeholder]").parents("form").submit(function(){$(this).find("[placeholder]").each(function(){var e=$(this);e.val()==e.attr("placeholder")&&e.val("")})});$("#s").focus(function(){$(window).width()<940&&$(this).animate({width:"200px"})});$("#s").blur(function(){$(window).width()<940&&$(this).animate({width:"100px"})});$(".alert-message").alert();$(".dropdown-toggle").dropdown();var e=/\.(zip|exe|pdf|doc*|xls*|ppt*|mp3)$/i,t="";jQuery("base").attr("href")!=undefined&&(t=jQuery("base").attr("href"));jQuery("a").each(function(){var n=jQuery(this).attr("href");n&&n.match(/^https?\:/i)&&!n.match(document.domain)?jQuery(this).click(function(){var e=n.replace(/^https?\:\/\//i,"");_gaq.push(["_trackEvent","External","Click",e]);if(jQuery(this).attr("target")!=undefined&&jQuery(this).attr("target").toLowerCase()!="_blank"){setTimeout(function(){location.href=n},200);return!1}}):n&&n.match(/^mailto\:/i)?jQuery(this).click(function(){var e=n.replace(/^mailto\:/i,"");_gaq.push(["_trackEvent","Email","Click",e])}):n&&n.match(e)&&jQuery(this).click(function(){var e=/[.]/.exec(n)?/[^.]+$/.exec(n):undefined,r=n;_gaq.push(["_trackEvent","Download","Click-"+e,r]);if(jQuery(this).attr("target")!=undefined&&jQuery(this).attr("target").toLowerCase()!="_blank"){setTimeout(function(){location.href=t+n},200);return!1}})});$("#myCarousel").carousel({interval:7500});$("[data-toggle=collapse]").click(function(){$(this).find("i").toggleClass("icon-plus icon-minus")});$size="carousel";$.post("size: carousel");var n=$("iframe[src^='http://www.youtube.com']"),r=$(".video-player");n.each(function(){$(this).data("aspectRatio",this.height/this.width).removeAttr("height").removeAttr("width")});$(window).resize(function(){var e=r.width();n.each(function(){var t=$(this);t.width(e).height(e*t.data("aspectRatio"))})}).resize()});(function(e,t,n){var r,i=e.getElementsByTagName(t)[0];if(e.getElementById(n))return;r=e.createElement(t);r.id=n;r.src="//connect.facebook.net/en_US/all.js#xfbml=1";i.parentNode.insertBefore(r,i)})(document,"script","facebook-jssdk");