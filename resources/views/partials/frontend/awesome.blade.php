<section class="product_list section_padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="section_tittle text-center">
                    <h2>awesome <span>shop</span></h2>
                </div>
            </div>
        </div>
        <?php $nbr = 0; ?>
        <div class="row">
            <div class="col-lg-12">
                <div class="product_list_slider owl-carousel">
                    @for ($i = 0; $i < $produits->count(); $i += 8)
                        <div class="single_product_list_slider">
                            <div class="row align-items-center justify-content-between">
                                @for ($j = 0; $j < 8 && $nbr < $produits->count(); $j++)
                                    <div href="/produit/{{ $produits[$nbr]->id }}" class="col-lg-3 col-sm-6">
                                        <div class="single_product_item">
                                            <a href="/produit/{{ $produits[$nbr]->id }}"><img src="img/awesome/{{ $produits[$nbr]->image }}.png" alt=""></a>
                                            <div class="single_product_text">
                                                <h4 >{{ $produits[$nbr]->nom }}</h4>
                                                <h3 ><span style="{{($produits[$nbr]->promo > 0) ? 'text-decoration:line-through;' : null  }}">${{ $produits[$nbr]->prix }}.00</span>@if ($produits[$nbr]->promo > 0)
                                                        <span class="text-danger">${{ $produits[$nbr]->prixfinal}}      (-{{ $produits[$nbr]->promo }}%)</span>
                                                    @endif
                                                </h3>
                                                @auth
                                                     <div class="d-flex align-items-center justify-content-between">
                                                        <form action="/panier" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="id" value="{{ $produits[$nbr]->id }}">
                                                            <input type="submit" class="add_cart" value="add to cart">
                                                        </form>
                                                    
                                                    <a href="" class="add_cart"><i class="ti-heart"></i></a>
                                                </div>
                                                @endauth
                                            </div>
                                        </div>
                                    </div>
                                    <?php $nbr++; ?>
                                @endfor
                                <?php $j = 0; ?>
                            </div>
                        </div>
                    @endfor

                </div>
            </div>
        </div>
    </div>
</section>
