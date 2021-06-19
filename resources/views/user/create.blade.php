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
                        <div class="position-relative row form-group"><label class="col-sm-2 col-form-label" for="nama">Nama</label>
                            <div class="col-sm-10"><input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan Nama" value="" maxlength="50" required="">
                                </div>
                        </div>
                        <div class="position-relative row form-group"><label class="col-sm-2 col-form-label" for="ttl">Email</label>
                            <div class="col-sm-10"><input type="text" class="form-control" id="email" name="email" placeholder="Masukan Nama" value="" maxlength="50" required="">
                                </div>
                        </div>
                        <div class="position-relative row form-group"><label class="col-sm-2 col-form-label" for="">Role</label>
                            <div class="col-sm-10">
                                <div>
                                    <div class="custom-radio custom-control custom-control-inline"><input type="radio" id="admin" value="admin" name="role" class="custom-control-input"><label class="custom-control-label"
                                        for="admin">Admin</label></div>
                                    <div class="custom-radio custom-control custom-control-inline"><input type="radio" id="bumdes" Value="bumdes" name="role" class="custom-control-input"><label class="custom-control-label"
                                        for="bumdes">Bumdes</label></div>
                                </div>
                            </div>
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