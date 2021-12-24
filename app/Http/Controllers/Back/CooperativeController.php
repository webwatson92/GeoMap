<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{User, Cooperative, Member};

class CooperativeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coop = Cooperative::with('user')->paginate(10);
        //dd($coop);
        return view('back/societale/cooperative/list_coop', compact('coop'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $members=Member::all();
        return view("back.societale.cooperative.add_coop", compact('members'));
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
            'intitule' => 'string',
            'responsable' => 'string',
            'contact' => 'string|required',
        ]);

        $cooperative = new Cooperative;
        $cooperative->intitule = $request['intitule'];
        $cooperative->responsable = $request['responsable'];
        $cooperative->contact = $request['contact'];
      
        $cooperative->save();

        return redirect()->route('magso_coop_list', compact('cooperative'))->with ('status', __('Coopérative ajoutée avec succès.'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $users, $id)
    {   
        $members=Member::all();
         $cooperative = Cooperative::findOrFail($id);
        //dd($cooperative->user_id);
        return view("back.societale/cooperative/mod_coop", compact('cooperative', 'members'));
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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cooperative $cooperative, $id)
    {
            $cooperative=Cooperative::findOrFail($id);
            $cooperative->update([
                'intitule' => $request->intitule,
                'responsable' => $request->responsable,
                'contact' => $request->contact,
                'member_id' => $request->member_id
            ]);
            //dd($articles);
            return redirect()->route('magso_coop_list', compact(['cooperative']))->with('success', 'Mise à jour réussir !!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cooperative::where('id', $id)->delete();

        return redirect()->back();
    }
}
