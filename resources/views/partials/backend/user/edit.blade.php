<section class="login_part padding_top bannerback">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12 col-md-12">
                <div class="login_part_form">
                    <div class="login_part_form_iner">
                        <h3>User #{{ $edit->id }} Edit</h3>
                            <form class="row contact_form" method="POST" action="/users/{{ $edit->id }}" novalidate="novalidate" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <label for="" class="text-dark">Username :   </label>
                                <div class="col-md-12 form-group p_star">
                                    <input type="text" class="form-control" id="name" name="username" value="{{ old('username') ? old('username') : $edit->username }}"
                                    placeholder="Username">
                                    <x-input-error :messages="$errors->get('username')" class="mt-2 text-danger" />

                                </div>
                                <label for="" class="text-dark">Role :   </label>
                                <div class="col-md-12 form-group p_star gap-5">
                                    <select name="role" id="">
                                        @foreach ($roles as $role)
                                            <option {{ old('role') ? (old('role') == $role->id ? "selected" : null) : ($edit->role_id == $role->id ? "selected" : null)  }} value="{{ $role->id }}">{{ $role->role }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <label for="" class="text-dark">Image URL :   </label>
                                <div class="col-md-12 form-group p_star">
                                    <input type="text" class="form-control" id="name" name="image" 
                                    placeholder="Image URL">
                                    <x-input-error :messages="$errors->get('image')" class="mt-2 text-danger" />

                                </div>
                                <label for="" class="text-dark">Image Upload :   </label>
                                <div class="col-md-12 form-group p_star">
                                    <input type="file" class="form-control" id="name" name="imageFile" 
                                    placeholder="Image">
                                    <x-input-error :messages="$errors->get('imageFile')" class="mt-2 text-danger" />

                                </div>
                                <label for="" class="text-dark">Email :   </label>
                                <div class="col-md-12 form-group p_star">
                                    <input type="text" class="form-control" id="email" name="email" value="{{ old('email') ? old('email') : $edit->email }}"
                                    placeholder="Email">
                                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-danger" />
                                        <input type="hidden" name="id" value="{{ $edit->id }}">
                                </div>
                                <div class="col-md-12 form-group">
                                    <button type="submit" value="submit" class="btn_3">
                                        Update
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section> 