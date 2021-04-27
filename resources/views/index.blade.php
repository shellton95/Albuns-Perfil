
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta  name="csrf-token" content="{{csrf_token() }}">
    <title>Document</title>
    <link rel="stylesheet" href="{{'../../css/app.css'}}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</head>
<style>

    .body{
        margin: 50px;
    }
    .card{
      height: 400px;
      width: 250px;
      overflow: hidden;
    }
    .card-img-top{
      height: 75%;
      width: 100%;
      object-fit: cover;
    }
    .card-title{
      font-family: Cursive;
      color: #FF0000;
    }
   .body2{
     height: 60px;
     padding: 5px;
    overflow: hidden;
   }
 


</style>
<body >
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a id="albuns" class="nav-link active" aria-current="page" href="{{ route('albuns.index')}}"><h5>Albuns</h5></a>
              </li>
              <li class="nav-item">
                <a id="cadastro" class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><h5>Cadastrar Album</h5></a>
              </li>
            </ul>
          </div>
        </div>
      </nav>

<!-------------------------------------MODAL-------------------------------->

      <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title text-center" id="staticBackdropLabel">Cadastrar Album</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

              <section class="jumbotron ">
                <div class="container">
                    <form action="{{route('albuns.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label"> Digite o nome do Perfil</label>
                            <input type="text" class="form-control {{ $errors->has('titulo') ? 'is-invalid' : ''}}" name="titulo" placeholder="Titulo">
@if ($errors->has('titulo'))
                            <div class="invalid-feedback">
                              {{$errors->first('titulo')}}
                            </div>
@endif
                        </div> 
                        <div class="mb-3">
                            <label for="" class="form-label">Descrição do Perfil</label>
                            <textarea class="form-control {{ $errors->has('areatexto') ? 'is-invalid' : ''}}" name="areatexto" id="areatexto" cols="3" rows="3" ></textarea>
@if ($errors->has('areatexto'))
                            <div class="invalid-feednack">
                              {{$errors->first('areatexto')}}
                            </div>
@endif
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Escolha a foto de capa</label><br>
                            <input type="file" class="custon-file-input {{ $errors->has('arquivo') ? 'is-invalid' : ''}}" name="arquivo"> 
@if ($errors->has('arquivo'))
                            <div class="invalid-feedback">
                              {{$errors->first('arquivo')}}
                            </div>
@endif
                        </div>
                        <button class="btn btn-primary">Salvar</button>
                    </form>
                </div>
              
            </div>
          </div>
        </div>
      </div>
<!-------------------------------------------------------------------------------------------------->
      
      <div class="body">
        <div class="row">
          @if (isset($usuarios))
          @foreach ($usuarios as $item)
                  <div class="col-sm-3">
                      <div class="card">
                        <img src="/storage/{{$item->imgcapa}}" class="card-img-top" alt="...">
                          <div class="card-body">
                              <h5 class="card-title"> {{ $item->nome }}</h5>
                              <div class="botoes">
                                  <a href="albuns/perfil/{{$item->id}}" class="btn btn-outline-primary">abrir</a>
                                  <a href="albuns/edit/{{$item->id}}" class="btn btn-outline-warning">Editar</a>
                                  <a href="albuns/{{$item->id}}" class="btn btn-outline-danger">excluir</a>
                              </div>
                          </div>
                      </div>
                  </div>
           @endforeach 
           @endif
              </div>
      </div>

      @yield('editar')
     
</body>
</html>