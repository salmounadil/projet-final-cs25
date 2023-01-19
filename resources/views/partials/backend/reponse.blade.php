<section class="cart_area padding_top bannerback">
    <div class="container ">
        <div class="cart_inner p-3">
            <form action="/backoffice/mailbox/reponse" method="POST">
                @csrf
            <div class="table-responsive">
                <h1 class="text-center p-3">Réponse Mail Contact #{{ $reponse->id }}</h1>
                <div class="col-sm-6 my-3">
                    <div class="form-group">
                        <div class="d-flex gap-3"><span class="text-secondary">Email : </span><h4 class="px-3">{{ $reponse->email }}</h4></div>
                    </div>
                </div>
                <div class="col-12 my-3">
                    <div class="form-group">
                        <div class="d-flex gap-3"><span class="text-secondary">Réponse à votre mail : </span><h4 class="px-3">{{ $reponse->sujet }}</h4></div>
                    </div>
                </div>
                <div class="col-12 py-3">
                    <div class="form-group">
                        <input type="hidden" name="id" value="{{ $reponse->id }}">
                        <input type="hidden" name="email" value="{{ $reponse->email }}">
                        <input type="hidden" name="sujet" value="{{ $reponse->sujet }}">
                        <input type="hidden" name="nom" value="{{ $reponse->nom }}">
                      <textarea class="form-control w-100" name="message" id="message" cols="30" rows="9"
                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Message'"
                        placeholder='Enter Message'></textarea>
                    </div>
                  </div>
            </div>
            <div class="form-group mt-3">
                <input type="submit"  class="btn_3 button-contactForm" value="Send Message">
            </div>
            </form>
        </div>
    </div>
    </div>
    </div>
</section>
