@extends('layouts.app')

@section('content')

@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif

<div class="container">

    <div class="row justify-content-center">
        <center><h3>Feed Medsos</h3><center> <br>
        <div class="col-md-7">
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>

    <br>

    <div class="row justify-content-center">
        <div class="col-md-7">
            @foreach ($posts as $post)
                <div style="margin-top: 20px" class="card-body">
                    <img src="images/profil.jpg" width="50px" height="50px" class="rounded-circle">
                    <h5 style="margin-top: -40px; margin-left: 55px; margin-bottom: 20px">Kevin</h5>
                    <div class="form-group mb-4">
                        <textarea class="form-control" placeholder="Type Here!" name="text" style="height: 100px" disabled>{{$post->text}}</textarea>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</div>
@endsection
