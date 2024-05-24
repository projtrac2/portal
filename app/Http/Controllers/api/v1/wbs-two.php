<?php
include '../controller.php';
try {

    $startYears = [];
    $annually = [];
    $quarterly = [];
    $miakaQuarter = [];
    $monthly = [];
    $miakaMonthly = [];
    $weekly = [];
    $miakaDaily = [];
    $f_start = '07-01';
    $f_end = '06-30';

    function getWeeksBetweenDates($start_date, $end_date)
    {
        // Create DateTime objects for the start and end dates
        $start_datetime = new DateTime($start_date);
        $end_datetime = new DateTime($end_date);

        // Calculate the difference in days between the two dates
        $interval = $start_datetime->diff($end_datetime);
        $days_difference = $interval->days;

        // Calculate the number of weeks
        $weeks = floor($days_difference / 7);

        return $weeks;
    }


    $get_years = function ($task_start_date, $task_end_date, $startYear, $prjDuration) use ($startYears, $f_start, $f_end) {
        $start_year = $startYear;
        $st = $startYear;
        for ($i = 0; $i < $prjDuration; $i++) {
            $f_year_start = $st . '-' . $f_start;
            $m_start = $start_year . '-' . $f_start;
            $f_year_end = $start_year + 1 . '-' . $f_end;
            $startYears[] =  [$m_start, $f_year_end];
            $start_year++;
        }

        $hash = 1;
        $tr = '
            <head>
                <tr>
                    <th>#</th> 
                    <th>Year</th> 
                    <th>Target</th> 
                </tr>
            </head>
            <body>
        ';
        for ($i = 0; $i < count($startYears); $i++) {
            $startFinancial = $startYears[$i][0];
            $endFinancial = $startYears[$i][1];
            if (
                ($task_start_date >= $startFinancial && $task_start_date <= $endFinancial) ||
                ($task_end_date >= $startFinancial && $task_end_date <= $endFinancial) ||
                ($task_start_date <= $startFinancial && $task_end_date >= $startFinancial && $task_end_date >= $endFinancial)
            ) {
                $years[] = $startFinancial . '/' . $endFinancial;
                $tr .= "<tr><td>$hash</td><td>$startFinancial - $endFinancial</td><td><input type='number' class='form-control yearly-target' name='yearly-target' /></td></tr>";
                $hash++;
            }
        }

        $tr .= '</body>';

        return $tr;
    };

    /**
     * get semi annuals
     * @param SubTaskStartDate
     * @param SubTaskEndDate
     * @return array
     */
    $get_semi_annuals = function ($task_start_date, $task_end_date) use ($startYears, $annually) {
        for ($i = 0; $i < count($startYears); $i++) {
            $startFinancial = $startYears[$i][0];
            $endFinancial = $startYears[$i][1];
            $startFinancialMidPoint = strtotime('+6 months -1 day', strtotime($startFinancial));
            $date = date('Y-m-d', $startFinancialMidPoint);
            $endFinancialMidPoint = strtotime('-6 months +2 day', strtotime($endFinancial));
            $datetwo = date('Y-m-d', $endFinancialMidPoint);
            $annually[] = [[$startFinancial, $date], [$datetwo, $endFinancial]];
        }

        $hash = 1;
        // semi annually
        $tr = '
            <table>
            <thead>
                <tr>
                    <th>#</th> 
                    <th>Semi Annual</th> 
                    <th>Target</th> 
                </tr>
            </thead>
            <tbody>
        ';
        for ($i = 0; $i < count($annually); $i++) {
            for ($t = 0; $t < count($annually[$i]); $t++) {
                $annual_start = $annually[$i][$t][0];
                $annual_end = $annually[$i][$t][1];
                if (
                    ($task_start_date >= $annual_start && $task_start_date <= $annual_end) ||
                    ($task_end_date >= $annual_start && $task_end_date <= $annual_end) ||
                    ($task_start_date <= $annual_start && $task_end_date >= $annual_start && $task_end_date >= $annual_end)
                ) {
                    $miaka[] = $annual_start . '/' . $annual_end;
                    $tr .= "<tr><td>$hash</td><td>$annual_start - $annual_end</td><td><input type='number' class='form-control semi-annual' name='semi-annual' /></td></tr>";
                }
            }

            $hash++;
        }

        $tr .= '</tbody></table>';
        var_dump($annually, $task_start_date, $task_end_date, $startYears);
        return $tr;
    };

    /**
     * get semi annuals
     * @param SubTaskStartDate
     * @param SubTaskEndDate
     * @return array
     */
    $get_quarters = function ($task_start_date, $task_end_date) use ($annually, $quarterly, $miakaQuarter) {
        // quarterly
        for ($i = 0; $i < count($annually); $i++) {
            for ($t = 0; $t < count($annually[$i]); $t++) {
                $startFinancial = $annually[$i][$t][0];
                $endFinancial = $annually[$i][$t][1];

                $startFinancialMidPoint = strtotime('+3 months -1 day', strtotime($startFinancial));
                $date = date('Y-m-d', $startFinancialMidPoint);
                $endFinancialMidPoint = strtotime('-3 months ', strtotime($endFinancial));
                $datetwo = date('Y-m-d', $endFinancialMidPoint);
                $quarterly[] = [[$startFinancial, $date], [$datetwo, $endFinancial]];
            }
        }

        $tr = '
            <head>
                <tr>
                    <th>#</th> 
                    <th>Quarter</th> 
                    <th>Target</th> 
                </tr>
            </head>
            <body>
        ';
        $hash = 1;
        for ($i = 0; $i < count($quarterly); $i++) {
            for ($t = 0; $t < count($quarterly[$i]); $t++) {
                $annual_start = $quarterly[$i][$t][0];
                $annual_end = $quarterly[$i][$t][1];
                if (
                    ($task_start_date >= $annual_start && $task_start_date <= $annual_end) ||
                    ($task_end_date >= $annual_start && $task_end_date <= $annual_end) ||
                    ($task_start_date <= $annual_start && $task_end_date >= $annual_start && $task_end_date >= $annual_end)
                ) {
                    $miakaQuarter[] = $annual_start . '/' . $annual_end;
                    $tr .= "<td>$hash</td><td>$annual_start - $annual_end</td><td><input type='number' class='form-control quarter-target' name='quarter-target' /></td>";
                }
            }
            $hash++;
        }


        $tr .= '</body>';

        return $tr;
    };

    
    $get_monthly = function ($task_start_date, $task_end_date) use ($monthly, $quarterly, $miakaMonthly) {
        for ($i = 0; $i < count($quarterly); $i++) {
            for ($t = 0; $t < count($quarterly[$i]); $t++) {
                $startFinancial = $quarterly[$i][$t][0];
                $endFinancial = $quarterly[$i][1][1];


                while ($startFinancial <= $endFinancial) {
                    $startFinancialMidPoint = strtotime('+1 month -1 day', strtotime($startFinancial));
                    // dd($startFinancialMidPoint);
                    $date = date('Y-m-d', $startFinancialMidPoint);
                    // $endFinancialMidPoint = strtotime('-1 month -30 days', strtotime($endFinancial));
                    // $datetwo = date('Y-m-d', $endFinancialMidPoint);
                    $monthly[] = [$startFinancial, $date];
                    $startFinancial = date('Y-m-d', strtotime('+1 day', strtotime($date)));
                }

                break;
            }
        }
        $tr = '
            <head>
                <tr>
                    <th>#</th> 
                    <th>Quarter</th> 
                    <th>Target</th> 
                </tr>
            </head>
            <body>
        ';
        $tr_array = [];
        $hash = 1;
        for ($i = 0; $i < count($monthly); $i++) {
            $annual_start = $monthly[$i][0];
            $annual_end = $monthly[$i][1];
            if (
                ($task_start_date >= $annual_start && $task_start_date <= $annual_end) ||
                ($task_end_date >= $annual_start && $task_end_date <= $annual_end) ||
                ($task_start_date <= $annual_start && $task_end_date >= $annual_start && $task_end_date >= $annual_end)
            ) {
                $miakaMonthly[] = $annual_start . '/' . $annual_end;
                $tr .= "<tr><td>$hash</td><td>$annual_start - $annual_end</td><td><input type='number' class='form-control monthly-target' name='monthly-target' /></td></tr>";
                $tr_array[] = $tr;
            }
            $hash++;
        }

        $tr .= '</body>';

        return $tr;
    };


    $get_weeks = function () use ($miakaMonthly, $weekly) {
        // weekly
        for ($i = 0; $i < count($miakaMonthly); $i++) {
            $month = $miakaMonthly[$i];
            $month_array = explode('/', $month);
            $num_of_weeks = getWeeksBetweenDates($month_array[0], $month_array[1]);
            $weekly[] = [$month => $num_of_weeks];
        }
        $tr = '
            <head>
                <tr>
                    <th>#</th> 
                    <th>Month</th> 
                    <th>Target</th> 
                </tr>
            </head>
            <body>
        ';
        $hash = 1;
        foreach ($weekly as $key => $week) {
            $tr = "<tr></td>$hash</td><td>$key</td>";
            $week_num = 1;
            for ($i=0; $i < $week; $i++) { 
                $tr .= "<td><label class='form-label'>week $week_num</label><br /><input type='number' class='form-control weekly-targets' name='weekly-targets' /></td>";
            }
            $tr .= '</tr>';
        }

        $tr .= '</body>';

        return $tr;
    };

    $get_days = function ($task_start_date, $task_end_date) use ($miakaDaily) {
        $hash = 1;
        $tr = '
            <head>
                <tr>
                    <th>#</th> 
                    <th>Date</th> 
                    <th>Target</th> 
                </tr>
            </head>
            <body>
        ';
        $daily_task_start_date = $task_start_date;
        while ($daily_task_start_date <= $task_end_date) {
            $date = date('Y-m-d', strtotime($daily_task_start_date));
            $miakaDaily[] = $date;
            $daily_task_start_date = date('Y-m-d', strtotime('+1 day', strtotime($date)));
            $tr .= "<tr><td>$hash</td><td>$date</td><input type='number' class='form-control daily-target' name='daily-target' /></tr>";
        }

        $tr .= '</body>';


        return $tr;
    };

    $get_duration = function ($project_start_date, $project_end_date) {
        $date1 = new DateTime($project_start_date);
        $date2 = new DateTime($project_end_date);
        $interval = $date1->diff($date2);
        return $interval->y;
    };


    if (isset($_GET['get_tasks'])) {
        $site_id = $_GET['site_id'];
        $projid = $_GET['projid'];
        $task_id = $_GET['task_id'];
        $subtask_id = $_GET['subtask_id'];
        $rows = '';
        $query_rsProjects = $db->prepare("SELECT * FROM tbl_projects p inner join tbl_programs g on g.progid=p.progid WHERE p.deleted='0' AND projid = :projid");
        $query_rsProjects->execute(array(":projid" => $projid));
        $row_rsProjects = $query_rsProjects->fetch();
        $totalRows_rsProjects = $query_rsProjects->rowCount();

        if ($totalRows_rsProjects > 0) {
            $min_date = $row_rsProjects['projstartdate'];
            $max_date = $row_rsProjects['projenddate'];
            // $duration = $prjDuration; // calculate duration
            $duration_years = $get_duration($min_date, $max_date);
            $proj_start_year = date('Y',strtotime($min_date));


            $query_rsTask_Start_Dates = $db->prepare("SELECT * FROM tbl_program_of_works WHERE task_id=:task_id AND site_id=:site_id AND subtask_id=:subtask_id ");
            $query_rsTask_Start_Dates->execute(array(':task_id' => $task_id, ':site_id' => $site_id, ":subtask_id" => $subtask_id));
            $row_rsTask_Start_Dates = $query_rsTask_Start_Dates->fetch();
            $totalRows_rsTask_Start_Dates = $query_rsTask_Start_Dates->rowCount();
            if ($totalRows_rsTask_Start_Dates > 0) {
                $task_start_date = $row_rsTask_Start_Dates['start_date'];
                $task_end_date = $row_rsTask_Start_Dates['end_date'];
                $duration = $row_rsTask_Start_Dates['duration'];
                $structure = '';

                $rows_yearly = $get_years($task_start_date, $task_end_date, $proj_start_year, $duration_years);
                $rows_semi_annual = $get_semi_annuals($task_start_date, $task_end_date);
                $rows_quarterly = $get_quarters($task_start_date, $task_end_date);
                $rows_monthly = $get_monthly($task_start_date, $task_end_date);
                $rows_weekly = $get_weeks();
                $rows_daily = $get_days($task_start_date, $task_end_date);
                
                if ($frequency == 1) {
                    // yearly
                    $structure = $rows_yearly;
                } else if ($frequency == 2) {
                    // semi annual
                    $structure = $rows_semi_annual;
                } else if ($frequency == 3) {
                    // quarterly
                    $structure = $rows_quarterly;
                } else if ($frequency == 4) {
                    // monthly
                    $structure = $rows_monthly;
                } else if ($frequency == 5) {
                    // weekly
                    $structure = $rows_weekly;
                } else if ($frequency == 6) {
                    // dailly
                    $structure = $rows_daily;
                }
            }
        }

        echo json_encode(array("success" => true, "structure" => $structure));
    }
} catch (PDOException $ex) {
    $result = flashMessage("An error occurred: " . $ex->getMessage());
    echo $ex->getMessage();
}


