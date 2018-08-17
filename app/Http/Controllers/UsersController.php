<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Storage;

class UsersController extends Controller
{

     public function __construct()
    {
        // Filtrar solo estos métodos...
        $this->middleware('extension', ['only' => ['update']]);

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $users = User::orderBy('name')->get();
        $user = Auth::user();
        return view('indexUsers')->with('user', $user);  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('userList', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $user = User::find($id);
        return view('editUser', compact('user'));
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
        $user=User::find($id);
        if(! is_null($request->file('img_url'))){
            $img = $request->file('img_url');
            $file_route = time().'_'.$img->getClientOriginalName();
            Storage::disk('user')->put($file_route, file_get_contents( $img->getRealPath() ));
            Storage::disk('user')->delete($user->img_url);
        }

        else  $file_route=$user->img_url;

        $user->name= $request->name;
        $user->email= $request->email;
        $user->img_url= $file_route;

       $user->update(); 
       
        return redirect()->action('UsersController@index'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $user=User::find($id);
       $user->delete();     

     return redirect()->action('UsersController@index'); 
    }
}
