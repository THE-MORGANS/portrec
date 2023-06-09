 <!-- Chart.js // documentation: http://www.chartjs.org/docs/latest/ -->
 <script src="{{asset('js/chart.min.js')}}"></script>
 <script>
   Chart.defaults.global.defaultFontFamily = "Sofia Pro";
   Chart.defaults.global.defaultFontColor = '#888';
   Chart.defaults.global.defaultFontSize = '14';

   var ctx = document.getElementById('chart').getContext('2d');

   var chart = new Chart(ctx, {

     type: 'line',
     // The data for our dataset
     data: {
       labels: ["January", "February", "March", "April", "May", "June"],
       // Information about the dataset
       datasets: [{
         label: "Views",
         backgroundColor: 'transparent',
         borderColor: '#1967D2',
         borderWidth: "1",
         data: [196, 132, 215, 362, 210, 252],
         pointRadius: 3,
         pointHoverRadius: 3,
         pointHitRadius: 10,
         pointBackgroundColor: "#1967D2",
         pointHoverBackgroundColor: "#1967D2",
         pointBorderWidth: "2",
       }]
     },

     // Configuration options
     options: {

       layout: {
         padding: 10,
       },

       legend: {
         display: false
       },
       title: {
         display: false
       },

       scales: {
         yAxes: [{
           scaleLabel: {
             display: false
           },
           gridLines: {
             borderDash: [6, 10],
             color: "#d8d8d8",
             lineWidth: 1,
           },
         }],
         xAxes: [{
           scaleLabel: {
             display: false
           },
           gridLines: {
             display: false
           },
         }],
       },

       tooltips: {
         backgroundColor: '#333',
         titleFontSize: 13,
         titleFontColor: '#fff',
         bodyFontColor: '#fff',
         bodyFontSize: 13,
         displayColors: false,
         xPadding: 10,
         yPadding: 10,
         intersect: false
       }
     },
   });
 </script>