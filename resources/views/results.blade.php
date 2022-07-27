@extends ('layouts.master')

@section('content')

<div class="container">

    <div class="row">

        <div class="col-md-10 col-md-offset-1">

            <div class="panel panel-default">

                <div class="panel-heading"></div>

                    <div class="panel-body">

                        @php ($score=0)

                        @foreach ($responses as $response => $questions)
                            
                            <ul class="list-group questions">
                                
                                @foreach ($questions as $question => $options)
                                    
                                    <li class="list-group-item">Cwestiwn: <b>{{$question}}</b>
                                    
                                        <ul>
                                            
                                            @foreach ($options as $option)
                                                
                                                @php ($class = "list-group-item")
                                                    
                                                    @if($option->correct)
                                                        
                                                        @php ($class = "list-group-item-success")
                                                        
                                                        @endif

                                                @if($option->id == $response && $option->correct)
                                                
                                                    @php ($score = $score + 1)
                                                    
                                                    @endif 

                                                @if($option->id == $response && !$option->correct)

                                                    @php ($class = "list-group-item-danger")

                                                    @endif

                                                <li class="{{$class}}">

                                                    {{$option->body}}

                                                    </li>

                                                @endforeach

                                                </ul>

                                            </li>

                                        @endforeach

                                </ul>

                            @endforeach

                            <h1>{{$score}}/10</h1>

                        </div>
                        
                </div>

            </div>

        </div>

    </div>

</div>

@endsection