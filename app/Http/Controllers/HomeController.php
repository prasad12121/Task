<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Redirect;
class HomeController extends Controller
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
    public function index()
    {
        $user = auth()->user();
        $users=DB::table('users')->get()->except('id',$user->id);
        //dd($users);
        $userData=DB::table('users')->where('id',$user->id)->first();

        return view('home',compact('users','userData'));
    }


    public function editData($id){

        $userData=DB::table('users')->where('id',$id)->first();

        return view('editlist',compact('userData'));


    }

    public function savedata(Request $request){
        //print_r($request);
        //dd($request->id);
        $validator =Validator::make($request->all(), [
            'name'=>'required',
            'email'=>'required|email',
        ]);

        if ($validator->fails()) {

            return Redirect::back()->withErrors($validator);

        }else {
            DB::table('users')->where('id', $request->id)->update([
                'name' => $request->name,
                'email' => $request->email
            ]);

            // return Redirect::back()->with('home', 'update data success');
            return  Redirect::to('home')->with('info', 'You are updated User Profiles!');
        }
    }


    public function deleteData($id){

        DB::table('users')->where('id',$id)->delete();
        return back()->with('info','You are deleted Users');
    }
}
