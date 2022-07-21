@extends('layouts.app')

@section('content')

@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif

<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-7">
            <form method="POST" action="{{route('post.update', $post->id)}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div style="margin-top: 20px" class="card-body">
                    <div class="form-group mb-4">
                        <textarea class="form-control" placeholder="Type Here!" name="text" style="height: 100px">{{$post->text}}</textarea>
                    </div>
                    <div style="margin-left: -10px" class="form-group col-md-5">
                        <img src="/images/file-image-solid.svg" height="30px" width="30px">
                        <input style="margin-top: -30px; margin-left: 30px" type="file" class="form-control flex" name="image" value="{{$post->image}}">
                    </div>
                    <div style="margin-left: -10px" class="form-group col-md-5">
                        <img src="/images/file-solid.svg" height="30px" width="30px">
                        <input style="margin-top: -30px; margin-left: 30px" type="file" class="form-control flex" name="file" {{$post->file}}>
                    </div>
                    <button style="margin-left: 680px" type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection