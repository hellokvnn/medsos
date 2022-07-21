@extends('layouts.app')

@section('content')

@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif

<div class="container">
    <div class="row justify-content-center">
        <center><h4>Profil</h4><center> <br><br>
        <img src="/images/profil.jpg" width="200px" height="200px" class="rounded-circle"> <br><br>
            <div class="col-md-5 mb-4">
                <form method="POST" action="{{route('profile.update', $profile->id)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <label style="margin-left: -380px" for="nama">Nama Lengkap</label>
                    <input type="nama" class="form-control mb-4" name="nama" value="{{$profile->nama}}">

                    <label style="margin-left: -460px" for="bio">Bio</label>
                    <textarea class="form-control" placeholder="Type Here!" name="bio" style="height: 100px">{{$profile->bio}}</textarea>
                    <br>
                    <button class="btn btn-outline-primary">Simpan</button>  
                </form>
            </div> 
    </div>
</div>

@endsection