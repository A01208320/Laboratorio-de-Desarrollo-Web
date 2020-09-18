<div class="card" style="width: 18rem;">
    <img src="{{ url('img/autores/' . $isbn . '.jpg') }}" class="card-img-top" alt="...">
    <div class="card-body">
        <h5 class="card-title">{{ $autor["nombre"] }}</h5>
        <h6 class="card-subtitle mb-2 text-muted">{{ $autor["matricula"] }}</h6>
        <h6 class="card-subtitle mb-2">Experiencia</h6>
        <p class="card-text">{{ $autor["experiencia"] }}</p>
    </div>
</div>