<section class="cart_area padding_top bannerback">
    <div class="container">
        <div class="cart_inner">
            <div class="table-responsive">
                <table class="table bg-white tableau">
                    <thead>
                        <div class="d-flex justify-content-center py-3"><a class="btn btn-primary" href="/color/create">New Product Color</a></div>
                        <h1 class="text-center bg-white p-3">Products Colors</h1>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Color</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($couleurs as $cat)
                            <tr>
                                <td>
                                    <h5>{{ $cat->id }}</h5>
                                </td>
                                <td>
                                    <p>{{ $cat->couleur  }}</p>
                                </td>
                                <td>
                                    <form action="/color/{{ $cat->id }}" method="POST">
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
