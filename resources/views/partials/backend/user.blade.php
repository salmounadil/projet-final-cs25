<section class="cart_area padding_top bannerback">
    <div class="container">
        <div class="cart_inner">
            <div class="table-responsive">
                <table class="table bg-white tableau ">
                    <thead>
                        <h1 class="text-center bg-white p-3">Users</h1>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Image</th>
                            <th scope="col">Username</th>
                            <th scope="col">Email</th>
                            <th scope="col">Role</th>
                            <th scope="col">Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>
                                    <h5>{{ $user->id }}</h5>
                                </td>
                                <td>
                                    <div class="media">
                                        <div class="d-flex">
                                            @if ($user->image)
                                                <img src="{{ asset('storage/users/' . $user->image) }}" alt="">
                                            @endif
                                            @if ($user->imageFile)
                                                <img src="{{ asset('storage/users/' . $user->imageFile) }}"
                                                    alt="">
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
                                <td>
                                    @can('user-edit', $user)
                                        <a href="/users/{{ $user->id }}/edit" class="btn btn-warning">Edit</a>
                                    @endcan
                                </td>
                                <td>
                                    @can('user-edit', $user)
                                        <form action="/users/{{ $user->id }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="id" value="{{ $user->id }}">
                                            <button type="submit" class="btn btn-danger">Delete</button>
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
