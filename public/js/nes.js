$(document).ready(function () {
    tinymce.init({
        selector: '#enc_content',
        forced_root_block: false,
        height: "750"
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
            formData.push({ name: 'enc_content', value: enc_content });
            formData.push({ name: 'enc_process_id', value: id });
        
            console.log(formData);
            $.ajax({
                type: "POST",
                url: APP_URL + '/admin/email_notification/update',
                data:  formData,
                cache: false,
                crossDomain: true,
                success: function(data) {
                }
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
