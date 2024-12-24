<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f3f4f6;
            color: #333;
        }
        .email-container {
            max-width: 600px;
            margin: 40px auto;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            border: 1px solid #e4e4e4;
        }
        .header {
            background-color: #2d3e50;
            color: #fff;
            padding: 20px;
            text-align: center;
        }
        .header h1 {
            margin: 0;
            font-size: 28px;
            letter-spacing: 1px;
        }
        .content {
            padding: 25px;
        }
        .content p {
            line-height: 1.8;
            margin: 0 0 15px;
            font-size: 16px;
        }
        .customer-info, .order-details {
            margin: 20px 0;
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
            background-color: #fafafa;
        }
        .customer-info table, .order-details table {
            width: 100%;
            border-collapse: collapse;
            font-size: 15px;
        }
        .customer-info th, .customer-info td, .order-details th, .order-details td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }
        .customer-info th, .order-details th {
            background-color: #f1f1f1;
            font-weight: bold;
            color: #555;
        }
        .customer-info td, .order-details td {
            background-color: #fff;
        }
        .order-summary {
            text-align: right;
            font-size: 16px;
            font-weight: bold;
            padding: 12px;
            background-color: #f9f9f9;
        }
        .footer {
            background-color: #f7f7f7;
            padding: 15px;
            text-align: center;
            font-size: 14px;
            color: #777;
            border-top: 1px solid #ddd;
        }
        .footer a {
            color: #4CAF50;
            text-decoration: none;
        }
        .footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="header">
            <h1>Thank You for Your Order!</h1>
        </div>
        <div class="content">
            <p>Hi {{$shipping_array['customer_name']}},</p>
            <p>Thank you for shopping with us! We’re thrilled to confirm your order. Below are the details of your purchase:</p>

            <div class="customer-info">
                <table>
                    <tr>
                        <th>Order Code</th>
                        <td>{{$ordercode_mail['order_code']}}</td>
                    </tr>
                    <tr>
                        <th>Order Date</th>
                        <td>{{$now->format('d-m-Y H:i:s')}}</td> <!-- Ensure the 'now' variable is passed correctly -->
                    </tr>
                    <tr>
                        <th>Customer Name</th>
                        <td>{{$shipping_array['customer_name']}}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{$shipping_array['shipping_email']}}</td>
                    </tr> 
                    <tr>
                        <th>Phone</th>
                        <td>{{$shipping_array['shipping_phone']}}</td>
                    </tr>
                    <tr>
                        <th>Address</th>
                        <td>{{$shipping_array['shipping_address']}}</td>
                    </tr>
                    <tr>
                        <th>Order Method</th>
                        <td>
                            @if($shipping_array['shipping_method'] == 0)
                                Cash On Delivery (COD)
                            @else
                                Direct Bank Transfer
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Order Note</th>
                        <td>{{$shipping_array['shipping_notes']}}</td>
                    </tr>   
                </table>
            </div>

            <div class="order-details">
                <table>
                    <tr>
                        <th>Item</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                    </tr>
                    @php
                        $total = 0;
                        $sub_total = 0;
                    @endphp
                    @foreach ($cart_array as $cart)
                    @php
                        $sub_total = $cart['product_price'] * $cart['product_qty'];
                        $total += $sub_total;
                    @endphp
                    <tr>
                        <td>{{$cart['product_name']}}</td>
                        <td>{{$cart['product_qty']}}</td>
                        <td>${{$cart['product_price']}}</td>
                        <td>${{$sub_total}}</td>
                    </tr>  
                    @endforeach
                </table>
                <div class="order-summary">
                    @php
                        if ($ordercode_mail['feeship']) {
                            $total += $ordercode_mail['feeship'];
                            echo "Shipping: $".$ordercode_mail['feeship'];
                        }
                        if ($ordercode_mail['coupon_code']) {
                            if ($ordercode_mail['coupon_condition'] == 1) {
                                $total -= $ordercode_mail['coupon_number'];
                                echo "Coupon: $".$ordercode_mail['coupon_number'];
                            } else {
                                $total -= $total * ($ordercode_mail['coupon_number'] / 100);
                                echo "Coupon: ".$ordercode_mail['coupon_number']."%";
                            }
                        }
                    @endphp
                    Total:  ${{$total}}
                </div>
            </div>

            <p>Your items will be shipped shortly. You’ll receive another email once your package is on its way. If you have any questions, don’t hesitate to <a href="#">contact us</a>.</p>

            <p>We appreciate your business and look forward to serving you again!</p>
        </div>
        <div class="footer">
            <p>&copy; 2024 [Your Company Name]. All rights reserved.</p>
            <p><a href="#">Privacy Policy</a> | <a href="#">Terms of Service</a></p>
        </div>
    </div>
</body>
</html>
