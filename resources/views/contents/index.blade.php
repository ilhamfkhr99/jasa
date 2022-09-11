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
            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                <div class="d-flex justify-content-between-align-items-center header-action mx-1 row mt-75">
                    <div class="col-lg-12 col-xl-6">
                        <div id="DataTables_Table_0_length" class="dataTables_length">
                            <label>
                                show
                                <select class="custom-select form-control" name="DataTables_Table_0_length"
                                    class="dataTables_length">
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
                        <div
                            class="dt-action-buttons text-xl-right text-lg-left text-md-right text-left d-flex align-items-center justify-content-lg-end align-items-center flex-sm-nowrap flex-wrap mr-1">
                            Search
                            <div id="DataTables_Table_0_filter" class="dataTables_filter">
                                <label>
                                    <input type="search" class="form-control" placeholder=""
                                        aria-controls="DataTables_Table_0">
                                </label>
                                <button type="button" class="btn btn-outline-success ml-1" data-toggle="modal"
                                    data-target="#tambah">
                                    <i data-feather="plus"></i> Tambah Data
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <table class="user-list-table table">
                    <thead class="thead-light">
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Kategori</th>
                            <th>Gambar</th>
                            <th>Deskripsi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($contents as $row)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $row->title }}</td>
                            <td>{{ $row->category->name }}</td>
                            {{-- <td><a href="{{ url('images/'.$row->file->image) }}">{{ $row->file->image }}</a></td>
                            --}}
                            <td>
                                @foreach ($row->file as $gambar)
                                <a href="{{ url('images/'.$gambar->image) }}">{{ $gambar->image }}</a><br>
                                @endforeach
                            </td>
                            {{-- <td><img src="{{ url('images/'.$row->file->image) }}" class="card-img-top" width="10"
                                    alt="..."></td> --}}
                            <td>{{ $row->desc }}</td>
                            <td>
                                <button type="button" class="btn btn-outline-primary" data-toggle="modal"
                                    data-target="#edit-{{ $row->id }}"><i data-feather="edit"></i>Edit</button>
                                <button type="button" class="btn btn-outline-danger" data-toggle="modal"
                                    data-target="#hapus-{{ $row->id }}"><i data-feather="trash-2"></i>Hapus</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <nav aria-label="Page navigation example">
                    <ul class="pagination mt-2">
                        {{ $contents->links() }}
                    </ul>
                </nav>
                {{-- @if ($contents->hasPages())
                    <nav>
                        <ul class="pagination">
                            <!-- Previous Page Link -->
                            @if ($contents->onFirstPage())
                                <li class="page-item disabled" aria-disabled="true">
                                    <span class="page-link">@lang('pagination.previous')</span>
                                </li>
                            @else
                                <li class="page-item">
                                    <a class="page-link" href="{{ $contents->previousPageUrl() }}" rel="prev">@lang('pagination.previous')</a>
                                </li>
                            @endif

                            <!-- Next Page Link -->
                            @if ($contents->hasMorePages())
                                <li class="page-item">
                                    <a class="page-link" href="{{ $contents->nextPageUrl() }}" rel="next">@lang('pagination.next')</a>
                                </li>
                            @else
                                <li class="page-item disabled" aria-disabled="true">
                                    <span class="page-link">@lang('pagination.next')</span>
                                </li>
                            @endif
                        </ul>
                    </nav>
                @endif --}}
            </div>
            <!-- Modal to add new user starts-->
            <!-- Modal to add new user Ends-->
        </div>
    </div>
        <!-- list section end -->
</section>
@endsection

<div class="modal fade text-left" id="tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel17">Tambah Data Users</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ url('contents-add') }}" class="form form-horizontal" method="post"
                enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group row">
                                <div class="col-sm-3 col-form-label">
                                    <label for="first-name">Judul</label>
                                </div>
                                <div class="col-sm-7">
                                    <input type="text" id="title" class="form-control" name="title" value="{{ old('title') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-3 col-form-label">
                                    <label for="first-name">Kategori</label>
                                </div>
                                <div class="col-sm-7">
                                    {{-- <input type="text" id="title" class="form-control" name="title" value="{{ old('title') }}"> --}}
                                    <select name="category_id" id="category_id" class="form-control">
                                        <option>-Pilih Kategori</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group row">
                                <div class="col-sm-3 col-form-label">
                                    <label for="first-name">Gambar</label>
                                </div>
                                <div class="col-sm-7">
                                    {{-- <input type="hidden" id="content_id" class="form-control" name="content_id" value="{{ old('content_id') }}"> --}}
                                    {{-- <input type="file" class="form-control" name="image[]" multiple accept="image/*"> --}}
                                    <input type="file" class="form-control" name="image[]" multiple>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group row">
                                <div class="col-sm-3 col-form-label">
                                    <label for="first-name">Deskripsi</label>
                                </div>
                                <div class="col-sm-7">
                                    {{-- <input type="text" id="password" class="form-control" name="password"
                                        value="{{ old('password') }}"> --}}
                                    <textarea name="desc" id="desc" class="form-control"></textarea>
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

@foreach ($contents as $row)
<div class="modal fade text-left" id="edit-{{ $row->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel17">Edit Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ url('contents-update') }}" class="form form-horizontal" method="post"
                enctype="multipart/form-data">
                @method('patch')
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group row">
                                <div class="col-sm-3 col-form-label">
                                    <label for="first-name">Judul</label>
                                </div>
                                <div class="col-sm-7">
                                    <input type="hidden" id="id" name="id" value="{{ $row->id }}">
                                    {{-- <input type="hidden" id="content_id" name="content_id" value="{{ $row->content_id }}"> --}}
                                    <input type="text" id="title" class="form-control" name="title" value="{{ $row->title }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-3 col-form-label">
                                    <label for="first-name">Kategori</label>
                                </div>
                                <div class="col-sm-7">
                                    <select name="category_id" id="category_id" class="form-control">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group row">
                                <div class="col-sm-3 col-form-label">
                                    <label for="first-name">Gambar</label>
                                </div>
                                <div class="col-sm-7">
                                    {{-- <input type="hidden" id="content_id" name="content_id" value="{{ $row->file->content_id }}"> --}}
                                    @foreach ($row->file as $gambar)
                                        {{-- <input type="hidden" class="form-control" name="id" value="{{ $gambar->id }}"> --}}
                                        <input type="file" class="form-control" name="image[]" value="{{ $gambar->image }}" multiple><br>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group row">
                                <div class="col-sm-3 col-form-label">
                                    <label for="first-name">Deskripsi</label>
                                </div>
                                <div class="col-sm-7">
                                    {{-- <input type="text" id="password" class="form-control" name="password"
                                        value="{{ old('password') }}"> --}}
                                    <textarea name="desc" id="desc" class="form-control">{{ $row->desc }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
                {{--
        </div> --}}
        </form>
    </div>
</div>
</div>
@endforeach

@foreach ($contents as $row)
<div class="modal fade text-left" id="hapus-{{ $row->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel17">Yakin Dihapus ?</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ $row->id }}" class="form form-horizontal" method="post">
                @method('delete')
                @csrf
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                    <button type="submit" class="btn btn-danger">Ya</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach
