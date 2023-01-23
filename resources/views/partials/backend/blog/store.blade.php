<section class="contact-section padding_top bannerback">
    <div class="container">

      <div class="row">
        
        <div class="col-12">
          <h2 class="contact-title">New Blog</h2>
        </div>
        <div class="col-lg-8">
          <form class="form-contact contact_form" action="/blog" method="POST" id="contactForm"
            novalidate="novalidate" enctype="multipart/form-data">
            @csrf
            <div class="row">
              
              <div class="col-sm-12">
                <div class="form-group">
                  <input class="form-control bg-white" name="titre" id="nom" type="text" onfocus="this.placeholder = ''"
                    onblur="this.placeholder = 'Enter your name'" placeholder='Blog title' value="{{ old('titre') ? old('titre') : null }}">
                </div>
              </div>
              <div class="col-sm-12">
                <div class="form-group">
                    <div class="d-flex flex-column text-dark">
                      <label for="">Tags</label>
                      @foreach ($tags as $tag )
                      <div class="d-flex align-items-center justify-content-start ">
                        <input type="checkbox" {{ old($tag->tag) ? "checked" : null }}  name="{{ $tag->tag }}" id="" value="{{ $tag->id }}">
                        <label class="m-0 ml-3" for="">{{ $tag->tag }}</label>
                      </div>
                      @endforeach
                    </div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                 <select class="country_select paysSelect px-5" name="categorie" id="">
                    <option  disabled selected>Category</option>
                    @foreach ($categoryBlogs as $cat )
                    <option  {{ old('categorie') == $cat->id ? 'selected' : null }}  value="{{ $cat->id }}">{{ $cat->categorie }}</option>
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

                  <textarea class="bg-white form-control w-100" name="texte" id="message" cols="30" rows="9"
                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Description'"
                    placeholder='Blog texte'>{{ old('texte') ? old('texte') : null }}</textarea>
                </div>
              </div>
            </div>
            <div class="form-group mt-3">
              <input type="submit" href="#" class="btn_3 button-contactForm" value="Create">
            </div>
          </form>
        </div>
      </div>
    </div>
    <script>
    </script>
  </section>