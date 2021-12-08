@extends('admin.layout')
@section('data-table')
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <div class="panel panel-default">
                    <div class="text-center py-3 font-semibold text-xl uppercase">ROOM CHART</div>
                    <div class="panel-body">
                        <canvas id="canvas" height="280" width="600"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
    <script>
        var roomName = <?php echo $roomName; ?>;
        var room = <?php echo $room; ?>;
        var barChartData = {
            labels: roomName,
            datasets: [{
                label: 'Room',
                backgroundColor: "#FFA500",
                data: room
            }]
        };

        window.onload = function() {
            var ctx = document.getElementById("canvas").getContext("2d");
            window.myBar = new Chart(ctx, {
                type: 'bar',
                data: barChartData,
                options: {
                    elements: {
                        rectangle: {
                            borderWidth: 2,
                            borderColor: '#c1c1c1',
                            borderSkipped: 'bottom'
                        }
                    },
                    responsive: true,
                    title: {
                        display: true,
                        text: 'Frequency of booking room'
                    }
                }
            });
        };
    </script>
@endsection
