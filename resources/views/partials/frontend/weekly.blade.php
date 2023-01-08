<section class="our_offer section_padding " id="weekly">
    
    <div class="container">
        <div class="row align-items-center justify-content-between">
            <div class="col-lg-6 col-md-6">
                <div class="offer_img">
                    @php
                        $rand = rand(0,$produits->count()-1)
                    @endphp
                    <img src="img/section1/{{ $produits[$rand]->image }}.png" alt="">
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="offer_text">
                    <h2>Weekly Sale on
                        60% Off All Products</h2>
                    <div class="date_countdown">
                        <div id="timer">
                            <div id="days" class="date"></div>
                            <div id="hours" class="date"></div>
                            <div id="minutes" class="date"></div>
                            <div id="seconds" class="date"></div>
                        </div>
                    </div>
                    <form action="/mail/product" method="POST">
                        @csrf
                         <div class="input-group">
                        <input type="email" name="mail" class="form-control" placeholder="enter email address"
                            aria-label="Recipient's username" aria-describedby="basic-addon2">
                            
                            <input type="hidden" name="id" value="{{ $rand }}">
                            
                            <div class="input-group-append">
                                <button type="submit" class="input-group-text btn_2" id="basic-addon2">book now</a>
                                </div>
                            </div>
                            <x-input-error :messages="$errors->get('mail')" class="ml-3 mt-2 text-danger" />
                    </form>
                   
                </div>
            </div>
        </div>
    </div>
</section>