<form action="{{ route('schedules.service.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>Nama Poli</label>
        <input type="text" name="nama_poli" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Deskripsi</label>
        <textarea name="deskripsi" class="form-control" required></textarea>
    </div>
    <button type="submit" class="btn btn-success">Simpan</button>
</form>