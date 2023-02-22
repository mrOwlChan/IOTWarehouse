<div class="row mb-1">
    <div class="col-md-12 text-center">
        <p style="font-family:Verdana, Geneva, Tahoma, sans-serif"><strong>Company Profile</strong></p>
    </div>
</div>
<div class="row">
    {{-- Kolom Kiri --}}
    <div class="col-md-5 pl-3">
        {{-- Upload Foto --}}
        <div class="my-5">
            @if ($user->company->logo == '')
                <img type="button" class=" img-fluid rounded mr-n5 my-n5"  src="{{ asset('assets/AdminLTE/dist/img/icons/company_icon.png') }}" style="width:135px; height: 135px" data-toggle="modal" data-target="#editCompanyLogo">
            @else
                <img type="button" class=" img-fluid rounded mr-n5 my-n5"  src="{{ asset('storage/' . $user->company->logo) }}" style="width:135px; height: 135px" data-toggle="modal" data-target="#editCompanyLogo">
            @endif{{-- /.upload foto --}}
        </div>
        <strong><i class="far fa-building mr-1 mt-5"></i> Company Name</strong>
        <p class="text-muted">
            <span>
                @if ($user->company->id == 1)
                    <span>
                        <a href="" type="button" class="text-danger" data-toggle="modal" data-target="#editEmployment">
                            {{ $user->company->name }}
                            <i class="fas fa-exclamation-circle ml-1"></i>   
                        </a>
                    </span>
                @else
                    {{ $user->company->name}}
                @endif
            </span>
        </p>

        <strong><i class="fas fa-hand-holding-usd mr-1"></i> Business Sector</strong>
        <p class="text-muted">
            <span>
                @if ($user->company->comp_sector->id == 1)
                    <span>
                        <a href="" type="button" class="text-danger" data-toggle="modal" data-target="#editEmployment">
                            {{ $user->company->comp_sector->name }}
                            <i class="fas fa-exclamation-circle ml-1"></i>   
                        </a>
                    </span>
                @else
                    {{ $user->company->comp_sector->name }}
                @endif
            </span>
        </p>

        <strong><i class="fas fa-phone-square-alt mr-1"></i> Phone</strong>
        <p class="text-muted text-danger">
            <span>
                @if ($user->company->id == 1)
                    <span>
                        <a href="" type="button" class="text-danger" data-toggle="modal" data-target="#editEmployment">
                            {{ $user->company->phone }}
                            <i class="fas fa-exclamation-circle ml-1"></i>   
                        </a>
                    </span>
                @else
                    {{ $user->company->phone }}
                @endif
            </span>
        </p>

    </div>{{-- /.kolom kiri --}}
   
    <div class="col-md-1 mr-3" style="border-right: 1px grey solid"></div>
    
    {{-- Kolom Kanan --}}
    <div class="col-md-5">
        <strong><i class="fas fa-envelope mr-1"></i> Email</strong>
        <p class="text-muted text-danger">
            <span>
                @if ($user->company->id == 1)
                    <span>
                        <a href="" type="button" class="text-danger" data-toggle="modal" data-target="#editEmployment">
                            {{ $user->company->email }}
                            <i class="fas fa-exclamation-circle ml-1"></i>   
                        </a>
                    </span>
                @else
                    {{ $user->company->email1 }}
                @endif
            </span>
        </p>

        <strong><i class="fas fa-map-marked-alt mr-1"></i> Province / City</strong>
        <p class="text-muted text-danger">
            <span>
                @if ($user->company->city->province->id == 1)
                    <span>
                        <a href="" type="button" class="text-danger" data-toggle="modal" data-target="#editEmployment">
                            {{ $user->company->city->province->name }}
                            <i class="fas fa-exclamation-circle ml-1"></i>   
                        </a>
                    </span>
                @else
                    {{ $user->company->city->province->name }}
                @endif
            </span>
            <span> / </span>
            <span>
                @if ( $user->company->city->id == 1 )
                    <span>
                        <a href="" class="text-danger" data-toggle="modal" data-target="#editEmployment">
                            {{ $user->company->city->name }}
                            <i class="fas fa-exclamation-circle ml-1"></i>   
                        </a>
                    </span>
                @else
                    {{ $user->company->city->type }} {{ $user->company->city->name }} 
                @endif
            </span>
        </p>

        <strong><i class="fas fa-map-marked-alt mr-1"></i> Subdistrict / Urban Village</strong>
        <p class="text-muted text-danger">
            <span>
                @if ( $user->company->subdistrict->id == 1 )
                    <span>
                        <a href="" type="button" class="text-danger" data-toggle="modal" data-target="#editEmployment">
                            {{ $user->company->subdistrict->name }}
                            <i class="fas fa-exclamation-circle ml-1"></i>   
                        </a>
                    </span>
                @else
                    {{ $user->company->subdistrict->name }}
                @endif
            </span>
            <span> / </span>
            <span>
                @if ( $user->company->subdistrict->id == 1 )
                    <span>
                        <a href="" class="text-danger" data-toggle="modal" data-target="#editEmployment">
                            {{ $user->company->subdistrict->name }}
                            <i class="fas fa-exclamation-circle ml-1"></i>   
                        </a>
                    </span>
                @else
                    {{ $user->company->subdistrict->name }}
                @endif
            </span>
        </p>

        <strong><i class="fas fa-mail-bulk mr-1"></i> Postal Code</strong>
        <p class="text-muted text-danger">
            @if ($user->company->urban_village->id == 1)
                <span>
                    <a href=""  class="text-danger" data-toggle="modal" data-target="#editEmployment">
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
            @if ($user->company->address_street == '')
                <span>
                    <a href=""  class="text-danger" data-toggle="modal" data-target="#editEmployment">
                        Settle address street not yet have filled
                        <i class="fas fa-exclamation-circle ml-1"></i>   
                    </a>
                </span>
            @else
                {{ $user->company->address_street}}
            @endif
        </p>

    </div>{{-- /.kolom kanan --}}
