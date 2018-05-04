@extends('layouts.app')

@section('content')


  <div class="container">
    <hr>
    <div class="row">
      <div class="col-md-12">
        <div class="widget-box">
        <h2>Cadastrar novo paciente</h2>
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
            
            <form action="{{route('pacientes.update', $pacientes->id)}}" method="post" class="form-horizontal">
              <input name="_method" type="hidden" value="PATCH">
                {{csrf_field()}}


                <div class="form-group">
                    <label for="nome">Nome</label>
                <input type="text" class="form-control" name="nome" placeholder="Nome" value="{{$pacientes->nome}}">
                    <small id="nome" class="form-text text-muted">Entre com o nome do paciente</small>
                       @if ($errors->has('nome'))
                        <span class="help-block" style="color: red">
                            <strong>Por favor, preencha nome </strong>
                        </span>
                      @endif
                </div>

                <div class="form-group">
                    <label for="nome_mae">Nome da mãe</label>
                    <input type="text" class="form-control" name="nome_mae" placeholder="Nome da mãe" value="{{$pacientes->nome_mae}}">
                    <small id="nome_mae" class="form-text text-muted">Entre com o nome da mãe do paciente</small>
                       @if ($errors->has('nome_mae'))
                        <span class="help-block" style="color: red">
                            <strong>Por favor, preencha nome da mãe do paciente</strong>
                        </span>
                      @endif
                </div>


                 <div class="form-group">
                    <label for="nome_pai">Nome do pai</label>
                    <input type="text" class="form-control" name="nome_pai" placeholder="Nome do pai" value="{{$pacientes->nome_pai}}">
                    <small id="nome_pai" class="form-text text-muted">Entre com o nome do pai do paciente</small>
                       @if ($errors->has('nome_pai'))
                        <span class="help-block" style="color: red">
                            <strong>Por favor, preencha nome do pai do paciente</strong>
                        </span>
                      @endif
                </div>


                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="E-mail" value="{{$pacientes->email}}">
                    <small id="email" class="form-text text-muted">Entre com o e-mail do paciente</small>
                       @if ($errors->has('email'))
                        <span class="help-block" style="color: red">
                            <strong>Por favor, preencha e-mail</strong>
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

              <div class="form-actions">
                <button type="submit" class="btn btn-success">Atualizar</button>
                 <a href="{{ url('/pacientes') }}" class="btn btn-default">Voltar</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>


@endsection
