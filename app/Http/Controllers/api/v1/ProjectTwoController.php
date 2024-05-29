<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Models\Location;
use App\Models\Program;
use App\Models\Project;
use App\Models\Sector;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class ProjectTwoController extends Controller
{
    /**
     *  project statuses
     */
    public function getProjectByStatus()
    {
        $projects = Project::all();
        $preInvestment = [];
        $planned = [];
        $onGoing = [];
        $completed = [];
        foreach ($projects as $key => $project) {
            if ($project->stage_id == 0) {
                array_push($preInvestment, $project);
            }

            if ($project->stage_id == 1) {
                array_push($planned, $project);
            }

            if ($project->stage_id == 2) {
                array_push($onGoing, $project);
            }

            if ($project->stage_id == 3) {
                array_push($completed, $project);
            }
        }

        return response([
            'preInvestment' => count($preInvestment),
            'planned' => count($planned),
            'onGoing' => count($onGoing),
            'completed' => count($completed),
        ]);
    }

    /**
     *  project statuses
     */
    public function getProjectByStatusQuery(Request $request)
    {
        $projects = $this->queryPrj($request);
        $preInvestment = [];
        $planned = [];
        $onGoing = [];
        $completed = [];
        foreach ($projects as $key => $project) {
            if ($project->stage_id == 0) {
                array_push($preInvestment, $project);
            }

            if ($project->stage_id == 1) {
                array_push($planned, $project);
            }

            if ($project->stage_id == 2) {
                array_push($onGoing, $project);
            }

            if ($project->stage_id == 3) {
                array_push($completed, $project);
            }
        }

        return response([
            'preInvestment' => count($preInvestment),
            'planned' => count($planned),
            'onGoing' => count($onGoing),
            'completed' => count($completed),
        ]);
    }


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
     * all projects query
     */
    public function allProjectsQuery(Request $request)
    {
       
        $projects = $this->queryPrj($request);
        
        $budget = 0;
        foreach ($projects as $key => $project) {
            $budget += $project->projcost;
        }
        return response(['num_of_projects' => $projects->count(), 'budget' => $budget]);
    }

    public function projectPerDepartment()
    {
        $departments = Sector::where('parent','=',0)->get();
        foreach ($departments as $key => $department) {
            $preInvestment = [];
            $planned = [];
            $onGoing = [];
            $completed = [];
            $programs = Program::where('projsector','=',$department->stid)->get();
            foreach ($programs as $key => $program) {
                $projects = $program->projects;
                foreach ($projects as $key => $project) {
                    if ($project->stage_id == 0) {
                        array_push($preInvestment, $project);
                    }

                    if ($project->stage_id == 1) {
                        array_push($planned, $project);
                    }

                    if ($project->stage_id == 2) {
                        array_push($onGoing, $project);
                    }

                    if ($project->stage_id == 3) {
                        array_push($completed, $project);
                    }
                }
            }

            $department->data = [
                "preInvestment" => count($preInvestment),
                "planned" => count($planned),
                "onGoing" => count($onGoing),
                "completed" => count($completed),
            ];
        }
        return response($departments);
    }

    /**
     * projectPerDepartmentQuery filters
     */
    public function projectPerDepartmentQueryFilter(Request $request, $query, $program)
    {
        if ($request->sub_county_id == 'Select...' && $request->from == 'Select...' && $request->to == 'Select...' && $request->ward_id == 'Select...') {
            $projects = Project::where('progid','=', $program)->get();
            return $projects;
        }

        if ($request->sub_county_id != 'Select...' && $request->from == 'Select...' && $request->to == 'Select...') {
            $prjs = new Collection();
            $projects = Project::where('progid','=', $program)->get();
            foreach ($projects as $project) {
                $sub_county_id = explode(',', $project->projcommunity);
                if (in_array($request->sub_county_id, $sub_county_id)) {
                    $prjs->push($project);
                }
            }
            return $prjs;
        }

        $projects = new Collection();

        $projects_final = new Collection();


        if ($request->from != 'Select...') {
            $query->where('projfscyear', '>=', $request->from)->where('progid','=', $program);
        }

        if ($request->to != 'Select...') {
            $query->where('projfscyear', '<=', $request->to)->where('progid','=', $program);
        }

        $projects_query = $query->get();


        if ($request->sub_county_id != 'Select...') {
            foreach ($projects_query as $project) {
                $sub_county_id = explode(',', $project->projcommunity);
                if (in_array($request->sub_county_id, $sub_county_id)) {
                    $projects->push($project);
                }
            }
        }

        if ($request->ward_id != 'Select...') {
            foreach ($projects as $key => $project) {
                $ward_id = explode(',', $project->projlga);
                if (in_array($request->ward_id, $ward_id)) {
                    $projects_final->push($project);
                } 
            }
        }

        if ($request->ward_id != 'Select...') {
            return $projects_final;
        } else if($request->sub_county_id != 'Select...') {
            return $projects;
        } else {
            return $projects_query;
        }
    }

    /**
     * filter projects per department
     */
    public function  projectPerDepartmentQuery(Request $request)
    {
        $departments = Sector::where('parent','=',0)->get();
        foreach ($departments as $key => $department) {
            $preInvestment = [];
            $planned = [];
            $onGoing = [];
            $completed = [];
            $programs = Program::where('projsector','=', $department->stid)->get();
            foreach ($programs as $key => $program) {
                $query = Project::query();

                $projects = $this->projectPerDepartmentQueryFilter($request, $query, $program->progid);

                foreach ($projects as $key => $project) {
                    if ($project->stage_id == 0) {
                        array_push($preInvestment, $project);
                    }

                    if ($project->stage_id == 1) {
                        array_push($planned, $project);
                    }

                    if ($project->stage_id == 2) {
                        array_push($onGoing, $project);
                    }

                    if ($project->stage_id == 3) {
                        array_push($completed, $project);
                    }
                }
            }

            $department->data = [
                "preInvestment" => count($preInvestment),
                "planned" => count($planned),
                "onGoing" => count($onGoing),
                "completed" => count($completed),
            ];
        }
        
        return response($departments);
    }

    public function queryPrj(Request $request)
    {
        $projects = new Collection();

        $projects_final = new Collection();

        $query = Project::query();

        if ($request->from != 'Select...') {
            $query->where('projfscyear', '>=', $request->from);
        }

        if ($request->to != 'Select...') {
            $query->where('projfscyear', '<=', $request->to);
        }

        $projects_query = $query->get();


        if ($request->sub_county_id != 'Select...') {
            foreach ($projects_query as $project) {
                $sub_county_id = explode(',', $project->projcommunity);
                if (in_array($request->sub_county_id, $sub_county_id)) {
                    $projects->push($project);
                }
            }
        }


        if ($request->ward_id != 'Select...') {
            foreach ($projects as $key => $project) {
                $ward_id = explode(',', $project->projlga);
                if (in_array($request->ward_id, $ward_id)) {
                    $projects_final->push($project);
                } 
            }
        }

        if ($request->ward_id != 'Select...') {
            return $projects_final;
        } else if($request->sub_county_id != 'Select...') {
            return $projects;
        } else {
            return $projects_query;
        }
    }
}
