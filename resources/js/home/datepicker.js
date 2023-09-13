$(function () {

    const today = new Date();
    const dd = String(today.getDate()).padStart(2, '0');
    const mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    const yyyy = today.getFullYear();

    $("#daterange-single, #daterange-single1, #daterange-single2, #daterange-single3")
        .daterangepicker({
            singleDatePicker: !0,
            opens: "right",
            minDate: dd + '/' + mm + '/' + yyyy,
            locale: {format: "DD/MM/YYYY"}
        });

});
