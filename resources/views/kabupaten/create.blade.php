<div class="modal fade" id="modalCreateKab" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelHeading"></h4>
            </div>
            <div class="modal-body">
                <form id="kabFormCreate" name="kabFormCreate" class="form-horizontal">
                    <input type="hidden" name="kabupaten_id" id="kabupaten_id">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="main-card mb-3 card">
                                <div class="card-body">
                                <div id="googleMap" style="width:100%;height:200px;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="main-card mb-3 card">
                                <div class="card-body">
                                    <div class="position-relative row form-group"><label class="col-sm-4 col-form-label" for="nama">Kabupaten</label>
                                        <div class="col-sm-8"><input placeholder="Masukan Nama Kabupaten" type="text" name="nama" id="nama" value="{{ old('nama') }}" class="form-control">
                                            </div>
                                    </div>
                                    <div class="position-relative row form-group"><label class="col-sm-4 col-form-label" for="nama">Latitude</label>
                                        <div class="col-sm-8"><input placeholder="Masukan Latitude" type="text" name="lat" id="lat" value="{{ old('lat') }}" class="form-control">
                                            </div>
                                    </div>
                                    <div class="position-relative row form-group"><label class="col-sm-4 col-form-label" for="nama">Longitude</label>
                                        <div class="col-sm-8"><input placeholder="Masukan Longitude" type="text" name="long" id="long" value="{{ old('long') }}" class="form-control">
                                            </div>
                                    </div>
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn btn-primary" id="saveUser" value="create"><i class="metismenu-icon pe-7s-paper-plane"></i> Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAf7FALA_C8nQFFy1A8D6NWavSyS_rqIBc&callback=myMap"></script>   