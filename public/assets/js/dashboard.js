"use strict";
$(window).on("load", function () {
    /* table data master */
    let table;
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
});
