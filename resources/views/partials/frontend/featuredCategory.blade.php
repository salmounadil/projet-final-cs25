<section class="feature_part padding_top">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section_tittle text-center">
                    <h2>Featured Category</h2>
                </div>
            </div>
        </div>
        <div class="row align-items-center justify-content-between">
            <div class="col-lg-7 col-sm-6">
                <div class="single_feature_post_text">
                    <p>Premium Quality</p>
                    <h3>{{ $produits[$produits->count()-1]->nom}}</h3>
                    <a href="/produit/{{$produits[$produits->count()-1]->id}}" class="feature_btn">EXPLORE NOW <i class="fas fa-play"></i></a>                    <img src="img/feature1/{{ $produits[$produits->count()-1]->image}}.png" alt="">                </div>
            </div>
            <div class="col-lg-5 col-sm-6">
                <div class="single_feature_post_text">
                    <p>Premium Quality</p>
                    <h3>{{ $produits[$produits->count()-2]->nom}}</h3>
                    <a href="/produit/{{$produits[$produits->count()-2]->id}}" class="feature_btn">EXPLORE NOW <i class="fas fa-play"></i></a>                    <img src="img/feature2/{{ $produits[$produits->count()-2]->image}}.png" alt="">                </div>
            </div>
            <div class="col-lg-5 col-sm-6">
                <div class="single_feature_post_text">
                    <p>Premium Quality</p>
                    <h3>{{ $produits[$produits->count()-3]->nom}}</h3>
                    <a href="/produit/{{$produits[$produits->count()-3]->id}}" class="feature_btn">EXPLORE NOW <i class="fas fa-play"></i></a>                    <img src="img/feature2/{{ $produits[$produits->count()-3]->image}}.png" alt="">                </div>
            </div>
            <div class="col-lg-7 col-sm-6">
                <div class="single_feature_post_text">
                    <p>Premium Quality</p>
                    <h3>{{ $produits[$produits->count()-4]->nom}}</h3>
                    <a href="/produit/{{$produits[$produits->count()-4]->id}}" class="feature_btn">EXPLORE NOW <i class="fas fa-play"></i></a>
                    <img src="img/feature1/{{ $produits[$produits->count()-4]->image}}.png" alt="">
                </div>
            </div>
        </div>
    </div>
</section>