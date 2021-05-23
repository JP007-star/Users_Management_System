<?php

namespace App\Http\Controllers;

use App\Models\UserRecords;
use Illuminate\Http\Request;
use Validator;
class UserRecordsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->ajax()) {
            return datatables()->of(UserRecords::select('*'))
            ->addColumn('action', function($data){
                        $button = '<button type="button" name="edit" id="'.$data->id.'" class="edituser btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</button>';
                        $button .= '&nbsp;&nbsp;';
                        $button .= '<button type="button" name="delete" id="'.$data->id.'" class="deleteuser btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</button>';
                        return $button;
                    })
             ->addColumn('avatar', function($data){
                       if(!empty($data->uploadimage)){
                        $img= '<img src="'.$data->uploadimage.'" alt="user-image" class="rounded-circle" style="width:40px;height: 40px;">';
                       }
                       else
                        $img = '<i style="display:block;width:40px;height:40px;text-align: center;margin-left:30px;    background: #ff5463; padding-top: 3px; font-size:22px; font-weight: 900; color: #ffffff;" class="rounded-circle">'.substr(trim($data->fullname), 0, 1).'</i>';
                        return $img;
                    })
            ->addColumn('experiance', function($data){
                        $dateofjoining =date_create($data->dateofjoining);
                        $dateofleaving =date_create($data->dateofleaving);
                        $interval = date_diff($dateofjoining,$dateofleaving);
                        $button = $interval->format("%Y Years  %m Months");
                        return $button;
                    })
            ->rawColumns(['action','experiance','avatar'])
            ->addIndexColumn()
            ->make(true);
        }
        return view('users');
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
    public function store(Request $request)
    {
         $validator = Validator::make($request->all(),[
          'email' => 'required',
          'fullname' => 'required',  
          'dateofjoining' => 'required',  
          'dateofleaving' => 'required',  
        ]);
          $userId = $request->userid;

        
         if ($validator->passes()) {
             
            $user   =  UserRecords::updateOrCreate(
                    [
                     'id' => $userId
                    ],
                    [
                    'email' => $request->email,
                    'fullname' => $request->fullname, 
                    'dateofjoining' => $request->dateofjoining,
                    'dateofleaving' => $request->dateofleaving,
                    'stillworking'=> $request->stillworking,
                    'uploadimage'=> $request->dpimg,
                    ]);    
            return response()->json(['success'=>'Added new records.']);
        }
        else
        return response()->json(['error'=>$validator->errors()]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserRecords  $userRecords
     * @return \Illuminate\Http\Response
     */
    public function show(UserRecords $userRecords)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserRecords  $userRecords
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {   
        $where = array('id' => $request->id);
        $user  = UserRecords::where($where)->first();
      
        return Response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserRecords  $userRecords
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserRecords $userRecords)
    {
        $where = array('id' => $request->id);
        $user  = UserRecords::where($where)->first();
      
        return Response()->json($user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserRecords  $userRecords
     * @return \Illuminate\Http\Response
     */
   public function destroy(Request $request)
    {
        $user = UserRecords::where('id',$request->id)->delete();
        return Response()->json($user);
    }
}
