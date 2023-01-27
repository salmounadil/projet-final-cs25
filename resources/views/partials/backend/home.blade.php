<section class="cart_area padding_top bannerback">
    <div class="container">
        <h1 class="text-center p-5">Backoffice</h1>
        <div class="cart_inner p-5 ">
            <div class="col-md-12 ">
                <div class="row  ">
                    <div id="cardref" class="col-xl-3 col-lg-6">
                        <form id="formcardref" action="/users" method="get">
                        </form>
                        @can('admin-access')
                        <div class="card l-bg-cherry">
                            <div class="card-statistic-3 p-4">
                                <div class="mb-4">
                                    <h5 id="cardreff" class="card-title mb-0 text-center">Users</h5>
                                </div>
                                <div class="row align-items-center justify-content-center mb-2 d-flex">
                                    <div class="col-8">
                                        <h2 id="cardreff" class="d-flex align-items-center justify-content-center mb-0">
                                            {{ $users->count() }}
                                        </h2>
                                    </div>
                            
                                </div>

                            </div>
                        </div>
                        @endcan
                    </div>
                    @can('admin-access')
                    <div id="cardref" class="col-xl-3 col-lg-6">
                        <form id="formcardref" action="/orders" method="get"></form>
                        <div class="card l-bg-blue-dark">
                            <div class="card-statistic-3 p-4">
                                <div class="mb-4">
                                    <h5 id="cardreff" class="card-title mb-0 text-center">Orders</h5>
                                </div>
                                <div class="row align-items-center justify-content-center mb-2 d-flex">
                                    <div class="col-8">
                                        <h2 id="cardreff" class="d-flex align-items-center justify-content-center mb-0">
                                            {{ $orders->count() }}
                                        </h2>
                                    </div>
        
                                </div>
    
                            </div>
                        </div>
                    </div>
                    @endcan
                    @can('admin-access')
                    <div id="cardref" class="col-xl-3 col-lg-6">
                        <form id="formcardref" action="/tag" method="get"></form>
                        <div class="card l-bg-green-dark">
                            <div class="card-statistic-3 p-4">
                                <div class="mb-4">
                                    <h5 id="cardreff" class="card-title mb-0 text-center">Blogs Tags</h5>
                                </div>
                                <div class="row align-items-center justify-content-center mb-2 d-flex">
                                    <div class="col-8">
                                        <h2 id="cardreff" class="d-flex align-items-center justify-content-center mb-0">
                                            {{ $tags->count() }}
                                        </h2>
                                    </div>

                                </div>
  
                            </div>
                        </div>
                    </div>
                    @endcan
                    @can('admin-access')
                    <div id="cardref" class="col-xl-3 col-lg-6">
                        <form id="formcardref" action="/blogcategory" method="get"></form>
                        <div class="card l-bg-orange-dark">
                            <div class="card-statistic-3 p-4">
                                <div class="mb-4">
                                    <h5 id="cardreff" class="card-title mb-0 text-center">Blogs Categorys</h5>
                                </div>
                                <div class="row align-items-center justify-content-center mb-2 d-flex">
                                    <div class="col-8">
                                        <h2 id="cardreff" class="d-flex align-items-center justify-content-center mb-0">
                                            {{ $categoryblogs->count() }}
                                        </h2>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                    @endcan
                    @can('admin-access')
                    <div id="cardref" class="col-xl-3 col-lg-6">
                        <form id="formcardref" action="/category" method="get"></form>
                        <div class="card l-bg-orange-dark">
                            <div class="card-statistic-3 p-4">
                                <div class="mb-4">
                                    <h5 id="cardreff" class="card-title mb-0 text-center">Products Categorys</h5>
                                </div>
                                <div class="row align-items-center justify-content-center mb-2 d-flex">
                                    <div class="col-8">
                                        <h2 id="cardreff" class="d-flex align-items-center justify-content-center mb-0">
                                            {{ $categories->count() }}
                                        </h2>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                    @endcan
                    @can('admin-access')
                    <div id="cardref" class="col-xl-3 col-lg-6">
                        <form id="formcardref" action="/color" method="get"></form>
                        <div class="card l-bg-green-dark">
                            <div class="card-statistic-3 p-4">
                                <div class="mb-4">
                                    <h5 id="cardreff" class="card-title mb-0 text-center">Products Colors</h5>
                                </div>
                                <div class="row align-items-center justify-content-center mb-2 d-flex">
                                    <div class="col-8">
                                        <h2 id="cardreff" class="d-flex align-items-center justify-content-center mb-0">
                                            {{ $couleurs->count() }}
                                        </h2>
                                    </div>

                                </div>
  
                            </div>
                        </div>
                    </div>
                    @endcan
                    @can('admin-access')
                    <div id="cardref" class="col-xl-3 col-lg-6">
                        <form id="formcardref" action="/coupon" method="get"></form>
                        <div class="card l-bg-blue-dark">
                            <div class="card-statistic-3 p-4">
                                <div class="mb-4">
                                    <h5 id="cardreff" class="card-title mb-0 text-center">Coupons</h5>
                                </div>
                                <div class="row align-items-center justify-content-center mb-2 d-flex">
                                    <div class="col-8">
                                        <h2 id="cardreff" class="d-flex align-items-center justify-content-center mb-0">
                                            {{ $coupons->count() }}
                                        </h2>
                                    </div>
        
                                </div>
    
                            </div>
                        </div>
                    </div>
                    @endcan
                    @can('admin-webmaster')
                    <div id="cardref" class="col-xl-3 col-lg-6">
                        <form id="formcardref" action="/backoffice/produits" method="get"></form>
                        <div class="card l-bg-cherry">
                            <div class="card-statistic-3 p-4">
                                <div class="mb-4">
                                    <h5 id="cardreff" class="card-title mb-0 text-center">Products</h5>
                                </div>
                                <div class="row align-items-center justify-content-center mb-2 d-flex">
                                    <div class="col-8">
                                        <h2 id="cardreff" class="d-flex align-items-center justify-content-center mb-0">
                                            {{ $produits->count() }}
                                        </h2>
                                    </div>
                            
                                </div>

                            </div>
                        </div>
                    </div>
                    @endcan
                    @can('admin-webmaster')
                    <div id="cardref" class="col-xl-3 col-lg-6">
                        <form id="formcardref" action="/backoffice/produits#likedProducts" method="get"></form>
                        <div class="card l-bg-cherry">
                            <div class="card-statistic-3 p-4">
                                <div class="mb-4">
                                    <h5 id="cardreff" class="card-title mb-0 text-center">Liked Products</h5>
                                </div>
                                <div class="row align-items-center justify-content-center mb-2 d-flex">
                                    <div class="col-8">
                                        <h2 id="cardreff" class="d-flex align-items-center justify-content-center mb-0">
                                            @php
                                                $i = 0;
                                                foreach($produits as $produit){
                                                    if($produit->users->count()> 0){
                                                        $i++;
                                                    }
                                                }
                                            @endphp
                                            {{ $i }}
                                        </h2>
                                    </div>
                            
                                </div>

                            </div>
                        </div>
                    </div>
                    @endcan
                    <div id="cardref" class="col-xl-3 col-lg-6">
                        <form id="formcardref" action="/backoffice/blogs" method="get"></form>
                        <div class="card l-bg-blue-dark">
                            <div class="card-statistic-3 p-4">
                                <div class="mb-4">
                                    <h5 id="cardreff" class="card-title mb-0 text-center">Blogs</h5>
                                </div>
                                <div class="row align-items-center justify-content-center mb-2 d-flex">
                                    <div class="col-8">
                                        <h2 id="cardreff" class="d-flex align-items-center justify-content-center mb-0">
                                            {{ $blogs->count() }}
                                        </h2>
                                    </div>
        
                                </div>
    
                            </div>
                        </div>
                    </div>
                    @can('admin-access')
                    <div id="cardref" class="col-xl-3 col-lg-6">
                        <form id="formcardref" action="/backoffice/mailbox/contacts" method="get"></form>
                        <div class="card l-bg-green-dark">
                            <div class="card-statistic-3 p-4">
                                <div class="mb-4">
                                    <h5 id="cardreff" class="card-title mb-0 text-center">Contacts</h5>
                                </div>
                                <div class="row align-items-center justify-content-center mb-2 d-flex">
                                    <div class="col-8">
                                        <h2 id="cardreff" class="d-flex align-items-center justify-content-center mb-0">
                                            {{ $contacts->where('archive',false)->count() }}
                                        </h2>
                                    </div>

                                </div>
  
                            </div>
                        </div>
                    </div>
                    @endcan
                    @can('admin-access')
                    <div id="cardref" class="col-xl-3 col-lg-6">
                        <form id="formcardref" action="/backoffice/mailbox/archives" method="get"></form>
                        <div class="card l-bg-orange-dark">
                            <div class="card-statistic-3 p-4">
                                <div class="mb-4">
                                    <h5 id="cardreff" class="card-title mb-0 text-center">Contacts Archives</h5>
                                </div>
                                <div class="row align-items-center justify-content-center mb-2 d-flex">
                                    <div class="col-8">
                                        <h2 id="cardreff" class="d-flex align-items-center justify-content-center mb-0">
                                            {{ $contacts->where('archive',true)->count() }}
                                        </h2>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                    @endcan
                    </section>
    <script>
        document.querySelectorAll('#cardref').forEach(element => {
            element.addEventListener('click',()=>{
                element.firstElementChild.submit();
            })
        });
    </script>

                </div>
            </div>
        </div>
    </div>
    {{-- Adil --}}
