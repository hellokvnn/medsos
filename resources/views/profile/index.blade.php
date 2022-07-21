@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-7">
        @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('status') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
    </div>
</div>

<div class="container">
    <div class="row justify-content-center">
        <center><h4>Profil</h4><center> <br><br>
        @foreach ($profiles as $profile)
        <img src="images/profil.jpg" width="200px" height="200px" class="rounded-circle"> <br><br>
            <div class="col-md-5 mb-4">
                <form action="">
                    <label style="margin-left: -380px" for="nama">Nama Lengkap</label>
                    <input type="nama" class="form-control" name="nama" value="{{$profile->nama}}">
            </div>   
            <div class="col-md-5 mb-4">
                    <label style="margin-left: -460px" for="bio">Bio</label>
                    <textarea class="form-control" placeholder="Type Here!" name="bio" style="height: 100px">{{$profile->bio}}</textarea>
                </form>
            </div> 
        @endforeach
            <a href="{{route('profile.edit', $profile->id )}}" class="text-decoration-none">
            <button class="btn btn-outline-primary">Edit</button>  
            </a>
    </div>
</div>

@endsection