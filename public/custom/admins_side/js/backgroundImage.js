$(document).ready(function () {
    var token = $('meta[name="csrf-token"]').attr('content');
    var table=$('#background_image_table').DataTable({
        responsive: true ,
        sScrollX: '100%',
        sScrollXInner: "100%",
    });


    //delete
    $(document).on("click", ".delete", function (e) {

        e.preventDefault();
        var id = $(this).attr('data-id');
        $.confirm({
            title: 'background image delete',
            content: 'Are you sure that you wnat to delete this background image?',
            type: 'red',
            typeAnimated: true,
            buttons: {
                Yes: {
                    text: 'Yes',
                    btnClass: 'btn-red',
                    action: function () {
                        $.ajax({
                            type: 'POST',
                            url: '/admin/dashboard/background-image-delete',
                            data: {
                                _token: token,
                                id: id,
                            },
                            success: function (data) {
                                if (data == 1) {
                                    $.confirm({
                                        title: 'Deleted',
                                        content: 'background image has been deleted successfully',
                                        type: 'green',
                                        typeAnimated: true,
                                        buttons: {
                                            tryAgain: {
                                                text: 'Okay',
                                                btnClass: 'btn-green',
                                                action: function () {
                                                    window.location.replace('/admin/dashboard/background-image-index');
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

      //delete image
      $(document).on("click", ".image-delete-button", function (e) {
        e.preventDefault();
        var id = $(this).attr('data-id')
        $.confirm({
            title: 'Image delete',
            content: 'are you sure that you wnat to delete this image?',
            type: 'red',
            typeAnimated: true,
            buttons: {
                Yes: {
                    text: 'Yes',
                    btnClass: 'btn-red',
                    action: function () {
                        $.ajax({
                            type: 'POST',
                            url: '/admin/dashboard/background-image-delete-image',
                            data: {
                                _token: token,
                                id: id,
                            },
                            success: function (data) {
                                if (data == 1) {
                                    $.confirm({
                                        title: 'Deleted',
                                        content: 'Image has been deleted successfully',
                                        type: 'green',
                                        typeAnimated: true,
                                        buttons: {
                                            tryAgain: {
                                                text: 'Okay',
                                                btnClass: 'btn-green',
                                                action: function () {
                                                    location.reload();
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
});

function preview_image(id,area) {
    var images = document.getElementById(id).files.length;
    var validExtensions = ['jpg', 'png', 'jpeg'];
    $(area).empty();
    for (var i = 0; i < images; i++) {

        var fileName = document.getElementById(id).files[i].name;
        var fileNameExt = fileName.substr(fileName.lastIndexOf('.') + 1);

        if ($.inArray(fileNameExt, validExtensions) == -1) {
            $('#'+id).val(null);
            $.confirm({
                title: 'Validation Error',
                content: 'Only these type of files are accepted: ' + validExtensions.join(', '),
                type: 'red',
                typeAnimated: true,
                buttons: {
                    tryAgain: {
                        text: 'Okay',
                        btnClass: 'btn-red',
                        action: function () {
                        }
                    },
                }
            });
        } else {
            $(area).append("<img width='200' height='150' class='rounded p-2' src=" + URL.createObjectURL(event.target.files[i]) + ">");
        }

    }
}
