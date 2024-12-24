<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exclusive VIP Offer</title>
    <style>
        /* Reset styles for email clients */
        body, table, td, div, p {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            line-height: 1.6;
        }
        
        /* Container styles */
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
        }
        
        /* Header styles */
        .header {
            text-align: center;
            padding: 20px 0;
            background-color: #2c3e50;
            color: #ffffff;
        }
        
        /* Logo styles */
        .logo {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        
        /* Content styles */
        .content {
            padding: 30px 20px;
            background-color: #f9f9f9;
        }
        
        /* Coupon styles */
        .coupon {
            text-align: center;
            padding: 20px;
            margin: 20px 0;
            background-color: #ffffff;
            border: 2px dashed #2c3e50;
            border-radius: 8px;
        }
        
        .coupon-code {
            font-size: 28px;
            font-weight: bold;
            color: #e74c3c;
            letter-spacing: 2px;
            margin: 10px 0;
        }
        
        /* Button styles */
        .button {
            display: inline-block;
            padding: 12px 30px;
            background-color: #e74c3c;
            color: #ffffff;
            text-decoration: none;
            border-radius: 4px;
            margin: 20px 0;
        }
        
        /* Footer styles */
        .footer {
            text-align: center;
            padding: 20px;
            color: #666666;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="logo">LEVENTS</div>
            <div>EXCLUSIVE VIP OFFER</div>
        </div>
        
        <div class="content">
            <p>Dear {{$name}},</p>
            
            <p>As a valued VIP customer, we're excited to offer you an exclusive discount on your next purchase!</p>
            
            <div class="coupon">
                @php
                    if($coupon->coupon_condition == 1) {
                        echo "<p>SAVE " . $coupon->coupon_number . "% ON YOUR NEXT ORDER</p>";
                    } else {
                        echo "<p>SAVE $" . $coupon->coupon_number . " ON YOUR NEXT ORDER</p>";
                    }
                @endphp
                <div class="coupon-code">{{$coupon->coupon_code}}</div>
                <p>Valid until {{ $expiry_date }}</p>
            </div>
            
            <p>Simply use the code above at checkout to redeem your special discount. This offer is exclusive to our VIP customers like you!</p>
            
            <center>
                <a href="[Your Store URL]" class="button">SHOP NOW</a>
            </center>
            
            <p>Thank you for being a loyal customer. We truly appreciate your business!</p>
            
            <p>Best regards,<br>Manager<br>Levents</p>
        </div>
        
        <div class="footer">
            <p>This email was sent to [customer@email.com]</p>
            <p>You received this email because you're a VIP member of Levents.</p>
            <p>[Company Address]</p>
            <p><a href="[Unsubscribe URL]">Unsubscribe</a></p>
        </div>
    </div>
</body>
</html>