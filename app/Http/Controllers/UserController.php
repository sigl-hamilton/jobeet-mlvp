<?php

namespace App\Http\Controllers;

use App\Label;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function profile()
    {
        return view('users.profile');
    }

    /**
     * Show list of users
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function list()
    {
        // TODO Only if admin

        return view('users.list', ['users' => User::all()]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $data['user_info'] = User::where(['id' => $id])->with('labels')->first();
        $data['labels'] = Label::all();

        return view('users.edit', $data);
    }

    public function index($id)
    {
        return view('users.index', ['user' => User::where(['id' => $id])->with('labels', 'company')->first()]);
    }

    public function notifications($id)
    {
        return view('users.notifications', ['user' => User::where(['id' => $id])->with('labels', 'company')->first()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'labels' => 'required|array',
            'user_type' => 'required|in:candidate,recruiter',
        ]);

        $user = User::where('id',$id)->first();

        if ($request->hasFile('picture')) {
            $picture = $request->picture;
            $filename  = time() . '.' . $picture->getClientOriginalExtension();
            Image::make($picture)->resize(150,150)->save(public_path('/uploads/profile_pictures/' . $filename));

            $user->picture = $filename;
            print('update picture');
        }
        else {
            print('No image');
        }
        print(sizeof($request->allFiles()));

        $user->labels()->sync($request->labels);
        $user->user_type=$request->user_type;
        $user->save();
        $data['labels'] = Label::all();
        $data['user_info'] = User::where(['id' => $id])->with('labels')->first();

        return view('users.edit', $data)
            ->with('success','Great! Product updated successfully');
    }
}
