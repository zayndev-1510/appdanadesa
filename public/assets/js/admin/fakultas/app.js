/*jshint esversion: 6 */
$(document).ready(function() {
    $('#dataTable').DataTable();
});
var app = angular.module("homeApp", ['ngRoute', 'datatables']);


app.controller("homeController", function($scope, service) {

    var fun = $scope;
    var service = service;
    var message="";
    var id_fakultas=0;


    console.log(URL_API);
    
    var responjson=[
        {sukses:"Simpan data berhasil",error:"Simpan data gagal"},
        {sukses:"Update Data Berhasil",error:"Update data gagal"},
        {sukses:"Delete Data Berhasil",error:"Delete data gagal"}
    ];

    var fakultas=document.getElementsByClassName("fakultas");


    fun.aksi=true;
    fun.loadData=()=>{
        service.dataFakultas((res)=>{
            fun.datafakultas=res.data;
        })
    }

    fun.loadData();

    fun.clearText=()=>{
        for(var i=0;i<fakultas.length;i++){
            fakultas[i].value="";
        }
    }

    fun.tambahData=()=>{
        fun.aksi=false;
        fun.ket="Form Tambah Fakultas";
        fun.clearTex();

    }

    fun.editData=(row)=>{
        fakultas[0].value=row.kode_fakultas;
        fakultas[1].value=row.nama_fakultas;
        id_fakultas=row.id_fakultas;
        fun.aksi=true;
    }



    fun.checkValidation=()=>{
        if(fakultas[0].value.length==0 && fakultas[1].value.length==0){
            message="Kode Dan Nama Fakultas Masih Kosong";
            return true;
        }else if(fakultas[0].value.length==0){
            message="Kode Fakultas Masih Kosong";
            return true;
        }else if(fakultas[1].value.length==0){
            message="Nama Fakultas Masih Kosong";
            return true;
        }

    }


    fun.saveFakultas=()=>{
        var check=fun.checkValidation();
        if(check){
            swal({
                text:message,
                icon:"error"
            });

            return;
        }
        var data={
            kode_fakultas:fakultas[0].value,
            nama_fakultas:fakultas[1].value
        };
        service.createFakultas(data,(res)=>{
            if(res.check>0){
                swal({
                    text:responjson[0].sukses,
                    icon:"success"
                });
                fun.loadData();
                return;
            }

            swal({
                text:responjson[0].error,
                icon:"error"
            });
        })

    }

    fun.updateFakultas=()=>{
        var data={
            kode_fakultas:fakultas[0].value,
            nama_fakultas:fakultas[1].value,
            id_fakultas:id_fakultas
        };
        console.log(data)
        service.updateFakultas(data,(res)=>{
            if(res.check>0){
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

        service.deleteFakultas(row.id_fakultas,(res)=>{
            console.log(res.check)
            if(res.check>0){
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
