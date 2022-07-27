@extends ('layouts.master')
@section ('content')
    <h1>Creu Cwestiwn</h1>

    <hr>
    
    <form method="POST" action="/questions">

        {{ csrf_field() }}

        <div class="form-group">

            <label for="body">Cwestiwn:</label>

            <input type="text" class="form-control" id="body" name="body" >
           
           
           
            </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Cadw</button>
            </div>
       
        </form>
        

@endsection

