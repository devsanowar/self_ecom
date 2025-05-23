if ("undefined" == typeof jQuery) throw new Error("jQuery plugins need to be before this file");
($.AdminNexa = {}),
    ($.AdminNexa.options = {
        colors: {
            red: "#ec3b57",
            pink: "#E91E63",
            purple: "#ba3bd0",
            deepPurple: "#673AB7",
            indigo: "#3F51B5",
            blue: "#457fca",
            lightBlue: "#03A9F4",
            cyan: "#01b4ae",
            green: "#78b83e",
            lightGreen: "#8BC34A",
            yellow: "#ffe821",
            orange: "#FF9800",
            deepOrange: "#f83600",
            grey: "#9E9E9E",
            blueGrey: "#607D8B",
            black: "#000000",
            blush: "#F15F79",
            white: "#ffffff",
        },
        leftSideBar: { scrollColor: "rgba(0,0,0,0.5)", scrollWidth: "4px", scrollAlwaysVisible: !1, scrollBorderRadius: "0", scrollRailBorderRadius: "0" },
        dropdownMenu: { effectIn: "fadeIn", effectOut: "fadeOut" },
    }),
    ($.AdminNexa.leftSideBar = {
        activate: function () {
            var i = this,
                r = $("body"),
                t = $(".overlay");
            $(window).on("click", function (e) {
                var a = $(e.target);
                "i" === e.target.nodeName.toLowerCase() && (a = $(e.target).parent()),
                    !a.hasClass("bars") && i.isOpen() && 0 === a.parents("#leftsidebar").length && (a.hasClass("js-right-sidebar") || t.fadeOut(), r.removeClass("overlay-open"));
            }),
                $.each($(".menu-toggle.toggled"), function (e, a) {
                    $(a).next().slideToggle(0);
                }),
                $.each($(".menu .list li.active"), function (e, a) {
                    var i = $(a).find("a:eq(0)");
                    i.addClass("toggled"), i.next().show();
                }),
                $(".menu-toggle").on("click", function (e) {
                    var a = $(this),
                        i = a.next();
                    if ($(a.parents("ul")[0]).hasClass("list")) {
                        var r = $(e.target).hasClass("menu-toggle") ? e.target : $(e.target).parents(".menu-toggle");
                        $.each($(".menu-toggle.toggled").not(r).next(), function (e, a) {
                            $(a).is(":visible") && ($(a).prev().toggleClass("toggled"), $(a).slideUp());
                        });
                    }
                    a.toggleClass("toggled"), i.slideToggle(320);
                }),
                i.setMenuHeight(),
                i.checkStatuForResize(!0),
                $(window).resize(function () {
                    i.setMenuHeight(), i.checkStatuForResize(!1);
                }),
                Waves.attach(".menu .list a", ["waves-block"]),
                Waves.init();
        },
        setMenuHeight: function () {
            if (void 0 !== $.fn.slimScroll) {
                var e = $.AdminNexa.options.leftSideBar,
                    a = $(window).height() - ($(".legal").outerHeight() + $(".user-info").outerHeight() + $(".navbar").innerHeight()),
                    i = $("");
                i.slimScroll({ destroy: !0 }).height("auto"),
                    i.parent().find(".slimScrollBar, .slimScrollRail").remove(),
                    i.slimscroll({ height: a + "px", color: e.scrollColor, size: e.scrollWidth, alwaysVisible: e.scrollAlwaysVisible, borderRadius: e.scrollBorderRadius, railBorderRadius: e.scrollRailBorderRadius });
            }
        },
        checkStatuForResize: function (e) {
            var a = $("body"),
                i = $(".navbar .navbar-header .bars"),
                r = a.width();
            e &&
                a
                    .find(".content, .sidebar")
                    .addClass("no-animate")
                    .delay(1e3)
                    .queue(function () {
                        $(this).removeClass("no-animate").dequeue();
                    }),
                r < 1170 ? (a.addClass("ls-closed"), i.fadeIn()) : (a.removeClass("ls-closed"), i.fadeOut());
        },
        isOpen: function () {
            return $("body").hasClass("overlay-open");
        },
    }),
    ($.AdminNexa.rightSideBar = {
        activate: function () {
            var i = this,
                r = $("#rightsidebar"),
                t = $(".overlay");
            $(window).on("click", function (e) {
                var a = $(e.target);
                "i" === e.target.nodeName.toLowerCase() && (a = $(e.target).parent()), !a.hasClass("js-right-sidebar") && i.isOpen() && 0 === a.parents("#rightsidebar").length && (a.hasClass("bars") || t.fadeOut(), r.removeClass("open"));
            }),
                $(".js-right-sidebar").on("click", function () {
                    r.toggleClass("open"), i.isOpen() ? t.fadeIn() : t.fadeOut();
                });
        },
        isOpen: function () {
            return $(".right-sidebar").hasClass("open");
        },
    });
