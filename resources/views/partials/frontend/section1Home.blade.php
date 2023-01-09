<section class="banner_part">
        {{-- @include('partials.frontend.flash') --}}
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <div class="banner_slider owl-carousel">
                    <div class="single_banner_slider">
                        <div class="row">
                            <div class="col-lg-5 col-md-8">
                                <div class="banner_text">
                                    <div class="banner_text_iner">
                                        <h1>Sports and football equipment </h1>
                                        <p>Incididunt ut labore et dolore magna aliqua quis ipsum
                                            suspendisse ultrices gravida. Risus commodo viverra</p>
                                        <a href="{{ route('category') }}" class="btn_2">buy now</a>
                                    </div>
                                </div>
                            </div>
                            <div class="banner_img d-none d-lg-block">
                                @php
                                    $rand1 = rand(0, $produits->count() - 1);
                                    $rand2 = rand(0, $produits->count() - 1);
                                    $rand3 = rand(0, $produits->count() - 1);
                                @endphp
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
                                        <a href="#" class="btn_2">buy now</a>
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
                                        <a href="#" class="btn_2">buy now</a>
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
