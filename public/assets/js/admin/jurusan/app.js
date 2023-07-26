/*jshint esversion: 6 */
$(document).ready(function() {
    $('#dataTable').DataTable();
});
var app = angular.module("homeApp", ['ngRoute', 'datatables']);


app.controller("homeController", function($scope, service) {

    var fun = $scope;
    var service = service;
    var message="";
    var id_jurusan=0;
    var responjson=[
        {sukses:"Simpan data berhasil",error:"Simpan data gagal"},
        {sukses:"Update Data Berhasil",error:"Update data gagal"},
        {sukses:"Delete Data Berhasil",error:"Delete data gagal"}
    ];
    var data_fakultas=[];

    var jurusan=document.getElementsByClassName("jurusan");


    fun.aksi=true;
    fun.loadData=()=>{
        service.dataFakultas((res)=>{
            fun.datafakultas=res.data;
        })
    }


    fun.loadDataJurusan=()=>{
        service.dataJurusan((res)=>{
            fun.datajurusan=res.data;
        })
    }

    fun.loadData();
    fun.loadDataJurusan();

    fun.clearText=()=>{
        for(var i=0;i<jurusan.length;i++){
            jurusan[i].value="";
        }
    }

    fun.tambahData=()=>{
        fun.aksi=false;
        fun.ket="Form Tambah Jurusan";
        fun.clearText();

    }

    fun.editData=(row)=>{
        fun.ket="Form Update Jurusan";
        jurusan[0].value=row.kode_jurusan
        jurusan[1].value=row.nama_jurusan;
        jurusan[2].value=row.id_fakultas;
        id_jurusan=row.id_jurusan;
        fun.aksi=true;
    }



    fun.checkValidation=()=>{
        if(jurusan[0].value.length==0 && jurusan[1].value.length==0 && jurusan[2].value.length==0){
            message="Data Masih Kosong";
            return true;
        }else if(jurusan[0].value.length==0){
            message="Kode Jurusan Masih Kosong";
            return true;
        }else if(jurusan[1].value.length==0){
            message="Nama Jurusan Masih Kosong";
            return true;
        }else if(jurusan[2].value.length==0){
            message="Nama Fakultas Masih Kosong";
            return true;
        }

    }


    fun.saveJurusan=()=>{
        var check=fun.checkValidation();
        if(check){
            swal({
                text:message,
                icon:"error"
            });
            return;
        }
        var data={
            kode_jurusan:jurusan[0].value,
            nama_jurusan:jurusan[1].value,
            id_fakultas:jurusan[2].value
        };
        service.createJurusan(data,(res)=>{
            if(res.check>0){
                swal({
                    text:responjson[0].sukses,
                    icon:"success"
                });
                fun.loadDataJurusan();
                return;
            }

            swal({
                text:responjson[0].error,
                icon:"error"
            });
        })

    }

    fun.updateJurusan=()=>{
        var data={
            kode_jurusan:jurusan[0].value,
            nama_jurusan:jurusan[1].value,
            id_fakultas:jurusan[2].value,
            id_jurusan:id_jurusan
        };

        service.updateJurusan(data,(res)=>{
            if(res.check>0){
                swal({
                    text:responjson[1].sukses,
                    icon:"success"
                });
                fun.loadDataJurusan();
                return;
            }

            swal({
                text:responjson[1].error,
                icon:"error"
            });
        })
    }


    fun.delete=(row)=>{

        service.deleteJurusan(row.id_jurusan,(res)=>{

            if(res.check>0){
                swal({
                    text:responjson[2].sukses,
                    icon:"success"
                });
                fun.loadDataJurusan();
                return;
            }

            swal({
                text:responjson[2].error,
                icon:"error"
            });
        })
    }




});
