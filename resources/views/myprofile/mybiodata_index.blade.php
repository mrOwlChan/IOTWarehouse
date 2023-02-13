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
        <strong><i class="fas fa-map-marked-alt mr-1"></i> Settle Province / District</strong>
        <p class="text-muted text-danger">
            <span>
                @if ($user->birth_city == '')
                    <span>
                        <a href="" type="button" class="text-danger" data-toggle="modal" data-target="#editBiodata">
                            Settle province not yet have filled
                            <i class="fas fa-exclamation-circle ml-1"></i>   
                        </a>
                    </span>
                @else
                    {{ $user->city->province->name}}
                @endif
            </span>
            <span> / </span>
            <span>
                @if ($user->birth_date == '')
                    <span>
                        <a href="" class="text-danger" data-toggle="modal" data-target="#editBiodata">
                            Settle City not yet have filled
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
                @if ($user->birth_city == '')
                    <span>
                        <a href="" type="button" class="text-danger" data-toggle="modal" data-target="#editBiodata">
                            Settle subdistrict not yet have filled
                            <i class="fas fa-exclamation-circle ml-1"></i>   
                        </a>
                    </span>
                @else
                    {{ $user->subdistrict->name}}
                @endif
            </span>
            <span> / </span>
            <span>
                @if ($user->birth_date == '')
                    <span>
                        <a href="" class="text-danger" data-toggle="modal" data-target="#editBiodata">
                            Settle urban villages not yet have filled
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
            @if ($user->birth_city == '')
                <span>
                    <a href=""  class="text-danger" data-toggle="modal" data-target="#editBiodata">
                        Postal not yet have filled
                        <i class="fas fa-exclamation-circle ml-1"></i>   
                    </a>
                </span>
            @else
                {{ $user->urban_village->urban_village_code }}
            @endif
        </p>

        <strong><i class="fas fa-map-marked-alt mr-1"></i> Address Street</strong>
        <p class="text-muted text-danger">
            @if ($user->birth_city == '')
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

<script>
    // Preview photo sebelum di-Submit di Modal Edit Photo Profile
    function previewImage(){
        const image = document.querySelector("#photo");
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display ='block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent){
            imgPreview.src = oFREvent.target.result;
        }
    }

    // preview password
    $(document).ready(function(){
        $('.seePasswordButton').on("click", function(){
            // Dapatkan nilai attribute elemet dengan selector '#password'
            var seePassword = document.querySelector('.seePassword');
            var seePasswordButton = document.querySelector('.seePasswordButton');
            var typeInput = seePassword.getAttribute("type");
            
            // Tambahkan item class active sebagai indikator tombol telah diklik
            // seePasswordButton.classList.toggle('active');

            // Jika nilainya adalah 'password', maka rubah menjadi 'text'
            if(typeInput == 'password'){
                $('.seePassword').attr('type', 'text');
                seePasswordButton.style.backgroundColor = 'salmon';
            }

            // Jika nilainya adalah 'password', maka rubah menjadi 'text'
            if(typeInput == 'text'){
                $('.seePassword').attr('type', 'password');
                seePasswordButton.style.backgroundColor = 'transparent';
            }
        });
    });
</script>