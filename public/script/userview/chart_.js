new Vue({
  el: "#app",
  data: {
    statusData : [],
    itemData   : [],
    chart      : null
  },
  methods :{
    drowStatusChart(){
     const $url = "/chartData/get/amount/";
     fetch($url)
     .then(res => {
       if(res.ok){
         return res.json();
       }
     })
     .then(json => {
       //チャートの初期化
       if(this.chart) {
          this.chart.destroy();
      }
       //データの整形;
       var outgo = json.outgo;
       var status_0 = outgo[0].sum_amount;
       var status_1 = outgo[1].sum_amount;
       var $data = [status_0, status_1];
       //chartの描写;
       var ctx = document.getElementById("statusChart").getContext("2d");
       var chart = new Chart(ctx,{
         type : "bar",
         data : {
           labels:["Wasted", "Necessary"],
           datasets:[{
             data:$data,
             backgroundColor:[
               'rgba(54, 162, 235, 0.2)',
               'rgba(75, 192, 192, 0.2)'
             ],
             borderColor: [
               'rgba(54, 162, 235, 0.2)',
               'rgba(75, 192, 192, 0.2)'
             ],
             borderWidth: 2
           }]
         },
         options : {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true // Y軸を0から始める
                    }
                }]
            },
            title : {
              display : true,
              text : "Wasted and Necessary",
              fontSize: 18
            },
            legend:{
              display: false
            }
        }
       })
     })
     .catch(e =>{
       console.error("error", e);
     });
   },
     drowItemChart(){
       const $url = "/chartData/get/item/";
       fetch($url)
       .then(res =>{
         if(res.ok){
           return res.json();
         }
       })
       .then(json => {
         //チャートの初期化
         if(this.chart) {
            this.chart.destroy();
        }
        //データの整形
         var outgo = json.outgo;
         var item = [];
         var sum_amount = [];
         outgo.forEach(elementItem => item.push(elementItem.item));
         outgo.forEach(elementSum => sum_amount.push(elementSum.sum_amount));
         var ctx = document.getElementById('myChart').getContext('2d');
         var chart = new Chart(ctx, {
              // The type of chart we want to create
              type: 'doughnut',

              // The data for our dataset
              data: {
                  labels: item,
                  datasets: [{
                      label: 'Item',
                      data: sum_amount
                  }]
              },
              options:{
                title:{
                  display: true,
                  text: "proportion of outgo",
                  fontSize: 18,
                  padding: 15
                },
                legend:{
                  position: "right"
                }
              }
          });
        })
      }
    },
   mounted(){
     this.drowStatusChart();
     this.drowItemChart();
   }
})
