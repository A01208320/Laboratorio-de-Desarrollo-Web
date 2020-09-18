@php
// php me permite insertar bloques de código en PHP
function getClass($url){
$classes = ["center"];
//http://localhost:8000/catalogo
///catalogo
$classes[] = strpos($url,request()->path()) ? "active" : "";
return trim(implode(" ",$classes));
}
@endphp



<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand pl-3" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link {{ getClass('/') }}" href="{{ url('/') }}">Home</a>
            </li>
        </ul>
    </div>
</nav>