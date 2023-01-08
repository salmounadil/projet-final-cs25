<section class="subscribe_area section_padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="subscribe_area_text text-center">
                    <h5>Join Our Newsletter</h5>
                    <h2>Subscribe to get Updated
                        with new offers</h2>
                        <form action="/mail/newsletter" method="POST">
                    <div class="input-group">
                            @csrf
                            <input type="email" name="email" class="form-control" placeholder="enter email address"
                                aria-label="Recipient's username" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button type="submit" class="input-group-text btn_2" id="basic-addon2">subscribe
                                    now</button>
                            </div>
                        </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</section>
