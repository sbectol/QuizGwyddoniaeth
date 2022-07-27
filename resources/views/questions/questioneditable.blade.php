<div class="card">
    
    <a href="/questions/edit/{{ $question->id }}">{{ $question->body }}</a>
    
    <ul>
        
        @foreach ($question->option as $option)
        
            @if($option->correct)
        
                <li class = "list-group-item-success">
        
                @else
        
                <li>
        
            @endif
        
            <a href="options/edit/{{$option ->id}}">{{$option->body}}</a></li>
        
        @endforeach
        
        </ul>

        <br />
         
        <a href="/questions/edit/{{ $question->id }}" class="btn btn-primary my-2">Golygu</a>

        <a href="/questions/delete/{{ $question->id }}" class="btn btn-primary">Dileu</a>
        
        <p><span class="small">Cliciwch ar opsiwn i'w olygu</span></p>

        <p><span class="small">Wedi ychwangu gan {{$question->user->name}}</span></p>

    </div>