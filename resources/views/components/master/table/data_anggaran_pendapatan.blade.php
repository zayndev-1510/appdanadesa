<table datatable="ng" class="table table-bordered table-jabatan">
    <thead class="bg-light" style="font-size: 12px;">
        <tr class="text-center">
            <th>Kode Rincian</th>
            <th>Nama Rincian</th>
            <th>Anggaran</th>
        </tr>
    </thead>
    <tbody style="font-size: 12px">
        <tr class="text-center" ng-repeat="row in rap">
            <td>
                <p class="margin-table-top">@{{ row.kode_kelompok }}
                    @{{ row.kode_jenis }}
                    @{{ row.kode_objek }}</p>
            </td>
            <td>
                <p class="margin-table-top">@{{ row.rincian }}</p>
            </td>
            <td>
                <p class="margin-table-top">@{{ row.anggaran | currency: "Rp. ": 0 }} </p>
            </td>

        </tr>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="1">Total Anggaran Pendapatan Tahun
                @{{ tahun_aktif }}</td>
            <td class="text-center">:</td>
            <td class="text-center">@{{ formatRupiah(totalrap) }}</td>
        </tr>
    </tfoot>
</table>
