<?= $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>

<div class="col-lg-6">
    <div class="card">
        <div class="card-header border-0">
            <div class="d-flex justify-content-between">
                <h3 class="card-title">Grafik Over Time (jam)</h3>
            </div>
        </div>
        <div class="card-body">
            <div class="d-flex">
                <!-- <p class="d-flex flex-column">
                    <span class="text-bold text-lg">$18,230.00</span>
                    <span>Sales Over Time</span>
                </p> -->
                <!-- <p class="ml-auto d-flex flex-column text-right">
                    <span class="text-success">
                        <i class="fas fa-arrow-up"></i> 33.1%
                    </span>
                    <span class="text-muted">Since last month</span>
                </p> -->
            </div>
            <!-- /.d-flex -->

            <div class="position-relative mb-4">
                <canvas id="sales-chart" height="200"></canvas>
            </div>

            <div class="d-flex flex-row">
                <span class="mr-2">
                    <i class="fas fa-square text-primary"></i> HRGA
                </span>

                <span class="mr-2">
                    <i class="fas fa-square text-success"></i> Purch
                </span>

                <span class="mr-2">
                    <i class="fas fa-square text-warning"></i> Acc
                </span>

                <span class="mr-2">
                    <i class="fas fa-square text-danger"></i> Sales
                </span>
            </div>
        </div>
    </div>
</div>


<script>
    /* global Chart:false */

    $(function() {
        'use strict'

        var ticksStyle = {
            fontColor: '#495057',
            fontStyle: 'bold'
        }

        var mode = 'index'
        var intersect = true

        var sales = <?= implode($sales) / 3600; ?>;
        var hrga = <?= implode($hrga) / 3600; ?>;
        var purchasing = <?= implode($purchasing) / 3600; ?>;
        var accounting = <?= implode($accounting) / 3600; ?>;


        var $salesChart = $('#sales-chart')
        // eslint-disable-next-line no-unused-vars
        var salesChart = new Chart($salesChart, {
            type: 'bar',
            data: {
                labels: ['2024'],
                datasets: [{
                        backgroundColor: '#007bff',
                        borderColor: '#007bff',
                        data: [hrga]
                    },
                    {
                        backgroundColor: '#28a745',
                        borderColor: '#28a745',
                        data: [purchasing]
                    },
                    {
                        backgroundColor: '#ffc107',
                        borderColor: '#ffc107',
                        data: [accounting]
                    },
                    {
                        backgroundColor: '#dc3545',
                        borderColor: '#dc3545',
                        data: [sales]
                    }
                ]
            },
            options: {
                maintainAspectRatio: false,
                tooltips: {
                    mode: mode,
                    intersect: intersect
                },
                hover: {
                    mode: mode,
                    intersect: intersect
                },
                legend: {
                    display: false
                },
                scales: {
                    yAxes: [{
                        // display: false,
                        gridLines: {
                            display: true,
                            lineWidth: '4px',
                            color: 'rgba(0, 0, 0, .2)',
                            zeroLineColor: 'transparent'
                        },
                        ticks: $.extend({
                            beginAtZero: true,

                            // Include a dollar sign in the ticks
                            callback: function(value) {
                                if (value >= 1000) {
                                    value /= 1000
                                    value += 'k'
                                }

                                return value
                            }
                        }, ticksStyle)
                    }],
                    xAxes: [{
                        display: true,
                        gridLines: {
                            display: true
                        },
                        ticks: ticksStyle
                    }]
                }
            }
        })
    })

    // lgtm [js/unused-local-variable]
</script>
<?= $this->endSection('content'); ?>