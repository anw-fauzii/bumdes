<div class="modal fade" id="modalCreateUser" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelHeading"></h4>
            </div>
            <div class="modal-body">
                <form id="userFormCreate" name="userFormCreate" class="form-horizontal">
                    <input type="hidden" name="user_id" id="user_id">
                    <div class="form-group">
                        <label for="name" class="col-sm-5 control-label">Jenis Usaha</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Masukan Jenis Usaha" value="" maxlength="50" required="">
                        </div>
                        <label for="name" class="col-sm-5 control-label">Jenis Usaha</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="email" name="email" placeholder="Masukan Jenis Usaha" value="" maxlength="50" required="">
                        </div>
                    </div>
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary" id="saveUser" value="create"><i class="metismenu-icon pe-7s-paper-plane"></i> Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>