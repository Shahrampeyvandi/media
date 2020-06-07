!(function (e) {
    "use strict";
    (window.$$ = new (function () {
        var n = !1;
        (this.html = $("html")),
            (this.body = $("body")),
            (this.header = this.body.find("header.header")),
            (this.main = this.body.find("main.main")),
            (this.searchWidget = this.header.find(".search-widget")),
            (this.searchInput = this.searchWidget.find(".input")),
            (this.page = this.body.data("page")),
            (this.pageName = this.body.data("pagename")),
            (this.isMobile = "mobile" === this.body.data("device")),
            (this.isDesktop = "desktop" === this.body.data("device")),
            (this.shname = "shistory"),
            (this.isCommandKey = function (e) {
                return (
                    -1 <
                    [13, 16, 17, 18, 20, 27, 37, 38, 39, 40, 91, 93].indexOf(e)
                );
            }),
            (this.addSearchHistory = function () {
                var e,
                    t,
                    n = this.header.find("[type=search]").val();
                !localStorage.getItem(this.shname) &&
                    localStorage.setItem(this.shname, ""),
                    5 <=
                        (e = (t = localStorage.getItem(this.shname)).split(","))
                            .length && (e.splice(0, 1), (t = e.join(","))),
                    e.indexOf(n.trim()) < 0 &&
                        localStorage.setItem(
                            this.shname,
                            ("" !== t ? t + "," : "") + n.trim()
                        );
            }),
            (this.changeTheme = function (e) {
                $$.body.hasClass("theme-light")
                    ? ($$.body
                          .removeClass("theme-light")
                          .addClass("theme-dark"),
                      updateIcon(
                          ".header .logo .icon",
                          "logo-" +
                              document
                                  .querySelector("html")
                                  .getAttribute("lang") +
                              "-dark"
                      ))
                    : ($$.body
                          .removeClass("theme-dark")
                          .addClass("theme-light"),
                      updateIcon(
                          ".header .logo .icon",
                          "logo-" +
                              document
                                  .querySelector("html")
                                  .getAttribute("lang")
                      )),
                    $("#themeName").text(e ? "Light" : "Dark");
            }),
            (this.lazyLoad = function e() {
                return (
                    !1 === n &&
                        ((n = !0),
                        setTimeout(function () {
                            var t = [].slice.call(
                                document.querySelectorAll("img.lazy")
                            );
                            t.forEach(function (e) {
                                e.getBoundingClientRect().top <=
                                    window.innerHeight &&
                                    0 <= e.getBoundingClientRect().bottom &&
                                    "none" !== getComputedStyle(e).display &&
                                    ((e.src = e.dataset.src),
                                    e.dataset.srcset &&
                                        (e.srcset = e.dataset.srcset),
                                    e.classList.remove("lazy"),
                                    e.removeAttribute("data-src"),
                                    e.removeAttribute("data-srcset"),
                                    (t = t.filter(function (e) {
                                        return e != e;
                                    })));
                            }),
                                (n = !1);
                        }, 200)),
                    e
                );
            });
    })()),
        document.addEventListener("DOMContentLoaded", function () {
            var e = $$.lazyLoad();
            if (
                (document.addEventListener("scroll", e),
                window.addEventListener("resize", e),
                window.addEventListener("orientationchange", e),
                "single-page" === $$.page)
            ) {
                var t = document.querySelector(".playlist-body .ss-content");
                t && t.addEventListener("scroll", e);
            }
        });
})(),
    (function (w, d) {
        "use strict";
        var pageProgress = $(".load-progress"),
            pageProgressBar = pageProgress.find(".bar"),
            ThrottleAjaxID = 0;
        (w.theme = {
            loading: !1,
            infiniteScrollInitialized: !1,
            thumbnailWidth: 214,
            thumbBreakpoints: [224, 448, 662, 876, 1130, 1344, 1584],
        }),
            "undefined" == typeof Element ||
                void 0 === Element.prototype ||
                Element.prototype.toggleAttribute ||
                (Element.prototype.toggleAttribute = function (e, t) {
                    return (
                        void 0 !== t && (t = !!t),
                        null !== this.getAttribute(e)
                            ? !!t || (this.removeAttribute(e), !1)
                            : !1 !== t && (this.setAttribute(e, ""), !0)
                    );
                }),
            ($.fn.addLoading = function (e, t) {
                var n =
                        '<div class="loading loading-{name}{className}"><div class="inner">{inner}{outer}</div></div>',
                    a = "";
                if (!this.find(".loading").length) {
                    switch (
                        (t &&
                            (t.removeContent && this.html(""),
                            t.full && (a += " loading-full"),
                            t.fullWindow && (a += " loading-full-window")),
                        (e = e || d.body.getAttribute("data-loading")),
                        (n = n.replace(/{className}/g, a)),
                        e)
                    ) {
                        case "game":
                            n = n
                                .replace(/{name}/g, e)
                                .replace(
                                    /{inner}/g,
                                    El.icon("loading-game-inner", "icon-inner")
                                )
                                .replace(
                                    /{outer}/g,
                                    El.icon("loading-outer", "icon-outer")
                                );
                            break;
                        default:
                            n = n
                                .replace(/{name}/g, "aparat")
                                .replace(
                                    /{inner}/g,
                                    El.icon("loading-inner", "icon-inner")
                                )
                                .replace(
                                    /{outer}/g,
                                    El.icon("loading-outer", "icon-outer")
                                );
                    }
                    return this.append(n);
                }
            }),
            ($.fn.removeLoading = function () {
                return (
                    this.hasClass("loading")
                        ? this.remove()
                        : this.find(".loading").remove(),
                    this
                );
            }),
            ($.fn.changeIconTo = function (e) {
                (void 0 === this.length ? this : this[0]).insertAdjacentHTML(
                    "afterend",
                    El.icon(e)
                ),
                    $(this).remove();
            }),
            (w.ThrottleAjax = function (e, t) {
                return function () {
                    clearTimeout(ThrottleAjaxID),
                        window.AJAX && AJAX.abort(),
                        (ThrottleAjaxID = setTimeout(function () {
                            e.apply(null, arguments);
                        }, t));
                };
            }),
            (w.Throttle = function (e, t) {
                var n = !1;
                return function () {
                    n ||
                        (e.apply(null, arguments),
                        (n = !0),
                        setTimeout(function () {
                            n = !1;
                        }, t));
                };
            }),
            (w.Debounced = function (n, a) {
                var o;
                return function () {
                    var e = arguments,
                        t = this;
                    o && clearTimeout(o),
                        (o = setTimeout(function () {
                            (o = null), n.apply(t, e);
                        }, a));
                };
            }),
            (w.localStorageFind = function (e) {
                var t,
                    n = [];
                if ("undefined" != typeof localStorage) {
                    for (t in localStorage)
                        localStorage.hasOwnProperty(t) &&
                            (t.match(e) || (!e && "string" == typeof t)) &&
                            n.push({
                                key: t,
                                value: JSON.parse(localStorage.getItem(t)),
                            });
                    return n;
                }
            }),
            (w.evalScripts = function (text) {
                var script, regexp;
                for (
                    regexp = /<script[^>]*>([\s\S]*?)<\/script>/gi;
                    (script = regexp.exec(text));

                )
                    try {
                        eval(script[1]);
                    } catch (e) {}
                return text;
            }),
            (w.b64ToBlob = function (e) {
                var t,
                    n = atob(e.split(",")[1]),
                    a = new ArrayBuffer(n.length),
                    o = new Uint8Array(a);
                for (t = 0; t < n.length; t++) o[t] = n.charCodeAt(t);
                return new Blob([a], { type: "image/jpeg" });
            }),
            (w.b64ToObjectURL = function (e) {
                return URL.createObjectURL(b64ToBlob(e));
            }),
            (w.addCommas = function (e) {
                var t,
                    n,
                    a,
                    o = /(\d+)(\d{3})/;
                for (
                    e = (e = e.toString()).replace(/[^0-9]/g, ""),
                        n = (t = (e += "").split("."))[0],
                        a = 1 < t.length ? "." + t[1] : "";
                    o.test(n);

                )
                    n = n.replace(o, "$1,$2");
                return n + a;
            }),
            (w.removeCommas = function (e) {
                return (e = (e = e.toString()).replace(/,/g, "")), parseInt(e);
            }),
            (w.removeElement = function (e, t) {
                t ? $(e).parents(t).remove() : e && $(e).remove();
            }),
            (w.replaceElement = function (e, t) {
                (e && t) ||
                    console.error(
                        "replaceElement() function need tow args, selector and element."
                    ),
                    $(e).html(t);
            }),
            (w.addLoading = function (e, t, n) {
                $(e).addLoading(t, n);
            }),
            (w.removeLoading = function (e) {
                $(e).removeLoading();
            }),
            (w.updateIcon = function (e, t) {
                var n = "svg" !== d.querySelector(e).tagName,
                    a = d.querySelector(e + (n ? " svg.icon" : "")),
                    o = a.classList.value.match(/icon-(\w)+/g);
                o.length && $(a).removeClass(o[0]),
                    $(a).addClass("icon-" + t),
                    (a.innerHTML = '<use xlink:href="#si_' + t + '"></use>');
            }),
            (w.updateButton = function (e, t) {
                for (var n = $(e), a = 0, o = n.length; a < o; a++) {
                    var i = n.eq(a);
                    if (
                        (t.icon && updateIcon(e, t.icon),
                        t.href && i.attr("href", t.href),
                        t.status && i.attr("data-status", t.status),
                        t.addClass && i.addClass(t.addClass),
                        t.removeClass && i.removeClass(t.removeClass),
                        t.attrs && i.attr(t.attrs),
                        t.text)
                    ) {
                        var r = i.find("span.text"),
                            s = i.find("> span");
                        r && r.length
                            ? r.text(t.text)
                            : s && s.length
                            ? s.text(t.text)
                            : i.text(t.text);
                    }
                }
            }),
            (w.searchQuery = function (e) {
                return (
                    (e = e
                        .trim()
                        .replace(/&/g, "&amp;")
                        .replace(/</g, "&lt;")
                        .replace(/>/g, "&gt;")
                        .replace(/"/g, "&quot;")
                        .replace(/\s|[#"'.,]/g, "_")
                        .replace(/\?|\\|\/|\%|\ØŸ/g, "_")),
                    encodeURI(resultPath + e)
                );
            }),
            (w.getURLQueryVariable = function (e) {
                var t,
                    n,
                    a = w.location.search.substring(1).split("&");
                for (t = 0; t < a.length; t++)
                    if ((n = a[t].split("="))[0] === e) return n[1];
                return !1;
            }),
            (w.handleLoadMore = function () {
                var e = $(".infinity-load");
                !e.length ||
                    e.hasClass("requested") ||
                    theme.loading ||
                    (w.pageYOffset + w.innerHeight + 350 > e.offset().top &&
                        e.addClass("requested").click());
            }),
            (w.infiniteScroll = function () {
                w.theme.infiniteScrollInitialized ||
                    ((w.theme.infiniteScrollInitialized = !0),
                    $(w).on("scroll", w.handleLoadMore));
            }),
            (w.Timer = function () {
                var a;
                (this.getTimezoneDate = function (e) {
                    var t = new Date();
                    return t.getTime() + 6e4 * t.getTimezoneOffset() + 36e5 * e;
                }),
                    (this.getDeadline = function (e) {
                        var t =
                                new Date(e.date).getTime() -
                                this.getTimezoneDate(
                                    e.timezone ||
                                        Math.abs(
                                            new Date(
                                                e.date
                                            ).getTimezoneOffset() / 60
                                        )
                                ),
                            n = Math.floor(t / 864e5),
                            a = Math.floor((t % 864e5) / 36e5),
                            o = Math.floor((t % 36e5) / 6e4),
                            i = Math.floor((t % 6e4) / 1e3);
                        return (
                            t < 0 && (this.stop(), (n = a = o = i = 0)),
                            {
                                status: 0 < t ? "active" : "expired",
                                total: t,
                                days: n || "00",
                                hours: a || "00",
                                minutes: o || "00",
                                seconds: i || "00",
                            }
                        );
                    }),
                    (this.stop = function () {
                        a && clearInterval(a);
                    }),
                    (this.start = function (e, t) {
                        var n = this;
                        e &&
                            e.date &&
                            t &&
                            (this.stop(),
                            (a = setInterval(function () {
                                t(n.getDeadline(e));
                            }, 1e3)));
                    }),
                    (this.countdown = function (e) {
                        var t, n, a, o, i;
                        return (
                            (n = Math.floor(e / 86400)),
                            (t = e % 86400),
                            (a = Math.floor(t / 3600)),
                            (t %= 3600),
                            {
                                total: e - 1,
                                days: (n < 10 ? "0" : "") + n,
                                hours: (a < 10 ? "0" : "") + a,
                                minutes:
                                    ((o = Math.floor(t / 60)) < 10 ? "0" : "") +
                                    o,
                                seconds: ((i = t %= 60) < 10 ? "0" : "") + i,
                                fullTime:
                                    (n < 10 ? "0" : "") +
                                    n +
                                    ":" +
                                    (a < 10 ? "0" : "") +
                                    a +
                                    ":" +
                                    (o < 10 ? "0" : "") +
                                    o +
                                    ":" +
                                    (i < 10 ? "0" : "") +
                                    i,
                            }
                        );
                    });
            }),
            (w.loadProgress = function (e, t) {
                t &&
                    (void 0 === t.progress || t.progress) &&
                    (pageProgressBar.width(e + "%"),
                    pageProgress.removeClass("hidden"),
                    t &&
                        t.hide &&
                        (0 === e || 100 === e) &&
                        setTimeout(function () {
                            pageProgress.addClass("hidden");
                        }, 500));
            }),
            (w.addThumbWatchedTime = function () {
                var e,
                    t,
                    n,
                    a,
                    o = localStorageFind(/ar-/);
                for (e in o)
                    o.hasOwnProperty(e) &&
                        (a =
                            "" !== (n = o[e].key.split("-")[1]) && void 0 !== n
                                ? $("[data-uid=" + n + "]")
                                : 0).length &&
                        ((t = Number(a.data("duration"))),
                        (t = (o[e].value / t) * 100),
                        a
                            .find(".thumb-wrapper")
                            .append(
                                '<div class="watched-time"><span class="percent" style="width:' +
                                    t +
                                    '%"></span></div>'
                            ));
            }),
            (w.scrollToTab = function (e) {
                for (var t = $(".tab-list"), n = 0, a = t.length; n < a; n++) {
                    var o = e || t.eq(n).find(".tab-item.active"),
                        i =
                            (t.eq(n).find(".tab-item").length - o.index() - 1) *
                                o[0].clientWidth -
                            w.innerWidth / 2.5;
                    t.eq(n).animate({ scrollLeft: i }, 100);
                }
            }),
            (w.slideToNum = function (e, t) {
                var n = e && e.text() ? removeCommas(e.text()) : 0,
                    a = n,
                    o = removeCommas(t),
                    i = n < o,
                    r = 0,
                    s = function (e, t) {
                        var n = t < e ? e - t : t - e,
                            a = Math.floor(n / 5);
                        return a < 1 ? 1 : a;
                    };
                clearInterval(r),
                    (r = setInterval(function () {
                        (i && o <= a) || (!i && a <= o)
                            ? ((a = o), clearInterval(r))
                            : o !== n
                            ? (n <= o ? (a += s(a, o)) : (a -= s(a, o)),
                              e.html(addCommas(a)))
                            : clearInterval(r);
                    }, 20));
            }),
            (w.initSlideToNum = function () {
                for (
                    var e = $("[data-slidetonum]"), t = 0, n = e.length;
                    t < n;
                    t++
                )
                    slideToNum(e.eq(t), e.eq(t).data("slidetonum"));
            }),
            (w.Ajax = function (a) {
                if (a && a.url) {
                    if ((loadProgress(10, { progress: a.progress }), a.cache)) {
                        var e = w.localCache.get(a.cache);
                        if (e)
                            return (
                                a.success && a.success(e),
                                a.done && a.done(e),
                                void loadProgress(100, {
                                    progress: a.progress,
                                    hide: !0,
                                })
                            );
                    }
                    loadProgress(50, { progress: a.progress }),
                        (w.AJAX = $.ajax({
                            url: a.url,
                            method: a.method ? a.method : "POST",
                            headers: a.headers ? a.headers : {},
                            data: a.data
                                ? a.formData
                                    ? a.data
                                    : JSON.stringify(a.data)
                                : {},
                            dataType: a.dataType ? a.dataType : "",
                            contentType: a.contentType
                                ? a.contentType
                                : "application/json; charset=utf-8",
                            enctype: a.enctype ? a.enctype : null,
                            processData: !!a.processData && a.processData,
                            retry: 3,
                            success: function (e) {
                                a.success && a.success(e),
                                    a.cache && w.localCache.set(a.cache, e);
                            },
                            error: function (e, t, n) {
                                if (
                                    (loadProgress(100, {
                                        progress: a.progress,
                                        hide: !0,
                                    }),
                                    "timeout" === t)
                                )
                                    return (
                                        (this.retry = this.retry - 1),
                                        this.retry < 3
                                            ? void $.ajax(this)
                                            : void 0
                                    );
                                "abort" !== n &&
                                    (console.error(n),
                                    a.error && a.error(e.responseJSON));
                            },
                        }).done(function (e) {
                            loadProgress(100, {
                                progress: a.progress,
                                hide: !0,
                            }),
                                a.done && a.done(e);
                        }));
                } else
                    console.warn(
                        "Ajax function options param can't be empty, * options.url is required."
                    );
            }),
            (w.getContent = function (o) {
                if (o && !o.url) return !1;
                var i = o.target ? $(o.target) : null,
                    r = o.insert ? o.insert : "",
                    e = o.data
                        ? void 0 === o.stringify ||
                          ("boolean" == typeof o.stringify && o.stringify)
                            ? JSON.stringify(o.data)
                            : o.data
                        : null;
                o.beforeAction && o.beforeAction(),
                    Ajax({
                        url: o.url,
                        cache: o.cache,
                        data: e,
                        method: o.method ? o.method : "GET",
                        success: function (e) {
                            if (
                                ((void 0 === o.evalScript || o.evalScript) &&
                                    evalScripts(e),
                                i)
                            )
                                if ("innerHTML" === r) i.html(e.toString());
                                else if ("append" === r) i.append(e.toString());
                                else if ("replace" === r)
                                    d
                                        .querySelector(o.target)
                                        .insertAdjacentHTML(
                                            "beforebegin",
                                            e.toString()
                                        ),
                                        i.remove();
                                else if ("replaceAll" === r) {
                                    d.querySelector(
                                        o.target
                                    ).insertAdjacentHTML(
                                        "beforebegin",
                                        e.toString()
                                    );
                                    for (
                                        var t = i
                                                .parent()
                                                .find(
                                                    '[id="' +
                                                        o.target.replace(
                                                            "#",
                                                            ""
                                                        ) +
                                                        '"]'
                                                ),
                                            n = 1,
                                            a = t.length;
                                        n < a;
                                        n++
                                    )
                                        t.eq(n).remove();
                                } else
                                    "beforebegin" === r ||
                                    "afterbegin" === r ||
                                    "beforeend" === r ||
                                    "afterend" === r
                                        ? d
                                              .querySelector(o.target)
                                              .insertAdjacentHTML(
                                                  r,
                                                  e.toString()
                                              )
                                        : (d.querySelector(
                                              o.target
                                          ).innerHTML = e.toString());
                        },
                        error: function (e) {
                            o.onError && o.onError(e);
                        },
                        done: function (e) {
                            o.afterAction && o.afterAction(e);
                        },
                    });
            }),
            (w.run = function (e) {
                for (var t = 0; t < e.length; t++)
                    "function" == typeof window[e[t]] && window[e[t]]();
            }),
            $(d).ready(function () {
                if (
                    (run([
                        "handleLoadMore",
                        "infiniteScroll",
                        "addThumbWatchedTime",
                        "initSlideToNum",
                        w.isMobile ? "scrollToTab" : "",
                    ]),
                    "undefined" != typeof sa)
                ) {
                    var c,
                        u = {};
                    sa("exec", function (e) {
                        try {
                            for (var t in ($("[data-recommendation]").each(
                                function (e, t) {
                                    u[$(t).data("recommendation")] = !0;
                                }
                            ),
                            (c = d.querySelectorAll(".saba-analytics"))))
                                if (c[t].dataset) {
                                    var n,
                                        a,
                                        o,
                                        i,
                                        r,
                                        s = c[t].dataset.analyticstype,
                                        l = c[t].dataset.analyticsoption;
                                    for (n in u)
                                        u.hasOwnProperty(n) &&
                                            ((r = { type: n }),
                                            l &&
                                                (r = Object.assign(
                                                    r,
                                                    JSON.parse(l)
                                                )),
                                            (a = new e.ImpressionObserver(
                                                s,
                                                r
                                            )),
                                            (i = new e.ClickObserver(s, r)),
                                            (o = new e.RightClickObserver(
                                                s,
                                                r
                                            )),
                                            c[t]
                                                .querySelectorAll(
                                                    "[data-recommendation=" +
                                                        n +
                                                        "]"
                                                )
                                                .forEach(function (e) {
                                                    a.observe(e),
                                                        i.observe(e),
                                                        o.observe(e);
                                                }));
                                }
                        } catch (e) {
                            console.log("error", e);
                        }
                    });
                }
                $(document)
                    .on("click", function (e) {
                        var t = $(e.target),
                            n = t.hasClass(".dropdown"),
                            a = t.parents(".dropdown");
                        n ||
                            (a.length && "a" !== e.target.tagName) ||
                            $(".dropdown-active").removeClass(
                                "dropdown-active"
                            );
                    })
                    .on("click", ".dd-select [class^=menu-item]", function (e) {
                        var t = $(this).parents(".dd-select"),
                            n = $(this).find(".content").text();
                        t.removeClass("dropdown-active")
                            .find(".select-btn .text")
                            .text(n);
                    })
                    .on(
                        "click",
                        ".input-text .input-box, .input-text .input-domain, .input-textarea .input-box",
                        function () {
                            $(this).parent().find(".input, .textarea").focus();
                        }
                    )
                    .on("click", ".grid-show-more", function () {
                        var e = $(this),
                            t = e.attr("data-id"),
                            n = $("#grid" + t),
                            a = e.parent().find(".grid-show-all");
                        a.length && a.show(),
                            n.attr("data-grid-rows", "all"),
                            e.remove();
                    })
                    .on("click", ".tab .tab-item > a:not(.linked)", function (
                        e
                    ) {
                        var t = $(this),
                            n = t.parents(".tab-item"),
                            a = n.attr("data-content");
                        e.preventDefault(),
                            t
                                .parents(".tab")
                                .eq(0)
                                .find(".tab-item, .tab-content")
                                .removeClass("active"),
                            n.addClass("active"),
                            $('[data-tab="' + a + '"]').addClass("active");
                    })
                    .on("click", ".dropdown .dropdown-toggle", function () {
                        for (
                            var e = $(this).parents(".dropdown"),
                                t = $(".dropdown-active"),
                                n = 0,
                                a = t.length;
                            n < a;
                            n++
                        )
                            t[n].id !== e[0].id &&
                                t.eq(n).removeClass("dropdown-active");
                        e.toggleClass("dropdown-active");
                    })
                    .on("click", ".copy-box .exec-copy", function () {
                        var e = $(this).parents(".copy-box").find("input");
                        e.focus(),
                            e.select(),
                            document.execCommand("copy"),
                            pop(TEXT.glob.copied);
                    })
                    .on(
                        "input",
                        "input[data-char-limit], textarea[data-char-limit]",
                        function () {
                            var e = $(this),
                                t = Number(
                                    this.getAttribute("data-char-limit")
                                ),
                                n = e.parents(".form-field");
                            this.value.length > t &&
                                (this.value = this.value.substr(
                                    0,
                                    this.value.length - 1
                                )),
                                n.length &&
                                    n
                                        .find(".char-limit")
                                        .html(t - this.value.length);
                        }
                    )
                    .on("click", "#openNotification", function (e) {
                        e.preventDefault(),
                            getContent({
                                url: this.href,
                                target: "#notification",
                                insert: "innerHTML",
                                afterAction: function () {
                                    SimpleScrollbar.initAll(
                                        d.querySelectorAll(
                                            "#notification [ss-container]"
                                        )
                                    );
                                },
                            });
                    })
                    .on("click", "#closeNotifSubmenu", function (e) {
                        e.preventDefault(),
                            $(this)
                                .parents(".notification")
                                .removeClass("active"),
                            $(this).parents(".modal-content").length &&
                                $(this)
                                    .parents(".modal-content")
                                    .css("overflow", "");
                    })
                    .on(
                        "click",
                        '[data-submenu="modal"] .notif-group',
                        function (e) {
                            var t = $(this).data("url");
                            $(e.target).hasClass("thumb") ||
                                (Modal.create(
                                    '<div id="notifSubmenuContent" class="notification"></div>',
                                    {
                                        id: "notifSubmenuModal",
                                        className: "modal-notif",
                                    }
                                ),
                                $("#notifSubmenuContent").addLoading("aparat"),
                                getContent({
                                    url: t + "/subtitle/false",
                                    target: "#notifSubmenuContent",
                                    insert: "innerHTML",
                                    afterAction: function () {
                                        SimpleScrollbar.initAll(
                                            d.querySelectorAll(
                                                "#notifSubmenu [ss-container]"
                                            )
                                        );
                                    },
                                }));
                        }
                    )
                    .on(
                        "click",
                        '[data-submenu="slide"] .notif-group',
                        function (e) {
                            var t = $(this),
                                n = t.parents(".notification"),
                                a = t.data("url"),
                                o = n.find(".submenu").attr("id"),
                                i = n.parents(".modal-content");
                            $(e.target).hasClass("thumb") ||
                                setTimeout(function () {
                                    n
                                        .addClass("active")
                                        .find(".submenu")
                                        .html("")
                                        .addLoading("aparat", { full: !0 }),
                                        i.length && i.css("overflow", "hidden"),
                                        getContent({
                                            url: a,
                                            target: "#" + o,
                                            insert: "innerHTML",
                                            afterAction: function () {
                                                SimpleScrollbar.initAll(
                                                    d.querySelectorAll(
                                                        "#notifSubmenu [ss-container]"
                                                    )
                                                );
                                            },
                                        });
                                }, 300);
                        }
                    )
                    .on("click", ".action-in-modal", function (e) {
                        e.preventDefault();
                        $(this);
                        var t = this.href,
                            n = this.getAttribute("data-class"),
                            a = this.getAttribute("data-target");
                        Modal.create("", { id: "", className: n, innerId: a }),
                            getContent({
                                url: t,
                                target: "#" + a,
                                insert: "innerHTML",
                            });
                    })
                    .on("click", ".input-copy .action-copy", function (e) {
                        e.preventDefault();
                        var t,
                            n = $(this)
                                .parents(".input-inner")
                                .find(".input, .textarea");
                        "password" === n[0].type &&
                            (n.attr("type", "text"), (t = !0)),
                            n
                                .attr({ disabled: null, readonly: null })
                                .focus()
                                .select(),
                            document.execCommand("copy"),
                            n.attr("disabled", "true"),
                            t && n.attr("type", "password"),
                            pop(TEXT.glob.copied);
                    })
                    .on("click", ".input-copy .action-visible", function (e) {
                        e.preventDefault();
                        var t = $(this)
                            .parents(".input-inner")
                            .find(".input, .textarea");
                        t.attr(
                            "type",
                            "password" === t[0].type ? "text" : "password"
                        );
                    })
                    .on("click", ".input-copy .action-regen", function (e) {
                        e.preventDefault();
                        var t = $(this)
                            .parents(".input-inner")
                            .find(".input, .textarea");
                        Ajax({
                            url: this.href,
                            method: "get",
                            success: function (e) {
                                t.val(e);
                            },
                        });
                    });
            });
    })(window, document),
    (function () {
        "use strict";
        window.El = new (function () {
            (this.icon = function (e, t, n) {
                var a,
                    o = document.querySelector("#si_" + e);
                return void 0 !== e && "null" != typeof o && o
                    ? '<svg class="icon icon-' +
                          e +
                          (t ? " " + t : "") +
                          '"' +
                          (n ? " " + n : "") +
                          ((a = o.getAttribute("data-viewBox"))
                              ? ' viewBox="' + a + '"'
                              : "") +
                          '><use xlink:href="#si_' +
                          e +
                          '"></use></svg>'
                    : "";
            }),
                (this.component = function (e) {
                    if ("progress-circle" === e)
                        return '<svg class="progress-svg"><circle class="progress-circle" cx="50" cy="50" r="22"></circle></svg>';
                }),
                (this.button = function (e) {
                    if (e) {
                        var t =
                            (e.type && "custom" === e.type
                                ? ""
                                : "button button-theme") +
                            " " +
                            (e.className || "");
                        return (
                            (e.type =
                                e.type && "custom" !== e.type
                                    ? e.type
                                    : "button"),
                            (e.attr = e.attr ? " " + e.attr : ""),
                            '<button type="' +
                                e.type +
                                '"' +
                                (e.id ? " id=" + e.id : "") +
                                ' class="' +
                                t +
                                '"' +
                                e.attr +
                                " >" +
                                (e.icon || e.iconStart
                                    ? this.icon(
                                          e.icon || e.iconStart,
                                          e.iconClass
                                      )
                                    : "") +
                                (e.text
                                    ? '<span class="text">' + e.text + "</span>"
                                    : "") +
                                (e.iconEnd
                                    ? this.icon(e.iconEnd, e.iconClass)
                                    : "") +
                                "</button>"
                        );
                    }
                    return "";
                }),
                (this.link = function (e) {
                    return e
                        ? ((e.href = e.url ? ' href="' + e.url + '"' : ""),
                          (e.id = e.id ? ' id="' + e.id + '"' : ""),
                          (e.className = e.className
                              ? ' class="' + e.className + '"'
                              : ""),
                          (e.attributes = e.attributes
                              ? " " + e.attributes + '"'
                              : ""),
                          "<a{href}{id}{className}{attr}>{content}</a>"
                              .replace(/{href}/, e.href)
                              .replace(/{id}/, e.id)
                              .replace(/{className}/, e.className)
                              .replace(/{attr}/, e.attributes)
                              .replace(/{content}/, e.content))
                        : "";
                });
        })();
    })(),
    (function () {
        "use strict";
        (window.localCache = new (function () {
            (this.store = {}),
                (this.get = function (e) {
                    return this.store[e];
                }),
                (this.set = function (e, t) {
                    this.store[e] = t;
                });
        })()),
            (window.cookie = new (function () {
                (this.expire = 1),
                    (this.set = function (e, t, n) {
                        document.cookie =
                            e +
                            "=" +
                            t +
                            ";max-age=" +
                            86400 * (n || this.expire);
                    }),
                    (this.get = function (e) {
                        var t = document.cookie.match(
                            new RegExp("(;\\s)?(" + e + ")=.*?;\\s", "g")
                        );
                        return t && t.length
                            ? t[0].replace(/; /g, "").split("=")[1]
                            : null;
                    });
            })());
    })(),
    // (function () {
    //     "use strict";
    //     var o, e, t, i;
    //     function n() {
    //         localStorage.setItem("term", $$.searchInput.val());
    //     }
    //     function a(a) {
    //         clearTimeout(e),
    //             (e = 0),
    //             window.AJAX && AJAX.abort(),
    //             o.addLoading("logo", { removeContent: !0 }),
    //             (e = setTimeout(function () {
    //                 var e, t, n;
    //                 2 <= a.value.trim().length &&
    //                     ((t = (e = a).value.trim()),
    //                     (n =
    //                         $(e)
    //                             .parents(".search-widget")
    //                             .attr("data-suggest-url") +
    //                         "/" +
    //                         t),
    //                     (i =
    //                         '<div class="more-suggestions"><a href="{link}" id="moreSuggestions" class="button button-white button-medium">' +
    //                         TEXT.glob.viewMore +
    //                         El.icon("left") +
    //                         "</a></div>"),
    //                     getContent({
    //                         url: n,
    //                         cache: t,
    //                         afterAction: function (e) {
    //                             o.removeLoading("logo"),
    //                                 o.html(
    //                                     e && "" !== e
    //                                         ? e +
    //                                               i.replace(
    //                                                   "{link}",
    //                                                   searchQuery(t)
    //                                               )
    //                                         : '<div class="no-suggest">' +
    //                                               TEXT.msg.noVideo +
    //                                               "</div>"
    //                                 ),
    //                                 $$.lazyLoad();
    //                         },
    //                     }));
    //             }, 400));
    //     }
    //     function r(e) {
    //         $$.html.css("overflow", "hidden"),
    //             e.addClass("has-suggest"),
    //             o.html(""),
    //             localStorage.getItem($$.shname) &&
    //                 (function () {
    //                     (t = localStorage.getItem($$.shname).split(",")),
    //                         o.removeLoading("logo");
    //                     for (var e = t.length - 1; 0 <= e; e--)
    //                         "" !== t[e] &&
    //                             o.append(
    //                                 '<a href="/search/' +
    //                                     t[e] +
    //                                     '" class="history" data-term="' +
    //                                     t[e] +
    //                                     '">' +
    //                                     El.icon("history") +
    //                                     '<span class="text">' +
    //                                     t[e] +
    //                                     "</span>" +
    //                                     El.button({
    //                                         type: "custom",
    //                                         icon: "close",
    //                                         className:
    //                                             "button button-hollow button-circular button-gray delete",
    //                                     }) +
    //                                     "</a>"
    //                             );
    //                 })();
    //     }
    //     function s(e) {
    //         $$.html.css("overflow", ""), e.removeClass("has-suggest");
    //     }
    //     "undefined" != typeof localStorage &&
    //         ("search-results" === $$.page && (n(), $$.addSearchHistory()),
    //         "single-page" === $$.page &&
    //             void 0 !== $$.pageName &&
    //             "live" !== $$.pageName &&
    //             localStorage.getItem("term") &&
    //             ($$.searchInput.val(localStorage.getItem("term")),
    //             localStorage.removeItem("term"))),
    //         $(document)
    //             .on("click", "#openSearchWidget", function () {
    //                 $$.header
    //                     .find(".search-widget")
    //                     .addClass("active")
    //                     .find(".input")
    //                     .focus();
    //             })
    //             .on("click", "#closeSearchWidget", function () {
    //                 $$.header
    //                     .find(".search-widget")
    //                     .removeClass("active has-suggest")
    //                     .find(".input")
    //                     .val("");
    //             })
    //             .on("click", "#searchIcon", function () {
    //                 var e = $(this).parents(".search-widget").find(".input"),
    //                     t = e.val().trim();
    //                 "" === t
    //                     ? e.focus()
    //                     : (window.location.href = searchQuery(t));
    //             })
    //             .on("click", ".search-widget .history", function (e) {
    //                 ($(e.target).hasClass("delete") ||
    //                     "button" === e.target.tagName ||
    //                     "svg" === e.target.tagName ||
    //                     "use" === e.target.tagName) &&
    //                     e.preventDefault();
    //             })
    //             .on("click", ".search-widget .history > .delete", function () {
    //                 var e = $(this).parents(".history");
    //                 (t = localStorage.getItem($$.shname).split(",")).splice(
    //                     t.indexOf(e.data("term")),
    //                     1
    //                 ),
    //                     localStorage.setItem($$.shname, t.join(",")),
    //                     e.remove();
    //             })
    //             .on("focus", ".search-widget .input", function () {
    //                 var e,
    //                     t = $(this).parents(".search-widget");
    //                 (o = t.find(".suggestion-content")),
    //                     (e = localStorage.getItem($$.shname)),
    //                     "undefined" != typeof localStorage &&
    //                         "" !== e &&
    //                         0 < e.split(",").length &&
    //                         r(t);
    //             })
    //             .on("keydown", ".search-widget .input", function (e) {
    //                 13 === e.keyCode &&
    //                     (window.location.href = searchQuery(this.value));
    //             })
    //             .on("input", ".search-widget .input", function (e) {
    //                 var t = $(this).parents(".search-widget");
    //                 if (
    //                     !$$.isCommandKey(e.keyCode || e.which) &&
    //                     t[0].hasAttribute("data-suggest-url")
    //                 ) {
    //                     if (
    //                         ((o = t.find(".suggestion-content")),
    //                         this.value.trim().length < 2)
    //                     )
    //                         return void s(t);
    //                     r(t), a(this);
    //                 }
    //             })
    //             .on("click", ".search-overlay", function (e) {
    //                 e.preventDefault(),
    //                     s($(this).parent().find(".search-widget"));
    //             })
    //             .on("click", '.search-widget [class*="thumbnail"]', function (
    //                 e
    //             ) {
    //                 var t = $(this);
    //                 e.preventDefault(),
    //                     $$.addSearchHistory(),
    //                     n(),
    //                     t.data("uid") &&
    //                         (window.location = t.find(".thumb").attr("href"));
    //             });
    // })(),
    (window.pop = function (e) {
        $("#popMessage").length ||
            $("body").append(
                '<div id="popMessage" class="pop-message">' + e + "</div>"
            ),
            setTimeout(function () {
                $("#popMessage").remove();
            }, 1e3);
    }),
    (window.sendMessage = function (e, t, n) {
        var a = document.createElement("DIV"),
            o = document.createElement("span"),
            i = document.createElement("a");
        (a.className =
            "message message-pop message-hidden" +
            (e ? " message-" + e : "message-info")),
            (o.className = "text"),
            (i.className = "remove"),
            (o.innerHTML = t),
            (i.innerHTML =
                '<svg class="icon icon-close" viewBox="0 0 24 24"><use xlink:href="#si_close"></use></svg>'),
            a.appendChild(i),
            a.appendChild(o),
            $("#viewMessageBox").append(a),
            setTimeout(function () {
                $(a).removeClass("message-pop"),
                    setTimeout(function () {
                        $(a).removeClass("message-hidden"),
                            setTimeout(function () {
                                $(a).addClass("message-hidden message-pop"),
                                    setTimeout(function () {
                                        $(a).remove();
                                    }, 200);
                            }, 5e3);
                    }, 200);
            }, 200);
    }),
    $(document).on("click", ".message .remove", function () {
        var e = $(this).parent();
        e.addClass("message-pop message-hidden"),
            setTimeout(function () {
                e.remove();
            }, 200);
    }),
    (function () {
        "use strict";
        var e = $("#main"),
            t = function () {
                (e[0].hasAttribute("data-so") || window.innerWidth < 1138) &&
                    (e[0].hasAttribute("data-sidebar")
                        ? $$.html.css("overflow", "hidden")
                        : $$.html.css("overflow", "")),
                    e[0].toggleAttribute("data-sidebar"),
                    isMobile ||
                        e[0].hasAttribute("data-so") ||
                        listSlider.updateSlides();
            };
        $(document)
            .on("click", ".sidebar-toggler", t)
            .on("click touchend", ".sidebar-overlay", Throttle(t, 50))
            .on("click", ".menu-show-more > a", function (e) {
                e.preventDefault();
                var t = $(this),
                    n = t.parents(".menu-wrapper"),
                    a = n.hasClass("menu-more");
                n
                    .removeClass(a ? "menu-more" : "menu-less")
                    .addClass(a ? "menu-less" : "menu-more"),
                    t
                        .find(".content")
                        .text(a ? TEXT.glob.showLess : TEXT.glob.showMore);
            }),
            $(window).on("resize", function () {
                $$.main[0].hasAttribute("data-so") ||
                    (window.innerWidth < 1137 &&
                    !$$.main[0].hasAttribute("data-sidebar")
                        ? $$.main.attr("data-sidebar", "")
                        : 1137 <= window.innerWidth &&
                          !$$.main[0].hasAttribute("data-sidebar") &&
                          $$.main.attr("data-sidebar", ""));
                         
            });
    })(),
    (function () {
        "use strict";
        (window.listSlider = {
            sliders: [],
            getBreakpoints: function (n, a) {
                var o = document
                        .querySelector("#main")
                        .hasAttribute("data-sidebar"),
                    i = {};
                return (
                    (n = n || {}),
                    theme.thumbBreakpoints.forEach(function (e, t) {
                        (t = Number(t)),
                            a && "theater" === a
                                ? (i[e] = {
                                      slidesPerGroup: 1,
                                      slidesPerView: 1,
                                  })
                                : n.breakpoints
                                ? (i[e] = {
                                      slidesPerGroup: n.breakpoints[t],
                                      slidesPerView: n.breakpoints[t],
                                  })
                                : ((5 !== t && 6 !== t) || (t = o ? t - 1 : t),
                                  (i[e] = {
                                      slidesPerGroup: t,
                                      slidesPerView: t,
                                  }));
                    }),
                    i
                );
            },
            updateSlides: function () {
                var e = $(".swiper-container");
                if (e.length) {
                    var t = e[0].clientWidth / 214;
                    listSlider.sliders.forEach(function (e) {
                        (e.params.slidesPerView = t),
                            (e.params.slidesPerGroup = t),
                            (e.params.breakpoints = listSlider.getBreakpoints()),
                            e.update(),
                            listSlider.updateArrows($(e.$el[0]));
                    });
                }
            },
            updateArrows: function (e) {
                var t = e[0].swiper,
                    n = e.find("~ .carousel-arrow"),
                    a = t.isBeginning,
                    o = t.isEnd;
                n.removeClass("is-hidden"),
                    a && o
                        ? n.remove()
                        : a
                        ? e.find("~ .carousel-arrow.prev").addClass("is-hidden")
                        : o &&
                          e
                              .find("~ .carousel-arrow.next")
                              .addClass("is-hidden");
            },
            init: function (e, t) {
                t = t || {};
                var n = $(e),
                    a = n.data("type"),
                    o = {
                        rtl: !0,
                        on: {
                            touchEnd: function () {
                                setTimeout(function () {
                                    listSlider.updateArrows($(e));
                                }, 100);
                            },
                        },
                    };
                if ("custom" === a) {
                    var i = ["xxs", "xs", "sm", "md", "lg", "xl", "xxl"];
                    t.breakpoints = [];
                    for (var r = 0, s = i.length; r < s; r++)
                        n.data("bp-" + i[r]) &&
                            t.breakpoints.push(n.data("bp-" + i[r]));
                    o.slidesPerView = o.slidesPerGroup =
                        n.data("bp-default") || 4;
                } else
                    "channel" === a
                        ? ((t.breakpoints = [2, 2, 3, 5, 6, 7, 8, 8]),
                          (o.slidesPerView = o.slidesPerGroup = 8))
                        : "poster" === a
                        ? ((t.breakpoints = [2, 2, 3, 5, 6, 7, 8]),
                          (o.slidesPerView = o.slidesPerGroup = 8))
                        : "theater" === a
                        ? ((t.breakpoints = [1, 1, 1, 1, 1, 1, 1, 1]),
                          (o.loop = !0),
                          (o.effect = "fade"),
                          (o.fadeEffect = { crossFade: !0 }),
                          (o.autoplay = !0),
                          (o.slidesPerView = o.slidesPerGroup = 1),
                          (o.pagination = {
                              el: ".swiper-pagination",
                              clickable: !0,
                              renderBullet: isMobile
                                  ? null
                                  : function (e, t) {
                                        return (
                                            '<span class="' +
                                            t +
                                            '" style="background-image:' +
                                            this.slides[e + 1]
                                                .querySelector(
                                                    ".thumbnail-theater"
                                                )
                                                .style.backgroundImage.replace(
                                                    /"/g,
                                                    ""
                                                ) +
                                            '"></span>'
                                        );
                                    },
                          }))
                        : (o.slidesPerView = o.slidesPerGroup = 6);
                (o.breakpoints = listSlider.getBreakpoints(t)),
                    listSlider.sliders.push(new Swiper(e, o)),
                    n.addClass("carousel-initialized");
            },
        }),
            $(document).ready(function () {
                for (
                    var e = $(".carousel-theater"), t = 0, n = e.length;
                    t < n;
                    t++
                )
                    1 < e.eq(t).find(".carousel-item").length &&
                        (listSlider.init("#" + e[t].id, { theater: !0 }),
                        isMobile ||
                            e
                                .eq(t)
                                .on("mouseenter", function () {
                                    this.swiper &&
                                        this.swiper.autoplay.running &&
                                        this.swiper.autoplay.stop();
                                })
                                .on("mouseleave", function () {
                                    this.swiper &&
                                        !this.swiper.autoplay.running &&
                                        this.swiper.autoplay.start();
                                }));
            }),
            isMobile ||
                $(document).on(
                    "click",
                    ".slick-button.slick-prev, .slick-button.slick-next",
                    function () {
                        var e = $(this),
                            t = e.hasClass("slick-next"),
                            n = e
                                .parents(".carousel-arrow")
                                .parent()
                                .find(".swiper-container"),
                            a = "#" + n[0].id;
                        n[0].swiper
                            ? t
                                ? n[0].swiper.slideNext()
                                : n[0].swiper.slidePrev()
                            : (listSlider.init(a),
                              t
                                  ? $(a)[0].swiper.slideNext()
                                  : $(a)[0].swiper.slidePrev()),
                            listSlider.updateArrows(n);
                    }
                );
    })(),
    (function () {
        "use strict";
        isMobile ||
            $(document)
                .on("mouseenter", ".thumb-preview", function () {
                    var e = $(this),
                        t = e.attr("id"),
                        n = e.attr("data-poster");
                    t &&
                        n &&
                        (e.append(
                            '<video class="preview" poster="' +
                                n +
                                '" src="https://static.cdn.asset.aparat.com/avt/' +
                                t +
                                '_15s.mp4" muted autoplay style="opacity: 0"></video>'
                        ),
                        e.find(".preview").animate({ opacity: "1" }, 300),
                        $("video.preview").on("ended", function () {
                            $(this)
                                .parent()
                                .append(El.icon("play", "preview-play"));
                        }));
                })
                .on("mouseleave", ".thumb-preview", function () {
                    var e = $(this).find(".preview"),
                        t = $(this).find(".preview-play");
                    e.off("ended"), e.remove(), t.remove();
                });
    })(),
    (function () {
        "use strict";
        function t(e) {
            window.Modal && window.Modal.isOpen && window.Modal.closable
                ? window.Modal.die()
                : !e.hasClass("modal-js") && e.removeClass("modal-active");
        }
        function n() {
            $(".profile-modal").css("top", ""),
                setTimeout(function () {
                    a.die();
                }, 300);
        }
        var a = new (function () {
            (this.id = "modalJS"),
                (this.class = "modal modal-js modal-active"),
                (this.isOpen = !1),
                (this.confirmCallbackOk = !1),
                (this.confirmCallbackCancel = !1),
                (this.closeConfirmAfterOK = !0),
                (this.closable = !0),
                (this.onOpen = null),
                (this.onClose = null),
                (this.onConfirmOk = function (e) {
                    e.preventDefault(),
                        this.confirmCallbackOk && this.confirmCallbackOk(),
                        this.closeConfirmAfterOK && this.die();
                }.bind(this)),
                (this.onConfirmCancel = function (e) {
                    e.preventDefault(),
                        this.confirmCallbackCancel &&
                            this.confirmCallbackCancel(),
                        this.die();
                }.bind(this)),
                (this.element = function () {
                    return function () {
                        var e = document.createElement("div");
                        return (e.id = this.id), (e.className = this.class), e;
                    }.bind(this)();
                }.bind(this)()),
                (this.close = new Promise(
                    function (e, t) {
                        this.onClose && this.onClose(),
                            setTimeout(function () {
                                e();
                            }, 20);
                    }.bind(this)
                )),
                (this.closeButton = function () {
                    return this.closable
                        ? '<button type="button" id="closeModal" class="button button-medium button-gray button-hollow button-circular modal-close">' +
                              El.icon("close") +
                              "</button>"
                        : "";
                }),
                (this.addLoading = function () {
                    $(this.element).find(".modal-content").addLoading("aparat");
                }),
                (this.create = function (e, t) {
                    if (
                        (void 0 === t && (t = {}),
                        (this.closable = !(
                            void 0 !== t.closable && !t.closable
                        )),
                        this.isOpen)
                    )
                        console.warn(
                            "Modal is open! can't open it again. use Modal.die() then open a new Modal."
                        );
                    else {
                        this.isOpen = !0;
                        var n =
                            void 0 !== t.close
                                ? t.close
                                    ? this.closeButton()
                                    : ""
                                : this.closeButton();
                        t.id && (this.element.id = t.id),
                            t.className &&
                                (this.element.className += " " + t.className),
                            (this.element.innerHTML =
                                '<div class="modal-content">' +
                                n +
                                "   <div " +
                                (t && t.innerId ? "id=" + t.innerId : "") +
                                ' class="modal-inner">' +
                                (e || "") +
                                "</div></div>"),
                            (document.querySelector("html").style.overflow =
                                "hidden"),
                            document.body.appendChild(this.element),
                            t.onOpen &&
                                ((this.onOpen = t.onOpen.bind(this)),
                                this.onOpen()),
                            t.onClose && (this.onClose = t.onClose.bind(this)),
                            t.loading && this.addLoading(),
                            this.closable &&
                                $(document)
                                    .on("click", ".modal", this.closeIfModal)
                                    .on(
                                        "click",
                                        ".modal .modal-close",
                                        this.closeModal
                                    ),
                            document
                                .querySelector(".modal-content")
                                .addEventListener(
                                    "scroll",
                                    window.handleLoadMore
                                );
                    }
                }),
                (this.confirm = function (e) {
                    if (this.isOpen)
                        console.warn(
                            "Modal/Confirm is open! can't open it again. use Modal.die() then open a new Modal."
                        );
                    else {
                        var t = e && e.icon ? El.icon(e.icon) : "",
                            n =
                                e && e.title
                                    ? '<h3 class="title">' + e.title + "</h3>"
                                    : "",
                            a =
                                e && e.caption
                                    ? '<span class="caption">' +
                                      e.caption +
                                      "</span>"
                                    : "",
                            o =
                                '<a href="#" class="button button-medium button-info confirm-agree">' +
                                (e && e.okText ? e.okText : TEXT.glob.yes) +
                                "</a>",
                            i =
                                '<a href="#" class="button button-medium button-gray confirm-abort">' +
                                (e && e.cancelText
                                    ? e.cancelText
                                    : TEXT.glob.cancel) +
                                "</a>";
                        (this.confirmCallbackOk = !(!e || !e.onOk) && e.onOk),
                            (this.confirmCallbackCancel =
                                !(!e || !e.onCancel) && e.onCancel),
                            (this.closeConfirmAfterOK =
                                !e || void 0 === e.closeOnOk || e.closeOnOk),
                            this.create(
                                '<div id="confirmContent" class="confirmation">' +
                                    t +
                                    n +
                                    a +
                                    '<div class="actions">' +
                                    i +
                                    o +
                                    "</div></div>",
                                {
                                    className: "modal-confirm",
                                    innerId: e && e.targetId ? e.targetId : "",
                                }
                            ),
                            $(document)
                                .on(
                                    "click",
                                    ".modal .confirm-agree",
                                    this.onConfirmOk
                                )
                                .on(
                                    "click",
                                    ".modal .confirm-abort",
                                    this.onConfirmCancel
                                );
                    }
                }),
                (this.replace = function (e) {
                    this.element.querySelector(".modal-inner").innerHTML = e;
                }),
                (this.closeModal = function () {
                    this.onClose && this.onClose(), this.closable && this.die();
                }.bind(this)),
                (this.closeIfModal = function (e) {
                    $(e.target).hasClass("modal") &&
                        (this.onClose && this.onClose(),
                        this.closable && this.die());
                }.bind(this)),
                (this.die = function () {
                    this.close.then(
                        function () {
                            (this.isOpen = !1),
                                (this.element.innerHTML = ""),
                                (this.element.id = this.id),
                                (this.element.className = this.class),
                                this.element.remove(),
                                (document.querySelector("html").style.overflow =
                                    ""),
                                $(document)
                                    .off("click", ".modal", this.closeIfModal)
                                    .off(
                                        "click",
                                        ".modal .modal-close",
                                        this.closeModal
                                    )
                                    .off(
                                        "click",
                                        ".modal .confirm-agree",
                                        this.onConfirmOk
                                    )
                                    .off(
                                        "click",
                                        ".modal .confirm-abort",
                                        this.onConfirmCancel
                                    );
                        }.bind(this)
                    );
                }.bind(this));
        })();
        (window.Modal = a),
            $(document)
                .on("click", ".header .open-modal", function (e) {
                    if ((e.preventDefault(), a.isOpen)) n();
                    else {
                        var t = $("#header").height() - 1;
                        a.create("", {
                            innerId: "modalProfileMenu",
                            close: !1,
                            closable: !1,
                            className: "profile-modal",
                        }),
                            getContent({
                                url: "/user/profile/menu",
                                target: "#modalProfileMenu",
                                insert: "innerHTML",
                                afterAction: function () {
                                    $(".profile-modal").css("top", t);
                                },
                            });
                    }
                })
                .on("click", "#closeProfileModal", n)
                .on("click", ".modal-close", function () {
                    t($(this).parents(".modal"));
                })
                .on("click touchend", ".modal", function (e) {
                    $(e.target).hasClass("modal") &&
                        !$(e.target).hasClass("modal-cropper") &&
                        t($(this));
                })
                .on("keyup", function (e) {
                    27 === e.keyCode &&
                        (window.Modal &&
                            window.Modal.isOpen &&
                            window.Modal.closable &&
                            window.Modal.die(),
                        $(".modal:not(.modal-js)").removeClass("modal-active"));
                });
    })(),
    (function () {
        "use strict";
        $(document)
            .on("click", "a:not(.request-link)[data-confirm]", function (e) {
                var t = $(this),
                    n = t[0].href,
                    a = t.attr("target"),
                    o = t.attr("data-confirm");
                o &&
                    (e.preventDefault(),
                    Modal.confirm({
                        title: o,
                        okText: t.attr("data-confirm-ok"),
                        cancelText: t.attr("data-confirm-cancel"),
                        targetId: t.attr("data-confirm-targetid"),
                        closeOnOk: t[0].hasAttribute("data-confirm-closeonok"),
                        onOk: function () {
                            a && "_blank" === a
                                ? window.open(n)
                                : (window.location.href = n);
                        },
                    }));
            })
            .on("click", ".request-link", function (e) {
                var t,
                    n,
                    a,
                    o,
                    i,
                    r = $(this),
                    s = r.parent(),
                    l = r.attr("href"),
                    c = r.attr("data-target"),
                    d = r.attr("data-insert"),
                    u = $(c),
                    m = r.attr("data-remove-link"),
                    h = r.attr("data-before-action"),
                    f = r.attr("data-after-action"),
                    p = r[0].hasAttribute("data-content-replace"),
                    g = r[0].hasAttribute("data-tab"),
                    v = r.attr("data-loading"),
                    w = r.attr("data-loading-replace"),
                    b = void 0 !== r.attr("data-modal"),
                    y = r.attr("data-modal-id"),
                    T = r.attr("data-modal-inner"),
                    C = r.attr("data-modal-class"),
                    k = r.attr("data-confirm"),
                    x = r.attr("data-confirm-ok"),
                    S = r.attr("data-confirm-cancel"),
                    E = r.attr("data-confirm-targetid"),
                    A = r[0].hasAttribute("data-confirm-closeonok"),
                    M = { element: r, targetElement: u, contentReplace: p },
                    N = function () {
                        Ajax({
                            url: l,
                            method: "GET",
                            progress: !r.hasClass("infinity-load"),
                            success: function (e) {
                                v &&
                                    ((window.theme.loading = !1),
                                    c ? u.removeLoading() : s.removeLoading()),
                                    b
                                        ? Modal.create(e.toString(), {
                                              id: y,
                                              innerId: T,
                                              className: C,
                                          })
                                        : c
                                        ? "innerHTML" === d
                                            ? u.html(e.toString())
                                            : "append" === d
                                            ? u.append(e.toString())
                                            : "replace" === d
                                            ? u.html(e)
                                            : "beforebegin" === d ||
                                              "afterbegin" === d ||
                                              "beforeend" === d ||
                                              "afterend" === d
                                            ? document
                                                  .querySelector(c)
                                                  .insertAdjacentHTML(
                                                      d,
                                                      e.toString()
                                                  )
                                            : (document.querySelector(
                                                  c
                                              ).innerHTML = e.toString())
                                        : r.parent().append(e.toString()),
                                    m && r.remove(),
                                    document.querySelector("#container")
                                        .clientHeight < window.innerHeight &&
                                        window.handleLoadMore();
                            },
                            done: function (e) {
                                (M.response = e),
                                    g &&
                                        (M.targetElement.removeLoading(),
                                        $$.lazyLoad()),
                                    f && window[f] && window[f](M);
                            },
                            error: function (e) {
                                c ? u.removeLoading() : s.removeLoading(),
                                    (window.theme.loading = !1),
                                    console.error("Error => ", e);
                            },
                        });
                    },
                    L = function () {
                        k
                            ? Modal.confirm({
                                  title: k,
                                  okText: x,
                                  cancelText: S,
                                  targetId: E,
                                  closeOnOk: A,
                                  onOk: N,
                              })
                            : N();
                    };
                e.preventDefault(),
                    (d = d ? d.replace("#", "") : "replace"),
                    v &&
                        ((n = s),
                        (t = c) ? $(t).addLoading(!1) : n.addLoading(!1),
                        (window.theme.loading = !0)),
                    w &&
                        ((o = s),
                        (a = c)
                            ? $(a).addLoading(!1, { removeContent: !0 })
                            : o.addLoading(!1, { removeContent: !0 }),
                        (window.theme.loading = !0)),
                    h &&
                        (g &&
                            ((i = M).contentReplace && i.targetElement.html(""),
                            i.targetElement.addLoading("logo")),
                        h && window[h] && window[h](M)),
                    L();
            });
    })(),
    (function () {
        "use strict";
        function a(e) {
            e.parents(".toggle-box")
                .find(".toggle-content")
                .slideToggle("fast");
        }
        $(document)
            .on("click", ".toggle-box .toggle-action", function (e) {
                var t = $(this),
                    n = t
                        .parents(".toggle-box")[0]
                        .hasAttribute("data-togglable");
                "LABEL" !== e.target.tagName &&
                    n &&
                    (t.find(".end-icon").toggleClass("rotate-180"), a(t));
            })
            .on("change", ".toggle-box .input-checkbox .input", function (e) {
                var t = $(this);
                t.parents(".toggle-box")[0].hasAttribute("data-togglable") ||
                    a(t);
            });
    })(),
    (function () {
        "use strict";
        var o = function (e, t) {
            for (var n in t)
                t.hasOwnProperty(n) &&
                    (e = e.replace(new RegExp("{" + n + "}", "g"), t[n]));
            return e;
        };
        window.getFormData = function (e) {
            for (
                var t = new FormData(), n = e.elements, a = 0;
                a < n.length;
                a++
            )
                if ("radio" === n[a].type || "checkbox" === n[a].type) {
                    if (!t.get(n[a].name)) {
                        for (
                            var o = e.querySelectorAll(
                                    '[name="' + n[a].name + '"]:checked'
                                ),
                                i = [],
                                r = 0,
                                s = o.length;
                            r < s;
                            r++
                        )
                            t.get(o[r].name), i.push(o[r].value);
                        t.append(n[a].name, i.join(","));
                    }
                } else
                    "SELECT" === n[a].tagName
                        ? t.append(
                              n[a].name,
                              -1 < n[a].selectedIndex
                                  ? n[a][n[a].selectedIndex].value
                                  : ""
                          )
                        : "INPUT" === n[a].tagName && "file" === n[a].type
                        ? t.append(n[a].name, n[a])
                        : "submit" !== n[a].type &&
                          "BUTTON" !== n[a].tagName &&
                          t.append(n[a].name, n[a].value);
            return t;
        };
        window.form = new (function () {
            var c = this;
            (this.errorsClassName = "has-error"),
                (this.getFormValues = function (e) {
                    for (var t = e.elements, n = {}, a = 0; a < t.length; a++)
                        if ("radio" === t[a].type || "checkbox" === t[a].type) {
                            if (void 0 === n[t[a].name]) {
                                for (
                                    var o = e.querySelectorAll(
                                            '[name="' + t[a].name + '"]:checked'
                                        ),
                                        i = [],
                                        r = 0,
                                        s = o.length;
                                    r < s;
                                    r++
                                )
                                    void 0 === n[o[r].name] &&
                                        i.push(o[r].value);
                                n[t[a].name] = i.join(",");
                            }
                        } else
                            "SELECT" === t[a].tagName
                                ? (n[t[a].name] =
                                      -1 < t[a].selectedIndex
                                          ? t[a][t[a].selectedIndex].value
                                          : "")
                                : "submit" !== t[a].type &&
                                  "BUTTON" !== t[a].tagName &&
                                  (n[t[a].name] = t[a].value);
                    return n;
                }),
                (this.removeFormErrors = function (e) {
                    for (
                        var t = e.find(".form-field"), n = 0;
                        n < t.length;
                        n++
                    )
                        t.eq(n)
                            .removeClass("has-error")
                            .find(".field-error")
                            .remove();
                }),
                (this.addErrorToInput = function (e, n) {
                    var a;
                    $.map(e, function (e, t) {
                        (a = n
                            .find("[name=" + t + "]")
                            .parents(".form-field")).hasClass(
                            c.errorsClassName
                        ) ||
                            (a.addClass(c.errorsClassName),
                            "string" == typeof e
                                ? a.append(
                                      o(
                                          "<div class='field-error'><span>{message}</span></div>",
                                          { message: e }
                                      )
                                  )
                                : $.map(e, function (e, t) {
                                      a.append(
                                          o(
                                              "<div class='field-error'><span>{message}</span></div>",
                                              { message: e }
                                          )
                                      );
                                  }));
                    });
                }),
                $(document)
                    .ready(function () {
                        window.validation &&
                            validation.init(
                                TEXT
                                    ? {
                                          errors: {
                                              parentNode: "form-field",
                                              className: c.errorsClassName,
                                              required: TEXT.error.required,
                                              email: TEXT.error.email,
                                              mobile: TEXT.error.mobile,
                                              NaN: TEXT.error.NaN,
                                              url: TEXT.error.url,
                                              phone: TEXT.error.phone,
                                              domain: TEXT.error.domain,
                                              number: TEXT.error.number,
                                              IBAN: TEXT.error.IBAN,
                                              personalID: TEXT.error.personalID,
                                              postalCode: TEXT.error.postalCode,
                                              en: TEXT.error.en,
                                              fa: TEXT.error.fa,
                                              radio: TEXT.error.radio,
                                              file: TEXT.error.file,
                                              fileType: TEXT.error.fileType,
                                              fileSize: TEXT.error.fileSize,
                                              minChar: [
                                                  TEXT.error.minChar[0],
                                                  TEXT.error.minChar[1],
                                              ],
                                              maxChar: [
                                                  TEXT.error.maxChar[0],
                                                  TEXT.error.maxChar[1],
                                              ],
                                              minNum: [
                                                  TEXT.error.minNum[0],
                                                  TEXT.error.minNum[1],
                                              ],
                                              maxNum: [
                                                  TEXT.error.maxNum[0],
                                                  TEXT.error.maxNum[1],
                                              ],
                                              minOptions: [
                                                  TEXT.error.minOptions[0],
                                                  TEXT.error.minOptions[1],
                                              ],
                                              maxOptions: [
                                                  TEXT.error.maxOptions[0],
                                                  TEXT.error.maxOptions[1],
                                              ],
                                              checkbox: [
                                                  TEXT.error.checkbox[0],
                                                  TEXT.error.checkbox[1],
                                              ],
                                          },
                                      }
                                    : {
                                          errors: {
                                              parentNode: "form-field",
                                              className: c.errorsClassName,
                                          },
                                      }
                            );
                    })
                    .on("submit", "form:not([data-ajax])", function (e) {
                        var t = $(this)[0].id;
                        "undefined" == typeof validation ||
                            validation.form("#" + t, { input: !0 }) ||
                            e.preventDefault();
                    })
                    .on("submit", "form[data-ajax]", function (e) {
                        e.preventDefault();
                        var t = $(this),
                            n = t.attr("method"),
                            a = t.data("ajax-url"),
                            o = c.getFormValues(this),
                            i = t.data("ajax-loading"),
                            r = t[0].id,
                            s = t.data("ajax-before"),
                            l = t.data("ajax-after");
                        c.removeFormErrors(t),
                            "undefined" != typeof validation &&
                                validation.form("#" + r, { input: !0 }) &&
                                (i && t.addLoading("logo"),
                                s && window[s] && window[s](),
                                Ajax({
                                    method: n,
                                    url: a,
                                    data: o,
                                    success: function (e) {
                                        evalScripts(e),
                                            i && t.removeLoading(),
                                            l && window[l] && window[l](e);
                                    },
                                    error: function (e) {
                                        i && t.removeLoading(),
                                            e.errors &&
                                                c.addErrorToInput(e.errors, t);
                                    },
                                }));
                    });
        })();
    })(),
    (function () {
        "use strict";
        $(document).on("click", ".accordion .title > a", function (e) {
            e.preventDefault();
            var t = $(this).parents(".accordion");
            t.hasClass("open") ||
                $(".accordion").removeClass("open").find(".content").slideUp(),
                t.toggleClass("open").find(".content").slideToggle();
        });
    })();
