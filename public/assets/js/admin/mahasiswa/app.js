/*jshint esversion: 6 */
$(document).ready(function() {
    $('#dataTable').DataTable();
});

function preview(event, a) {
    var berkas = event.target;
    var ext = berkas.value.substring(berkas.value.lastIndexOf(".") + 1);
    if (ext != "jpg") {
        swal({
            text: "Format file tidak mendukung",
            icon: "warning",
        });
    } else {
        if (a == 1) {
            const loadimg = document.getElementById("muat_foto");
            loadimg.src = URL.createObjectURL(event.target.files[0]);
        }
    }
}
var app = angular.module("homeApp", ['ngRoute', 'datatables']);


app.controller("homeController", function($scope, service) {

    var fun = $scope;
    var service = service;
    var message="";
    var id_mhs=0;
    var data_temp_fakultas=[];


    var responjson=[
        {sukses:"Simpan data berhasil",error:"Simpan data gagal"},
        {sukses:"Update Data Berhasil",error:"Update data gagal"},
        {sukses:"Delete Data Berhasil",error:"Delete data gagal"}
    ];

    var mahasiswa=document.getElementsByClassName("mahasiswa");

    fun.clearData=()=>{
        fun.form_mahasiswa=false;
        fun.table_mahasiswa=true;
        fun.import_excel=false;
    }

    fun.openFile=()=>{
        document.getElementById("foto_profil").click();
    }

    fun.loadDataFakultas=()=>{
        service.dataFakultasMahasiswa(res=>{
            fun.datafakultas=res.data;
            data_temp_fakultas=res.data;
        })
    }
    fun.loadDataMahasiswa=()=>{
        service.dataMahasiswa(res=>{
            fun.datamahasiswa=res.data;
        });
    }

    fun.loadDataMahasiswa();

    fun.getJurusan=(id_fakultas)=>{
        if(id_fakultas=="") return true;
        const filterData=data_temp_fakultas.filter(row => row.id_fakultas==id_fakultas);
        fun.datajurusan=filterData[0].jurusan;
    }

    fun.loadDataFakultas();

    fun.clearData();

    fun.tambahData=()=>{
        fun.aksi=false;
        fun.clearData();
        fun.form_mahasiswa=true;
        fun.table_mahasiswa=false;
        fun.import_excel=false;
    }
    fun.closeForm=()=>{
        fun.form_mahasiswa=false;
        fun.table_mahasiswa=true;
        fun.import_excel=false;
        fun.clearData();
        fun.loadDataMahasiswa();
    }

    fun.saveMahasiswa=()=>{

        var file = document.getElementById("foto_profil");
        var fd_berkas = new FormData();
        fd_berkas.append("files", file.files[0]);
        const data={
            nim_mhs:mahasiswa[0].value,nama_mhs:mahasiswa[1].value,tempat_lahir_mhs:mahasiswa[2].value,tgl_lahir_mhs:mahasiswa[3].value,
            foto_mhs:"default.jpg",nomor_hp_mhs:mahasiswa[4].value,email_mhs:mahasiswa[5].value,
            angkatan_mhs:mahasiswa[6].value,id_fakultas:mahasiswa[7].value,id_jurusan:fun.id_jurusan
        };
        service.uploadFotoMahasiswa(fd_berkas, mahasiswa[0].value, (res) => {
            data.foto_mhs = res.data;

            if(res.val>0){
                var check=fun.checkValidation();
                    if(check){ swal({text:message,icon:"error"}); return true;};

                service.createMahasiswa(data,res=>{
                        if(res.action>0){ swal({text:responjson[0].sukses,icon:"success"});fun.clearData();return true;}
                        swal({text:responjson[0].error,icon:"error"});
                });
                return true;
            }
            swal({
                text:res.message,
                icon:"error"
            });

        });

    }

    fun.editData=(row)=>{
        const filterData=data_temp_fakultas.filter(row => row.id_fakultas==row.id_fakultas);
        fun.datajurusan=filterData[0].jurusan;
        mahasiswa[0].value=row.nim_mhs;mahasiswa[1].value=row.nama_mhs;mahasiswa[2].value=row.tempat_lahir_mhs;mahasiswa[3].value=row.tgl_lahir_mhs;
        mahasiswa[4].value=row.nomor_hp_mhs;mahasiswa[5].value=row.email_mhs;mahasiswa[6].value=row.angkatan_mhs;
        mahasiswa[7].value=row.id_fakultas;fun.id_jurusan=row.id_jurusan;
        id_mhs=row.id_mhs;
        fun.form_mahasiswa=true;
        fun.aksi=true;


    }

    fun.updateMahasiswa=()=>{
        const data={
            nim_mhs:mahasiswa[0].value,nama_mhs:mahasiswa[1].value,tempat_lahir_mhs:mahasiswa[2].value,tgl_lahir_mhs:mahasiswa[3].value,
            foto_mhs:"default.jpg",nomor_hp_mhs:mahasiswa[4].value,email_mhs:mahasiswa[5].value,
            angkatan_mhs:mahasiswa[6].value,id_fakultas:mahasiswa[7].value,id_jurusan:fun.id_jurusan,id_mhs:id_mhs
        };
       service.updateMahasiswa(data,res=>{
            if(res.action>0){ swal({text:responjson[1].sukses,icon:"success"});fun.loadDataMahasiswa();return true;}
            swal({text:responjson[1].error,icon:"error"});
       });

    }

    fun.deleteMahasiswa=(row)=>{
        const id=row.id_mhs
        service.deleteMahasiswa(id,res=>{
            if(res.action>0){ swal({text:responjson[2].sukses,icon:"success"});fun.loadDataMahasiswa();return true;}
            swal({text:responjson[2].error,icon:"error"});

        });
    }

    fun.checkValidation=()=>{
        var validate=[mahasiswa[0].value.length,mahasiswa[1].value.length,mahasiswa[7].value.length,mahasiswa[8].value.length];
        if(validate[0]==0){ message="NIM Wajib Di Isi"; return true;}
        else if(validate[1]==0){ message="Nama Wajib Di Isi"; return true}
        else if(validate[2]==0){ message="Fakultas Wajib Di Isi"; return true;}
        else if(validate[3]==0){ message="Jurusan Wajib Di Isi"; return true;}
    }





});
