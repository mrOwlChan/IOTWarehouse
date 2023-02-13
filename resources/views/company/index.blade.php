@extends('templates.mainNavbar')

{{-- Tambahan Link Library ke lain (umumnya css atau javascript library)--}}
@section('libsOnHeader')
@endsection

@section('contentHeader')
    <div class="container-fluid">
        <div class="row mx-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">My Company</h1>
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
                <div class="card-header p-0 ">
                    <ul class="nav nav-pills mr-auto">
                        <li class="nav-item"><a class="nav-link active" href="#biodata" data-toggle="tab">Profile</a></li>
                        <li class="nav-item"><a class="nav-link" href="#jobdesk" data-toggle="tab">#</a></li>
                        <li class="nav-item"><a class="nav-link" href="#message" data-toggle="tab">#</a></li>
                        <li class="nav-item"><a class="nav-link" href="#message" data-toggle="tab">#</a></li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        {{-- Profile Tab --}}
                        <div class="active tab-pane" id="biodata">
                            {{-- @include('') --}}
                        </div>{{-- /.profile tab --}}

                        {{-- # Tab --}}
                        <div class="tab-pane" id="jobdesk">

                        </div>{{-- /.# tab --}}

                        {{-- # Tab --}}
                        <div class="tab-pane" id="message">
                            
                        </div>{{-- # Tab --}}

                        {{-- Settings Tab --}}
                        <div class="tab-pane" id="message">
                            
                        </div>{{-- /.settings tab --}}
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
                <form action="/myprofile/photo" method="post" enctype="multipart/form-data">
                    @method('patch')
                    @csrf
                    <div class="modal-body">  
                        <div class="row mb-3">
                            <div class="col-md-12 text-center">
                                {{-- Photo sebelumnya --}}
                                <input class="form-control" type="hidden" value="" name='prevPhoto' id='prevPhoto'>
                                
                                {{-- Photo yang diupload untuk diedit  --}}
                                <img class="profile-user-img img-fluid img-circle img-preview" src="{{ asset('storage/') }}" style="width:250px;height:250px">
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
                <form action="/myprofile/biodata/edit" method="post">
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
                <form action="/profile/" method="post">
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

@endsection

{{-- Tambahan Link Library ke lain (umumnya javascript library)--}}
@section('libsOnFooter')
@endsection