<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mediconesystems\LivewireDatatables\{ 
    Http\Livewire\LivewireDatatable,
    Column,
    NumberColumn,
    DateColumn};
use App\Models\{User};
use Hash;
use Image;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $model = User::class;

    public function list_user()
    {
        $users = User::paginate(10);
        return view("back.societale.users.list_user", compact('users'));
    }

    public function index()
    {
        $users = User::All();
        return view("back.societale.users.index", compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $users = User::all();
        return view("back.societale.users.add_user", compact('users'));
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
            'name' => 'string|required',
            'email' => 'required|unique:users|string',
            'password' => 'required|string',
            'role' => 'required|string',

        ]);

        $user = new User;
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->password = Hash::make($request['password']);
        $user->role = $request['role'];
               
        if($request->hasFile('profile_photo_path')){
                $image=$request->file('profile_photo_path');
                $filename= time() .'.'. $image->getClientOriginalExtension();
                $location= public_path('img/photo/'.$filename);
                //dd($location);
                Image::make($image)->resize(800, 400)->save($location);
                $user->profile_photo_path = $filename;
        }
        $user->save();

        return redirect()->route('magso_user_list');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $users, $id)
    {
        $users = User::findOrFail($id);
        return view("back.societale.users.mod_user", compact('users'));
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
            $users=User::findOrFail($id);
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
                'name' => $request->name,
                'email '=> $request->email,
                'password '=> $request->password,
                'role' => $request->role,
                'profile_photo_path' => $request->role,
            ]);
            //dd($users->profile_photo_path);
            return redirect()->route('magso_user_list', compact(['users']))->with('success', 'Mise à jour réussir !!!');
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
