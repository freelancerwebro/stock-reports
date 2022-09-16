<?php

$dataPoints = array(
    array("x" => 1483209000000, "y" => array( 104.4, 111.89, 99.11, 109.18)),
    array("x" => 1485887400000, "y" => array( 110.58, 120.92, 95.7, 101.48)),
    array("x" => 1488306600000, "y" => array( 103.79, 110, 95.17, 108.93)),
    array("x" => 1490985000000, "y" => array( 104.74, 147, 102.31, 144.35)),
    array("x" => 1493577000000, "y" => array( 144.99, 168.5, 142.11, 144.56)),
    array("x" => 1496255400000, "y" => array( 145.05, 169.93, 138.58, 162.51)),
    array("x" => 1498847400000, "y" => array( 162.13, 174.56, 152.91, 169.44)),
    array("x" => 1501525800000, "y" => array( 169.95, 191.2, 162.71, 178.77)),
    array("x" => 1504204200000, "y" => array( 180.8, 207.89, 177, 206.81)),
    array("x" => 1506796200000, "y" => array( 209.35, 218.67, 191.23, 200.71)),
    array("x" => 1509474600000, "y" => array( 207.2, 218.67, 200.37, 216.14)),
    array("x" => 1512066600000, "y" => array( 199.31, 200.3, 180.58, 193.5))
)

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Stock historical data</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
</head>
<body>
    <div class="container mt-4">
{{--        @if(session('status'))--}}
{{--            <div class="alert alert-success">--}}
{{--                Form has been sent!--}}
{{--            </div>--}}
{{--        @endif--}}

        <div class="card">
            <div class="card-header text-left font-weight-bold">
                <h2>Stock historical data</h2>
            </div>
            <div class="card-body">
                <form name="employee" id="employee" method="post" action="{{url('submit')}}" autocomplete="off">
                    {{ csrf_field() }}

                    <div class="row">
                        <div class="col">
                            <label for="symbol">Country symbol</label>
                            <input
                                type="text"
                                id="symbol"
                                name="symbol"
                                class="@error('symbol') is-invalid @enderror form-control"
                                onkeydown="return /[a-z]/i.test(event.key)"
                                maxlength="5"
                                style="text-transform:uppercase"
                            />

                            @error('symbol')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col">
                            <label for="start_date">Start date</label>
                            <input
                                type="text"
                                id="start_date"
                                name="start_date"
                                class="@error('start_date') is-invalid @enderror form-control"
                                required
                            />
                            @error('start_date')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col">
                            <label for="end_date">End date</label>
                            <input
                                type="text"
                                id="end_date"
                                name="end_date"
                                class="@error('end_date') is-invalid @enderror form-control"
                                required
                            />
                            @error('end_date')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col">
                            <label for="email">Email</label>
                            <input
                                type="email"
                                id="email"
                                name="email"
                                class="@error('email') is-invalid @enderror form-control"
                                required
                            />
                            @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mt-4 align-items-end clearfix">
                        <div class="col text-end">
                            <button type="submit" class="btn btn-primary pull-right">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        @if(session('prices'))
            <div class="card mt-4">
                <div class="card-header text-left font-weight-bold">
                    <h5>Search results:</h5>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Date</th>
                            <th scope="col">Open</th>
                            <th scope="col">High</th>
                            <th scope="col">Low</th>
                            <th scope="col">Close</th>
                            <th scope="col">Volume</th>
                        </tr>
                        </thead>
                        <tbody>

                            @foreach (session('prices') as $row => $value)
                                <tr>
                                    <th scope="row">@php echo ($row); @endphp</th>
                                    <td>@php echo date('Y-m-d', $value['date']); @endphp</td>
                                    <td>@php echo $value['open']; @endphp</td>
                                    <td>@php echo $value['high']; @endphp</td>
                                    <td>@php echo $value['low']; @endphp</td>
                                    <td>@php echo $value['close']; @endphp</td>
                                    <td>@php echo $value['volume']; @endphp</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>


        @endif
        @if(empty(session('prices')) && is_array(session('prices')))
            <div class="alert alert-danger mt-4">
                No results found!
            </div>
        @endif

        <div id="chartContainer" style="height: 370px; width: 100%;" class="mt-4"></div>
    </div>

    <script type="text/javascript">
        $( function() {
            var dateFormat = "yy-mm-dd";

            // $( "#start_date" ).datepicker({
            //     dateFormat: dateFormat
            // })
            // $( "#end_date" ).datepicker({
            //     dateFormat: dateFormat
            // })

            var from = $( "#start_date" ).datepicker({
                dateFormat: dateFormat,
                maxDate: new Date()
            }).on( "change", function() {
                to.datepicker( "option", "minDate", getDate( this ) );
            });

            var to = $( "#end_date" ).datepicker({
                dateFormat: dateFormat,
                maxDate: new Date()
            }).on( "change", function() {
                from.datepicker( "option", "maxDate", getDate( this ) );
            });

            function getDate( element ) {
                var date;
                try {
                    date = $.datepicker.parseDate( dateFormat, element.value );
                } catch( error ) {
                    date = null;
                }

                return date;
            }

            var chart = new CanvasJS.Chart("chartContainer", {
                theme: "light2",
                title: {
                    text: "OHLC Chart"
                },
                axisX: {
                    valueFormatString: "DDMMMYY",
                    intervalType: "year",
                    interval: 1
                },
                axisY: {
                    title: "Stock Price (in USD)",
                    prefix: "$"
                },
                data: [{
                    type: "ohlc",
                    xValueType: "dateTime",
                    yValueFormatString: "$#,##0.0",
                    xValueFormatString: "MMM",
                    dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
                }]
            });
            chart.render();
        } );
    </script>

    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>
