@extends('layout_account')
@section("content_account")
    <div
      class="middle-box text-center loginscreen animated fadeInDown"
      id="loginForm"
    >
      <div>
        <div>
          <h1 class="logo-name">LEVENTS</h1>
        </div>
                <h3>
                    THANK YOU FOR YOUR ORDER
                </h3>
                <p>
                    Your order has been placed successfully. Please attend your phone to confirm your order.
                </p>
                <center style="margin-top: 10px">
                    <span>
                        <b> Levents - Modern Simplicity </b>
                    </span>
                    <div class="">
                        <img src="{{asset('public/frontend/img/order.gif')}}" alt="">
                    </div>
                </center>
        </div>
          <a
            class="btn btn-sm btn-white btn-block popup-link"
            data-popup="register"
          >
            See Your Order Information
          </a>      
        <p class="m-t">
          <small
            >John my website Levents &copy; 2024</small
          >
        </p>
      </div>
    </div>

    <!-- Popup Overlay -->
    <div class="popup-overlay" id="popupOverlay">
      <!-- Register Popup -->
      <div class="popup" id="registerPopup">
        <button class="popup-close exitBtn" onclick="closePopup()">&times;</button>
        <center>  
            <h3 style="margin-bottom: 10px">
             <i class="fa-brands fa-shopify"></i> Order information
            </h3>
        </center>
        @foreach ($orders_data  as $key => $ord)
          <div class="cardNew" style="margin-bottom: 10px">
            <div class="card-body">
                <p style="margin-bottom: 5px "><strong>Order ID : </strong> <span style="font-weight: 600"># {{ $ord['order']->order_code }}</span></p>
                <p style="margin-bottom: 5px "><strong>Order Date : </strong>
                   {{ date('d-m-Y', strtotime($ord['order']->order_date)) }}
                </p>
                <p style="margin-bottom: 5px "><strong>Order Method : </strong>
                     @php
                         if ( $ord['shipping']->shipping_method ==0) {
                            echo "Bank Transfer";
                         }
                         else {
                            echo "Cash On Delivery";
                         }
                     @endphp
                </p>

                <p style="margin-bottom: 5px">
                    <strong>Order Status : </strong>
                    @php
                        if( $ord['order']->order_status == 1) {
                            echo "Unprocessed";
                        }
                        elseif ( $ord['order']->order_status == 2) {
                            echo "Processed - Delivered";
                        }
                        else {
                            echo "Cancel order - Hold";
                        }
                    @endphp
                </p>
                <p style="margin-bottom: 5px"> 
                   <strong>Voucher : </strong>
                   @php
                      foreach ($ord['order_detail'] as $detail) {
                          if ( $detail->product_coupon == "no"){
                              echo "No Coupon" ;
                            }
                            else {
                              echo  $detail->product_coupon ;
                            }
                          }
                   @endphp
                </p>  
                <p style="margin-bottom: 5px">
                    <strong>Shipping Fee : </strong>
                    @php
                    foreach ($ord['order_detail'] as $detail) {
                               echo "$". $detail->product_feeship ;
                          }
                    @endphp 
                </p>
                @php
                  $i = 0 ;
                  $total = 0 ;
                @endphp
                @foreach ($ord['order_detail'] as $detail )
                      @php
                        $i++; 
                        $subtotal = $detail->product_sales_quantity * $detail->product_price ;
                        $total+= $subtotal ;
                      @endphp
                      <p style="margin-bottom: 5px "><strong>Order Total : </strong>
                    <span>
                        @php
                          $total_coupon = 0 ;
                        @endphp
                        @if($detail->coupon_condition == 1)
                            @php
                                $total_after_coupon =  ($total + $detail->coupon_number) / 100;
                                $total_coupon == $total - $total_after_coupon +  $detail->product_feeship; 
                            @endphp
                        @else 
                            @php
                                $total_coupon = $total - $detail->coupon_number + $detail->product_feeship; 
                            @endphp
                        @endif
                        $ {{$total_coupon}}
                    </span>
                </p>
                @endforeach
                <hr>
                <table style="width: 100%; border-collapse: collapse;">
                  <thead>
                    <tr>
                      <th>Product</th>
                      <th style="padding: 5px;">Quantity</th>
                      <th style="padding: 5px;">Price</th>
                      <th style="padding: 5px;">Total</th>
                    </tr>
                  </thead>
                    <tbody>
                         @foreach ($ord['order_detail'] as $detail )
                         @php
                           $i++; 
                           $subtotal = $detail->product_sales_quantity * $detail->product_price ;
                           $total+= $subtotal ;
                         @endphp
                            <tr>
                              <td>
                                      {{ $detail->product_name }}
                              </td>
                               <td style="text-align: center;">
                                  {{ $detail->product_sales_quantity }}
                              </td>
                              <td style="text-align: center;">
                                      {{ $detail->product_price }} 
                              </td>
                              <td style="text-align: center;">
                                        @php
                                           $total_item = $detail->product_sales_quantity * $detail->product_price ;
                                            echo "$". $total_item ; 
                                           @endphp
                              </td>
                            </tr>
                         @endforeach
                    </tbody>
                </table>
            </div>
            <a href="#" class="popup-link btn btn-sm btn-white btn-block" data-popup="forgot" style="margin-top: 5px; width: 100%">
            <small>
                See more
            </small>
            </a>
        </div>
        @endforeach
      </div>

      <!-- Forgot Password Popup -->
      <div class="popup" id="forgotPopup">
        <button class="popup-close exitBtn" onclick="closePopup()">&times;</button>
        <center>
            <h3>
                <i class="fa-solid fa-user-tie"></i> Customer information
            </h3>
            <p style="margin-bottom: 5px ">
                Check your customer information
            </p>
        </center>
        <div class="cardNew">
            <div class="card-body">
          <p style="margin-bottom: 5px "><strong>Customer Name :  </strong> <span style="color: #007bff;">
                {{Session::get('customer_name')}}
          </span></p>
          <p style="margin-bottom: 5px "><strong>Customer Phone :  </strong> 
               {{ $orders_data[0]['shipping']->shipping_phone }}
          </p>
          <p style="margin-bottom: 5px "><strong>Customer Email :  </strong> 
                {{ $orders_data[0]['shipping']->shipping_email }}
          </p>
            </div>
            <a href="#" class="popup-link btn btn-sm btn-white btn-block btn-back" data-popup="back" style="margin-top: 5px; width: 100%">
            <small>
          Go back
            </small>
            </a>
        </div>
      </div>
    </div>
@endsection