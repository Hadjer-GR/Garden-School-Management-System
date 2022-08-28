

 

 
 const income =document.getElementById("income");
   console.log(income);



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
      data: [income, 16, 7, 3, 14],
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