<?php

use App\Http\Controllers\api\v1\OnGoingProjectsController;
use App\Http\Controllers\api\v1\ProjectController;
use App\Http\Controllers\api\v1\ProjectTwoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
/**
 * search area routes
 */
Route::get('/sub-counties-financial-years', [ProjectController::class, 'subCountiesAndFinancialYearsData'])->name('sub-counties-financial-years');
Route::get('/get-wards/{sub_county_id}', [ProjectController::class, 'getWards']);

/**
 * landing page routes
 * 
 * changed to the routes below
 */
Route::get('/projects', [ProjectController::class, 'index'])->name('projects-all');
Route::post('/projects/filter', [ProjectController::class, 'query'])->name('filter-projects');

Route::get('/quick-stats', [ProjectTwoController::class, 'allProjects'])->name('projects.all');
Route::get('/project/sub-counties', [ProjectTwoController::class, 'projectPerSubCounty'])->name('projects.subCounty');
Route::get('/project/all-wards', [ProjectTwoController::class, 'projectPerWard']);
Route::get('/project/departments', [ProjectTwoController::class, 'projectPerDepartment']);
Route::get('/project-status', [ProjectTwoController::class, 'getProjectByStatus']);

/** query per department */
Route::post('/quick-stats/query', [ProjectTwoController::class, 'allProjectsQuery']);
Route::post('/project-status/query', [ProjectTwoController::class, 'getProjectByStatusQuery']);
Route::post('/projects/departments/query', [ProjectTwoController::class, 'projectPerDepartmentQuery']);

// projects ongoing
Route::get('/projects/ongoing', [OnGoingProjectsController::class, 'onGoingProjects']);
Route::post('/projects/ongoing/query', [OnGoingProjectsController::class, 'onGoingProjectsQuery']);

// projects completed
Route::get('/projects/completed', [OnGoingProjectsController::class, 'completedProjects']);
Route::post('/projects/completed/query', [OnGoingProjectsController::class, 'completedProjectsQuery']);

/**
 * projects page data
 */
Route::get('/all-projects', [ProjectController::class, 'allProjects']);
Route::post('/all-projects/filter', [ProjectController::class, 'filter']);

/**
 * feedback
 */
Route::post('/feedback/add', [ProjectController::class, 'saveFeedBack']);

/**
 * chart data
 */
Route::get('/chart-data-one', [ProjectController::class, 'projectDistributionPerSubCounty']);
Route::post('/chart-data-one/query', [ProjectController::class, 'projectDistributionPerSubCountyQuery']);
Route::get('/chart-data-two', [ProjectController::class, 'budgetAllocationPerFinancialYear']);
Route::post('/chart-data-two/query', [ProjectController::class, 'budgetAllocationPerFinancialYearQuery']);
Route::get('/chart-data-three', [ProjectController::class, 'budgetAllocationPerDept']);
Route::post('/chart-data-three/query', [ProjectController::class, 'budgetAllocationPerDeptQuery']);

Route::get('/output-targets/{id}', [ProjectController::class, 'outputTarget'])->name('output_targets');

Route::get('/date-distribution', [ProjectController::class, 'yearDistribution']);

Route::post('/date-distribution/post', [ProjectController::class, 'yearDistributionPost']);