<section class="cart_area padding_top">
<div class="container">
    <div class="cart_inner">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Image</th>
                        <th scope="col">Username</th>
                        <th scope="col">Email</th>
                        <th scope="col">Role</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>
                                <div class="media">
                                    <div class="d-flex">
                                        @if ($user->image)
                                        <img src="{{ asset('storage/'.$user->image) }}" alt="">
                                        @endif
                                        @if ($user->imageFile)
                                        <img src="{{ asset('storage/'.$user->imageFile) }}" alt="">
                                        @endif
                                    </div>
                                </div>
                            </td>
                            <td>
                                <h5>{{ $user->username }}</h5>
                            </td>
                            <td>
                                <div class="product_count">
                                    {{-- <span class="input-number-decrement"> <i class="ti-angle-down"></i></span> --}}
                                    <p>{{ $user->email }}</p>
                                    {{-- <span class="input-number-increment"> <i class="ti-angle-up"></i></span> --}}
                                </div>
                            </td>
                            <td>
                                <h5>{{ $user->role->role }}</h5>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
</section>
