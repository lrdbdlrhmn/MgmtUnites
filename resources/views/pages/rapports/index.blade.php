@extends('layout.master')

@push('plugin-styles')
<link rel="stylesheet" href="{{ asset('css/select2.min.css')}}">

@endpush

@section('content')

<div class="row align-items-center justify-content-center">
  <div class="col-sm-6 grid-margin stretch-card">
    <div class="card ">
      <div class="p-4 border-bottom bg-light">
        <h4 class="card-title mb-0">Filter</h4>
      </div>
      <div class="card-body">
        <form action="{{ url('rapports/rapport')}}" method="POST">
          {{ csrf_field() }}
          <div class="form-group">
            <select class="region form-control" name="regions"
              id="region">
              <option value="">Selectionnez une region</option>
              @foreach ($regions as $region)
              <option value="{{ $region->id }}">{{ $region->libelle}}</option>
              @endforeach   
            </select>
          </div>
          <div class="form-group mb-3">
            <select class="bataillon form-control" name="bataillons"
              id="bataillon" >
            
            </select>
          </div>

        <div class="form-group mb-3">
          <select class="unite form-control" name="unites"
            id="unite">
              
          </select>
        </div>
        
        <button type="submit" class="btn btn-primary">Exécuter</button>
    </form>
      </div>
    </div>
</div>
</div>
@endsection

@push('plugin-scripts')
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
        
        // Select2 Multiple
        $('.region').select2({
            placeholder: "Région",     
        });
        $('.bataillon').select2({
            
            placeholder: "Bataillon",
        });
        $('.unite').select2({
            placeholder: "Unité",
        });

    });

</script>
<script type="text/javascript">
  $(document).ready(function () {
      $('#region').on('change', function () {
          var regionId = this.value;
          $('#bataillon').html('');
          $.ajax({
              url: '{{ route('bataillons') }}?region_id='+regionId,
              type: 'get',
              success: function (res) {
                  $('#bataillon').append('<option value="">Tout</option>');
                  $.each(res, function (key, value) {
                      $('#bataillon').append('<option value="' + value
                          .id + '">' + value.libelle + '</option>');
                  });
              }
          });
      });
      $('#bataillon').on('change', function () {
          var stateId = this.value;
          $('#unite').html('');
          $.ajax({
              url: '{{ route('unites') }}?bataillon_id='+stateId,
              type: 'get',
              success: function (res) {
                $('#unite').html('<option value="">Tout</option>');
                  $.each(res, function (key, value) {
                      $('#unite').append('<option value="' + value
                          .id + '">' + value.libelle + '</option>');
                  });
              }
          });
      });
      
  });
</script>
@endpush