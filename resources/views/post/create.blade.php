@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-7">
            <form method="POST" action="{{route('post.store')}}" enctype="multipart/form-data">
                @csrf
                <div style="margin-top: 20px" class="card-body">
                    <div class="form-group mb-4">
                        <textarea class="form-control" placeholder="Type Here!" name="text" style="height: 100px"></textarea>
                    </div>
                    <div style="margin-left: -10px" class="form-group col-md-5">
                        <img src="images/file-image-solid.svg" height="30px" width="30px">
                        <input style="margin-top: -30px; margin-left: 30px" type="file" class="form-control flex" name="image">
                    </div>
                    <div style="margin-left: -10px" class="form-group col-md-5">
                        <img src="images/file-solid.svg" height="30px" width="30px">
                        <input style="margin-top: -30px; margin-left: 30px" type="file" class="form-control flex" name="file">
                    </div>
                    <button style="margin-left: 680px" type="submit" class="btn btn-success">Post</button>
                </div>
            </form>
        </div>
    </div>
    
    <br>
    <br>
    <br>

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
            <div style="margin-top: -15px; margin-left: 650px" class="card-body">
                <a href="{{route('post.edit', $post->id )}}" class="text-decoration-none">
                    Edit |
                </a>
                <a href="" class="text-decoration-none">
                    Delete
                </a>
            </div>
            @endforeach
        </div>
    </div>

</div>
@endsection