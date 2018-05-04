@extends('layouts.app')

@section('content')


  <div class="container">
    <hr>
    <div class="row">
      <div class="col-md-12">
        <div class="widget-box">
        <h2>Editar endereço: <strong>{{$enderecos->id}}</strong></h2>
        <hr>
          <div class="widget-content">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif    
            
            
            <form action="{{route('enderecos.update', $enderecos->id)}}" method="post" class="form-horizontal">
                <input name="_method" type="hidden" value="PATCH">
                {{csrf_field()}}


                <div class="form-group">
                    <label for="rua">Nome da rua</label>
                    <input type="text" class="form-control" name="rua" placeholder="Rua" value="{{$enderecos->rua}}">
                    <small id="rua" class="form-text text-muted">Entre com a rua do paciente</small>
                       @if ($errors->has('rua'))
                        <span class="help-block" style="color: red">
                            <strong>Por favor, preencha a rua</strong>
                        </span>
                      @endif
                </div>

                <div class="form-group">
                    <label for="nome_bairro">Nome do bairro</label>
                    <input type="text" class="form-control" name="nome_bairro" placeholder="Nome do Bairro" value="{{$enderecos->nome_bairro}}">
                    <small id="nome_bairro" class="form-text text-muted">Entre com o nome do bairro do paciente</small>

                       @if ($errors->has('nome_bairro'))
                        <span class="help-block" style="color: red">
                            <strong>Por favor, preencha nome do bairro</strong>
                        </span>
                      @endif                  
                </div>


                    <div class="form-group">
                    <label for="status">Status</label>
                    <select class="form-control" id="status" name="status">
                        <option selected value="{{$enderecos->status}}"> @if($enderecos->status == 1) Ativo @else Inativo @endif </option>
                        <option value="1" selected>Ativo</option>
                        <option value="0">Inativo</option>

                    </select>
                    </div>
                   
              <div class="form-actions">
                <button type="submit" class="btn btn-success">Editar Endereço</button>
                <a href="{{ url('pacientes/') }}" class="btn btn-default">Voltar para Pacientes</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>


@endsection
