<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>APP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="card mt-5 shadow-lg">
            <div class="card-header text-white bg-dark">Datos</div>
            <div class="card-body">
                <div class="row">
                    <!-- Table -->
                    <div class="col-md-12">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Temperatura Ambiente</th>
                                    <th scope="col">Temperatura Liquida</th>
                                    <th scope="col">Hora de Medición</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <th scope="row">
                                            {{ $item->id }}
                                        </th>
                                        <td>
                                            {{ $item->room_temperature }} °C
                                        </td>
                                        <td>
                                            {{ $item->liquid_temperature }} °C
                                        </td>
                                        <td>
                                            {{ $item->measurement_time }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <form action="{{ route('getPrediction') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="time" class="form-label">
                                Selecciona una hora a predecir:
                            </label>
                            <input type="time" name="hour" step="1" class="form-control" id="time">
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">
                                Procesar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
