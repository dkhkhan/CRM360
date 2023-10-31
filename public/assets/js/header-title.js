"use strict";
$(window).on("load", function () {
    /* search result show */
    var searchglobal = $("#searchglobal");
    var searchresultglobal = $("#searchresultglobal");

    searchglobal.on("keyup", function () {
        if (searchglobal.val() != "") {
            searchresultglobal.addClass("show");
        } else {
            searchresultglobal.removeClass("show");
        }
    });

    $("#searchtoggle").on("click", function () {
        $(".search-header").addClass("active");
    });
    $("#searchclose").on("click", function () {
        $(".search-header").removeClass("active");
    });

    body.on("click", function (e) {
        if (
            !searchresultglobal.is(e.target) &&
            searchresultglobal.has(e.target).length === 0 &&
            !searchglobal.is(e.target) &&
            searchglobal.has(e.target).length === 0
        ) {
            searchresultglobal.removeClass("show");
        }
    });
    if ($(window).width() >= 1200) {
        $("#searchclose").remove();
    }

    /* notification window calendar */
    $("#notificationdaterange").daterangepicker(
        {
            singleDatePicker: true,
            showCustomRangeLabel: false,
            alwaysShowCalendars: true,
            parentEl: "#calendardisplay",
            opens: "center",
            applyButtonClasses: "btn-theme",
            cancelClass: "btn-outline-secondary border",
        },
        function (start, end, label) {}
    );

    /*chat window open */
    $(".chatwindow")
        .find(".list-group .list-group-item")
        .on("click", function (e) {
            $(".chatboxes").fadeIn();

            setTimeout(function () {
                $("#thefirstchat").click();
            }, 400);
        });
    $(".chat-close").on("click", function () {
        $(this).closest(".chatboxes").fadeOut();
    });

    /* title calendar */
    $("#titlecalendar").daterangepicker(
        {
            minYear: 1989,
            maxYear: 2025,
            ranges: {
                Today: [moment(), moment()],
                Yesterday: [
                    moment().subtract(1, "days"),
                    moment().subtract(1, "days"),
                ],
                "Last 7 Days": [moment().subtract(6, "days"), moment()],
                "Last 30 Days": [moment().subtract(29, "days"), moment()],
                "This Month": [
                    moment().startOf("month"),
                    moment().endOf("month"),
                ],
                "Last Month": [
                    moment().subtract(1, "month").startOf("month"),
                    moment().subtract(1, "month").endOf("month"),
                ],
            },
            startDate: moment().subtract(6, "days"),
            endDate: moment(),
            opens: "left",
            drops: "down",
            applyButtonClasses: "btn-theme",
            cancelClass: "btn-outline-secondary border",
        },
        function (start, end, label) {
            $("input#calendarLabel").val(label);
            var url = $("input#titlecalendar").data("action");
            var $request_type = $(".date_request_type").val();
            var $case_country = $(".case_country").val();
            const $daterange =
                start.format("YYYY-MM-DD") + "_to_" + end.format("YYYY-MM-DD");
            // url = url + "/" + daterange + "_to_" + label;
            var $data = {
                date_range: $daterange,
                caldender_label: label,
                request_type: $request_type,
                case_country: $case_country,
            };
            $.ajax({
                url: url,
                method: "GET",
                dataType: "json",
                data: $data,
                beforeSend: function () {
                    $(".loader-wrap").css("display", "block");
                },
                success: function ($response) {
                    if ($response.load_gm_view) {
                        $(".ajax_service_requests").html(
                            $response.gm_view_html_country
                        );
                        $(".gm_cases_list").html(
                            $response.gm_view_html_cases_list
                        );
                        //.trigger("footable_redraw");
                        $($response.calender_label)
                            ? $("span.gm_case_list_view_label").html(
                                  $response.calender_label
                              )
                            : "Last 7 Days";

                        $(".table").footable();
                    }
                    var $failed_kpi_percentage = 0;
                    var $near_sla_breach_percentage = 0;
                    var $in_progress_kpi_percentage = 0;
                    var $successed_kpi_percentage = 0;
                    var kpi_failed =
                        $response.all_kpi.Failed > 0
                            ? $response.all_kpi.Failed
                            : 0;
                    var sla_breach =
                        $response.all_kpi.Nearing_SLA_Breach > 0
                            ? $response.all_kpi.Nearing_SLA_Breach
                            : 0;
                    var in_progress =
                        $response.all_kpi.In_Progress > 0
                            ? $response.all_kpi.In_Progress
                            : 0;
                    var successed =
                        $response.all_kpi.Succeeded > 0
                            ? $response.all_kpi.Succeeded
                            : 0;
                    var total_kpi =
                        $response.all_kpi.total_kpi > 0
                            ? $response.all_kpi.total_kpi
                            : 0;
                    if ($response.success) {
                        $failed_kpi_percentage =
                            total_kpi > 0 ? (kpi_failed / total_kpi) * 100 : 0;
                        $near_sla_breach_percentage =
                            total_kpi > 0 ? (sla_breach / total_kpi) * 100 : 0;
                        $in_progress_kpi_percentage =
                            total_kpi > 0 ? (in_progress / total_kpi) * 100 : 0;
                        $successed_kpi_percentage =
                            total_kpi > 0 ? (successed / total_kpi) * 100 : 0;

                        $("small.service_total_case_label").html(
                            "(" + $response.label + ")"
                        );

                        $("small.service_failed_kpi_percentage").html(
                            "(" + $failed_kpi_percentage.toFixed(2) + "%)"
                        );
                        $("small.service_nearing_breach_percentage").html(
                            "(" + $near_sla_breach_percentage.toFixed(2) + "%)"
                        );
                        $("small.service_in_progress_percentage").html(
                            "(" + $in_progress_kpi_percentage.toFixed(2) + "%)"
                        );
                        $("small.service_successed_percentage").html(
                            "(" + $successed_kpi_percentage.toFixed(2) + "%)"
                        );
                        $("span.service_total_cases").html(total_kpi);
                        $("span.service_failed_kpi").html(kpi_failed);
                        $("span.service_nearing_breach_kpi").html(sla_breach);
                        $("span.service_in_progress_kpi").html(in_progress);
                        $("span.service_successed_kpi").html(successed);
                        // load ajax response for all countries section
                        $("div.ajax_service_requests").html(
                            $response.countries_html
                        );
                    }
                    // }
                },
                complete: function () {
                    $(".loader-wrap").css("display", "none");
                },
                error: function (error) {
                    console.log("Error Occured");
                },
            });
        }
    );
});
