<section class="cart_area padding_top bannerback">
    <div class="container">
        <div class="cart_inner">
            <div class="table-responsive">
                <table class="table bg-white tableau">
                    <thead>
                        <div class="d-flex justify-content-center py-3"><a class="btn btn-primary" href="/tag/create">New Tag</a></div>
                        <h1 class="text-center bg-white p-3">Tags</h1>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">name</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tags as $tag)
                            <tr>
                                <td>
                                    <h5>{{ $tag->id }}</h5>
                                </td>
                                <td>
                                    {{-- <span class="input-number-decrement"> <i class="ti-angle-down"></i></span> --}}
                                    <p>{{ $tag->tag }}</p>
                                    {{-- <span class="input-number-increment"> <i class="ti-angle-up"></i></span> --}}
                                </td>
                                <td>
                                    <form action="/tag/{{ $tag->id }}" method="POST">
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
