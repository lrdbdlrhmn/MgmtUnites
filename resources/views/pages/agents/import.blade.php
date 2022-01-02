@extends('layout.master')

@push('plugin-styles')
<link href="{{ asset('datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{ asset('css/mdb.min.css')}}" rel="stylesheet">
<link href="{{ asset('css/select2.min.css')}}" rel="stylesheet">

<link href="{{ asset('css/master.css')}}" rel="stylesheet">


@endpush

@section('content')
  <div class="row align-items-center justify-content-center">
    <div class="col-lg-6 grid-margin stretch-card">
      <div class="card shadow mb-4">
        <div class="card-body">
        <h4>Importation</h4>
        <form action="{{ url('agents/store') }}" method="POST" enctype="multipart/form-data">
          {{ csrf_field() }}
        <div class="form-group" style="margin-top: 30px">
          <label class="form-label" for="excel">Selectionnez une unité</label>
          <select class="unite form-control" name="unite"
            id="unite">
            @foreach ($unites as $unite)
            <option value="{{ $unite->id }}">{{ $unite->libelle}}</option>
            @endforeach   
          </select>
        </div>
        <div class="form-group">
          <label class="form-label" for="excel">Selectionnez un fichier Excel</label>
          <input type="file" class="form-control" id="excel" name="excel" />
        </div>
        <button type="submit" class="btn btn-primary">Enregistrer</button>
        </form>
</div>
</div>
</div>
</div>
<!--
<div class="container-fluid">

  <h1 class="h3 mb-2 text-gray-800">Gestion de Matériels</h1>

  <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card shadow mb-4">
        <div class="card-body">
          <h4>Matériels Militaire</h4>
          <hr>
          <div class="table-responsive">
              <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row"><div class="col-sm-12">
                  <table class="table table-hover dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                  <thead>
                      <tr role="row"><th class="sorting sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 55px;">ID</th>
                        <th class="sorting sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 55px;">Libelle</th>
                      </tr></thead>
                  <tfoot>
                      <tr><th rowspan="1" colspan="1">ID</th><th rowspan="1" colspan="1">Libelle</th>
                      </tr>
                  </tfoot>
                  <tbody>
                  <tr class="odd">
                          <td class="sorting_1">Ax01013I</td>
                          <td>Toyota S1020</td>
                          
                      </tr></tbody>
              </table></div></div>
                        </div>
          </div>
      </div>
  </div>
    </div>
  </div>
</div>
-->
<div class="container-fluid">

 
  <!-- table importations !-->
  <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card shadow mb-4">
        <div class="card-body">
          <h4>Historique d'Importation</h4>
          <hr>
          <div class="table-responsive">
              <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row"><div class="col-sm-12">
                  <table class="table table-hover dataTable" id="dataTable1" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                  <thead>
                      <tr role="row"><th class="sorting sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 55px;">ID</th><th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 61px;">Utilisateur</th><th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 48px;">Date</th>
                      </tr>
                      </thead>
                  
                  <tbody>
                  <tr class="odd">
                          <td class="sorting_1">401</td>
                          <td>Ali</td>
                          <td>10-01-2022 19:00</td>
                          
                      </tr></tbody>
              </table></div></div>
                        </div>
          </div>
      </div>
  </div>
    </div>
  </div>
</div>


@endsection

@push('plugin-scripts')

    <script src="{{ asset('/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('/datatables/datatables-demo.js')}}"></script>
    <script src="{{ asset('js/select2.min.js')}}"></script>
    <script src="{{ asset('js/toastr.min.js')}}"></script>

@endpush

@push('custom-scripts')
<script>
  @if(Session::has('error'))
  toastr.error("{{ session('error') }}");
  @endif
</script>
<script>
    @if(Session::has('status'))
        toastr.success("{{ Session::get('status') }}");
    @endif
</script>
<script>
  $(document).ready(function() {
      $('.materiel').select2();
      $('.unite').select2(); 
      $('.qua').select2(); 
    });
</script>
@endpush