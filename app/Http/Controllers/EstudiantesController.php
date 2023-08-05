<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use Illuminate\Http\Request;

class EstudiantesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Estudiante::all();
    }


    /**
    * Store a newly created resource in storage.
    *
    * @param \Illuminate\Http\Request $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        $inputs = $request->input();
        $e = Estudiante::create($inputs);
        return response()->json([
            'data'=>$e,
            'message' => "Estudiante creado con exito",
        ]);
    }
    /**
     * Display the specified resouce.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $e = Estudiante::find($id);
        if(isset($e)){
            return response()->json([
                'data'=> $e,
                'message'=> "Estudiante encontrado con exito"
            ]);
        }else{
            return response()->json([
                'error'=>true,
                'message'=>'No se encontro el estudiante',
            ]);
        }
    }



    /**
     *Update the specified resource in storage.
    *
    * @param \Illuminate\Http\Request $request
    * @param int $id
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, $id)
    {
        $e = Estudiante::find($id);
         if (isset($e)){
            $e -> nombre = $request -> nombre;
            $e -> apellido = $request -> apellido;
            $e -> foto = $request -> foto;
            if ($e->save()){
                return response()->json([
                    'data'=>$e,
                    'message' => "Estudiante actualizado con exito",
                ]);
            }else{
                return response()->json([
                    'error'=>true,
                    'message' => "Estudiante no actualizado",
                ]);
            }
        }else{
            return response()->json([
                'error'=>true,
                'message' => "No existe el estudiante",
            ]);
        }
    }
    /**
    * Remove the specified resource from storage.
    *
    *@param  int  $id
    *@return \Illuminate\Http\Response
    */
    public function destroy($id)
    {
        $e = Estudiante::find($id);
        if(isset($e)){
            $res = Estudiante::destroy($id);
            if($res){
                return response()->json([
                'data'=> $e,
                'message'=> "Estudiante eliminado con exito"
            ]);
            }else{
                return response()->json([
                    'data'=>$e,
                    'message'=> "Estudiante no existe"
                ]);
            }

        }else{
            return response()->json([
                'error'=>true,
                'message'=>'No se encontro el estudiante',
            ]);
        }
    }

}
