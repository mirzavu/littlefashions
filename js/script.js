jQuery(document).ready(function(a) {
    "use strict";
    function b() {
        a("#loading").fadeOut()
    }
    function c() {
        a("#bar-icon").on("click", function(b) {
            a(this).parent(".top-menu").hasClass("show-view") ? a(this).parent(".top-menu").removeClass("show-view") : a(this).parent(".top-menu").addClass("show-view"), b.stopPropagation()
        })
    }
    function d() {
        a("#icon-search").on("click", function(b) {
            a(this).parents(".search-h").hasClass("show-view") ? a(this).parents(".search-h").removeClass("show-view") : a(this).parents(".search-h").addClass("show-view"), b.stopPropagation()
        })
    }
    function e() {
        a("#cart-head").on("click", function(b) {
            a(this).parent(".mini-cart").hasClass("show-view") ? a(this).parent(".mini-cart").removeClass("show-view") : a(this).parent(".mini-cart").addClass("show-view"), b.stopPropagation()
        })
    }
    function f() {
        a(".navigation ul li").find("> ul").parent("li").find(">a").append('<span class="nav-plus"></span>'), a(".navigation a").on("click", ".nav-plus", function() {
            return 0 == a(this).hasClass("nav-minus") ? (a(this).parent("a").parent("li").find("> ul").slideDown(), a(this).addClass("nav-minus")) : (a(this).parent("a").parent("li").find("> ul").slideUp(), a(this).removeClass("nav-minus")), !1
        })
    }
    function g() {
        a(window).width() > 991 && a(".nav-menu ul,.nav-menu .mega-wrap").removeAttr("style")
    }
    function h() {
        a("#menu-bar").on("click", function(b) {
            a(".navigation").hasClass("show-view") ? (a(this).removeClass("show-view"), a(".navigation").removeClass("show-view")) : (a(this).addClass("show-view"), a(".navigation").addClass("show-view")), b.stopPropagation()
        })
    }
    function i() {
        if (a("#partner").length) {
            var b = [], c = a("#partner");
            if ("" !== c.attr("data-custom") && "undefined" != typeof c.attr("data-custom"))
                for (var d = c.attr("data-custom").split(","), e = 0; e < d.length; e++)
                    b[e] = d[e].split("-").map(Number);
            a("#partner").owlCarousel({slideSpeed: 300,navigation: !0,navigationText: ["", ""],itemsCustom: b,pagination: !1})
        }
    }
    function j() {
        if (a("#related-slide").length) {
            var b = [], c = a("#related-slide");
            if ("" !== c.attr("data-custom") && "undefined" != typeof c.attr("data-custom"))
                for (var d = c.attr("data-custom").split(","), e = 0; e < d.length; e++)
                    b[e] = d[e].split("-").map(Number);
            a("#related-slide").owlCarousel({slideSpeed: 1e3,navigation: !0,navigationText: ["", ""],itemsCustom: b,pagination: !1})
        }
    }
    function k() {
        a(".entry-photo-slide").length && a(".entry-photo-slide").owlCarousel({autoPlay: !1,navigation: !0,pagination: !1,navigationText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],singleItem: !0})
    }
    function l() {
        a("#photo_slide").length && a("#photo_slide").owlCarousel({autoPlay: !1,navigation: !0,pagination: !1,navigationText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],itemsCustom: [[320, 2], [480, 3], [768, 4], [992, 1], [1200, 1]]})
    }
    function m() {
        a(".widget_categories ul li").find(" >ul").parent("li").find(">a").append('<span class="nav-plus"></span>'), a(".widget_categories ul li a").on("click", ".nav-plus", function() {
            a(this).hasClass("nav-minus") ? (a(this).removeClass("nav-minus"), a(this).parent("a").parent("li").find(">ul").slideUp()) : (a(this).addClass("nav-minus"), a(this).parent("a").parent("li").find(">ul").slideDown())
        })
    }
    function n() {
        if (a(".page-404").length)
            if (a(window).width() > 768) {
                var b = a(window).height();
                a(".page-404").height(b)
            } else
                a(".page-404").removeAttr("style")
    }
    function o() {
        if (a("#slider").length) {
            a("#slider").slider({min: 0,max: 100000,step: 5,values: [0, 100000],range: !0,slide: function(b, c) {
                    var e = (a(this), c.values);
                    a("#price-f").text("Rs." + e[0]), a("#price-t").text("Rs." + e[1])
                }});
            var b = a("#slider").slider("option", "values");
            a("#price-f").text("Rs." + b[0]), a("#price-t").text("Rs." + b[1])
        }
    }
    function p() {
        a("#filter-grid").on("click", function(b) {
            a(this).hasClass("show-view") ? (a(this).removeClass("show-view"), a("#filter-cn-grid").removeClass("show-view")) : (a(this).addClass("show-view"), a("#filter-cn-grid").addClass("show-view")), b.stopPropagation()
        })
    }
    function q() {
        a(".thumb_list li").on("click", function() {
            var b = a(this);
            if (0 == b.hasClass("active")) {
                var c = b.attr("data-src");
                b.parent(".thumb_list").find("li").removeClass("active"), b.addClass("active"), a("#view_full_size").attr("href", c).find("img").attr("src", c)
            }
        }), a(".fancybox").length && a(".fancybox").fancybox({helpers: {title: {type: "outside"},overlay: {speedOut: 0}}})
    }
    function r() {
        a("#tabs-responsive").length && a("#tabs-responsive").responsiveTabs({rotate: !1,active: 0,startCollapsed: "accordion",collapsible: "accordion",animation: "slide",duration: 300,setHash: !1}), a("#tab-featured").length && a("#tab-featured").responsiveTabs({rotate: !1,active: 0,startCollapsed: "accordion",collapsible: "accordion",animation: "slide",duration: 300,setHash: !1})
    }
    function s() {
        var b = "";
        a("#tranding").length && (b += ",#tranding"), a("#top-rated").length && (b += ",#top-rated"), a("#accessories").length && (b += ",#accessories"), "" !== b && ("," == b.substring(0, 1) && (b = b.substring(1)), a(b).owlCarousel({autoPlay: !1,navigation: !1,pagination: !0,singleItem: !0}))
    }
    function t() {
        a(".featured-slide").length && a(".featured-slide").each(function() {
            var d = [], e = a(this);
            if ("" !== e.attr("data-custom") && "undefined" != typeof e.attr("data-custom"))
                for (var f = e.attr("data-custom").split(","), g = 0; g < f.length; g++)
                    d[g] = f[g].split("-").map(Number);
            e.owlCarousel({slideSpeed: 1e3,navigation: !0,itemsCustom: d,navigationText: ["", ""],pagination: !0})
        })
    }
    function u() {
        if (a("#blog-slide").length) {
            var b = a("#blog-slide"), c = [];
            if ("" !== b.attr("data-custom") && "undefined" != typeof b.attr("data-custom"))
                for (var d = b.attr("data-custom").split(","), e = 0; e < d.length; e++)
                    c[e] = d[e].split("-").map(Number);
            a("#blog-slide").owlCarousel({slideSpeed: 1e3,navigation: !0,itemsCustom: c,pagination: !0})
        }
    }
    function v() {
        a(window).width() > 1199 && a(".bg-parallax").length && a(".bg-parallax").each(function() {
            a(this).parallax("50%", .1)
        })
    }
    function w() {
        a("#slide-home").length && a("#slide-home").owlCarousel({autoPlay: 4e3,navigation: !1,pagination: !0,singleItem: !0,mouseDrag: !1,addClassActive: !0,transitionStyle: "fade"})
    }
    function x() {
        if (a("#slide-home")) {
            var b = a(".slide-cn").innerWidth(), c = a(".item-inner").width(), d = a(".item-inner").height(), e = b / c, f = c / d, g = b / f;
            a(".slide-item").css({height: g}), a(window).width() <= 1200 ? a(".item-inner").css({"-webkit-transform": "scale(" + e + ")","-moz-transform": "scale(" + e + ")","-ms-transform": "scale(" + e + ")",transform: "scale(" + e + ")"}) : a(".item-inner").css({"-webkit-transform": "scale(1)","-moz-transform": "scale(1)","-ms-transform": "scale(1)",transform: "scale(1)"})
        }
    }
    function y() {
        a("#slide-watch").length && a("#slide-watch").owlCarousel({autoPlay: true,navigation: !1,pagination: !0,singleItem: !0,mouseDrag: !1,addClassActive: !0,transitionStyle: "fade"})
    }
    function z() {
        a("#slide-block").length && a("#slide-block").owlCarousel({autoPlay: 4e3,navigation: !0,navigationText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],pagination: !1,singleItem: !0,mouseDrag: !1})
    }
    function A() {
        a(".count-date").length && a(".count-date").each(function() {
            var d = a(this), e = d.attr("data-end");
            d.attr("data-view"), "" !== d.attr("data-end") && "undefined" != typeof d.attr("data-end") && d.countdown(e, function(b) {
                a(this).html(b.strftime("<span> %D <small>Days</small></span> <span> %H <small>Hrs</small></span> <span> %M <small>Mins</small></span> <span> %S <small>Sec</small></span>"))
            })
        })
    }
    function B() {
        if (a(".fullscreen-video").length) {
            a(".fullscreen-video").mb_YTPlayer({containment: ".parallax-video",mute: !0,loop: !0,startAt: 0,autoPlay: !1,showYTLogo: !1,showControls: !1});
            var b = a(".fullscreen-video"), c = a(".control-play"), d = a(".controls-video"), e = a(".controls-video .pause"), f = a(".controls-video .volume");
            d.hide(), c.click(function() {
                return b.playYTP(), a(".parallax-video-cn").css("opacity", 0), d.show(), !1
            }), e.click(function() {
                b.pauseYTP(), a(".parallax-video-cn").css("opacity", 1), d.hide()
            }), f.click(function() {
                b.toggleVolume()
            })
        }
    }
    function C() {
        a("#scroll-top").bind("click", function(b) {
            a("html, body").stop().animate({scrollTop: 0}, 1500, "easeInOutExpo"), b.preventDefault()
        })
    }
    function D() {
        var b = document.getElementById("qty");
        a("#qty-plus").click(function() {
            var c = b.value;
            return isNaN(c) || b.value++, !1
        }), a("#qty-minus").click(function() {
            var c = b.value;
            return !isNaN(c) && c > 0 && b.value--, !1
        })
    }
    function E() {
        a("#play-paused").on("click", function() {
            var b = document.getElementById("video");
            return b.paused ? (b.play(), a(this).addClass("play")) : (b.pause(), a(this).removeClass("play")), !1
        })
    }
    function F() {
        if (a("#portfolio").length) {
            var b = a("#portfolio"), c = "";
            "" !== b.attr("data-theme") && "undefined" != typeof b.attr("data-theme") && (c = b.attr("data-theme"));
            var d = function() {
                a("#colio").remove(), a("#portfolio").colio({id: "colio",expandLink: ".portfolio-link",placement: "before",navigation: !1,closeText: "",theme: c,hiddenItems: ".isotope-hidden" })
				
            };
						
            d();
			
            var f, e = a("#portfolio"), g = function(a) {
                f = e.isotope({layoutMode: "fitRows",filter: a})
            };
            a("#load-more-pf").click(function(b) {
                var c = a(this), f = parseInt(c.attr("data-page")), g = c.attr("href");
                a.ajax({url: g,type: "GET",dataType: "html",data: {page: f},beforeSend: function() {
                        c.addClass("load-active")
                    }}).done(function(b) {
                    if (null != b) {
                        var c = a(b);
                        e.prepend(c).isotope("appended", c), d()
                    }
                }).fail(function() {
                }).always(function() {
                    c.removeClass("load-active")
                }), b.preventDefault()
            }), g("*")
			
        }
    }
    function G() {
        a("#portfolio-slide").length && a("#portfolio-slide").owlCarousel({autoPlay: 5e3,navigation: !0,pagination: !1,navigationText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],singleItem: !0})
    }
    function H() {
        a(".shipping-item").length && (a(window).width() < 767 ? a(".shipping-item").each(function() {
            var d = a(this), e = d.find("p").height();
            d.find(".inner").css("margin-top", e + "px")
        }) : a(".shipping-item").find(".inner").removeAttr("style"))
    }
    function I() {
        a(document).on("click", function() {
            a(".show-view").length && a(".show-view").removeClass("show-view")
        }), a(document).on("click", ".show-view", function(a) {
            a.stopPropagation()
        })
    }
    a(window).load(function() {
        b(), F(), w(), x()
    }), a(window).resize(function() {
        g(), x(), n()
    }), a(window).scroll(function() {
    }), c(), d(), e(), f(), h(), i(), j(), k(), l(), m(), n(), o(), p(), q(), r(), s(), t(), u(), v(), y(), z(), A(), B(), C(), D(), E(), G(), H(), I()
});
