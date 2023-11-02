"use strict";
$(window).on("load", function () {
    /* table data master */
    $("body")
        .find(".footable")
        .footable(
            {
                paging: {
                    enabled: true,
                    container: "#footable-pagination",
                    countFormat: "{CP} of {TP}",
                    limit: 5,
                    position: "right",
                    size: 10,
                },
                sorting: {
                    enabled: true,
                },
            },
            function (ft) {
                $("#footablestot").html(
                    $(".footable-pagination-wrapper .label").html()
                );

                $(".footable-pagination-wrapper ul.pagination li").on(
                    "click",
                    function () {
                        setTimeout(function () {
                            $("#footablestot").html(
                                $(".footable-pagination-wrapper .label").html()
                            );
                        }, 200);
                    }
                );
            }
        );
    $("body").on(
        "click",
        "a.total_cases,a.resolved_cases,a.in_progress_cases,a.failed_cases,a.nearing_sla_breach",
        function (e) {
            e.preventDefault();
            $("#CountryCasesModal").modal("show");
            var $_this = $(this).parents(".card-body");
            var $case_country = $_this.find(".case_country").val();
            var $request_type = $_this.find(".request_type").val();
            var $calenderLabel = $("input#calendarLabel").val();
            var $date_range =
                $("input#titlecalendar")
                    .val()
                    .replace(" - ", "_to_")
                    .replaceAll("/", "-") +
                "_label_" +
                $calenderLabel;
            var $case_type = "";
            if ($(this).hasClass("total_cases")) {
                $case_type = "totalCases";
            } else if ($(this).hasClass("resolved_cases")) {
                $case_type = "resolvedCases";
            } else if ($(this).hasClass("in_progress_cases")) {
                $case_type = "inProgressCases";
            } else if ($(this).hasClass("failed_cases")) {
                $case_type = "failedCases";
            } else if ($(this).hasClass("nearing_sla_breach")) {
                $case_type = "nearingSlaBreach";
            }
            const url = $_this.find(".case_country").data("action");
            $("body").find(".modal-country").html($case_country);
            $("body").find(".modal-date-label").html($calenderLabel);
            $("#gm_service_request").DataTable({
                ajax: {
                    url: url,
                    data: function (d) {
                        d.case_type = $case_type;
                        d.case_country = $case_country;
                        d.caldender_label = $calenderLabel;
                        d.request_type = $request_type;
                        d.date_range = $date_range;
                    },
                },
                processing: true,
                serverSide: true,
                searching: false,
                lengthChange: false,
                bDestroy: true,
                columnDefs: [
                    { orderable: false, targets: [0] },
                    { orderable: false, targets: [1] },
                ],
            });
            /*$.ajax({
                url: url,
                method: "GET",
                dataType: "json",
                data: $data,
                beforeSend: function () {
                    $(".loader-wrap").css("display", "block");
                },
                success: function ($response) {
                    if ($response.success) {
                        if ($response.gm_view_case_list) {
                        } else {
                            $(".modal_show_total_case").html(
                                $response.html_row
                            );
                            $(".table").footable();
                        }
                    }
                },
                complete: function () {
                    $(".loader-wrap").css("display", "none");
                },
                error: function (error) {
                    console.log("Error Occured");
                },
            });*/
        }
    );
    $("body").on("click", ".mg_cat_total", function (e) {
        $(".loader-wrap").css("display", "block");
        $(document).on("ajaxComplete", function () {
            $(".loader-wrap").css("display", "none");
        });
        const url = $("input#titlecalendar").data("action");
        var $country = $(".case_country").val();
        var $calenderLabel = $("input#calendarLabel").val();
        var $date_range =
            $("input#titlecalendar")
                .val()
                .replace(" - ", "_to_")
                .replaceAll("/", "-") +
            "_label_" +
            $calenderLabel;
        var $prob_category = $(this).data("category");
        var $case_type = $(this)
            .parents(".card-body")
            .find("input.gm_castype")
            .val();
        $("#gm_service_request").DataTable({
            ajax: {
                url: url,
                data: function (d) {
                    d.case_type = $case_type;
                    d.case_country = $country;
                    d.calender_label = $calenderLabel;
                    d.request_type = "gm_problem_category";
                    d.date_range = $date_range;
                    d.prob_category = $prob_category;
                },
            },
            processing: true,
            serverSide: true,
            searching: false,
            lengthChange: false,
            bDestroy: true,
            columnDefs: [
                { orderable: false, targets: [0] },
                { orderable: false, targets: [1] },
            ],
        });
    });

    $("body").on(
        "click",
        "a.gm_total_cases,a.gm_resolved_cases,a.gm_in_progress_cases,a.gm_failed_cases,a.gm_nearing_sla_breach",
        function (e) {
            e.preventDefault();
            var $_this = $(this).parents(".card-body");
            var $case_country = $_this.find(".case_country").val();
            var $request_type = $_this.find(".request_type").val();
            var $calenderLabel = $("input#calendarLabel").val();
            var $date_range =
                $("input#titlecalendar")
                    .val()
                    .replace(" - ", "_to_")
                    .replaceAll("/", "-") +
                "_label_" +
                $calenderLabel;
            var $case_type = "";
            if ($(this).hasClass("gm_total_cases")) {
                $case_type = "totalCases";
            } else if ($(this).hasClass("gm_resolved_cases")) {
                $case_type = "resolvedCases";
            } else if ($(this).hasClass("gm_in_progress_cases")) {
                $case_type = "inProgressCases";
            } else if ($(this).hasClass("gm_failed_cases")) {
                $case_type = "failedCases";
            } else if ($(this).hasClass("gm_nearing_sla_breach")) {
                $case_type = "nearingSlaBreach";
            }
            const url = $_this.find(".case_country").data("action");
            $("#gm_service_request").DataTable({
                ajax: {
                    url: url,
                    data: function (d) {
                        d.case_type = $case_type;
                        d.request_type = $request_type;
                        d.date_range = $date_range;
                        d.case_country = $case_country;
                    },
                },
                processing: true,
                serverSide: true,
                searching: false,
                lengthChange: false,
                bDestroy: true,
                columnDefs: [
                    { orderable: false, targets: [0] },
                    { orderable: false, targets: [1] },
                ],
            });
        }
    );
});
