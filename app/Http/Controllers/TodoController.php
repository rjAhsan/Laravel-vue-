<?php

namespace App\Http\Controllers;
use App\Http\Requests\TodoRequest;
use Illuminate\Http\Request;
use App\Todo;
class TodoController extends Controller

{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function  CreatePOSt(Request $request){
//        $var=$request->get('name');
//        dd($var);

        Todo::create($request->all());
        return response()->json('successfully added');


      }

      public function Search($keyWord,Request $request){

          $posts = Todo::where('name','like','%'.$keyWord.'%')->get();
            //dd($posts);
          return request()->json(200,$posts);

    }



    public function EditPost($id){

      $name= Todo::findOrFail($id);

      return request()->json(200,$name->name);

}

public function EditData(Request $request,$id){
        $name=Todo::findOrFail($id);
        $name->name=$request->get('name');
        $name->save();
        return response()->json('uccessfully Update');

}

      public function delPOSt($id){
        $var =Todo::findOrFail($id);
        $var->delete();
          return response()->json('successfully Deleted');

      }
    public function index()
    {
        $name=Todo::all();
        return request()->json(200,$name);
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
    public function store(TodoRequest $request)
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
        $var= Todo::findOrFail($id);
        return request()->json(200,$var);


    }
    public function shows(Todo $todo){
        return $todo->name;
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TodoRequest $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del=Todo::findOrfail($id);
        $del->delete();
        $namee=Todo::all();
            return response()->json(200,$namee);

    }
}
