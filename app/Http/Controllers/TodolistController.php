<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class TodolistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $list=DB::select('select * from todolist order by id desc');
       $binding = [
            'list' => $list,
            'title' => "首頁",
       ];
        return view('/todolist',$binding);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $input = resquest()->all();
        //  var_bump($input);
        // return "redirect('some/url')";


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $input = $request->request->all();
        $storeNew = DB::insert('insert into todolist (name) values (?)', [$request->taskname]);
        return redirect('/');


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
        // dump($id);
        $list=DB::select('select * from todolist where id = ?', [$id]);
        //  dump($list);
          $binding = [
            'list' => $list,
            'title' => "首頁",
       ];
         return view('todolist_edit',$binding);
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

        $input = $request->request->all();

        $todolist_o=DB::select('select * from todolist where id=? limit 1', [$id]);

        if(@$input["doensw"]=='1'){
            $doen1=(!$todolist_o[0]->doen)?'1':'0';
            $todolist=DB::update('update todolist set doen = ? where id = ?', [$doen1,$id]);
        }
        if(@$input['name']){
            // if($todolist_o[0]->name != @$input['name']){
                $todolist=DB::update('update todolist set name = ?,doen=0 where id = ?', [$input['name'],$id]);
                // echo"1212";
                  return redirect('/');
            // }
        }


         return $todolist;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        // dump($id);
        $del=DB::delete('delete from todolist where id = ?', [$id]);



        return $del;
    }
}
