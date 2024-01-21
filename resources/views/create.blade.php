@extends('layouts.main')
@section('content')
    <p>Text create page</p>
    <div class="container">
        <form action="{{route('text.store')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="text">Отрывок текста</label>
                <textarea class="form-control" id="text" name="text" rows="3"></textarea>
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Добавить</button>
        </form>
    </div>
@endsection
