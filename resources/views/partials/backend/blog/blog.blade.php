<section class="cart_area padding_top bannerback">
    <div class="container">
        <div class="cart_inner">
            <div class="table-responsive">
                <table class="table bg-white tableau">
                    <thead>
                        <h1 class="text-center bg-white p-3">All Blogs</h1>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Image</th>
                            <th scope="col">Titre</th>
                            <th scope="col">Posté par</th>
                            <th scope="col">Role</th>
                            <th scope="col">Confirmer</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Supprimer</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($blogs->where('confirmation', false) as $blog)
                        <tr>
                            <td>
                                <h5>{{ $blog->id }}</h5>
                            </td>
                            <td>
                                <div class="product_count">
                                    <img
                                    src="{{ $blog->image ? asset('storage/recentPost/' . $blog->image) : asset('storage/recentPost/' . $blog->imageFile) }}">
                                </div>
                            </td>
                            <td>
                                <p>{{ $blog->titre }}</p>
                            </td>
                            <td>
                                <p>{{ $blog->user->username }}</p>
                            </td>
                            <td>{{ $blog->user->role->role }}</td>
                            <td>
                                    @can('blog-confirm')
                                    <form action="/backoffice/blog/confirm/{{ $blog->id }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-success">Confimer</button>
                                    </form>
                                    @endcan
                                </td>
                                <td>
                                    @can('blog-redac',$blog)
                                    <a href="/blog/{{ $blog->id }}/edit" class="btn btn-warning">Edit</a>
                                    @endcan
                                </td>
                                <td>
                                    @can('blog-redac',$blog)
                                    <form action="/blog/{{ $blog->id }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn bg-danger text-white">Supprimer</button>
                                    </form>
                                    @endcan
                                </td>
                            </tr>
                            @endforeach
                        @foreach ($blogs->where('confirmation', true) as $blog)
                            <tr>
                                <td>
                                    <h5>{{ $blog->id }}</h5>
                                </td>
                                <td>
                                    <div class="product_count">
                                        <img
                                            src="{{ $blog->image ? asset('storage/recentPost/' . $blog->image) : asset('storage/recentPost/' . $blog->imageFile) }}">
                                    </div>
                                </td>
                                <td>
                                    <p>{{ $blog->titre }}</p>
                                </td>
                                <td>
                                    <p>{{ $blog->user->username }}</p>
                                </td>
                                <td>{{ $blog->user->role->role }}</td>
                                @can('blog-confirm')
                                <td><p class="pl-3 text-success">Confirmé</p></td>
                                @endcan
                                <td>
                                    @can('blog-redac',$blog)
                                    <a href="/blog/{{ $blog->id }}/edit" class="btn btn-warning">Edit</a>
                                    @endcan
                                </td>
                                <td>
                                    @can('blog-redac', $blog)
                                      <form action="/blog/{{ $blog->id }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn bg-danger text-white">Supprimer</button>
                                    </form>  
                                    @endcan
                                    
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
