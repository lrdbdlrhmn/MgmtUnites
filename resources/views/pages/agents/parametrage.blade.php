@extends('layout.master')

@push('plugin-styles')
<link href="{{ asset('datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">


@endpush
@push('style')
<link href="{{ asset('css/toastr.min.css')}}" rel="stylesheet">

@endpush

@section('content')
<div class="row align-items-center justify-content-center">
  <div class="col-sm-6 grid-margin stretch-card">

    <div class="card ">

      <div class="card-body">
        <h4 class="card-title">Paramétrage de Personnels</h4>
        <form action="{{ url('agents/perso') }}" method="POST">
          {{ csrf_field() }}
          <div class="form-group mb-3" style="text-align: center">
            <label>Veuillez choisir l'unité convenable et renseigner les champs</label>
          </div>
          <div class="form-group mb-3" >
            
            <select class="unite form-control" name="unite"
              id="unite">
              @foreach ($unites as $unite)
              <option value="{{ $unite->id }}">{{ $unite->libelle}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group mb-3">
           <input class="form-control" type="number" id="off" name="off" required  placeholder="Officiers">
          </div>

        <div class="form-group mb-3">
          <input class="form-control" type="number" id="soff" name="soff" required placeholder="Sous-Officiers">

        </div>
        <div class="form-group mb-3">
          <input class="form-control" type="number" id="hdt" name="hdt" required placeholder="HDT">

        </div>
        
        <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>
      </div>
    </div>
</div>
</div>
<div class="row align-items-center justify-content-center">
  <div class="col-sm-6 grid-margin stretch-card">

    <div class="card ">
     
      <div class="card-body">
        <h4>Paramétrage de Matériels</h4>
        <form action="{{ url('agents/mat') }}" method="POST">
          {{ csrf_field() }}
          <div class="form-group mb-3" style="text-align: center">
          <label></label>
          </div>
          <div class="form-group mb-3" >
            
            <select class="unite form-control" name="unite"
              id="unite">
              @foreach ($unites as $unite)
              <option value="{{ $unite->id }}">{{ $unite->libelle}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group mb-3" >
            
          <select class="form-control materiel" name="materiel"
              id="materiel">
              @foreach ($materiels as $materiel)
              <option value="{{ $materiel->id }}">{{ $materiel->libelle}}</option>
              @endforeach
            </select>
          </div>
        <div class="form-group mb-3">
          <input class="form-control" type="number" id="theorique" name="theorique" required placeholder="Theorique">
        </div>
        
        <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>
      </div>
    </div>
</div>
</div>
<div class="row align-items-center justify-content-center">
  <div class="col-sm-6 grid-margin stretch-card">

    <div class="card ">
      <div class="card-body">
        <h4>Paramétrage de qualifications</h4>
        <form action="{{ url('agents/qua') }}" method="POST">
          {{ csrf_field() }}
          <div class="form-group mb-3" style="text-align: center">
          <label></label>
          </div>
          <div class="form-group mb-3" >
            
            <select class="unite form-control" name="unite"
              id="unite">
              @foreach ($unites as $unite)
              <option value="{{ $unite->id }}">{{ $unite->libelle}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group mb-3" >
            
          <select class="form-control qua" name="qua"
              id="qua">
              @foreach ($qualifications as $qualification)
              <option value="{{ $qualification->id }}">{{ $qualification->libelle}}</option>
              @endforeach
            </select>
          </div>
        <div class="form-group mb-3">
          <input class="form-control" type="number" id="theorique" name="theorique" required placeholder="Theorique">
        </div>
        
        <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>
      </div>
    </div>
</div>
</div>

<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Gestion de Personnels</h1>
  <!-- DataTales Example -->
  <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card shadow mb-4">
        <div class="card-body">
          <h4>Personnels</h4>
          <hr>
          <div class="table-responsive">
              <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row"><div class="col-sm-12">
                  <table class="table table-hover dataTable" id="dataTable1" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                  <thead>
                      <tr role="row">
                        <th>Unités</th>
                        <th>Officiers</th>
                        <th>Sous-Officiers</th>
                        <th>HDT</th>
                      </tr>
                      </thead>

                  <tbody>
                  <tr class="odd">
                          <td>113401N</td>
                          <td>Ali</td>
                          <td>Sidi</td>
                          <td>Sidi</td>
                  </tr>
                  </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      </div>
  </div>
    </div>
  </div>
</div>
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Gestion de Matériels</h1>
  <!-- DataTales Example -->
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
                    <tr>
                    <th>Unités</th>
                    <th>Matériels</th>
                    <th>Quantité</th>
                    <th>Catégories</th>
                    </tr>
                    </thead>
                  
                  <tbody>
                  <tr class="odd">
                          <td>Ax01013I</td>
                          <td>Toyota S1020</td>
                          <td>Ax01013I</td>
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
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Gestion de qualifications</h1>
  <!-- DataTales Example -->
  <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card shadow mb-4">
        <div class="card-body">
          <h4>Qualifications</h4>
          <hr>
          <div class="table-responsive">
              <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row"><div class="col-sm-12">
                  <table class="table table-hover dataTable" id="dataTable2" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                  <thead>
                    <tr>
                    <th>Unités</th>
                    <th>Qualifications</th>
                    <th>Quantité</th>
                    
                    </tr>
                  </thead>

                  <tbody>
                  <tr class="odd">
                          <td>113401N</td>
                          <td>Ali</td>
                          <td>Sidi</td>
                          
                          
                      </tr></tbody>
              </table></div></div>
                        </div>
          </div>
      </div>
  </div>
    </div>
  </div>
</div>
<!--

-->
@endsection

@push('plugin-scripts')

    <script src="{{ asset('/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('/js/mdb.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('/datatables/datatables-demo.js')}}"></script>


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

