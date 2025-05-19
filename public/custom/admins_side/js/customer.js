$(document).ready(function () {
    var token = $('meta[name="csrf-token"]').attr('content');
    var table = $('#customer_table').DataTable({
        responsive: true,
        sScrollX: '100%',
        sScrollXInner: "100%",
    });

    //delete
    $(document).on("click", ".delete", function (e) {
        e.preventDefault();
        var id = $(this).attr('data-id');
        var url = $(this).attr('data-url');
        var url_index = $(this).attr('data-url-index');
        $.confirm({
            title: 'Customer delete',
            content: 'Are you sure that you wnat to delete this customer?',
            type: 'red',
            typeAnimated: true,
            buttons: {
                Yes: {
                    text: 'Yes',
                    btnClass: 'btn-red',
                    action: function () {
                        $.ajax({
                            type: 'POST',
                            url: url,
                            data: {
                                _token: token,
                                id: id,
                            },
                            success: function (data) {
                                if (data == true) {
                                    $.confirm({
                                        title: 'Deleted',
                                        content: 'Customer has been deleted successfully',
                                        type: 'green',
                                        typeAnimated: true,
                                        buttons: {
                                            tryAgain: {
                                                text: 'Okay',
                                                btnClass: 'btn-green',
                                                action: function () {
                                                    window.location.replace(url_index);
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

    $(document).on("change", "#car_make_id", function (e) {
        let car_make_id = $(this).val();
        var url = $(this).attr('data-url');
        if (!car_make_id)
            car_make_id = 0;
        $.ajax({
            type: 'GET',
            url: url + car_make_id,
            data: {
                _token: token,
            },
            success: function (data) {
                $('#car_model_id :gt(0)').remove();
                if (data != false) {
                    $.each(data, function (index, option) {
                        $("#car_model_id").append('<option value="' + option['id'] + '">' + option['name'] + '</option>');
                    });
                } else {
                    $.confirm({
                        title: 'Car make name',
                        content: 'Car make name is required',
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

    $(document).on("change", "#country_id", function (e) {
        let country_id = $(this).val();
        var url = $(this).attr('data-url');
        if (!country_id)
            country_id = 0;
        $.ajax({
            type: 'GET',
            url: url + country_id,
            data: {
                _token: token,
            },
            success: function (data) {
                $('#city_id :gt(0)').remove();
                if (data != false) {
                    $.each(data, function (index, option) {
                        $("#city_id").append('<option value="' + option['id'] + '">' + option['name'] + '</option>');
                    });
                } else {
                    $.confirm({
                        title: 'Country name',
                        content: 'Country name is required',
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


    //delete
    $(document).on("click", ".send-email", function (e) {
        e.preventDefault();
        var id = $(this).attr('data-id');
        var url = $(this).attr('data-url');
        $(this).prop( "disabled", true );
        $.ajax({
            type: 'POST',
            url: url,
            data: {
                _token: token,
                id: id,
            },
            success: function (data) {
                if (data == true) {
                    $.confirm({
                        title: 'successfully',
                        content: 'Email has been send to the customer successfully',
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
                    
              
            
    
    });

});
