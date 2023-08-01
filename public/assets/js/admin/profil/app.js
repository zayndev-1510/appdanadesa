/*jshint esversion: 6 */
$(document).ready(function() {
    $('#dataTable').DataTable();
});
var app = angular.module("homeApp", ['ngRoute', 'datatables']);


app.controller("homeController", function($scope, service) {

    var fun = $scope;
    var service = service;
    var message="";
    var id_update=0;

    var profil_desa=document.getElementsByClassName("profil-desa");

    fun.loadProfilDesa=()=>{
        service.dataProfilDesa(res=>{
            const { id,provinsi, kecamatan, kabupaten, desa,perangkat,idperangkat,jabatan} = res.data;
            fun.provinsi=provinsi
            fun.kecamatan=kecamatan
            fun.kabupaten=kabupaten;
            fun.desa=desa
            fun.dataperangkat=perangkat;
            fun.jabatan=jabatan;
            id_update=id;
          setTimeout(() => {
            profil_desa[4].value=idperangkat
          },100);
        });
    }

    fun.loadProfilDesa();

    fun.updateProfil=()=>{
        const data={
            provinsi:profil_desa[0].value,
            kecamatan:profil_desa[1].value,
            kabupaten:profil_desa[2].value,
            desa:profil_desa[3].value,
            id_pengisi:parseInt(profil_desa[4].value)
        }

      service.updateProfilDesa(data,id_update,res=>{
        const {success}=res;
        if(success){
            swal({
                text:"Perbarui Profil Desa Berhasil",
                icon:"success"
            });
            fun.loadProfilDesa();
            return true;
        }
            swal({
                text:"Perbarui Profil Desa Gagal",
                icon:"error"
            });
      });
    }

});
