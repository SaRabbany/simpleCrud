<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\laravelCrud;
use Session;
//use Delete;

class HomeController extends Controller
{

    public function home(){
        //$showData = laravelCrud::all();
        //$showData = laravelCrud::paginate(5);
        $showData = laravelCrud::simplePaginate(5);

        return view('home',compact('showData'));
    }

    public function addData(){
        return view('addPage');
    }

    public function store(Request $request)
    {
        $rules = [
            'name'=> 'required|max:10',
            'discription' => 'required|max:100',
        ];
        $customMessages = [
            'name.required' =>'Enter your name',
            'name.max' => 'Your name must be at least 10 ch',   
        'discription.required' =>'Enter your description',
            'discription.max' => 'Your discription must be at least 100',

        ];

        $this->validate($request, $rules, $customMessages);

        $crud = new laravelCrud();
        $crud->name = $request->name;
        $crud->discription = $request->discription; 
        $crud->save();

        $request->session()->flash('status', 'Task was successful!');  


         return redirect('/');
        }

        public function editData($id= null){
            $editView = laravelCrud::find($id);
            return view('editPage',compact('editView'));
           
        }

    public function updateData(Request $request, $id)
    {
        $rules = [
            'name' => 'required|max:10',
            'discription' => 'required|max:100',
        ];
        $customMessages = [
            'name.required' => 'Enter your name',
            'name.max' => 'Your name must be at least 10 ch',
            'discription.required' => 'Enter your description',
            'discription.max' => 'Your discription must be at least 100',

        ];

        $this->validate($request, $rules, $customMessages);

        $crud = laravelCrud::find($id);
        $crud->name = $request->name;
        $crud->discription = $request->discription;
        $crud->save();

        $request->session()->flash('status', 'Task was successful update!');
        return redirect('/');
    }

    // public function dalateData($id= null){
    //     $daleteData = laravelCrud::find($id);
    //     $daleteData->delete();
    //     $request->session()->flash('status', 'Task was successful Delete!');
    //     return redirect('/');
        
    // }

    public function deleteData($id= null){
        $deleteData = laravelCrud::find($id);
        $deleteData->delete();
        //Session::flash('status', 'Task delete successfully');
       //$request->session()->flash('status', 'Task was successful Delete!');
        return redirect('/');
    }

} 
