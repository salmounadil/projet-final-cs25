<section class="breadcrumb breadcrumb_bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="breadcrumb_iner">
                    <div class="breadcrumb_iner_item">
                        <h2>Liked Products</h2>
                        <p>Home <span>-</span> Cart Products</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="padding_top product_list best_seller {{ request()->routeIs('home') ? 'section_padding' : '' }} ">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="section_tittle text-center">
                    <h2>Liked Products <span>shop</span></h2>
                </div>
            </div>
        </div>
        <?php $nbr = 0; ?>
        @if (Auth::user()->produits->count() > 0)
        <div class="row">
                      <div class="col-lg-12">
                <div class="product_list_slider owl-carousel">
                    @for ($i = 0; $i < Auth::user()->produits->count(); $i += 8)
                        <div class="single_product_list_slider">
                            <div class="row align-items-center justify-content-between">
                                @for ($j = 0; $j < 8 && $nbr < Auth::user()->produits->count(); $j++)
                                    <div href="/produit/{{ Auth::user()->produits[$nbr]->id }}" class="col-lg-3 col-sm-6">
                                        <div class="single_product_item">
                                            <a href="/produit/{{ Auth::user()->produits[$nbr]->id }}"><img src="img/awesome/{{ Auth::user()->produits[$nbr]->image }}.png" alt=""></a>
                                            <div class="single_product_text">
                                                <h4 id="test">{{ Auth::user()->produits[$nbr]->nom }}</h4>
                                                <form action="/produit/{{ Auth::user()->produits[$nbr]->id }}" method="get">
                                                </form>
                                                <h3 ><span style="{{(Auth::user()->produits[$nbr]->promo > 0) ? 'text-decoration:line-through;' : null  }}">${{ Auth::user()->produits[$nbr]->prix }}</span>@if (Auth::user()->produits[$nbr]->promo > 0)
                                                        <span class="text-danger">${{ Auth::user()->produits[$nbr]->prixfinal}}      (-{{ Auth::user()->produits[$nbr]->promo }}%)</span>
                                                    @endif
                                                </h3>
                                                @auth
                                                     <div class="d-flex align-items-center justify-content-between">
                                                        <form action="/panier" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="id" value="{{ Auth::user()->produits[$nbr]->id }}">
                                                            <input type="submit" class="add_carte" value="add to cart">
                                                        </form>
                                                    
                                                    <a id="like" class="add_cart"><i class=" {{ Auth::user()->produits->where('id',Auth::user()->produits[$nbr]->id)->count() > 0 ? "fa-solid fa-heart text-danger" : "fa-regular fa-heart " }}  "></i></a>
                                                    <form action="/produit/like" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{ Auth::user()->produits[$nbr]->id }}">
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
            @else
            <div class="p-5 d-flex justify-content-center align-items-center">
                <h1 class="p-5 text-center">Aucuns produits likés</h1>
            </div>
            @endif
      
        </div>
    </div>
</section>
