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

    var jabatan=document.getElementsByClassName("jabatan");
    fun.aksi=true;

    fun.loadData=()=>{
        service.dataJabatan((res)=>{
            fun.datajabatan=res.data;
        })
    }

    fun.loadData();

    fun.clearText=()=>{
        for(var i=0;i<fakultas.length;i++){
            jabatan[i].value="";
        }
    }

    fun.tambahData=()=>{
        fun.aksi=false;
        fun.ket="Form Tambah Jabatan";
        fun.clearText();

    }

    fun.editData=(row)=>{
        fakultas[0].value=row.jabatan
        id=row.id;
        fun.aksi=true;
    }



    fun.checkValidation=()=>{
        if(jabatan[0].value.length==0){
            message="Jabatan Masih Kosong";
            return true;
        }

    }


    fun.saveJabatan=()=>{
        var check=fun.checkValidation();
        if(check){
            swal({
                text:message,
                icon:"error"
            });

            return;
        }
        var data={
           jabatan:jabatan[0].value
        };
        service.createJabatan(data,(res)=>{
            if(res.success){
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

    fun.updateJabatan=()=>{
        var data={
           id:id,
           jabatan:jabatan[0].value
        };

        service.updateJabatan(data,(res)=>{
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
        service.deleteJabatan(row.id,(res)=>{
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
