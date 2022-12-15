@extends('templates.mainNavbar')

{{-- Tambahan Link Library ke lain (umumnya css atau javascript library)--}}
@section('libsOnHeader')
@endsection

@section('contentHeader')
    <div class="container-fluid">
        <div class="row mx-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Edit My Biodata</h1>
            </div>
            <div class="col-sm-6 pb-0">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/dashboard"><i class="fas fa-undo mr-1"></i>Back</a></li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
@endsection

@section('mainContent')
    <!-- Main row -->
    {{-- Jika pada session ada message 'success' dari proses update profile di ProfileController::update()  --}}
    @if (session()->has('success'))
        <div class="row mx-2">
            <div class="col-md-6">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    @endif

    <div class="row mx-2 mt-5">
        <section class="col-lg-11 connectedSortable">
            <div class="card">
                @if ($user->photo == '')
                    <img type="button" class="profile-user-img img-fluid img-circle float-right mr-n5 my-n5"  src="{{ asset('assets/AdminLTE/dist/img/icons/user-icon-avatar.jpg') }}" style="width:100px; height: 100px" data-toggle="modal" data-target="#editPhoto">
                @else
                    <img type="button" class="profile-user-img img-fluid img-circle float-right mr-n5 my-n5"  src="{{ asset('storage/' . $user->photo) }}" style="width:100px; height: 100px" data-toggle="modal" data-target="#editPhoto">
                @endif
                <div class="card-body">
                    <div class="active tab-pane" id="biodata">
                        <form action="/myprofile/{{ $user->id }}/biodata" method="post">
                            <div class="row">
                                @csrf
                                @method('patch')

                                {{-- Kolom Kiri --}}
                                <div class="col-md-5 pl-3">
                                    <div class="row mb-4">
                                        <div class="col-md-12">
                                            <strong><i class="fas fa-user mr-1"></i> Name</strong>
                                            <input type="text" class="form-control form-control-sm mt-1 @error('name') is-invalid @enderror" placeholder="{{ $user->email }}" name="name" id="name" value="{{ $user->name, old('name') }}">
                                        </div>
                                    </div>

                                    <div class="row mb-4">
                                        <div class="col-md-12">
                                            <strong><i class="fas fa-envelope mr-1"></i> Email</strong>
                                            <input type="email" class="form-control form-control-sm mt-1 @error('email') is-invalid @enderror" placeholder="{{ $user->email }}" name="email" id="email" value="{{ $user->email, old('email') }}">
                                        </div>
                                    </div>

                                    <div class="row mb-4">
                                        <div class="col-md-12">
                                            <strong><i class="fas fa-phone-square-alt mr-1"></i> Phone</strong>
                                            <input type="text" class="form-control form-control-sm mt-1 @error('phone') is-invalid @enderror" placeholder="{{ $user->phone }}" name="phone" id="phone" value="{{ $user->phone, old('phone') }}">
                                        </div>
                                    </div>
                            
                                    <div class="row mb-4">
                                        <div class="col-md-6">
                                            <strong><i class="fas fa-birthday-cake mr-1"></i> Birth Date</strong>
                                            <input type="date" class="form-control form-control-sm mt-1 @error('birth_date') is-invalid @enderror" placeholder="{{ $user->birth_date }}" name="birth_date" id="birth_date" value="{{ $user->phone, old('birth_date') }}">
                                        </div>
                                        <div class="col-md-6">
                                            <strong><i class="fas fa-map-marked mr-1"></i> Birth City</strong>
                                            <input type="text" class="form-control form-control-sm mt-1 @error('birth_city') is-invalid @enderror" placeholder="{{ $user->birth_city }}" name="birth_city" id="birth_city" value="{{ $user->phone, old('birth_city') }}">
                                        </div>
                                    </div>
    
                                </div>{{-- /.kolom kiri --}}
                                
                                <div class="col-md-1 mr-3" style="border-right: 1px grey solid"></div>
                                
                                {{-- Kolom Kanan --}}
                                <div class="col-md-5">        
                                    <div class="row mb-4">
                                        <div class="col-md-6">
                                            <strong><i class="fas fa-map-marked mr-1"></i> Province Settle</strong>
                                            <div class="input-group">
                                                <select class="custom-select custom-select-sm mt-1" name="province" id="province" value={{ old('province') }}  aria-label="">
                                                    @foreach ($provinces as $province)
                                                        <option value="{{ $province->province_code }}">{{ $province->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <strong><i class="fas fa-map-marked mr-1"></i> City Settle</strong>
                                            <div class="input-group">
                                                <select class="custom-select custom-select-sm mt-1" name="city" id="city" aria-label="">
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-4">
                                        <div class="col-md-6">
                                            <strong><i class="fas fa-map-marked mr-1"></i> Subdistrict</strong>
                                            <div class="input-group">
                                                <input type="text" class="form-control form-control-sm mt-1" name="subdistrict" id="subdistrict" value="{{ old('subdistrict') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <strong><i class="fas fa-map-marked mr-1"></i> Urban Village</strong>
                                            <div class="input-group">
                                                <input type="text" class="form-control form-control-sm mt-1" name="urban_village" id="urban_village" value="{{ old('urban_village') }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-4">
                                        <div class="col-md-6">
                                            <strong><i class="fas fa-mail-bulk mr-1"></i> Postal</strong>
                                            <input type="text" class="form-control form-control-sm mt-1" name="urban_village_postal" id="urban_village_postal" value="{{ old('urban_village_postal') }}">
                                        </div>
                                    </div>

                                    <div class="row mb-4">
                                        <div class="col-md-12">
                                            <strong><i class="fas fa-map-marked mr-1"></i> Address Street</strong>
                                            <textarea class="form-control form-control-sm" id="address_street" name="address_street" rows="3" value="{{ old('address_street') }}"></textarea>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-3 ml-auto">
                                            <button type="reset" class="btn btn-outline-danger btn-sm"><i class="far fa-window-close mr-1"></i>Cancel</button>
                                        </div>
                                        <div class="col-md-3">
                                            <button type="submit" class="btn btn-outline-success btn-sm"><i class="far fa-check-circle mr-1"></i>Submit</button>
                                        </div>
                                    </div>
                                </div>{{-- /.kolom kanan --}}
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- /.row (main row) -->
    
    <!-- Modal Edit Photo Profile-->
    <div class="modal fade" id="editPhoto" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-camera-retro mr-1"></i>Photo Profil</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/myprofile/{{ $user->id }}/photo" method="post" enctype="multipart/form-data">
                    @method('patch')
                    @csrf
                    <div class="modal-body">  
                        <div class="row mb-3">
                            <div class="col-md-12 text-center">
                                @if ($user->photo == '')
                                    <img  class="profile-user-img img-fluid img-circle img-preview" src="{{ asset('assets/AdminLTE/dist/img/icons/user-icon-avatar.jpg') }}" style="width:250px;height:250px">
                                @else
                                    {{-- Photo sebelumnya --}}
                                    <input class="form-control" type="hidden" value="{{ $user->photo }}" name='prevPhoto' id='prevPhoto'>
                                    
                                    {{-- Photo yang diupload untuk diedit  --}}
                                    <img class="profile-user-img img-fluid img-circle img-preview" src="{{ asset('storage/'. $user->photo) }}" style="width:250px;height:250px">
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
                                    <input type="file" class="form-control-file form-control-sm" name="photo" id="photo" onchange="previewImage()">
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

        // Document page telah ter-load sepenuhnya
        $(document).ready(function(){
            // Jika value #province berubah
            $('#province').change(function(){
                // Cek data city berdasarkan province yang telah dipilih  
                $.ajax({
                    url         : '/checkpostal/' + $('#province').val(),
                    type        : 'get',
                    dataType    : 'json',
                    success     : function(result){
                        // Jika hasil ambil data dari table cities kosong / tidak ada, maka responnya mengirim json kosong
                        if(result['length'] == 0){
                            // Ambil data dari API jika data tidak terdapat di dalam table cities
                            $.ajax({
                                url         : '/getapi/rajaongkir/' + $('#province').val(),
                                type        : 'get',
                                dataType    : 'json',
                                success     : function(result){
                                    // Hapus child (element option) pada element select dengan id="city"
                                    $('#city').empty();

                                    // Tampilkan data result 
                                    for(i=0; i<result.length; i++){
                                        $('#city').append('<option value="' + result[i].id +'">' + result[i].city_name + ' /' + result[i].type +'</option>');
                                    }

                                    // display data di console browser untuk check result
                                    console.log('province_code: ' + $('#province').val());
                                    console.log('data length: ' + result['length']);
                                    console.log('data kosong');
                                    console.log(result);
                                }
                            });
                        }else{
                            // Hapus child (element option) pada element select dengan id="city"
                            $('#city').empty();

                            // Tampilkan data result 
                            for(i=0; i<result.length; i++){
                                $('#city').append('<option value="' + result[i].id +'">' + result[i].name + ' /' + result[i].type +'</option>');
                            }

                            // display data di console browser untuk check result
                            console.log('province_code: ' + $('#province').val());
                            console.log('data length: ' + result['length']);
                            console.log(result);
                            console.log('data ada');
                        }
                    }
                });
                
            });

        });

    </script>
@endsection

{{-- Tambahan Link Library ke lain (umumnya javascript library)--}}
@section('libsOnFooter')
@endsection