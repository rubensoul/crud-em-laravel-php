<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pacientes;

class PacientesController extends Controller
{
       
public function index(){
    $pacientes = Pacientes::all();
    return view('pacientes.index', ['pacientes' => $pacientes]);

}
public function show($id){

    $detalhe = Pacientes::where('id', $id)->first();
    return view('pacientes.detalhe', compact('detalhe', $detalhe));

}

public function create(){
    return view('pacientes.criar');
}


public function store(Request $request){
    
  $this->validate($request, [
            'nome' => 'required',
            'nome_mae' => 'required',
            'email' => 'required'

        ]);

  // create new data
$pacientes = new pacientes;
$pacientes->nome = $request->nome;
$pacientes->nome_mae = $request->nome_mae;
$pacientes->nome_pai = $request->nome_pai;
$pacientes->email = $request->email;
$pacientes->status = $request->status;

$pacientes->save();


return redirect()->route('pacientes.index')->with('alert-success','Data Hasbeen Saved!');
}


// Aqui editamos os dados do paciente
public function edit($id){

    $pacientes = Pacientes::findOrFail($id);
    return view('pacientes.edit',compact('pacientes'));
}


public function update(Request $request, $id){

      $this->validate($request, [
            'nome' => 'required|min:3',
            'nome_mae' => 'required|min:3',
            'nome_pai' => 'required|min:3',
            'email' => 'required'

        ]);

  // create new data
$pacientes = Pacientes::findOrFail($id);;
$pacientes->nome = $request->nome;
$pacientes->nome_mae = $request->nome_mae;
$pacientes->nome_pai = $request->nome_pai;
$pacientes->email = $request->email;
$pacientes->status = $request->status;

$pacientes->save();


return redirect()->route('pacientes.index')->with('alert-success','Data Hasbeen Saved!');
}

public function destroy($id){
    $pacientes = Pacientes::findOrFail($id);
    $pacientes->delete();
    return redirect()->route('pacientes.index')->with('alert-success','Data Hasbeen Saved!');
}
}
