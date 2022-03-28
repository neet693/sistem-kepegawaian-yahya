@extends('layouts.induk')
@section('title', 'SKYPEG - Unit Kerja')
@section('konten')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            {{ $error }} <br />
                        @endforeach
                    </div>
                @endif
            </div>
        </div>

        <div class="card p-3">
            <!-- card -->

            <div class="table-responsive">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalTambah">
                    <i class="fa fa-plus"></i>
                </button>
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table table-bordered dataTable" id="dataTable" role="grid"
                            aria-describedby="dataTable_info" style="width: 100%;" width="100%" cellspacing="0">
                            <thead>
                                <tr role="row">
                                    <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1"
                                        colspan="1" style="width: 162px;" aria-sort="ascending"
                                        aria-label="Name: activate to sort column descending">Kode Unit Kerja</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                        colspan="1" style="width: 248px;"
                                        aria-label="Position: activate to sort column ascending">Nama Unit Kerja</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                        colspan="1" style="width: 248px;"
                                        aria-label="Position: activate to sort column ascending">Aksi</th>
                            </thead>
                            <tfoot>
                            </tfoot>
                            <tbody>
                                @foreach ($unit_kerja as $uky)
                                    <tr role="row" class="odd">
                                        <td>{{ $uky->kode_unitkerja }}</td>
                                        <td>{{ $uky->nama_unit }}</td>
                                        <td>
                                            <!-- Button trigger modal -->
                                            <!-- Button trigger modal -->
                                            <a href="/data/tmunitkerja/hapus/{{ $uky->kode_unitkerja }}"
                                                class="btn btn-danger"><i class="fa fa-trash"></i></a>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                    </div>
                </div>
            </div>

            <!-- end card -->
        </div>

    </div>

    <!-- Modal -->
    <div class="modal fade" id="ModalTambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Agama</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card p-3">
                        <form action="/data/tmunitkerja/tambah/proses" method="post">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Nama Unit</label>
                                    <input type="text" name="agama" class="form-control">
                                </div>
                            </div>

                            <div class="row m-3">
                                <input type="submit" value="Tambah" class="btn btn-success">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection
