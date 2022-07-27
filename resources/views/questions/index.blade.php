@extends ('layouts.master')

@section ('content')

    <section class="jumbotron text-center">

      <div class="container">

        <h1 class="jumbotron-heading">Eisteddfod</h1>


        <h2 class="jumbotron-heading">Croeso i Sialens</h2>

        <h3 class="jumbotron-heading">{{$questions->count()}} cwestiwn wedi cofnodi</h3>

        <p>

          <a href="/questions/create" class="btn btn-primary">Ychwanegu Cwestiwn</a>



            <a href="/pori" class="btn btn-secondary">Cwestiynau wedi derbyn</a>


            <a href="/" class="btn btn-secondary">Cwestiynau angen derbyn</a>





        </p>

      </div>

    </section>


    <section class="text-center">

        <div class="container">

            @if(!$approved == true)

                <h3 class="jumbotron-heading">Cwestiynau angen ei derbyn</h3>

                @else

                <h3 class="jumbotron-heading">Cwestiynau wedi ei derbyn</h3>

                @endif


            </div>

        </section>



    <div class="album text-muted">

        <div class="container">

            <div class="row">

                @foreach ($questions as $question)



                    @include ('questions.questioneditable')



                    @endforeach
                </div>

        </div>

    </div>

@endsection
