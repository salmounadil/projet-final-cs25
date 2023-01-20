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
    <img src="{{ $produit->image ? $message->embed('storage/feature1/'.$produit->image) : $message->embed('storage/feature1/'.$produit->imageFile)  }}">
     <h1>{{ $produit->nom}}</h1>
     <h3 ><span style="{{($produit->promo > 0) ? 'text-decoration:line-through;' : null  }}">${{ $produit->prix }}</span>@if ($produit->promo > 0)
        <span style="color: #ff3368">${{ $produit->prixfinal}}      (-{{ $produit->promo }}%)</span>
    @endif
</h3>
</body>
</html>