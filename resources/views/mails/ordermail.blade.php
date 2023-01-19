<!DOCTYPE html>
<html>

<head>
    <title>Email</title>
    <style>
        /* Ajoutez votre style CSS ici */
        body {
            font-family: Arial, sans-serif;
            background-color: #F5F5F5;
            padding-top: 20px;
            padding-bottom: 20px;
        }

        h1 {
            color: #333;
            text-align: center;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #FFF;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px #CCC;
        }

        .logo {
            display: block;
            margin: 0 auto;
            width: 150px;
        }

        a {
            color: #0084ff;
            text-decoration: none;
        }

        p {
            color: #666;
            line-height: 1.5;
        }

        .footer {
            text-align: center;
            color: #999;
            margin-top: 20px;
            font-size: 0.8em;
        }

        .bg-animation {
            animation: color-change 2s infinite;
        }

        .row {
            display: flex;
            flex-wrap: wrap
        }

        .single_confirmation_details {
            flex: 1
        }
        li{
            display: flex;
            justify-content: space-between;
        }
        .container{
            background-color: #ecfdff
        }
        span{
            display: flex;
            justify-content: center;
            align-items: center;
        }
        table{
            width: 100%;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .info{
            font-weight: bold;
        }
        .tbody{
            padding-top: 25px;
            padding-bottom: 25px;
            border-top: 1px solid black; 
        }
        tr{
            display: flex;
            justify-content: space-between;
        }
        .padd{
            padding-top: 8px;
            padding-bottom: 8px;
        }
        .subtotal{
            padding-top: 8px;
            padding-bottom: 8px;
            border-top: 1px solid black;
        }
        .foot{
            padding-bottom: 15px;
            border-bottom: 1px solid black;
        }
        .product{
            padding-bottom: 15px; 
        }
   

        @keyframes color-change {
            0% {
                background-color: red;
            }

            50% {
                background-color: blue;
            }

            100% {
                background-color: red;
            }
        }
    </style>
</head>

<body class="bg-animation">
    <section class="confirmation_part padding_top">
        <div class="container">
            <img src="{{ $message->embed('img/logo.png') }}" alt="Logo" class="logo">
        <h1>Salut {{$order->firstname  }},</h1>
        <p class="info">Nous vous remercions pour votre commande chez nous. Nous sommes heureux de vous informer que votre commande a bien confirmé et éxpediée.</p>

            <div class="row">
                <div class="single_confirmation_details">

                    <h4>Récapitulatif de la commande :</h4>
                    <ul>
                        <li>
                            <p class="info">Order number :</p><span> {{ $order->id }}</span>
                        </li>
                        <li>
                            <p class="info">Date :</p><span> {{ $order->date }}</span>
                        </li>
                        <li>
                            <p class="info">Total :</p><span> USD {{ $order->total }}</span>
                        </li>
                        <li>
                            <p class="info">Payment method :</p><span> {{ $order->methode }}</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="row">
                <div class="single_confirmation_details">
                    <h4>Billing Address</h4>
                    <ul>
                        <li>
                            <p class="info">Street :</p><span> {{ $order->adresse }}</span>
                        </li>
                        <li>
                            <p class="info">City :</p><span> {{ $order->ville }}</span>
                        </li>
                        <li>
                            <p class="info">Country :</p><span> {{ $order->pays }}</span>
                        </li>
                        <li>
                            <p class="info">Postcode :</p><span> {{ $order->codepostal }}</span>
                        </li>
                    </ul>
                </div>
            </div>


            <div class="row">
                <div class="single_confirmation_details">
                    <h4>Shipping Address</h4>
                    <ul>
                        <li>
                            <p class="info">Street :</p><span> {{ $order->adresse }}</span>
                        </li>
                        <li>
                            <p class="info">City :</p><span> {{ $order->ville }}</span>
                        </li>
                        <li>
                            <p class="info">Country :</p><span> {{ $order->pays }}</span>
                        </li>
                        <li>
                            <p class="info">Postcode :</p><span> {{ $order->codepostal }}</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="">
                        <h3>Order Details</h3>
                        <hr>
                        <table class="table">
                            <thead>
                                <tr class="padd">
                                    <th scope="col" colspan="2">Product</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Total</th>
                                </tr>
                            </thead>
                            <tbody class="tbody">
                                @foreach (json_decode($order->produits) as $produit)
                                    <tr class="product">
                                        <th>{{ $produit->nom }}</th>
                                        <th>x{{ $produit->quantité }}</th>
                                        <th> <span>${{ $produit->prixtotal }}</span></th>
                                    </tr>
                                @endforeach
                                <tr class="subtotal">
                                    <th colspan="3">Subtotal</th>
                                    <th> <span>${{ $order->total }}</span></th>
                                </tr>
                            </tbody>
                            <tfoot class="foot">
                                <tr>
                                    <th scope="col" colspan="3">Quantity</th>
                                    <th scope="col">{{ $order->quantité }}</th>
                                </tr >
                            </tfoot >
                        </table>
            </div>
                <p>Nous vous remercions encore une fois pour votre commande et espérons que vous apprécierez vos achats.</p>
                <p>Cordialement,</p>
            <div class="footer">
                L'équipe Aranoz
            </div>
        </div>
    </section>
</body>

</html>
