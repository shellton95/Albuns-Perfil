
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta  name="csrf-token" content="{{csrf_token() }}">
    <link rel="stylesheet" href="{{'../css/app.css'}}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<style> 
body{
    width: 100%;
    box-sizing: border-box;

}
     h1{
        padding-left: 100px;
        font-family: 'Cursive';
        font-size: 25px;
    }

   .cabecalho{
       background-color: white;
       border: solid 1px #EEEEE0;

   }
 
   .card{
       height: 350px;
       width: 250px;
       margin: 10px;
   }
   .card-img-top{
       height: 100%;
       width: 100%;
       object-fit: cover;
   }
   .corpo{
       margin-left: 100px;
       margin-right: 100px;
       margin-bottom: 60px;
   }
  .teste{
      height: 500px;
      overflow: hidden;
      object-fit: cover;
      background-color: darkslategrey;
  }
  #imagem, .carousel-item{
      height: 500px;
      object-fit: cover;
  }
  body{
      background-color: #EEE5DE;
  }
  .corpoCapa{
      height: 200px;
      width: 200px;
      overflow: hidden;
      border-radius: 50%;
      margin-left: 100px;
    
  }
  #fotoCapa{
      height: 100%;
      width: 100%;
      object-fit: cover;
  }

  .infor1{
      float: left;
  }
  .informacoesPerfil{
      margin: 30px;
      height: 200px;
  }
  .text-center{
      padding-left: 50px;
  }
  .uploadFotos{
    float: right;
    margin-right: 100px;

    

  }
  .infor1-espaco{
    height: 200px;
    width: 400px;
    word-break: break-all;
   
  }
  .botaoMais{
    height: 35px;
    width: 35px;
    border-radius: 50%;
    margin: 0px;
  }

  .imagemMais{
    height: 100%;
    width: 100%;
    object-fit: cover;
    border-radius: 50%;
  }
  .card:hover{
      height: 360px;
      width: 260px;
      top: -2px;
      border:solid 2px #FF6347;
  }

  #contaFotos,  #descricao{
      font-family: Arial, Helvetica, sans-serif;
      font-weight: bolder;
      font-size: 15px;
  }
 .modal-body{
     height: 500px;
     width: 500px;
 }
 .fotoModal{
       height: 100%;
       width: 100%;
       object-fit: contain;
 }

 
   </style>

<body>
    <section class="cabecalho">
        <nav class="navbar navbar-expand-lg navbar-leve bg-leve">
            <div class="container-fluid">
                <h1>Instagran 2</h1>
            </div>
            <a href="http://127.0.0.1:8000/albuns" class="btn btn-outline-danger" type="submit">voltar</a>
        </nav>
    </section>
  
   
     
<!------------------Carousel---------------------------->
@if (isset($fotos))
    <div class="teste">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner bg-dark">   
                @foreach ($fotos as $key => $slider) 
              <div class="carousel-item {{$loop->first ? 'active' : ''}}">
                <img id="imagem"  src="/storage/{{$slider->arquivo}}" class="d-block mx-auto" alt="...">
              </div>
              @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
    </div>   
@endif
<!---------------------------------------------->
    <section class="informacoesPerfil">
        <div class="informacoes">
            @if (isset($fotos)) 
            <div class="corpoCapa infor1">
                <img id="fotoCapa" src="/storage/{{ $perfil->imgcapa}}" alt="">
            </div>
            <div class="infor1 infor1-espaco">
                <h3 id="nomePerfil" class="text-center">{{$perfil->nome }}</h3>
                <p id="contaFotos" class="text-center">{{count($fotos)}} Publicações </p>
                <p id="descricao" class="text-center">{{$perfil->descricao}}</p>
            </div>
            @endif
        </div>

        <div class="uploadFotos">
            
            <button class="botaoMais  btn-outline-success">
                <img class="imagemMais" src="https://e7.pngegg.com/pngimages/169/808/png-clipart-plus-and-minus-signs-computer-icons-symbol-miscellaneous-angle.png" alt="">
            </button>
                
            <form id="formulario"  action="" method="POST" enctype="multipart/form-data">
                @csrf
                <input id="idPai" type="number" name="numeroid" value="{{$perfil->id}}">
                <input type="file" name="imagens[]" multiple  >
                <button class="btn btn-outline-primary" type="submit" value="ok">Salvar</button>
            </form>
        </div>

       
    </section>   

               
    <section class="corpo">
        <hr>
        <div class="row">
            @if (isset($fotos))  
            @foreach ($fotos as $item)
            <div class="col-sm-3">
                <div class="card" data-bs-toggle="modal" data-bs-target="#staticBackdrop{{$item->id}}"> 
                    <img src="/storage/{{$item->arquivo}}" alt="" class="card-img-top">     
                </div>
            </div>
            <!-- Modal -->


            <div class="modal fade" id="staticBackdrop{{$item->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body bg-dark">
                            <img class="fotoModal" src="/storage/{{$item->arquivo}}" alt="" > 
                        </div>
                        <div class="modal-footer">
                            <a href="{{$perfil->id}}/{{$item->id}}" class="btn btn-outline-danger">Excluir</a>
                        </div>
                    </div>
                </div>
            </div>

            @endforeach
            @endif
        </div>

    </section>

    @yield('modalFoto')

</body>

<script>
    $(document).ready(function(){
        $('#formulario').hide();
        $('#idPai').hide();
        $('.botaoMais').click(function(){
            $('#formulario').toggle();
        })
    })


    // ------------ FUNÇÃO AJAX----------------


</script>
</html>