<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Saludos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet"> <!-- Archivo CSS personalizado -->
</head>
<body>

    <!-- HERO -->
    <section class="hero d-flex align-items-center justify-content-center text-center text-white">
        <div>
            <h1 class="display-4 fw-bold">Gestión de Saludos</h1>
            <p class="lead">Crea, visualiza y administra tus saludos de forma sencilla.</p>
            <a href="#formulario" class="btn btn-primary btn-lg mt-3">Agregar un saludo</a>
        </div>
    </section>

    <!-- FORMULARIO -->
    <section id="formulario" class="py-5 bg-light">
        <div class="container">
            @if(session('success'))
                <div class="alert alert-success text-center">{{ session('success') }}</div>
            @endif

            <div class="card shadow-lg p-4">
                <h2 class="text-center mb-4">Agregar un nuevo saludo</h2>
                <form method="POST" action="{{ route('saludos.store') }}">
                    @csrf
                    <div class="mb-3">
                        <input type="text" name="nombre" class="form-control" placeholder="Escribe tu nombre" required>
                    </div>
                    <button type="submit" class="btn btn-success w-100">Guardar</button>
                </form>
            </div>
        </div>
    </section>

    <!-- LISTADO -->
    <section class="py-5">
        <div class="container">
            <h2 class="text-center mb-4">Historial de saludos</h2>
            @if($saludos->isNotEmpty())
                <ul class="list-group shadow">
                    @foreach($saludos as $saludo)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span>{{ $saludo->nombre }}</span>
                            <div>
                                <a href="{{ route('saludos.edit', $saludo->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                <form action="{{ route('saludos.destroy', $saludo->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que quieres eliminar este saludo?')">Eliminar</button>
                                </form>
                            </div>
                        </li>
                    @endforeach
                </ul>
                <div class="mt-3">
                    {{ $saludos->links() }}
                </div>
            @else
                <p class="text-center text-muted">No hay saludos registrados.</p>
            @endif
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="bg-dark text-white text-center py-3">
        <p class="mb-0">© {{ date('Y') }} Gestión de Saludos. Todos los derechos reservados.</p>
    </footer>

</body>
</html>
