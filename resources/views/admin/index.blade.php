@extends('../../layouts/app-admin')

@section('title', 'Dashboard - iUMovies')

@section('content_header')
    <h3 class="py-0 text-gray-200 mb-4">Dashboard</h3>
@stop

@section('content')
    
    <!-- Cards -->
    <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">

        <!-- Card -->
        <div class="flex items-center p-4 rounded-lg shadow-md bg-[#1a1c23]">
            <div class="p-3 mr-4 rounded-full text-orange-100 bg-orange-500">
                <i class="fa-solid fa-eye flex justify-center items-center w-5 h-5"></i>
            </div>
            <div>
                <p class="mb-2 text-sm font-medium text-gray-400" >
                    Total de visitas
                </p>
                <p class="text-lg font-semibold text-gray-200">
                    {{ $numberVisits }}
                </p>
            </div>
        </div>

        <!-- Card -->
        <div class="flex items-center p-4 rounded-lg shadow-md bg-[#1a1c23]">
            <div class="p-3 mr-4 rounded-full text-green-100 bg-green-500">
                <i class="fa-solid fa-film flex justify-center items-center w-5 h-5"></i>
            </div>
            <div>
                <p class="mb-2 text-sm font-medium text-gray-400" >
                    Total de películas
                </p>
                <p class="text-lg font-semibold text-gray-200">
                    {{ $numberMovies }}
                </p>
            </div>
        </div>

        <!-- Card -->
        <div class="flex items-center p-4 rounded-lg shadow-md bg-[#1a1c23]">
            <div class="p-3 mr-4 rounded-full text-blue-100 bg-blue-500">
                <i class="fa-solid fa-list flex justify-center items-center w-5 h-5"></i>
            </div>
            <div>
                <p class="mb-2 text-sm font-medium text-gray-400" >
                    Total de categorías
                </p>
                <p class="text-lg font-semibold text-gray-200">
                    {{ $numberCategories }}
                </p>
            </div>
        </div>

        <!-- Card -->
        <div class="flex items-center p-4 rounded-lg shadow-md bg-[#1a1c23]">
            <div class="p-3 mr-4 rounded-full text-teal-100 bg-teal-500">
                <i class="fa-solid fa-users flex justify-center items-center w-5 h-5"></i>
            </div>
            <div>
                <p class="mb-2 text-sm font-medium text-gray-400" >
                    Total de proveedores
                </p>
                <p class="text-lg font-semibold text-gray-200">
                    {{ $numberSuppliers }}
                </p>
            </div>
        </div>

    </div>

    <!-- Charts -->
    <div class="grid gap-6 mb-8 md:grid-cols-4">
        
        <!-- Column chart 1 -->
        <div class="min-w-0 p-4 bg-[#1a1c23] rounded-lg shadow-xs col-span-3">
            <h4 class="mb-4 font-semibold text-gray-200">Películas por categoría</h4>

            <div id="categoriesChart"></div>
        </div>
        
        <!-- Donut chart 2 -->
        <div class="min-w-0 p-4 bg-[#1a1c23] rounded-lg shadow-xs col-span-1">
            <h4 class="mb-4 font-semibold text-gray-200">Películas por proveedor</h4>

            <div id="suppliersChart"></div>
        </div>

        <!-- Column chart 3 -->
        <div class="min-w-0 p-4 bg-[#1a1c23] rounded-lg shadow-xs col-span-2">
            <h4 class="mb-4 font-semibold text-gray-200">Películas por mes</h4>

            <div id="moviesByMonthsChart"></div>
        </div>
        
        <!-- Column chart 4 -->
        <div class="min-w-0 p-4 bg-[#1a1c23] rounded-lg shadow-xs col-span-2">
            <h4 class="mb-4 font-semibold text-gray-200">Visitas por mes</h4>

            <div id="visitsByMonthsChart"></div>
        </div>

 
    </div>

@stop

@section('css')
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    
    <script>

        // Chart 1
        const dataForCategories = {!! json_encode($dataForCategoriesChart) !!};

        var categoryChartOptions = {
            series: dataForCategories.series,
            chart: {
                type: 'bar',
                height: 350,
                foreColor: '#9CA3AF'
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '55%',
                    endingShape: 'rounded',
                    distributed: true
                },
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                show: true,
                width: 2,
                colors: ['transparent']
            },
            xaxis: {
                categories: dataForCategories.categories,
                labels: {
                    style: {
                        colors: '#FFFFFF'
                    }
                }
            },
            yaxis: {
                title: {
                    text: 'Número de películas',
                },
                labels: {
                    style: {
                        colors: '#FFFFFF'
                    }
                }
            },
            fill: {
                opacity: 1
            },
            tooltip: {
                y: {
                    formatter: function (val) {
                    return val
                    }
                }
            }
        };

        const categoriesChart = new ApexCharts(document.querySelector("#categoriesChart"), categoryChartOptions);

        categoriesChart.render();


        // Chart 2
        const dataForSuppliers = {!! json_encode($dataForSuppliersChart) !!};

        const supplierChartOptions = {
            series: dataForSuppliers.series,
            labels: dataForSuppliers.categories,
            chart: {
                type: 'donut',
                width: '100%',
                height: 350,
                foreColor: '#9CA3AF'
            },
            legend: {
              position: 'bottom'
            }
        };

        const suppliersChart = new ApexCharts(document.querySelector("#suppliersChart"), supplierChartOptions);

        suppliersChart.render();


        // Chart 3
        const dataForMoviesByMonths = {!! json_encode($dataForMoviesByMonthsChart) !!};

        const movieByMonthChartOptions = {
            series: dataForMoviesByMonths.series,
            chart: {
                type: 'bar',
                height: 350
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '55%',
                    endingShape: 'rounded'
                },
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                show: true,
                width: 2,
                colors: ['transparent']
            },
            xaxis: {
                categories: dataForMoviesByMonths.categories,
                labels: {
                    style: {
                        colors: '#FFFFFF'
                    }
                }
            },
            yaxis: {
                title: {
                    text: 'Número de películas',
                },
                labels: {
                    style: {
                        colors: '#FFFFFF'
                    }
                }
            },
            fill: {
                opacity: 1
            },
            tooltip: {
                y: {
                    formatter: function (val) {
                    return val
                    }
                }
            }
        };

        const moviesByMonthsChart = new ApexCharts(document.querySelector("#moviesByMonthsChart"), movieByMonthChartOptions);

        moviesByMonthsChart.render();


        // Chart 4
        const dataForVisitsByMonths = {!! json_encode($dataForVisitsByMonthsChart) !!};

        const visitByMonthChartOptions = {
            series: dataForVisitsByMonths.series,
            chart: {
                type: 'bar',
                height: 350
            },
            plotOptions: {
                bar: {
                    //borderRadius: 4,
                    horizontal: true,
                },
            },
            dataLabels: {
                enabled: false
            },
            xaxis: {
                categories: dataForVisitsByMonths.categories,
                labels: {
                    style: {
                        colors: '#FFFFFF'
                    }
                }
            },
            yaxis: {
                title: {
                    text: 'Meses',
                },
                labels: {
                    style: {
                        colors: '#FFFFFF'
                    }
                }
            },
            fill: {
                opacity: 1
            },
            tooltip: {
                y: {
                    formatter: function (val) {
                    return val
                    }
                }
            }
        };

        const visitsByMonthsChart = new ApexCharts(document.querySelector("#visitsByMonthsChart"), visitByMonthChartOptions);

        visitsByMonthsChart.render();

    </script>
    
@stop