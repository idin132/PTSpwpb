@section('content')

<br>
<div class="d-flex justify-content-center">
<div class="card" style="width: 70rem;">
<div class="container">
    <div class="text-center">
        <br><br>
        <h3>Karyawan</h3>
    </div>
        <br>
        <a href="{{route('kartusip.create')}}" class="btn btn-success">+</a>
        <br><br>
        <table class="table table-striped ">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NIP</th>
                    <th>NIK</th>
                    <th>Jenis Kelamin</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>Telpon</th>
                    <th>Agama</th>
                    <th>Status Nikah</th>
                    <th>Alamat</th>
                    <th>Golongan Id</th>
                    <th>Foto</th>
                </tr>
            </thead>
            @foreach ($kartur as $key=>$kartu)
            <tbody>
                <tr>
                    <td>{{$kartu->id}}</td>
                    <td>{{$kartu->nip}}</td>
                    <td>{{$kartu->nama}}</td>
                    <td>{{$kartu->alamat}}</td>
                    <td>{{$kartu->lahir}}</td>
                    <td>{{$kartu->nik}}</td>
                    <td>{{$kartu->fasilitas}}</td>
                    <td>


                        <form action="{{route ('kartusip.destroy', $kartu->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                  <i class="fas fa-solid fa-trash"></i>
                                </button>
                              </form>

                        <a href="{{route('kartusip.show', $kartu->id)}}" class="btn btn-primary bi bi-card-text"></a>
                            <a href="{{route ('kartusip.edit', $kartu->id)}}" class="btn btn-warning">
                                <i class="fas fa-solid fa-pen"></i>
                              </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
</div>
</div>
</div>
<script>
    
</script>
    
@endsection
