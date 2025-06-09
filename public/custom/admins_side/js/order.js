$(document).ready(function () {
    var token = $('meta[name="csrf-token"]').attr('content');
    var table = $('#order_table').DataTable({
        responsive: true,
        sScrollX: '100%',
        sScrollXInner: "100%",
    });
});
