<section class="banner_part">
        {{-- @include('partials.frontend.flash') --}}
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                                @php
                                    $rand1 = rand(0, $produits->count() - 1);
                                    $rand2 = rand(0, $produits->count() - 1);
                                    $rand3 = rand(0, $produits->count() - 1);
                                @endphp
                <div class="banner_slider owl-carousel">
                    <div class="single_banner_slider">
                        <div class="row">
                            <div class="col-lg-5 col-md-8">
                                <div class="banner_text">
                                    <div class="banner_text_iner">
                                        <h1>Sports and football equipment </h1>
                                        <p>Incididunt ut labore et dolore magna aliqua quis ipsum
                                            suspendisse ultrices gravida. Risus commodo viverra</p>
                                            @auth
                                            <form action="/panier" method="POST">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $produits[$rand1]->id }}">
                                                <input type="submit" class="btn_2 buynow" value="buy now">
                                            </form>
                                            @endauth
                                    </div>
                                </div>
                            </div>
                            <div class="banner_img d-none d-lg-block">
                                <img src="img/section1/{{ $produits[$rand1]->image }}.png" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="single_banner_slider">
                        <div class="row">
                            <div class="col-lg-5 col-md-8">
                                <div class="banner_text">
                                    <div class="banner_text_iner">
                                        <h1>Sports and football equipment</h1>
                                        <p>Incididunt ut labore et dolore magna aliqua quis ipsum
                                            suspendisse ultrices gravida. Risus commodo viverra</p>
                                            @auth
                                            <form action="/panier" method="POST">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $produits[$rand2]->id }}">
                                                <input type="submit" class="btn_2 buynow" value="buy now">
                                            </form>
                                            @endauth
                                    </div>
                                </div>
                            </div>
                            <div class="banner_img d-none d-lg-block">
                                <img src="img/section1/{{ $produits[$rand2]->image }}.png" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="single_banner_slider">
                        <div class="row">
                            <div class="col-lg-5 col-md-8">
                                <div class="banner_text">
                                    <div class="banner_text_iner">
                                        <h1>Sports and football equipment</h1>
                                        <p>Incididunt ut labore et dolore magna aliqua quis ipsum
                                            suspendisse ultrices gravida. Risus commodo viverra</p>
                                            <form action="/panier" method="POST">
                                                @csrf
                                                @auth
                                                <input type="hidden" name="id" value="{{ $produits[$rand3]->id }}">
                                                <input type="submit" class="btn_2 buynow" value="buy now">
                                                @endauth
                                            </form>
                                    </div>
                                </div>
                            </div>
                            <div class="banner_img d-none d-lg-block">
                                <img src="img/section1/{{ $produits[$rand3]->image }}.png" alt="">
                            </div>
                        </div>
                    </div>

                </div>
                <div class="slider-counter"></div>
            </div>
        </div>
    </div>
</section>
