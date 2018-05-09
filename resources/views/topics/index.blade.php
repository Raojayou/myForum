@foreach($topics->chunk(3) as $chunk)
    <div class="row course-set courses__row d-flex justify-content-around topic">
        @foreach($chunk as $topic)

            <div class="card border-success mb-3 mx-auto" style="max-width: 18rem;">
                <div class="card-header">
                    <a href="/topics/show/{{ $topic['id'] }}">Título del Tema: {{ $topic['title'] }}</a></div>
                <div class="card-body">
                    <p class="card-text">Contenido del tema: {{ $topic['content'] }}</p>
                </div>
                <div class="card-footer">
                    <p class="card-text">Categoría del Tema: {{ $topic['category'] }}</p>
                    <p class="card-text">Creado: {{ $topic['created_at'] }}</p>
                </div>
            </div>
        @endforeach
    </div>

@endforeach

@if($topics->isEmpty())
    <p>El usuario no ha creado ningún tema recientemente.</p>
@endif