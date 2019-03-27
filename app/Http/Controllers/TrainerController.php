<?php

namespace proyectoPokemon\Http\Controllers;
use proyectoPokemon\Trainer;
use Illuminate\Http\Request;

class TrainerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trainers = Trainer::all();
        return view('trainers.index', compact('trainers')); //compact es un array trae un listado de los trainers
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('trainers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name'=>'required|max: 10',
            'avatar'=>'required|image',
            'slug'=>'required'
        ]);
        
        
        if($request->hasFile('avatar')){//esta condicional se usa xq el archivo del avatar se tiene que tratar de otra manera diferente que un string
            $file = $request->file('avatar');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/images/',$name);
            //return $name;
        }
        $trainer = new Trainer();                
        $trainer->name = $request->input('name');
        $trainer->avatar = $name;                
        $trainer->slug = $request->input('slug');
        $trainer->save();
        return 'Guardado';
        //return $request->input('name');
        //return $request->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Trainer $trainer)
    {
        //$trainer = Trainer::where('slug','=',$slug)->firstOrFail(); //firstOrfail nos lanza una excepencion en caso de que no encuentre el modelo que estamos buscando
        //$trainer = Trainer::find($id); quitamos el $id de parametros y ahora Usemos el implicit binin donde las variables las instanciamos desde el modelo
        //Que es es el implicit binding: es el que resuelve de manera automatica los modelos definidos en eloquent
        //Y para el uso del implicit pasariamos por prametro en vez de $id seria: Trainer $trainer
        return view('trainers.show', compact('trainer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Trainer $trainer)
    {
        return view('trainers.edit', compact('trainer'));//compact sirve para retornar el entrenador en edit
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Trainer $trainer)
    {
        $trainer->fill($request->except('avatar'));//fil se encarga de actualizar los datos q estamos enviando
        //usamos except xq en el momento en q se actualizan los datos con fill no soporta un archivo que seria el avantar o la imagen
        if($request->hasFile('avatar')){ //esta condicional se usa xq el archivo del avatar se tiene que tratar de otra manera diferente que un string
            $file = $request->file('avatar');
            $name = time().$file->getClientOriginalName();
            $trainer->avatar = $name; //actualizamos el nuevo avatar en el campo de la bd
            $file->move(public_path().'/images/',$name);
            //return $name;
        }
        $trainer->save();
        return "Modificado con exito";
        //es importante resaltar que en el modelo de trainer para que se puedan editar los campos hay q agregar en el modelo de trainer la siguiente sentencia protected $fillable = ['name', 'avantar'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Trainer $trainer)
    {
        $file_path = public_path().'/images/'.$trainer->avatar;
        \File::delete($file_path);
        $trainer->delete();
        return $trainer;
    }
}
