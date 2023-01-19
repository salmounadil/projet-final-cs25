<section class="cart_area padding_top bannerback">
    <h1 class="text-center pb-5 mb-5">Contact Mail #{{ $show->id }}</h1>
    <div class="container">
        <div class="cart_inner">
            <div class="table-responsive">
<div class="border border-1 border-success bg-white p-3 pb-5 mb-5">
    <h1 class="text-center p-3">Nom : {{ $show->nom }}</h1>
    <h3 class="text-center p-3">Sujet : {{ $show->sujet }}</h3>
    <p class="p-5 text-center">{{ $show->message }}</p>
    <div class="d-flex justify-content-center"><a href="/backoffice/mailbox/reponse/{{ $show->id }}" class="mx-5 btn btn-primary">Répondre</a></div>
</div>
</div>
</div>
</div>
</section>
