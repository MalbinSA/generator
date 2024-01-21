@extends('layouts.main')
@section('content')
    @foreach($texts as $text)
        <div class="container">
            <div class="border rounded mt-3">
                <p>{{$text->text}}</p>
            </div>
            <form action="{{route('text.destroy', $text->id)}}" method="post">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger mt-1"> Удалить </button>
            </form>
        </div>
    @endforeach
@endsection
