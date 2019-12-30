<?php

namespace App\Http\Controllers;

use App\Label;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class LabelController extends Controller
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
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/label/list';

    /**
     * Show a list of Labels
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function list()
    {
        //TODO only if admin (use midlware)
        $labels = Label::all();
        return view('labels.list', ['labels' => $labels]);
    }

    /**
     * Show a list of Labels
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function showCreateLabelForm()
    {
        return view('labels.create');

    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
        ]);
    }


    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function insert(Request $request)
    {
        $this->validator($request->all())->validate();
        //TODO handle error
        return Label::create(['name' => $request['name']])
            ? redirect()->to('/label/list'): redirect('label-create-form');
    }

}
