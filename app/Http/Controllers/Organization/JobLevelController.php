<?php

namespace App\Http\Controllers\Organization;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use DB;
use App\Models\JobLevel;
use App\Models\JobClass;

class JobLevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data = JobLevel::whereNull('deleted_by')->orderBy('order')->get();

        for ($i=0; $i < count($data); $i++) { 
            
            $id_class = explode(', ', $data[$i]->job_class);
            
            for ($a=0; $a < count($id_class); $a++) { 
                
                $job_class = JobClass::select('grade.name as grades', 'rank.name as ranks')
                    ->where('job_class.id', $id_class[$a])
                    ->whereNull('job_class.deleted_at')
                    ->Join('grade', function ($join) {
                        $join->on('job_class.grade', '=', 'grade.id')
                            ->whereNull('grade.deleted_at');
                    })
                    ->Join('rank', function ($join) {
                        $join->on('job_class.rank', '=', 'rank.id')
                            ->whereNull('job_class.deleted_at');
                    })
                    ->first();

                $result[$a] = $job_class->grades.$job_class->ranks;

            }

            $data[$i]->job_class = implode(", ",$result);

        }

        Session::put('MENU', 'jobLevel');
        return view('organization.jobLevel.index',compact('data'));

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
