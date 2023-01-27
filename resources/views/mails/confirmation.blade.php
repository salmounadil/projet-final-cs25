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
    <div class="container">
        <img src="{{ $message->embed('img/logo.png') }}" alt="Logo" class="logo">
        <h1>Salut {{ $util->username }},</h1>
        <p>Merci de vous être inscrit sur notre site. Votre adresse e-mail est {{ $util->email }}.</p>
        <p>Cordialement</p>
        <div class="footer">
            L'équipe equipe
        </div>
    </div>
</body>
</html>