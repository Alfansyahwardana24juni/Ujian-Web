<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Buku</title>
    <!-- Menambahkan CSS Bulma dari CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
</head>

<body>
    <section class="section">
        <div class="container">
            <h1 class="title">Tambah Buku</h1>

            <!-- Form Tambah Buku -->
            <form action="{{ route('buku.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Judul Buku -->
                <div class="field">
                    <label class="label">Judul Buku</label>
                    <div class="control">
                        <input class="input" type="text" name="judul_buku" placeholder="Masukkan judul buku" required>
                    </div>
                </div>

                <!-- Pengarang -->
                <div class="field">
                    <label class="label">Pengarang</label>
                    <div class="control">
                        <input class="input" type="text" name="pengarang" placeholder="Masukkan nama pengarang"
                            required>
                    </div>
                </div>

                <!-- Jenis Buku -->
                <div class="field">
                    <label class="label">Jenis Buku</label>
                    <div class="control">
                        <input class="input" type="text" name="jenis_buku" placeholder="Masukkan jenis buku" required>
                    </div>
                </div>

                <!-- Tahun Terbit -->
                <div class="field">
                    <label class="label">Tahun Terbit</label>
                    <div class="control">
                        <input class="input" type="number" name="tahun_terbit" placeholder="Masukkan tahun terbit"
                            required>
                    </div>
                </div>

                <!-- Sampul Buku -->
                <div class="field">
                    <label class="label">Sampul Buku</label>
                    <div class="control">
                        <div class="file">
                            <label class="file-label">
                                <input class="file-input" type="file" name="sampul">
                                <span class="file-cta">
                                    <span class="file-icon">
                                        <i class="fas fa-upload"></i>
                                    </span>
                                    <span class="file-label">
                                        Pilih file…
                                    </span>
                                </span>
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Tombol Simpan -->
                <div class="field">
                    <div class="control">
                        <button type="submit" class="button is-primary">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </section>

    <!-- Menambahkan Font Awesome untuk ikon -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</body>

</html>