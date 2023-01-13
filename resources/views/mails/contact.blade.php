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

    </style>
</head>
<body class="bg-animation">
    <div class="container">
        <img src="{{ $message->embed('img/logo.png') }}" alt="Logo" class="logo">
        <h1>Salut Admin,</h1>
        <p>Vous avez reçu un message via le formulaire de contact de votre site web. Les détails de la demande sont les suivants:
</p>
<p>Nom: {{ $contact->nom }}</p>
<p>Email: {{ $contact->email }}</p>
<p>Sujet: {{ $contact->sujet }}</p>
<p>Message: {{ $contact->message }}</p>
<p>Veuillez traiter cette demande dans les plus brefs délais.</p>
<p>Cordialement,</p>
<p>PS: Ce mail est généré automatiquement, merci de ne pas y répondre.</p>
        <div class="footer">
            L'équipe Aranoz
        </div>
    </div>
</body>
</html>