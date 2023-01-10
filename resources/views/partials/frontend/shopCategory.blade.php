    <!-- breadcrumb start-->
    <section class="breadcrumb breadcrumb_bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="breadcrumb_iner">
                        <div class="breadcrumb_iner_item">
                            <h2>Shop Category</h2>
                            <p>Home <span>-</span> Shop Category</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->

    <!--================Category Product Area =================-->
    <section class="cat_product_area section_padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="left_sidebar_area">

                        <aside class="left_widgets p_filter_widgets">
                            <div class="l_w_title">
                                <h3>Product filters</h3>
                            </div>
                            <div class="widgets_inner">
                                <ul class="list">
                                    <li>
                                        <a href="/category" class="{{ request()-> routeIs("category") ? "active" : "" }}">All</a>
                                    </li>
                                    @foreach ($categories as $categorie )
                                        <li>
                                        <a href="/categorie/{{ $categorie->id }}" class="{{ Request::path() == "categorie/".$categorie->id ? "active" : "" }}">{{ $categorie->categorie }}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </aside>
                        <aside class="left_widgets p_filter_widgets">
                            <div class="l_w_title">
                                <h3>Color Filter</h3>
                            </div>
                            <div class="widgets_inner">
                                <ul class="list">
                                    @foreach ($couleurs as $couleur)
                                        <li>
                                        <a href="/couleur/{{ $couleur->id }}" class="{{ Request::path() == "couleur/".$couleur->id ? "active" : "" }}">{{ $couleur->couleur }}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </aside>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="product_top_bar d-flex justify-content-between align-items-center">
                                <div class="single_product_menu d-flex">
                                    <form action="/category/search" method="get" >
                                    <div class="input-group  ">
                                            @csrf
                                            <input type="text" class="form-control" placeholder="search"
                                                 name="recherche">
                                            <div class="input-group-prepend">
                                                <button type="submit" class="border-0" style="background-color: white!important;">
                                                    <i class="ti-search"></i>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row align-items-center latest_product_inner">
                        @foreach ($produitsPagi as $produit)
                            <div class="col-lg-4 col-sm-6">
                            <div class="single_product_item">
                                @if ($produit->image)
                                    <a href="/produit/{{ $produit->id }}"><img src="{{ asset('/img/awesome/'.$produit->image.'.png') }}" alt=""></a>
                                @else
                                <a href="/produit/{{ $produit->id }}"><img src="{{ asset('/img/awesome/'.$produit->imageFile) }}" alt=""></a>
                                @endif
                                
                                <div class="single_product_text">
                                   
                                        <h4>{{ $produit->nom }}</h4>
                                    
                                    <h3 ><span style="{{($produit->promo > 0) ? 'text-decoration:line-through;' : null  }}">${{ $produit->prix }}.00</span>@if ($produit->promo > 0)
                                        <span class="text-danger">${{ $produit->prixfinal}}        (-{{ $produit->promo }}%)</span>
                                    @endif
                                    @auth
                                    <div class="d-flex align-items-center justify-content-between">
                                   <a href="" class="add_cart">+ add to cart</a>
                                   <a href="" class="add_cart"><i class="ti-heart"></i></a>
                               </div>
                               @endauth                                </div>
                            </div>
                        </div>
                        @endforeach
                        <div class="col-lg-12">
                            <div class="pageination">
                                <nav aria-label="Page navigation example">
                                    {{ $produitsPagi->links('partials.frontend.pagination') }}
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Category Product Area =================-->