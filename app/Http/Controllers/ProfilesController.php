<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
class ProfilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.users.profile')->with('user', Auth::user());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        //
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
        $this->validate($request, [
            'userName' => 'required',
            'userEmail' => 'required|email',
            'userFacebook' => 'required|url', 
            'userYoutube' => 'required|url'
        ]);

        $user = Auth::user();
        if($request->hasFile('userAvatar'))
        {
            $avatar = $request->userAvatar;
            $avatar_new_name = time() . $avatar->getClientOriginalName();
            $avatar->move('uploads/avatars/', $avatar_new_name);
            $user->profile->avatar = 'uploads/avatars/' . $avatar_new_name;
            $user->profile->save();
        }
        $user->name = $request->userName;
        $user->email = $request->userEmail;
        $user->profile->facebook = $request->userFacebook;
        $user->profile->youtube = $request->userYoutube;

        $user->save();
        $user->profile->save();

        if($request->has('userPassword'))
        {
            $user->password = bcrypt($request->userPassword);
           $user->save();
        }

        Session::flash('success', 'Your profile has been updated.');
        return redirect()->back();



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