var $searchBar = $(".search-bar");
($.AdminNexa.search = {
    activate: function () {
        var a = this;
        $(".js-search").on("click", function () {
            a.showSearchBar();
        }),
            $searchBar.find(".close-search").on("click", function () {
                a.hideSearchBar();
            }),
            $searchBar.find('input[type="text"]').on("keyup", function (e) {
                27 == e.keyCode && a.hideSearchBar();
            });
    },
    showSearchBar: function () {
        $searchBar.addClass("open"), $searchBar.find('input[type="text"]').focus();
    },
    hideSearchBar: function () {
        $searchBar.removeClass("open"), $searchBar.find('input[type="text"]').val("");
    },
}),
    ($.AdminNexa.navbar = {
        activate: function () {
            var e = $("body"),
                a = $(".overlay");
            $(".bars").on("click", function () {
                e.toggleClass("overlay-open"), e.hasClass("overlay-open") ? a.fadeIn() : a.fadeOut();
            }),
                $('.nav [data-close="true"]').on("click", function () {
                    var e = $(".navbar-toggle").is(":visible"),
                        a = $(".navbar-collapse");
                    e &&
                        a.slideUp(function () {
                            a.removeClass("in").removeAttr("style");
                        });
                });
        },
    }),
    ($.AdminNexa.input = {
        activate: function () {
            $(".form-control").focus(function () {
                $(this).parent().addClass("focused");
            }),
                $(".form-control").focusout(function () {
                    var e = $(this);
                    e.parents(".form-group").hasClass("form-float") ? "" == e.val() && e.parents(".form-line").removeClass("focused") : e.parents(".form-line").removeClass("focused");
                }),
                $("body").on("click", ".form-float .form-line .form-label", function () {
                    $(this).parent().find("input").focus();
                });
        },
    }),
    ($.AdminNexa.select = {
        activate: function () {
            $.fn.selectpicker && $("select:not(.ms)").selectpicker();
        },
    });
var edge = "Microsoft Edge",
    ie10 = "Internet Explorer 10",
    ie11 = "Internet Explorer 11",
    opera = "Opera",
    firefox = "Mozilla Firefox",
    chrome = "Google Chrome",
    safari = "Safari";
function skinChanger() {
    $(".right-sidebar .choose-skin li").on("click", function () {
        var e = $("body"),
            a = $(this),
            i = $(".right-sidebar .choose-skin li.active").data("theme");
        $(".right-sidebar .choose-skin li").removeClass("active"), e.removeClass("theme-" + i), a.addClass("active"), e.addClass("theme-" + a.data("theme"));
    });
}
function CustomScrollbar() {
    $(".navbar-right .dropdown-menu .body .menu").slimscroll({ height: "254px", color: "rgba(0,0,0,0.2)", size: "3px", alwaysVisible: !1, borderRadius: "3px", railBorderRadius: "0" }),
        $(".chat-widget").slimscroll({ height: "300px", color: "rgba(0,0,0,0.4)", size: "2px", alwaysVisible: !1, borderRadius: "3px", railBorderRadius: "2px" }),
        $(".right-sidebar .slim_scroll").slimscroll({ height: "calc(100vh - 55px)", color: "rgba(0,0,0,0.4)", size: "2px", alwaysVisible: !1, borderRadius: "3px", railBorderRadius: "0" }),
        $(".chat-app .people-list .chat-list").slimscroll({ height: "calc(100vh - 107px)", color: "rgba(0,0,0,0.4)", size: "2px", alwaysVisible: !1, borderRadius: "3px", railBorderRadius: "0" });
}
($.AdminNexa.browser = {
    activate: function () {
        "" !== this.getClassName() && $("html").addClass(this.getClassName());
    },
    getBrowser: function () {
        var e = navigator.userAgent.toLowerCase();
        return /edge/i.test(e)
            ? edge
            : /rv:11/i.test(e)
            ? ie11
            : /msie 10/i.test(e)
            ? ie10
            : /opr/i.test(e)
            ? opera
            : /chrome/i.test(e)
            ? chrome
            : /firefox/i.test(e)
            ? firefox
            : navigator.userAgent.match(/Version\/[\d\.]+.*Safari/)
            ? safari
            : void 0;
    },
    getClassName: function () {
        var e = this.getBrowser();
        return e === edge ? "edge" : e === ie11 ? "ie11" : e === ie10 ? "ie10" : e === opera ? "opera" : e === chrome ? "chrome" : e === firefox ? "firefox" : e === safari ? "safari" : "";
    },
}),
    $(function () {
        $.AdminNexa.browser.activate(),
            $.AdminNexa.leftSideBar.activate(),
            $.AdminNexa.rightSideBar.activate(),
            $.AdminNexa.navbar.activate(),
            $.AdminNexa.input.activate(),
            $.AdminNexa.select.activate(),
            $.AdminNexa.search.activate(),
            setTimeout(function () {
                $(".page-loader-wrapper").fadeOut();
            }, 50);
    }),
    $(".ls-toggle-btn").on("click", function () {
        $("body").toggleClass("ls-toggle-menu");
    }),
    $(function () {
        $(".chat-launcher").on("click", function () {
            $(".chat-launcher").toggleClass("active"), $(".chat-wrapper").toggleClass("is-open");
        });
    }),
    $(function () {
        skinChanger(), CustomScrollbar();
    }),
    $(window).scroll(function () {
        $(".card .sparkline").each(function () {
            $(this).offset().top < $(window).scrollTop() + 400 && $(this).addClass("pullUp");
        });
    });
