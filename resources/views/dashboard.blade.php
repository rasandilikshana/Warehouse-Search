@extends('layouts.app')

{{-- @section('title', 'Material Item Section') --}}

@section('contents')
<style>
    /* Define a class for a bordered table */
    .bordered-table {
        border-collapse: collapse;
        width: 100%;
    }

    /* Apply borders to table cells */
    .bordered-table th, .bordered-table td {
        border: 1px solid #000; /* Adjust the color and border style as needed */
        padding: 8px;
        text-align: left; /* Adjust text alignment as needed */
    }
</style>

<div class="container-fluid">
    <div class="row">
        <!-- Product Count Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Product Count</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $productCount }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-truck fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Service Count Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Service Count</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $serviceCount }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-building fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Item Process Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Item Process Count</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $itemprocessCount }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-cogs fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Users</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $userCount }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center text-center">
        <!-- Pie Chart 01-->
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Material Item Chart</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="pb-2">
                        <canvas id="chart1"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pie Chart 01-->
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Service Item Chart</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="  pb-2">
                        <canvas id="chart2"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <!-- Area Chart -->
        <div class="col-xl col-lg">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Item Process itemCat4Code</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="">
                        <canvas id="chart3"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl col-lg">
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Category List</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="categoryTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    // Get the data from the PHP variables for chart 1
    var consumableCount = {{ $consumable_count }};
    var recurringFixedCount = {{$recurringfixed_count}};
    var fixedCount = {{ $fixed_count }};

    // Create a data array for chart 1
    var data1 = {
        labels: ['Consumable','Recurring Fixed Asset','Fixed Asset'],
        datasets: [{
            data: [consumableCount,recurringFixedCount,fixedCount],
            backgroundColor: ['#36b9cc','#4e73df','#1cc88a'] // Color for each section
        }]
    };

    // Get the canvas element for chart 1
    var ctx1 = document.getElementById('chart1').getContext('2d');

    // Create chart 1
    var pieChart1 = new Chart(ctx1, {
        type: 'pie',
        data: data1,
        options: {
            plugins: {
                title: {
                    display: false,
                    text: 'Material Item Chart',
                    padding: {
                        top: 10,
                        bottom: 30
                    }
                }
            }
        }
    });

    // Get the data from the PHP variables for chart 2
    var serviceItemCount = {{ $serviceitem_count }};
    var glAssignItemCount = {{$glassignitem_count}};

    // Create a data array for chart 2
    var data2 = {
        labels: ['Service Item','Service type direct GL assign item'],
        datasets: [{
            data: [serviceItemCount ,glAssignItemCount],
            backgroundColor: ['#b3cc36','#c736cc'] // Color for each section
        }]
    };

    // Get the canvas element for chart 2
    var ctx2 = document.getElementById('chart2').getContext('2d');

    // Create chart 2
    var pieChart2 = new Chart(ctx2, {
        type: 'pie',
        data: data2,
        options: {
            plugins: {
                title: {
                    display: false,
                    text: 'Service Item Chart',
                    padding: {
                        top: 10,
                        bottom: 30
                    }
                }
            }
        }
    });

    // Get the data from the PHP variables for chart 3
    var categoryCounts = @json($categoryCounts);

    // Extract category names and counts from the JSON data
    var categories = Object.keys(categoryCounts);
    var counts = Object.values(categoryCounts);

    // Create a data array for chart 3
    var data3 = {
        labels: categories,
        datasets: [{
            data: counts,
            backgroundColor: getRandomColors(categories.length),
            label: 'Count',
        }]
    };

    // Get the canvas element for chart 3
    var ctx3 = document.getElementById('chart3').getContext('2d');

    // Create chart 3
    var pieChart3 = new Chart(ctx3, {
        type: 'line',
        data: data3,
        options: {
            plugins: {
                title: {
                    display: false,
                    text: 'Item Process itemCat4Code',
                    padding: {
                        top: 10,
                        bottom: 30
                    }
                },
                datalabels: {
                    display: true,
                    align: 'end', // Align the label in the center of the data point
                    anchor: 'end', // Anchor the label in the center of the data point
                    formatter: (value) => {
                        return value; // Display the data value as the label
                    }
                }
            }
        }
    });

    // Function to generate random colors for the chart
    function getRandomColors(count) {
        var colors = [];
        for (var i = 0; i < count; i++) {
            var randomColor = '#' + Math.floor(Math.random()*16777215).toString(16);
            colors.push(randomColor);
        }
        return colors;
    };

    // JavaScript code to populate the HTML table
// ...

// Get the data from the PHP variables for the table
var categoryCounts = @json($categoryCounts);

// Get the table body element
var tableBody = document.querySelector('#categoryTable tbody');

// Create an array of category and count pairs
var dataPairs = [];
for (var category in categoryCounts) {
    if (categoryCounts.hasOwnProperty(category)) {
        var count = categoryCounts[category];
        dataPairs.push({ category: category, count: count });
    }
}

// Loop through the data pairs and populate the table
for (var i = 0; i < dataPairs.length; i += 4) {
    // Create a new row
    var row = tableBody.insertRow();

    // Populate the row with four sets of Category and Count columns
    for (var j = 0; j < 4; j++) {
        if (i + j < dataPairs.length) {
            var cell1 = row.insertCell(j * 2); // Category
            var cell2 = row.insertCell(j * 2 + 1); // Count

            cell1.textContent = dataPairs[i + j].category;
            cell2.textContent = dataPairs[i + j].count;
        }
    }
}

</script>
@endsection
