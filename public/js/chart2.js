$(function() {
    "use strict";

    var userId = 1; // Example userId value
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'chart2_fetch_data.php');
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function () {
        if (xhr.status === 200) {
            try {
                var data = JSON.parse(xhr.responseText);
                // console.log(data); // Log received data

                var labels = [];
                var totalSalesData = [];
                var userList = document.getElementById('topUsersList');

                for (var i = 0; i < data.length && i < 4; i++) {
                    var salespersonData = data[i];
                    labels.push(salespersonData.name);
                    totalSalesData.push(salespersonData.totalSales);

                    // Format the sales amount
                    var formattedAmount = Number(salespersonData.totalSales).toLocaleString('en-US', {minimumFractionDigits: 2});

                    // Creating list items for top users with formatted sales amount
                    var listItem = document.createElement('li');
                    listItem.classList.add('list-group-item', 'd-flex', 'bg-transparent', 'justify-content-between', 'align-items-center', 'border-top');

                    var userBadge = document.createElement('span');
                    userBadge.classList.add('badge', 'rounded-pill');
                    // Set background color based on chart color
                    userBadge.style.backgroundColor = getUserChartColor(i); // Define this function to get chart color

                    userBadge.innerText = formattedAmount; // Use the formatted amount

                    listItem.innerHTML = salespersonData.name + ' ';
                    listItem.appendChild(userBadge);

                    userList.appendChild(listItem);
                }

                var ctx = document.getElementById("chart2").getContext('2d');

                var gradientColors = [];
                for (var j = 0; j < totalSalesData.length; j++) {
                    gradientColors.push(getUserChartColor(j));
                }

                var myChart = new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                        labels: labels,
                        datasets: [{
                            backgroundColor: gradientColors,
                            hoverBackgroundColor: gradientColors,
                            data: totalSalesData,
                            borderWidth: 1
                        }]
                    },
                    options: {
                        maintainAspectRatio: false,
                        cutout: 82,
                        plugins: {
                            legend: {
                                display: false,
                            }
                        }
                    }
                });

            } catch (e) {
                console.error("Error parsing JSON or creating chart:", e);
            }
        }
    };
    xhr.send('userId=' + userId);

    // Function to get chart color based on index
    function getUserChartColor(index) {
        var colors = ['#fc4a1a', '#4776e6', '#ee0979', '#42e695']; // Define your chart colors here
        return colors[index % colors.length];
    }
});