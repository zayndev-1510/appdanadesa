<table datatable="ng" class="table table-bordered table-jabatan">
    <thead class="bg-light" style="font-size: 12px;">
        <tr class="text-center">
            <th>Kode</th>
            <th>Rincian</th>
            <th>Kegiatan</th>
            <td>Paket Kegiatan</td>
            <th>Anggaran</th>
        </tr>
    </thead>
    <tbody style="font-size: 12px">
        <tr class="text-center" ng-repeat="row in datarab">
            <td>@{{ row.kode_kelompok }} @{{ row.kode_jenis }}
                @{{ row.kode_objek }}</td>
            <td>@{{ row.rincian }}</td>
            <td>@{{ row.kegiatan }}</td>
            <td>@{{ row.nama_paket }}</td>
            <td>@{{ formatRupiah(row.anggaran) }}</td>
        </tr>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="3">Total Rencana Anggaran Belanjaan Tahun
                @{{ tahun_aktif }}</td>
            <td class="text-center">:</td>
            <td class="text-center">@{{ formatRupiah(totalrab) }}</td>
        </tr>
    </tfoot>
</table>
