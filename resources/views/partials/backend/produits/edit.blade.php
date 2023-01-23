<section class="contact-section padding_top bannerback">
    <div class="container">

      <div class="row">
        
        <div class="col-12">
          <h2 class="contact-title">Edit Product</h2>
        </div>
        <div class="col-lg-8">
          <form class="form-contact contact_form" action="/produit/{{ $edit->id }}" method="POST" id="contactForm" enctype="multipart/form-data"
            novalidate="novalidate" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">

              <div class="col-sm-6">
                <div class="form-group">
                  <input class="form-control bg-white" name="nom" id="nom" type="text" onfocus="this.placeholder = ''"
                    onblur="this.placeholder = 'Enter your name'" placeholder='Product name' value="{{ old('nom') ? old('nom') : $edit->nom }}">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <input class="form-control bg-white" name="prix" value="{{old('prix') ? old('prix') : $edit->prix }}" id="email" type="text" onfocus="this.placeholder = ''"
                    onblur="this.placeholder = 'Enter email address'" placeholder='Product price'>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <input class="form-control bg-white" name="promo" id="name" value="{{old('promo') ? old('promo') : $edit->promo }}" type="text" onfocus="this.placeholder = ''"
                    onblur="this.placeholder = 'Enter your name'" placeholder='Product promo'>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <input class="form-control bg-white" name="stock" id="email" type="text" value="{{old('stock') ? old('stock') : $edit->stock }}" onfocus="this.placeholder = ''"
                    onblur="this.placeholder = 'Enter email address'" placeholder='Product stock'>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <select class="country_select paysSelect px-5" name="categorie_id" id="">
                    <option  disabled selected>Category</option>
                    @foreach ($categories as $cat )
                        <option {{old('categorie_id') ? (old('categorie_id') == $cat->id ?"selected" : null ) : ( $edit->categorie_id == $cat->id ? 'selected' : null ) }} value="{{ $cat->id }}">{{ $cat->categorie }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                 <select class="country_select paysSelect px-5" name="couleur_id" id="">
                    <option  disabled selected>Color</option>
                    @foreach ($couleurs as $col )
                    <option {{old('couleur_id') ? (old('couleur_id') == $col->id ? "selected" :null) : ( $edit->couleur_id == $col->id ? 'selected' : null ) }} value="{{ $col->id }}">{{ $col->couleur }}</option>
                @endforeach
                 </select>
                </div>
              </div>
              <div class="col-md-12 form-group p_star">
                <input type="text" class="form-control bg-white" id="name" name="image" 
                placeholder="Image URL">
                <x-input-error :messages="$errors->get('image')" class="mt-2 text-danger" />

            </div>
            <div class="col-md-12 form-group p_star">
                <input type="file" class="form-control bg-white" id="name" name="imageFile" 
                placeholder="Image">
                <x-input-error :messages="$errors->get('imageFile')" class="mt-2 text-danger" />

            </div>
           
              <div class="col-12">
                <div class="form-group">

                  <textarea class="bg-white form-control w-100" name="description" id="message" cols="30" rows="9"
                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Description'"
                    placeholder='Enter Message'>{{old('description') ? old('description') : $edit->description}}</textarea>
                </div>
              </div>
            </div>
            <div class="form-group mt-3">
              <input type="submit"  class="btn_3 button-contactForm" value="Update">
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>