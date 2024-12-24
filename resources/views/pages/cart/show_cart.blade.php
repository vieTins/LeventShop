  @extends('layout')
  @section("content")
      <div class="container-fluid breadcrumb-container">
        <?php
              $content = Session::get('cart');
              $total = 0;
              if ($content == true) {
                foreach ($content as $item) {
                  $total += $item['product_price'] * $item['product_qty'];
              }
              }
              else {
                $total = 0;
              }
        ?>
      <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{URL::to('/home')}}">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">
              <a href="">
              Your Cart Shopping
              </a>
          </li>
          </ol>
      </nav>
      </div>
      <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
          <div class="col-md-9">
            <div class="ibox">
              <div class="ibox-title">
                <span class="pull-right">(<strong>
                    @php
                        if($content == true) {
                         echo count($content);
                        }
                        else{
                          echo 0;
                        }
                    @endphp
                </strong>) items</span>
                <h5>Items in your cart</h5>
              </div>
              @if ($content == true) 
                 @foreach ($content as $item)
              <div class="ibox-content">
                <div class="table-responsive">    
                  <table class="table shoping-cart-table">
                    <tbody>
                      <tr>  
                        <td width="90">
                          <div class="cart-product-imitation">
                              <img src="{{URL::to('public/uploads/product/'.$item['product_image'])}}" alt="">
                          </div>
                        </td>
                        <td class="desc">
                          <h3>
                            <a href="{{URL::to('/product-detail/'.$item['product_id'])}}" class="text-navy">
                              {{$item['product_name']}} 
                            </a>
                          </h3>
                          <p class="small">
                            It is a long established fact that a reader will be
                            distracted by the readable content of a page when
                            looking at its layout. The point of using Lorem Ipsum
                            is
                          </p>
                          <dl class="small m-b-none">
                            <dt>Description lists</dt>
                            <dd>
                              A description list is perfect for defining terms.
                            </dd>
                          </dl>
                          <div class="m-t-sm">
                            <a href="#" class="text-muted"
                              ><i class="fa fa-gift"></i> Add gift package</a
                            >
                            |
                            <a href="{{URL::to('/delete-cart/'.$item['session_id'])}}" class="text-muted"
                              ><i class="fa fa-trash"></i>Remove item</a
                            >
                          </div>
                        </td>

                        <td>
                          $ {{$item['product_price']}}
                          <s class="small text-muted">$230,00</s> 
                        </td>
                        <td width="65">
                          <input
                            type="text"
                            class="form-control"
                            placeholder="1"
                            name="update_qty"
                            value="{{$item['product_qty']}}"
                          />
                        </td>
                        <td>
                          <h4>
                            {{ $item['product_price'] * $item['product_qty'] }}
                          </h4>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>      
              @endforeach
              @else
                
              @endif
              <div class="ibox-content">
                <button class="btn btn-primary pull-right"> 
                      <?php
                              $customer_id = Session::get('customer_id');
                              if($customer_id != NULL){
                              ?>
                                  <a style="color: white" href="{{URL::to('/checkout')}}"><i class="fa fa fa-shopping-cart"></i> Checkout</a>
                              <?php 
                              }else{
                              ?>
                                  <a style="color: white" href="{{URL::to('/login-checkout')}}"><i class="fa fa fa-shopping-cart"></i> Checkout</a>
                              <?php 
                              }
                      ?> 
                </button>
                <button class="btn btn-white">
                <a style="color: black" href="{{URL::to('/home')}}"><i class="fa fa-arrow-left"></i> Continue shopping</a>
                </button>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="ibox">
              <div class="ibox-title">
                <h5>Cart Summary</h5>
              </div>  
              <div class="ibox-content">
                <span> Total </span>
                <h2 class="font-bold">$
                {{$total}}
                </h2> 
                <hr />
                <div class="m-t-sm">
                  <div class="btn-group">
                      <?php
                              $customer_id = Session::get('customer_id');
                              if($customer_id != NULL){
                              ?>
                                  <a href="{{URL::to('/checkout')}}" class="btn btn-primary btn-sm "><i class="fa fa-shopping-cart"></i> Checkout</a>
                              <?php 
                              }else{
                              ?>
                                  <a href="{{URL::to('/login-checkout')}}" class="btn btn-primary btn-sm "><i class="fa fa-shopping-cart"></i> Checkout</a>
                              <?php 
                              }
                      ?>
                    <a href="#" class="btn btn-white btn-sm"> Cancel</a>
                  </div>
                </div>
              </div>
            </div>

            <div class="ibox">
              <div class="ibox-title">
                <h5>Support</h5>
              </div>
              <div class="ibox-content text-center">
                <h3><i class="fa fa-phone"></i> +43 100 783 001</h3>
                <span class="small">
                  Please contact with us if you have any questions. We are
                  avalible 24h.
                </span>
              </div>
            </div>

            <div class="ibox">
              <div class="ibox-content">
                <p class="font-bold">Other products you may be interested</p>

                <hr />
                <div>
                  <a href="#" class="product-name-info"> Product 1</a>
                  <div class="small m-t-xs">
                    Many desktop publishing packages and web page editors now.
                  </div>
                  <div class="m-t text-righ">
                    <a href="#" class="btn btn-xs btn-outline btn-primary"
                      >Info <i class="fa fa-long-arrow-right"></i>
                    </a>
                  </div>
                </div>
                <hr style="margin-top: 10px" />
                <div>
                  <a href="#" class="product-name-info"> Product 2</a>
                  <div class="small m-t-xs">
                    Many desktop publishing packages and web page editors now.
                  </div>
                  <div class="m-t text-righ">
                    <a href="#" class="btn btn-xs btn-outline btn-primary"
                      >Info <i class="fa fa-long-arrow-right"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  @endsection