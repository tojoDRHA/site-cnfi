function launch_chaty(t) {
    null != t && "widget_index" != t || (t = 1), t = parseInt(t);
    var e = -1;
    if (chaty_settings.chaty_widgets.length > 0)
        for (var a = 0; a < chaty_settings.chaty_widgets.length; a++) {
            var i = chaty_settings.chaty_widgets[a].widget_index;
            i = "" == i ? 0 : parseInt(i.replace("_", "")), (i += 1) == t && (e = a)
        } - 1 != e && e > -1 ? $("#chaty-widget-" + e).length && ($("#chaty-widget-" + e).removeClass("hide-widget"), $("#chaty-widget-" + e + " .i-trigger .i-trigger-open").trigger("click")) : console.log("widget not exists on this page")
}

function close_chaty() {
    $("#chaty-inline-popup").hasClass("active") && $("#chaty-inline-popup .close-chaty-popup").trigger("click"), $(".chaty-widget.chaty-widget-show").length && $(".chaty-widget.chaty-widget-show").each(function() {
        $(this).find(".chaty-close-settings").length && $(this).find(".chaty-close-settings").trigger("click")
    })
}
$(function(t) {
    ! function(t) {
        var e = {};

        function a(i) {
            if (e[i]) return e[i].exports;
            var s = e[i] = {
                i: i,
                l: !1,
                exports: {}
            };
            return t[i].call(s.exports, s, s.exports, a), s.l = !0, s.exports
        }
        a.m = t, a.c = e, a.d = function(t, e, i) {
            a.o(t, e) || Object.defineProperty(t, e, {
                configurable: !1,
                enumerable: !0,
                get: i
            })
        }, a.n = function(t) {
            var e = t && t.__esModule ? function() {
                return t.default
            } : function() {
                return t
            };
            return a.d(e, "a", e), e
        }, a.o = function(t, e) {
            return Object.prototype.hasOwnProperty.call(t, e)
        }, a.p = "/", a(a.s = 10)
    }({
        10: function(t, e, a) {
            a(11), t.exports = a(12)
        },
        11: function(e, a) {
            ! function(e) {
                var a, i = "",
                    s = !1,
                    c = 0,
                    n = "",
                    h = !1,
                    r = !1,
                    o = !1,
                    y = !1,
                    g = 0,
                    d = !1,
                    l = !1,
                    u = !1;

                function p(t) {
                    for (var e = t + "=", a = document.cookie.split(";"), i = 0; i < a.length; i++) {
                        for (var s = a[i];
                            " " == s.charAt(0);) s = s.substring(1);
                        if (0 == s.indexOf(e)) return s.substring(e.length, s.length)
                    }
                    return ""
                }

                function _(e) {
                    if (c = e, e < a.chaty_widgets.length && function() {
                            if (0 == chaty_settings.chaty_widgets[c].has_date_setting) return !0;
                            var t = chaty_settings.chaty_widgets[c].chaty_start_time,
                                e = chaty_settings.chaty_widgets[c].chaty_end_time,
                                a = new Date;
                            a.setHours(a.getUTCHours() + parseFloat(chaty_settings.chaty_widgets[c].date_utc_diff));
                            var i = a.getFullYear() + "-" + w(a.getMonth() + 1) + "-" + w(a.getDate()) + " " + w(a.getHours()) + ":" + w(a.getMinutes()) + ":" + w(a.getSeconds());
                            if ("" == e && t <= i) return !0;
                            if ("" == t && e >= i) return !0;
                            if ("" != t && "" != e && t <= i && e >= i) return !0;
                            return n++, setTimeout(function() {
                                _(n)
                            }, 10), !1
                        }())
                        if (a.chaty_widgets[e].countries.length > 0)
                            if ("" == i) {
                                $.get("https://www.cloudflare.com/cdn-cgi/trace", function(t) {
                                    var e = t.match("loc=(.*)");
                                    e.length > 1 && ((e = e[1]) ? (e = e.toUpperCase(), i = e, -1 != $.inArray(e, a.chaty_widgets[c].countries) ? f(c) : (n++, setTimeout(function() {
                                        _(n)
                                    }, 10))) : (n++, setTimeout(function() {
                                        _(n)
                                    }, 10)))
                                })
                            } else -1 != $.inArray(i, a.chaty_widgets[c].countries) ? f(c) : (n++, setTimeout(function() {
                                _(n)
                            }, 10));
                    else f(e);
                    if ($("body .has-custom-chaty-popup.whatsapp-button.open-it-by-default:first-child").length && !u)
                        if ($("body .has-custom-chaty-popup.whatsapp-button.open-it-by-default:first-child").closest(".chaty-widget").hasClass("one_widget")) {
                            var s = $("body .has-custom-chaty-popup.whatsapp-button.open-it-by-default:first-child");
                            if ($("#chaty-inline-popup").length) {
                                r = s.data("data-index");
                                t("#chaty-widget-" + r).removeClass("chaty-popup-open"), t(".chaty-popup-open").removeClass("chaty-popup-open"), $(".chaty-widget.hide-block").removeClass("active")
                            }
                            if ($("#chaty-inline-popup").remove(), null != s.attr("data-popup") && "" != s.attr("data-popup")) {
                                r = s.closest(".chaty-widget").attr("data-index"), chaty_settings.chaty_widgets[r].widget_index;
                                $("#chaty-widget-" + r).addClass("hide-block"), $("#chaty-widget-" + r).addClass("chaty-popup-open");
                                var h = "<div data-index='" + r + "' id='chaty-inline-popup' class='chaty-inline-popup chaty-popup-form " + t(this).data("channel") + "-channel'>";
                                h += s.attr("data-popup"), $("body").append(h);
                                r = s.closest(".chaty-widget").attr("data-index");
                                "horizontal" == chaty_settings.chaty_widgets[r].mode ? ($(".chaty-inline-popup").css("bottom", parseInt(chaty_settings.chaty_widgets[r].bot) + "px"), "right" == chaty_settings.chaty_widgets[r].pos_side ? $(".chaty-inline-popup").css("left", "auto").css("right", chaty_settings.chaty_widgets[r].side + "px") : $(".chaty-inline-popup").css("right", "auto").css("left", chaty_settings.chaty_widgets[r].side + "px")) : ($(".chaty-inline-popup").css("bottom", parseInt(chaty_settings.chaty_widgets[r].bot) + "px"), "right" == chaty_settings.chaty_widgets[r].pos_side ? $(".chaty-inline-popup").css("left", "auto").css("right", parseInt(chaty_settings.chaty_widgets[r].side) + "px") : $(".chaty-inline-popup").css("right", "auto").css("left", parseInt(chaty_settings.chaty_widgets[r].side) + "px")), $(".chaty-inline-popup .default-value").length && ($(".chaty-whatsapp-msg").val($(".chaty-inline-popup .default-value").text()), $(".chaty-whatsapp-phone").val($(".chaty-inline-popup .default-msg-phone").text()), $(".chaty-whatsapp-message").html($(".chaty-inline-popup .default-msg-value").html())), $("#chaty-widget-" + r).addClass("active"), setTimeout(function() {
                                    $("#chaty-inline-popup").addClass("active")
                                }, 150), $("body").hasClass("chaty-in-mobile") || $(".chaty-whatsapp-msg").focus()
                            }
                        } else {
                            var r = $("body .has-custom-chaty-popup.whatsapp-button.open-it-by-default:first-child").closest(".chaty-widget").attr("data-index");
                            Q("cht_whatsapp_window" + chaty_settings.chaty_widgets[r].widget_index) && (u = !0, $("body .has-custom-chaty-popup.whatsapp-button.open-it-by-default:first-child").trigger("click"))
                        }
                }

                function w(t) {
                    for (t = t.toString(); t.length < 2;) t = "0" + t;
                    return t
                }

                function f(t) {
                    s = !1;
                    for (var e = 0; e < a.chaty_widgets[t].social.length; e++) h ? a.chaty_widgets[t].social[e].is_mobile && (s = !0) : a.chaty_widgets[t].social[e].is_desktop && (s = !0);
                    s ? ! function(t) {
                        var e = 0;
                        if (1 == parseInt(chaty_settings.chaty_widgets[t].display_conditions)) {
                            var a = chaty_settings.chaty_widgets[t].display_rules;
                            if (a.length > 0) {
                                var i = new Date;
                                i.setHours(i.getHours() + parseFloat(chaty_settings.chaty_widgets[t].gmt));
                                for (var s = i.getUTCHours(), c = i.getUTCMinutes(), n = i.getUTCDay(), h = 0; h < a.length; h++) {
                                    var r = 0,
                                        o = 0; - 1 == a[h].days ? o = 1 : a[h].days >= 0 && a[h].days <= 6 ? a[h].days == n && (o = 1) : 7 == a[h].days ? n >= 0 && n <= 4 && (o = 1) : 8 == a[h].days ? n >= 1 && n <= 5 && (o = 1) : 9 == a[h].days && (5 != n && 6 != n || (o = 1)), 1 == o && (s > a[h].start_hours && s < a[h].end_hours ? r = 1 : s == a[h].start_hours && s < a[h].end_hours ? c >= a[h].start_min && (r = 1) : s > a[h].start_hours && s == a[h].end_hours ? c <= a[h].end_min && (r = 1) : s == a[h].start_hours && s == a[h].end_hours && c >= a[h].start_min && c <= a[h].end_min && (r = 1), 1 == r && c >= a[h].start_min && c <= a[h].end_min && 1), 1 == r && 1 == o && (e = 1), 1 == e && (h = a.length + 1)
                                }
                            } else e = 1
                        } else e = 1;
                        return e
                    }(t) ? (n++, setTimeout(function() {
                        _(n)
                    }, 10)) : (chaty_settings.widget_status[t].on_page_status = 1, k(t)) : (n++, setTimeout(function() {
                        _(n)
                    }, 10))
                }

                function m() {
                    h ? $("body").addClass("chaty-in-mobile") : $("body").addClass("chaty-in-desktop"), d || (d = !0, C(), $(document).on("click", ".i-trigger .i-trigger-open", function() {
                        $(this).closest(".chaty-widget").hasClass("one_widget") || $(this).closest(".chaty-widget").removeClass("none-widget-show").addClass("chaty-widget-show");
                        var t = $(this).closest(".chaty-widget").attr("data-index");
                        if ("click" == chaty_settings.chaty_widgets[t].click_setting && $(this).addClass("no-tooltip"), I(t), b("ca" + chaty_settings.chaty_widgets[t].widget_index), "" != chaty_settings.chaty_widgets[t].animation_class && $("#chaty-animation-" + t).removeClass("chaty-animation-" + chaty_settings.chaty_widgets[t].animation_class), $(this).hasClass("one-widget")) {
                            $(this).addClass("show-channel");
                            var e = $(this).data("title");
                            $(this).find(".chaty-widget-i-title").find("p").html(e)
                        }
                    }), $(document).on("click", ".i-trigger.one-widget, .i-trigger .i-trigger-open", function() {
                        var t = $(this).closest(".chaty-widget").attr("data-index"),
                            e = chaty_settings.chaty_widgets[t].widget_index;
                        if ("click" == chaty_settings.chaty_widgets[t].click_setting && $(this).addClass("no-tooltip"), I(t), b("ca" + e), "" != chaty_settings.chaty_widgets[t].animation_class && $("#chaty-animation-" + t).removeClass("chaty-animation-" + chaty_settings.chaty_widgets[t].animation_class), $(this).hasClass("one-widget")) {
                            $(this).addClass("show-channel");
                            var a = $(this).data("title");
                            $(this).find(".chaty-widget-i-title").find("p").html(a)
                        }
                    }), $(document).on("click", ".i-trigger .i-trigger-close", function() {
                        $(this).closest(".chaty-widget").hasClass("one_widget") || $(this).closest(".chaty-widget").removeClass("chaty-widget-show").addClass("none-widget-show")
                    }), $(document).on("click", ".chaty-widget .update-analytics", function() {
                        var t = $(this).attr("data-channel");
                        if ("" != t && null != t && (window.hasOwnProperty("gtag") && gtag("event", "chaty_" + t, {
                                eventCategory: "chaty_" + t,
                                event_action: "chaty_" + t,
                                method: "chaty_" + t
                            }), window.hasOwnProperty("ga"))) {
                            var e = window.ga.getAll()[0];
                            e && e.send("event", "click", {
                                eventCategory: "chaty_" + t,
                                eventAction: "chaty_" + t,
                                method: "chaty_" + t
                            })
                        }
                    }), $(document).on("submit", ".whatsapp-chaty-form", function(e) {
                        var a = $(this).closest(".chaty-inline-popup").attr("data-index"),
                            i = chaty_settings.chaty_widgets[a].widget_index;
                        if ($(this).closest(".chaty-inline-popup").find(".is-whatsapp-btn").length && $(this).closest(".chaty-inline-popup").find(".is-default-open").length && 1 == parseInt($(this).closest(".chaty-inline-popup").find(".is-default-open").val()) && b("cht_whatsapp_window" + i), $("#chaty-inline-popup").removeClass("active"), t("#chaty-widget-" + a).removeClass("chaty-popup-open"), setTimeout(function() {
                                $(".chaty-widget.hide-block").removeClass("active")
                            }, 250), $("body").hasClass("chaty-in-mobile")) return e.preventDefault(), window.location = "https://wa.me/" + $(this).find(".chaty-whatsapp-phone").val() + "?text=" + $(this).find(".chaty-whatsapp-msg").val(), !1
                    }), $(document).on("click", ".close-chaty-popup, .close-chaty-box", function() {
                        var e = $(this).closest(".chaty-inline-popup").attr("data-index"),
                            a = chaty_settings.chaty_widgets[e].widget_index;
                        $(this).hasClass("is-whatsapp-btn") && $(this).closest(".chaty-inline-popup").find(".is-default-open").length && 1 == parseInt($(this).closest(".chaty-inline-popup").find(".is-default-open").val()) && b("cht_whatsapp_window" + a), $("#chaty-inline-popup").removeClass("active"), t("#chaty-widget-" + e).removeClass("chaty-popup-open"), setTimeout(function() {
                            $(".chaty-widget.hide-block").removeClass("active")
                        }, 250)
                    }), $(document).on("click", ".has-custom-chaty-popup.whatsapp-button", function(e) {
                        if ($("#chaty-inline-popup").length) {
                            var a = $(this).data("data-index");
                            t("#chaty-widget-" + a).removeClass("chaty-popup-open"), t(".chaty-popup-open").removeClass("chaty-popup-open"), $(".chaty-widget.hide-block").removeClass("active")
                        }
                        if ($(this).hasClass("open-it-by-default") && e.preventDefault(), $("#chaty-inline-popup").remove(), null != $(this).attr("data-popup") && "" != $(this).attr("data-popup")) {
                            a = $(this).closest(".chaty-widget").attr("data-index"), chaty_settings.chaty_widgets[a].widget_index;
                            $("#chaty-widget-" + a).addClass("hide-block"), $("#chaty-widget-" + a).addClass("chaty-popup-open");
                            var i = "<div data-index='" + a + "' id='chaty-inline-popup' class='chaty-inline-popup chaty-popup-form " + t(this).data("channel") + "-channel'>";
                            i += $(this).attr("data-popup"), $("body").append(i);
                            a = $(this).closest(".chaty-widget").attr("data-index");
                            "horizontal" == chaty_settings.chaty_widgets[a].mode ? ($(".chaty-inline-popup").css("bottom", parseInt(chaty_settings.chaty_widgets[a].bot) + "px"), "right" == chaty_settings.chaty_widgets[a].pos_side ? $(".chaty-inline-popup").css("left", "auto").css("right", chaty_settings.chaty_widgets[a].side + "px") : $(".chaty-inline-popup").css("right", "auto").css("left", chaty_settings.chaty_widgets[a].side + "px")) : ($(".chaty-inline-popup").css("bottom", parseInt(chaty_settings.chaty_widgets[a].bot) + "px"), "right" == chaty_settings.chaty_widgets[a].pos_side ? $(".chaty-inline-popup").css("left", "auto").css("right", parseInt(chaty_settings.chaty_widgets[a].side) + "px") : $(".chaty-inline-popup").css("right", "auto").css("left", parseInt(chaty_settings.chaty_widgets[a].side) + "px")), $(".chaty-inline-popup .default-value").length && ($(".chaty-whatsapp-msg").val($(".chaty-inline-popup .default-value").text()), $(".chaty-whatsapp-phone").val($(".chaty-inline-popup .default-msg-phone").text()), $(".chaty-whatsapp-message").html($(".chaty-inline-popup .default-msg-value").html())), $("#chaty-widget-" + a).addClass("active"), setTimeout(function() {
                                $("#chaty-inline-popup").addClass("active")
                            }, 150), $("body").hasClass("chaty-in-mobile") || $(".chaty-whatsapp-msg").focus()
                        }
                    }), $(document).on("submit", ".chaty-contact-form-data", function(e) {
                        var a = 0;
                        if ($(".has-chaty-error").removeClass("has-chaty-error"), $(".chaty-error-msg").remove(), $(".chaty-ajax-error-message").remove(), $(".chaty-ajax-success-message").remove(), $(this).find(".is-required").each(function() {
                                "" == $.trim($(this).val()) && (a++, $(this).addClass("has-chaty-error"))
                            }), 0 == a) {
                            var i = $(this);
                            $(".chaty-contact-submit-btn").attr("disabled", !0), $.ajax({
                                url: chaty_settings.ajax_url,
                                data: {
                                    action: "chaty_front_form_save_data",
                                    name: i.find(".chaty-field-name").length ? i.find(".chaty-field-name").val() : "",
                                    email: i.find(".chaty-field-email").length ? i.find(".chaty-field-email").val() : "",
                                    phone: i.find(".chaty-field-phone").length ? i.find(".chaty-field-phone").val() : "",
                                    message: i.find(".chaty-field-message").length ? i.find(".chaty-field-message").val() : "",
                                    nonce: i.find(".chaty-field-nonce").length ? i.find(".chaty-field-nonce").val() : "",
                                    channel: i.find(".chaty-field-channel").length ? i.find(".chaty-field-channel").val() : "",
                                    widget: i.find(".chaty-field-widget").length ? i.find(".chaty-field-widget").val() : "",
                                    ref_url: window.location.href
                                },
                                type: "post",
                                async: !0,
                                defer: !0,
                                success: function(e) {
                                    if (e = $.parseJSON(e), $(".chaty-ajax-error-message").remove(), $(".chaty-ajax-success-message").remove(), $(".chaty-contact-submit-btn").attr("disabled", !1), 1 == e.status) $(".chaty-contact-footer").append("<div class='chaty-ajax-success-message'>" + e.message + "</div>"), t(".chaty-field-name, .chaty-field-email, .chaty-field-message").val(""), "yes" == e.redirect_action && ("yes" == e.link_in_new_tab ? window.open(e.redirect_link, "_blank") : window.location = e.redirect_link), "yes" == e.close_form_after && setTimeout(function() {
                                        $("#chaty-inline-popup").removeClass("active"), $(".chaty-widget").removeClass("chaty-popup-open"), setTimeout(function() {
                                            $(".chaty-widget.hide-block").removeClass("active")
                                        }, 250)
                                    }, 1e3 * parseInt(e.close_form_after_seconds));
                                    else if (1 == e.error) {
                                        if (e.errors.length)
                                            for (var a = 0; a < e.errors.length; a++) t("." + e.errors[a].field).addClass("has-chaty-error"), t("." + e.errors[a].field).after("<span class='chaty-error-msg'>" + e.errors[a].message + "</span>")
                                    } else $(".chaty-contact-footer").append("<div class='chaty-ajax-error-message'>" + e.message + "</div>")
                                }
                            })
                        } else t(".has-chaty-error:first").focus();
                        return !1
                    }), $(document).on("click", ".chaty-widget .wechat-action-btn", function() {
                        if ("" != $(this).attr("data-code")) {
                            $("#chaty-inline-popup").length && (t(".chaty-popup-open").removeClass("chaty-popup-open"), $(".chaty-widget.hide-block").removeClass("active"));
                            var e = $(this).closest(".chaty-widget").attr("data-index");
                            chaty_settings.chaty_widgets[e].widget_index;
                            $("#chaty-widget-" + e).addClass("hide-block"), $("#chaty-widget-" + e).addClass("chaty-popup-open"), $("body").addClass("chaty-popup-open"), $("#chaty-inline-popup").remove();
                            var a = "<div data-index='" + e + "' id='chaty-inline-popup' class='chaty-inline-popup'>";
                            a += '<div class="chaty-contact-header">WeChat <div role="button" class="close-chaty-popup"><div class="chaty-close-button"></div></div></div>', a += "<div class='wechat-box'><img src='" + $(this).attr("data-code") + "' alt='QR Code' /><a href='javascript:;'>", a += "</a></div></div>", $("body").append(a);
                            e = $(this).closest(".chaty-widget").attr("data-index");
                            "horizontal" == chaty_settings.chaty_widgets[e].mode ? ($(".chaty-inline-popup").css("bottom", parseInt(chaty_settings.chaty_widgets[e].bot) + "px"), "right" == chaty_settings.chaty_widgets[e].pos_side ? $(".chaty-inline-popup").css("left", "auto").css("right", chaty_settings.chaty_widgets[e].side + "px") : $(".chaty-inline-popup").css("right", "auto").css("left", chaty_settings.chaty_widgets[e].side + "px")) : ($(".chaty-inline-popup").css("bottom", parseInt(chaty_settings.chaty_widgets[e].bot) + "px"), "right" == chaty_settings.chaty_widgets[e].pos_side ? $(".chaty-inline-popup").css("left", "auto").css("right", parseInt(chaty_settings.chaty_widgets[e].side) + "px") : $(".chaty-inline-popup").css("right", "auto").css("left", parseInt(chaty_settings.chaty_widgets[e].side) + "px")), $("#chaty-widget-" + e).addClass("active"), setTimeout(function() {
                                $("#chaty-inline-popup").addClass("active")
                            }, 200)
                        }
                    }), $(document).on("click", ".i-trigger .i-trigger-open", function() {
                        if (!l) {
                            var t = $(this).closest(".chaty-widget").attr("data-index"),
                                e = chaty_settings.chaty_widgets[t].widget_index,
                                a = chaty_settings.chaty_widgets[t].widget_nonce;
                            F("wcf" + e) && (T("wcf" + e), $.ajax({
                                url: chaty_settings.ajax_url,
                                data: "index=" + e + "&nonce=" + a + "&is_widget=1&channel=&type=click&action=update_chaty_channel_status",
                                type: "post",
                                async: !0,
                                defer: !0,
                                success: function() {}
                            }))
                        }
                    }), $(document).on("click", ".chaty-main-widget", function() {
                        if (!l)
                            if ($(this).closest(".chaty-widget").hasClass("one_widget")) {
                                i = $(this).closest(".chaty-widget").attr("data-index"), s = chaty_settings.chaty_widgets[i].widget_index, c = chaty_settings.chaty_widgets[i].widget_nonce;
                                var t = F("wcf" + s + "_" + (a = $(this).attr("data-channel")));
                                t && T("wcf" + s + "_" + a);
                                var e = 0;
                                F("wcf" + s) && (e = 1, T("wcf" + s)), (e || t) && $.ajax({
                                    url: chaty_settings.ajax_url,
                                    data: "index=" + s + "&nonce=" + c + "&is_widget=" + e + "&channel=" + a + "&type=click&action=update_chaty_channel_status",
                                    type: "post",
                                    async: !0,
                                    defer: !0,
                                    success: function() {}
                                })
                            } else {
                                var a, i = $(this).closest(".chaty-widget").attr("data-index"),
                                    s = chaty_settings.chaty_widgets[i].widget_index,
                                    c = $(this).attr("data-nonce");
                                F("wcf" + s + "_" + (a = $(this).attr("data-channel"))) && (T("wcf" + s + "_" + a), $.ajax({
                                    url: chaty_settings.ajax_url,
                                    data: "index=" + s + "&nonce=" + c + "&is_widget=0&channel=" + a + "&type=click&action=update_chaty_channel_status",
                                    type: "post",
                                    async: !0,
                                    defer: !0,
                                    success: function() {}
                                }))
                            }
                    })), x(), o && $(window).scroll(function() {
                        if (o) {
                            var t = $(document).height() - $(window).height(),
                                e = $(window).scrollTop();
                            if (0 != e) {
                                for (var a = e / t * 100, i = 0; i < chaty_settings.chaty_widgets.length; i++)
                                    if ("yes" == chaty_settings.chaty_widgets[i].on_page_scroll && 0 == chaty_settings.widget_status[i].is_displayed) {
                                        var s = parseInt(chaty_settings.chaty_widgets[i].page_scroll);
                                        if (a >= s) {
                                            $("#chaty-widget-" + i).removeClass("hide-widget"), M(i);
                                            var c = chaty_settings.chaty_widgets[i].widget_index;
                                            b("cs" + c), chaty_settings.widget_status[i].is_displayed = 1, chaty_settings.chaty_widgets[i].on_page_scroll = "no"
                                        }
                                    }
                                x()
                            }
                        }
                    }), y && function t() {
                        if (y) {
                            for (var e = 0; e < chaty_settings.chaty_widgets.length; e++)
                                if ("yes" == chaty_settings.chaty_widgets[e].time_trigger && 0 == chaty_settings.widget_status[e].is_displayed) {
                                    var a = 1e3 * parseInt(chaty_settings.chaty_widgets[e].trigger_time);
                                    if (a <= g) {
                                        $("#chaty-widget-" + e).removeClass("hide-widget"), M(e);
                                        var i = chaty_settings.chaty_widgets[e].widget_index;
                                        b("cs" + i), chaty_settings.widget_status[e].is_displayed = 1, chaty_settings.chaty_widgets[e].time_trigger = "no"
                                    }
                                }
                            x(), g += 100, y && setTimeout(function() {
                                t()
                            }, 100)
                        }
                    }(), r && function() {
                        t = document, e = "mouseout", a = function(t) {
                            null == t.toElement && null == t.relatedTarget && function() {
                                if (r) {
                                    for (var t = 0; t < chaty_settings.chaty_widgets.length; t++)
                                        if ("yes" == chaty_settings.chaty_widgets[t].exit_intent && 0 == chaty_settings.widget_status[t].is_displayed) {
                                            $("#chaty-widget-" + t).removeClass("hide-widget"), M(t);
                                            var e = chaty_settings.chaty_widgets[t].widget_index;
                                            b("cs" + e), chaty_settings.widget_status[t].is_displayed = 1, chaty_settings.chaty_widgets[t].exit_intent = "no", $("#chaty-widget-" + t).append("<div class='chaty-nav'></div>"), $("#chaty-widget-" + t + " .chaty-nav").addClass(chaty_settings.chaty_widgets[t].pos_side), launch_chaty(t + 1), setTimeout(function() {
                                                $(".chaty-nav").addClass("active")
                                            }, 100), setTimeout(function() {
                                                $(".chaty-nav").remove()
                                            }, 2500)
                                        }
                                    x()
                                }
                            }()
                        }, t.addEventListener ? t.addEventListener(e, a, !1) : t.attachEvent && t.attachEvent("on" + e, a);
                        var t, e, a
                    }()
                }

                function v(t) {
                    var e = j("cta" + chaty_settings.chaty_widgets[t].widget_index);
                    if (null != e && "" != e) {
                        e = new Date(e);
                        var a = Math.abs(new Date - e);
                        return Math.floor(a / 6e4) >= 10
                    }
                    return !0
                }

                function j(t) {
                    var e = z("chaty_settings"),
                        a = [];
                    if (null != e && "" != e && (a = JSON.parse(e)), a.length > 0)
                        for (var i = 0; i < a.length; i++)
                            if (a[i].k == t) return a[i].v;
                    return null
                }

                function b(t) {
                    var e = z("chaty_settings"),
                        a = [];
                    null != e && "" != e && (a = JSON.parse(e));
                    var i = !1;
                    if (a.length > 0)
                        for (var s = 0; s < a.length; s++) a[s].k == t && (i = !0, a[s].v = new Date);
                    i || a.push({
                        k: t,
                        v: new Date
                    }), S("chaty_settings", e = JSON.stringify(a), "7")
                }

                function Q(t) {
                    var e = j(t);
                    if (null != e && "" != e) {
                        e = new Date(e);
                        var a = Math.abs(new Date - e);
                        return Math.floor(a / 864e5) >= 1
                    }
                    return !0
                }

                function x() {
                    o = !1, y = !1, r = !1, $(".chaty-widget").each(function() {
                        var t = $(this).attr("data-index");
                        1 == chaty_settings.widget_status[t].on_page_status && 0 == chaty_settings.widget_status[t].is_displayed && ("yes" == chaty_settings.chaty_widgets[t].time_trigger && (parseInt(chaty_settings.chaty_widgets[t].trigger_time) > 0 ? y = !0 : chaty_settings.chaty_widgets[t].time_trigger), "yes" == chaty_settings.chaty_widgets[t].on_page_scroll && (parseInt(chaty_settings.chaty_widgets[t].page_scroll) > 0 ? o = !0 : chaty_settings.chaty_widgets[t].on_page_scroll), "yes" == chaty_settings.chaty_widgets[t].exit_intent && (r = !0))
                    })
                }

                function C() {
                    $(".chaty-channels").length && $(".chaty-channels").each(function() {
                        var t = parseInt($(this).attr("data-index")),
                            e = parseInt(chaty_settings.chaty_widgets[t].widget_size),
                            a = parseInt($(this).find(".chaty-widget-i.is-in-desktop").length);
                        $("body").hasClass("chaty-in-desktop") || (a = parseInt($(this).find(".chaty-widget-i.is-in-mobile").length)), $(this).find(".chaty-widget-i").css({
                            height: e + "px",
                            width: e + "px"
                        }).find("img").css({
                            height: e + "px",
                            width: e + "px"
                        }).find("span:not(.cht-pending-message)").css({
                            height: e + "px",
                            width: e + "px"
                        }), $("#chaty-widget-" + t + " .chaty-widget-i, #chaty-widget-" + t + " .i-trigger .i-trigger-open, #chaty-widget-" + t + " .i-trigger .i-trigger-close, #chaty-widget-" + t + " .i-trigger .animation-svg, #chaty-widget-" + t + " .i-trigger .animation-svg img").css({
                            height: e + "px",
                            width: e + "px"
                        }), $(this).css({
                            top: "-" + 100 * a + "%"
                        }), "horizontal" == chaty_settings.chaty_widgets[t].mode ? ($(this).css({
                            top: "0"
                        }), $(this).width(a * (parseInt(e) + 8)), $(this).height(parseInt(e) + 8)) : ($(this).height(a * (parseInt(e) + 8)), $(this).width(parseInt(e) + 8))
                    })
                }

                function k(t) {
                    p("display_cta"), token = "", $(document).ready(function() {
                        "true" == chaty_settings.chaty_widgets[t].active && function(a, i) {
                            var s = chaty_settings.chaty_widgets[t].device,
                                c = "";
                            if ("right" == chaty_settings.chaty_widgets[t].position) c = "left: auto;bottom: 25px; right: 25px;";
                            else if ("left" == chaty_settings.chaty_widgets[t].position) c = "right: auto; bottom: 25px; left: 25px;";
                            else if ("custom" == chaty_settings.chaty_widgets[t].position) {
                                var n = chaty_settings.chaty_widgets[t].pos_side,
                                    r = chaty_settings.chaty_widgets[t].bot,
                                    o = chaty_settings.chaty_widgets[t].side;
                                c = "right" === n ? "left: auto; bottom: " + r + "px; right: " + o + "px" : "left: " + o + "px; bottom: " + r + "px; right: auto"
                            }
                            var y = chaty_settings.chaty_widgets[t].cta,
                                g = "",
                                d = chaty_settings.chaty_widgets[t].social;
                            if ("" != chaty_settings.chaty_widgets[t].custom_css && $("head").append("<style>" + chaty_settings.chaty_widgets[t].custom_css + "</style>"), Object.keys(d).length >= 1 && (g = '<div data-number="' + chaty_settings.chaty_widgets[t].widget_index + '" data-index="' + t + '" id="chaty-widget-' + t + '" class="chaty-widget chaty-widget-css' + chaty_settings.chaty_widgets[t].widget_index + " hide-widget " + i + " " + s + ' "   style="display:block; ' + c + '" dir="ltr">', g += '<div data-index="' + t + '" id="chaty-channel-box-' + t + '" class="chaty-widget-is chaty-channels" id="transition_disabled">'), g += function(a) {
                                    var i = "",
                                        s = 0;
                                    return e.each(chaty_settings.chaty_widgets[t].social, function(e, a) {
                                        if (chaty_settings.chaty_widgets[t].isPRO && $("body").addClass("has-pro-version"), !chaty_settings.chaty_widgets[t].isPRO && "3" == ++s) return !1;
                                        extra_class = "", "1" != chaty_settings.chaty_widgets[t].analytics && 1 != chaty_settings.chaty_widgets[t].analytics || (extra_class += " update-analytics ");
                                        var c = 1 == chaty_settings.chaty_widgets[t].social[e].is_desktop ? "is-in-desktop" : "",
                                            n = 1 == chaty_settings.chaty_widgets[t].social[e].is_mobile ? "is-in-mobile" : "",
                                            h = 1 == chaty_settings.chaty_widgets[t].is_mobile ? chaty_settings.chaty_widgets[t].social[e].mobile_target : chaty_settings.chaty_widgets[t].social[e].desktop_target;
                                        $("body").hasClass("chaty-in-mobile") && (chaty_settings.chaty_widgets[t].social[e].href_url = chaty_settings.chaty_widgets[t].social[e].mobile_url);
                                        var r = "";
                                        if ("" != chaty_settings.chaty_widgets[t].social[e].on_click && (r = ' onclick="' + chaty_settings.chaty_widgets[t].social[e].on_click + '"'), "viber" == chaty_settings.chaty_widgets[t].social[e].channel_type) {
                                            if ($("body").hasClass("chaty-in-mobile")) {
                                                var o = chaty_settings.chaty_widgets[t].social[e].href_url;
                                                isNaN(o) || (o = o.replace("+", ""), navigator.userAgent.match(/(iPod|iPhone|iPad)/) && (o = "+" + o), chaty_settings.chaty_widgets[t].social[e].href_url = o)
                                            }
                                            chaty_settings.chaty_widgets[t].social[e].href_url = "viber://chat?number=" + chaty_settings.chaty_widgets[t].social[e].href_url
                                        }
                                        extra_class += " " + chaty_settings.chaty_widgets[t].social[e].channel_type + "-action-btn ", extra_class += " " + chaty_settings.chaty_widgets[t].social[e].social_channel + "-" + t + "-channel ", 1 == parseInt(chaty_settings.chaty_widgets[t].social[e].has_custom_popup) && ("whatsapp" == chaty_settings.chaty_widgets[t].social[e].channel_type ? (chaty_settings.chaty_widgets[t].social[e].is_default_open && Q("cht_whatsapp_window" + chaty_settings.chaty_widgets[t].widget_index) && (extra_class += " open-it-by-default"), h = "", chaty_settings.chaty_widgets[t].social[e].mobile_target = "", chaty_settings.chaty_widgets[t].social[e].desktop_target = "", extra_class += " has-custom-chaty-popup whatsapp-button") : "contact_us" == chaty_settings.chaty_widgets[t].social[e].channel_type && (extra_class += " has-custom-chaty-popup whatsapp-button")), socialString = '<div id="' + chaty_settings.chaty_widgets[t].social[e].channel_id + '" data-popup="' + chaty_settings.chaty_widgets[t].social[e].popup_html + '" class="chaty-widget-i chaty-main-widget ' + c + " " + n + " " + extra_class + " channel-" + chaty_settings.chaty_widgets[t].social[e].social_channel + '" data-title="' + chaty_settings.chaty_widgets[t].social[e].val + '" data-nonce="' + chaty_settings.chaty_widgets[t].social[e].channel_nonce + '" id="chaty-channel-' + chaty_settings.chaty_widgets[t].social[e].social_channel + '" data-channel="' + chaty_settings.chaty_widgets[t].social[e].social_channel + '" data-code="' + chaty_settings.chaty_widgets[t].social[e].qr_code_image + '">', bgColor = "", "" != chaty_settings.chaty_widgets[t].social[e].bg_color && (socialString += "<style>." + chaty_settings.chaty_widgets[t].social[e].social_channel + "-" + t + "-channel .color-element {fill: " + chaty_settings.chaty_widgets[t].social[e].bg_color + "; background: " + chaty_settings.chaty_widgets[t].social[e].bg_color + "}</style>", bgColor = "style='background-color: " + chaty_settings.chaty_widgets[t].social[e].bg_color + ";'"), socialString += "<a class='set-url-target' " + r + " rel='noopener' data-mobile-target='" + chaty_settings.chaty_widgets[t].social[e].mobile_target + "' data-desktop-target='" + chaty_settings.chaty_widgets[t].social[e].desktop_target + "' target='" + h + "' href='" + chaty_settings.chaty_widgets[t].social[e].href_url + "' ><span class='sr-only'>" + chaty_settings.chaty_widgets[t].social[e].title + "</span>", "" != chaty_settings.chaty_widgets[t].social[e].img_url ? socialString += "<span aria-hidden='true' class='chaty-social-img'><img " + bgColor + " src='" + chaty_settings.chaty_widgets[t].social[e].img_url + "' alt='" + chaty_settings.chaty_widgets[t].social[e].title + "' /></span>" : socialString += chaty_settings.chaty_widgets[t].social[e].default_icon, socialString += "</a>", socialString += "<div class='chaty-widget-i-title'><p>" + chaty_settings.chaty_widgets[t].social[e].title + "</p></div>", socialString += "</div>", i += socialString
                                    }), i
                                }(), d = chaty_settings.chaty_widgets[t].social, Object.keys(d).length >= 1) {
                                g += "</div>", g += '<div data-index="' + t + '" id="chaty-trigger-' + t + '" class="i-trigger">';
                                var l = p("display_cta"),
                                    u = current_url = window.location.origin;
                                if (u = (u = u.replace("https://", "")).replace("http://", ""), "" != y && "none" != l) var _ = "true";
                                else _ = "no-tooltip";
                                g += '<div data-index="' + t + '" id="chaty-trigger-button-' + t + '" class="chaty-widget-i chaty-close-settings i-trigger-open ' + _ + ' ">', g += function(e) {
                                    switch (chaty_settings.chaty_widgets[t].widget_type) {
                                        case "chat-image":
                                            if (chaty_settings.chaty_widgets[t].widget_img.length > 1) return '<div class="widget-img"><img style="background-color:' + chaty_settings.chaty_widgets[t].color + '" src="' + chaty_settings.chaty_widgets[t].widget_img + '"/></div>';
                                        case "chat-smile":
                                            return '<svg version="1.1" id="smile" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="-496.8 507.1 54 54" style="enable-background:new -496.8 507.1 54 54;" xml:space="preserve"><style type="text/css">.st1{fill:#FFFFFF;}  .st2{fill:none;stroke:#808080;stroke-width:1.5;stroke-linecap:round;stroke-linejoin:round;}</style><g><circle cx="-469.8" cy="534.1" r="27" fill="' + chaty_settings.chaty_widgets[t].color + '"/></g><path class="st1" d="M-459.5,523.5H-482c-2.1,0-3.7,1.7-3.7,3.7v13.1c0,2.1,1.7,3.7,3.7,3.7h19.3l5.4,5.4c0.2,0.2,0.4,0.2,0.7,0.2c0.2,0,0.2,0,0.4,0c0.4-0.2,0.6-0.6,0.6-0.9v-21.5C-455.8,525.2-457.5,523.5-459.5,523.5z"/><path class="st2" d="M-476.5,537.3c2.5,1.1,8.5,2.1,13-2.7"/><path class="st2" d="M-460.8,534.5c-0.1-1.2-0.8-3.4-3.3-2.8"/></svg>';
                                        case "chat-bubble":
                                            return '<svg version="1.1"  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="-496.9 507.1 54 54" style="enable-background:new -496.9 507.1 54 54;" xml:space="preserve"><style type="text/css">.st1{fill:#FFFFFF;}</style><g><circle  cx="-469.9" cy="534.1" r="27" fill="' + chaty_settings.chaty_widgets[t].color + '"/></g><path class="st1" d="M-472.6,522.1h5.3c3,0,6,1.2,8.1,3.4c2.1,2.1,3.4,5.1,3.4,8.1c0,6-4.6,11-10.6,11.5v4.4c0,0.4-0.2,0.7-0.5,0.9   c-0.2,0-0.2,0-0.4,0c-0.2,0-0.5-0.2-0.7-0.4l-4.6-5c-3,0-6-1.2-8.1-3.4s-3.4-5.1-3.4-8.1C-484.1,527.2-478.9,522.1-472.6,522.1z   M-462.9,535.3c1.1,0,1.8-0.7,1.8-1.8c0-1.1-0.7-1.8-1.8-1.8c-1.1,0-1.8,0.7-1.8,1.8C-464.6,534.6-463.9,535.3-462.9,535.3z   M-469.9,535.3c1.1,0,1.8-0.7,1.8-1.8c0-1.1-0.7-1.8-1.8-1.8c-1.1,0-1.8,0.7-1.8,1.8C-471.7,534.6-471,535.3-469.9,535.3z   M-477,535.3c1.1,0,1.8-0.7,1.8-1.8c0-1.1-0.7-1.8-1.8-1.8c-1.1,0-1.8,0.7-1.8,1.8C-478.8,534.6-478.1,535.3-477,535.3z"/></svg>';
                                        case "chat-db":
                                            return '<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="-496 507.1 54 54" style="enable-background:new -496 507.1 54 54;" xml:space="preserve"><style type="text/css">.st1{fill:#FFFFFF;}</style><g><circle  cx="-469" cy="534.1" r="27" fill="' + chaty_settings.chaty_widgets[t].color + '"/></g><path class="st1" d="M-464.6,527.7h-15.6c-1.9,0-3.5,1.6-3.5,3.5v10.4c0,1.9,1.6,3.5,3.5,3.5h12.6l5,5c0.2,0.2,0.3,0.2,0.7,0.2c0.2,0,0.2,0,0.3,0c0.3-0.2,0.5-0.5,0.5-0.9v-18.2C-461.1,529.3-462.7,527.7-464.6,527.7z"/><path class="st1" d="M-459.4,522.5H-475c-1.9,0-3.5,1.6-3.5,3.5h13.9c2.9,0,5.2,2.3,5.2,5.2v11.6l1.9,1.9c0.2,0.2,0.3,0.2,0.7,0.2c0.2,0,0.2,0,0.3,0c0.3-0.2,0.5-0.5,0.5-0.9v-18C-455.9,524.1-457.5,522.5-459.4,522.5z"/></svg>';
                                        default:
                                            return '<svg version="1.1" id="ch" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="-496 507.7 54 54" style="enable-background:new -496 507.7 54 54;" xml:space="preserve"><style type="text/css">.st1 {fill: #FFFFFF;}.st0{fill: #808080;}</style><g><circle cx="-469" cy="534.7" r="27" fill="' + chaty_settings.chaty_widgets[t].color + '"/></g><path class="st1" d="M-459.9,523.7h-20.3c-1.9,0-3.4,1.5-3.4,3.4v15.3c0,1.9,1.5,3.4,3.4,3.4h11.4l5.9,4.9c0.2,0.2,0.3,0.2,0.5,0.2 h0.3c0.3-0.2,0.5-0.5,0.5-0.8v-4.2h1.7c1.9,0,3.4-1.5,3.4-3.4v-15.3C-456.5,525.2-458,523.7-459.9,523.7z"/><path class="st0" d="M-477.7,530.5h11.9c0.5,0,0.8,0.4,0.8,0.8l0,0c0,0.5-0.4,0.8-0.8,0.8h-11.9c-0.5,0-0.8-0.4-0.8-0.8l0,0C-478.6,530.8-478.2,530.5-477.7,530.5z"/><path class="st0" d="M-477.7,533.5h7.9c0.5,0,0.8,0.4,0.8,0.8l0,0c0,0.5-0.4,0.8-0.8,0.8h-7.9c-0.5,0-0.8-0.4-0.8-0.8l0,0C-478.6,533.9-478.2,533.5-477.7,533.5z"/></svg>'
											
                                    }
                                }(), l = p("display_cta"), "" != y && "none" != l && (g += ' <div class="chaty-widget-i-title true"> ', g += y, g += "</div>"), g += "</div>", g += '<div class="chaty-widget-i chaty-close-settings i-trigger-close" data-title="' + chaty_settings.chaty_widgets[t].close_text + '" style="background-color:' + chaty_settings.chaty_widgets[t].color + '">', "" == chaty_settings.chaty_widgets[t].close_img ? (g += '<svg viewBox="0 0 54 54" fill="none" xmlns="http://www.w3.org/2000/svg">', g += '<ellipse cx="26" cy="26" rx="26" ry="26" fill="' + chaty_settings.chaty_widgets[t].color + '"/>', g += '<rect width="27.1433" height="3.89857" rx="1.94928" transform="translate(18.35 15.6599) scale(0.998038 1.00196) rotate(45)" fill="white"/>', g += '<rect width="27.1433" height="3.89857" rx="1.94928" transform="translate(37.5056 18.422) scale(0.998038 1.00196) rotate(135)" fill="white"/>', g += "</svg>") : g += "<span class='chaty-social-img'><img alt='" + chaty_settings.chaty_widgets[t].close_text + "' src='" + chaty_settings.chaty_widgets[t].close_img + "' /></span>", g += '<div class="chaty-widget-i-title">', g += chaty_settings.chaty_widgets[t].close_text, g += "</div>", g += "</div>", g += " </div>", 0 === i.length && !chaty_settings.chaty_widgets[t].isPRO && (g += ""), g += "</div>"
                            }
                            e("body").append(g),
                                function(t) {
                                    h ? $(".chaty-widget-is .chaty-widget-i.is-in-desktop:not(.is-in-mobile)").remove() : $(".chaty-widget-is .chaty-widget-i.is-in-mobile:not(.is-in-desktop)").remove(), x();
                                    var e, a = $("#chaty-channel-box-" + t).find(".chaty-widget-i").length;
                                    if (0 == a) $("#chaty-widget-" + t).remove();
                                    else if (1 == a) {
                                        var i, s = $("#chaty-channel-box-" + t + " .chaty-widget-i:first").clone();
                                        if ($("#chaty-widget-" + t).find(".i-trigger").html(s), $("#chaty-widget-" + t + " .chaty-channels").remove(), $("#chaty-widget-" + t).addClass("one_widget"), $("#chaty-widget-" + t).find(".i-trigger").addClass("one-widget"), i = v(t)) {
                                            var c = $("#chaty-widget-" + t).find(".i-trigger .chaty-widget-i-title p").text();
                                            $("#chaty-widget-" + t).find(".i-trigger .chaty-widget-i-title p").html(chaty_settings.chaty_widgets[t].cta), $("#chaty-widget-" + t).find(".i-trigger").attr("data-title", c)
                                        }
                                        $("#chaty-widget-" + t).find(".i-trigger").addClass("one-widget")
                                    }
                                    $("#chaty-widget-" + t + " .i-trigger svg, #chaty-widget-" + t + " .i-trigger img").wrap(function() {
                                        return "<div id='chaty-animation-" + t + "' class='animation-svg'></div>"
                                    }), "" != chaty_settings.chaty_widgets[t].font_family && ($("head").append("<link id='chaty-front-font-" + t + "' href='https://fonts.googleapis.com/css?family=" + encodeURI(chaty_settings.chaty_widgets[t].font_family) + "&display=swap' rel='stylesheet' type='text/css' />"), $("#chaty-widget-" + t).css("font-family", chaty_settings.chaty_widgets[t].font_family)), (i = v(t)) || "click" != chaty_settings.chaty_widgets[t].click_setting || ($("#chaty-widget-" + t + " .i-trigger .i-trigger-open").addClass("no-tooltip"), $("#chaty-widget-" + t + " .i-trigger.one-widget").addClass("no-tooltip"), I(t), $("#chaty-widget-" + t + " .i-trigger").hasClass("one-widget") && $("#chaty-widget-" + t + " .i-trigger").addClass("show-channel")), i && "on" == chaty_settings.chaty_widgets[t].pending_messages && ("sheen" != chaty_settings.chaty_widgets[t].animation_class ? $("#chaty-widget-" + t + " .i-trigger .i-trigger-open svg, #chaty-widget-" + t + " .i-trigger .i-trigger-open img, #chaty-widget-" + t + " .i-trigger.one-widget svg, #chaty-widget-" + t + " .i-trigger.one-widget img").after("<span class='cht-pending-message'>" + chaty_settings.chaty_widgets[t].number_of_messages + "</span>") : $("#chaty-widget-" + t + " .i-trigger .i-trigger-open, #chaty-widget-" + t + " .i-trigger.one-widget").append("<span class='cht-pending-message'>" + chaty_settings.chaty_widgets[t].number_of_messages + "</span>"), $("#chaty-widget-" + t + " .cht-pending-message").css("color", chaty_settings.chaty_widgets[t].number_color), $("#chaty-widget-" + t + " .cht-pending-message").css("background", chaty_settings.chaty_widgets[t].number_bg_color)), "" != chaty_settings.chaty_widgets[t].animation_class && Q("ca" + (e = chaty_settings.chaty_widgets[t].widget_index)) && $("#chaty-animation-" + t).addClass("chaty-animation-" + chaty_settings.chaty_widgets[t].animation_class), $("#chaty-widget-" + t).addClass(chaty_settings.chaty_widgets[t].mode + "-cht-menu"), $("#chaty-widget-" + t).addClass(chaty_settings.chaty_widgets[t].pos_side + "-cht-position"), "right" == chaty_settings.chaty_widgets[t].pos_side ? ($("#chaty-widget-" + t).addClass("chaty-widget-is-left"), $("#chaty-widget-" + t).css({
                                        left: "auto",
                                        right: chaty_settings.chaty_widgets[t].side + "px",
                                        bottom: chaty_settings.chaty_widgets[t].bot + "px"
                                    })) : ($("#chaty-widget-" + t).addClass("chaty-widget-is-right"), $("#chaty-widget-" + t).css({
                                        right: "auto",
                                        left: chaty_settings.chaty_widgets[t].side + "px",
                                        bottom: chaty_settings.chaty_widgets[t].bot + "px"
                                    })), Q("cs" + (e = chaty_settings.chaty_widgets[t].widget_index)) ? ("no" == chaty_settings.chaty_widgets[t].time_trigger && "no" == chaty_settings.chaty_widgets[t].exit_intent && "no" == chaty_settings.chaty_widgets[t].on_page_scroll && (b("cs" + e), $("#chaty-widget-" + t).removeClass("hide-widget"), chaty_settings.widget_status[t].is_displayed = 1, M(t)), "yes" == chaty_settings.chaty_widgets[t].time_trigger && parseInt(chaty_settings.chaty_widgets[t].trigger_time) <= 0 && (b("cs" + e), $("#chaty-widget-" + t).removeClass("hide-widget"), chaty_settings.widget_status[t].is_displayed = 1, M(t)), "yes" == chaty_settings.chaty_widgets[t].on_page_scroll && parseInt(chaty_settings.chaty_widgets[t].page_scroll) <= 0 && (b("cs" + e), $("#chaty-widget-" + t).removeClass("hide-widget"), chaty_settings.widget_status[t].is_displayed = 1, M(t))) : ($("#chaty-widget-" + t).removeClass("hide-widget"), chaty_settings.widget_status[t].is_displayed = 1, M(t)), "open" == chaty_settings.chaty_widgets[t].display_state ? ($("#chaty-widget-" + t).hasClass("one_widget") || $("#chaty-widget-" + t).removeClass("none-widget-show").addClass("chaty-widget-show"), $("#chaty-widget-" + t + " .i-trigger .i-trigger-open").addClass("no-tooltip"), $("#chaty-widget-" + t + " .i-trigger .i-trigger-open").addClass("true"), "no" == chaty_settings.chaty_widgets[t].has_close_button && ($("#chaty-widget-" + t).addClass("has-not-close-button"), $("#chaty-widget-" + t).hasClass("one_widget") || $("#chaty-widget-" + t + " .i-trigger").remove())) : "hover" == chaty_settings.chaty_widgets[t].display_state && $(document).on("mouseenter", ".i-trigger .i-trigger-open", function() {
                                        if (!$(this).hasClass("hover-action") && ($(this).closest(".chaty-widget").hasClass("none-widget-show") || !$(this).closest(".chaty-widget").hasClass("chaty-widget-show"))) {
                                            $(this).closest(".chaty-widget").hasClass("one_widget") || $(this).closest(".chaty-widget").removeClass("none-widget-show").addClass("chaty-widget-show");
                                            var t = $(this).closest(".chaty-widget").attr("data-index");
                                            "click" == chaty_settings.chaty_widgets[t].click_setting && ($(this).addClass("no-tooltip"), I(t)), $(this).addClass("hover-action"), b("ca" + chaty_settings.chaty_widgets[t].widget_index), "" != chaty_settings.chaty_widgets[t].animation_class && $("#chaty-animation-" + t).removeClass("chaty-animation-" + chaty_settings.chaty_widgets[t].animation_class)
                                        }
                                    }), $(".chaty-widget-i-title").each(function() {
                                        "" == $(this).text() && ($(this).closest(".chaty-widget-i").addClass("hide-chaty-arrow"), $(this).remove())
                                    })
                                }(t), m(), C()
                        }(0, token)
                    }), n++, setTimeout(function() {
                        _(n)
                    }, 10)
                }

                function I(t) {
                    $("#chaty-widget-" + t + " .cht-pending-message").remove();
                    var e = "cta" + chaty_settings.chaty_widgets[t].widget_index,
                        a = z("chaty_settings"),
                        i = [];
                    null != a && "" != a && (i = JSON.parse(a));
                    var s = !1;
                    if (i.length > 0)
                        for (var c = 0; c < i.length; c++) i[c].k == e && (s = !0, i[c].v = new Date);
                    s || i.push({
                        k: e,
                        v: new Date
                    }), S("chaty_settings", a = JSON.stringify(i), "7")
                }

                function S(t, e, a) {
                    var i = "";
                    if (a) {
                        var s = new Date;
                        s.setTime(s.getTime() + 24 * a * 60 * 60 * 1e3), i = "; expires=" + s.toUTCString()
                    }
                    document.cookie = t + "=" + (e || "") + i + "; path=/"
                }

                function z(t) {
                    for (var e = t + "=", a = document.cookie.split(";"), i = 0; i < a.length; i++) {
                        for (var s = a[i];
                            " " == s.charAt(0);) s = s.substring(1, s.length);
                        if (0 == s.indexOf(e)) return s.substring(e.length, s.length)
                    }
                    return null
                }

                function T(t) {
                    var e = z("chaty_status_string"),
                        a = [];
                    null != e && "" != e && (a = JSON.parse(e));
                    var i = !1;
                    if (a.length > 0)
                        for (var s = 0; s < a.length; s++) a[s].k == t && (i = !0, a[s].v = new Date);
                    i || a.push({
                        k: t,
                        v: new Date
                    }), S("chaty_status_string", e = JSON.stringify(a), "7")
                }

                function F(t) {
                    var e = function(t) {
                        var e = z("chaty_status_string"),
                            a = [];
                        if (null != e && "" != e && (a = JSON.parse(e)), a.length > 0)
                            for (var i = 0; i < a.length; i++)
                                if (a[i].k == t) return a[i].v;
                        return null
                    }(t);
                    if (null != e && "" != e) {
                        e = new Date(e);
                        var a = Math.abs(new Date - e);
                        return Math.floor(a / 864e5) >= 2
                    }
                    return !0
                }

                function M(t) {
                    if (!l) {
                        var e = chaty_settings.chaty_widgets[t].widget_index,
                            a = chaty_settings.chaty_widgets[t].widget_nonce;
                        if (F("cwds" + e)) {
                            T("cwds" + e);
                            var i = "";
                            if ($("#chaty-widget-" + e).hasClass("single_widget")) {
                                if ($("#chaty-widget-" + t + " .i-trigger.one-widget > .chaty-main-widget").length) F(s = "cwds" + e + "_" + $("#chaty-widget-" + t + " .i-trigger.one-widget > .chaty-main-widget").attr("data-channel")) && (i = $("#chaty-widget-" + t + " .i-trigger.one-widget > .chaty-main-widget").attr("data-channel"), T(s))
                            } else $("#chaty-widget-" + t + " .chaty-channels").find(".chaty-main-widget").each(function() {
                                var t = "cwds" + e + "_" + $(this).attr("data-channel");
                                F(t) && (i += $(this).attr("data-channel") + ",", T(t))
                            });
                            $.ajax({
                                url: chaty_settings.ajax_url,
                                data: "index=" + e + "&nonce=" + a + "&is_widget=1&channel=&type=view&action=update_chaty_channel_status&channels=" + i,
                                type: "post",
                                async: !0,
                                defer: !0,
                                success: function() {}
                            })
                        } else {
                            var s;
                            i = "";
                            if ($("#chaty-widget-" + t).hasClass("single_widget")) {
                                if ($("#chaty-widget-" + t + " .i-trigger.one-widget > .chaty-main-widget").length) F(s = "cwds" + e + "_" + $("#chaty-widget-" + t + " .i-trigger.one-widget > .chaty-main-widget").attr("data-channel")) && (i = $("#chaty-widget-" + t + " .i-trigger.one-widget > .chaty-main-widget").attr("data-channel"), T(s))
                            } else $("#chaty-widget-" + t + " .chaty-channels").find(".chaty-main-widget").each(function() {
                                F(s = "cwds" + e + "_" + $(this).attr("data-channel")) && (i += $(this).attr("data-channel") + ",", T("cwds" + e + "_" + $(this).attr("data-channel")))
                            });
                            "" != i && $.ajax({
                                url: chaty_settings.ajax_url,
                                data: "index=" + e + "&nonce=" + a + "&is_widget=1&channel=&type=view&action=update_chaty_channel_view&channels=" + i + "&for=channels",
                                type: "post",
                                async: !0,
                                defer: !0,
                                success: function() {}
                            })
                        }
                    }
                }
                t(document).ready(function() {
                    if ((a = chaty_settings).chaty_widgets.length > 0) {
                        (/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|ipad|iris|kindle|Android|Silk|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(navigator.userAgent) || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(navigator.userAgent.substr(0, 4))) && (h = !0), h ? $("body").addClass("chaty-in-mobile") : $("body").addClass("chaty-in-desktop");
                        var t = new RegExp("(googlebot/|bot|Googlebot-Mobile|Googlebot-Image|Google favicon|Mediapartners-Google|bingbot|slurp|java|wget|curl|Commons-HttpClient|Python-urllib|libwww|httpunit|nutch|phpcrawl|msnbot|jyxobot|FAST-WebCrawler|FAST Enterprise Crawler|biglotron|teoma|convera|seekbot|gigablast|exabot|ngbot|ia_archiver|GingerCrawler|webmon |httrack|webcrawler|grub.org|UsineNouvelleCrawler|antibot|netresearchserver|speedy|fluffy|bibnum.bnf|findlink|msrbot|panscient|yacybot|AISearchBot|IOI|ips-agent|tagoobot|MJ12bot|dotbot|woriobot|yanga|buzzbot|mlbot|yandexbot|purebot|Linguee Bot|Voyager|CyberPatrol|voilabot|baiduspider|citeseerxbot|spbot|twengabot|postrank|turnitinbot|scribdbot|page2rss|sitebot|linkdex|Adidxbot|blekkobot|ezooms|dotbot|Mail.RU_Bot|discobot|heritrix|findthatfile|europarchive.org|NerdByNature.Bot|sistrix crawler|ahrefsbot|Aboundex|domaincrawler|wbsearchbot|summify|ccbot|edisterbot|seznambot|ec2linkfinder|gslfbot|aihitbot|intelium_bot|facebookexternalhit|yeti|RetrevoPageAnalyzer|lb-spider|sogou|lssbot|careerbot|wotbox|wocbot|ichiro|DuckDuckBot|lssrocketcrawler|drupact|webcompanycrawler|acoonbot|openindexspider|gnam gnam spider|web-archive-net.com.bot|backlinkcrawler|coccoc|integromedb|content crawler spider|toplistbot|seokicks-robot|it2media-domain-crawler|ip-web-crawler.com|siteexplorer.info|elisabot|proximic|changedetection|blexbot|arabot|WeSEE:Search|niki-bot|CrystalSemanticsBot|rogerbot|360Spider|psbot|InterfaxScanBot|Lipperhey SEO Service|CC Metadata Scaper|g00g1e.net|GrapeshotCrawler|urlappendbot|brainobot|fr-crawler|binlar|SimpleCrawler|Livelapbot|Twitterbot|cXensebot|smtbot|bnf.fr_bot|A6-Indexer|ADmantX|Facebot|Twitterbot|OrangeBot|memorybot|AdvBot|MegaIndex|SemanticScholarBot|ltx71|nerdybot|xovibot|BUbiNG|Qwantify|archive.org_bot|Applebot|TweetmemeBot|crawler4j|findxbot|SemrushBot|yoozBot|lipperhey|y!j-asr|Domain Re-Animator Bot|AddThis)", "i"),
                            e = navigator.userAgent;
                        t.test(e) && (l = !0), "on" != chaty_settings.data_analytics_settings && (l = !0), _(n = 0)
                    }
                }), $(window).resize(function() {
                    C()
                })
            }($)
        },
        12: function(t, e) {}
    })
});