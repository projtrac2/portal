<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="description" content="Responsive Laravel Admin Dashboard Template based on Bootstrap 5">
        <meta name="author" content="NobleUI">
        <meta name="keywords" content="nobleui, bootstrap, bootstrap 5, bootstrap5, admin, dashboard, template, responsive, css, sass, html, laravel, theme, front-end, ui kit, web">

        <title>Projtrac Systems - Public Portal</title>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
        rel="stylesheet">
        <!-- Fonts -->
        <script src="https://kit.fontawesome.com/6557f5a19c.js" crossorigin="anonymous"></script>


        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
        <!-- End fonts -->
        
        <!-- CSRF Token -->
        <meta name="_token" content="{{ csrf_token() }}">
        
        <link rel="shortcut icon" href="{{ asset('/favicon.ico') }}">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
        <!-- plugin css -->
        <link href="{{ asset('assets/fonts/feather-font/css/iconfont.css') }}" rel="stylesheet" />
        <link href="{{ asset('assets/plugins/perfect-scrollbar/perfect-scrollbar.css') }}" rel="stylesheet" />
        <style>
            .page-wrapper {
                background-image: url("{{asset('images/flag1.png')}}") !important;
            }
            .legal {
                bottom: 0;
                width: 100%;
                background-color: #03A9F4;
                border-top: 1px solid #eee;
                padding: 5px;
                overflow: hidden;
                color: black;
            }
            @media only screen and (max-width: 600px) { 
                .copyright {
                    font-size: 10px !important;
                }
                .version {
                    font-size: 10px !important;
                }
             }
        </style>
    </head>
    <body class="antialiased">
        <script src="{{ asset('assets/js/spinner.js') }}"></script>

        <div class="main-wrapper" id="app">
            <div class="page-wrapper">
              @include('layouts.header')
              <div class="page-content">

                @if (Session::has('success'))
                    <div class="alert alert-success" role="alert" id="success">
                        {{Session::get('success')}}
                    </div>
                @endif

                @if (Session::has('unsuccess'))
                    <div class="alert alert-danger" role="alert" id="danger">
                        {{Session::get('unsuccess')}}
                    </div> 
                @endif
                @include('welcome_components.search_area')
                @include('welcome_components.blocks')
                @include('welcome_components.budget_chart')
              </div>
              <div class="legal text-center">
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 copyright">
                    ProjTrac RBMS - Your Best Result-Based Management System
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 version" align="right">
                    Copyright @ 2017 - 2024. <a href="https://projtrac.co.ke/">ProjTrac Systems Ltd</a>
                </div>
              </div>
            </div>
        </div>


        <!-- base js -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('assets/plugins/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <!-- end base js -->

    <!-- plugin js -->
    <!-- end plugin js -->

    <!-- common js -->
    <script src="{{ asset('assets/js/template.js') }}"></script>
    <script src="{{ asset('assets/plugins/chartjs/chart.umd.js') }}"></script>
    <script >
        $(function() {
            'use strict';

            const formatter = new Intl.NumberFormat('en-US', {
                style: 'decimal',
                minimumFractionDigits: 2,
                maximumFractionDigits: 2,
            });
            
            $('#reset-btn').on('click', () => {
                location.reload();
            });

            var colors = {
                primary        : "#6571ff",
                secondary      : "#7987a1",
                success        : "#05a34a",
                info           : "#66d1d1",
                warning        : "#fbbc06",
                danger         : "#ff3366",
                light          : "#e9ecef",
                dark           : "#060c17",
                muted          : "#7987a1",
                gridBorder     : "rgba(77, 138, 240, .15)",
                bodyColor      : "#000",
                cardBg         : "#fff"
            }
            
            var fontFamily = "'Roboto', Helvetica, sans-serif"

            let allocationPerDepartmentName = [];
            let allocationPerDepartmentData = [];
            let allocationPerDepartmentChart;
          
            // budget allocation per department
            // Bar chart
            $.ajax({
                type: "GET",
                url: "/api/chart-data-three",
                processData: false,
                contentType: false,
                cache: false,
                error: function(data){
                    console.log(data);
                },
                success: function (response) {
                    
                    for (let i = 0; i < response.length; i++) {
                        allocationPerDepartmentName.push(response[i].sector);                   
                        allocationPerDepartmentData.push(response[i].amount);                   
                    }

                    if($('#chartjsBar').length) {
                        allocationPerDepartmentChart = new Chart($("#chartjsBar"), {
                        type: 'bar',
                        data: {
                            labels: allocationPerDepartmentName,
                            datasets: [
                            {
                                label: "Ksh",
                                backgroundColor: [colors.primary],
                                data: allocationPerDepartmentData,
                            }
                            ]
                        },
                        options: {
                            plugins: {
                            legend: { display: false },
                            },
                            scales: {
                            x: {
                                display: true,
                                grid: {
                                display: true,
                                color: colors.gridBorder,
                                borderColor: colors.gridBorder,
                                },
                                ticks: {
                                color: colors.bodyColor,
                                font: {
                                    size: 12
                                }
                                }
                            },
                            y: {
                                grid: {
                                display: true,
                                color: colors.gridBorder,
                                borderColor: colors.gridBorder,
                                },
                                ticks: {
                                color: colors.bodyColor,
                                font: {
                                    size: 12
                                }
                                }
                            }
                            }
                        }
                        });
                    }
                }
            })


            $('#from').on('change', allocationPerDepartmentQuery);
            $('#to').on('change', allocationPerDepartmentQuery);
            $('#subCounty').on('change', allocationPerDepartmentQuery);
            $('#ward').on('change', allocationPerDepartmentQuery);

            function allocationPerDepartmentQuery() {
                let subCountyId = $('.subCounty').find(":selected").val();
                let from = $('#from').find(":selected").val();
                let to = $('#to').find(":selected").val();
                let wardId = $('#ward').find(":selected").val();
                
                let data = new FormData();
                data.append('_token', '{{csrf_token()}}');
                data.append('sub_county_id', subCountyId);
                data.append('from', from);
                data.append('to', to);
                data.append('ward_id', wardId);

                $.ajax({
                    type: "POST",
                    url: "/api/chart-data-three/query",
                    processData: false,
                    contentType: false,
                    cache: false,
                    data: data,
                    error: function(data){
                        console.log(data);
                    },
                    success: function (response) {
                        
                        
                        allocationPerDepartmentName = [];                 
                        allocationPerDepartmentData = [];

                        allocationPerDepartmentChart.destroy();
                        for (let i = 0; i < response.length; i++) {
                            allocationPerDepartmentName.push(response[i].sector);                   
                            allocationPerDepartmentData.push(response[i].amount);                   
                        }

                        if($('#chartjsBar').length) {
                            allocationPerDepartmentChart = new Chart($("#chartjsBar"), {
                            type: 'bar',
                            data: {
                                labels: allocationPerDepartmentName,
                                datasets: [
                                {
                                    label: "Ksh",
                                    backgroundColor: [colors.primary],
                                    data: allocationPerDepartmentData,
                                }
                                ]
                            },
                            options: {
                                plugins: {
                                legend: { display: false },
                                },
                                scales: {
                                x: {
                                    display: true,
                                    grid: {
                                    display: true,
                                    color: colors.gridBorder,
                                    borderColor: colors.gridBorder,
                                    },
                                    ticks: {
                                    color: colors.bodyColor,
                                    font: {
                                        size: 12
                                    }
                                    }
                                },
                                y: {
                                    grid: {
                                    display: true,
                                    color: colors.gridBorder,
                                    borderColor: colors.gridBorder,
                                    },
                                    ticks: {
                                    color: colors.bodyColor,
                                    font: {
                                        size: 12
                                    }
                                    }
                                }
                                }
                            }
                            });
                        }
                    }
                })
            }


            //Projects Distribution per Sub-County
            // doughnut chart
            let projDistributionName = [];
            let projDistributionData = [];
            let projDistributionChart = '';

            $.ajax({
                type: "GET",
                url: "/api/chart-data-one",
                processData: false,
                contentType: false,
                cache: false,
                error: function(data){
                    console.log(data);
                },
                success: function (response) {
                
                    for (let i = 0; i < response.length; i++) {
                        projDistributionName.push(response[i].state);
                        projDistributionData.push(response[i].num_of_projects);
                    }


                    if($('#chartjsDoughnut').length) {
                        projDistributionChart = new Chart($('#chartjsDoughnut'), {
                        type: 'doughnut',
                        data: {
                            labels: projDistributionName,
                            datasets: [
                            {
                                label: "Number of projects",
                                backgroundColor: [colors.primary, colors.secondary, colors.success,colors.warning, colors.dark, colors.danger, colors.info],
                                borderColor: colors.cardBg,
                                data: projDistributionData,
                            }
                            ]
                        },
                        options: {
                            aspectRatio: 2,
                            plugins: {
                            legend: { 
                                display: true,
                                labels: {
                                color: colors.bodyColor,
                                font: {
                                    size: '13px',
                                    family: fontFamily
                                }
                                }
                            },
                            }
                        }
                        });


                    }
                }
            })

            // query
            $('#from').on('change', () => queryProjDistributionSubCounty('from'));
            $('#to').on('change', () => queryProjDistributionSubCounty('to'));
            $('#subCounty').on('change', () => queryProjDistributionSubCounty('subCounty'));
            $('#ward').on('change', () => queryProjDistributionSubCounty('ward'));

            function queryProjDistributionSubCounty(trigger) {
                if (trigger == 'subCounty') {
                    document.getElementById("ward").selectedIndex = 0;
                }
                let subCountyId = $('.subCounty').find(":selected").val();
                let from = $('#from').find(":selected").val();
                let to = $('#to').find(":selected").val();
                let wardId = $('#ward').find(":selected").val();
                
                let data = new FormData();
                data.append('_token', '{{csrf_token()}}');
                data.append('sub_county_id', subCountyId);
                data.append('from', from);
                data.append('to', to);
                data.append('ward_id', wardId);
                $.ajax({
                    type: "POST",
                    url: "/api/chart-data-one/query",
                    processData: false,
                    contentType: false,
                    cache: false,
                    data: data,
                    error: function(data){
                        console.log(data);
                    },
                    success: function (response) {
                        projDistributionName = [];
                        projDistributionData = [];
                        projDistributionChart.destroy();
                        projDistributionChart = null;
                        let chartLabel;
                       

                        for (let i = 0; i < response.length; i++) {
                            if (response[i].ward_details) {
                                for (let t = 0; t < response[i].ward_details.length; t++) {
                                    chartLabel = `${response[i].state} (${response[i].ward_details[t].state}) Number of projects`;
                                    projDistributionName.push(`${response[i].state} (${response[i].ward_details[t].state})`);
                                    projDistributionData.push(response[i].ward_details[t].num_of_projects);
                                }
                            } else {
                                projDistributionName.push(response[i].state);
                                projDistributionData.push(response[i].num_of_projects);
                            }
                            
                        }


                        projDistributionChart = new Chart($('#chartjsDoughnut'), {
                            type: 'doughnut',
                            data: {
                                labels: projDistributionName,
                                datasets: [
                                {
                                    label: chartLabel ? chartLabel : "Number of projects",
                                    backgroundColor: [colors.primary, colors.secondary, colors.success,colors.warning, colors.dark, colors.danger, colors.info],
                                    borderColor: colors.cardBg,
                                    data: projDistributionData,
                                }
                                ]
                            },
                            options: {
                                aspectRatio: 2,
                                plugins: {
                                legend: { 
                                    display: true,
                                    labels: {
                                    color: colors.bodyColor,
                                    font: {
                                        size: '13px',
                                        family: fontFamily
                                    }
                                    }
                                },
                                }
                            }
                        });


                        // projDistributionChart.render();

                    }
                })
            }

            let allocationPerFYearName = [];
            let allocationPerFYearData = [];
            let allocationPerFYearChart;
          
            // budget allocation per financial year
            // Bar chart
            $.ajax({
                type: "GET",
                url: "/api/chart-data-two",
                processData: false,
                contentType: false,
                cache: false,
                error: function(data){
                    console.log(data);
                },
                success: function (response) {
                    for (let i = 0; i < response.length; i++) {
                        allocationPerFYearName.push(response[i].year);                   
                        allocationPerFYearData.push(response[i].amount);                   
                    }
                    if($('#chartjsBar2').length) {
                        allocationPerFYearChart = new Chart($("#chartjsBar2"), {
                        type: 'bar',
                        data: {
                            labels: allocationPerFYearName,
                            datasets: [
                            {
                                label: `Budget allocated (ksh)`,
                                backgroundColor: [colors.primary],
                                data: allocationPerFYearData,
                            }
                            ]
                        },
                        options: {
                            plugins: {
                            legend: { display: false },
                            },
                            scales: {
                            x: {
                                display: true,
                                grid: {
                                display: true,
                                color: colors.gridBorder,
                                borderColor: colors.gridBorder,
                                },
                                ticks: {
                                color: colors.bodyColor,
                                font: {
                                    size: 12
                                }
                                }
                            },
                            y: {
                                grid: {
                                display: true,
                                color: colors.gridBorder,
                                borderColor: colors.gridBorder,
                                },
                                ticks: {
                                color: colors.bodyColor,
                                font: {
                                    size: 12
                                }
                                }
                            }
                            }
                        }
                        });
                    }
                }
            })


            $.ajax({
                type: "GET",
                url: "/api/project-status",
                processData: false,
                contentType: false,
                cache: false,
                error: function(data){
                    console.log(data);
                },
                success: function (response) {
                    $('#numPreInvestment').text(response.preInvestment);
                    $('#numPlanned').text(response.planned);
                    $('#numOnGoing').text(response.onGoing);
                    $('#numCompleted').text(response.completed);
                }
            });



            $.ajax({
                type: "GET",
                url: "/api/sub-counties-financial-years",
                processData: false,
                contentType: false,
                cache: false,
                error: function(data){
                    console.log(data);
                },
                success: function (response) {
                    for (let i = 0; i < response.fYears.length; i++) {
                        let option = `
                            <option value="${response.fYears[i].id}">${response.fYears[i].year}</option>
                        `;
                        $('#from').append(option);
                        $('#to').append(option);
                    }

                    for (let i = 0; i < response.subCounties.length; i++) {
                        let option = `
                            <option value="${response.subCounties[i].id}">${response.subCounties[i].state}</option>
                        `;
                        $('#subCounty').append(option);
                    }
                }
            });

        


            $('#subCounty').on('change', getWards);
            
            function getWards() {
                $('#ward').children().remove();
                $('#ward').append('<option>Select...</option>');

                let subCountyId = $('.subCounty').find(":selected").val();
                $.ajax({
                    type: "GET",
                    url: "/api/get-wards/"+subCountyId,
                    processData: false,
                    contentType: false,
                    cache: false,
                    error: function(data){
                        console.log(data);
                    },
                    success: function (message) {
                        
                        for (let i = 0; i < message.length; i++) {
                            let data = `<option value="${message[i].id}">${message[i].state}</option>`;
                            $('#ward').append(data);                        
                        }
                    }
                });
            }

            //$('#filter-btn').on('click',getQueryData);
        
            $('#from').on('change', getQueryData);
            $('#to').on('change', getQueryData);
            $('#subCounty').on('change', getQueryData);
            $('#ward').on('change', getQueryData);
            function getQueryData() {
                let subCountyId = $('.subCounty').find(":selected").val();
                let wardId = $('#ward').find(":selected").val();
                let from = $('#from').find(":selected").val();
                let to = $('#to').find(":selected").val();
                
                let data = new FormData();
                data.append('_token', '{{csrf_token()}}');
                data.append('sub_county_id', subCountyId);
                data.append('ward_id', wardId);
                data.append('from', from);
                data.append('to', to);

                $.ajax({
                    type: "POST",
                    url: "/api/projects/filter",
                    processData: false,
                    contentType: false,
                    cache: false,
                    data: data,
                    error: function(data){
                        console.log(data);
                    },
                    success: function (response) {

                  $('#numPreInvestment').text(response[0]);
                    $('#numPlanned').text(response[1]);
                    $('#numOnGoing').text(response[2]);
                    $('#numCompleted').text(response[3]);
                       
                        
                    }
                });
            }

            $('#from').on('change', queryFinancialYearDistribution);
            $('#to').on('change', queryFinancialYearDistribution);
            $('#subCounty').on('change', queryFinancialYearDistribution);
            $('#ward').on('change', queryFinancialYearDistribution);

            function queryFinancialYearDistribution() {
                let subCountyId = $('.subCounty').find(":selected").val();
                let from = $('#from').find(":selected").val();
                let to = $('#to').find(":selected").val();
                
                let data = new FormData();
                data.append('_token', '{{csrf_token()}}');
                data.append('sub_county_id', subCountyId);
                data.append('from', from);
                data.append('to', to);

                $.ajax({
                    type: "POST",
                    url: "/api/chart-data-two/query",
                    processData: false,
                    contentType: false,
                    cache: false,
                    data: data,
                    error: function(data){
                        console.log(data);
                    },
                    success: function (response) {
                        allocationPerFYearName = [];
                        allocationPerFYearData = [];

                        for (let i = 0; i < response.length; i++) {
                            allocationPerFYearName.push(response[i].year);
                            allocationPerFYearData.push(response[i].amount);
                        }

                        allocationPerFYearChart.destroy();
                        allocationPerFYearChart = new Chart($("#chartjsBar2"), {
                            type: 'bar',
                            data: {
                                labels: allocationPerFYearName,
                                datasets: [
                                {
                                    label: `Budget allocated (ksh)`,
                                    backgroundColor: [colors.primary],
                                    data: allocationPerFYearData,
                                }
                                ]
                            },
                            options: {
                                plugins: {
                                legend: { display: false },
                                },
                                scales: {
                                x: {
                                    display: true,
                                    grid: {
                                    display: true,
                                    color: colors.gridBorder,
                                    borderColor: colors.gridBorder,
                                    },
                                    ticks: {
                                    color: colors.bodyColor,
                                    font: {
                                        size: 12
                                    }
                                    }
                                },
                                y: {
                                    grid: {
                                    display: true,
                                    color: colors.gridBorder,
                                    borderColor: colors.gridBorder,
                                    },
                                    ticks: {
                                    color: colors.bodyColor,
                                    font: {
                                        size: 12
                                    }
                                    }
                                }
                                }
                            }
                            });
                    }
                })
            }




            $.ajax({
                type: "GET",
                url: "/api/quick-stats",
                processData: false,
                contentType: false,
                cache: false,
                error: function(data){
                    console.log(data);
                },
                success: function (response) {
                    $('#total_prj').text(response.num_of_projects);
                    $('#total_prj_budget').text('Budget '+formatter.format(response.budget));
                }
            });

            $.ajax({
                type: "GET",
                url: "/api/project/departments",
                processData: false,
                contentType: false,
                cache: false,
                error: function(data){
                    console.log(data);
                },
                success: function (response) {
                    console.log(response);
                    let num = 1;
                    let template = '';
                    for (let i = 0; i < response.length; i++) {
                        let element = response[i];
                        template += `
                            <tr>
                                <td>${num}</td>
                                <td>${element.sector}</td>
                                <td>${element.data.preInvestment}</td>
                                <td>${element.data.planned}</td>
                                <td>${element.data.onGoing}</td>
                                <td>${element.data.completed}</td>
                            </tr>
                        `;
                        num++;
                    }
                    $('#prj-department').html(template);
                }
            });

            // quick start filter
            $('#from').on('change', allProjectsQuery);
            $('#to').on('change', allProjectsQuery);
            $('#subCounty').on('change', allProjectsQuery);
            $('#ward').on('change', allProjectsQuery);
            function allProjectsQuery() {
                let subCountyId = $('.subCounty').find(":selected").val();
                let from = $('#from').find(":selected").val();
                let to = $('#to').find(":selected").val();
                let wardId = $('#ward').find(":selected").val();
                
                let data = new FormData();
                data.append('_token', '{{csrf_token()}}');
                data.append('sub_county_id', subCountyId);
                data.append('ward_id', wardId);
                data.append('from', from);
                data.append('to', to);

                $.ajax({
                    type: "POST",
                    url: "/api/quick-stats/query",
                    processData: false,
                    contentType: false,
                    cache: false,
                    data: data,
                    error: function(data){
                        console.log(data);
                    },
                    success: function (response) {
                        $('#total_prj').text(response.num_of_projects);
                        $('#total_prj_budget').text('Budget '+ formatter.format(response.budget));
                    }
                });
            }

            // status bar filter
            $('#from').on('change', getProjectByStatusQuery);
            $('#to').on('change', getProjectByStatusQuery);
            $('#subCounty').on('change', getProjectByStatusQuery);
            $('#ward').on('change', getProjectByStatusQuery);
            function getProjectByStatusQuery() {
                let subCountyId = $('.subCounty').find(":selected").val();
                let from = $('#from').find(":selected").val();
                let to = $('#to').find(":selected").val();
                let wardId = $('#ward').find(":selected").val();
                
                let data = new FormData();
                data.append('_token', '{{csrf_token()}}');
                data.append('sub_county_id', subCountyId);
                data.append('ward_id', wardId);
                data.append('from', from);
                data.append('to', to);

                $.ajax({
                    type: "POST",
                    url: "/api/project-status/query",
                    processData: false,
                    contentType: false,
                    cache: false,
                    data: data,
                    error: function(data){
                        console.log(data);
                    },
                    success: function (response) {
                        console.log(response);
                        $('#numPreInvestment').text(response.preInvestment);
                        $('#numPlanned').text(response.planned);
                        $('#numOnGoing').text(response.onGoing);
                        $('#numCompleted').text(response.completed);
                    }
                });
            }

            $('#from').on('change', projectPerDepartmentQuery);
            $('#to').on('change', projectPerDepartmentQuery);
            $('#subCounty').on('change', projectPerDepartmentQuery);
            $('#ward').on('change', projectPerDepartmentQuery);
            function projectPerDepartmentQuery() {
                let subCountyId = $('.subCounty').find(":selected").val();
                let from = $('#from').find(":selected").val();
                let to = $('#to').find(":selected").val();
                let wardId = $('#ward').find(":selected").val();
                
                let data = new FormData();
                data.append('_token', '{{csrf_token()}}');
                data.append('sub_county_id', subCountyId);
                data.append('ward_id', wardId);
                data.append('from', from);
                data.append('to', to);

                $.ajax({
                    type: "POST",
                    url: "/api/projects/departments/query",
                    processData: false,
                    contentType: false,
                    cache: false,
                    data: data,
                    error: function(data){
                        console.log(data);
                    },
                    success: function (response) {
                        let num = 1;
                        let template = '';
                        for (let i = 0; i < response.length; i++) {
                            let element = response[i];
                            template += `
                                <tr>
                                    <td>${num}</td>
                                    <td>${element.sector}</td>
                                    <td>${element.data.preInvestment}</td>
                                    <td>${element.data.planned}</td>
                                    <td>${element.data.onGoing}</td>
                                    <td>${element.data.completed}</td>
                                </tr>
                            `;
                            num++;
                        }
                        $('#prj-department').html(template);
                    }
                });
            }
        });


        

     
        </script>
    </body>
</html>
