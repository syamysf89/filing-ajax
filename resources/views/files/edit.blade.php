<div class="form-group">
    <label>No Fail : </label>
    <input type="text" name="no_fail" id="no_fail" value="{{ $fail->no_fail }}" placeholder="Sila Masukkan No Fail"
        class="form-control">
</div>
<div class="form-group">
    <br>
    <label>Nama Fail :</label>
    <input type="text" name="nama_fail" id="nama_fail" value="{{ $fail->nama_fail }}"
        placeholder="Sila Masukkan Nama Fail" class="form-control">
    <br>
</div>

<div class="form-group col-sm-4">
    <label>Tarikh Buka :</label>
    <input type="date" namee="tarikh_buka" id="tarikh_buka" value="{{ $fail->tarikh_buka }}" class="form-control">
</div>
<h6>* Click calender icon to select</h6>
<br>

<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
    <button class="btn btn-success" onClick="update({{ $fail->id }});window.location.reload();">Kemaskini</button>
</div>