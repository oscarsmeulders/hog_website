jQuery(document).ready(function($){function e(e,t){e.filter(function(){var e=this.getBoundingClientRect();return e.top>=0&&e.top<=window.innerHeight}).trigger(t)}function t(e){var t=0,i=[],o=[];for(var n in e){o.push(e[n].join(" "));var a=e[n];if(a.length){if(0===t)i=a.slice(0);else{for(var s=[],l=i.slice(0),r=0,d=a.length;d>r;r++)for(var u=0,h=l.length;h>u;u++)s.push(l[u]+a[r]);i=s}t++}}var c=i.join(", ");return c}function i(e){var t=e[0],i=e.parents(".option-set").attr("data-group"),o=r[i];o||(o=r[i]=[]);var n=$.inArray(t.value,o);t.checked?-1===n&&r[i].push(t.value):r[i].splice(n,1)}function o(e){for(var t,i,o=e.length;o;t=parseInt(Math.random()*o),i=e[--o],e[o]=e[t],e[t]=i);return e}function n(e){$(".item").each(function(){$(this).addClass("active")}),$(e).removeClass("active")}var a=$(window),s=$("img.ll"),l=$(".listing");a.on("scroll",function(){e(s,"lazylazy")}),s.lazyload({effect:"fadeIn",failure_limit:Math.max(s.length-1,0),event:"lazylazy"});var r={},d=$("#filter-display");$("input[type=checkbox]").each(function(){i($(this))});var u=t(r);console.log(u),l.isotope({filter:u}),d.text(u),$(".filters-menu").on("change",function(e){var o=$(e.target);i(o);var n=t(r);l.isotope({filter:n}),d.text(n)}),$(".filters").on("click","button",function(){var e=$(this).attr("data-filter");changeClasses($(this)),window.location.hash=e,isotopeFilter(e),$("html, body").animate({scrollTop:0},"fast")}),changeClasses=function(e){"filter-showall"==$(e).attr("id")?$(e).hasClass("hidden")?$(e).removeClass("hidden"):$(e).addClass("hidden").delay(200).queue(function(t){$(e).addClass("displayNone").dequeue()}):$("#filter-showall").removeClass("hidden displayNone"),$(".filters button").removeClass("active"),$(e).addClass("active")};var h=function(){var e=l.width(),t=1,i=0;return e>1600?t=4:e>1200?t=4:e>992?t=3:e>768?t=3:e>480&&(t=1),i=Math.floor(e/t),l.find(".item").each(function(){var e=$(this),t=e.attr("class").match(/item-w(\d)/),o=e.attr("class").match(/item-h(\d)/),n=t?i*t[1]:i,a=o?i*o[1]*.66666:.66666*i;e.css({width:n,height:a})}),i};isotope=function(){l.isotope({itemSelector:".item",masonry:{columnWidth:h()}})},isotopeFilter=function(e){console.log("isotope filter : "+e),l.isotope({filter:e})},hash=window.location.hash.substr(1),isotope(),hash&&(console.log("hash : "+hash),isotopeFilter(hash),$(".filters").find("button").each(function(){$(this).attr("data-filter")==hash&&changeClasses($(this))})),a.on("debouncedresize",isotope),l.isotope("on","layoutComplete",function(){e(s,"lazylazy")});var c=[];l.find(".item").each(function(){c.push($(this))});for(var f=0;f<c.length;f++){var v=250*f;c[f].delay(v).queue(function(e){$(this).addClass("loaded").dequeue()})}$(".overview").length&&($(".no-touch").find(".item").on("mouseover",function(){n($(this))}),$(".no-touch").find(".item").on("mouseout",function(){$(".item").each(function(){$(this).removeClass("active")})})),$(".button-filters").on("click",function(e){e.preventDefault(),$(".filters-menu").hasClass("closed")?($(".button-filters").removeClass("closed"),$(".filters-menu").removeClass("hidden").delay(10).queue(function(e){$(".filters-menu").removeClass("closed").dequeue()})):($(".button-filters").addClass("closed"),$(".filters-menu").addClass("closed").delay(200).queue(function(e){$(".filters-menu").addClass("hidden").dequeue()}))}),lastWidth=$(window).width()}),$(window).resize(function(){$(window).width()!=lastWidth&&(location.reload(),lastWidth=$(window).width())});