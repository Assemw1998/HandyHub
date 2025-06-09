$(document).ready(function () {
    $(document).on("click", ".show", function (e) {
        $("#password").attr("type", "password");
        $(this).children().removeClass("fa-eye");
        $(this).children().addClass("fa-eye-slash");
        $(this).removeClass("show");
        $(this).addClass("hide");
    });

    $(document).on("click", ".hide", function (e) {
        $("#password").attr("type", "text");
        $(this).children().removeClass("fa-eye-slash");
        $(this).children().addClass("fa-eye");
        $(this).removeClass("hide");
        $(this).addClass("show");
    });

    $('#editProfileForm').submit(function(e) {
        e.preventDefault();

        const formData = new FormData(this);

        $.ajax({
            url: '/customer/profile/customer-update',
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': $('input[name="_token"]').val()
            },
            success: function(response) {
                Swal.fire('Updated!', response.message, 'success').then(() => {
                    location.reload();
                });
            },
            error: function(xhr) {
                if (xhr.status === 422) {
                    const errors = xhr.responseJSON.errors;
                    let errorMessages = '';

                    Object.keys(errors).forEach(function(key) {
                        errorMessages += `<div>• ${errors[key][0]}</div>`;
                    });

                    Swal.fire({
                        icon: 'error',
                        title: 'Validation Error',
                        html: errorMessages
                    });
                } else {
                    Swal.fire('Oops!', 'Something went wrong!', 'error');
                }
            }
        });
    });
});

// This would override the data attributes
const modal = new bootstrap.Modal(document.getElementById('editProfileModal'), {
    backdrop: 'static',
    keyboard: false
});
modal.show();


function preview_image(inputId, previewSelector) {
    const input = document.getElementById(inputId);
    const preview = document.querySelector(previewSelector + ' .image-area');

    if (input.files && input.files[0]) {
        const reader = new FileReader();

        reader.onload = function (e) {
            preview.innerHTML = `<img width="200" height="150" class="rounded p-2" src="${e.target.result}">`;
        };

        reader.readAsDataURL(input.files[0]);
    }
}

