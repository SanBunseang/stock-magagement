<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tbStaff;
use Datatables;
use DB;
class staffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin\users\staff');   
    }
    
    public function getStaff(){
        return datatables()->of(tbStaff::get())->toJson();
    }
     public function getCurrentStaff(){
        $data = tbStaff::where('Status', "working")->get();
         return datatables()->of($data)->toJson();
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
            // first method
        $staff=new tbStaff();
        // $request->validate([
        //     'Name'    =>  'required',
        //     'Gender'  =>  'required',
        //     'image'   =>  'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        // ]);

        $image = $request->file('image');
        //$new_name = uniqid() . $image->getClientOriginalName() . '.' . $image->getClientOriginalExtension();
        $new_name = time(). '.' . $image->getClientOriginalExtension();
        $image->move(public_path('dist\img'), $new_name);

        if($request->status==="1"){
            $newstatus="working";
        }else{
            $newstatus="stoped";
        }
       
        
    // second method must config in model to alow field for inserting
        //$staff=new tbStaff(['Name'=>$request->name]);

    // third method must config in model to alow field for inserting
        // $staff=tbStaff::make([
        //     'Name'=>$request->name
        // ]);

    // forth method we can not use method save()
        $staff=tbStaff::create([
            'Name'=> $request->name,
            'Gender'=> $request->gender,
            'DOB'=> $request->bod,
            'Position'=> $request->pos,
            'Address'=> $request->address,
            'Phone'=> $request->phone,
            'Email'=> $request->mail,
            'HiredDate'=> $request->hiredDate,
            'Salary'=> $request->salary,
            'Image' => $new_name,
            'Status'=> $newstatus
        ]);

        if($staff){
            return redirect('staff');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $staff=tbStaff::find($id);
        return view('admin\users\showDetailStaff',compact('staff'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $staff=tbStaff::find($id);
        return view('admin\users\editStaff',compact('staff'));
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
    //first method
        $staff=tbStaff::find($id);
        $staff->Name=$request->name;
        $staff->Gender=$request->gender;
        $staff->DOB=$request->dob;
        $staff->Position=$request->pos;
        $staff->Address=$request->address;
        $staff->Phone=$request->phone;
        $staff->Email=$request->mail;
        $staff->HiredDate=$request->hiredDate;
        $staff->Salary=$request->salary;
        if($request->hasfile('image')){
            $image = $request->file('image');
            // $new_name = uniqid() . $image->getClientOriginalName() . '.' . $image->getClientOriginalExtension();
            $new_name = time(). '.' . $image->getClientOriginalExtension();
            $image->move(public_path('dist\img'), $new_name);
            $staff->Image=$new_name;
        }
        $staff->Status=$request->status;

    //second method don't have method save();
        // $staff=tbStaff::where("id",$id)->update([
        //    "Name"=> $request->name
        // ]);

    //third method don't have method save();
        // $staff=tbStaff::find($id);
        // $re=$staff-> update([
        //     "Name"=> $request->name
        // ]);
        // if($re){
        //     return redirect('staff');
        // }else{
        //     return back();
        // }
    
        if($request->status==='1'){
            $staff->Status='working';
        }else{
            $staff->Status='stoped';
        }

        if($staff->save()){
            return redirect('staff');
        }else{
            return back();
        }
    }

    // public function delete($id){
    //     $staff=tbStaff::find($id);
    //     return view('admin\users\deleteStaff',compact('staff'));
    // }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {
    //first method
        // $staff=tbStaff::find($id);
        // if($staff){
        //     $staff->delete();
        //     return redirect('staff');
        // }

    //second method return value as integer
        // $id=tbStaff::destroy($id);
        // if($id>0){
        //     return redirect('staff');
        // }

    //third method
        // $staff=tbStaff::where('id',$id)-> delete();
        // if($staff > 0){
        //     return redirect('staff');
        // }     
    //}
    function changeStatus(request $re,$id){
        $staff=tbStaff::find($id);
        $staff->Status=$re->changestate;
        if($staff->save()){
            return redirect('staff');
        }
    }

}
