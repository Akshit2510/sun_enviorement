@extends('layouts.app')
@section('content')
<div class="layout-px-spacing">

    <div class="middle-content container-xxl p-0">
        <!-- BREADCRUMB -->
        <div class="page-meta">
            <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home Page</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Category</li>
                </ol>
            </nav>
        </div>
        <!-- /BREADCRUMB -->
        <div class="row page-meta">
            
             @include('partial.message')
            
            <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
                <a href="{{ route('category.create') }}" class="btn btn-primary mr-2"> Add </a>
            </div>
            
            <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
                <div class="statbox widget box box-shadow">
                    <div class="widget-content widget-content-area">
                        
                        <table id="banner_table" class="table zero-config">
                            <thead>
                                <tr>
                                    <th>No #</th>
                                    <th>Title</th>
                                    <th>Main Category</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection
@section('styles')
<link href="{{ asset('backend_assets/src/assets/css/light/components/modal.css')}}" rel="stylesheet" type="text/css" />
<link href="{{ asset('backend_assets/src/assets/css/dark/components/modal.css')}}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="{{ asset('backend_assets/src/plugins/src/table/datatable/datatables.css')}}">
    
<link rel="stylesheet" type="text/css" href="{{ asset('backend_assets/src/plugins/css/light/table/datatable/dt-global_style.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('backend_assets/src/plugins/css/dark/table/datatable/dt-global_style.css')}}">    
<style>
.ck-editor__editable_inline {
    min-height: 200px;
}
</style>
@endsection
@push('scripts')
<!-- Add this jQuery code within a <script> tag at the end of your Blade template -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script src="{{ asset('backend_assets/src/plugins/src/table/datatable/datatables.js')}}"></script>
    <script>
        $(document).ready(function() {
           
            $(document).on('click', '.categoryDeleteBtn', function(e) {
                emptyError();
                e.preventDefault(); // Prevent the default link behavior
                var svgElement = loaderSVG();
                $(this).html(svgElement);
                console.log(this);
                var $btn = $(this);
                var itemId = $(this).attr('id'); // Get the ID of the item to delete
                var deleteUrl = '{{ route("delete.category", ":itemId") }}'; // URL template
                // Replace the placeholder with the actual item ID
                deleteUrl = deleteUrl.replace(':itemId', itemId);
                // Send an AJAX request to delete the banner image
                $.ajax({
                    url: deleteUrl,
                    type: 'DELETE',
                    data: {
                        '_token': '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if (response.success) {
                            // Remove the corresponding table row
                            toastr.success('Category Deleted successfully');
                            // $('.alert-danger').text('Image Deleted successfully').show();
                            dataTable.ajax.reload();
                            // $btn.closest('tr').remove(); 
                        } else {
                            // Handle unsuccessful response if needed
                            toastr.error('Deletion failed');
                            $('.alert-danger').text('Deletion failed').show();
                        }
                    },
                    error: function(xhr, status, error) {
                        // Handle error
                        console.error(error);
                    }
                });
            });
        });
        function loaderSVG(){
            return '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-loader spin me-2"><line x1="12" y1="2" x2="12" y2="6"></line><line x1="12" y1="18" x2="12" y2="22"></line><line x1="4.93" y1="4.93" x2="7.76" y2="7.76"></line><line x1="16.24" y1="16.24" x2="19.07" y2="19.07"></line><line x1="2" y1="12" x2="6" y2="12"></line><line x1="18" y1="12" x2="22" y2="12"></line><line x1="4.93" y1="19.07" x2="7.76" y2="16.24"></line><line x1="16.24" y1="7.76" x2="19.07" y2="4.93"></line></svg>';
        }
        function emptyError(){
            $('.alert-success').hide();
            $('.alert-danger').hide();
            $('.btn-loader').hide();
        }
        var dataTable = $('.zero-config').DataTable({
            "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'l><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" +
            "<'table-responsive'tr>" +
            "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
                "oLanguage": {
                    "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                    "sInfo": "Showing page _PAGE_ of _PAGES_",
                    "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                    "sSearchPlaceholder": "Search...",
                "sLengthMenu": "Results :  _MENU_",
            },
            "stripeClasses": [],
            "lengthMenu": [10, 20, 50,100],
            "pageLength": 10,
            drawCallback: function () {
                var dtTooltip = document.querySelectorAll('.t-dot');
                for (let index = 0; index < dtTooltip.length; index++) {
                    var tooltip = new bootstrap.Tooltip(dtTooltip[index], {
                        template: '<div class="tooltip status rounded-tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner"></div></div>',
                        title: `${dtTooltip[index].getAttribute('data-original-title')}`
                    })
                }
                $('.dataTables_wrapper table').removeClass('table-striped');
            },
            "processing": true,
            "serverSide": true,
            "ajax": "{{ route('categorydata') }}",
            "columns": [
                { "data": "id" },
                { "data": "title" },
                { "data": "sub_category" },
                { "data": "status" },
                { "data": "action" }
            ],
        });
                
    </script>
    
@endpush