<!-- Page Container START -->

<div class="page-container">

 <!-- Content Wrapper START -->

 <div class="main-content">

<div class="card">

<div class="card-body">

    <h4>Revenue/Profit Analysis</h4> 

    

<div class="m-t-25">
   <canvas id="barChart"></canvas>
</div>

</div>

</div>

</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.2.1/chart.min.js" integrity="sha512-tOcHADT+YGCQqH7YO99uJdko6L8Qk5oudLN6sCeI4BQnpENq6riR6x9Im+SGzhXpgooKBRkPsget4EOoH5jNCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">   
   // Bar chart
var ctxL = document.getElementById("barChart").getContext('2d');
var myLineChart = new Chart(ctxL, {
  type: 'bar',
  data: {
    labels: <?php echo json_encode($year);?>,
    datasets: [
      {
        label: "Revenue",
        data: <?php echo json_encode($revanu,JSON_NUMERIC_CHECK);?>,
        backgroundColor: '#4285F4',
        borderWidth: 0,
      },
        {
        label: "Profit",
        data: <?php echo json_encode($subservicepay,JSON_NUMERIC_CHECK);?>,
        backgroundColor: '#28a745',
        borderWidth: 0,
      },
    ]
  },
  options: {
    responsive: true,
    legend: {
      display: true,
    },
    tooltips: {
      intersect: false,
      mode: 'index'
    },
    scales: {
      xAxes: [{
        stacked: true,
        gridLines: {
          display: false,
        },

        ticks: {
          fontColor: 'rgba(0,0,0, 0.5)',
        }
      }],
      yAxes: [{
        stacked: true,
        gridLines: {
          borderDash: [2],
          drawBorder: false,
          zeroLineColor: "rgba(0,0,0,0)",
          zeroLineBorderDash: [2],
          zeroLineBorderDashOffset: [2]
        },
        ticks: {
          fontColor: 'rgba(0,0,0, 0.5)'
        }
      }]
    }
  }
});
</script>