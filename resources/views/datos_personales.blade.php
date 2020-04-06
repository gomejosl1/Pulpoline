@extends ('layouts.app')
@section('content')

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">{{ __('Register') }}</div>
        <div class="card-body">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Cedula</th>
                        <th>Correo</th>
                        <th>Fecha de creacion</th>
                        <th>Fecha de ultima actualizacion</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach ($user as $users)
                    <tr>                      
                        <td>{{ $users->name }}</td>
                        <td>{{ $users->cedula }}</td>
                        <td>{{ $users->email }}</td>
                        <td>{{ $users->created_at }}</td>
                        <td>{{ $users->updated_at }}</td>                        
                    </tr>
                  @endforeach                    
                </tbody>
            </table>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>       
@extends('layouts.footer')
    <script type="text/javascript">
$(document).ready(function() {
  $('#example').DataTable({
    "language": {
      "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
    }
  });
});
    </script>
