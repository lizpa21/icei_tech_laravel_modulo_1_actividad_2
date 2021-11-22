<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ICEI Tech - Datos de Catequistas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>
<body style="background: lightgray">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <a href="catequistas/create" class="btn btn-md btn-success mb-3">AÑADIR CATEQUISTA</a>
                        
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th scope="col">NOMBRE</th>
                                <th scope="col">CELULAR</th>
                                <th scope="col">CORREO ELECTRÓNICO</th>
                                <th scope="col">PARROQUIA</th>
                                <th scope="col">GRUPO</th>
                                <th scope="col">OPCIONES</th>
                              </tr>
                            </thead>
                            <tbody>
                              @forelse ($catequistas as $catequista)
                                <tr>
                                    <td>{{ $catequista->nombre }}</td>                                
                                    <td>{{ $catequista->celular }}</td>
                                    <td>{{ $catequista->correo }}</td>
                                    <td>{{ $catequista->parroquia }}</td>
                                    <td>{{ $catequista->grupo }}</td>
                                    <td class="text-center">
                                        <form onsubmit="return confirm('¿Está seguro?');" action="/catequistas/eliminar/{{$catequista->id}}" method="DELETE">
                                            <a href="/catequistas/show/{{$catequista->id}}" class="btn btn-sm btn-info">MOSTRAR</a>
                                            <a href="/catequistas/edit/{{$catequista->id}}" class="btn btn-sm btn-primary">EDITAR</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">ELIMINAR</button>
                                        </form>
                                    </td>
                                </tr>
                              @empty
                                  <div class="alert alert-danger">
                                  Los datos de los catequistas aún no están disponibles.
                                  </div>
                              @endforelse
                            </tbody>
                          </table>  
                         
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        //Mensaje
        @if(session()-> has('success'))
        
            toastr.success('{{ session('success') }}', 'ÉXITO'); 

        @elseif(session()-> has('error'))

            toastr.error('{{ session('error') }}', 'ERROR'); 
            
        @endif
    </script>

</body>
</html>