<?= $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>

<div class="col-lg-6">
    <div class="card">
        <div class="card-header border-0">
            <div class="d-flex justify-content-between">
                <h3 class="card-title"> Over Time per Departement</h3>
            </div>
        </div>
        <div class="card-body">

            <div class="position-relative mb-4">
                <canvas id="otPerDepartement" height="200"></canvas>
            </div>

            <!-- <div class="d-flex flex-row">
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
            </div> -->
        </div>
    </div>
</div>

<div class="col-lg-6">
    <div class="card">
        <div class="card-header border-0">
            <div class="d-flex justify-content-between">
                <h3 class="card-title"> Total Over Time per Tahun</h3>
            </div>
        </div>
        <div class="card-body">

            <div class="position-relative mb-4">
                <canvas id="otPerTahun" height="200"></canvas>
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


        var sales = <?= round(implode($sales) / 3600, PHP_ROUND_HALF_UP); ?>;
        var hrga = <?= round(implode($hrga) / 3600, PHP_ROUND_HALF_UP); ?>;
        var purchasing = <?= round(implode($purchasing) / 3600, PHP_ROUND_HALF_UP); ?>;
        var accounting = <?= round(implode($accounting) / 3600, PHP_ROUND_HALF_UP); ?>;
        var total2023 = <?= round(implode($total2023) / 3600, PHP_ROUND_HALF_UP); ?>;
        var total2024 = <?= round(implode($total2024) / 3600, PHP_ROUND_HALF_UP); ?>;


        var $otPerDepartement = $('#otPerDepartement')
        var $otPerTahun = $('#otPerTahun')
        // eslint-disable-next-line no-unused-vars
        var otPerDepartement = new Chart($otPerDepartement, {
            type: 'bar',
            data: {
                labels: ['HRGA', 'Accounting', 'Purchasing', 'Sales'],
                datasets: [{
                    backgroundColor: '#007bff',
                    borderColor: '#007bff',
                    data: [hrga, accounting, purchasing, sales]
                }, ],
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
                            // zeroLineColor: 'transparent'
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

        var otPerTahun = new Chart($otPerTahun, {
            type: 'line',
            data: {
                labels: ['2023', '2024', '2025'],
                datasets: [{
                    backgroundColor: '#28a745',
                    borderColor: '#28a745',
                    data: [total2023, total2024, 0]
                }, ],
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
                            // zeroLineColor: 'transparent'
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