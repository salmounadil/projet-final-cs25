  <!-- breadcrumb start-->
  <section class="breadcrumb breadcrumb_bg">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="breadcrumb_iner">
            <div class="breadcrumb_iner_item">
              <h2>Order Confirmation</h2>
              <p>Home <span>-</span> Order Confirmation</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- breadcrumb start-->

  <!--================ confirmation part start =================-->
  <section class="confirmation_part padding_top">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="confirmation_tittle">
            <span class="text-success">Cette commande a bien été confirmé et expediée.</span>
          </div>
        </div>
        <div class="col-lg-6 col-lx-4">
          <div class="single_confirmation_details">
            <h4>order info</h4>
            <ul>
              <li>
                <p>order number</p><span>: {{ $order->id }}</span>
              </li>
              <li>
                <p>data</p><span>: {{ $order->date }}</span>
              </li>
              <li>
                <p>total</p><span>: USD {{ $order->total }}</span>
              </li>
              <li>
                <p>mayment methord</p><span>: {{ $order->methode }}</span>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-lg-6 col-lx-4">
          <div class="single_confirmation_details">
            <h4>Billing Address</h4>
            <ul>
              <li>
                <p>Street</p><span>: {{ $order->adresse }}</span>
              </li>
              <li>
                <p>city</p><span>: {{ $order->ville }}</span>
              </li>
              <li>
                <p>country</p><span>: {{ $order->pays }}</span>
              </li>
              <li>
                <p>postcode</p><span>: {{ $order->codepostal }}</span>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-lg-6 col-lx-4">
          <div class="single_confirmation_details">
            <h4>shipping Address</h4>
            <ul>
              <li>
                <p>Street</p><span>: {{ $order->adresse }}</span>
              </li>
              <li>
                <p>city</p><span>: {{ $order->ville }}</span>
              </li>
              <li>
                <p>country</p><span>: {{ $order->pays }}</span>
              </li>
              <li>
                <p>postcode</p><span>: {{ $order->codepostal }}</span>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <div class="order_details_iner">
            <h3>Order Details</h3>
            <table class="table table-borderless">
              <thead>
                <tr>
                  <th scope="col" colspan="2">Product</th>
                  <th scope="col">Quantity</th>
                  <th scope="col">Total</th>
                </tr>
              </thead>
              <tbody>
                @foreach (json_decode($order->produits) as $produit )
                <tr>
                  <th colspan="2"><span>{{ $produit->nom}}</span></th>
                  <th>x{{ $produit->quantité }}</th>
                  <th> <span>${{ $produit->prixtotal }}</span></th>
                </tr>
                @endforeach
                <tr>
                  <th colspan="3">Subtotal</th>
                  <th> <span>${{ $order->total }}</span></th>
                </tr>
              </tbody>
              <tfoot>
                <tr>
                  <th scope="col" colspan="3">Quantity</th>
                  <th scope="col">{{ $order->quantité }}</th>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--================ confirmation part end =================-->