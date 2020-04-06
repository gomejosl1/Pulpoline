<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Store;
use App\CentroMedico;
class CentroMedicoController extends Controller
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
        $centros_medicos = CentroMedico::get();
        // dd($centros_medicos);
        return view('centro_medico/index',compact('centros_medicos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('centro_medico/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = request()->validate($this->rules());  
        $status = "Error al registrar Centro Médico!";            
            // dd($data);
        $farmacia = DB::transaction(function() use ($data) {
            // dd($data     );
            CentroMedico::create([
                    'nombre' => $data['nombre'],
                    'direccion' => $data['direccion']
            ]);
        });
        
        $status = "Centro Médico Registrado con exito!";            
        $route = redirect()->route("centro_medico.index");    
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
        dd($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // dd(decrypt($id));
        // $solicitud = TipoTiendaComercializacion::findOrFail(decrypt($id));
        $centro_medico = CentroMedico::findOrFail(decrypt($id));
        // dd($solicitud);
        // $estatus = Estatus::pluck('nombre','id');

        return view('centro_medico.edit', compact('centro_medico'));  
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
        $centro_medico = CentroMedico::findOrFail(decrypt($id));
        $data = request()->validate([
            'nombre' => 'required|string|max:50|unique:centro_medico',
            'direccion' => 'required|string|max:50',
        ]);  
        $updated = DB::transaction(function() use ($data, $centro_medico) {
            $centro_medico->fill([
                'nombre' => $data['nombre'],
                'direccion' => $data['direccion'],
            ])->save();

            return $centro_medico;
        });

        return redirect()->route('centro_medico.index')->withStatus("Centro Médico modificado con exito.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $solicitud = CentroMedico::findOrFail(decrypt($id));
        $solicitud->delete();
        // $status = "Tipo de tienda eliminado con éxito.";   
          return redirect()->route('centro_medico.index')->withStatus("Centro Médico eliminado con éxito.");
    }

     protected function rules()
    {
        $rules = [
            'nombre' => 'required',            
            'direccion' => 'required',        
        ];
        return $rules;
    }
}
