$(document).ready(function () {
    var token = $('meta[name="csrf-token"]').attr('content');
    var table = $('#category_table').DataTable({
        responsive: true,
        sScrollX: '100%',
        sScrollXInner: "100%",
    });

    //delete
    $(document).on("click", ".delete", function (e) {
        e.preventDefault();
        var id = $(this).attr('data-id');
        $.confirm({
            title: 'Category delete',
            content: 'Are you sure that you wnat to delete this category?',
            type: 'red',
            typeAnimated: true,
            buttons: {
                Yes: {
                    text: 'Yes',
                    btnClass: 'btn-red',
                    action: function () {
                        $.ajax({
                            type: 'POST',
                            url: '/admin/dashboard/category-delete',
                            data: {
                                _token: token,
                                id: id,
                            },
                            success: function (data) {
                                if (data == true) {
                                    $.confirm({
                                        title: 'Deleted',
                                        content: 'Category has been deleted successfully',
                                        type: 'green',
                                        typeAnimated: true,
                                        buttons: {
                                            tryAgain: {
                                                text: 'Okay',
                                                btnClass: 'btn-green',
                                                action: function () {
                                                    window.location.replace('/admin/dashboard/category-index');
                                                }
                                            },
                                        }
                                    });
                                }

                            },
                        }).fail(function (jqXHR, textStatus, errorThrown) {
                            $.confirm({
                                title: 'Technical Error',
                                content: 'Somthing went wrong please try again later.',
                                type: 'red',
                                typeAnimated: true,
                                buttons: {
                                    tryAgain: {
                                        text: 'Okay',
                                        btnClass: 'btn-red',
                                        action: function () {
                                            location.reload();
                                        }
                                    },
                                }
                            });
                        });
                    }
                },
                Cancel: {
                    text: 'Cancel',
                    btnClass: 'btn-green',
                    action: function () {

                    }
                },
            }
        });
    });

    //activate deactivate
    $(document).on("click", ".activate-deactivate", function (e) {

        e.preventDefault();
        var model_id = $(this).attr('data-id');
        $.ajax({
            type: 'POST',
            url: '/admin/dashboard/category-activate-deactivate',
            data: {
                _token: token,
                id: model_id,
            },
            success: function (data) {
                if (data == true) {
                    location.reload();
                }

            },
        }).fail(function (jqXHR, textStatus, errorThrown) {
            $.confirm({
                title: 'Technical Error',
                content: 'Somthing went wrong please try again later.',
                type: 'red',
                typeAnimated: true,
                buttons: {
                    tryAgain: {
                        text: 'Okay',
                        btnClass: 'btn-red',
                        action: function () {
                            location.reload();
                        }
                    },
                }
            });
        });
    });

});
