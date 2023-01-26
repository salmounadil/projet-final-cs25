<section class="cart_area padding_top bannerback">
    <div class="container">
        <div class="cart_inner">
            <div class="table-responsive">
                <table class="table bg-white tableau">
                    <thead>
                        <div class="d-flex justify-content-center py-3"><a class="btn btn-primary" href="/coupon/create">New Coupon</a></div>
                        <h1 class="text-center bg-white p-3">Coupons</h1>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Name</th>
                            <th scope="col">Réduction</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($coupons as $coupon)
                            <tr>
                                <td>
                                    <h5>{{ $coupon->id }}</h5>
                                </td>
                                <td>
                                    {{-- <span class="input-number-decrement"> <i class="ti-angle-down"></i></span> --}}
                                    <p>{{ $coupon->nom }}</p>
                                    {{-- <span class="input-number-increment"> <i class="ti-angle-up"></i></span> --}}
                                </td>
                                <td>
                                    <p>
                                        @if ($coupon->réduction>0)
                                            +{{ $coupon->réduction }}%
                                            @else
                                            {{ $coupon->réduction }}%
                                        @endif
                                    </p>
                                </td>
                                <td>
                                    <form action="/coupon/{{ $coupon->id }}" method="POST">
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
