<?php

namespace App\Http\Controllers\Organization;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use DB;
use App\Models\JobClass;
use App\Models\Grade;
use App\Models\Rank;

class JobClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data = JobClass::select('job_class.grade', 'grade.name')
            ->whereNull('job_class.deleted_by')
            ->Join('grade', function ($join) {
                $join->on('job_class.grade', '=', 'grade.id')
                    ->whereNull('grade.deleted_at');
            })
            ->orderBy('grade.order')
            ->groupBy('grade', 'name')
            ->get();

        $rank = Rank::whereNull('rank.deleted_by');
        $ranks = $rank->get();
        $countRank = $rank->count();
        $result = $rank->select('job_class.grade', 'rank.id', 'rank.name')
            ->Join('job_class', function ($join) {
                $join->on('job_class.rank', '=', 'rank.id')
                    ->whereNull('job_class.deleted_at');
            })
            ->orderBy('job_class.rank')
            ->get();

        for ($i=0; $i < count($data); $i++) { 
            for ($a=0; $a < count($result); $a++) { 
                if ($data[$i]->grade == $result[$a]->grade) {
                    $hasil[] = $result[$a]->name;
                    $berhasil = array();
                    foreach ($hasil as $h) { 
                        $berhasil[$h] = $h;
                    }
                }

            }
            $data[$i]->detail = $berhasil;
        }

        Session::put('MENU', 'jobClass');
        return view('organization.jobClass.index',compact('data', 'countRank', 'ranks'));

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
