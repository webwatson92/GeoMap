<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Type_piece;

class TypepController extends Controller
{
    public function list_user()
    {
        $typep = Type_piece::with('cooperatives')->paginate(10);
        return view("back.societale.typepeice.list_typep", compact('typep'));
    }

    public function index()
    {
        $typep = Type_piece::All();
        return view("back/societale/typepiece/list_typep", compact('typep'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $typep = Type_piece::All();
        return view("back/societale/typepiece/add_typep", compact("typep"));
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

        $typep = new Type_piece;
        $typep->nom = $request['nom'];
        //dd($typep->nom);
        $typep->save();

        return redirect()->route('magso_typep_list');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Type_piece $typep, $id)
    {
        $typep = Type_piece::findOrFail($id);

        return view("back/societale/typepiece/mod_typep", compact('typep'));
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
    public function update(Request $request, Type_piece $typep, $id)
    {
            $typep = Type_piece::findOrFail($id);
            $typep->update([
                'nom' => $request->nom
            ]);
            return redirect()->route('magso_typep_list', compact(['typep']))->with('success', 'Mise à jour réussir !!!');
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
        Type_piece::where('id', $id)->delete();

        return redirect()->back();
    }
}
