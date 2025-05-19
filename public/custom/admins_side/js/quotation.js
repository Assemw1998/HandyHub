let extra_information_inputs = {};
let counter=0;
$(document).ready(function () {
    var token = $('meta[name="csrf-token"]').attr('content');
    var table = $('#quotation_table').DataTable({
        responsive: true,
        sScrollX: '100%',
        sScrollXInner: "100%",
    });

    //delete
    $(document).on("click", ".delete", function (e) {
        e.preventDefault();
        var id = $(this).attr('data-id');
        var url = $(this).attr('data-url');
        $.confirm({
            title: 'Quotation delete',
            content: 'Are you sure that you wnat to delete this quotation?',
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
                                        content: 'Quotation has been deleted successfully',
                                        type: 'green',
                                        typeAnimated: true,
                                        buttons: {
                                            tryAgain: {
                                                text: 'Okay',
                                                btnClass: 'btn-green',
                                                action: function () {
                                                    window.location.replace('/super-admin/dashboard/quotation-index');
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
    $(document).on("focusout", "#car_value", function (e) {
        let car_value = parseInt($(this).val());
        $(this).val(car_value.toFixed(2));
    });

    $(document).on("click", ".generate-questions", function (e) {
        if (!$('#add_extra_yes_no_questions').val()) {
            $.confirm({
                title: 'Empty Value',
                content: 'add extra yes/no questions should not be empty',
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
            return;
        }
        counter++;
        let question = '<div class="form-group" id="question-' +counter+ '"> \
        <label for="'+ $('#add_extra_yes_no_questions').val() + '" class="d-block">' + $('#add_extra_yes_no_questions').val() + '  <button type="button" id="delete-question" class="btn btn-danger btn-circle" data-id=question-' +counter+ ' "><i class="fa fa-times"></i></button></label> \
        <div class="form-check-inline"> \
        <label class="form-check-label"> \
        <input type="radio" class="form-check-input extra-question" id="question-'+counter+'" name="'+ $('#add_extra_yes_no_questions').val() + '" value=1 required> Yes \
        </label> \
        </div> \
        <div class="form-check-inline"> \
        <label class="form-check-label"> \
        <input type="radio" class="form-check-input" id="question-'+counter+'" name="'+ $('#add_extra_yes_no_questions').val() + '" value=0 required> No \
        </label> \
        </div> ';
        $('#add_extra_yes_no_questions').val("")
        $('.questions-area').append(question)
    })

    $(document).on("click", "#delete-question", function (e) { 
        id = $(this).attr('data-id');
        $("#" + id).remove();
    })

    $(document).on("submit", "#quotation_form", function (e) {
        $(".extra-question").each(function () {
            let index = $(this).attr('name');
            let id = $(this).attr('id');
            let value= $('#'+id+':checked').val();
            extra_information_inputs[index] = value;
        });
        let extra_information_inputs_json = JSON.stringify(extra_information_inputs);
        $("#extra_information_inputs").val(extra_information_inputs_json);
    });

    $(document).on("focusout", "#price", function (e) {
        if (!$(this).val()) {
            $("#vat").val("");
            $("#total").val("");
            return;
        }

        let price = parseInt($(this).val());
        vat = price * 0.05;
        total = price + vat;
        $('#vat').attr('value', vat.toFixed(2));
        $('#total').attr('value', total.toFixed(2));
        $(this).val(price.toFixed(2));
    });

});
