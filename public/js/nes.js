$(document).ready(function () {

    let admin_t = new DataTable('#admin_app_table');
    let users_t = new DataTable('#users_table');
    let email_t = new DataTable('#email_table');
    let clients_t = new DataTable('#clients_table');
    let app_t = new DataTable('#app_table');
    let fdbk_a = new DataTable('#admin_feedback_table');
    let fdbk_c = new DataTable('#client_feedback_table');
    let ulogs_t = new DataTable('#user_logs_table');
    let logs_t = new DataTable('#logs_table', {
        dom: 'Bfrltip',
        buttons: ['colvis'],
        "columnDefs": [{
            "targets": [3, 4, 5, 6],
            "visible": false

        }]
    });

    tinymce.init({
        selector: '#enc_content',
        forced_root_block: false,
        height: "750"
    });

    // show password in login
    $("#toggle_password").on('click', function () {
        var pass = $('#password');
        var icon = $('#toggle_password');

        if (pass.attr('type') === 'password') {
            pass.attr('type', 'text');
            icon.text('HIDE');

        } else {
            pass.attr('type', 'password');
            icon.text('SHOW');
        }
    });

    // show password in reset password
    $("#toggle_confirm_password").on('click', function () {
        var pass = $('#confirm-password');
        var icon = $('#toggle_confirm_password');

        if (pass.attr('type') === 'password') {
            pass.attr('type', 'text');
            icon.text('HIDE');

        } else {
            pass.attr('type', 'password');
            icon.text('SHOW');
        }
    });


    var url = window.location.href;
    $('aside ul li a').each(function () {
        if (this.href === url) {
            $(this).closest('a').addClass('active-link');
        } else if (url == APP_URL + '/admin/users') {
            $('#users-dropdown').removeClass('hidden');
            $('.link-users').addClass('active-link');
        } else if (url == APP_URL + '/admin/clients') {
            $('#users-dropdown').removeClass('hidden');
            $('.link-users').addClass('active-link');
            $('.link-clients').addClass('active-link');
        } else {
            if (url.indexOf('app_data') != -1) {
                $('.link-applications').addClass('active-link');
            }
        }
    });

});

function updateEmailNotif(id) {

    Swal.fire({
        title: 'Are you sure you want to submit?',
        text: "You won't be able to revert this!",
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#1A56DB',
        cancelButtonColor: '#9CA3AF',
        confirmButtonText: 'Submit',
        cancelButtonText: 'Cancel',
        reverseButtons: true,
        focusCancel: true,
        showLoaderOnConfirm: true,
    }).then((result) => {
        if (result.isConfirmed == true) {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var enc_content = tinyMCE.get('enc_content').getContent();
            var formData = $('#email_notif_form').serializeArray();
            formData.push({
                name: 'enc_content',
                value: enc_content
            });
            formData.push({
                name: 'enc_process_id',
                value: id
            });

            console.log(formData);
            $.ajax({
                type: "POST",
                url: APP_URL + '/admin/email_notification/update',
                data: formData,
                cache: false,
                crossDomain: true,
                success: function (data) {}
            });


            let timerInterval
            Swal.fire({
                title: 'Email Notification Updated!',
                html: 'Reloading page.',
                icon: 'success',
                timer: 1000,
                timerProgressBar: true,
                allowOutsideClick: false,
                allowEscapeKey: false,
                didOpen: () => {
                    Swal.showLoading()
                    const b = Swal.getHtmlContainer().querySelector('b')
                    timerInterval = setInterval(() => {
                        b.textContent = Swal.getTimerLeft()
                    }, 100)
                },
                willClose: () => {
                    clearInterval(timerInterval)
                }
            }).then((result) => {
                /* Read more about handling dismissals below */
                if (result.dismiss === Swal.DismissReason.timer) {
                    console.log('I was closed by the timer')
                    // window.location.href = APP_URL + '/admin/email_notification/manage/' + id              
                }
            })


        }
    })
}
