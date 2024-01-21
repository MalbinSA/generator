@extends('layouts.main')
@section('content')
    <div class="container">
        <p>Text generate page</p>
        <form method="get">
            <label for="value">Введите желаемое количество предложений:</label>
            <p>
                <input name="value" id="value">
            </p>
            <button type="submit" class="btn btn-success"> Generate </button>
        </form>
    </div>
    @if(isset($generatedText))
        <div class="container">
            <p>{{$generatedText}}</p>
        </div>
    @endif
    @if(isset($error))
    <div>
        <p>{{$error}}</p>
    </div>
    @endif
@endsection
