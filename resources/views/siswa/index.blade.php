<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>

    <div class="container mt-5">
        <h2>Daftar Siswa</h2>
        <p>Belajar Fetch API dengan Laravel</p>

        <form id="form-siswa" class="mt-4">
            <div class="mb-3">
                <label class="form-label">Nama Siswa</label>
                <input type="text" name="nama" class="form-control" placeholder="Masukkan nama siswa">
            </div>

            <div class="mb-3">
                <label class="form-label">Kelas</label>
                <input type="text" name="kelas" class="form-control" placeholder="Masukkan kelas">
            </div>

            <button type="submit" class="btn btn-primary">
                Tambah Siswa
            </button>

        </form>

        <table class="table table-bordered mt-4">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody id="tabel-siswa">
                <tr>
                    <td colspan="4" class="text-center">
                        Memuat data...
                    </td>
                </tr>
            </tbody>

        </table>
        
    </div>

    <script>
    let idSiswaEdit = null;
    function  tampilkanSiswa() {
        fetch('/data-siswa')
            .then(response => response.json())
            .then(data => {
                let tabel = document.getElementById('tabel-siswa');

                tabel.innerHTML = '';

                if (data.length === 0) {
                    tabel.innerHTML = `
                        <tr>
                            <td colspan="4" class="text-center">
                                Belum ada data siswa.
                            </td>
                        </tr>
                    `;
                } else {
                    data.forEach(siswa  => {
                        tabel.innerHTML += `
                            <tr>
                                <td>${siswa.id}</td>
                                <td>${siswa.nama}</td>
                                <td>${siswa.kelas}</td>
                                <td>
                                    <button class="btn btn-warning btn-sm" onclick="editSiswa(${siswa.id}, '${siswa.nama}', '${siswa.kelas}')">
                                        Edit
                                    </button>

                                    <button class="btn btn-danger btn-sm" onclick="hapusSiswa(${siswa.id})">
                                        Hapus
                                    </button>
                                </td>
                            </tr>
                        `;
                    });
                }
            })
            .catch(error => {
                console.error('Terjadi kesalahan: ', error);
            });   
    }
    tampilkanSiswa();

        document.getElementById('form-siswa').addEventListener('submit', function(e) {
            e.preventDefault();

            let formData = new FormData(this);
            
            let url = '/siswa';

            if (idSiswaEdit !== null) {
                url = `/siswa/${idSiswaEdit}`;
                formData.append('_method', 'PUT');
            }

            fetch (url, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json'
            },
            body: formData
        })
        .then(async response => {
            let result = await response.json();

            if (!response.ok) {
                if (response.status === 422) {
                    let pesan = Object.values(result.errors).flat().join('\n');
                    throw new Error(pesan);
                }
                throw new Error(result.message || 'Terjadi kesalahan');
            }

            return result;
        })
        .then(result => {
            alert(result.message);
            this.reset();
            resetModeEdit();
            tampilkanSiswa();
        })
        .catch(error => {
            alert(error.message);
            console.error('Terjadi kesalahan:', error);
        });
    });

    function editSiswa(id, nama, kelas) {
        idSiswaEdit = id;

        document.querySelector('input[name="nama"]').value = nama;
        document.querySelector('input[name="kelas"]').value = kelas;

        document.querySelector('#form-siswa button[type="submit"]').textContent = 'Simpan Perubahan';
    }

    function  resetModeEdit() {
        idSiswaEdit = null;

        document.querySelector('#form-siswa button[type="submit"]').textContent = 'Tambah Siswa';
    }

    function hapusSiswa(id) {

        let konfirmasi = confirm('Apakah kamu yakin ingin menghapus data ini?');

    if (!konfirmasi) {
        return;
    }

    fetch(`/siswa/${id}`, {
        method: 'DELETE',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Accept': 'application/json'
        }
    })
    .then(async response => {
        let result = await response.json();

        if (!response.ok) {
            throw new Error(result.message || 'Gagal menghapus data');
        }

        return result;
    })
    .then(result => {
        alert(result.message);
        tampilkanSiswa();
    })
    .catch(error => {
        alert(error.message);
        console.error('Terjadi kesalahan:', error);
    });
}
    </script>
    
</body>
</html>