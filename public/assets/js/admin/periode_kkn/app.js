/*jshint esversion: 6 */
$(document).ready(function() {
    $('#dataTable').DataTable();
});
var app = angular.module("homeApp", ['ngRoute', 'datatables']);

function changeBorder(event){
    var input = event.target; // Get the input element
    var value = input.value; // Get the value of the input
    if(value.length>0){
        event.target.classList.remove("error-input");
    }
}



app.controller("homeController", function($scope, service) {

    var fun = $scope;
    var service = service;
    var message="";
    var id_periode=0;
    var responjson=[
        {sukses:"Simpan data berhasil",error:"Simpan data gagal"},
        {sukses:"Update Data Berhasil",error:"Update data gagal"},
        {sukses:"Delete Data Berhasil",error:"Delete data gagal"}
    ];
    var index_error=null;

    var periode=document.getElementsByClassName("periode");


    fun.aksi=true;
    fun.custom_sort=(a, b)=> {
        return new Date(a.tanggal).getTime() - new Date(b.tanggal).getTime();
    }
    fun.loadData=()=>{
        service.dataPeriodeKkn((res)=>{

            let dataperiode=res.data;
            fun.dataperiodekkn=dataperiode.sort(fun.custom_sort);
        })
    }

    fun.loadData();

    fun.clearText=()=>{
        for(var i=0;i<periode.length;i++){
            periode[i].value="";
        }
    }

    fun.tambahData=()=>{
        fun.aksi=false;
        fun.ket="Form Tambah Periode KKN";
        fun.clearText();

    }

    fun.editData=(row)=>{
        fun.ket="Form Update Periode KKN";
        periode[0].value=row.tahunakademik;
        periode[1].value=row.angkatan
        periode[2].value=row.tanggal;
        id_periode=row.id;
        fun.aksi=true;
    }



    fun.checkValidation=()=>{
        if(periode[0].value.length==0){
            message="Tahun Akademik Masih Kosong";
            index_error=0;
            return true;
        }else if(periode[1].value.length==0){
            index_error=1;
            message="Angkatan Masih Kosong";
            return true;
        }else if(periode[2].value.length==0){
            index_error=2;
            message="Tanggal Periode KKN Masih Kosong";
            return true;
        }

    }


    fun.savePeriode=()=>{
        var check=fun.checkValidation();
        if(check){
            fun.check=true;
            fun.error=message;
            periode[index_error].classList.add("error-input");
            return true;
        }
        var dataPeriode={
            tahun_akademik:periode[0].value,
            angkatan:periode[1].value,
            tgl_akademik:periode[2].value,
            status:1
        };
        service.createPeriodeKkn(dataPeriode,(res)=>{
            if(res.status){
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

    fun.updatePeriode=()=>{
        var dataPeriode={
            tahun_akademik:periode[0].value,
            angkatan:periode[1].value,
            tgl_akademik:periode[2].value,
            status:1,
            id_periode_kkn:id_periode
        };

        service.updatePeriodeKkn(dataPeriode,(res)=>{
            if(res.status){
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
    fun.updateStatus=(row,status)=>{
        var dataPeriode={
            tahun_akademik:row.tahunakademik,
            angkatan:row.angkatan,
            tgl_akademik:row.tanggal,
            status:status,
            id_periode_kkn:row.id
        };
        service.updatePeriodeKkn(dataPeriode,(res)=>{
            if(res.status){
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

        service.deletePeriodeKkn(row.id,(res)=>{

            if(res.status){
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
