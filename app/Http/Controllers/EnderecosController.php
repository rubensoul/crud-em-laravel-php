<?php

namespace App\Http\Controllers;

use App\Enderecos;
use App\Pacientes;

use Illuminate\Http\Request;

class EnderecosController extends Controller
{

public function index(){

}
public function show($id){

}






public function create(Request $request){

    $id = $request->input('pacientes_id'); // Paciente ID

      if ($id == null || $id == "") {
          return redirect()->route('pacientes.index');
     } 
     else {

    $enderecos = Pacientes::findOrFail($id);
    return view('enderecos.index', compact('enderecos', $enderecos));

     }


}








public function store(Request $request){
    
  $this->validate($request, [
            'rua' => 'required',
            'nome_bairro' => 'required',
            
        ]);

  // create new data
$enderecos = new enderecos;
$enderecos->rua = $request->rua;
$enderecos->nome_bairro = $request->nome_bairro;
$enderecos->status = $request->status;
$enderecos->pacientes_id = $request->pacientes_id;


$enderecos->save();

return redirect()->route('pacientes.index')->with('alert-success','Data Hasbeen Saved!');


}




// Aqui editamos os dados do paciente
public function edit($id){

    $enderecos = Enderecos::findOrFail($id);
    return view('enderecos.edit', compact('enderecos'));
}




public function update(Request $request, $id){

    $this->validate($request, [
            'rua' => 'required',
            'nome_bairro' => 'required',
            
        ]);


  // create new data
$enderecos = Enderecos::findOrFail($id);
$enderecos->rua = $request->rua;
$enderecos->nome_bairro = $request->nome_bairro;
$enderecos->status = $request->status;

$enderecos->save();


return redirect()->route('pacientes.index')->with('alert-success','Data Hasbeen Saved!');
}



public function destroy($id){
    $enderecos = Enderecos::findOrFail($id);
    $enderecos->delete();
    return redirect()->route('pacientes.index')->with('alert-success','Data Hasbeen Saved!');
}



}
