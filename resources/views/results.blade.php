@extends ('layouts.master')

@section('content')

<div class="container3">
    <div>

        @php ($score=0)

        @foreach ($responses as $response => $questions)
            @foreach ($questions as $question => $options)
                <h1>{{$question}}</h1>
            @endforeach


                @foreach ($questions as $question => $options)

                    <ul class="questions">

                        @foreach ($options as $option)

                            @php ($class = "answers")

                                @if($option->correct)



                                    @endif

                            @if($option->id == $response && $option->correct)

                            @php ($class = "answers correct")
                            <script>
                                var xhr = new XMLHttpRequest();
                                xhr.open("POST", '/lights/correct', true);
                                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=UTF-8");
                                xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token()}}')
                                xhr.send('hello');
                                </script>

                                @endif

                            @if($option->id == $response && !$option->correct)

                                @php ($class = "answers wrong")
                                <script>
                                    var xhr = new XMLHttpRequest();
                                    xhr.open("POST", '/lights/wrong', true);
                                    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=UTF-8");
                                    xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token()}}')
                                    xhr.send('hello');
                                    </script>

                                @endif

                            <li class="{{$class}}">

                                {{$option->body}}

                                </li>

                            @endforeach

                            </ul>



                    @endforeach

                @endforeach

        <a class="btn ateb" href="/quiz">Cwestiwn Arall</a>

    </div>

</div>


<script>
const myTimeout = setTimeout(lightsIdle, 5000);

function lightsIdle() {

  var xhr = new XMLHttpRequest();
  xhr.open("POST", '/lights/idle', true);
xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=UTF-8");
xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token()}}')
xhr.send('hello');

}
</script>

@endsection
