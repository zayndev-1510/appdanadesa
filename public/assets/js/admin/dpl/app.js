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
    var id_dpl=0;
    var update=false;
    fun.form_dpl=true;
    var responjson=[
        {sukses:"Simpan data berhasil",error:"Simpan data gagal"},
        {sukses:"Update Data Berhasil",error:"Update data gagal"},
        {sukses:"Delete Data Berhasil",error:"Delete data gagal"}
    ];

    var index_error=null;
    var dpl=document.getElementsByClassName("dpl");



    fun.loadPeriodeKKn=()=>{
        service.dataPeriodeKkn(res=>{
            fun.dataperiodekkn=res.data.sort(fun.custom_sort);
    });
    }

    fun.loadData=()=>{
        service.dataDpl((res)=>{
            fun.datadpl=res.data;
        })
    }
    fun.loadPeriodeKKn();
    fun.loadData();


    fun.clearText=()=>{
        for(var i=0;i<dpl.length;i++){
            dpl[i].value="";
        }
    }
    fun.batal=()=>{
        fun.clearText();
        fun.form_dpl=true;
    }

    fun.tambahData=()=>{

        fun.aksi=false;
        update=false;
        fun.form_dpl=false;
        fun.ket="Form Tambah Dosen Pembimbing Lapangan";
        fun.clearText();
    }

    fun.editData=(row)=>{
        fun.form_dpl=false;
        fun.ket="Form Update Dosen Pembimbing Lapangan";
        fun.aksi=true;
        update=true;

        id_dpl=row.id_dpl;
        dpl[0].value=row.nidn;
        dpl[1].value=row.nama_dosen;
        dpl[2].value=row.gelar_depan;
        dpl[3].value=row.gelar_belakang;
        dpl[4].value=row.id_periode_kkn;
        dpl[5].value=row.email;
        dpl[6].value=row.nomor_hp;

    }

    fun.checkValidEmail=(email)=>{
        var re = /\S+@\S+\.\S+/;
        return re.test(email);
    }


    fun.checkValidation=()=>{
        if(dpl[0].value.length==0){
            message="NIDN Dosen Masih Kosong";
            index_error=0;
            return true;
        }else if(dpl[1].value.length==0){
            index_error=1;
            message="Nama Dosen Masih Kosong";
            return true;
        }else if(dpl[2].value.length==0){
            index_error=2;
            message="Gelar Depan Masih Kosong";
            return true;
        }

        else if(dpl[3].value.length==0){
            index_error=3;
            message="Gelar Belakang Masih Kosong";
            return true;
        }
        else if(dpl[4].value.length==0){
            index_error=4;
            message="Periode KKN";
            return true;
        }
        else if(dpl[5].value.length==0){
            index_error=5;
            message="Email Masih Kosong";
            return true;
        }
        else if(!fun.checkValidEmail(dpl[5].value)){
            index_error=5;
            message="Email tidak valid";
            return true;
        }
        else if(dpl[6].value.length==0){
            index_error=6;
            message="Nomor Handphone Masih Kosong";
            return true;
        }
    }


    fun.saveDpl=()=>{
        var check=fun.checkValidation();
        if(check){
            fun.check=true;
            fun.error=message;
            dpl[index_error].classList.add("error-input");
            return true;
        }
        var datadpl={
          id_dpl:"secret",nidn:dpl[0].value,nama_dosen:dpl[1].value,
          gelar_depan:dpl[2].value,gelar_belakang:dpl[3].value,
          email:dpl[5].value,nomor_hp:dpl[6].value,id_periode_kkn:dpl[4].value
        };

        // $("#cover-spin").show();
        service.createDpl(datadpl,(res)=>{
            $("#cover-spin").hide();
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

    fun.updateDpl=()=>{
        var datadpl={
            id_dpl:"secret",nidn:dpl[0].value,nama_dosen:dpl[1].value,
            gelar_depan:dpl[2].value,gelar_belakang:dpl[3].value,
            email:dpl[5].value,nomor_hp:dpl[6].value,id_periode_kkn:dpl[4].value,
            id_dpl:id_dpl
          };

        service.updateDpl(datadpl,(res)=>{
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
        service.deleteDpl(row.id_dpl,(res)=>{

            if(res.success){
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
