<section class="product_list best_seller {{ request()-> routeIs("home") ? "section_padding" : "" }} ">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="section_tittle text-center">
                    <h2>Best Sellers <span>shop</span></h2>
                </div>
            </div>
        </div>
        <div class="row align-items-center justify-content-between">
            <div class="col-lg-12">
                <div class="best_product_slider owl-carousel">
                    @foreach ($produitsBest as $produit)
                        @if ($produit->stock < 5)
                            <div class="single_product_item">
                        <a href="/produit/{{ $produit->id }}"><img src="{{ asset('/img/awesome/'.$produit->image.'.png') }}" alt=""></a>
                        <div class="single_product_text">
                            <h4>{{ $produit->nom }}</h4>
                            <h3 ><span style="{{($produit->promo > 0) ? 'text-decoration:line-through;' : null  }}">${{ $produit->prix }}.00</span>@if ($produit->promo > 0)
                                <span class="text-danger">${{ $produit->prixfinal }}         (-{{ $produit->promo }}%)</span>
                            @endif
                        </h3>
                        </div>
                    </div>
                        @endif
                    @endforeach
                    
                </div>
            </div>
        </div>
    </div>
</section>