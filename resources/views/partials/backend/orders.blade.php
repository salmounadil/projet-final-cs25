<section class="cart_area padding_top bannerback">
    <div class="container">
        <div class="cart_inner">
            <div class="table-responsive">
                <table class="table bg-white tableau">
                    <thead>
                        <h1 class="text-center bg-white p-3">Orders</h1>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Email</th>
                            <th scope="col">Total</th>
                            <th scope="col">Validate</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                                                            <tr>
                                    <td>
                                        <h5>{{ $order->id }}</h5>
                                    </td>
                                    <td>
                                        <div class="product_count">
                                            {{-- <span class="input-number-decrement"> <i class="ti-angle-down"></i></span> --}}
                                            <p>{{ $order->email }}</p>
                                            {{-- <span class="input-number-increment"> <i class="ti-angle-up"></i></span> --}}
                                        </div>
                                    </td>
                                    <td>
                                        <h5>${{ $order->total }}</h5>
                                    </td>
                                    <td>
                                        @if ($order->confirmé)
                                        <p class="pl-3 text-success">Validé</p>
                                        @else
                                        <form action="/orders/validate/{{ $order->id }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn bg-success text-white" value="Ouvrir">Valider</button>
                                        </form>
                                        @endif
                                        
                                    </td>
                                    <td>
                                    @if ($order->confirmé)
                                        <form action="/order/delete/{{ $order->id }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn bg-danger text-white" >Supprimer</button>
                                        </form>
                                        @else
                                        <p class="pl-3 text-danger">Non validé</p>
                                            
                                        
                                        @endif
                                    </td>
                                    
                                </tr>
                       

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
