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
                                required
                                value="{{ old('symbol') }}"
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
                                value="{{ old('start_date') }}"
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
                                value="{{ old('end_date') }}"
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
                                value="{{ old('email') }}"
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

        @if(!empty(session('error')))
            <div class="alert alert-danger mt-4">
                {{ session('error') }}
            </div>
        @endif

        @vite(['resources/js/app.js'])

        @if (!empty($jobId) && empty($errors->any()))
            <div class="mt-4" id="loading">
                <div class="text-left font-weight-bold">
                    <h5>⏳ Waiting for live data...</h5>
                </div>
            </div>

            <div class="card mt-4" id="stocks-table" style="display: none;">
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
                        <tbody></tbody>
                    </table>
                </div>
            </div>

            <script>
                window.jobId = '{{ $jobId }}';
                console.log('✅ window.jobId is set:', window.jobId);
            </script>

            <div id="chartContainer" style="height: 370px; width: 100%;" class="mt-4"></div>
        @endif
    </div>

    <script type="text/javascript">
        $( function() {
            var dateFormat = "yy-mm-dd";

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
        } );
    </script>

    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>

