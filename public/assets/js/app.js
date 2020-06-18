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
    })()
    
   
   
   
 
