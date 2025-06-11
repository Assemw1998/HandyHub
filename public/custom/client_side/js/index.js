$(document).ready(function () {
    $('.book-now-btn').click(function () {
        const isAuth = $(this).data('auth');
        const serviceId = $(this).data('service-id');

        if (!isAuth) {
            Swal.fire({
                icon: 'warning',
                title: 'You need to log in first!',
                confirmButtonText: 'Go to Login'
            }).then(() => {
                window.location.href = '/customer/show-login';
            });
            return;
        }

        Swal.fire({
            title: 'Do you want to book this service?',
            html:
                '<input id="swal-address" class="swal2-input" placeholder="Full Address">' +
                '<textarea id="swal-note" class="swal2-textarea" placeholder="Note / Description (optional)"></textarea>',
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Yes, book it!',
            cancelButtonText: 'Cancel',
            preConfirm: () => {
                const address = $('#swal-address').val().trim();
                const note = $('#swal-note').val().trim();

                if (!address) {
                    Swal.showValidationMessage('Full address is required');
                    return false;
                }

                return {
                    full_address: address,
                    note_description: note
                };
            }
        }).then((result) => {
            if (result.isConfirmed && result.value) {
                const { full_address, note_description } = result.value;

                $.ajax({
                    url: '/customer/profile/store-order',
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    contentType: 'application/json',
                    data: JSON.stringify({
                        service_id: serviceId,
                        full_address: full_address,
                        note_description: note_description
                    }),
                    success: function (response) {
                        if (response.success) {
                            Swal.fire(
                                'Booked!',
                                'Your service has been booked successfully.',
                                'success'
                            );
                        } else {
                            Swal.fire(
                                'Oops!',
                                response.message || 'Something went wrong while booking.',
                                'error'
                            );
                        }
                    },
                    error: function (xhr) {
                        if (xhr.status === 422) {
                            const response = xhr.responseJSON;
                            Swal.fire(
                                'Warning',
                                response.message || 'You already have an incomplete order for this service.',
                                'warning'
                            );
                        } else {
                            Swal.fire(
                                'Oops!',
                                'Something went wrong while booking.',
                                'error'
                            );
                        }
                    }
                });
            }
        });
    });
});
