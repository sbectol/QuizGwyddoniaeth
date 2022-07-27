<div class="collapse bg-dark no-print" id="navbarHeader">
      <div class="container">
        <div class="row">
          <div class="col-sm-8 py-4">
            <h4 class="text-white">Sialens</h4>
            <p class="text-muted"></p>
          </div>
          <div class="col-sm-4 py-4">
            <h4 class="text-white">Dewis</h4>
            <ul class="list-unstyled">
              <li><a href="/proffil/1" class="text-white">Ysgolion</a></li>
              <li><a href="/questions/create" class="text-white">Ychwanegu Cwestiwn</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="navbar navbar-dark bg-dark no-print">
      <div class="container d-flex justify-content-between">
        <a href="/" class="navbar-brand">Sialens</a>
        @if (Auth::check())
        <a href="#" class="navbar-brand ml-auto">{{ Auth::user()->name}}</a> / <a href="/logout" class="navbar-brand ml-auto">Allgofnodi</a>
        @else
        <a href="/login" class="navbar-brand ml-auto">Mewngofnodi</a>
        
        @endif
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
    </div>