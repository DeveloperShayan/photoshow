@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-header">
            <h3>{{ $photos->title }}</h3>
            <small class="float-end">{{ $photos->size }}</small>
            <p>{{ $photos->description }}</p>
            <form action="{{ route('photo.destroy',$photos->id) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger float-end">Delete</button>
            </form>
            <a href="{{ route('album.show',$photos->album->id) }}" class="btn btn-info">Go Back</a>
           
        </div>
        <div class="card-body">
            <img src="/storage/albums/{{ $photos->album->id }}/{{ $photos->photo }}" alt="{{ $photos->photo }}" height="100%" width="100%">
        </div>
    </div>

@endsection