<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Saludo;

class HolaController extends Controller
{
    public function index(){
		$saludos =  Saludo::latest()->get();
		return view('/hola', compact('saludos'));
	}

	public function saludar(Request $request){
		$request->validate([
			'nombre' => 'required|string|max:255'
		]);

		Saludo::create(['nombre'=>$request->nombre]);
		return redirect()->route('saludos.index')->with('success', "¡Hola, $request->nombre! Tu saludo fue registrado.");
	}

	public function destroy($id){
		$saludo = Saludo::findOrFail($id);
		$saludo->delete();
		return redirect()->route('saludos.index')->with('success', 'El saludo fue eliminado correctamente.');
	}

	public function edit($id){
		$saludo = Saludo::findOrFail($id);
		return view('editar_saludo', compact('saludo'));
	}

	public function update(Request $request, $id){
		$request->validate([
			'nombre' => 'required|string|max:255'
		]);

		$saludo = Saludo::findOrFail($id);
		$saludo->update(['nombre' => $request->nombre]);

		return redirect()->route('saludos.index')
						->with('success', 'El saludo fue actualizado correctamente.');
	}
}

