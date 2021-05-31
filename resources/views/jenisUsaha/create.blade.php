<div class="modal fade" id="modalCreateJenisUsaha" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelHeading"></h4>
            </div>
            <div class="modal-body">
                <form id="jenisUsahaFormCreate" name="jenisUsahaFormCreate" class="form-horizontal">
                    <input type="hidden" name="jenis_id" id="jenis_id">
                    <div class="form-group">
                        <label for="name" class="col-sm-5 control-label">Jenis Usaha</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan Jenis Usaha" value="" maxlength="50" required="">
                        </div>
                    </div>
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary" id="saveJenisUsaha" value="create"><i class="metismenu-icon pe-7s-paper-plane"></i> Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>