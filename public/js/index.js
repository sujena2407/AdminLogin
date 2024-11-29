$(function() {
    "use strict";

  var xhr = new XMLHttpRequest();
xhr.open('GET', 'chart1_fetch_data.php');
xhr.onload = function () {
    if (xhr.status === 200) {
        var data = JSON.parse(xhr.responseText);

        var labels = [];
        var totalSalesRevenueData = [];
        var totalCollectionData = [];

        for (var i = 0; i < data.length; i++) {
            var monthData = data[i];
            labels.push(monthData.month);
            totalSalesRevenueData.push(monthData.totalSalesRevenue);
            totalCollectionData.push(monthData.totalCollection);
        }

        var ctx = document.getElementById("chart1").getContext('2d');

        var gradientStroke1 = ctx.createLinearGradient(0, 0, 0, 300);
        gradientStroke1.addColorStop(0, '#6078ea');
        gradientStroke1.addColorStop(1, '#17c5ea');

        var gradientStroke2 = ctx.createLinearGradient(0, 0, 0, 300);
        gradientStroke2.addColorStop(0, '#ff8359');
        gradientStroke2.addColorStop(1, '#ffdf40');

        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],

                datasets: [{
                    label: 'Total Sales Revenue',
                    data: totalSalesRevenueData,
                    borderColor: gradientStroke1,
                    backgroundColor: gradientStroke1,
                    hoverBackgroundColor: gradientStroke1,
                    pointRadius: 0,
                    fill: false,
                    borderRadius: 20,
                    borderWidth: 0
                }, {
                    label: 'Total Collection',
                    data: totalCollectionData,
                    borderColor: gradientStroke2,
                    backgroundColor: gradientStroke2,
                    hoverBackgroundColor: gradientStroke2,
                    pointRadius: 0,
                    fill: false,
                    borderRadius: 20,
                    borderWidth: 0
                }]
            },

            options: {
                maintainAspectRatio: false,
                barPercentage: 0.5,
                categoryPercentage: 0.8,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    }
};
xhr.send();
   });
