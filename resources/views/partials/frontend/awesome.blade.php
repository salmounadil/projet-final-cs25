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
                                        <div class="single_product_item " style="background-color: #fafafa">
                                            <a href="/produit/{{ $produits[$nbr]->id }}"><img src="{{ $produits[$nbr]->image ? asset('storage/awesome/'.$produits[$nbr]->image) : asset('storage/awesome/'.$produits[$nbr]->imageFile) }}" alt=""></a>
                                            <div class="single_product_text">
                                                <h4 id="test">{{ $produits[$nbr]->nom }}</h4>
                                                <form action="/produit/{{ $produits[$nbr]->id }}" method="get">
                                                </form>
                                                <h3 ><span style="{{($produits[$nbr]->promo > 0) ? 'text-decoration:line-through;' : null  }}">${{ $produits[$nbr]->prix }}</span>@if ($produits[$nbr]->promo > 0)
                                                        <span class="text-danger">${{ $produits[$nbr]->prixfinal}}      (-{{ $produits[$nbr]->promo }}%)</span>
                                                    @endif
                                                </h3>
                                                @auth
                                                     <div class="d-flex align-items-center justify-content-between">
                                                        <form action="/panier" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="id" value="{{ $produits[$nbr]->id }}">
                                                            <input type="submit" class="add_carte" value="add to cart">
                                                        </form>
                                                    
                                                    <a id="like" class="add_cart"><i class=" {{ Auth::user()->produits->where('id',$produits[$nbr]->id)->count() > 0 ? "fa-solid fa-heart text-danger" : "fa-regular fa-heart " }}  "></i></a>
                                                    <form action="/produit/like" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{ $produits[$nbr]->id }}">
                                                    </form>
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
                        <script>
                        
                        document.querySelectorAll('#test').forEach(element => {
                            element.addEventListener('click',()=>{
                               element.nextElementSibling.submit();
                                
                            })
                        });
                        document.querySelectorAll('#like').forEach(element => {
                            element.addEventListener('click',()=>{
                               element.nextElementSibling.submit();
                                
                            })
                        });
                        </script>
                </div>
            </div>
        </div>
    </div>
</section>
