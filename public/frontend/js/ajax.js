$(document).ready(function () {
    $(".send_order").click(function () {
        swalWithBootstrapButtons
            .fire({
                title: "Are you sure you want to order?",
                text: "Orders are non-refundable once placed!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, order now!",
                cancelButtonText: "No, cancel!",
                reverseButtons: true,
                closeOnConfirm: false,
                closeOnCancel: false,
            })
            .then((result) => {
                if (result.isConfirmed) {
                    var shipping_email = $(".shipping_email").val();
                    var shipping_name =
                        $(".shipping_first_name").val() +
                        " " +
                        $(".shipping_last_name").val();
                    // city
                    const cityOption = document.querySelector(".cityOptions");
                    const cityText = cityOption.textContent;
                    console.log(cityText);
                    // district
                    const districtOption =
                        document.querySelector(".district_option");
                    const districtText = districtOption.textContent;
                    console.log(districtText);
                    // ward
                    const wardOption = document.querySelector(".ward_option");
                    const wardText = wardOption.textContent;
                    console.log(wardText);
                    var shipping_address =
                        $(".shipping_address").val() +
                        " " +
                        cityText +
                        " " +
                        districtText +
                        " " +
                        wardText;
                    var shipping_phone = $(".shipping_phone").val();
                    var shipping_notes = $(".shipping_notes").val();
                    var order_fee = $(".order_fee").val();
                    var order_coupon = $(".order_coupon").val();
                    var shipping_zipCode = $(".shipping_zipCode").val();
                    var shipping_method = $(".shipping_method").val();
                    var _token = $("input[name=_token]").val();
                    $.ajax({
                        url: "confirm-order",
                        method: "POST",
                        data: {
                            shipping_email: shipping_email,
                            shipping_name: shipping_name,
                            shipping_address: shipping_address,
                            shipping_phone: shipping_phone,
                            shipping_notes: shipping_notes,
                            order_fee: order_fee,
                            order_coupon: order_coupon,
                            shipping_zipCode: shipping_zipCode,
                            shipping_method: shipping_method,
                            _token: _token,
                        },
                        success: function (data) {
                            console.log("AJAX Success Response:", data);
                        },
                        error: function (data) {
                            console.log("AJAX Success Response:", data);
                        },
                    });
                    swalWithBootstrapButtons.fire({
                        title: "Successfully!",
                        text: "Your order has been placed successfully!",
                        icon: "success",
                    });
                    window.location.href = "/mylaravel/information-order";
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    swalWithBootstrapButtons.fire({
                        title: "Cancelled",
                        text: "Your order has been cancelled!",
                        icon: "error",
                    });
                }
            });
    });
});
// sweet alert
const swalWithBootstrapButtons = Swal.mixin({
    customClass: {
        confirmButton: "btn btn-success",
        cancelButton: "btn btn-danger",
    },
    buttonsStyling: false,
});
