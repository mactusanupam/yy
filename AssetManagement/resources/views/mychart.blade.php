@extends('layouts.app')

@section('content')

                  


<script src="chartjs/Chart.js"></script>
 <div class='containerchart'>
     <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default" style="width: 300px  height: 300px">
                 <div class="panel-body">
                    <canvas id="myChart" ></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
var ctx = document.getElementById("myChart").getContext("2d");

var jsndata = <?php echo json_encode($data, JSON_PRETTY_PRINT) ?>;
var prjNames=[];
var timeEst=[];
var timeSpent=[];
for(var i=0;i<jsndata.length;i++){
    timeSpent.push(jsndata[i][2]);
    timeEst.push(jsndata[i][1]);
    prjNames.push(jsndata[i][0]);
}


var myChart = new Chart(ctx, {
    type: 'bar',
  
    data: {
        labels: prjNames,
   
        datasets: [{
            label: 'Estimated Hrs',
                        backgroundColor: "#f56954",
                        fillColor : "rgba(240, 127, 110, 0.3)",
                        strokeColor : "#f56954",
                        pointColor : "#A62121",
                        pointStrokeColor : "#741F1F",
            data:   timeEst
        },
        {
            label: 'Actual Hrs',
                        backgroundColor: "#A62121",
                        fillColor : "rgba(240, 127, 110, 0.3)",
                        strokeColor : "#f56954",
                        pointColor : "#A62121",
                        pointStrokeColor : "#741F1F",
            data:   timeSpent
        }



        ]
    },


});

    
 
</script>



                    

@endsection
