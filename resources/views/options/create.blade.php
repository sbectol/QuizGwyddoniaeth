@extends ('layouts.master')
@section ('content')

<?php


$question_id=session('data')['question_id'];
$option_number=session('data')['option_number'];

?>

    <h1>Opsiwn {{$option_number}}/3</h1>

    <hr>

    <form method="POST" action="/options">

        {{ csrf_field() }}

        <div class="form-group">

            <label for="body">Ateb:</label>

            <input type="text" class="form-control" id="body" name="body" required>

            <label for="body">Cywir?:</label>

            <input type="checkbox" class="form-control" id="correct" name="correct">

            <input type="hidden" id="question_id" name="question_id" value="{{ $question_id }}">
            <input type="hidden" id="option_number" name="option_number" value="{{ $option_number }}">
            </div>

            <div class="form-group">

            <button type="submit" class="btn btn-primary">Cadw</button>
                </div>
            @include('layouts.errors')
        </form>
@endsection