</div>

{{-- Edit Button --}}
{{-- <div class="row mt-3">
    <div class="col-md-12 text-right" >
        <button class="btn btn-warning btn-sm" type="button" data-toggle="modal" data-target="#editEmployment"><i class="fas fa-user-edit fa-sm mr-1"></i> Edit</button>
    </div>
</div> --}}

{{-- Modal Edit Employment  --}}
<div class="modal fade" id="editEmployment" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-user-edit mr-1"></i>Edit Profile Confirmation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/myprofile/{{ $user->id }}/employment/edit" method="post">
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

<!-- Modal Edit Photo Profile Perusahaan-->
<div class="modal fade" id="editCompanyLogo" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-camera-retro mr-1"></i>Company Photo Profile</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/myprofile/{{ $user->id }}/companyLogo" method="post" enctype="multipart/form-data">
                @method('patch')
                @csrf
                <div class="modal-body">  
                    <div class="row mb-3">
                        <div class="col-md-12 text-center">
                            @if ($user->company->logo == '')
                                <img  class="profile-user-img img-fluid img-circle logo-preview" src="{{ asset('assets/AdminLTE/dist/img/icons/company_icon.png') }}" style="width:250px;height:250px">
                            @else
                                {{-- Photo sebelumnya --}}
                                <input class="form-control" type="hidden" value="{{ $user->company->logo }}" name='prevCompanyLogo' id='prevCompanyLogo'>
                                
                                {{-- Photo yang diupload untuk diedit  --}}
                                <img class="profile-user-img img-fluid img-circle log-preview" src="{{ asset('storage/'. $user->company->logo) }}" style="width:250px;height:250px">
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-8 p-1">
                                <span class="text-primary">
                                    <i class="fas fa-info-circle"></i> Info:
                                </span>
                                <ul style="font-size:14px">
                                    <li>Upload Photo ukuran 160x160</li>
                                    <li>Pilihlah Photo yang baik dan sopan</li>
                                </ul>
                            </div>
                        </div>
                    </div>
            
                    <div class="row">
                        <div class="col-md-6 offset-md-3">
                            <div class="form-group text-center">
                                <label for="inputPhoto" style="font-size:12px"><i class="fas fa-camera"></i> Photo 160x160p </label>
                                <input type="file" class="form-control-file form-control-sm" name="photo" id="companyLogo" onchange="previewLogo()">
                            </div>
                        </div>      
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success btn-sm"><i class="fas fa-file-upload mr-1"></i>Upload</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    // Preview photo sebelum di-Submit di Modal Edit Photo Profile
    function previewLogo(){
        const logo = document.querySelector("#companyLogo");
        const logoPreview = document.querySelector('.logo-preview');

        logoPreview.style.display ='block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(logo.files[0]);

        oFReader.onload = function(oFREvent){
            logoPreview.src = oFREvent.target.result;
        }
    }
</script> 