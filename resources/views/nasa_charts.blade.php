<!DOCTYPE html>
<html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<body>

<center>
<canvas id="myChart" style="width:100%;max-width:600px"></canvas>
<canvas id="barChart" style="width:100%;max-width:600px"></canvas>

</body>


</html>


<script>
var xValues = ["Fastest Aestroid id( {{ $data['fastest_id'] }} )", "Nearst Aestroid id ( {{ $data['nearst_id'] }} )"];
var yValues = [ {{  $data['fastest_aestroid'] }}, {{ $data['nearest_aestroid'] }} ];
var barColors = [
  "#b91d47",
  "#00aba9",
  "#2b5797",
  "#e8c3b9",
  "#1e7145"
];

new Chart("myChart", {
  type: "doughnut",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    title: {
      display: true,
      text: "Fastest And Nearst Asteroid"
    }
  }
});
</script>




<script>
 
    var xValues ={{ Illuminate\Support\Js::from(array_keys($size)) }};
    var yValues = {{ Illuminate\Support\Js::from(array_values($size)) }};
    var barColors = ["red", "green","blue","orange","brown","voilet","indigo","cyan","DarkBlue","purple","Magenta","pink"];
    
    new Chart("barChart", {
      type: "bar",
      data: {
        labels: xValues,
        datasets: [{
          backgroundColor: barColors,
          data: yValues
        }]
      },
      options: {
        legend: {display: false},
        title: {
          display: true,
          text: "Asteroids And thier Sizes In KMs"
        }
      }
    });
    </script>