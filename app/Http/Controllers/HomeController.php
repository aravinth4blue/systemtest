<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Occupation;
use App\Appln;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function file(){
        $occupList = Occupation::getAll(); 
        $applnList = Appln::getAll();
        return view('file',['occupList' => $occupList,'applnList' => $applnList]);
    }
    public function editFile(Request $request,$id){
        $occupList = Occupation::getAll(); 
        $applnList = Appln::getAll();
        $appData = Appln::find($id);
        return view('file',['occupList' => $occupList,'applnList' => $applnList,'appData' => $appData]);
    }
    public function postfile(Request $request){
        $params = array(
                        "firstName" => $request->input('firstName'),
                        "lastName" => $request->input('lastName'),
                        "occupation" => $request->input('occupation')
        );
        $file = $request->file('appln');
        $destinationPath = 'uploads';
        $filename = $file->getClientOriginalName();
        $fileExt = $request->file('appln')->getClientOriginalExtension();
        $appln = $filename;
        $params['appln'] = $appln;
        if($request->hasFile('appln'))
        {
            $file->move($destinationPath,$file->getClientOriginalName());
        }
        Appln::saveAppln($params);
        return redirect('file');
    }
    public function editpostFile(Request $request,$id){
        $params = array(
            "firstName" => $request->input('firstName'),
            "lastName" => $request->input('lastName'),
            "occupation" => $request->input('occupation')
        );
        Appln::updateAppln($params,$id);
        return redirect('file');
    }
}
