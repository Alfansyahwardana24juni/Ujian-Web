<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Buku</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
    .card {
        transition: transform 0.2s, box-shadow 0.2s;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }

    .table th,
    .table td {
        vertical-align: middle;
    }

    .image img {
        border-radius: 5px;
    }

    .button.is-small {
        margin: 2px;
    }
    </style>
</head>

<body>
    <section class="section">
        <div class="container">
            <h1 class="title has-text-centered">Daftar Buku</h1>
            <div class="level">
                <div class="level-left">
                    <a href="{{ route('buku.create') }}" class="button is-primary">
                        <span class="icon">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span>Tambah Buku</span>
                    </a>
                </div>
            </div>

            <!-- Notifikasi Sukses -->
            @if(session('success'))
            <div class="notification is-success">
                <button class="delete"></button>
                {{ session('success') }}
            </div>
            @endif

            <!-- Tabel Daftar Buku -->
            <div class="table-container">
                <table class="table is-fullwidth is-hoverable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Judul Buku</th>
                            <th>Pengarang</th>
                            <th>Jenis Buku</th>
                            <th>Tahun Terbit</th>
                            <th>Sampul</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($buku as $b)
                        <tr>
                            <td>{{ $b->id_buku }}</td>
                            <td>{{ $b->judul_buku }}</td>
                            <td>{{ $b->pengarang }}</td>
                            <td>{{ $b->jenis_buku }}</td>
                            <td>{{ $b->tahun_terbit }}</td>
                            <td>
                                @if($b->sampul)
                                <figure class="image is-64x64">
                                    <img src="{{ Storage::url($b->sampul) }}" alt="Sampul Buku">
                                </figure>
                                @else
                                <span class="has-text-grey">Tidak ada sampul</span>
                                @endif
                            </td>
                            <td>
                                <!-- Tombol Aksi -->
                                <div class="buttons">
                                    <form action="{{ route('buku.destroy', $b->id_buku) }}" method="POST"
                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus buku ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="button is-danger is-small">
                                            <span class="icon">
                                                <i class="fas fa-trash"></i>
                                            </span>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <!-- Script untuk menghilangkan notifikasi -->
    <script>
    document.addEventListener('DOMContentLoaded', () => {
        (document.querySelectorAll('.notification .delete') || []).forEach(($delete) => {
            const $notification = $delete.parentNode;

            $delete.addEventListener('click', () => {
                $notification.parentNode.removeChild($notification);
            });
        });
    });
    </script>
</body>

</html>