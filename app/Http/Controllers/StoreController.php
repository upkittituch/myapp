<?php

namespace App\Http\Controllers;

use App\Mybotmenu;
use Illuminate\Http\Request;




class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Mybotmenu::all();
        return view('mybot.index',compact('data'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mybot.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'price'=>'required',
            'img'=>'required'
        ]);

            $path = $request->file('img')->store('public/products'); //ย้ายรูปไปเก็บไว้ที่โฟล์เดอร์
            $replace_path = str_replace("public","storage",$path); //เปลี่ยน path


            //   return $path;
            //   Mybotmenu::create($request->all());
            //   dd($request);
            $mybotmenu = new Mybotmenu();
            $mybotmenu->name=$request->input('name');
            $mybotmenu->price=$request->input('price');
            $mybotmenu->img =$replace_path;
            $mybotmenu->save();





             return redirect('mybot');


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
        $data=Mybotmenu::find($id);
        return view('mybot.edit',compact(['data']));

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
        $request->validate([
            'name'=>'required',
            'price'=>'required',
            'img'=>'required'
        ]);
        // Mybotmenu::find($id)->update($request->all()); /**ต้องแก้ไข */
        //      return redirect('/mybot');
        $mybotmenu = Mybotmenu::find($id);
        $path = $request->file('img')->store('public/products'); //ย้ายรูปไปเก็บไว้ที่โฟล์เดอร์
        $replace_path = str_replace("public","storage",$path); //เปลี่ยน path
        $mybotmenu->name=$request->input('name');
        $mybotmenu->price=$request->input('price');
        $mybotmenu->img =$replace_path;
        $mybotmenu->save();

        return redirect('/mybot');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Mybotmenu::find($id)->delete();
        return redirect('/mybot');
    }
}
