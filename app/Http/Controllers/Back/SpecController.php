<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Speculation;

class SpecController extends Controller
{
    public function index()
    {
        $spec = Speculation::All();
        return view("back/societale/speculation/list_spec", compact('spec'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $spec = Speculation::All();
        return view("back/societale/speculation/add_spec", compact("spec"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->validate($request, [
            'nom' => 'string|required'

        ]);

        $spec = new Speculation;
        $spec->nom = $request['nom'];
        //dd($spec->nom);
        $spec->save();
        $spec->plantations()->attach($request['plantation_id']);

        return redirect()->route('magso_spec_list');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Speculation $spec, $id)
    {
        $spec = Speculation::findOrFail($id);

        return view("back/societale/speculation/mod_spec", compact('spec'));
    }

    /**
     * Show the form for editing the specified resource.
     *
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Speculation $spec, $id)
    {
            $spec = Speculation::findOrFail($id);
            $spec->update([
                'nom' => $request->nom
            ]);
            return redirect()->route('magso_spec_list', compact(['spec']))->with('success', 'Mise à jour réussir !!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //dd("delete");
        Speculation::where('id', $id)->delete();

        return redirect()->back();
    }
}
