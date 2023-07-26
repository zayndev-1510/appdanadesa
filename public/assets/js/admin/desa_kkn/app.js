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
    var id_desa=0;
    var update=false;
    var responjson=[
        {sukses:"Simpan data berhasil",error:"Simpan data gagal"},
        {sukses:"Update Data Berhasil",error:"Update data gagal"},
        {sukses:"Delete Data Berhasil",error:"Delete data gagal"}
    ];
    var index_error=null;
    var kecamatan=null;
    var kabupaten=null;
    var desa_temp=null;

    var elementkecamatan=document.getElementById("mentkecamatan");

    var array_kabupaten=[];
    var array_kecamatan=[];
    var array_desa=[];
    var desa=document.getElementsByClassName("desa");

    console.log(desa)

    fun.aksi=true;

    fun.custom_sort=(a, b)=> {
        return new Date(a.tanggal).getTime() - new Date(b.tanggal).getTime();
    }

    fun.loaddataKabupaten=()=>{
        service.getDataKabupaten(res=>{
            fun.datakabupaten=res.value;
            array_kabupaten=res.value;
    });
    }
    fun.loadPeriodeKKn=()=>{
        service.dataPeriodeKkn(res=>{
            fun.dataperiodekkn=res.data.sort(fun.custom_sort);
    });
    }

    fun.loadData=()=>{
        service.dataDesaKkn((res)=>{
            fun.datadesakkn=res.data;
        })
    }
    fun.loadPeriodeKKn();
    fun.loadData();
    fun.loaddataKabupaten();

    fun.getKecamatan=(k)=>{

        if(k!==null){
            var array=Array.from(k.split(","));
            kabupaten=array[1];
          service.getDataKecamatan(array[0],res=>{
            fun.datakecamatan=res.value;
            array_kecamatan=res.value;
          });
          return true;
        }

       if(update){

        var value_kabupaten=null;
        for(var i=0;i<array_kabupaten.length;i++){
            if(array_kabupaten[i].name==kabupaten){
              value_kabupaten=array_kabupaten[i].id+","+array_kabupaten[i].name;
            }
        }

        desa[0].value=value_kabupaten;
        var array=Array.from(value_kabupaten.split(","));
        kabupaten=array[1];
      service.getDataKecamatan(array[0],res=>{
        fun.datakecamatan=res.value;
        array_kecamatan=res.value;
        const data=array_kecamatan.filter(function(respon){
            if(respon.name==kecamatan){
                return respon;
            }
        })

        fun.kecamatan=(data[0].id+","+data[0].name);
        fun.getDesa(fun.kecamatan);
      });
       }
    }

    fun.getDesa=(k)=>{
        var array=Array.from(k.split(","));
        kecamatan=array[1];
      service.getDataDesa(array[0],res=>{
        fun.datadesa=res.value;
        array_desa=res.value;
        if(desa !==null){
            fun.desa=desa_temp
        }

      });
    }

    fun.clearText=()=>{
        for(var i=0;i<desa.length;i++){
            desa[i].value="";
        }
        kabupaten=null;
        kecamatan=null;
        desa_temp=null;
    }

    fun.tambahData=()=>{
        fun.aksi=false;
        update=false;
        fun.ket="Form Tambah Desa Kuliah Kerja Nyata ";
        fun.clearText();
    }

    fun.editData=(row)=>{
        fun.ket="Form Update Desa Kuliah Kerja Nyata";
        fun.aksi=true;
        update=true;
        kabupaten=row.kabupaten;
        kecamatan=row.kecamatan;
        desa_temp=row.desa;
        id_desa=row.id_desa;
        desa[3].value=row.id_periode_kkn;

        fun.getKecamatan(null);
    }



    fun.checkValidation=()=>{
        if(desa[0].value.length==0){
            message="Kabupaten Masih Kosong";
            index_error=0;
            return true;
        }else if(desa[1].value.length==0){
            index_error=1;
            message="Kecamatan Masih Kosong";
            return true;
        }else if(desa[2].value.length==0){
            index_error=2;
            message="Desa  Masih Kosong";
            return true;
        }

        else if(desa[3].value.length==0){
            index_error=3;
            message="Periode KKN Masih Kosong";
            return true;
        }


    }


    fun.savePeriode=()=>{
        var check=fun.checkValidation();
        if(check){
            fun.check=true;
            fun.error=message;
            desa[index_error].classList.add("error-input");
            return true;
        }
        var datadesa={
            kabupaten:kabupaten,
            kecamatan:kecamatan,
            desa:desa[2].value,
            id_periode_kkn:desa[3].value
        };
        $("#cover-spin").show();
        service.createDesaKkn(datadesa,(res)=>{
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

    fun.updatePeriode=()=>{
        var datadesa={
            kabupaten:kabupaten,
            kecamatan:kecamatan,
            desa:desa[2].value,
            id_periode_kkn:desa[3].value,
            id_desa:id_desa
        };

        service.updateDesaKkn(datadesa,(res)=>{
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
        service.deleteDesaKkn(row.id_desa,(res)=>{

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
