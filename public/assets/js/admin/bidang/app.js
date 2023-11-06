/*jshint esversion: 6 */
$(document).ready(function() {
    $('#dataTable').DataTable();
});
var app = angular.module("homeApp", ['ngRoute', 'datatables']);

app.controller("homeController", function($scope, service) {

    var fun = $scope;
    var service = service;
    var message="";
    var id=0;



    var responjson=[
        {sukses:"Simpan data berhasil",error:"Simpan data gagal"},
        {sukses:"Update Data Berhasil",error:"Update data gagal"},
        {sukses:"Delete Data Berhasil",error:"Delete data gagal"}
    ];

    var bidang=document.getElementsByClassName("bidang");

    fun.aksi=true;

    fun.loadData=()=>{
        service.dataBidang((res)=>{
            fun.databidang=res.data;
        })
    }

    fun.loadData();

    fun.clearText=()=>{
        for(var i=0;i<bidang.length;i++){
            bidang[i].value="";
        }
    }

    fun.tambahData=()=>{
        fun.aksi=false;
        fun.ket="Form Tambah Bidang";
        fun.clearText();

    }

    fun.editData=(row)=>{
        const {keterangan,kode_bidang}=row;
        id=row.id;
        bidang[0].value=kode_bidang;
        bidang[1].value=keterangan;
        fun.aksi=true;
        fun.ket="Form Edit Bidang";
    }



    fun.checkValidation=()=>{
        if(bidang[0].value.length==0){
            message="Bidang Masih Kosong";
            return true;
        }

    }

    fun.saveBidang=()=>{
        var check=fun.checkValidation();
        if(check){
            swal({
                text:message,
                icon:"error"
            });

            return;
        }
        var data={
            kode_bidang:bidang[0].value,
            keterangan:bidang[1].value
        };
        service.createBidang(data,(res)=>{
            if(res.success){
                swal({
                    text:responjson[0].sukses,
                    icon:"success"
                });
                fun.loadData();
                fun.clearText();
                return;
            }
            swal({
                text:responjson[0].error,
                icon:"error"
            });
        })

    }

    fun.updateBidang=()=>{
        var data={
            kode_bidang:bidang[0].value,
            keterangan:bidang[1].value
        };

        service.updateBidang(data,id,(res)=>{
            if(res.success){
                swal({
                    text:responjson[1].sukses,
                    icon:"success"
                });
                fun.loadData();
                return;
            }

            swal({
                text:responjson[1].error,
                icon:"error"
            });
        })
    }

    fun.delete=(row)=>{
        service.deleteBidang(row.id,(res)=>{
            if(res.success>0){
                swal({
                    text:responjson[2].sukses,
                    icon:"success"
                });
                fun.loadData();
                return;
            }

            swal({
                text:responjson[2].error,
                icon:"error"
            });
        })
    }

});
