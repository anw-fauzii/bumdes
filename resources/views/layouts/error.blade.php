@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<div class="position-relative row form-group"><label class="col-sm-2 col-form-label" for="nasa">Nasabah</label>
                            <div class="col-sm-10">
                                <select name="nasabah_id" id="nasabah_id" type="select"  class="custom-select" class="form-control">
                                    <option disable="true" selected="true" disabled>--- Pilih Nasabah ---</option>
                                    @foreach ($nasabah as $row)
                                        <option value="{{ $row->id }}">{{ ucfirst($row->nik) }} - {{ ucfirst($row->user->name) }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>