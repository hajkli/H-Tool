<?php

namespace App\Http\Controllers;

//use App\Task;
use Illuminate\Http\Request;


class TaskController extends Controller
{


    public function __construct(){

            session_start();

        if(isset($_SESSION["isLogged"])){
                return true;
            } else {
                header('Location: /sk/login');
                exit();
            }
    }


    /**
     * Display a dashboard of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $tasks = \App\Task::all();

        $countAll = \App\Task::where('isActive', 1)->count();
        $countOpen = \App\Task::where('status', 1)->where('isActive', 1)->count();
        $countInProgress = \App\Task::where('status', 2)->where('isActive', 1)->count();
        return view('index', ['countAll' => $countAll, 'countOpen' => $countOpen, 'countInProgress' => $countInProgress]);
    }
    /**
     * Display a list all of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listAll()
    {


        $tasks = \App\Task::where('isActive' , 1)->get();

        return view('task-list', ['data' => $tasks]);
    }
    public function listAllApi()
    {
        $tasks = \App\Task::where('isActive' , 1)->get();

        return json_encode($tasks);

    }

    public function archive()
    {
        $tasks = \App\Task::where('isActive' , 0)->get();

        return view('archive', ['data' => $tasks]);
    }

    public function archiveApi()
    {
        $tasks = \App\Task::where('isActive' , 0)->get();

        return json_encode($tasks);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('create_task');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tasks = new \App\Task();
        $tasks->name = $request->input('name');
        $tasks->desc = $request->input('desc');

        if($tasks->validate() && $tasks->save()){
            return redirect('/sk/listall')->with('status', 'created');
        }else{
            return redirect("/sk/task/create")->with('status', 'not_created');
        }   
    }

    public function storeApi(Request $request)
    {
        $tasks = new \App\Task();
        $tasks->name = $request->input('name');
        $tasks->desc = $request->input('desc');

        if($tasks->validate() && $tasks->save()){
            return json_encode(array('status' => 'succes'));
        }else{
            return json_encode(array('status' => 'error'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function show(Photo $photo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function edit(\App\Task $task)
    {


//        $tasks = \App\Task::where('id' , $id)->first();
            if(isset($task)){
                return view('edit-task',['model' => $task]);
            } else {
                return redirect('/sk/');
            }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $tasks =\App\Task::find($request->input('id'));
        $tasks->name = $request->input('name');
        $tasks->desc = $request->input('desc');

        if($tasks->validate() && $tasks->save()){
            return redirect('/sk/listall')->with('status', 'success');
        }else{
            return view('edit-task',['model' => $tasks]);
            
            // return redirect("/sk/task/edit/$id")->with('status', 'error');
        }
    }

    public function updateApi(Request $request)
    {

        $tasks =\App\Task::find($request->input('id'));

        $tasks->name = $request->input('name');
        $tasks->desc = $request->input('desc');

        if($tasks->validate() && $tasks->save()){
            return json_encode(array('status' => 'succes'));

        }else{
            return json_encode(array('status' => 'error'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $tasks = \App\Task::where('id' , $id)->first();
        $tasks->isActive = '0';

        if($tasks->save()){
            return redirect('/sk/listall')->with('status', 'success');
        }else{
            return redirect('/sk/listall')->with('status', 'error');

        }


    }
    public function deleteApi(Request $request)
    {
    $tasks =\App\Task::where('id' ,$request->input('id'))->first();
    $tasks->isActive = '0';

    if($tasks->save()){
        return json_encode(array('status' => 'succes'));
    }else{
        return json_encode(array('status' => 'error'));
    }


}

    public function restore($id)
    {

        $tasks = \App\Task::where('id' , $id)->first();
        $tasks->isActive = '1';

        if($tasks->save()){
            return redirect('/sk/listall')->with('status', 'success');
        }else{
            return redirect('/sk/listall')->with('status', 'error');

        }


    }
}
