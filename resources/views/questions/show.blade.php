@extends ('layouts.master')

@section ('content')

<h1>{{ $question->body }}</h1>

<hr>

<div class="options">

    <ul class="list-group">

         @foreach ($question->option as $option)
             @if($option->correct)
            <li class="list-group-item-success">
            @else
             
            <li class="list-group-item-info">
            @endif
            {{$option->body}}</li>
    
            @endforeach
        </ul>

    </div>

<hr>



        <form method="POST" action="/questions/{{ $question->id }}/options">
            {{ csrf_field() }}
            <input type="hidden" id="user_id" name="user_id" value="1">
            <input type="hidden" id="question_id" name="question_id" value="{{ $question->id }}">


            <div class="form-group">

                <textarea name="body" placeholder="Ateb"></textarea>

                </div>
            
            <div class="form-group">
           
                <button type="submit" class="btn btn-primary">Ychwanegu ateb</button>
           
                </div>

             
             @include('layouts.errors')
            </form>
   



@endsection