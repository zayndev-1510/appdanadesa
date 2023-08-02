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

    var sumber=document.getElementsByClassName("sumber");
    fun.aksi=true;

    fun.loadData=()=>{
        service.dataSumberDana((res)=>{
            fun.datasumber=res.data;
        })
    }

    fun.loadData();

    fun.clearText=()=>{
        for(var i=0;i<sumber.length;i++){
            sumber[i].value="";
        }
    }

    fun.tambahData=()=>{
        fun.aksi=false;
        fun.ket="Form Tambah Sumber Dana";
        fun.clearText();

    }

    fun.editData=(row)=>{
        id=row.id;
        sumber[0].value=row.jenis;
        fun.aksi=true;
    }



    fun.checkValidation=()=>{
        if(sumber[0].value.length==0){
            message="Jenis Sumber Dana Masih Kosong";
            return true;
        }

    }

    fun.saveSumberDana=()=>{
        var check=fun.checkValidation();
        if(check){
            swal({
                text:message,
                icon:"error"
            });

            return;
        }
        var data={
            jenis:sumber[0].value
        };
        service.createSumberDana(data,(res)=>{
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

    fun.updateSumberDana=()=>{
        var data={
           jenis:sumber[0].value
        };

        service.updateSumberDana(data,id,(res)=>{
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
        service.deleteSumberDana(row.id,(res)=>{
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
