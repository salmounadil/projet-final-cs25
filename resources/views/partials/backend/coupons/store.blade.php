<section class="contact-section padding_top bannerback">
    <div class="container">

      <div class="row">
        
        <div class="col-12">
          <h2 class="contact-title">New Coupon</h2>
        </div>
        <div class="col-lg-8">
          <form class="form-contact contact_form" action="/coupon" method="POST" id="contactForm"
            novalidate="novalidate" enctype="multipart/form-data">
            @csrf
            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <input class="form-control bg-white" name="nom" id="nom" type="text" onfocus="this.placeholder = ''"
                    onblur="this.placeholder = 'Enter your name'" placeholder='Coupon Name' value="{{ old('nom') ? old('nom') : null }}">
                </div>
                <div class="form-group">
                  <input class="form-control bg-white" name="réduction" id="réduction" type="number" min="-99" max="99" onfocus="this.placeholder = ''"
                    onblur="this.placeholder = 'Enter your name'" placeholder='Coupon Réduction' value="{{ old('réduction') ? old('réduction') : null }}">
                </div>
              </div>
            <div class="form-group mt-3">
              <input type="submit"  class="btn_3 button-contactForm" value="Create">
            </div>
          </form>
        </div>
      </div>
    </div>
    <script>
 
    </script>
  </section>