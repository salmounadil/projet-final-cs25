<section class="breadcrumb breadcrumb_bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="breadcrumb_iner">
                    <div class="breadcrumb_iner_item">
                        <h2>Cart Products</h2>
                        <p>Home <span>-</span> Cart Products</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="cart_area padding_top">
    <div class="container">
      <div class="cart_inner">
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Product</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Total</th>
              </tr>
            </thead>
            <tbody>@foreach (Auth::user()->panier->produitsPanier as $produit )
                <tr>
                <td>
                  <div class="media">
                    <div class="d-flex">
                      <img src="{{ asset('storage/panier/'.$produit->image.'.png') }}" alt="" />
                    </div>
                    <div class="media-body">
                      <p>{{ $produit->nom }}</p>
                    </div>
                  </div>
                </td>
                <td>
                  <h5>${{ $produit->prixfinal }}.00</h5>
                </td>
                <td>
                  <div class="product_count">
                    <span class="input-number-decrement"> <i class="ti-angle-down"></i></span>
                    <input class="input-number" type="text" value="1" min="0" max="10">
                    <span class="input-number-increment"> <i class="ti-angle-up"></i></span>
                  </div>
                </td>
                <td>
                  <h5>${{$produit->prixtotal  }}</h5>
                </td>
              </tr>  
            @endforeach
            <tr>
              <td></td>
              <td></td>
              <td>
                <h5>Subtotal</h5>
              </td>
              <td>
                <h5>${{ Auth::user()->panier->paniertotal }}.00</h5>
              </td>
            </tr>
            </tbody>
          </table>
          <div class="checkout_btn_inner float-right">
            <a class="btn_1" href="#">Continue Shopping</a>
            <a class="btn_1 checkout_btn_1" href="/checkout.html">Proceed to checkout</a>
          </div>
        </div>
      </div>
  </section>
