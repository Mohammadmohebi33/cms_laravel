@extends('components.admin-master')

@section('content')




<h1>Charts:</h1>



<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">



    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {


        var data = google.visualization.arrayToDataTable([




            ["Element", "Density", { role: "style" } ],


            ["users", {{$users}}, "#b87333"],
            ["comments", {{$comments}}, "blue"],
            ["posts", {{$posts}}, "gold"],
            ["category", {{$category}}, "color: red"]



        ]);

        var view = new google.visualization.DataView(data);
        view.setColumns([0, 1,
            { calc: "stringify",
                sourceColumn: 1,
                type: "string",
                role: "annotation" },
            2]);

        var options = {
            title: "",
            width: 1500,
            height: 800,
            bar: {groupWidth: "95%"},
            legend: { position: "none" },
        };
        var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
        chart.draw(view, options);
    }
</script>
<div    class="row">
    <div    class="col-sm-9">
<div id="columnchart_values" style="width: 900px; height: 300px;"></div>

</div>
</div>
@endsection
