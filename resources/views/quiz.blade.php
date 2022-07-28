@extends ('layouts.master')
@section('content')
<div class="container3">
  <div>
                        <form class="" action="{{ url('quiz/result') }}" method="post">
                            {{ csrf_field() }}
                            @foreach($questions as $question => $value)
                            <h1>{{$question}}</h1>
                            @endforeach

                                @foreach($questions as $key => $value)
                                <ul class="questions">
                                         @foreach($value[0] as $q)
                                            <li>
                                                <input type="radio" name="option[{{$q->question_id}}]" value="{{ $q->id }}">
                                                <label for="option[{{$q->question_id}}]" > {{ $q->body}}</label>
                                            </li>
                                         @endforeach
                                        </ul>

                                @endforeach


                                    <button type="submit" name="submit" class="btn ateb">Ateb</button>


                        </form>



    </div>
</div>
@endsection
