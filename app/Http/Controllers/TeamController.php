<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;
use App\Team_member;
use App\User;
class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams=auth()->user()->teams()->get();
        $users=User::whereNull('user_type_id')->get();
        return view('team.edit', compact('teams', 'users'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('team/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
        ]);
        $team = new Team;
        $team->name= $request->input('name');
        $team->save();
        $user = auth()->user();
        $team_id = Team::orderby('created_at', 'desc')->first()->team_id;
        $team_members = new Team_member;
        $team_members->team_id=Team::all()->last()->id;
        $team_members->user_id=$user->id;
        $team_members->save();
        
        return redirect('team')->with('success', 'Team successfully created');
    }

    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function menu()
    {
        $user=auth()->user();
        $teams=auth()->user()->teams;
        
        return view('team/manager/menu', compact('user', 'teams'))
        ;
    }
    public function show($id=null)
    {
        $user=auth()->user();
        
        return view('team/manager/manager', compact('user'));
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
    
     public function add(Request $request)
     {
        $this->validate($request,[
            'user_type_id'=>'required',
            'user_id'=>'required',
        ]);
        
        $users = User::find($request->input('user_id'));
        $users->user_type_id= $request->input('user_type_id');
        $users->parent_id=auth()->user()->id;
        $users->save();
        $team_members = new Team_member;
    
        // dd($team);
        if (auth()->user()->user_type_id==1) {
            $team_members->team_id=$request->input('team_id');
        } else {
            $team_members->team_id=auth()->user()->teams()->first()->id;
        }
        
        
        $team_members->user_id=$users->id;
        $team_members->save();
        
        return redirect('team')->with('success', 'Team member successfully added');
     }

    public function update(Request $request, $id)
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
        //
    }
}
