<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\CentroMedico;
use App\Farmacias;
use App\Beneficiarios;

class BeneficiariosController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $beneficiarios = Beneficiarios::get();
        return view('beneficiarios/index',compact('beneficiarios'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $centros_medicos = CentroMedico::get();
        $farmacias = Farmacias::get();
        // dd($centros_medicos);
        return view('beneficiarios/create',compact('centros_medicos','farmacias'));
        // dd('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $data = request()->all();  
        $data = request()->validate([
            'nombre' => 'required|string|max:50',
            'cedula' => 'required|string|max:50|unique:beneficiarios',
            'telefono' => 'required|string|max:50|unique:beneficiarios',
            'correo' => 'required|string|max:50|unique:beneficiarios',
            'id_farmacia' => 'string|max:50',
            'id_centro_medico' => 'string|max:50',
            'fecha_dialisis' => 'string|max:50',
            'hora_dialisis' => 'string|max:50',
            'fecha_retiro' => 'string|max:50',
        ]);  
        $status = "Error al registrar beneficiario!";            
// dd($data);
        $beneficiario = DB::transaction(function() use ($data) {
// dd($data     );
            Beneficiarios::create($data);
        });

        $status = "Beneficiario Registrado con exito!";            
        $route = redirect()->route("beneficiarios.create");    
        return $route->with('status',$status);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {        
        $beneficiarios = Beneficiarios::findOrFail(decrypt($id));
        $centros_medicos = CentroMedico::get();
        $farmacias = Farmacias::get();
        // dd($beneficiarios->nombre);
        return view('beneficiarios/edit',compact('centros_medicos','farmacias','beneficiarios'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $beneficiarios = Beneficiarios::findOrFail(decrypt($id));
          $data = request()->validate([
            'nombre' => 'required|string|max:50',
            'cedula' => 'required|string|max:50|unique:beneficiarios,cedula,'.decrypt($id),
            'telefono' => 'required|string|max:50|unique:beneficiarios,telefono,'.decrypt($id),
            'correo' => 'required|string|max:50|unique:beneficiarios,correo,'.decrypt($id),
            'id_farmacia' => 'string|max:50',
            'id_centro_medico' => 'string|max:50',
            'fecha_dialisis' => 'string|max:50',
            'hora_dialisis' => 'string|max:50',
            'fecha_retiro' => 'string|max:50',
        ]);  
          $updated = DB::transaction(function() use ($data, $beneficiarios) {
            $beneficiarios->fill([
                'nombre' => $data['nombre'],
                'cedula' => $data['cedula'],
                'telefono' => $data['telefono'],
                'correo' => $data['correo'],
                'id_farmacia' => $data['id_farmacia'],
                'id_centro_medico' => $data['id_centro_medico'],
                'fecha_dialisis' => $data['fecha_dialisis'],
                'hora_dialisis' => $data['hora_dialisis'],
                'fecha_retiro' => $data['fecha_retiro'],
            ])->save();

            return $beneficiarios;
        });

          return redirect()->route('beneficiarios.index')->withStatus("Beneficiario modificado con exito.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $beneficiarios = Beneficiarios::findOrFail(decrypt($id));
        $beneficiarios->delete();
        return redirect()->route('beneficiarios.index')->withStatus("Beneficiario eliminado con éxito.");
    }
}
