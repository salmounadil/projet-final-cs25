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
                            <div class="single_product_item" style="background-color: #fafafa">
                            <a href="/produit/{{ $produit->id }}"><img src="{{ $produit->image ? asset('storage/awesome/'.$produit->image) : asset('storage/awesome/'.$produit->imageFile) }}" alt=""></a>
                        <div class="single_product_text">
                            <h4 id="test">{{ $produit->nom }}</h4>
                            <form action="/produit/{{ $produit->id }}" method="get">
                            </form>
                            <h3 ><span style="{{($produit->promo > 0) ? 'text-decoration:line-through;' : null  }}">${{ $produit->prix }}</span>@if ($produit->promo > 0)
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
    <script>
                        
        document.querySelectorAll('#test').forEach(element => {
            element.addEventListener('click',()=>{
               element.nextElementSibling.submit();
                
            })
        });
        </script>
</section>