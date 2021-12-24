<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Speculation, Plantation, User, Member};


class PlantController extends Controller
{
    public function index()
    {
        $speculations = Speculation::with('plantations')->orderByDesc('created_at')->paginate(10);
        $plant = Plantation::with('user', 'member')->orderByDesc('created_at')->paginate(5);
        //dd($plant);
        /*foreach($plant as $p){
            foreach($p->user as $pl){
                dd($p->latitude);
            }
        }*/
        return view('back/societale/plantation/list_plant', compact('speculations', 'plant'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $spec = Speculation::all();
        $users = User::all();
        $members = Member::all();
        //dd($spec);
        return view("back.societale.plantation.add_plant", compact('spec', 'users', 'members'));
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
            'code' => '',
            'date' => 'string|required',
            'speculation_id' => 'string|required',
            'longitude' => 'string|required',
            'latitude' => 'string|required',
            'lieu' => 'string|required',
            'member_id' => 'string|required',
            'user_id' => 'string|required',
        ]);

        $plantation = new Plantation;
        $plantation->code = $request['code'];
        $plantation->date = $request['date'];
        $plantation->speculation_id = $request['speculation_id'];
        $plantation->longitude = $request['longitude'];
        $plantation->latitude = $request['latitude'];
        $plantation->lieu = $request['lieu'];
        $plantation->member_id = $request['member_id'];
        $plantation->user_id = $request['user_id'];
       
        $plantation->save();
        $plantation->speculations()->attach($request['speculation_id']);
        return redirect()->route('magso_plant_list', compact('plantation'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Plantation $plantation, $id)
    {   
         $users=User::all();
         $members=Member::all();
         $spec = Speculation::all();
         $plantation = Plantation::findOrFail($id);
        //dd($plantation->user_id);
        return view("back.societale/plantation/mod_plant", compact('plantation', 'spec', 'members', 'users'));
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
    public function update(Request $request, Plantation $plantation, $id)
    {
            $plantation=Plantation::findOrFail($id);
            $this->validate($request, [
                'code' => '',
                'date' => 'string|required',
                'speculation_id' => 'string|required',
                'longitude' => 'string|required',
                'latitude' => 'string|required',
                'lieu' => 'string|required',
                'member_id' => 'string|required',
                'user_id' => 'string|required',
            ]);
            $plantation->update([
                'code' => $request->code,
                'date' => $request->date,
                'longitude' => $request->longitude,
                'latitude' => $request->latitude,
                'speculation' => $request->speculation,
                'lieu' => $request->lieu,
                'member_id' => $request->member_id,
                'user_id' => $request->user_id,
            ]);
            //dd($articles);
            return redirect()->route('magso_plant_list', compact(['plantation']))->with('success', 'Mise à jour réussir !!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Plantation::where('id', $id)->delete();

        return redirect()->back();
    }

    public function map(Plantation $plantation, $id)
    {       //5.3484461 -4.0497051            
            $plantations = Plantation::where('id', $id)->get();
            //dd($plantations);
            return view('back.societale/map', compact('plantations'));
    }
}
