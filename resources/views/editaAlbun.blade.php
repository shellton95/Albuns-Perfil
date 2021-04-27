@extends('index')
@section('editar')
    

<section class="jumbotron ">
    <div class="container">
        <form action="/albuns/{{$usuario->id}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="" class="form-label"> Digite o nome do Perfil</label>
                <input type="text" class="form-control {{ $errors->has('titulo') ? 'is-invalid' : ''}}" name="titulo" value="{{$usuario->nome}}">
@if ($errors->has('titulo'))
                <div class="invalid-feedback">
                    {{$errors->first('titulo')}}
                </div>
@endif
            </div> 
            <div class="mb-3">
                <label for="" class="form-label">Descrição do Perfil</label>
                <textarea class="form-control {{ $errors->has('areatexto') ? 'is-invalid' : ''}}" name="areatexto" id="areatexto" cols="3" rows="3"  > {{$usuario->descricao}}</textarea>
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
            <button class="btn btn-primary">Atualizar</button>
        </form>
    </div>
@endsection