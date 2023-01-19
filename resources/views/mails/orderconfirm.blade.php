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
        <p class="info">Nous vous remercions pour votre commande chez nous. Nous sommes heureux de vous informer que votre commande a bien été reçue et est en cours de traitement.</p>

            <div class="row">
                <div class="single_confirmation_details">

                    <h4>Order no : {{ $order->id }}</h4>
                </div>
            </div>
            <p>Vous recevrez un e-mail de confirmation d'expédition dès que votre commande aura été expédiée. Si vous avez des questions ou des préoccupations concernant votre commande, n'hésitez pas à suivre son statut sur notre site à l'onglet "Tracking"
                </p>
                <p>Nous vous remercions encore une fois pour votre commande et espérons que vous apprécierez vos achats.</p>
                <p>Cordialement,</p>
            <div class="footer">
                L'équipe Aranoz
            </div>
        </div>
    </section>
</body>

</html>
