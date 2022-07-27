@extends ('layouts.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"></div>

                <div class="panel-body">
                        <form class="" action="{{ url('quiz/result') }}" method="post">
                            {{ csrf_field() }}
                            
                            <ul class="list-group questions">
                                @foreach($questions as $key => $value)
                                    <li class="list-group-item">Question: <b>{{ $key }}</b>
                                         @foreach($value[0] as $q)
                                            <div class="radio">
                                                <label><input type="radio" class="" name="option[{{$q->question_id}}]" value="{{ $q->id }}"> {{ $q->body}}</label>
                                                </div>
                                          
                                         @endforeach
                                       
                                    </li>
                                @endforeach
                                <div class="form-group final-submit text-center">
                                    <button type="submit" name="submit" class="btn btn-info">Submit and See Result!</button>
                                </div>
                            </ul>
                        </form>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection