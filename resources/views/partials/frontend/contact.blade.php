      <!-- breadcrumb start-->
      <section class="breadcrumb breadcrumb_bg">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-8">
              <div class="breadcrumb_iner">
                <div class="breadcrumb_iner_item">
                  <h2>contact us</h2>
                  <p>Home <span>-</span> contact us</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- breadcrumb start-->
    
      <!-- ================ contact section start ================= -->
      <section class="contact-section padding_top">
        <div class="container">
          <div class="d-none d-sm-block mb-5 pb-4">
                        <iframe id="myMap" src="https://maps.google.com/maps?&q={{str_replace(" ","+", $map->adresse .$map->codepostal .$map->ville  )  }}&output=embed" frameborder="0" style="border:0; width: 100%; height: 480px;" allowfullscreen></iframe>
          </div>
          <div class="row">
            
            <div class="col-12">
              <h2 class="contact-title">Get in Touch</h2>
            </div>
            <div class="col-lg-8">
              <form class="form-contact contact_form" action="/contact" method="POST" id="contactForm"
                novalidate="novalidate">
                @csrf
                <div class="row">
                  <div class="col-12">
                    <div class="form-group">
    
                      <textarea class="form-control w-100" name="message" id="message" cols="30" rows="9"
                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Message'"
                        placeholder='Enter Message'></textarea>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <input class="form-control" name="nom" id="name" type="text" onfocus="this.placeholder = ''"
                        onblur="this.placeholder = 'Enter your name'" placeholder='Enter your name'>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <input class="form-control" name="email" id="email" type="email" onfocus="this.placeholder = ''"
                        onblur="this.placeholder = 'Enter email address'" placeholder='Enter email address'>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-group">
                      <input class="form-control" name="sujet" id="sujet" type="text" onfocus="this.placeholder = ''"
                        onblur="this.placeholder = 'Enter Subject'" placeholder='Enter Subject'>
                    </div>
                  </div>
                </div>
                <div class="form-group mt-3">
                  <input type="submit" href="#" class="btn_3 button-contactForm" value="Send Message">
                </div>
              </form>
            </div>
            <div class="col-lg-4">
              <div class="media contact-info">
                <span class="contact-info__icon"><i class="ti-home"></i></span>
                <div class="media-body">
                  <h3>{{ $map->adresse }}</h3>
                  <p>{{ $map->codepostal }} {{ $map->ville }}</p>
                </div>
              </div>
              <div class="media contact-info">
                <span class="contact-info__icon"><i class="ti-tablet"></i></span>
                <div class="media-body">
                  <h3>{{ $map->tel }}</h3>
                  <p>Mon to Fri 9am to 6pm</p>
                </div>
              </div>
              <div class="media contact-info">
                <span class="contact-info__icon"><i class="ti-email"></i></span>
                <div class="media-body">
                  <h3>{{ $map->email }}</h3>
                  <p>Send us your query anytime!</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- ================ contact section end ================= -->