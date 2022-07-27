@extends ('layouts.master')
@section ('content')
    <h1>Golygu Cwestiwn</h1>

    <hr>
    
    <form method="POST" action="/questions/update/{{$question->id}}">

        {{ csrf_field() }}

        <div class="form-group">

            <label for="body">Cwestiwn:</label>

            <input type="text" class="form-control" id="body" name="body" value="{{$question->body}}">

            <hr />
            
            <ul>
                
                @foreach($options as $option)

                    <li><a href="/options/edit/{{$option ->id}}">{{$option->body}}</a></li>
                    

                    <input type="hidden" name="option_id[]" value="{{$option->id}}" />


                    @endforeach

                </ul>

            @if( Auth::user()->hasrole('Rheolwr') )

            <label for="approved">Derbyn?:</label>

            <input type="checkbox" id="approved" name="approved" {{ $question->approved === 1 ? 'checked' : '' }}/>

            @endif
           
           
           
            </div>
        
        <div class="form-group">

        
            <button type="submit" class="btn btn-primary">Cadw</button>
        
            </div>
       
        </form>
        

@endsection
