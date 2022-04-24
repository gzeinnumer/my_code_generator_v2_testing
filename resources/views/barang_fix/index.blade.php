<html>

<head>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

  <!-- data tables -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" />

  <style>
    .tableDatatables {
      border: grey solid 0px !important;
    }

    .tableDatatables th {
      border: grey solid 0px !important;
    }

    .tableDatatables td {
      border: grey solid 0px !important;
    }

    .pagination>li>a,
    .pagination>li>span {
      padding: 6px;
      background-color: #e9ecef;
      color: black;
      text-decoration: none;
      text-transform: uppercase;
      border-radius: 5px;
      margin-left: 2px;
      margin-right: 2px;
      min-width: 500px;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="row p-2">
      @include('barang.add')
      @include('barang.find')
      @include('barang.edit')
      @include('barang.delete')
    </div>


    <table class="table  table-striped tableDatatables" id="myDatatable" style="width: 100%;">
      <thead>
        <tr>
          <th>No</th>
          <th>Name</th>
          <th>Created at</th>
          <th>Updated at</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
      </tbody>
    </table>

    <br>
    <br>

    <div class="row">
      @if(session('sukses'))
      <div class="alert alert-success" role="alert">
        {{session('sukses')}}
      </div>
      @endif
      <table class="table table-striped">
        <thead class="thead-dark">
          <tr>
            <th>Name</th>
            <th>Created at</th>
            <th>Updated at</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($data as $d)
          <tr>
            <td>{{$d->name}}</td>
            <td>{{$d->created_at}}</td>
            <td>{{$d->updated_at}}</td>
            <td>
              <a href="/barang/find/{{$d->id}}" class="btn btn-info btn-sm">Detail</a>
              <a href="/barang/find_update/{{$d->id}}" class="btn btn-warning btn-sm">Edit</a>
              <a href="/barang/find_delete/{{$d->id}}" class="btn btn-danger btn-sm">Delete</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

  <!-- data tables -->
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap.min.js"></script>

  <script type="text/javascript">
    $(function() {
      var table = $('#myDatatable').DataTable({
        processing: true,
        serverSide: true,
        autowidth: false,
        // dom: 'lfrtip',
        dom: "<'row' <'row' <'col-md-auto'l> <'col'><'col-md-auto'f>> <'row'rt> <'row' <'col'i> <'col'> <'col'p>> >",
        ajax: "{{ route('barang.data') }}",
        columns: [{
            data: 'DT_RowIndex',
            name: 'DT_RowIndex',
            orderable: false,
            searchable: false,
            width: '50px'
          },
          {
            data: 'name',
            name: 'name'
          }, {
            data: 'created_at',
            name: 'created_at',
            width: '160px'
          }, {
            data: 'updated_at',
            name: 'updated_at',
            width: '160px'
          },
          {
            data: 'action',
            name: 'action',
            orderable: false,
            searchable: false,
            width: '180px'
          },
        ],
        language: {
          paginate: {
            next: '&#8594;', // or '→'
            previous: '&#8592;', // or '←' 
          }
        }
      });
    });
  </script>
  <!-- end data tables -->

</body>

</html>