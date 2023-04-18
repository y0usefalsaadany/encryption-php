@extends('layouts.app')
@section('content')

<div>
    @foreach($images as $image)
        <div class="img">
            <img src="{{ $image->image }}" alt="" width="430px" height="450px">
        </div>
    @endforeach
</div>
















@endsection
