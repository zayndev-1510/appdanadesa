/*jshint esversion: 6 */
$(document).ready(function() {
    $('#dataTable').DataTable();
    $('.summernote').summernote({
        height:500
    });
});

function changeBorder(event){
    var input = event.target; // Get the input element
    var value = input.value; // Get the value of the input
    if(value.length>0){
        event.target.classList.remove("error-input");
    }
}

var filepdf=null;
var tempfile=null;

function preview(event, a) {
    var berkas = event.target;
    var ext = berkas.value.substring(berkas.value.lastIndexOf(".") + 1);
    if (ext == "png" || ext=="jpg") {
        filepdf=URL.createObjectURL(event.target.files[0]);
    } else {
      swal({
        text: "Format file harus image",
        icon: "warning",
    });
    }

}

var app = angular.module("homeApp", ['ngRoute', 'datatables']);


app.controller("homeController", function($scope, service) {

    var fun = $scope;
    var service = service;
    var message="";
    var id_berita;
    fun.tabel_berita=true;

    var berita_value=document.getElementsByClassName("berita");
    var responjson=[
        {sukses:"Simpan data berhasil",error:"Simpan data gagal"},
        {sukses:"Update Data Berhasil",error:"Update data gagal"},
        {sukses:"Delete Data Berhasil",error:"Delete data gagal"}
    ];

    fun.load_data_berita=()=>{
        service.dataBerita((e)=>{
            fun.databerita=e.data;
        })
    }
    fun.load_data_berita();

    fun.clear_data=()=>{

        fun.tabel_berita=false;
        fun.keterangan="Tambah Berita";
        fun.aksi=false;

    }

    fun.tambahData=()=>{
        fun.clear_data();
    }

    fun.editData=(row)=>{
        fun.tabel_berita=false;
        fun.aksi=true;
        fun.keterangan="Perbarui Berita";
        berita_value[0].value=row.judul;
        id_berita=row.idberita;
        berita_value[1].value=row.author;
        $('.summernote').summernote('code', row.konten);
        filepdf=URL_FILE+"berita/"+row.thumbnail;
        tempfile=row.thumbnail;
    }

    fun.checkValidation=(judul,author,konten)=>{
        if(judul==0) {
            berita_value[0].placeholder="Masukan Judul Berita";
            berita_value[0].classList.add("error-input");
            return true;
        }
        else if(konten==0){
            swal({text:"Silakan input konten berita",icon:"warning"});
            var editor = $('.summernote'); // Target the Summernote editor container
            editor.css('border-color', 'red');

            return true;
        }

        return false;

    }

    fun.openFile=()=>{
        document.getElementById("thumbnail").click();
    }

    fun.previewFile=()=>{
        window.open(filepdf);

    }

    fun.saveBerita=()=>{
        var thumbnail=new FormData();
        var berkas=document.getElementById("thumbnail");
        thumbnail.append("file",berkas.files[0]);

        var check_validation=fun.checkValidation(berita_value[0].value.length,berita_value[1].value.length,berita_value[2].value.length);
        if(!check_validation){
            if(berkas.value.length==0) return swal({text:"Masukan Berkas Terlebih Dahulu",icon:"warning"})
            service.uploadThumbnail(thumbnail,e=>{
                var obj={
                    thumbnail:"default.png","judul":berita_value[0].value,
                    author:berita_value[1].value,konten:berita_value[2].value
                }
               obj.thumbnail=e.data;
                service.createBerita(obj,res=>{
                fun.load_data_berita();
                if(res.success===true) return swal({text:responjson[0].sukses,icon:"success"})
                swal({text:responjson[0].error,icon:"error"})

                });
            })

        }
       }
       fun.updateBerita=()=>{
        var thumbnail=new FormData();
        var berkas=document.getElementById("thumbnail");
        thumbnail.append("file",berkas.files[0]);
        var obj={
            thumbnail:tempfile,"judul":berita_value[0].value,
            author:berita_value[1].value,konten:berita_value[2].value,
            id_berita:id_berita
        }

        var check_validation=fun.checkValidation(berita_value[0].value.length,berita_value[1].value.length,berita_value[2].value.length);
        if(!check_validation){
            if(berkas.value.length==0){
                service.updateBerita(obj,res=>{
                    fun.load_data_berita();
                    if(res.success===true) return swal({text:responjson[0].sukses,icon:"success"})
                    swal({text:responjson[0].error,icon:"error"})

                    });
            }else{
                service.uploadThumbnail(thumbnail,e=>{
                    obj.thumbnail=e.data;
                    service.createBerita(obj,res=>{
                        if(res.success===true) return swal({text:responjson[0].sukses,icon:"success"})
                        swal({text:responjson[0].error,icon:"error"})

                        });
                 })
            }
        }
       }

       fun.delete=(row)=>{
        service.deleteBerita(row.idberita,res=>{
            fun.load_data_berita();
            if(res.success===true) return swal({text:responjson[2].sukses,icon:"success"})
            swal({text:responjson[2].error,icon:"error"})

        })
       }
});
