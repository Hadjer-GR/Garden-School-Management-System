


// design doughnut
let label1 = ["المداخيل ","المصاريف"];
let data1 = [60, 20];
let colors1 = [ "#FF3386","#398BD4"];

const mychart1 = document.querySelectorAll("#myChart");

mychart1.forEach((item) => {
  const myChart11 = new Chart(item.getContext("2d"), {
    type: "doughnut",
    data: {
      labels: label1,
      datasets: [
        {
          data: data1,
          backgroundColor: colors1,
          hoverBackgroundColor: colors1,
          borderColor: "#ffff",
          borderWidth: 4,
        },
      ],
    },
    options: {
      title: {
        text: " التقرير الشهري ",
        display: true,
      },
      aspectRatio: 2.1,
    },
  });
});

// line chart 

var ctx=document.getElementById("lineChart");


  const labels = [
    'جانفي',
    'فيفري',
    'مارس',
    'افريل',
    'ماي',
    'جوان',
    'جويلية',
    'اوت',
    'سبتمبر',
    'اكتوبر',
    'نوفمبر',
    'ديسمبر',
  ];

  const data = {
    labels: labels,
    datasets: [{
      label: "المداخيل",
      backgroundColor: 'rgb(255, 99, 132)',
      borderColor: 'rgb(255, 99, 132)',
      data: [220000, 80000,150000,200000,30000],
    },{
        label: "المصاريف",
        backgroundColor: '#2375BD',
      borderColor: '#2375BD',
        data: [22222, 800000,70000,600000],
      }]
  };
 

  const config = {
    type: 'line',
    data: data,
    options: {
      title: {
        text: " التقرير الشهري ",
        display: true,
      },
      aspectRatio: 2.3,
    },
  };

  const myChart = new Chart(
    document.getElementById('lineChart').getContext('2d'),
    config
  );

  /*
  *
  * polar chart
  * 
  */


  const data_polar = {
    labels: [
      'المداخيل',
      'الاشتراكات',
      'اجرة العمال',
      'المقتنيات',
      'المصاريف'
    ],
    datasets: [{
      label: 'My First Dataset',
      data: [11, 16, 7, 3, 14],
      backgroundColor: [
        'rgb(255, 99, 132)',
        'rgb(75, 192, 192)',
        'rgb(255, 205, 86)',
        'rgb(201, 203, 207)',
        'rgb(54, 162, 235)'
      ]
    }]
  };
  const config_polar = {
    type: 'polarArea',
    data: data_polar,
    options: {
      title: {
        text: " التقرير الشهري ",
        display: true,
      },
      aspectRatio: 2.1,
    },
  };
  const chart_polar = new Chart(
    document.getElementById('polarChart').getContext('2d'),
    config_polar
  );