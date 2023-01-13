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
                    <tbody>
                        @foreach ($produitsPanier as $produit)
                            <tr>
                                <td>
                                    <div class="media">
                                        <div class="d-flex">
                                            <a href="/produit/{{ $produit->produit_id }}">
                                              <img src="{{ asset('storage/panier/' . $produit->image . '.png') }}"
                                                  alt="" />
                                            </a>
                                        </div>
                                        <div class="media-body">
                                          <a href="/produit/{{ $produit->produit_id }}">
                                            <p>{{ $produit->nom }}</p>
                                          </a>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <h5>${{ $produit->prixfinal }}.00</h5>
                                </td>
                                <td>
                                    <div class="product_count">
                                        {{-- <span class="input-number-decrement"> <i class="ti-angle-down"></i></span> --}}
                                        <form action="/panier/quantité" id="submit" method="POST">
                                            @csrf
                                            <input type="hidden" name="idd" value="{{ $produit->produit_id }}">
                                            <input id="quant" class="input-number" name="quantité" type="number"
                                                value="{{ $produit->quantité }}" min="0"
                                                max="{{ $produits->where('id',$produit->produit_id)->first()->stock }}">
                                        </form>
                                        {{-- <span class="input-number-increment"> <i class="ti-angle-up"></i></span> --}}
                                    </div>
                                </td>
                                <td>
                                    <h5>${{ $produit->prixtotal }}</h5>
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
                    <a class="btn_1" href="/category">Continue Shopping</a>
                    <a class="btn_1 checkout_btn_1" href="/panier/checkout">Proceed to checkout</a>
                </div>
            </div>
        </div>
        <script>
            document.querySelectorAll('#quant').forEach(element => {
                element.addEventListener('input', () => {
                    element.parentElement.submit();
                })
            });
        </script>
</section>
