@extends ('layouts.master')
@section ('content')

<?php $question_id=session('data');?>

    <h1>Golygu Opsiwn</h1>

    <hr>
    
    <form method="POST" action="/options/update/{{$option->id}}">

    

        {{ csrf_field() }}

        <div class="form-group">

            <label for="body">Ateb:</label>

            <input type="text" class="form-control" id="body" name="body" value="{{$option->body}}" required>

            <label for="correct">Cywir?:</label>
             
            <input type="checkbox" class="form-control" id="correct" name="correct" {{ $option->correct === 1 ? 'checked' : '' }}>
            
            <input type="hidden" id="question_id" name="question_id" value="{{ $option->question_id }}">
            
            </div>
            
            <div class="form-group">

                <button type="submit" class="btn btn-primary">Save</button>
                
                </div>

            @include('layouts.errors')

        </form>

@endsection