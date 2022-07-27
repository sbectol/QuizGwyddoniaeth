@extends ('layouts.master')
@section ('content')

<h1>Dileu Cwestiwn</h1>

    <hr>
    
    <form method="POST" action="/questions/delete/{{$question->id}}">

        {{ csrf_field() }}

        <div class="form-group">

            <label for="body">Cwestiwn:</label>

            <input type="text" class="form-control" id="body" name="body" value="{{$question->body}}">

            <hr />
            
            <ul>
                
                @foreach($options as $option)

                    <li>{{$option->body}}</li>

                    <input type="hidden" name="option_id[]" value="{{$option->id}}" />

                    @endforeach

                </ul>

            
           
           
            </div>
        
        <div class="form-group">
        
            <button type="submit" class="btn btn-primary">Dileu</button>
        
            </div>
       
        </form>
        

@endsection