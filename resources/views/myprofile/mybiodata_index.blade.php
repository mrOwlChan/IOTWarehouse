<div class="row">
    {{-- Kolom Kiri --}}
    <div class="col-md-5 pl-3">
        <strong><i class="fas fa-user mr-1"></i> Name</strong>
        <p class="text-muted">
            {{ $user->name }}
        </p>

        <strong><i class="fas fa-envelope mr-1"></i> Email</strong>
        <p class="text-muted">
            {{ $user->email }}
        </p>

        <strong><i class="fas fa-phone-square-alt mr-1"></i> Phone</strong>
        <p class="text-muted text-danger">
            @if ($user->phone == '')
                <span>
                    <a href="" type="button" class="text-danger" data-toggle="modal" data-target="#editBiodata">
                        Phone number not yet have filled
                        <i class="fas fa-exclamation-circle ml-1"></i>   
                    </a>
                </span>
            @else
                {{ $user->phone}}
            @endif
        </p>

        <strong><i class="fas fa-map-marked-alt mr-1"></i> Birth City / <i class="fas fa-birthday-cake mx-1"></i> Birth Date</strong>
        <p class="text-muted text-danger">
            <span>
                @if ($user->birth_city == '')
                    <span>
                        <a href="" type="button" class="text-danger" data-toggle="modal" data-target="#editBiodata">
                            Birth city not yet have filled
                            <i class="fas fa-exclamation-circle ml-1"></i>   
                        </a>
                    </span>
                @else
                    {{ $user->birth_city}}
                @endif
            </span>
            <span> / </span>
            <span>
                @if ($user->birth_date == '')
                    <span>
                        <a href="" class="text-danger" data-toggle="modal" data-target="#editBiodata">
                            Birth date not yet have filled
                            <i class="fas fa-exclamation-circle ml-1"></i>   
                        </a>
                    </span>
                @else
                    {{ $user->birth_date->format('d-M-Y')}}
                @endif
            </span>
        </p>
    </div>{{-- /.kolom kiri --}}
   
    <div class="col-md-1 mr-3" style="border-right: 1px grey solid"></div>
    
    {{-- Kolom Kanan --}}
    <div class="col-md-5">
        <strong><i class="fas fa-map-marked-alt mr-1"></i> Settle Province / City</strong>
        <p class="text-muted text-danger">
            <span>
                @if ($user->city->province->id == 1)
                    <span>
                        <a href="" type="button" class="text-danger" data-toggle="modal" data-target="#editBiodata">
                            {{ $user->city->province->name}}
                            <i class="fas fa-exclamation-circle ml-1"></i>   
                        </a>
                    </span>
                @else
                    {{ $user->city->province->name}}
                @endif
            </span>
            <span> / </span>
            <span>
                @if ($user->city->id == 1)
                    <span>
                        <a href="" class="text-danger" data-toggle="modal" data-target="#editBiodata">
                            {{ $user->city->name}} 
                            <i class="fas fa-exclamation-circle ml-1"></i>   
                        </a>
                    </span>
                @else
                {{ $user->city->type }} {{ $user->city->name}} 
                @endif
            </span>
        </p>

        <strong><i class="fas fa-map-marked-alt mr-1"></i> Settle Subdistrict / Urban Village</strong>
        <p class="text-muted text-danger">
            <span>
                @if ( $user->subdistrict->id == 1 )
                    <span>
                        <a href="" type="button" class="text-danger" data-toggle="modal" data-target="#editBiodata">
                            {{ $user->subdistrict->name}}
                            <i class="fas fa-exclamation-circle ml-1"></i>   
                        </a>
                    </span>
                @else
                    {{ $user->subdistrict->name}}
                @endif
            </span>
            <span> / </span>
            <span>
                @if ($user->urban_village->id == 1)
                    <span>
                        <a href="" class="text-danger" data-toggle="modal" data-target="#editBiodata">
                            {{ $user->urban_village->name }}
                            <i class="fas fa-exclamation-circle ml-1"></i>   
                        </a>
                    </span>
                @else
                {{ $user->urban_village->name }}
                @endif
            </span>
        </p>

        <strong><i class="fas fa-mail-bulk mr-1"></i> Postal Code</strong>
        <p class="text-muted text-danger">
            @if ( $user->urban_village->id == 1 )
                <span>
                    <a href=""  class="text-danger" data-toggle="modal" data-target="#editBiodata">
                        {{ $user->urban_village->urban_village_code }}
                        <i class="fas fa-exclamation-circle ml-1"></i>   
                    </a>
                </span>
            @else
                {{ $user->urban_village->urban_village_code }}
            @endif
        </p>

        <strong><i class="fas fa-map-marked-alt mr-1"></i> Address Street</strong>
        <p class="text-muted text-danger">
            @if ($user->address_street == '')
                <span>
                    <a href=""  class="text-danger" data-toggle="modal" data-target="#editBiodata">
                        Settle address street not yet have filled
                        <i class="fas fa-exclamation-circle ml-1"></i>   
                    </a>
                </span>
            @else
                {{ $user->address_street}}
            @endif
        </p>

    </div>{{-- /.kolom kanan --}}
</div>

{{-- Edit Button --}}
<div class="row mt-5">
    <div class="col-md-12 text-right" >
        <button class="btn btn-warning btn-sm" type="button" data-toggle="modal" data-target="#editBiodata"><i class="fas fa-user-edit fa-sm mr-1"></i> Edit</button>
    </div>
</div>

{{-- Modal Edit Biodata --}}
<div class="modal fade" id="editBiodata" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-user-edit mr-1"></i>Edit Profile Confirmation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/myaccount/myprofile/{{ $user->id }}/edit" method="post">
                @method('post')
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <p>
                                Password user dibutuhkan untuk melanjutkan ke form edit biodata profile untuk mengubah atau melengkapi data Anda.
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-7 offset-md-3">
                            <label for="level"><i class="fas fa-key"></i> Password</label>
                            <div class="form-group input-group">
                                <input type="password" class="form-control form-control-sm seePassword" name="passwordEditProfile">
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-outline-primary btn-sm seePasswordButton"><i class="fas fa-eye"></i></button>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="far fa-window-close mr-1"></i>Cancel</button>
                    <button type="submit" class="btn btn-warning btn-sm"><i class="fas fa-edit mr-1"></i>Edit</button>
                </div>
            </form>
        </div>
    </div>
</div>





