<section class="breadcrumb breadcrumb_bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="breadcrumb_iner">
                    <div class="breadcrumb_iner_item">
                        <h2>Shop Single</h2>
                        <p>Home <span>-</span> Shop Single</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- breadcrumb start-->
<!--================End Home Banner Area =================-->

<!--================Single Product Area =================-->
<div class="product_image_area section_padding">
    <div class="container">
        <div class="row s_product_inner justify-content-between">
            <div class="col-lg-7 col-xl-7">
                <div class="product_slider_img">
                    <div id="vertical">
                        <div data-thumb="{{ $produit->image ? asset('storage/feature1/'.$produit->image) : asset('storage/feature1/'.$produit->imageFile ) }}">
                            <img src="{{ $produit->image ? asset('storage/feature1/'.$produit->image) : asset('storage/feature1/'.$produit->imageFile ) }}" />
                        </div>
                        <div data-thumb="{{ $produit->image ? asset('storage/feature1/'.$produit->image) : asset('storage/feature1/'.$produit->imageFile ) }}">
                            <img src="{{ $produit->image ? asset('storage/feature1/'.$produit->image) : asset('storage/feature1/'.$produit->imageFile ) }}" />
                        </div>
                        <div data-thumb="{{ $produit->image ? asset('storage/feature1/'.$produit->image) : asset('storage/feature1/'.$produit->imageFile ) }}">
                            <img src="{{ $produit->image ? asset('storage/feature1/'.$produit->image) : asset('storage/feature1/'.$produit->imageFile ) }}" />
                        </div>
                        <div data-thumb="{{ $produit->image ? asset('storage/feature1/'.$produit->image) : asset('storage/feature1/'.$produit->imageFile ) }}">
                            <img src="{{ $produit->image ? asset('storage/feature1/'.$produit->image) : asset('storage/feature1/'.$produit->imageFile ) }}" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-xl-4">
                <div class="s_product_text">
                    <h3>{{ $produit->nom }}</h3>
                    <h2>@if ($produit->promo)
                        <span style="text-decoration:line-through" class="text-secondary">${{ $produit->prix }}</span><span> ${{$produit->prix/100*(100-$produit->promo)  }} (-{{ $produit->promo }}%)</span>
                        @else ${{ $produit->prix }}
                    @endif</h2>
                    <ul class="list">
                        <li>
                            <a class="active" href="#">
                                <span>Category</span> : {{ $produit->categorie->categorie }}</a>
                        </li>
                        <li>
                            <a href="#"> <span>Availibility</span> : {{ $produit->stock }}</a>
                        </li>
                    </ul>
                    <p>
                        {{ $produit->description }}
                    </p>
                    @auth
                        <div class="card_area d-flex justify-content-between align-items-center">
                        <div class="product_count">
                            <form action="/panier/add"  method="POST">
                                @csrf
                                <span class="inumber-decrement"> <i class="ti-minus"></i></span>
                                {{-- {{ Auth::user()->panier->produitsPanier->count() }} --}}
                                <input class="input-number" type="number" name="quantité" value="{{ Auth::user()->panier->produitsPanier->where('produit_id',$produit->id)->count() > 0 ? Auth::user()->panier->produitsPanier->where('produit_id',$produit->id)->first()->quantité : ($produit->stock > 0 ? 1 : 0) }}" min="0" max="{{ $produit->stock }}">
                                <span class="number-increment"> <i class="ti-plus"></i></span>
                                <input type="hidden" name="idd" value="{{ $produit->id }}">
                                                        </div>
                                                        <input type="submit" value="add to cart" class="btn_3">
                            </form>
                        <a id="like" class="like_us"> <i class=" {{ Auth::user()->produits->where('id',$produit->id)->count() > 0 ? "fa-solid fa-heart text-danger" : "fa-regular fa-heart " }}  "></i> </a>
                        <form action="/produit/like" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $produit->id }}">
                        </form>
                    </div>
                    @endauth
                    
                </div>
            </div>
        </div>
    </div>
</div>
<!--================End Single Product Area =================-->

<!--================Product Description Area =================-->
<section class="product_description_area">
    <div class="container">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
                    aria-selected="true">Description</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                    aria-controls="profile" aria-selected="false">Specification</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                    aria-controls="contact" aria-selected="false">Comments</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
                <p>
                    {{ $produit->description }}
                </p>

            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>
                                    <h5>Width</h5>
                                </td>
                                <td>
                                    <h5>128mm</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5>Height</h5>
                                </td>
                                <td>
                                    <h5>508mm</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5>Depth</h5>
                                </td>
                                <td>
                                    <h5>85mm</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5>Weight</h5>
                                </td>
                                <td>
                                    <h5>52gm</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5>Quality checking</h5>
                                </td>
                                <td>
                                    <h5>yes</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5>Freshness Duration</h5>
                                </td>
                                <td>
                                    <h5>03days</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5>When packeting</h5>
                                </td>
                                <td>
                                    <h5>Without touch of hand</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5>Each Box contains</h5>
                                </td>
                                <td>
                                    <h5>60pcs</h5>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="tab-pane fade show active" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="comment_list">
                            @php
                                $count = 0;
                            @endphp
                            @foreach ($commentaires->where('produit_id', $produit->id)->reverse() as $commentaire)
                                <div class="review_item {{ $count % 2 == 0 ? 'reply' : null }}">
                                    <div class="media">
                                        <div class="d-flex">
                                            @if ($users->where('email', $commentaire->email)->count() > 0)
                                                @if ($commentaire->user->image == true)
                                                    <img class="rounded-circle"
                                                        src="{{ asset('storage/users/' . $commentaire->user->image) }}"
                                                        alt="" />
                                                @endif
                                                @if ($commentaire->user->imageFile)
                                                    <img class="rounded-circle" src="{{ asset('storage/users/' . $commentaire->user->imageFile) }}"
                                                        alt="" />
                                                @endif   
                                                @else
                                                    
                                                <div class="h5 d-flex justify-content-center align-items-center text-center p-0 text-white" style="height: 50px; width:50px; border-radius:50%; background-color:#455a64;">{{ strtoupper($commentaire->nom[0])  }}</div>
                                            @endif
                                        </div>
                                        <div class="media-body">
                                            <h4>{{ $commentaire->nom }}</h4>
                                            <h5>{{ $commentaire->date }}</h5>
                                        </div>
                                    </div>
                                    <p>
                                        {{ $commentaire->message }}
                                    </p>
                                </div>
                                @php
                                    $count++;
                                @endphp
                            @endforeach



                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="review_box">
                            <h4>Post a comment</h4>
                            <form class="row contact_form" action="/commentaire" method="POST" id="contactForm"
                                novalidate="novalidate">
                                @csrf
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="name" name="nom"
                                            placeholder="Your Full name"
                                            value="{{ Auth::check() ? Auth::user()->username : null }}" />
                                        <input type="hidden" name="id" value="{{ $produit->id }}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="email" class="form-control" id="email" name="email"
                                            placeholder="Email Address"
                                            value="{{ Auth::check() ? Auth::user()->email : null }}" />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="number" name="tel"
                                            placeholder="Phone Number" />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea class="form-control" name="message" id="message" rows="1" placeholder="Message"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12 text-right">
                                    <button type="submit" value="submit" class="btn_3">
                                        Submit Now
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
            document.querySelectorAll('#like').forEach(element => {
                            element.addEventListener('click',()=>{
                               element.nextElementSibling.submit();
                                
                            })
                        });
    </script>
</section>
<!--================End Product Description Area =================-->
<!-- product_list part start-->
@include('partials.frontend.bestSellers')
<!-- product_list part end-->
