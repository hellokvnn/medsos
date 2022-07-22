@extends('layouts.app')

@section('content')

<div class="container">  

    <div class="row justify-content-center">
        <center><h3>Feed Medsos</h3></center>
        <div class="col-md-7"> <br>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>

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
                    <div class="form-group mb-4">
                        <img src="{{asset('post-images/'. $post->image)}}" width="745px" height="300px">
                    </div>
                </div>
                <!-- Button trigger modal -->
                <center><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Comment
                </button></center>
                
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Comment Feed</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{route('store')}}" enctype="multipart/form-data">
                                @csrf
                                <div style="margin-top: 20px" class="card-body">
                                    <img src="images/profil.jpg" width="50px" height="50px" class="rounded-circle">
                                    <h5 style="margin-top: -40px; margin-left: 55px; margin-bottom: 20px">Kevin</h5>
                                    <div class="form-group mb-4">
                                        <textarea class="form-control" placeholder="Comment" name="text" style="height: 100px"></textarea> <br>
                                        <div style="margin-left: -10px" class="form-group col-md-5">
                                            <img src="images/file-image-solid.svg" height="30px" width="30px">
                                        <input style="margin-top: -30px; margin-left: 30px" type="file" class="form-control" name="image">
                                        </div>
                                        <div style="margin-left: -10px" class="form-group col-md-5">
                                            <img src="images/file-solid.svg" height="30px" width="30px">
                                            <input style="margin-top: -30px; margin-left: 30px" type="file" class="form-control" name="file">
                                        </div>
                                    </div>
                                    <button style="margin-left: 375px" type="submit" class="btn btn-success">Comment</button>
                                </div>
                            </form>
                            <div style="margin-top: 20px" class="card-body">
                                @foreach ($comments as $comment)
                                <div class="form-group mb-4">
                                <img src="images/profil.jpg" width="50px" height="50px" class="rounded-circle">
                                <h5 style="margin-top: -40px; margin-left: 55px; margin-bottom: 20px">Kevin</h5>
                                    <textarea class="form-control" name="text" style="height: 100px" disabled> {{$comment->text}} </textarea> <br>
                                </div>
                                @endforeach
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                    </div>                    
                </div>
        @endforeach
    </div>

</div>
@endsection
