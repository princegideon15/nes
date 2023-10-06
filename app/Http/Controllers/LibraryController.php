<?php

namespace App\Http\Controllers;

use App\Library;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Tracking;

class LibraryController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function getRegisterSubLibrary(Request $request){
        if($request->id == 1){
            return DB::table('tbldivchairs')->get()->toArray();
        }else if($request->id == 2){
            return DB::table('tblstakeholders')->get()->toArray();
        }else{
            return DB::table('tblmanagements')->get()->toArray();
        }
    }

    public function getSubStake(Request $request){
        return DB::table('tblsub_stakeholders')->where('stake_id', $request->id)->get()->toArray();
    }

    public function getSubManage(Request $request){
        return DB::table('tblsub_managements')->where('mgt_id', $request->id)->get()->toArray();
    }

    public function getNrcpMember(Request $request){
        return DB::connection('skms')->table('tblusers')
        ->join('tblpersonal_profiles','usr_id','=','pp_usr_id', 'inner')
        ->where('pp_email', $request->email)
        ->where('usr_grp_id', 3)
        ->get()->toArray();
    }

    public function getNrcpMembers(){
        return DB::connection('skms')->table('tblpersonal_profiles')
        ->select('*')
        ->join('tblmembership_profiles','pp_usr_id','=','mpr_usr_id', 'left')
        ->join('tbltitles','pp_title','=','title_id', 'left')
        ->join('tblusers','usr_id','=','pp_usr_id', 'inner')
        ->join('tblmembers','mem_usr_id','=','pp_usr_id', 'left')
        ->where('usr_grp_id', '3')
        ->where('mem_status', '!=', '3')
        ->orderBy('pp_last_name', 'asc')
        ->orderBy('mpr_gen_specialization', 'asc')
        ->get()->toArray(); 
    }

    public function getTitles(){
        return DB::table('tbltitles')->get()->toArray();
    }

    public function getRegions(){
        return DB::connection('skms')->table('tblregions')->get()->toArray();
    }

    public function getProvinces(Request $request){
        return DB::connection('skms')->table('tblprovinces')->where('province_region_id', $request->id)->get()->toArray();
    }

    public function getCities(Request $request){
        return DB::connection('skms')->table('tblcities')->where('city_province_id', $request->id)->get()->toArray();
    }

    public function getActType(){
        return DB::table('tblactivities')->get()->toArray();;
    }

    public function getSubAct(){
        return DB::table('tblsub_activities')->get()->toArray();
    }

    public function getVenSpec(){
        return DB::table('tblvenues')->get()->toArray();
    }

    
    public function getRoles(){
        return DB::table('tbluser_groups')->get()->toArray();
    }

    public function getSubCategory($reg, $sub){

        if($reg == 1){
            
            return DB::table('tbldivchairs')
            ->select(DB::raw('CONCAT("Division ",divchr_name) as divchr_name'))
            ->where('divchr_id', $sub)
            ->first()
            ->divchr_name;

        }else if($reg == 2){

            return DB::table('tblstakeholders')
            ->select('stk_name')
            ->where('stk_id', $sub)
            ->first()
            ->stk_name;

        }else{

            return DB::table('tblmanagements')
            ->select('mgt_name')
            ->where('mgt_id', $sub)
            ->first()
            ->mgt_name;

        }
    }

    public function trackApplication(Request $request){
        $tracking = Tracking::getTrackingByToken13($request->track_app);
        $track_num = $request->track_app;
        return view('tracker', compact('tracking', 'track_num'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Library  $library
     * @return \Illuminate\Http\Response
     */
    public function show(Library $library)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Library  $library
     * @return \Illuminate\Http\Response
     */
    public function edit(Library $library)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Library  $library
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Library $library)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Library  $library
     * @return \Illuminate\Http\Response
     */
    public function destroy(Library $library)
    {
        //
    }
}
