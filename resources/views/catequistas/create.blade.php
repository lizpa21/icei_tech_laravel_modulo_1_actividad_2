<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ICEI Tech - Agregar un catequista</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">

                        <a href="/catequistas" class="btn btn-md btn-success mb-3">REGRESAR</a>

                        <form action="/catequistas/store" method="POST" enctype="multipart/form-data">
                        
                            @csrf

                            <div class="form-group">
                                <label class="font-weight-bold">NOMBRE</label>
                                <input type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ old('nombre') }}" placeholder="Ingrese el nombre del catequista">
                            
                                <!-- Mensaje de error para el nombre -->
                                @error('nombre')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">CELULAR</label>
                                <input type="number" class="form-control @error('celular') is-invalid @enderror" name="celular" value="{{ old('celular') }}" placeholder="Ingrese el número de celular del catequista">
                            
                                <!-- Mensaje de rror para el celular -->
                                @error('celular')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">CORREO ELECTRÓNICO</label>
                                <input type="text" class="form-control @error('correo') is-invalid @enderror" name="correo" value="{{ old('correo') }}" placeholder="Ingrese el correo electrónico del catequista">
                            
                                <!-- Mensaje de error para el nombre -->
                                @error('correo')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">PARROQUIA</label>
                                <input type="text" class="form-control @error('parroquia') is-invalid @enderror" name="parroquia" value="{{ old('parroquia') }}" placeholder="Ingrese la parroquia del catequista">
                            
                                <!-- Mensaje de error para el nombre -->
                                @error('parroquia')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">GRUPO</label>
                                <input type="text" class="form-control @error('grupo') is-invalid @enderror" name="grupo" value="{{ old('grupo') }}" placeholder="Ingrese el grupo del catequista">
                            
                                <!-- Mensaje de error para el nombre -->
                                @error('grupo')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-md btn-primary">GUARDAR</button>

                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>