
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

    let reg_r = new DataTable('#registered_report_table', {
        dom: 'Bfrltip',
        buttons: [{
                    extend: 'colvis',
                    text: 'Show Column',
                  },{
                    extend: 'excel',
                    text: 'Download Excel',
                    messageTop: 'List of Registered Clients',
                    title: 'NES - List of Registered Clients'
                  },{
                    extend: 'pdf',
                    text: 'Dowload PDF',
                    messageTop: 'List of Registered Clients',
                    title: 'NES - List of Registered Clients'
                  },
                  'print'
        ]
    });

    let sub_r = new DataTable('#submitted_applications_report_table', {
        dom: 'Bfrltip',
        buttons: [{
                    extend: 'colvis',
                    text: 'Show Column',
                  },{
                    extend: 'excel',
                    text: 'Download Excel',
                    messageTop: 'List of Submitted Applications',
                    title: 'NES - List of Submitted Applications'
                  },{
                    extend: 'pdf',
                    text: 'Dowload PDF',
                    messageTop: 'List of Submitted Applications',
                    title: 'NES - List of Submitted Applications'
                  },
                  'print'
        ]
    });

    let com_r = new DataTable('#completed_applications_report_table', {
        dom: 'Bfrltip',
        buttons: [{
                    extend: 'colvis',
                    text: 'Show Column',
                  },{
                    extend: 'excel',
                    text: 'Download Excel',
                    messageTop: 'List of Completed Applications',
                    title: 'NES - List of Completed Applications'
                  },{
                    extend: 'pdf',
                    text: 'Dowload PDF',
                    messageTop: 'List of Completed Applications',
                    title: 'NES - List of Completed Applications'
                  },
                  'print'
        ]
    });

    let ins_r = new DataTable('#institutions_report_table', {
        dom: 'Bfrltip',
        buttons: [{
                    extend: 'colvis',
                    text: 'Show Column',
                  },{
                    extend: 'excel',
                    text: 'Download Excel',
                    messageTop: 'List of Requesting Institutions',
                    title: 'NES - List of Requesting Institutions'
                  },{
                    extend: 'pdf',
                    text: 'Dowload PDF',
                    messageTop: 'List of Requesting Institutions',
                    title: 'NES - List of Requesting Institutions'
                  },
                  'print'
        ]
    });
    
    let feed_r = new DataTable('#feedbacks_report_table', {
        dom: 'Bfrltip',
        buttons: [{
                    extend: 'colvis',
                    text: 'Show Column',
                  },{
                    extend: 'excel',
                    text: 'Download Excel',
                    messageTop: 'List of Feedbacks',
                    title: 'NES - List of Feedbacks'
                  },{
                    extend: 'pdf',
                    text: 'Dowload PDF',
                    messageTop: 'List of Feedbacks',
                    title: 'NES - List of Feedbacks'
                  },
                  'print'
        ]
    });


    var pie_series = [];

    $.ajax({
        method: 'GET',
        url: '/dashboard/pie',
        async: false,
        success: function (response) {
            $.each(response, function (key, val) {
                pie_series.push({'name':val.sex,'y':val.total});
            });
        }
    });

    // Data retrieved from https://netmarketshare.com
    Highcharts.chart('container', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Registered Applicants by Sex',
            align: 'left'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.y} ({point.percentage:.1f} %)</b>'
        },
        accessibility: {
            point: {
                valueSuffix: '%'
            }
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.y} ({point.percentage:.1f} %)',
                }
            }
        },
        series: [{
            name: 'Sex',
            colorByPoint: true,
            data: pie_series
        }]
    });

    var bar_series = [];

     $.ajax({
        method: 'GET',
        url: '/dashboard/bar',
        async: false,
        success: function (response) {

            console.log(response);
            $.each(response, function (key, val) {
                bar_series.push(val.total);
            });
        }
    });

    Highcharts.chart('container2', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Monthly Applications'
    },
    subtitle: {
        text: 'Year 2023'
    },
    xAxis: {
        categories: [
            'Jan',
            'Feb',
            'Mar',
            'Apr',
            'May',
            'Jun',
            'Jul',
            'Aug',
            'Sep',
            'Oct',
            'Nov',
            'Dec'
        ],
        crosshair: true
    },
    legend:{ enabled:false },
    yAxis: {
        min: 0,
        title: {
            text: 'Applications'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y}</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Applications',
        data: bar_series
        }]
    });
    
    var col_series = [];

     $.ajax({
        method: 'GET',
        url: '/dashboard/colbar',
        async: false,
        success: function (response) {

            console.log(response);
            $.each(response, function (key, val) {
                col_series.push(val.total);
            });
        }
    });

    Highcharts.chart('container3', {
    chart: {
        type: 'bar'
    },
    title: {
        text: 'Applicants by Category'
    },
    subtitle: {
        text: 'Year 2023'
    },
    xAxis: {
        categories: [
            'Division Chair',
            'Stockholders',
            'NRCP Management',
        ],
        crosshair: true
    },
    legend:{ enabled:false },
    yAxis: {
        min: 0,
        title: {
            text: 'Applications'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y}</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Applications',
        data: col_series
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
