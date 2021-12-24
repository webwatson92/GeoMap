<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mediconesystems\LivewireDatatables\{ 
    Http\Livewire\LivewireDatatable,
    Column,
    NumberColumn,
    DateColumn};
use App\Models\{User, Type_piece, Cooperative, Speculation, Plantation, Member};
use Hash;
use Image;

class MagsoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $model = User::class;

    public function columns()
    {
        return [
            NumberColumn::name('id')
                ->label('ID')
                ->checkbox(),  
            Column::name('name')->link('/', 'Modifier {{name}}')
                ->label('Nom')
                ->searchable(),
            Column::name('email')
                ->searchable(),
            Column::name('profile_photo_path')
            ,
            DateColumn::name('created_at')
                ->label('Date de création')
        ];
    }

    public function list_user()
    {
        //$users = User::with('cooperatives')->paginate(10);
        $members = Member::paginate(10);
;       //dd($members);
        return view("back.societale.list_member", compact('members'));
    }

    public function index()
    {
        $users = User::All();
        $speculations = Speculation::All();
        $plantations = Plantation::All();
        return view("back.societale.index", compact('users', "speculations", "plantations"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $members = User::all();
        $type_p = Type_piece::All();
        $cooperative = Cooperative::All();
        return view("back.societale.add_member", compact("type_p", "cooperative", 'members'));
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
            'cooperative' => 'string',
            'name' => 'string|required',
            'prenom' => '',
            'date_naissance' => '',
            'lieu' => '',
            'situation_mat' => '',
            'civilite' => '',
            'police_a' => '',
            'type_p' => '',
            'numero_p' => '',
            'tel' => '',
            'mobile' => '',
            'adresse' => '',
            'email' => 'required|unique:users|string',
            'interlocuteur' => '',
            'tel_interlocuteur' => '',
            'user_id' => '|string',
            'profile_photo_path' => 'image|mimes:jpg,JPG,jpeg,png,PNG'

        ]);

        $user = new Member;
        $user->code = $request['code'];
        $user->cooperative = $request['cooperative'];
        $user->name = $request['name'];
        $user->prenom = $request['prenom'];
        $user->date_naissance = $request['date_naissance'];
        $user->lieu = $request['lieu'];
        $user->situation_mat = $request['situation_mat'];
        $user->civilite = $request['civilite'];
        $user->police_a = $request['police_a'];
        $user->type_p = $request['type_p'];
        $user->numero_p = $request['numero_p'];
        $user->tel = $request['tel'];
        $user->mobile = $request['mobile'];
        $user->adresse = $request['adresse'];
        $user->email = $request['email'];
        $user->interlocuteur = $request['interlocuteur'];
        $user->tel_interlocuteur = $request['tel_interlocuteur'];
        $user->user_id = $request['user_id'];
               
        if($request->hasFile('profile_photo_path')){
                $image=$request->file('profile_photo_path');
                $filename= time() .'.'. $image->getClientOriginalExtension();
                $location= public_path('img/photo/'.$filename);
                //dd($location);
                Image::make($image)->resize(800, 400)->save($location);
                $user->profile_photo_path = $filename;
        }
        $user->save();

        return redirect()->route('magso_member_list');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $users, $id)
    {
        $members = Member::findOrFail($id);
        //dd($users->profile_photo_path);
        $type_p = Type_piece::All();
        $cooperative = Cooperative::All();
        //$cooperative = Cooperative::first();
        //dd($cooperative->user_id);
        return view("back.societale.mod_member", compact('members', 'type_p', 'cooperative'));
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
    public function update(Request $request, User $user, $id)
    {
            $users=Member::findOrFail($id);
            if($request->hasFile('profile_photo_path')){
                $image=$request->file('profile_photo_path');
                $filename= time() .'.'. $image->getClientOriginalExtension();
                $location= public_path('img/photo/'.$filename);
                //dd(strtolower($filename));
                $str = strtolower($filename);
                Image::make($image)->resize(800, 400)->save($location);
                $users->profile_photo_path = $filename;
            }

            $users->update([
                'code' => $request->code,
                'cooperative' => $request->cooperative,
                'name' => $request->name,
                'prenom' => $request->prenom,
                'date_naissance' => $request->date_naissance,
                'lieu' => $request->lieu,
                'situation_mat' => $request->situation_mat,
                'civilite' => $request->civilite,
                'police_a' => $request->police_a,
                'type_p' => $request->type_p,
                'numero_p' => $request->numero_p,
                'tel' => $request->tel,
                'mobile' => $request->mobile,
                'adresse '=> $request->adresse,
                'email '=> $request->email,
                'interlocuteur' => $request->interlocuteur,
                'tel_interlocuteur' => $request->tel_interlocuteur,
                'role' => $request->role,
                'profile_photo_path' => $users->profile_photo_path
            ]);
            //dd($users->profile_photo_path);
            return redirect()->route('magso_member_list', compact(['users']))->with('success', 'Mise à jour réussir !!!');
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
        User::where('id', $id)->delete();

        return redirect()->back();
    }

 


}
