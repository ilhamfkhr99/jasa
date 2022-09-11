@extends('master')
@section('title', 'data package')
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
                        <div class="dt-action-buttons text-xl-right text-lg-left text-md-right text-left d-flex align-items-center justify-content-lg-end align-items-center flex-sm-nowrap flex-wrap mr-1">
                            Search
                            <div id="DataTables_Table_0_filter" class="dataTables_filter">
                                <label>
                                    <input type="search" class="form-control" placeholder="" aria-controls="DataTables_Table_0">
                                </label>
                                <button type="button" class="btn btn-outline-success ml-1" data-toggle="modal" data-target="#tambah">
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
                            <th>Harga</th>
                            <th>Deskripsi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($packages as $row)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $row->title }}</td>
                            <td>{{ $row->price }}</a></td>
                            <td>{{ $row->desc }}</td>
                            {{-- <td>{{ $row->package_details->desc }}</td> --}}
                            <td>
                                <button type="button" class="btn btn-outline-primary edit" data-toggle="modal" data-dad="{{ $row }}"><i data-feather="edit"></i>Edit</button>
                                <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#hapus-{{ $row->id }}"><i data-feather="trash-2"></i>Hapus</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <nav aria-label="Page navigation example">
                    <ul class="pagination mt-2">
                        {{ $packages->links() }}
                    </ul>
                </nav>
            </div>
            <!-- Modal to add new user starts-->
            <!-- Modal to add new user Ends-->
        </div>
    </div>

        <!-- list section end -->
</section>
@endsection
<div class="modal fade text-left" id="tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel17">Tambah Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ url('packages-add') }}" class="form form-horizontal" method="post" senctype="multipart/form-data">
                @csrf
                <div class="card-body">
                      <div data-repeater-list="invoice">
                        <div data-repeater-item>
                          <div class="row d-flex align-items-end" id="form">
                            <div class="col-md-8 col-12">
                              <div class="form-group">
                                <label for="title">Judul</label>
                                <input type="text" class="form-control" id="title" name="title" aria-describedby="title" placeholder="Judul" />
                              </div>
                            </div>

                            <div class="col-md-4 col-12">
                              <div class="form-group">
                                <label for="price">Harga</label>
                                <input type="number" class="form-control" id="price" name="price" aria-describedby="price" placeholder="Harga" />
                              </div>
                            </div>
                            <div class="col-md-10">
                                <div class="form-group">
                                    <label for="desc">Deskripsi</label>
                                    <div id="inputFormRow"></div>
                                    <input type="text"class="form-control" id="desc" name="desc[]" aria-describedby="desc" placeholder="Deskripsi"/>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <button class="btn btn-outline-primary text-nowrap px-1" type="button" data-repeater-create onclick="addRow()" id="add">
                                        <i data-feather="plus" class="mr-25"></i>
                                            Add
                                    </button>
                                </div>
                            </div>
                            {{-- <div class="col-md-2 col-12">
                              <div class="form-group">
                                <button class="btn btn-outline-danger text-nowrap px-1" data-repeater-delete type="button">
                                  <i data-feather="x" class="mr-25"></i>
                                  <span>Delete</span>
                                </button>
                              </div>
                            </div> --}}

                          </div>
                          <div class="desc-loop"></div>
                          <hr />
                        </div>
                      </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary" id="simpan">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- <script>
    $(document).ready(function(){
        var id = 1;
        $('#add').click(function(e){
            e.preventDefault();
            id++;

            $('.form_dinamis').append(`
            <div class="col-md-10 col-12 desc-loop">
                <div class="form-group">
                    <label for="desc">Deskripsi</label>
                    <input type="text"class="form-control" id="desc" name="desc[]" aria-describedby="desc" placeholder="Deskripsi"/>
                </div>
            </div>`)
        })
    })
</script> --}}
<script>
    $('.edit').click(function (e) {
        e.preventDefault();
        console.log($(this).data(dad));
    });
    $('#simpan').on('click', function(){$(this).hide()});
    // var x = 1;

    function addRow() {
        var x = 1;
        // console.log(x);
        var row = '';
        // row += '<div class="row d-flex align-items-end-' + (x) + '">';
        row += '<div id="inputFormRow">';
        row += '<div class="row d-flex align-items-end-' + (x) + '">';
        // row += ' <div class="col-md-10 col-12">';
        row += ' <div class="col-md-10">';
        row += ' <div class="form-group">';
        row += '<input type="text"class="form-control" id="desc" name="desc[]" aria-describedby="desc" placeholder="Deskripsi">';
        row += '</div>';
        row += '</div>';

        // row += '<div class="col-md-2 col-12">';
        row += '<div class="col-md-2">';
        row += '<div class="form-group">';
        // row += '<button class="btn btn-outline-danger text-nowrap px-1" data-repeater-delete onclick="deleteRow(' + (x) + ')" type="button" >';
        row += '<button class="btn btn-outline-danger text-nowrap px-1" data-repeater-delete" type="button" id = "delete">';
        row += '<i data-feather="x" class="mr-25"></i>';
        row += '<span>Delete</span>';
        row += '</button>';
        row += '</div>';
        row += '</div>';

        row += '</div>';
        row += '</div>';

        // $('.desc-loop').append(`
        //                             <div class="form-group">
        //                               <label for="desc">Deskripsi</label>
        //                               <input type="text"class="form-control" id="desc" name="desc[]" aria-describedby="desc" placeholder="Deskripsi"/>
        //                             </div>

        // `);
        $('.desc-loop').append(row);

        // jQuery(function() {
        //     jQuery(document).trigger("enhance");
        // });
        // console.log(x);
        // x++;

        $(document).on('click', '#delete', function() {
            $(this).closest('#inputFormRow').remove();
        });
    }

    // function deleteRow(rowid) {
    //     console.log(rowid);
    //     $('.row d-flex align-items-end-' + rowid).remove();
    //     $('.row-' + rowid).remove();
    // }
    // $('body').on('click', '.remove', function() {
    //     $(this).parents('form-group').remove();
    // });
</script>
{{-- <script>
    var i = 0;
    $("#simpan").click(function () {
        ++i;
        $("#form").append('<input type="text" name="desc[' + i + ']" placeholder="Deskripsi" aria-describedby="desc" class="form-control" /><button type="button" class="btn btn-outline-danger text-nowrap px-1" data-repeater-delete><i data-feather="x" class="mr-25"></i></button>'
            );
    });
    $(document).on('click', '.remove-input-field', function () {
        $(this).parents('tr').remove();
    });
</script> --}}
