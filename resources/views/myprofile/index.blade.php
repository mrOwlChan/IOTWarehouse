@extends('templates.mainNavbar')

{{-- Tambahan Link Library ke lain (umumnya css atau javascript library)--}}
@section('libsOnHeader')
@endsection

@section('contentHeader')
    <div class="container-fluid">
        <div class="row mx-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">My Profile</h1>
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
                {{-- Upload Foto --}}
                @if ($user->photo == '')
                    <img type="button" class="profile-user-img img-fluid img-circle float-right mr-n5 my-n5"  src="{{ asset('assets/AdminLTE/dist/img/icons/user-icon-avatar.jpg') }}" style="width:100px; height: 100px" data-toggle="modal" data-target="#editPhoto">
                @else
                    <img type="button" class="profile-user-img img-fluid img-circle float-right mr-n5 my-n5"  src="{{ asset('storage/' . $user->photo) }}" style="width:100px; height: 100px" data-toggle="modal" data-target="#editPhoto">
                @endif{{-- /.upload foto --}}
                <div class="card-header p-0 ">
                    <ul class="nav nav-pills mr-auto">
                        <li class="nav-item"><a class="nav-link active" href="#biodata" data-toggle="tab">Biodata</a></li>
                        <li class="nav-item"><a class="nav-link" href="#jobdesk" data-toggle="tab">Employment</a></li>
                        <li class="nav-item"><a class="nav-link" href="#message" data-toggle="tab">Messages</a></li>
                        <li class="nav-item"><a class="nav-link" href="#message" data-toggle="tab">Settings</a></li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        {{-- Biodata Tab --}}
                        <div class="active tab-pane" id="biodata">
                            @include('myprofile.mybiodata_index')
                        </div>{{-- /.biodata tab --}}

                        {{-- Job Desk Tab --}}
                        <div class="tab-pane" id="jobdesk">
                            @include('myprofile.employment_index')
                        </div>{{-- /.job desk tab --}}

                        {{-- Message Tab --}}
                        <div class="tab-pane" id="message">
                            
                        </div>{{-- message Tab --}}

                        {{-- Settings Tab --}}
                        <div class="tab-pane" id="message">
                            
                        </div>{{-- /.settings tab --}}
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- /.row (main row) --> 

    {{-- Modal Hapus Akun --}}
    <div class="modal fade" id="delAccount" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-danger" id="exampleModalLabel"><i class="fas fa-exclamation-triangle"></i> Hapus Akun</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/profile/{{ $user->id }}" method="post">
                    @method('delete')
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <p>
                                    Menghapus Akun akan menghilangkan seluruh data Anda secara permanen! Data Akun yang sudah dihapus, tidak dapat di-recovery kembali!
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-7 offset-md-3">
                                <label for="level"><i class="fas fa-key"></i> Password</label>
                                <div class="form-group input-group">
                                    <input type="password" class="form-control form-control-sm seePassword" name="passwordDelAccount">
                                    <div class="input-group-append">
                                        <button type="button" class="btn btn-outline-primary btn-sm seePasswordButton"><i class="fas fa-eye"></i></button>
                                    </div>
                                </div> 
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

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
            <form action="/myaccount/myprofile/{{ $user->id }}/photo" method="post" enctype="multipart/form-data">
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
@endsection

{{-- Tambahan Link Library ke lain (umumnya javascript library)--}}
@section('libsOnFooter')
@endsection