<?php

function yearDistribution($taskStartDate, $taskEndDate, $startYear, $prjDuration)
{
    // $task_start_date = '2023-07-01';
    // $task_end_date = '2024-07-30';
    // $start_year = 2022;
    // $st = 2022;
    // $duration = 4;
    $task_start_date = $taskStartDate;
    $task_end_date = $taskEndDate;
    $start_year = $startYear;
    $st = $startYear;
    $duration = $prjDuration;
    $f_start = '07-01';
    $f_end = '06-30';
    $startYears = [];
    $years = [];

    for ($i = 0; $i < $duration; $i++) {
        $f_year_start = $st . '-' . $f_start;
        $m_start = $start_year . '-' . $f_start;
        $f_year_end = $start_year + 1 . '-' . $f_end;
        $startYears[] =  [$m_start, $f_year_end];
        // dd($task_start_date, $m_start, $task_end_date, $f_year_end);
        $start_year++;
    }

    $st2 = 2022;
    $start_year2 = 2022;

    for ($i = 0; $i < count($startYears); $i++) {
        $startFinancial = $startYears[$i][0];
        $endFinancial = $startYears[$i][1];


        if (
            ($task_start_date >= $startFinancial && $task_start_date <= $endFinancial) ||
            ($task_end_date >= $startFinancial && $task_end_date <= $endFinancial) ||
            ($task_start_date <= $startFinancial && $task_end_date >= $startFinancial && $task_end_date >= $endFinancial)
        ) {
            $years[] = $startFinancial . '/' . $endFinancial;
        }
    }
    // if (count($years) <  1) {
    //     for ($i = 0; $i < $duration; $i++) {
    //         $f_year_start = $st2 . '-' . $f_start;
    //         $m_start = $start_year2 . '-' . $f_start;
    //         $f_year_end = $start_year2 + 1 . '-' . $f_end;
    //         //dd($task_start_date, $f_year_start, $task_end_date, $f_year_end);
    //         if (
    //             $task_start_date >= $f_year_start && $task_end_date >= $f_year_end
    //         ) {
    //             $years[] = $m_start . '/' . $f_year_end;
    //         }

    //         if ($task_start_date >= $f_year_start && $task_end_date <= $f_year_end) {
    //             $years[] = $m_start . '/' . $f_year_end;
    //         }

    //         $start_year2++;
    //     }
    // }
    // for ($i=0; $i < count($startYears); $i++) { 
    //     $f_year_start = $st . '-' . $f_start;
    //     $m_start = $start_year . '-' . $f_start;
    //     $f_year_end = $start_year + 1 . '-' . $f_end;
    //     if ($task_start_date >= $f_year_start && $task_end_date <= $f_year_end) {
    //         $years[] = $m_start . '/' . $f_year_end;
    //     }
    //     $start_year++;
    // }

    $annually = [];

    $quarterly = [];

    $monthly = [];

    $weekly = [];


    // semi annually
    for ($i = 0; $i < count($startYears); $i++) {
        $startFinancial = $startYears[$i][0];
        $endFinancial = $startYears[$i][1];
        $startFinancialMidPoint = strtotime('+6 months -1 day', strtotime($startFinancial));
        $date = date('Y-m-d', $startFinancialMidPoint);
        $endFinancialMidPoint = strtotime('-6 months +2 day', strtotime($endFinancial));
        $datetwo = date('Y-m-d', $endFinancialMidPoint);
        $annually[] = [[$startFinancial, $date], [$datetwo, $endFinancial]];
    }


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

    // monthly
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


    // weekly


    $quaters = 0;
    $miaka = [];
    $miakaQuarter = [];
    $miakaMonthly = [];
    $miakaDaily = [];

    // semi annually
    for ($i = 0; $i < count($annually); $i++) {
        for ($t = 0; $t < count($annually[$i]); $t++) {
            $annual_start = $annually[$i][$t][0];
            $annual_end = $annually[$i][$t][1];
            if (
                ($task_start_date >= $annual_start && $task_start_date <= $annual_end) ||
                ($task_end_date >= $annual_start && $task_end_date <= $annual_end) ||
                ($task_start_date <= $annual_start && $task_end_date >= $annual_start && $task_end_date >= $annual_end)
            ) {
                $quaters++;
                $miaka[] = $annual_start . '/' . $annual_end;
            }
        }
    }

    // quarterly
    for ($i = 0; $i < count($quarterly); $i++) {
        for ($t = 0; $t < count($quarterly[$i]); $t++) {
            $annual_start = $quarterly[$i][$t][0];
            $annual_end = $quarterly[$i][$t][1];
            if (
                ($task_start_date >= $annual_start && $task_start_date <= $annual_end) ||
                ($task_end_date >= $annual_start && $task_end_date <= $annual_end) ||
                ($task_start_date <= $annual_start && $task_end_date >= $annual_start && $task_end_date >= $annual_end)
            ) {
                $quaters++;
                $miakaQuarter[] = $annual_start . '/' . $annual_end;
            }
        }
    }

    // monthly
    for ($i = 0; $i < count($monthly); $i++) {
        $annual_start = $monthly[$i][0];
        $annual_end = $monthly[$i][1];
        if (
            ($task_start_date >= $annual_start && $task_start_date <= $annual_end) ||
            ($task_end_date >= $annual_start && $task_end_date <= $annual_end) ||
            ($task_start_date <= $annual_start && $task_end_date >= $annual_start && $task_end_date >= $annual_end)
        ) {
            $miakaMonthly[] = $annual_start . '/' . $annual_end;
        }
    }


    // weekly
    for ($i = 0; $i < count($miakaMonthly); $i++) {
        $month = $miakaMonthly[$i];
        $month_array = explode('/', $month);
        $num_of_weeks = getWeeksBetweenDates($month_array[0], $month_array[1]);
        $weekly[] = [$month => $num_of_weeks];
    }

    // daily
    // $task_start_date = '2023-07-01';
    // $task_end_date = '2025-05-01';
    $daily_task_start_date = $task_start_date;
    while ($daily_task_start_date <= $task_end_date) {
        $date = date('Y-m-d', strtotime($daily_task_start_date));
        $miakaDaily[] = $date;
        $daily_task_start_date = date('Y-m-d', strtotime('+1 day', strtotime($date)));
    }

    // dd($annually, $quaters, $miaka);
    // dd($startYears, $annually);
    //dd($years, $miaka, $miakaQuarter, $miakaMonthly, $weekly,  $miakaDaily);

    return response([
        $years, $miaka, $miakaQuarter, $miakaMonthly, $weekly,  $miakaDaily
    ]);
}


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
