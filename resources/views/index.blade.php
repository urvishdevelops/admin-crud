<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Admin Crud</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    {{-- <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet"> --}}
    {{-- datatable cdn --}}
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" /> --}}
    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
</head>

<body>
    @include('navbar')
    @include('sidebar')
 
            @yield('form')
            @yield('dashboard')

    @include('footer')
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/chart.js/chart.umd.js"></script>
<script src="assets/vendor/echarts/echarts.min.js"></script>
<script src="assets/vendor/quill/quill.min.js"></script>
<script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
<script src="assets/vendor/tinymce/tinymce.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>


<script>
    $(document).ready(function() {

        $('#my-form').on('submit', function() {
            $.ajax({
                method: "POST",
                url: "{{ route('fakeapp.appview') }}",
                data: new FormData(this),
                processData: false,
                contentType: false,
                cache: false,
                success: function(data) {
                    $('#my-form')[0].reset();
                    $('#output').text(data.res);
                    datatable.ajax.reload();
                },

                error: function(e) {
                    console.log("error", e);
                }
            })

        })


        var datatable = $('.table').DataTable({
            serching: true,
            paging: true,
            pageLength: 10,
            ajax: {
                url: '/listing',
                type: 'GET',
                dataType: 'json',
            },
            columns: [{
                    data: 'id'
                },
                {
                    data: 'name'
                },
                {
                    data: 'downloads'
                },
                {
                    data: 'image'
                },
                {
                    data: 'action'
                },
            ]
        })


        $(document).on('click', '.edit', function() {
            let editId = $(this).attr('id');
            $.ajax({
                method: "POST",
                url: "{{ route('fakeapp.edit') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    'editId': editId,
                    'type': 'edit'
                },
                success: function(data) {
                    console.log(data);
                    $('#hidden_id').val(data[0].id);
                    // $('#hidden_img').val(data.img);
                    $('#name').val(data[0].name);
                    $('#downloads').val(data[0].downloads);
                },

                error: function(e) {
                    console.log("error", e);
                }
            })
        })

        $(document).on('click', '.delete', function() {
            let deleteId = $(this).attr('id');
            $.ajax({
                method: "POST",
                url: "{{ route('fakeapp.delete') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    'deleteId': deleteId
                },
                success: function(data) {
                    $('#output').text(data.res)
                    datatable.ajax.reload();
                },

                error: function(e) {
                    console.log("error", e);
                }
            })
        })


    })
</script>

</html>