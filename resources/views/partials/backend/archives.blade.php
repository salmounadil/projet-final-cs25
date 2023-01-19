<section class="cart_area padding_top bannerback">
    <div class="container">
        <div class="cart_inner">
            <div class="table-responsive">
                <table class="table bg-white tableau">
                    <thead>
                        <h1 class="text-center bg-white p-3">Archives Mails</h1>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Sujet</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($contacts as $contact)
                        @if ($contact->archive)
                            <tr id="contact" class="{{ $contact->vu ? 'bg-white' : 'bg-secondary text-white' }}">
                                    <td>
                                        <h5 class="{{ $contact->vu ? '' : ' text-white' }}">{{ $contact->nom }}</h5>
                                    </td>
                                    <td>
                                        <div class="product_count">
                                            {{-- <span class="input-number-decrement"> <i class="ti-angle-down"></i></span> --}}
                                            <p class="{{ $contact->vu ? '' : ' text-white' }}">{{ $contact->email }}</p>
                                            {{-- <span class="input-number-increment"> <i class="ti-angle-up"></i></span> --}}
                                        </div>
                                    </td>
                                    <td>
                                        <h5 class="{{ $contact->vu ? '' : ' text-white' }}">{{ $contact->sujet }}</h5>
                                    </td>
                                    <td>
                                        <form action="/contact/{{ $contact->id }}" method="GET">
                                            <button type="submit" class="btn bg-success text-white" value="Ouvrir">Ouvrir</button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="/contact/{{ $contact->id }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn bg-danger text-white" value="Ouvrir">Supprimer</button>
                                        </form>
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
