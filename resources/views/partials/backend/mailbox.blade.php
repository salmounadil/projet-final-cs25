<section class="cart_area padding_top">
    <h1 class="text-center pb-5 mb-5">Contacts Mails</h1>
    <div class="container">
        <div class="cart_inner">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Sujet</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($contacts as $contact)
                                <tr id="contact" class="{{ $contact->vu ? '' : 'bg-secondary text-white' }}">
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
                                        <form action="contact/{{ $contact->id }}" method="POST">
                                            <button type="submit" class="btn bg-warning " value="Ouvrir">Archiver</button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="contact/{{ $contact->id }}" method="POST">
                                            @method('DELETE')
                                            <button type="submit" class="btn bg-danger text-white" value="Ouvrir">Supprimer</button>
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
