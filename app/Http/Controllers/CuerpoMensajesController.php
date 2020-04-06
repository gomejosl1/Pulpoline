<?php

namespace App\Http\Controllers;
use DB;
use Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Store;
use App\Farmacias;
use App\MensajesFarmacia;
use App\MensajesDialisis;
class CuerpoMensajesController extends Controller
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
    public function index($form)
    {
         //

        if ($form == 'f') {
        $cuerpo_mensajes = MensajesFarmacia::first();
        return view('cuerpo_mensajes/create_farmacia',compact('cuerpo_mensajes','form'));
        }else{
        $cuerpo_mensajes = MensajesDialisis::first();
        return view('cuerpo_mensajes/create_dialisis',compact('cuerpo_mensajes','form'));
        }


        // dd($centros_medicos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('cuerpo_mensajes/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $data = request()->validate($this->rules());  
        // $status = "Error al registrar Farmacia!";            
        //     // dd($data);
        // $farmacia = DB::transaction(function() use ($data) {
        //     // dd($data     );
        //     Farmacias::create([
        //             'nombre' => $data['nombre'],
        //             'direccion' => $data['direccion']
        //     ]);
        // });
        
        // $status = "Farmacia Registrada con exito!";            
        // $route = redirect()->route("farmacias.index");    
        // return $route->with('status',$status);
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
        //
        // dd($id);
        // $farmacias = Farmacias::findOrFail(decrypt($id));        
        // return view('farmacias.edit', compact('farmacias'));  
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
        // dd($request->all()['form']);

        if ($request->all()['form'] == 'f') {
         $cuerpo_mensajes = MensajesFarmacia::findOrFail(decrypt($id));
          $data = request()->validate([
            'parteuno' => 'required|string|max:255',
            'partedos' => 'required|string|max:255',
            'partetres' => 'required|string|max:255',
        ]);  
          $updated = DB::transaction(function() use ($data, $cuerpo_mensajes) {
            $cuerpo_mensajes->fill([
                'parteuno' => $data['parteuno'],
                'partedos' => $data['partedos'],
                'partetres' => $data['partetres'],
            ])->save();

            return $cuerpo_mensajes;
        });

          return Redirect::back()->withStatus("Mensaje modificado con exito.");
        }else{
          $cuerpo_mensajes = MensajesDialisis::findOrFail(decrypt($id));
          $data = request()->validate([
            'parteuno' => 'required|string|max:255',
            'partedos' => 'required|string|max:255',
            'partetres' => 'required|string|max:255',
            'partecuatro' => 'required|string|max:255',
        ]);  
          $updated = DB::transaction(function() use ($data, $cuerpo_mensajes) {
            $cuerpo_mensajes->fill([
                'parteuno' => $data['parteuno'],
                'partedos' => $data['partedos'],
                'partetres' => $data['partetres'],
                'partecuatro' => $data['partecuatro'],
            ])->save();

            return $cuerpo_mensajes;
        });

          return Redirect::back()->withStatus("Mensaje modificado con exito.");
        }
        // //
        //   $farmacias = Farmacias::findOrFail(decrypt($id));
        //   $data = request()->validate([
        //     'nombre' => 'required|string|max:50|unique:farmacias',
        //     'direccion' => 'required|string|max:50',
        // ]);  
        //   $updated = DB::transaction(function() use ($data, $farmacias) {
        //     $farmacias->fill([
        //         'nombre' => $data['nombre'],
        //         'direccion' => $data['direccion'],
        //     ])->save();

        //     return $farmacias;
        // });

        //   return redirect()->route('farmacias.index')->withStatus("Farmacia modificada con exito.");
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
        // $farmacias = Farmacias::findOrFail(decrypt($id));
        // $farmacias->delete();
        // // $status = "Tipo de tienda eliminado con éxito.";   
        // return redirect()->route('farmacias.index')->withStatus("Farmacia eliminada con éxito.");
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
