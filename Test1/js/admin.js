let category_options = {
    series: [44, 55, 41, 17],
    labels: ['Pizza', 'Hamburger', 'Chiken', 'Other'],
    chart: {
    type: 'donut',
  },
    
  };

 let category_chart = new ApexCharts(document.querySelector("#category-chart"), category_options);
  category_chart.render();

  let revenue_options = {
    series: [{
      name: "Order Success",
      data: [10, 41, 35, 51, 49, 62, 69, 91, 148]
  },{
    name: "Order Fail",
    data: [3, 12, 13, 22, 15, 21, 26, 11, 42]
    }],
    colors: ['#2ECC71', '#E74C3C'],
    chart: {
    height: 350,
    type: 'line',
  },
  dataLabels: {
    enabled: false
  },
  stroke: {
    curve: 'smooth'
  },


  xaxis: {
    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep'],
  }
  };

  let revenue_chart = new ApexCharts(document.querySelector("#revenue-chart"), revenue_options);
  revenue_chart.render();