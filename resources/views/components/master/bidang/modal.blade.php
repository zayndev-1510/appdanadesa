<div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">@{{ket}}</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div class="form-item">
                    <input type="text" class="bidang forms-label">
                    <label for="jenis">Kode Bidang</label>
                    <p class="poppins"><small style="color: red"> * </small> Wajib Di Isi</p>
                </div>
                <div class="form-item">
                    <input type="text" class="bidang forms-label">
                    <label for="jenis">Bidang</label>
                    <p class="poppins"><small style="color: red"> * </small> Wajib Di Isi</p>
                </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-success" ng-hide="aksi" ng-click="saveBidang()"><i class="ti-save"></i> SIMPAN</button>
                <button type="button" class="btn btn-success" ng-show="aksi" ng-click="updateBidang()"><i class="ti-save"></i> PERBARUI</button>
                <button type="button" class="btn btn-danger"data-dismiss="modal"><i class="ti-close"></i> BATAL</button>
            </div>

        </div>
    </div>
</div>
