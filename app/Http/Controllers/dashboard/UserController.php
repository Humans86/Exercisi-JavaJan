<?php

namespace App\Http\Controllers\dashboard;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserPost;
use App\Http\Requests\UpdateUserPut;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct()
     {
        $this->middleware(['auth','rol.admin']);
     }
    public function index()
    {
        $users = User::orderBy('created_at','desc')->get();
        return view('dashboard.user.index',['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('dashboard.user.create',['user'=>new user()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserPost $request)
    {
        User::create(
            [
            'name' => $request['name'],
            'rol_id' => 2,
            'surname' => $request['surname'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            ]
            );
            return back()->with('status','Usuari creat correctament');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('dashboard.user.show',["user"=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('dashboard.user.edit',["user"=>$user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserPut $request, User $user)
    {
        $user->update(
            [
                'name' => $request['name'],
                'surname' =>$request['surname'],
                'email' => $request['email'],

            ]
        );
       return back()->with('status','Usuari modificat correctament');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
       $user->delete();
       return back()->with('status','Usuari esborrat correctament');
    }
}
