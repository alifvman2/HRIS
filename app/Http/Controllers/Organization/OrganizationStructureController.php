<?php

namespace App\Http\Controllers\Organization;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use DB;
use App\Models\OrganizationLevel;
use App\Models\OrganizationStructure;
use App\Models\Employee;

class OrganizationStructureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data = OrganizationStructure::select('organization_structure.id', 'organization_structure.name', 'organization_structure.code', 'organization_level.name as level_name', 'company.name as company_name')
            ->whereNull('organization_structure.deleted_by')
            ->Join('organization_level', function ($join) {
                $join->on('organization_level.id', '=', 'organization_structure.organization_level')
                    ->whereNull('organization_level.deleted_at');
            })
            ->Join('company', function ($join) {
                $join->on('company.id', '=', 'organization_structure.company')
                    ->whereNull('company.deleted_at');
            })
            ->get();

        for ($i=0; $i < count($data); $i++) { 

            $employee = Employee::whereNull('deleted_at')->where('organization', $data[$i]->id)->count();

            $data[$i]->employee = $employee;
        
        }
        Session::put('MENU', 'organizationStructure');
        return view('organization.organizationStructure.index',compact('data'));

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
