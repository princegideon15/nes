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

    // Data retrieved from https://netmarketshare.com
    Highcharts.chart('container', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Browser market shares in May, 2020',
            align: 'left'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
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
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                }
            }
        },
        series: [{
            name: 'Brands',
            colorByPoint: true,
            data: [{
                name: 'Chrome',
                y: 70.67,
                sliced: true,
                selected: true
            }, {
                name: 'Edge',
                y: 14.77
            },  {
                name: 'Firefox',
                y: 4.86
            }, {
                name: 'Safari',
                y: 2.63
            }, {
                name: 'Internet Explorer',
                y: 1.53
            },  {
                name: 'Opera',
                y: 1.40
            }, {
                name: 'Sogou Explorer',
                y: 0.84
            }, {
                name: 'QQ',
                y: 0.51
            }, {
                name: 'Other',
                y: 2.6
            }]
        }]
    });

    Highcharts.chart('container2', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Monthly Average Rainfall'
    },
    subtitle: {
        text: 'Source: WorldClimate.com'
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
    yAxis: {
        min: 0,
        title: {
            text: 'Rainfall (mm)'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
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
        name: 'Tokyo',
        data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4,
            194.1, 95.6, 54.4]

    }, {
        name: 'New York',
        data: [83.6, 78.8, 98.5, 93.4, 106.0, 84.5, 105.0, 104.3, 91.2, 83.5,
            106.6, 92.3]

    }, {
        name: 'London',
        data: [48.9, 38.8, 39.3, 41.4, 47.0, 48.3, 59.0, 59.6, 52.4, 65.2, 59.3,
            51.2]

    }, {
        name: 'Berlin',
        data: [42.4, 33.2, 34.5, 39.7, 52.6, 75.5, 57.4, 60.4, 47.6, 39.1, 46.8,
            51.1]

    }]
    });
    
    Highcharts.chart('container3', {
    chart: {
        type: 'bar'
    },
    title: {
        text: 'Historic World Population by Region',
        align: 'left'
    },
    subtitle: {
        text: 'Source: <a ' +
            'href="https://en.wikipedia.org/wiki/List_of_continents_and_continental_subregions_by_population"' +
            'target="_blank">Wikipedia.org</a>',
        align: 'left'
    },
    xAxis: {
        categories: ['Africa', 'America', 'Asia', 'Europe', 'Oceania'],
        title: {
            text: null
        },
        gridLineWidth: 1,
        lineWidth: 0
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Population (millions)',
            align: 'high'
        },
        labels: {
            overflow: 'justify'
        },
        gridLineWidth: 0
    },
    tooltip: {
        valueSuffix: ' millions'
    },
    plotOptions: {
        bar: {
            borderRadius: '50%',
            dataLabels: {
                enabled: true
            },
            groupPadding: 0.1
        }
    },
    legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'top',
        x: -40,
        y: 80,
        floating: true,
        borderWidth: 1,
        backgroundColor:
            Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF',
        shadow: true
    },
    credits: {
        enabled: false
    },
    series: [{
        name: 'Year 1990',
        data: [631, 727, 3202, 721, 26]
    }, {
        name: 'Year 2000',
        data: [814, 841, 3714, 726, 31]
    }, {
        name: 'Year 2010',
        data: [1044, 944, 4170, 735, 40]
    }, {
        name: 'Year 2018',
        data: [1276, 1007, 4561, 746, 42]
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
