<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ListDemo;
use Illuminate\Support\Facades\DB;

class Listgogo extends Controller
{
    public function list(){
        $list = ListDemo::all();
        return view('list', compact('list'));
    }
    public function add(){
        return 'add';
    }
    public function handleadd(Request $request){
        $add = ListDemo::create([
            'name' => $request->name,
            'class' => $request->class,
            'age' => $request->age,
        ]);
        $list = ListDemo::all();
      return view('list', compact('list'));
    }
    public function delete($id){
        $delete = ListDemo::where('id',$id)->delete();
        return redirect(route('list'));
    }
    public function edit($id){
        $index = $id;
        $edit = ListDemo::where('id',$index)->get();
        return view('edit', compact('edit'));
    }
    
    public function handleedit(Request $request){
        $item = ListDemo::find($request->id);
        $item->name = $request->name;
        $item->class = $request->class;
        $item->age = $request->age;
        $item->save();
        return redirect(route('list'));
    }

    public function search(Request $request){
        $list = ListDemo::where('name','like','%'.$request->search.'%')->get();
        return view('list',compact('list'));
    }
}