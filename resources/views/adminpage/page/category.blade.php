@extends('adminpage.layout.main')
@section('breadcrumb')
    <div class="pagetitle">
        <h1>Menu Pengguna</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">Category</li>
                <li class="breadcrumb-item"><a href="/homepage">Home</a></li>
            </ol>
        </nav>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addcategory"><i class="bi bi-plus-square"></i> Tambah Category</button>
    </div><!-- End Page Title -->
@endsection
@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Kategori</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- Kategori foreach start --}}
                                {{-- @dd($menu_categories) --}}
                                @foreach ($menu_categories as $ct)
                                    
                                    <tr>
                                        <th scope="row">{{ $ct->id }}</th>
                                        <td>{{ $ct->name }}</td>
                                        <td>
                                            <button type="button" value="{{ $ct->id }}" class="btn btn-warning editcategory" data-bs-toggle="modal" data-bs-target="#editcategory"><i class="bi bi-pencil-fill"></i></button>
                                            <button type="button" value="{{ $ct->id }}" class="btn btn-danger deleteCategoryBtn" data-bs-toggle="modal" data-bs-target="#deletecategory"><i class="bi bi-trash3"></i></button>
                                        </td>
                                    </tr>

                                @endforeach
                                {{-- Kategori foreach End --}}
                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->
                    </div>
                </div>

            </div>
        </div>
    </section>
    @include('adminpage.modal.category.addcategorymodal')
    @include('adminpage.modal.category.editcategorymodal')
    @include('adminpage.modal.category.deletecategorymodal')
@endsection
  
{{-- @section('script')
    <script>
        $(document).ready(function () {
            $(.deleteCategoryBtn).click(function (e) { 
                e.preventDefault();
                
                var category_id = $(this).val();
                $('#menu_category_id').val(menu_category_id);

                $('#deleteModal').modal('show');
            });
        });
    </script>
@endsection --}}