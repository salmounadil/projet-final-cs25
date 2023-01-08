<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <p>Bonjour,</p>
    <p>Vous semblez intéressé par le produit {{ $produit->nom }},</p>
    <p>voici plus de détails le concernant.</p>
    <p>Cordialement.</p>
    <img src="{{ $message->embed('img/feature1/'.$produit->image.'.png') }}">
     <h1>{{ $produit->nom}}</h1>
     <p>${{ $produit->prix }}</p>
</body>
</html>