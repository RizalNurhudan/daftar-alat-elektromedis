<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"><meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Alat</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"></head>
<body style="background: lightgray">
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow rounded">
                <div class="card-body">
                    <a href="{{ route('alats.create') }}" class="btn btn-md btn-successmb-3">TAMBAH ALAT</a>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">FOTO ALAT</th>
                            <th scope="col">HARGA</th>
                            <th scope="col">NAMA ALAT</th>
                            <th scope="col">ACTION</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse ($alats as $alat)
                            <tr>
                                <td class="text-center">
                                    <img src="{{ Storage::url('public/alats/') . $alat->foto_alat }}" class="rounded-circle" style="width: 80px; height: 85px">

                                </td>
                                <td>{{ $alat->harga }}</td>
                                <td>{{ $alat->nama_alat}}</td>
                                <td class="text-center">
                                    <form onsubmit="return confirm('Apakah Anda Yakin?');"action="{{ route('alats.destroy', $alat->id) }}" method="POST"><a href="{{ route('alats.edit', $alat->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-smbtn- danger">HAPUS</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <div class="alert alert-danger">
                                Data Alat Belum Tersedia. </div>
                        @endforelse
                        </tbody>
                    </table>
                    {{ $alats->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
<script
    src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script><script
    src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script
    src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script><script>
    //message with toastr
    @if(session()->has('success'))
    toastr.success('{{ session('success') }}', 'BERHASIL!');
    @elseif(session()->has('error'))
    toastr.error('{{ session('error') }}', 'GAGAL!');
    @endif
</script>
</body>
</html>
