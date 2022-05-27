$("document").ready(function () {
    $(".razorpay-btn").click(function (e) {
        e.preventDefault();

        var firstname = $(".firstname").val();
        var lastname = $(".lastname").val();
        var email = $(".email ").val();
        var phone = $(".phone ").val();
        var address1 = $(".address1").val();
        var address2 = $(".address2").val();
        var city = $(".city").val();
        var state = $(".state ").val();
        var county = $(".county").val();
        var pincode = $(".pincode").val();

        if (!firstname) {
            fname_error = "First Name is required";
            $("#fname_error").html("");
            $("#fname_error").html(fname_error);
        } else {
            fname_error = "";
            $("#fname_error").html("");
        }

        if (!lastname) {
            lname_error = "Last Name is required";
            $("#lname_error").html("");
            $("#lname_error").html(lname_error);
        } else {
            lname_error = "";
            $("#lname_error").html("");
        }

        if (!email) {
            email_error = "Email is required";
            $("#email_error").html("");
            $("#email_error").html(email_error);
        } else {
            email_error = "";
            $("#email_error").html("");
        }

        if (!phone) {
            phone_error = "Phone is required";
            $("#phone_error").html("");
            $("#phone_error").html(phone_error);
        } else {
            phone_error = "";
            $("#phone_error").html("");
        }

        if (!address1) {
            address1_error = "Address1 is required";
            $("#address1_error").html("");
            $("#address1_error").html(address1_error);
        } else {
            address1_error = "";
            $("#address1_error").html("");
        }

        if (!address2) {
            address2_error = "Address2 is required";
            $("#address2_error").html("");
            $("#address2_error").html(address2_error);
        } else {
            address2_error = "";
            $("#address2_error").html("");
        }

        if (!city) {
            city_error = "City is required";
            $("#city_error").html("");
            $("#city_error").html(city_error);
        } else {
            city_error = "";
            $("#city_error").html("");
        }
        if (!state) {
            state_error = "State is required";
            $("#state_error").html("");
            $("#state_error").html(state_error);
        } else {
            state_error = "";
            $("#state_error").html("");
        }
        if (!county) {
            county_error = "County is required";
            $("#county_error").html("");
            $("#county_error").html(county_error);
        } else {
            county_error = "";
            $("#county_error").html("");
        }
        if (!pincode) {
            pincode_error = "pincode is required";
            $("#pincode_error").html("");
            $("#pincode_error").html(pincode_error);
        } else {
            pincode_error = "";
            $("#pincode_error").html("");
        }

        if (
            fname_error != "" ||
            lname_error != "" ||
            email_error != "" ||
            phone_error != "" ||
            address1_error != "" ||
            address2_error != "" ||
            city_error != "" ||
            state_error != "" ||
            county_error != "" ||
            pincode_error != ""
        ) {
            return false;
        } else {
            var data = {
                firstname: firstname,
                lastname: lastname,
                email: email,
                phone: phone,
                address1: address1,
                address2: address2,
                city: city,
                state: state,
                county: county,
                pincode: pincode,
            };
            $.ajax({
                method: "POST",
                url: "/proced-to-pay",
                data: data,
                success: function (response) {
                    var params = {
                        serverKey: "SB-Mid-server-gfERv5apdVZm2FFDEmj5Ivqq",
                        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
                        isProduction: true,
                        // Set sanitization on (default)
                        isSanitized: true,
                        // Set 3DS transaction for credit card to true
                        is3ds: true,
                        handler: function (responsea) {
                            alert(responsea.razorpay_payment_id);

                            $ajax({
                                method: "POST",
                                url: "/place-order",
                                data: {
                                    fname: response.firstname,
                                    lname: response.firstname,
                                    email: response.firstname,
                                    phone: response.firstname,
                                    address1: response.firstname,
                                    address2: response.firstname,
                                    city: response.firstname,
                                    state: response.firstname,
                                    county: response.firstname,
                                    pincode: response.firstname,
                                    payment_mode: "Paid by Midtrans",
                                    payment_id: responsea.razorpay_payment_id,
                                },
                                datatype: "datatype",
                                success: function (responseb) {
                                    alert(responseb.status);
                                },
                            });
                        },
                        transaction_details: {
                            order_id: 1,
                            gross_amount: 10000,
                        },
                        customer_details: {
                            first_name: "budi",
                            last_name: "pratama",
                            email: "budi.pra@example.com",
                            phone: "08111222333",
                        },
                    };
                },
            });
        }
    });
});
