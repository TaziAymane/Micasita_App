document.addEventListener('DOMContentLoaded', function() {
    // Toggle sidebar
    document.getElementById('sidebarCollapse').addEventListener('click', function() {
        document.getElementById('sidebar').classList.toggle('active');
    });

    // Initialize charts
    initCharts();
});

function initCharts() {
    // Traffic Chart
    const trafficCtx = document.getElementById('trafficChart').getContext('2d');
    const trafficChart = new Chart(trafficCtx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            datasets: [{
                label: 'Visitors',
                data: [10000, 12000, 8000, 15000, 20000, 18000, 22000, 19000, 25000, 21000, 23000, 28000],
                backgroundColor: 'rgba(78, 115, 223, 0.05)',
                borderColor: 'rgba(78, 115, 223, 1)',
                pointBackgroundColor: 'rgba(78, 115, 223, 1)',
                pointBorderColor: '#fff',
                pointHoverBackgroundColor: '#fff',
                pointHoverBorderColor: 'rgba(78, 115, 223, 1)',
                borderWidth: 2,
                fill: true
            }]
        },
        options: {
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function(value) {
                            return value.toLocaleString();
                        }
                    }
                }
            }
        }
    });

    // Traffic Pie Chart
    const pieCtx = document.getElementById('trafficPieChart').getContext('2d');
    const pieChart = new Chart(pieCtx, {
        type: 'doughnut',
        data: {
            labels: ['Direct', 'Social', 'Referral'],
            datasets: [{
                data: [55, 30, 15],
                backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
                hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
                hoverBorderColor: 'rgba(234, 236, 244, 1)',
            }],
        },
        options: {
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            },
            cutout: '80%',
        }
    });

    // Update stats every 5 seconds (simulating live data)
    setInterval(updateStats, 5000);
}

// function updateStats() {
//     // Simulate live data updates
//     const stats = [
//         { selector: '.card:nth-child(1) .h5', min: 2400, max: 2600 },
//         { selector: '.card:nth-child(2) .h5', min: 12000, max: 13000 },
//         { selector: '.card:nth-child(3) .h5', min: 1000, max: 1500 },
//         { selector: '.card:nth-child(4) .h5', min: 15, max: 25 }
//     ];

//     stats.forEach(stat => {
//         const element = document.querySelector(stat.selector);
//         if (element) {
//             const current = parseInt(element.textContent.replace(/,/g, ''));
//             const newValue = Math.floor(Math.random() * (stat.max - stat.min + 1)) + stat.min;
//             if (Math.abs(newValue - current) > 50) {
//                 // Animate the change
//                 animateValue(element, current, newValue, 1000);
//             }
//         }
//     });
// }

// function animateValue(element, start, end, duration) {
//     let startTimestamp = null;
//     const step = (timestamp) => {
//         if (!startTimestamp) startTimestamp = timestamp;
//         const progress = Math.min((timestamp - startTimestamp) / duration, 1);
//         const value = Math.floor(progress * (end - start) + start);
//         element.textContent = value.toLocaleString();
//         if (progress < 1) {
//             window.requestAnimationFrame(step);
//         }
//     };
//     window.requestAnimationFrame(step);
// }