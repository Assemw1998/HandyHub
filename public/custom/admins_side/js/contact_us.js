$(document).ready(function () {
    var token = $('meta[name="csrf-token"]').attr('content');
    var table = $('#contact_us_table').DataTable({
        responsive: true,
        sScrollX: '100%',
        sScrollXInner: "100%",
    });
});
