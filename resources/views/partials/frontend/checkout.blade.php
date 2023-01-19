  <!--================Home Banner Area =================-->
  <!-- breadcrumb start-->
  <section class="breadcrumb breadcrumb_bg">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="breadcrumb_iner">
            <div class="breadcrumb_iner_item">
              <h2>Products Checkout</h2>
              <p>Home <span>-</span> Shop Single</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- breadcrumb start-->

  <!--================Checkout Area =================-->
  <section class="checkout_area padding_top">
    <div class="container">
      <div class="cupon_area">
        <div class="check_title">
          <h2>
            Have a coupon? enter your code
          </h2>
        </div>
        <form action="/checkout/coupon" method="POST">
          @csrf
          <input type="text" name="coupon" placeholder="Enter coupon code" />
          <input class="tp_btn coupon" type="submit" value="Apply Coupon">
        </form>
      </div>
      <div class="billing_details">
        <div class="row">
          <div class="col-lg-8">
            <h3>Billing Details</h3>
            <form class="row contact_form" id="formCheckout" action="/panier/checkout/confirmation" method="POST" novalidate="novalidate">
              @csrf
              <div class="col-md-6 form-group p_star">
                <input type="text" class="form-control" id="first" placeholder="First name" value="{{ old('firstname') }}" name="firstname" />
              </div>
              <div class="col-md-6 form-group p_star">
                <input type="text" class="form-control" placeholder="Last name" id="last" value="{{ old('lastname') }}" name="lastname" />
              </div>
              <div class="col-md-6 form-group p_star">
                <input type="text" class="form-control" placeholder="Phone number" id="number" value="{{ old('tel') }}" name="tel" />
              </div>
              <div class="col-md-6 form-group p_star">
                <input type="text" class="form-control" placeholder="Email Address" id="email" value="{{Auth::user()->email }}" name="email" />
              </div>
              <div class="col-md-12 form-group p_star">
                <select class="country_select paysSelect "  name="pays">
                  <option value="1" disabled selected>Country</option>
                  <option value="Belgique" {{ old('pays') == "Belgique" ? "selected" : null }} >Belgique</option>
                  <option value="France" {{ old('pays') == "France" ? "selected" : null }}>France</option>
                </select>
              </div>
              <div class="col-md-12 form-group p_star">
                <input type="text" placeholder="Address line 01" class="form-control" id="add1" value="{{ old('adresse') }}" name="adresse" />
              </div>
              <div class="col-md-12 form-group p_star">
                <input type="text" placeholder="Town/City" class="form-control" id="city" value="{{ old('ville') }}" name="ville" />
              </div>
              <div class="col-md-12 form-group">
                <input type="text" class="form-control" id="zip" name="codepostal" value="{{ old('codepostal') }}" placeholder="Postcode/ZIP" />
              </div>
            </div>
            <div class="col-lg-4">
              <div class="order_box">
                <h2>Your Order</h2>
                <ul class="list">
                  <li>
                    <a href="#">Product
                      <span>Total</span>
                    </a>
                  </li>
                  @foreach (Auth::user()->panier->produitsPanier as $produitPanier )
                  <li>
                    <a href="#">{{ $produitPanier->nom }}
                      <span class="middle">x {{ $produitPanier->quantité }}</span>
                      <span class="last">${{ $produitPanier->prixtotal }}</span>
                    </a>
                  </li>  
                  @endforeach
                  
                </ul>
                <ul class="list list_2">
                  <li>
                    <a href="">Subtotal
                      <span>${{ Auth::user()->panier->paniertotal }}</span>
                    </a>
                  </li>
                  @if (Auth::user()->panier->coupon)
                  <li>
                    <a href="">Coupon : {{Auth::user()->panier->coupon->nom  }}
                      <span>{{ Auth::user()->panier->coupon->réduction }} %</span>
                    </a>
                  </li>
                  @endif
                  <li>
                  <a href="">Total
                    <span>${{ Auth::user()->panier->prixOrder }}</span>
                  </a>
                </li>
              </ul>
              <div class="payment_item">
                <div class="radion_btn">
                  <input type="radio" id="f-option5" value="Check payments" name="methode" {{ old('methode') == 'Check payments' ? 'checked' : null }} />
                  <label for="f-option5">Check payments</label>
                  <div class="check"></div>
                </div>
                <p>
                  Please send a check to Store Name, Store Street, Store Town,
                  Store State / County, Store Postcode.
                </p>
              </div>
              <div class="payment_item active">
                <div class="radion_btn">
                  <input type="radio" id="f-option6" value="Paypal" name="methode" {{ old('methode') == 'Paypal' ? 'checked' : null }} />
                  <label for="f-option6">Paypal </label>
                  <img src="{{ asset('img/product/single-product/card.jpg') }}" alt="" />
                  <div class="check"></div>
                </div>
                <p>
                  Please send a check to Store Name, Store Street, Store Town,
                  Store State / County, Store Postcode.
                </p>
              </div>
              <div class="creat_account">
                <input type="checkbox" id="f-option4" name="condition"  />
                <label for="f-option4">I’ve read and accept the </label>
                <a >terms & conditions*</a>
              </div>
              <a class="btn_3 payer text-white" >Check and Pay</a>
            </div>
            <input type="hidden" name="test">
          </form>
          </div>
        </div>
      </div>
    </div>
    <script>
      document.querySelector('.payer').addEventListener('click',()=>{
        document.querySelector('#formCheckout').submit();
      })
    </script>
  </section>
  <!--================End Checkout Area =================-->
