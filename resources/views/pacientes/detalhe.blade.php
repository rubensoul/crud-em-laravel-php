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
          <div class="widget-title"> 
          <h3>Paciente <strong>{{$detalhe->nome}}</strong></h3>
          </div>
          <div class="widget-content nopadding">
                                  
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
                
                </tr>
              </thead>
              <tbody style="font-size:14px;">
              

                <tr class="gradeX">
                  <td>{{$detalhe->id }}</td>
                  <td>{{$detalhe->nome}}</td>
                  <td>{{$detalhe->nome_mae}}</td>
                  <td>{{$detalhe->nome_pai}}</td>
                  <td>{{$detalhe->email}}</td>
                  <td><?php echo date('d/m/Y', strtotime($detalhe->created_at)); ?></td>
                  <td>
                    @if($detalhe->status == 1)  
                   Ativo
                    @else 
                    Inativo
                    @endif
                </td>

                  

                </tr>
              </tbody>
            </table>
          

         <a href="{{route('pacientes.edit',$detalhe->id)}}" class="btn btn-success mb-2"> Editar paciente</a>
         <br>


            <h3>Endereços do paciente:</h3>
            <table class="table table-bordered data-table table-striped">
              <thead>
                <tr>
                  <th>Nº</th>
                  <th>Nome da Rua</th>
                  <th>Bairro</th>
                  <th>Status</th>
                  <th>Data</th>
                  <th>Ação</th>
                </tr>
              </thead>
              <tbody style="font-size:14px;">
              
     @foreach($detalhe->enderecos as $de)
           
                <tr class="gradeX">
                  <td>{{$de->id}}</td>
                  <td>{{$de->rua}}</td>
                  <td> {{$de->nome_bairro}}</td>
                  <td>
                    @if($de->status == 1)  
                   Ativo
                    @else 
                    Inativo
                    @endif
                </td>
                <td><?php echo date('d/m/Y', strtotime($de->created_at)); ?></td>
           
             
    <td>

      <form class="" action="{{route('enderecos.destroy',$de->id)}}" method="post">
        <input type="hidden" name="_method" value="delete">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
       
        <!-- Editar e Excluir -->
            <a href="{{route('enderecos.edit',$de->id)}}" class="btn btn-sm btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</a>
            <input type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Deseja realmente excluir?');"  value="Excluir">
   


      </form>




    </td>



                </tr>

                 @endforeach

              </tbody>
            </table>

                   <form action="{{url('enderecos/create')}}" method="post" class="form-horizontal">
                    {{csrf_field()}}
                    <input type="hidden" name="pacientes_id" value="{{ $detalhe->id }}">                    
                    <button type="submit" class="btn btn-success" >Cadastrar novo endereço</button>
                </form>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>







@endsection