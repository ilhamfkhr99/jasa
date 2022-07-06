@extends('master')
@section('title', 'data karyawan')
@section('content')
<section class="app-user-list">
    <!-- users filter start -->
    <div class="card">
      <h5 class="card-header">Search Filter</h5>
      <div class="d-flex justify-content-between align-items-center mx-50 row pt-0 pb-2">
        <div class="col-md-4 user_role"></div>
        <div class="col-md-4 user_plan"></div>
        <div class="col-md-4 user_status"></div>
      </div>
    </div>
    <!-- users filter end -->
    <!-- list section start -->
    <div class="card">
      <div class="card-datatable table-responsive pt-0">
        <div id = "DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
            <div class="d-flex justify-content-between-align-items-center header-action mx-1 row mt-75">
                <div class="col-lg-12 col-xl-6">
                    <div id = "DataTables_Table_0_length" class="dataTables_length">
                        <label>
                            show
                            <select class="custom-select form-control" name="DataTables_Table_0_length" class="dataTables_length">
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>
                            entries
                        </label>
                    </div>
                </div>
                <div class="co-lg-12 col-xl-6 pl-xl-75 pl-0">
                    <div class="dt-action-buttons text-xl-right text-lg-left text-md-right text-left d-flex align-items-center justify-content-lg-end align-items-center flex-sm-nowrap flex-wrap mr-1">
                        {{-- <div class=""> --}}
                                Search
                        <div id="DataTables_Table_0_filter" class="dataTables_filter">
                            <label>
                                <input type="search" class="form-control" placeholder="" aria-controls="DataTables_Table_0">
                            </label>
                            <button type="button" class="btn btn-outline-success ml-1" data-toggle="modal" data-target="#tambah">
                                <i data-feather="plus"></i> Tambah Data
                            </button>
                        </div>
                        {{-- </div> --}}

                        {{-- <div class="dt-buttons btn-group flex-wrap">
                            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#tambah">
                                Tambah Data
                            </button>
                        </div> --}}
                    </div>
                </div>
            </div>
        <table class="user-list-table table">
          <thead class="thead-light">
            <tr>
                <th>No</th>
                <th>Nama Category</th>
                <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($category as $row)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $row->name }}</td>
                <td>
                    <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#edit-{{ $row->id }}"><i data-feather="edit"></i>Edit</button>
                    <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#hapus-{{ $row->id }}"><i data-feather="trash-2"></i>Hapus</button>
                </td>
            </tr>
            @endforeach
        </tbody>
        </table>
      </div>
      <!-- Modal to add new user starts-->
      <!-- Modal to add new user Ends-->
    </div>

    <!-- list section end -->
  </section>
@endsection

<div class="modal fade text-left" id="tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel17">Tambah Data Category</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ url('category-add') }}" class="form form-horizontal" method="post" >
                @csrf
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group row">
                            <div class="col-sm-3 col-form-label">
                                <label for="first-name">Nama Category</label>
                            </div>
                            <div class="col-sm-7">
                                <input type="text" id="name" class="form-control" name="name" value="{{ old('name') }}" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>

@foreach ($category as $row)
<div class="modal fade text-left" id="edit-{{ $row->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel17">Edit Data</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="{{ url('category-update') }}" class="form form-horizontal" method="post" >
            @method('patch')
            @csrf
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group row">
                            <div class="col-sm-3 col-form-label">
                                <label for="first-name">Nama Category</label>
                            </div>
                            <div class="col-sm-7">
                                <input type="hidden" id="id" name="id" value="{{ $row->id}}">
                                <input type="text" id="name" class="form-control" name="name" value="{{ $row->name }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
        </form>
      </div>
    </div>
</div>
@endforeach

@foreach ($category as $row)
{{-- <div class="modal fade text-left" id="hapus-{{ $row->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel17">Yakin Dihapus ?</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="{{ $row->id }}" class="form form-horizontal" method="post" >
            @method('delete')
            @csrf
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                <button type="submit" class="btn btn-danger">Ya</button>
            </div>
        </form>
      </div>
    </div>
</div> --}}
<div class="modal fade text-left" id="hapus-{{ $row->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel17">Yakin Dihapus ?</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ $row->id }}" class="form form-horizontal" method="post" >
                {{-- @method('delete') --}}
                @csrf
                @method('delete')
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                <button type="submit" class="btn btn-danger">Ya</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endforeach
