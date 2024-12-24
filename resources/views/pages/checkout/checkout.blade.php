@extends('layout_account')
@section("content_account")
    <div class="container-fluid breadcrumb-container" style="margin-top: 120px">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{URL::to('/')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Check Out</li>
                </ol>
            </nav>
    </div>
    <?php
        $sessionCart = Session::get('cart', []);
        if (!is_array($sessionCart)) {
            $sessionCart = [];
        }
        $sessionCartNormalized = [];
        foreach ($sessionCart as $item) {
            if (is_array($item)) {
                $sessionCartNormalized[] = [
                    'id' => $item['product_id'],
                    'name' => $item['product_name'],
                    'image' => $item['product_image'],
                    'price' => $item['product_price'],
                    'qty' => $item['product_qty'],
                ];
            }
        }
        $finalCart = [];
        foreach ($sessionCartNormalized as $item) {
            if (isset($finalCart[$item['id']])) {
                $finalCart[$item['id']]['qty'] += $item['qty'];
            } else {
                $finalCart[$item['id']] = $item;
            }
        }
        $newarray = array_values($finalCart);
        $content = $newarray;
        $total = 0;
              foreach ($content as $item) {
                  $total += $item['price'] * $item['qty'];
              }
    ?>
    <div class="container">
        <div class="woocommerce">
          <form class="checkout block">
            @csrf
            <div class="row">
              <div class="col-sm-6New">
                <div class="woocommerce-shipping-fields box">
                  <label
                    class="checkbox checkbox-inline pull-right ship-to-billing-address-checkbox"
                  >
                    <input type="checkbox" checked />Ship to billing address?
                  </label>
                  <h4 class="nameConntent">Shipping Address</h4>
                  <form action="">
                    @csrf
                    <div class="shipping-address">
                    <div class="form-group dropdown"> 
                          <select class="selector full-width choose city" name="city" id="city">
                                <option value="">City</option>
                                @foreach ($city as $key => $item)
                                         <option value="{{$item->matp}}" class="cityOptions" >{{$item->name_city}}</option>
                                @endforeach 
                          </select>
                    </div>
                    <div class="form-group dropdown"> 
                          <select class="selector full-width choose province" name="district" id="district">
                                <option value="">District</option>
                          </select>
                    </div>
                     <div class="form-group dropdown">
                            <select class="selector full-width ward" name="ward" id="ward">
                                <option value="">Ward</option>
                            </select>
                    </div>
                    <div class="form-group column-2 no-column-bottom-margin">
                      <input
                      required
                        class="input-text shipping_first_name"
                        placeholder="First name "
                        type="text"
                        name="shipping_first_name"
                      />
                      <input
                      required
                        class="input-text shipping_last_name"
                        placeholder="Last name "
                        type="text"
                        name="shipping_last_name"
                      />
                    </div>
                    <div class="form-group">
                      <input
                      required
                        class="input-text full-width shipping_phone"
                        placeholder="Phone number"
                        type="text"
                        name="shipping_phone"
                      />
                    </div>
                    <div class="form-group">
                      <input
                      required
                        class="input-text full-width shipping_address"
                        placeholder="Address"
                        type="text"
                        name="shipping_address"
                      />
                    </div>
                    <div class="form-group">
                      <input
                      required
                        class="input-text full-width shipping_email"
                        placeholder="Email address"
                        type="text"
                        name="shipping_email"
                      />
                    </div>
                    <div class="form-group">
                      <input
                      required
                        class="input-text full-width shipping_zipCode"
                        placeholder="Zip code"
                        type="text"
                        name="shipping_zipCode"
                      />
                    </div>
                    </div>
                    <div class="form-group box">
                      <textarea
                        class="input-text full-width textarea shipping_notes"
                        placeholder="Notes about your order, Special Notes for Delivery"
                        name="shipping_notes"
                        rows="8" style="height: 100px; padding: 10px 10px 10px 10px;"
                      ></textarea>
                    </div>
                    <div class="form-group box">
                      <button type="button" class="btn btn-medium style1 pull-right caculate_delivery" name="caculate_order" style="margin-bottom: 10px ; background-color: black ; color: white">
                         Caclculate Shipping
                      </button>
                    </div>
                    @if (Session::get('fee'))
                        <input type="hidden" name="order_fee" class="order_fee" value="{{Session::get('fee')}}">
                    @else
                        <input type="hidden" name="order_fee" class="order_fee" value="10">
                    @endif
                    @if (Session::get('coupon'))
                        @foreach (Session::get('coupon') as $key => $cou)
                            <input type="hidden" name="order_coupon" class="order_coupon" value="{{$cou['coupon_code']}}">
                        @endforeach
                    @else
                        <input type="hidden" name="order_coupon" class="order_coupon" value="no">
                    @endif
                  </form>
                </div>
              </div>
              <div class="col-sm-6New">
                <h4 class="nameConntent">Your order</h4>
                <div id="order_review">
                  <table class="shop_table box">
                    <thead>
                      <tr>
                        <th class="product-name">Product</th>
                        <th class="product-total">Total</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($content as $item)
                      <tr class="cart_item">
                        <td class="product-name">
                          {{$item['name']}} &nbsp;
                            <strong
                            class="product-quantity"
                            >× 
                            {{$item['qty']}}
                            </strong
                          >
                        </td>
                        <td class="product-total">
                          <span class="amount">
                                 ${{ $item['price'] * $item['qty'] }}
                          </span>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                    <tfoot>
                      <tr class="cart-subtotal">
                        <th>Cart Subtotal</th>
                        <td><span class="amount">
                            ${{ $total }}
                        </span></td>
                      </tr>
                      <tr class="shipping">
                        <th>Shipping</th>
                        @if (Session::get('fee'))
                          <td>
                            $ {{ Session::get('fee') }} 
                          </td>
                      @else
                          <td>
                            Free 
                          </td>
                      @endif
                      </tr>
                      @if ($total > 0) 
                         @if(Session::get('coupon'))
                            @php
                               $cart_priceTotal = (int) $total; 
                            @endphp
                            @foreach (Session::get('coupon') as $key  => $cou)
                                 @if ($cou['coupon_condition'] == 1) 
                                    <tr class="tax">
                                          <th>
                                            Disscount Coupon 
                                          </th>
                                          <td>
                                            {{ $cou['coupon_number'] }} %
                                          </td>
                                    </tr>
                                     @php
                                      $coupon_number = $cou['coupon_number'];
                                      $total_coupon = (int)$cart_priceTotal - ((int)$cart_priceTotal * $coupon_number / 100);
                                    @endphp
                                  @elseif ($cou['coupon_condition'] == 2)
                                    <tr class="tax">
                                      <th>
                                        Disscount Coupon 
                                      </th>
                                      <td>
                                      ${{ $cou['coupon_number'] }} 
                                      </td>
                                    </tr>
                                    @php
                                      $coupon_number = $cou['coupon_number'];
                                      $total_coupon = (int)$cart_priceTotal - $coupon_number;
                                    @endphp
                                  @endif
                            @endforeach
                         @endif
                         @php
                           $cart_priceTotal = (int) str_replace(',', '', $total); 
                           if (Session::get('fee') && !Session::get('coupon')){
                              $total_after = $cart_priceTotal + (int)Session::get('fee');
                           }
                           elseif(!Session::get('fee') && Session::get('coupon')){
                               $total_after = $total_coupon;
                           }

                           elseif(Session::get('fee') && Session::get('coupon')){
                              $total_after = $total_coupon + (int)Session::get('fee');
                           }
                           elseif(!Session::get('fee') && !Session::get('coupon')){
                                $total_after = $cart_priceTotal;
                           }
                         @endphp
                         <tr class="tax">
                              <th>
                                Total After Discount
                              </th>
                              <td>
                                <strong>  ${{$total_after}} </strong>
                              </td>
                          </tr>
                      @endif
                    </tfoot>
                  </table>
                    @if ($total > 0)
                  <table class="shop_table box">
                      <thead>
                          <tr>
                              <th class="product-name"  colspan="2">Your Coupon</th>
                          </tr>
                      </thead>
                      <tbody>
                            <form action="{{url('/check-coupon')}}" method="POST">
                              @csrf
                            <tr class="tax">
                              <th>
                                  <input type="text" name="coupon" placeholder="Coupon code" class="input-text" style="width: 100%">
                              </th>
                              <td style="padding: 0px 0px" >
                                  <button type="submit" class="btn btn-medium style1">Apply Coupon</button>
                              </td>
                            </tr>
                          </form>
                      </tbody>
                  </table>
                   @endif
                  <div id="payment">
                    <h4 class="nameConntent">Payment Method</h4>
                    <ul class="payment_methods methods box-sm">
                      <li class="payment_method_bacs">
                        <label class="radio">
                          <input
                            id="payment_method_bacs"
                            class="input-radio shipping_method"
                            name="payment_method"
                            value="0"
                            checked="checked"
                            data-order_button_text=""
                            type="radio"
                          />
                          Direct Bank Transfer
                        </label>
                        <div class="payment_box payment_method_banktransfer">
                          <p>
                            Make your payment directly into our bank account.
                            Please use your Order ID as the payment reference.
                            Your order won’t be shipped until the funds have
                            cleared in our account. <br>
                            <strong>
                              Levents's Bank Account : 0123456789
                            </strong>
                          </p>
                        </div>
                      </li>
                      <li class="payment_method_paypal">
                        <label class="radio">
                          <input
                            id="payment_method_paypal"
                            class="input-radio shipping_method" 
                            name="payment_method"
                            value="1"
                            data-order_button_text="Proceed to PayPal"
                            type="radio"
                          />
                         Cash On Delivery (COD)
                          <i class="fa-solid fa-truck-fast"></i>
                        </label>
                        <div class="payment_box payment_method_cod">
                          <p>
                            Cash On Delivery 
                          </p>
                        </div>
                      </li>
                    </ul>
                    <div class="form-row place-order">
                      <noscript
                        >Since your browser does not support JavaScript, or it
                        is disabled, please ensure you click the
                        <em>Update Totals</em> button before placing your order.
                        You may be charged more than the amount stated above if
                        you fail to do so.<br />
                        <button type="submit" class="btn btn-medium style1">
                          Update Totals
                        </button>
                      </noscript>
                      <button name="send_order" type="button"
                        id="place_order"
                        class="btn btn-medium style1 pull-right send_order"
                      >
                        Place Your Order
                      </button>
                    </div>
                    <div class="clear"></div>
                  </div>
                  <div class="bannerFooter" style="margin-top: 60px">
                        <div class="container">
                            <h4 class="nameConntent">Promotional Program</h4>
                            <div class="container">
                              <div class="w-100 promotion-banner">
                                <div class="container">
                                  <a href="">
                                    <img src="{{ asset('public/frontend/img/banner/banner2.jpg') }}" alt="">
                                  </a>
                                </div>
                              </div>
                            </div>
                        </div>
                   </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
@endsection