<div class="modal fade" id="modalCreateShu" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelHeading"></h4>
            </div>
            <div class="modal-body">
                <form id="shuFormCreate" name="shuFormCreate" class="form-horizontal">
                    <input type="hidden" name="shu_id" id="shu_id">
                    <input type="hidden" name="bumdes_id" id="bumdes_id" value="{{Auth::user()->profil_bumdes_id}}">
                    <div class="form-group">
                        <div class="position-relative row form-group"><label class="col-sm-3 col-form-label" for="nama">Nilai</label>
                            <div class="col-sm-9"><input placeholder="Masukan Nilai" id="nilai" type="text" name="nilai" value="{{ old('nilai') }}" class="form-control">
                            </div>
                        </div>
                        <div class="position-relative row form-group"><label class="col-sm-3 col-form-label" for="nama">Tanggal</label>
                            <div class="col-sm-9"><input placeholder="Masukan Tanggal" type="date" name="tanggal" id="tanggal" value="{{ old('tanggal') }}" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary" id="saveShu" value="create"><i class="metismenu-icon pe-7s-paper-plane"></i> Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>