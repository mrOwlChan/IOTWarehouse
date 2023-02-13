<div class="row mb-1">
    <div class="col-md-12 text-center">
        <p style="font-family:Verdana, Geneva, Tahoma, sans-serif"><strong>Profil Perusahaan</strong></p>
    </div>
</div>
<div class="row">
    {{-- Kolom Kiri --}}
    <div class="col-md-5 pl-3">
        <strong><i class="far fa-building mr-1"></i> Company Name</strong>
        <p class="text-muted">
            {{-- {{  }} --}}
        </p>

        <strong><i class="fas fa-hand-holding-usd mr-1"></i> Business Sector</strong>
        <p class="text-muted">
            {{-- {{  }} --}}
        </p>

        <strong><i class="fas fa-phone-square-alt mr-1"></i> Company Phone</strong>
        <p class="text-muted text-danger">
            @if ($user->phone == '')
                <span>
                    <a href="" type="button" class="text-danger" data-toggle="modal" data-target="#editBiodata">
                        Nomor telepon belum terisi
                        <i class="fas fa-exclamation-circle ml-1"></i>   
                    </a>
                </span>
            @else
                {{-- {{  }} --}}
            @endif
        </p>

        <strong><i class="fas fa-envelope mr-1"></i> Company Email</strong>
        <p class="text-muted text-danger">
            @if ($user->phone == '')
                <span>
                    <a href="" type="button" class="text-danger" data-toggle="modal" data-target="#editBiodata">
                        Email belum terisi
                        <i class="fas fa-exclamation-circle ml-1"></i>   
                    </a>
                </span>
            @else
                {{-- {{  }} --}}
            @endif
        </p>

    </div>{{-- /.kolom kiri --}}
   
    <div class="col-md-1 mr-3" style="border-right: 1px grey solid"></div>
    
    {{-- Kolom Kanan --}}
    <div class="col-md-5">
        <strong><i class="fas fa-map-marked-alt mr-1"></i> Province / District</strong>
        <p class="text-muted text-danger">
            <span>
                @if ($user->birth_city == '')
                    <span>
                        <a href="" type="button" class="text-danger" data-toggle="modal" data-target="#editBiodata">
                            Provinsi tempat tinggal belum terisi
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
                            Kota tempat tinggal belum terisi
                            <i class="fas fa-exclamation-circle ml-1"></i>   
                        </a>
                    </span>
                @else
                {{ $user->city->type }} {{ $user->city->name}} 
                @endif
            </span>
        </p>

        <strong><i class="fas fa-map-marked-alt mr-1"></i> Subdistrict / Urban Village</strong>
        <p class="text-muted text-danger">
            <span>
                @if ($user->birth_city == '')
                    <span>
                        <a href="" type="button" class="text-danger" data-toggle="modal" data-target="#editBiodata">
                            Subdistrict tempat tinggal belum terisi
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
                            Urban Villages tempat tinggal belum terisi
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
                        Postal belum terisi
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
                        Alamat Jalan Tempat tinggal belum terisi
                        <i class="fas fa-exclamation-circle ml-1"></i>   
                    </a>
                </span>
            @else
                {{ $user->address_street}}
            @endif
        </p>

    </div>{{-- /.kolom kanan --}}
</div>