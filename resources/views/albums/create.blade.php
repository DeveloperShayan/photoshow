@extends('layouts.app')

@section('content')

        <div class="card p-2 m-2 bg-secondary text-light">
            <div class="card-header"> <h1>Create New Album</h1> </div>
            <div class="card-body">
                <form action="{{ route('album.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Album Name</label>
                        <input id="name" class="form-control" type="text" name="name">
                    </div>
                    <div class="form-group">
                        <label for="description">Album Description</label>
                        <input id="description" class="form-control" type="text" name="description">
                    </div>
                    <div class="form-group">
                        <label for="cover-image">Cover Image</label>
                        <input id="cover-image" class="form-control" type="file" name="cover-image">
                    </div>
                    <div class="form-group p-2">
                        <button type="submit" class="btn btn-primary w-100">submit</button>
                    </div>
                </form>
            </div>
        </div>
    

@endsection