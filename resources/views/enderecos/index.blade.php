@extends('layouts.app')

@section('content')


  <div class="container">
    <hr>
    <div class="row">
      <div class="col-md-12">
        <div class="widget-box">
        <h2>Cadastrar novo endereço para: <strong>{{$enderecos->id}} - {{ $enderecos->nome }}</strong></h2>
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
            
            
            <form action="{{route('enderecos.store')}}" method="post" class="form-horizontal">
                {{csrf_field()}}


                <div class="form-group">
                    <label for="rua">Nome da rua</label>
                    <input type="text" class="form-control" name="rua" placeholder="Rua">
                    <small id="rua" class="form-text text-muted">Entre com a rua do paciente</small>
                       @if ($errors->has('rua'))
                        <span class="help-block" style="color: red">
                            <strong>Por favor, preencha a rua</strong>
                        </span>
                      @endif
                </div>

                <div class="form-group">
                    <label for="nome_bairro">Nome do bairro</label>
                    <input type="text" class="form-control" name="nome_bairro" placeholder="Nome do Bairro">
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
                        <option value="1" selected>Ativo</option>
                        <option value="0">Inativo</option>

                    </select>
                    </div>
                    <input type="hidden" name="pacientes_id" value="{{ $enderecos->id }}">
                   
              <div class="form-actions">
                <button type="submit" class="btn btn-success">Cadastrar Endereço</button>
                <a href="{{ url('pacientes', $enderecos->id) }}" class="btn btn-default">Voltar para Pacientes</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>


@endsection
