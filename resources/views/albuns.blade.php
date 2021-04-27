
@extends('index')
@section('albuns')
    

    
    <div class="row">
@foreach ($usuarios as $item)
        <div class="col-sm-3">
            <div class="card">
              <img src="/storage/{{$item->imgcapa}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"> {{ $item->nome }}</h5>
                    <div class="body2">
                        <p class="card-text">{{ $item->descricao }}</p>
                    </div>
                    <div class="botoes">
                        <a href="/albuns/conteudo/{{$item->id}}" class="btn btn-outline-primary">abrir</a>
                        <a href="/albuns/{{$item->id}}" class="btn btn-outline-danger">excluir</a>
                    </div>
                </div>
            </div>
        </div>
 @endforeach 
    </div>


    
@endsection
