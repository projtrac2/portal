<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Models\Location;
use App\Models\Project;
use App\Models\Status;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class OnGoingProjectsController extends Controller
{
    public function onGoingProjects()
    {
        $projects = Project::where('stage_id','=',2)->get();
        foreach ($projects as $key => $project) {
            $project['id'] = Crypt::encrypt($project->projid);
            $project['link'] = "<a href='/project/$project->id')}}><i class='fa-solid fa-eye text-success'></i></a>";
            $project['link2'] = "<a href='/feedback/$project->id')}}><i class='fa-solid fa-comment'></i></i></a>";
            if ($project->projstatus !== 0) {
                $project['fyear'] = $project->financialYear->name;
                if ($project->program->section) {
                    $project['section'] = $project->program->section ?? null;
                } else {
                    $project['section'] = null;
                }
                $project->status;
                $sub_county_id = explode(',', $project->projcommunity);
                $ward_id = explode(',', $project->projlga);

                for ($i = 0; $i < count($sub_county_id); $i++) {
                    $location = Location::where('id', '=', $sub_county_id[$i])->first();
                    if ($location) {
                        $project['location'] = $location->state;
                    } else {
                        $project['location'] = 'n/a';
                    }
                }

                for ($j = 0; $j < count($ward_id); $j++) {
                    $ward = Location::where('id', '=', $ward_id[$j])->first();
                    if ($location) {
                        $project['ward'] = $ward->state;
                    } else {
                        $project['ward'] = 'n/a';
                    }
                }
            } else {
                $project['section'] = 'n/a';
                $project->status;
            }
        }
        return response($projects);
    }

    public function onGoingProjectsQuery(Request $request)
    {
        $projects = $this->queryPrj($request);
        foreach ($projects as $key => $project) {
            if ($project->stage_id != 2) {
                $projects->forget($key);
            }
        }
        foreach ($projects as $key => $project) {
            $project['id'] = Crypt::encrypt($project->projid);
            $project['link'] = "<a href='/project/$project->id')}}><i class='fa-solid fa-eye text-success'></i></a>";
            $project['link2'] = "<a href='/feedback/$project->id')}}><i class='fa-solid fa-comment'></i></i></a>";
            if ($project->projstatus !== 0) {
                $project['fyear'] = $project->financialYear->name;
                if ($project->program->section) {
                    $project['section'] = $project->program->section ?? null;
                } else {
                    $project['section'] = null;
                }
                $project->status;
                $sub_county_id = explode(',', $project->projcommunity);
                $ward_id = explode(',', $project->projlga);

                for ($i = 0; $i < count($sub_county_id); $i++) {
                    $location = Location::where('id', '=', $sub_county_id[$i])->first();
                    if ($location) {
                        $project['location'] = $location->state;
                    } else {
                        $project['location'] = 'n/a';
                    }
                }

                for ($j = 0; $j < count($ward_id); $j++) {
                    $ward = Location::where('id', '=', $ward_id[$j])->first();
                    if ($location) {
                        $project['ward'] = $ward->state;
                    } else {
                        $project['ward'] = 'n/a';
                    }
                }

                
            } else {
                $project['section'] = 'n/a';
                $project->status;
            }
        }
        return response($projects);
    }

    public function completedProjects()
    {
        $projects = Project::where('stage_id','=',3)->get();
        foreach ($projects as $key => $project) {
            $project['id'] = Crypt::encrypt($project->projid);
            $project['link'] = "<a href='/project/$project->id')}}><i class='fa-solid fa-eye text-success'></i></a>";
            $project['link2'] = "<a href='/feedback/$project->id')}}><i class='fa-solid fa-comment'></i></i></a>";
            if ($project->projstatus !== 0) {
                $project['fyear'] = $project->financialYear->name;
                if ($project->program->section) {
                    $project['section'] = $project->program->section ?? null;
                } else {
                    $project['section'] = null;
                }
                $project->status;
                $sub_county_id = explode(',', $project->projcommunity);
                $ward_id = explode(',', $project->projlga);

                for ($i = 0; $i < count($sub_county_id); $i++) {
                    $location = Location::where('id', '=', $sub_county_id[$i])->first();
                    if ($location) {
                        $project['location'] = $location->state;
                    } else {
                        $project['location'] = 'n/a';
                    }
                }

                for ($j = 0; $j < count($ward_id); $j++) {
                    $ward = Location::where('id', '=', $ward_id[$j])->first();
                    if ($location) {
                        $project['ward'] = $ward->state;
                    } else {
                        $project['ward'] = 'n/a';
                    }
                }
            } else {
                $project['section'] = 'n/a';
                $project->status;
            }
        }
        return response($projects);
    }

    public function completedProjectsQuery(Request $request)
    {
        $projects = $this->queryPrj($request);
        foreach ($projects as $key => $project) {
            if ($project->stage_id != 3) {
                $projects->forget($key);
            }
        }
        foreach ($projects as $key => $project) {
            $project['id'] = Crypt::encrypt($project->projid);
            $project['link'] = "<a href='/project/$project->id')}}><i class='fa-solid fa-eye text-success'></i></a>";
            $project['link2'] = "<a href='/feedback/$project->id')}}><i class='fa-solid fa-comment'></i></i></a>";
            if ($project->projstatus !== 0) {
                $project['fyear'] = $project->financialYear->name;
                if ($project->program->section) {
                    $project['section'] = $project->program->section ?? null;
                } else {
                    $project['section'] = null;
                }
                $project->status;
                $sub_county_id = explode(',', $project->projcommunity);
                $ward_id = explode(',', $project->projlga);

                for ($i = 0; $i < count($sub_county_id); $i++) {
                    $location = Location::where('id', '=', $sub_county_id[$i])->first();
                    if ($location) {
                        $project['location'] = $location->state;
                    } else {
                        $project['location'] = 'n/a';
                    }
                }

                for ($j = 0; $j < count($ward_id); $j++) {
                    $ward = Location::where('id', '=', $ward_id[$j])->first();
                    if ($location) {
                        $project['ward'] = $ward->state;
                    } else {
                        $project['ward'] = 'n/a';
                    }
                }

                
            } else {
                $project['section'] = 'n/a';
                $project->status;
            }
        }
        return response($projects);
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
