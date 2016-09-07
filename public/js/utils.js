var map;

var SignUp = {
    check: function (id) {
        if ($.trim($("#" + id)[0].value) == '') {
            $("#" + id)[0].focus();
            $("#" + id + "_alert").show();

            return false;
        }

        return true;
    },
    validate: function () {
        if (SignUp.check("name") == false) {
            return false;
        }
        if (SignUp.check("username") == false) {
            return false;
        }
        if (SignUp.check("email") == false) {
            return false;
        }
        if (SignUp.check("password") == false) {
            return false;
        }
        // if ($("#password")[0].value != $("#repeatPassword")[0].value) {
        //     $("#repeatPassword")[0].focus();
        //     $("#repeatPassword_alert").show();

        //     return false;
        // }

        $("#registerForm")[0].submit();
    }
}

function formSuccess(msg) {
    $("#message").html('<strong>'+ msg +'</strong>');
    $(".alert").removeClass("hidden");
}

$(document).ready(function () {

    var geocoder = new google.maps.Geocoder();

    $("#address_start").focusout(function() {

        var address_start = $("#address_start").val();

        geocoder.geocode({address: address_start}, function(results, status) {

            if (status == google.maps.GeocoderStatus.OK) {

              var center = results[0].geometry.location;
              var address_start = results[0].formatted_address;

              console.log(address_start);

              data = {
                geoStart: {
                    lat_start_x: center.lat(),
                    lng_start_y: center.lng()
                },
                address_start: address_start
              };

              console.log(data);

            } else {
              console.log(address_start + 'not found');
            }
        });

    });

    $("#address_end").focusout(function() {

        var address_end = $("#address_end").val();

        geocoder.geocode({address: address_end}, function(results, status) {

            if (status == google.maps.GeocoderStatus.OK) {

              var center = results[0].geometry.location;
              var address_end = results[0].formatted_address;

              data.geoEnd = {
                lat_end_x: center.lat(),
                lng_end_y: center.lng()
              };
              data.address_end = address_end;

              console.log(data);

            } else {
              console.log(address_start + 'not found');
            }
        });

    });

    $("#scheduleForm").submit(function (e) {

        e.preventDefault(); // avoid to execute the actual submit of the form.

        var frm = $("#scheduleForm");
        var isValid = true;

        if ($("#address_start").val() == "") {
            $("#address_start_error").html("Please enter address start");
            isValid = false;
        }
        if ($("#address_end").val() == "") {
            $("#address_end_error").html("Please enter address end");
            isValid = false;
        }

        // console.log(data);
        if (isValid) {
            // data.address_start = $("#address_start").val();
            // data.address_end = $("#address_end").val();
            data.radius = $("#radius").val();

            if ($("#scheduleForm").attr("action") == "/demo/schedule/add") {
                // alert(1);
                $.ajax({
                    type: frm.attr('method'),
                    url: frm.attr('action'),
                    data: data,
                    success: function (data) {
                        // $(".alert-success").removeClass("hidden");
                        // $("#message").html('Add schedule success');
                        formSuccess('Add schedule success');
                    }
                });
            }
            else if ($("#scheduleForm").attr("action") == "/demo/schedule/find") {
                // alert(2);
                $.ajax({
                    type: frm.attr('method'),
                    url: frm.attr('action'),
                    data: data,
                    success: function (data) {
                        formSuccess(data.status);
                        // $("#message").html('Find schedule success');
                        console.log(data);
                        if (data.status == 'success') {

                            $("#records_body").text('');

                            $.each (data.schedules, function(i, item) {
                                var $str = $('<tr>').append(
                                    $('<td>').text(item.id),
                                    $('<td>').text(item.address_start),
                                    $('<td>').text(item.address_end),
                                    $('<td>').html('<button id="add_request" class="btn btn-primary" data-user-id="'+ item.user_id +'">Add Request</button>')
                                )
                                // console.log($str.wrap('<p>').html());
                                $str.appendTo("#records_body");
                            });
                            var radius = $("#radius option:selected").text();
                            $("#info").html("<h3>Your schedule near by you: "+ radius +"</h3>").show();
                            $(".table").show();
                        }
                        else {
                            formSuccess(data.status);
                            $("#info").html(data.message).show();
                            $(".table").hide();
                        }
                    }
                });
            }
        }

    });


});
