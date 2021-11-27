const { ajax } = require("jquery");

//create new Link
$(function () {
    $('.create-new-link').on('submit', function(e) {

        e.preventDefault();

        let formData = new FormData($(this)[0]);
        $.ajaxSetup ({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: $(this).attr('action'),
            method:'POST',
            dataType:'json',
            processData: false,
            contentType: false,
            cache: false,
            data: formData,
            success: function (response) {

                if(response.status == 'failed') {

                    $.each(response.errors, function (key, val) {
                        $("input").addClass('is-invalid');
                        $('span.invalid-feedback').fadeIn();
                        $('strong.'+key+'_error').html(val[0]);
                     });
                } else {
                    $('form').trigger('reset');
                    $('input').removeClass('is-invalid');
                    $('.invalid-feedback strong').html("");
                    console.log(response);
                    toastr.options = {
                        "positionClass": "toast-top-left",
                        "timeOut": "4000",
                        "extendedTimeOut": "1000",
                        "progressBar": true,
                    }
                    toastr["success"]("New Link Has Been Added Successfully");

                    //refresh when close-btn clicked
                     $('.btn-close, .close').on('click', function () {
                        location.reload();
                      });
                }
            },

        });
    });
});


//get link Info
$(function() {

    $('.edit-Link').on('click', function () {

        $.ajax ({

            url: $(this).attr('href'),
            method: 'GET',
            dataType: 'json',
            success: function (response) {
                $('.update-link-form').attr('action', '/dashboard/links/'+response.linkInfo.id);
                $('.form-edit-name').attr('value', response.linkInfo.name);
                $('.form-edit-link').attr('value', response.linkInfo.link);
             },

        });
     });
});


//update Link
$(function () {
    $('.update-link-form').on('submit', function(e) {

        e.preventDefault();

        let formData = new FormData($(this)[0]);
        $.ajaxSetup ({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: $(this).attr('action'),
            method:$(this).attr('method'),
            dataType:'json',
            processData: false,
            contentType: false,
            cache: false,
            data: formData,
            success: function (response) {
                if(response.status == 'failed') {
                    console.log(response);
                    $.each(response.errors, function (key, val) {
                        $(".inv-name-msg, .inv-link-msg").addClass('is-invalid');
                        $('span.invalid-feedback').fadeIn();
                        $('strong.'+key+'_error').html(val[0]);
                     });
                } else if (response.status == 'noChanges') {
                    toastr.options = {
                        "positionClass": "toast-top-left",
                        "timeOut": "4000",
                        "extendedTimeOut": "1000",
                        "progressBar": true,
                    }
                    toastr["warning"]("No Changes Has Been Detected");
                    console.log(response);

                } else {

                    console.log(response);
                    $('form').trigger('reset');
                    $('input').removeClass('is-invalid');
                    $('.invalid-feedback strong').html("");

                    toastr.options = {
                        "positionClass": "toast-top-left",
                        "timeOut": "4000",
                        "extendedTimeOut": "1000",
                        "progressBar": true,
                    }
                    toastr["info"]("Link Has Been Updated Successfully");

                    //refresh when close-btn clicked
                     $('.btn-close, .close').on('click', function () {
                        location.reload();
                      });
                }
            },
        });
    });
});


//Delete Link
$(function () {
    $('.delete-link-form').on('submit', function(e) {

        e.preventDefault();

        let formData = new FormData($(this)[0]);
        $.ajaxSetup ({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: $(this).attr('action'),
            method:$(this).attr('method'),
            dataType:'json',
            processData: false,
            contentType: false,
            cache: false,
            data: formData,
            success: function (response) {

                if(response.status == 'success') {

                    location.reload();
                }
            },
            error: function (xhr) { console.log(xhr.responseText); }

        });
    });
});

// $(function() {

//     $('.switch').each(function () {

//         let targetElement = $(this).find('input:checkbox');

//         targetElement.on('change', function () {

//             if ($(this).is(":checked")) {

//                 $.ajax({

//                     url: '/links/status',
//                     method: 'get',
//                     processData: false,
//                     contentType: false,
//                     cache: false,
//                     data: {}
//                 });
//             } else {

//                 console.log('not checked');
//             }
//          });
//      });
// });
