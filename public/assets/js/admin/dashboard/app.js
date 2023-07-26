/*jshint esversion: 6 */
var app = angular.module("homeApp", ['ngRoute']);

function random_rgba() {
    var o = Math.round,
        r = Math.random,
        s = 255;
    return 'rgba(' + o(r() * s) + ',' + o(r() * s) + ',' + o(r() * s) + ',' + r().toFixed(1) + ')';
}

function getRandomRgb() {
    var num = Math.round(0xffffff * Math.random());
    var r = num >> 16;
    var g = num >> 8 & 255;
    var b = num & 255;
    return 'rgb(' + r + ', ' + g + ', ' + b + ')';
}
app.controller("homeController", function($scope, service) {

    var fun = $scope;
    var service = service;
    const CAPTION_BULAN = [];
    const CAPTIION_BULAN_PRODUK_KELUAR = []
    const DATA_PRODUK_MASUK = []
    const BACKGROUND_GRAFIK = [];
    const DATA_PRODUK_KELUAR = []


    const NAME_MONTH = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"]

    fun.dataDashboard = () => {

        service.dataDashboard(obj => {

            fun.produk = obj.data.stokproduk;
            fun.produkmasuk = obj.data.produkmasuk;
            fun.produkkeluar = obj.data.produkkeluar
            fun.kasir = obj.data.kasir;
            fun.totaltransaksikeluar = obj.data.totaltransaksikeluar
            const grafikprodukkeluar = obj.grafikprodukkeluar
            const grafikprodukmasuk = obj.grafikprodukmasuk
            fun.grafikDataProdukKeluar(grafikprodukkeluar)
            fun.grafikDataProdukMasuk(grafikprodukmasuk)
        })
    }

    fun.grafikDataProdukKeluar = (datagrafik) => {

        for (var i = 0; i < datagrafik.length; i++) {
            var obj = datagrafik[i]
            CAPTION_BULAN.push(NAME_MONTH[obj.bulan - 1])
            DATA_PRODUK_KELUAR.push(obj.jumlah)
            BACKGROUND_GRAFIK.push(getRandomRgb());

        }

        var datagrafikalumni = {
            labels: CAPTION_BULAN,
            datasets: [{
                data: DATA_PRODUK_KELUAR,
                backgroundColor: BACKGROUND_GRAFIK,
                borderColor: BACKGROUND_GRAFIK,
                borderWidth: 1,

            }]
        }
        var opt = {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            },
            events: false,
            legend: {
                display: false
            },
            layout: {
                padding: {
                    top: 10
                }
            },
            tooltips: {
                enabled: true,
                callbacks: {
                    label: function(tooltipItem) {
                        return tooltipItem.yLabel;
                    }
                }
            },
            hover: {
                animationDuration: 0
            },
        };

        var ctx = document.getElementById("myChart"),
            myLineChart = new Chart(ctx, {
                type: 'bar',
                data: datagrafikalumni,
                options: opt
            });
    }
    fun.grafikDataProdukMasuk = (datagrafik) => {

        for (var i = 0; i < datagrafik.length; i++) {
            var obj = datagrafik[i]
            CAPTIION_BULAN_PRODUK_KELUAR.push(NAME_MONTH[obj.bulan - 1])
            DATA_PRODUK_MASUK.push(obj.jumlah)
            BACKGROUND_GRAFIK.push(getRandomRgb());

        }

        var datagrafikalumni = {
            labels: CAPTIION_BULAN_PRODUK_KELUAR,
            datasets: [{
                data: DATA_PRODUK_MASUK,
                backgroundColor: BACKGROUND_GRAFIK,
                borderColor: BACKGROUND_GRAFIK,
                borderWidth: 1,

            }]
        }
        var opt = {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            },
            events: false,
            legend: {
                display: false
            },
            layout: {
                padding: {
                    top: 10
                }
            },
            tooltips: {
                enabled: true,
                callbacks: {
                    label: function(tooltipItem) {
                        return tooltipItem.yLabel;
                    }
                }
            },
            hover: {
                animationDuration: 0
            },
        };

        var ctx = document.getElementById("myChart2"),
            myLineChart = new Chart(ctx, {
                type: 'bar',
                data: datagrafikalumni,
                options: opt
            });
    }
    fun.dataDashboard();

});