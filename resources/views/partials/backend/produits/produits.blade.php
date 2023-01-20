<section class="cart_area padding_top bannerback">
    <div class="container">
        <div class="cart_inner">
            <div class="table-responsive">
                <table class="table bg-white tableau">
                    <thead>
                        <h1 class="text-center bg-white p-3">All Products</h1>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Image</th>
                            <th scope="col">Name</th>
                            <th scope="col">Prix</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($produits as $produit)
                       
                            
   <tr>
                                    <td>
                                        <h5>{{ $produit->id }}</h5>
                                    </td>
                                    <td>
                                        <div class="product_count">
                                            <img src="{{ $produit->image ?  asset('storage/panier/' . $produit->image) : asset('storage/panier/' . $produit->imageFile) }}">
                                        </div>
                                    </td>
                                    <td>
                                        
                                        <p >{{ $produit->nom }}</p>
                                     
                                    </td>
                                    <td>
                                        <p >{{ $produit->prix }}</p>
                                    </td>
                                    <td><a href="/produit/{{ $produit->id }}/edit" class="btn btn-warning">Edit</a></td>
                                    <td>
                                        <form action="/produit/{{ $produit->id }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn bg-danger text-white">Supprimer</button>
                                        </form>
                                    </td>
                                
                                    
                                </tr>




                        @endforeach
                     
                       

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<section class="pb-5 cart_area padding_top bannerback" id="likedProducts">
    <div class="container">
        <div class="cart_inner">
            <div class="table-responsive">
                <table class="table bg-white tableau">
                    <thead>
                        <h1 class="text-center bg-white p-3">Liked Products</h1>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Image</th>
                            <th scope="col">Name</th>
                            <th scope="col">Prix</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($produits as $produit)
                        @if ($produit->users->count()> 0)
                            
   <tr>
                                    <td>
                                        <h5>{{ $produit->id }}</h5>
                                    </td>
                                    <td>
                                        <div class="product_count">
                                            <img src="{{ $produit->image ?  asset('storage/panier/' . $produit->image) : asset('storage/panier/' . $produit->imageFile) }}">
                                        </div>
                                    </td>
                                    <td>
                                        
                                        <p >{{ $produit->nom }}</p>
                                     
                                    </td>
                                    <td>
                                        <p >{{ $produit->prix }}</p>
                                    </td>
                                    
                                </tr>


                        @endif


                        @endforeach
                     
                       

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
