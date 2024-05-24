<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Models\Location;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectTwoController extends Controller
{
    /**
     * all projects 
     */
    public function allProjects()
    {
        $budget = 0;
        $projects = Project::all();
        foreach ($projects as $key => $project) {
            $budget += $project->projcost;
        }
        return response(['num_of_projects' => $projects->count(), 'budget' => $budget]);
    }
    /**
     * projects per sub county
     */

    public function projectPerSubCounty()
    {
        $subCounties = Location::where('parent', '=', null)->get();
        foreach ($subCounties as $key => $subCounty) {
            $budget = 0;
            $projects = Project::where('projcommunity','=', $subCounty->id)->get();
            foreach ($projects as $key => $prj) {
                $budget += $prj->projcost;
            }
            $subCounty->projects = $projects;
            $subCounty->num_of_projects = $projects->count();
            $subCounty->budget = $budget;
        }

        return response($subCounties);
    }

    /**
     * projects per sub county
     */
    public function projectPerWard()
    {
        $subCounties = Location::where('parent', '=', null)->get();

        foreach ($subCounties as $key => $subCounty) {
            $ward_details = [];
            $wards = Location::where('parent', '=', $subCounty->id)->get();
            foreach ($wards as $key => $ward) {
                $budget = 0;
                $prjs = [];
                $projects = Project::all();
                foreach ($projects as $key => $project) {
                    $lga = explode(',', $project->projlga);
                    if (in_array($ward->id, $lga)) {
                        array_push($prjs, $project);
                        $budget += $project->projcost;
                    }
                }
                $ward->num_of_projects = count($prjs);
                $ward->budget = $budget;
                array_push($ward_details, $ward);
            }
            $subCounty->ward_details = $ward_details;
        }
        
        return response($subCounties);
    }
}
