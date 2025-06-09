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
            title: 'Are you sure?',
            text: "Do you want to book this service?",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, book it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '/customer/profile/store-order',
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    contentType: 'application/json',
                    data: JSON.stringify({
                        service_id: serviceId
                    }),
                    success: function (response) {
                        if (response.success) {
                            Swal.fire(
                                'Booked!',
                                'Your service has been booked successfully.',
                                'success'
                            );
                        } else {
                            // Should rarely get here unless server returns 200 with success:false
                            Swal.fire(
                                'Oops!',
                                response.message || 'Something went wrong while booking.',
                                'error'
                            );
                        }
                    },
                    error: function (xhr) {
                        if (xhr.status === 422) {
                            // Validation error, display the message from backend
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
