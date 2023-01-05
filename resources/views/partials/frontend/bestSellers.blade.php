<section class="product_list best_seller section_padding">
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
                    @foreach ($produits as $produit)
                        
                    <div class="single_product_item">
                        <img src="img/awesome/{{ $produit->image}}.png" alt="">
                        <div class="single_product_text">
                            <h4>{{ $produit->nom }}</h4>
                            <h3 ><span style="{{($produit->promo) ? 'text-decoration:line-through;' : null  }}">${{ $produit->prix }}</span>@if ($produit->promo)
                                <span class="text-danger">${{ $produit->prix / 100 * (100-$produit->promo) }}         (-{{ $produit->promo }}%)</span>
                            @endif
                        </h3>
                        </div>
                    </div>
                    @endforeach
                    
                </div>
            </div>
        </div>
    </div>
</section>