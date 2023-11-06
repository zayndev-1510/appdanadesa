<table datatable="ng" class="table table-bordered table-jabatan">
    <thead class="bg-light" style="font-size: 12px;">
        <tr class="text-center">
            <th>Kode</th>
            <th>Kegiatan</th>
            <th>Lokasi</th>
            <th>Waktu</th>
            <th>Keluaran</th>
            <th>Volume</th>
            <th>Pelaksana</th>
            <th>Pagu</th>
        </tr>
    </thead>
    <tbody style="font-size: 12px">
        <tr class="text-center" ng-repeat="row in anggaran_kegiatan">
            <td>@{{ row.kode_bidang }} @{{ row.kode_sub_bidang }} @{{ row.kode_kegiatan }}
            </td>
            <td>@{{ row.kegiatan }}</td>
            <td>@{{ row.lokasi }}</td>
            <td>@{{ row.waktu }}</td>
            <td>@{{ row.keluaran }}</td>
            <td>@{{ row.volume }}</td>
            <td>@{{ row.nama_lengkap }}</td>
            <td>@{{ formatRupiah(row.pagu) }}</td>
        </tr>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="6">Total Anggaran Kegiatan Tahun @{{tahun_aktif}}</td>
            <td class="text-center">:</td>
            <td class="text-center">@{{ formatRupiah(total) }}</td>
        </tr>
    </tfoot>

</table>
