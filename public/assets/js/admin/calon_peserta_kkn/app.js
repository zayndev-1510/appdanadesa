/*jshint esversion: 6 */
$(document).ready(function() {
    $('#dataTable').DataTable();
});
var app = angular.module("homeApp", ['ngRoute', 'datatables']);

app.controller("homeController", function($scope, service) {

    var fun = $scope;
    var service = service;
    fun.attr=true;

    var id_calon_kkn=0;

    var status=document.getElementById("status");
    var id_periode=document.getElementById("id_periode");

    




    fun.sort_date=(a, b)=> {
        return new Date(a.tanggal).getTime() - new Date(b.tanggal).getTime();
    }
    fun.loadPesertaKkn=()=>{
        service.dataCalonKkn(res=>{
           fun.datapesertakkn=res.data;

        });
    };

    fun.loadPeriodeKkn=()=>{
        service.getPeriodeKkn(res=>{
            var dataperiode=res.data;
            fun.dataperiode=dataperiode.sort(fun.sort_date);
            const filterperiode=dataperiode.filter(row=>{
                return row.status==1;
            });
            setTimeout(function(){
                for (i=0;i<id_periode.length;i++)
                {
                  if (id_periode.options[i].value == filterperiode[0].id)
                  {
                      id_periode.selectedIndex = i;
                      return;
                  }
                }
            },500);

        })
    };


    fun.tes=()=>{

    }

    fun.datastatus=[
        {"status":0,"caption":"Belum Diterima"},
        {"status":1,"caption":"Diterima"},
        {"status":2,"caption":"Ditolak"}
    ];



    fun.loadPeriodeKkn();
    fun.loadPesertaKkn();

    fun.editData=(row)=>{
        fun.attr=false;
        id_calon_kkn=row.idcalonkkn;
        fun.nim=row.nimmhs;
        fun.nama=row.namalengkapmhs;
        fun.tempat_lahir=row.tempatlahir
        fun.tgl_lahir=row.tgllahir;
        fun.kabupaten=row.kabupaten;
        fun.kecamatan=row.kecamatan;
        fun.desa=row.desa;
        fun.nomor_hp=(row.notelpon!==null) ? row.notelpon : "belum ada";
        fun.email=row.email;
        fun.kode_calon_kkn=(row.kodecalonkkn!==null) ? row.kodecalonkkn :"belum ada";
        fun.ukuran_baju=(row.ukuran_baju !==null) ? row.ukuranbaju : "belum ada";


        service.getBerkasCalonKkn(row.idberkas,res=>{
            var data=res.data;
            fun.foto=data.foto;
            fun.sertifikat_vaksin=data.sertifikat_vaksin;
            fun.surat_izin_atasan=data.surat_izin_atasan;
            fun.surat_izin_ortu=data.surat_izin_ortu;
            fun.krs_terakhir=data.krs_terakhir;
            fun.transkip_nilai=data.transkip_nilai;
            fun.slip_pembayaran_smt=data.slip_pembayaran_smt;
            fun.slip_pembayaran_kkn=(data.slip_pembayaran_kkn !==null) ? res.slip_pembayaran_kkn : "Belum ada";
            status.value=row.status;
        });
    }


    fun.openFile=(pathfile,name_file)=>{
        var link=document.createElement("a");
        link.target="_blank";
        console.log(name_file);
        if(name_file==='Belum ada'){
            swal({
                text:"Berkas tidak tersedia",
                icon:"warning"
            });
        }else{
           window.open(URL_APP+"calonkkn/"+pathfile+"/"+fun.nim+"/"+name_file,"_blanck");
        }
    }
    fun.cancel=()=>{
        fun.attr=true;
        fun.loadPesertaKkn();
    }
    fun.konfirmasi=()=>{
        let obj={
            id_calon_kkn:id_calon_kkn,
            status:status.value
        };
        $("#cover-spin").show();
        service.konfirmasiCalon(obj,res=>{
            if(res.success){
                setTimeout(function(){
                    fun.attr=true;
                    $("#cover-spin").hide();
                    fun.loadPesertaKkn();
                    $scope.$apply();
                },2000);
            }
        })
    }

    fun.getDataByPeriode=()=>{
        service.getCalonKknPeriode(id_periode.value,res=>{
            fun.datapesertakkn=res.data;

        })
    }
});
