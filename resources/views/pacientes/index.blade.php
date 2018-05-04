@extends('layouts.app')

@section('content')

<style>
td:first-letter {
text-transform:uppercase;
}
</style>

  <div class="container">
    <hr>
    <div class="row">
      <div class="col-md-12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="fa fa-th"></i></span>
            <h5>Pacientes</h5>
          </div>
          <div class="widget-content nopadding">
                @if (count($pacientes) > 0)
                     
                   <a href="{{route('pacientes.create')}}" class="btn btn-success" style="margin-bottom:10px;"> Criar paciente</a>
              
            <table class="table table-bordered data-table table-striped">
              <thead>
                <tr>
                  <th>Nº</th>
                  <th>Nome</th>
                  <th>Nome da mãe</th>
                  <th>Nome do pai</th>
                  <th>Email</th>
                  <th>Data</th>
                  <th>Status</th>
                  <th>Ação</th>
                </tr>
              </thead>
              <tbody style="font-size:14px;">
              

                @foreach ($pacientes as $o)
                <tr class="gradeX">
                  <td>{{ $o->id }}</td>
                  <td>{{$o->nome}}</td>
                  <td>{{$o->nome_mae}}</td>
                  <td>{{$o->nome_pai}}</td>
                  <td>{{$o->email}}</td>
                  <td><?php echo date('d/m/Y', strtotime($o->created_at)); ?></td>
                  <td>
                    @if($o->status == 1)  
                   Ativo
                    @else 
                    Inativo
                    @endif
                </td>

                  
             
    <td>

      <!-- Button trigger modal -->





      <form class="" action="{{route('pacientes.destroy',$o->id)}}" method="post">
        <input type="hidden" name="_method" value="delete">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <a href="{{url('pacientes', $o->id)}}" class="btn btn-info"> Ver detalhes</a>
          
        <!-- Editar e Excluir -->
            <a href="{{route('pacientes.edit',$o->id)}}" class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</a>
            <input type="submit" class="btn btn-danger" onclick="return confirm('Deseja realmente excluir?');"  value="Excluir">
   


      </form>

    </td>



                </tr>
                @endforeach
      
              </tbody>
            </table>
               @else 
                    <p> Ainda não tem nenhum paciente cadastrado</p> <a href="{{route('pacientes.create')}}" class="btn btn-success"> Criar paciente</a><br>
                @endif
          </div>
        </div>
      </div>
    </div>
  </div>
</div>







@endsection