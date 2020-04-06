<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Store;
use App\Farmacias;
class FarmaciasController extends Controller
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
        $farmacias = Farmacias::get();
        // dd($centros_medicos);
        return view('farmacias/index',compact('farmacias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('farmacias/create');
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
        $status = "Error al registrar Farmacia!";            
            // dd($data);
        $farmacia = DB::transaction(function() use ($data) {
            // dd($data     );
            Farmacias::create([
                    'nombre' => $data['nombre'],
                    'direccion' => $data['direccion']
            ]);
        });
        
        $status = "Farmacia Registrada con exito!";            
        $route = redirect()->route("farmacias.index");    
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
        //
        $farmacias = Farmacias::findOrFail(decrypt($id));        
        return view('farmacias.edit', compact('farmacias'));  
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
          $farmacias = Farmacias::findOrFail(decrypt($id));
          $data = request()->validate([
            'nombre' => 'required|string|max:50|unique:farmacias',
            'direccion' => 'required|string|max:50',
        ]);  
          $updated = DB::transaction(function() use ($data, $farmacias) {
            $farmacias->fill([
                'nombre' => $data['nombre'],
                'direccion' => $data['direccion'],
            ])->save();

            return $farmacias;
        });

          return redirect()->route('farmacias.index')->withStatus("Farmacia modificada con exito.");
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
        $farmacias = Farmacias::findOrFail(decrypt($id));
        $farmacias->delete();
        // $status = "Tipo de tienda eliminado con éxito.";   
        return redirect()->route('farmacias.index')->withStatus("Farmacia eliminada con éxito.");
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
