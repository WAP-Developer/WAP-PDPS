    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <link href="<?= base_url('assets/admin'); ?>/plugins/apex/apexcharts.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url('assets/admin'); ?>/assets/css/dashboard/dash_1.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->

    <div class="preloader">
        <div class="loading">
            <img src="<?= base_url('assets') ?>/img/infinity.gif" width="80">
            <p>Harap Tunggu</p>
        </div>
    </div>
    <div class="layout-px-spacing">

        <div class="row layout-top-spacing">

            <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-chart-one">
                    <div class="widget-heading">
                        <h5 class="">Pembuatan Surat</h5>
                        <ul class="tabs tab-pills">
                            <li><a href="javascript:void(0);" id="tb_1" class="tabmenu">Statistik Bulanan</a></li>
                        </ul>
                    </div>

                    <div class="widget-content">
                        <div class="tabs tab-content">
                            <div id="content_1" class="tabcontent">
                                <div id="revenueMonthly"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-chart-two">
                    <div class="widget-heading">
                        <h5 class="">Jenis Surat</h5>
                    </div>
                    <div class="widget-content">
                        <div id="chart-2" class=""></div>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <div class="footer-wrapper">
        <div class="footer-section f-section-1">
            <p class="">© 2020 Seluruh Hak Cipta, Code of The Core Developer.</p>
        </div>
    </div>
    <!--  END CONTENT AREA  -->

    <?php
    $db = \Config\Database::connect();

    $perusahaan = $db->table('domisili_perusahaan');
    $usaha = $db->table('domisili_usaha');
    $warga = $db->table('domisili_warga');
    $kematian = $db->table('kematian');
    $pindah = $db->table('pindah');
    $sktm = $db->table('sktm');

    $total = $perusahaan->countAllResults() + $usaha->countAllResults() + $warga->countAllResults() + $kematian->countAllResults() + $pindah->countAllResults() + $sktm->countAllResults();

    function hitungBulanan($bulan, $tahun)
    {
        $db = \Config\Database::connect();
        $query = $db->query("select  (select count(id) from domisili_perusahaan WHERE MONTH(tanggal_surat) = $bulan AND YEAR(tanggal_surat) = $tahun) 
        + (select count(id) from domisili_usaha WHERE MONTH(tanggal_surat) = $bulan AND YEAR(tanggal_surat) = $tahun)
		+ (select count(id) from domisili_warga WHERE MONTH(tanggal_surat) = $bulan AND YEAR(tanggal_surat) = $tahun)
		+ (select count(id) from kematian WHERE MONTH(tanggal_surat) = $bulan AND YEAR(tanggal_surat) = $tahun)
		+ (select count(id) from pindah WHERE MONTH(tanggal_surat) = $bulan AND YEAR(tanggal_surat) = $tahun)
        + (select count(id) from sktm WHERE MONTH(tanggal_surat) = $bulan AND YEAR(tanggal_surat) = $tahun) AS jumlah");

        $hasil = $query->getRowArray();

        return $hasil['jumlah'];
    }

    ?>

    <script src="<?= base_url('assets/admin'); ?>/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="<?= base_url('assets/admin'); ?>/plugins/apex/apexcharts.min.js"></script>
    <script>
        $(document).ready(function() {
            setTimeout(function() {
                $('.preloader').fadeOut();
            }, 800);
        });

        try {

            /*
                =================================
                    Revenue Monthly | Options
                =================================
            */
            var options1 = {
                chart: {
                    fontFamily: 'Nunito, sans-serif',
                    height: 446,
                    type: 'area',
                    zoom: {
                        enabled: false
                    },
                    dropShadow: {
                        enabled: true,
                        opacity: 0.3,
                        blur: 5,
                        left: -7,
                        top: 22
                    },
                    toolbar: {
                        show: false
                    },
                    events: {
                        mounted: function(ctx, config) {
                            const highest1 = ctx.getHighestValueInSeries(0);
                            const highest2 = ctx.getHighestValueInSeries(1);

                            ctx.addPointAnnotation({
                                x: new Date(ctx.w.globals.seriesX[0][ctx.w.globals.series[0].indexOf(highest1)]).getTime(),
                                y: highest1,
                                label: {
                                    style: {
                                        cssClass: 'd-none'
                                    }
                                },
                                customSVG: {
                                    SVG: '<svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="#1b55e2" stroke="#fff" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle"><circle cx="12" cy="12" r="10"></circle></svg>',
                                    cssClass: undefined,
                                    offsetX: -8,
                                    offsetY: 5
                                }
                            })

                            ctx.addPointAnnotation({
                                x: new Date(ctx.w.globals.seriesX[1][ctx.w.globals.series[1].indexOf(highest2)]).getTime(),
                                y: highest2,
                                label: {
                                    style: {
                                        cssClass: 'd-none'
                                    }
                                },
                                customSVG: {
                                    SVG: '<svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="#e7515a" stroke="#fff" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle"><circle cx="12" cy="12" r="10"></circle></svg>',
                                    cssClass: undefined,
                                    offsetX: -8,
                                    offsetY: 5
                                }
                            })
                        },
                    }
                },
                colors: ['#1b55e2'],
                dataLabels: {
                    enabled: false
                },
                markers: {
                    discrete: [{
                        seriesIndex: 0,
                        dataPointIndex: 7,
                        fillColor: '#000',
                        strokeColor: '#000',
                        size: 5
                    }, {
                        seriesIndex: 2,
                        dataPointIndex: 11,
                        fillColor: '#000',
                        strokeColor: '#000',
                        size: 4
                    }]
                },
                subtitle: {
                    text: 'Total Surat Dibuat',
                    align: 'left',
                    margin: 0,
                    offsetX: -10,
                    offsetY: 35,
                    floating: false,
                    style: {
                        fontSize: '14px',
                        color: '#888ea8'
                    }
                },
                title: {
                    text: <?= $total ?>,
                    align: 'left',
                    margin: 0,
                    offsetX: -10,
                    offsetY: 0,
                    floating: false,
                    style: {
                        fontSize: '25px',
                        color: '#0e1726'
                    },
                },
                stroke: {
                    show: true,
                    curve: 'smooth',
                    width: 2,
                    lineCap: 'square'
                },
                series: [{
                    name: 'Surat',
                    data: [<?= hitungBulanan(1, 2020) ?>, <?= hitungBulanan(2, 2020) ?>, <?= hitungBulanan(3, 2020) ?>, <?= hitungBulanan(4, 2020) ?>, <?= hitungBulanan(5, 2020) ?>, <?= hitungBulanan(6, 2020) ?>, <?= hitungBulanan(7, 2020) ?>, <?= hitungBulanan(8, 2020) ?>, <?= hitungBulanan(9, 2020) ?>, <?= hitungBulanan(10, 2020) ?>, <?= hitungBulanan(11, 2020) ?>, <?= hitungBulanan(12, 2020) ?>]
                }],
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
                xaxis: {
                    axisBorder: {
                        show: false
                    },
                    axisTicks: {
                        show: false
                    },
                    crosshairs: {
                        show: true
                    },
                    labels: {
                        offsetX: 0,
                        offsetY: 5,
                        style: {
                            fontSize: '12px',
                            fontFamily: 'Nunito, sans-serif',
                            cssClass: 'apexcharts-xaxis-title',
                        },
                    }
                },
                yaxis: {
                    labels: {
                        formatter: function(value, index) {
                            return value
                        },
                        offsetX: -22,
                        offsetY: 0,
                        style: {
                            fontSize: '12px',
                            fontFamily: 'Nunito, sans-serif',
                            cssClass: 'apexcharts-yaxis-title',
                        },
                    }
                },
                grid: {
                    borderColor: '#e0e6ed',
                    strokeDashArray: 5,
                    xaxis: {
                        lines: {
                            show: true
                        }
                    },
                    yaxis: {
                        lines: {
                            show: false,
                        }
                    },
                    padding: {
                        top: 0,
                        right: 0,
                        bottom: 0,
                        left: -10
                    },
                },
                legend: {
                    position: 'top',
                    horizontalAlign: 'right',
                    offsetY: -50,
                    fontSize: '16px',
                    fontFamily: 'Nunito, sans-serif',
                    markers: {
                        width: 10,
                        height: 10,
                        strokeWidth: 0,
                        strokeColor: '#fff',
                        fillColors: undefined,
                        radius: 12,
                        onClick: undefined,
                        offsetX: 0,
                        offsetY: 0
                    },
                    itemMargin: {
                        horizontal: 0,
                        vertical: 20
                    }
                },
                tooltip: {
                    theme: 'dark',
                    marker: {
                        show: true,
                    },
                    x: {
                        show: false,
                    }
                },
                fill: {
                    type: "gradient",
                    gradient: {
                        type: "vertical",
                        shadeIntensity: 1,
                        inverseColors: !1,
                        opacityFrom: .28,
                        opacityTo: .05,
                        stops: [45, 100]
                    }
                },
                responsive: [{
                    breakpoint: 575,
                    options: {
                        legend: {
                            offsetY: -30,
                        },
                    },
                }]
            }

            /*
                ==================================
                    Sales By Category | Options
                ==================================
            */
            var options = {
                chart: {
                    type: 'donut',
                    width: 460
                },
                colors: ['#005cc4', '#00a1c4', '#00c486', '#ffae00', '#dc00a6', '#b33cff'],
                dataLabels: {
                    enabled: false
                },
                legend: {
                    position: 'bottom',
                    horizontalAlign: 'center',
                    fontSize: '14px',
                    markers: {
                        width: 10,
                        height: 10,
                    },
                    itemMargin: {
                        horizontal: 0,
                        vertical: 8
                    }
                },
                plotOptions: {
                    pie: {
                        donut: {
                            size: '65%',
                            background: 'transparent',
                            labels: {
                                show: true,
                                name: {
                                    show: true,
                                    fontSize: '29px',
                                    fontFamily: 'Nunito, sans-serif',
                                    color: undefined,
                                    offsetY: -10
                                },
                                value: {
                                    show: true,
                                    fontSize: '26px',
                                    fontFamily: 'Nunito, sans-serif',
                                    color: '20',
                                    offsetY: 16,
                                    formatter: function(val) {
                                        return val
                                    }
                                },
                                total: {
                                    show: true,
                                    showAlways: true,
                                    label: 'Total',
                                    color: '#888ea8',
                                    formatter: function(w) {
                                        return w.globals.seriesTotals.reduce(function(a, b) {
                                            return a + b
                                        }, 0)
                                    }
                                }
                            }
                        }
                    }
                },
                stroke: {
                    show: true,
                    width: 25,
                },
                series: [<?= $perusahaan->countAllResults() ?>, <?= $usaha->countAllResults() ?>, <?= $warga->countAllResults() ?>, <?= $kematian->countAllResults() ?>, <?= $pindah->countAllResults() ?>, <?= $sktm->countAllResults() ?>],
                labels: ['Perusahaan', 'Usaha', 'Warga', 'Kematian', 'Pindah', 'SKTM'],
                responsive: [{
                    breakpoint: 1599,
                    options: {
                        chart: {
                            width: '350px',
                            height: '400px'
                        },
                        legend: {
                            position: 'bottom'
                        }
                    },

                    breakpoint: 1439,
                    options: {
                        chart: {
                            width: '250px',
                            height: '390px'
                        },
                        legend: {
                            position: 'bottom'
                        },
                        plotOptions: {
                            pie: {
                                donut: {
                                    size: '65%',
                                }
                            }
                        }
                    },
                }]
            }


            /*
                ================================
                    Revenue Monthly | Render
                ================================
            */
            var chart1 = new ApexCharts(
                document.querySelector("#revenueMonthly"),
                options1
            );

            chart1.render();

            /*
                =================================
                    Sales By Category | Render
                =================================
            */
            var chart = new ApexCharts(
                document.querySelector("#chart-2"),
                options
            );

            chart.render();

            /*
                =============================================
                    Perfect Scrollbar | Recent Activities
                =============================================
            */
            const ps = new PerfectScrollbar(document.querySelector('.mt-container'));


        } catch (e) {

        }
    </script>