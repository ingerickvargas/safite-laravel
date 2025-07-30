<!DOCTYPE html>
<html>
	<head>
		<title>Editar Saludo</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
	</head>
	<body class="bg-light">
		<div class="container mt-5">
			<div class="card shadow-lg p-4">
				<h2 class="text-center">Editar saludo</h2>
				<form method="POST" action="{{ route('saludos.update', $saludo->id) }}">
					@csrf
					@method('PUT')
					<div class="mb-3">
						<label for="nombre" class="form-label">Nombre:</label>
						<input type="text" id="nombre" name="nombre" value="{{ old('nombre', $saludo->nombre) }}" class="form-control" required>
					</div>
					<button type="submit" class="btn btn-success w-100">Actualizar</button>
				</form>
				
			</div>
		</div>
	</body>
</html>
