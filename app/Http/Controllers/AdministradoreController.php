<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Administradore;
use App\User;
use Amranidev\Ajaxis\Ajaxis;
use URL;

/**
 * Class AdministradoreController.
 *
 * @author  The scaffold-interface created at 2018-03-10 10:35:56am
 * @link  https://github.com/amranidev/scaffold-interface
 */
class AdministradoreController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Index - administradore';
        $administradores = Administradore::all();
        $users = User::all();

        return view('administradore.index',compact('administradores','title','users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create - administradore';

        $administradores = Administradore::all();

        $allusers = User::all();

        $users;

        $i = 0;

        foreach ($allusers as $user) {
            $eAdministrador = false;
            foreach ($administradores as $administradore) {
                if($user->id == $administradore->user_id){
                    $eAdministrador = true;
                }
            }
            if($eAdministrador == false){
               $users[$i] = $user;
               $i++;
            }
        }

        return view('administradore.create', compact('adminsitradores','users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $administradore = new Administradore();

        
        $administradore->user_id = $request->user_id;

        
        
        $administradore->save();

        $pusher = App::make('pusher');

        //default pusher notification.
        //by default channel=test-channel,event=test-event
        //Here is a pusher notification example when you create a new resource in storage.
        //you can modify anything you want or use it wherever.
        $pusher->trigger('test-channel',
                         'test-event',
                        ['message' => 'A new administradore has been created !!']);

        return redirect('administradore');
    }

    /**
     * Display the specified resource.
     *
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function show($id,Request $request)
    {
        $title = 'Show - administradore';

        if($request->ajax())
        {
            return URL::to('administradore/'.$id);
        }

        $administradore = Administradore::findOrfail($id);

        $user = User::findOrfail($administradore->user_id);
        
        return view('administradore.show',compact('title','user'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function edit($id,Request $request)
    {
        $title = 'Edit - administradore';
        if($request->ajax())
        {
            return URL::to('administradore/'. $id . '/edit');
        }

        
        $administradore = Administradore::findOrfail($id);
        $users = User::all();
        return view('administradore.edit',compact('title','administradore','users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function update($id,Request $request)
    {
        $administradore = Administradore::findOrfail($id);
    	
        $administradore->user_id = $request->user_id;
        
        
        $administradore->save();

        return redirect('administradore');
    }

    /**
     * Delete confirmation message by Ajaxis.
     *
     * @link      https://github.com/amranidev/ajaxis
     * @param    \Illuminate\Http\Request  $request
     * @return  String
     */
    public function DeleteMsg($id,Request $request)
    {
        $msg = Ajaxis::MtDeleting('Warning!!','Would you like to remove This?','/administradore/'. $id . '/delete');

        if($request->ajax())
        {
            return $msg;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param    int $id
     * @return  \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     	$administradore = Administradore::findOrfail($id);
     	$administradore->delete();
        return URL::to('administradore');
    }
}
