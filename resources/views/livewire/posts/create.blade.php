<div class="container my-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow-sm rounded">
                <div class="card-body">
                    <form wire:submit="store" enctype="multipart/form-data">
                        <div class="form-group mb-4">
                            <label>GAMBAR</label>
                            <input type="file" class="form-control @error("image") is-invalid @enderror" wire:model="image">

                            @error("image")
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group mb-4">
                            <label>JUDUL</label>
                            <input type="text" class="form-control @error("title") is-invalid @enderror" wire:model="title" placeholder="Masukan Judul Post">

                            @error("image")
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group mb-4">
                            <label>KONTEN</label>
                            <textarea class="form-control @error("content") is-invalid @enderror" wire:model="content" placeholder="Masukan Konten Post"></textarea>
                            @error("image")
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                        <button type="reset" class="btn btn-md btn-warning">RESET</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>