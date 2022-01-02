@extends('layout.master')

@push('plugin-styles')
<link href="{{ asset('datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
<style>

</style>
@endpush

@section('content')
<div class="row align-items-center justify-content-center">
  <div class="col-lg-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <div class="row">
        <div class="col-lg-8">
        <h4>Rapports de l'unité : {{ $unite->libelle }}</h4>
        </div>
        <div class="col-lg-4">
        <div class="box-tools pull-right" style="text-align: right">  
          <button type="button" class="btn btn-primary">PDF
          </button>
        </div>
        </div>
      </div>
      </div>
    </div>
  </div>
</div>

<div class="row align-items-center justify-content-center">
  <div class="col-lg-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <h2 class="card-title" style="text-align: center">Personnel-AUTO-TRANS</h2>
        <div class="table-responsive" style="text-align: center">
          <table class="table table-striped table-bordered">
            <thead>
              <tr style="text-align: center">
                <th rowspan="3">Unite</th>
                <th colspan="13">Personnels</th>

                <th colspan="12">Trans</th>
                <th colspan="12">Auto</th>

              </tr>
              <tr>
                <th colspan="4"> Off</th>
                <th colspan="4"> S/Off  </th>
                <th colspan="4"> HDT  </th>
                <th>%</th>

                <th colspan="4"> VL</th>
                <th colspan="4"> EB  </th>
                <th colspan="4"> PL  </th>

                <th colspan="4"> VHF</th>
                <th colspan="4"> HF  </th>
                <th colspan="4"> UHF  </th>
              </tr>
              <tr>
                <th> T </th>
                <th> R </td>
                <th> D </th>
                <th> E </th>
                <th> T </th>
                <th> R </td>
                <th> D </th>
                <th> E </th>
                <th> T </th>
                <th> R </td>
                <th> D </th>
                <th> E </th>
                <th></th>


                <th> T </th>
                <th> R </td>
                <th> D </th>
                <th> E </th>
                <th> T </th>
                <th> R </td>
                <th> D </th>
                <th> E </th>
                <th> T </th>
                <th> R </td>
                <th> D </th>
                <th> E </th>

                <th> T </th>
                <th> R </td>
                <th> D </th>
                <th> E </th>
                <th> T </th>
                <th> R </td>
                <th> D </th>
                <th> E </th>
                <th> T </th>
                <th> R </td>
                <th> D </th>
                <th> E </th>

              </tr>
            </thead>
            <tbody>
              <tr>
                <th>{{ $unite->libelle }}</th>
                <td> 
                  @if (!empty($tpersonnels['Officiers']))
                      {{$tpersonnels['Officiers']}} 
                  @endif
                </td>
                <td> {{ $rpersonnels['Officiers'] }} </td>
                <td>
                  @if ($tpersonnels['Officiers'] - $rpersonnels['Officiers']>0)
                  {{$tpersonnels['Officiers'] - $rpersonnels['Officiers'] }} 
                  @endif
                </td>
                <td>
                  @if ($rpersonnels['Officiers'] - $tpersonnels['Officiers']>0)
                  {{$rpersonnels['Officiers'] - $tpersonnels['Officiers'] }} 
                  @endif 
                </td>
                <td> {{$tpersonnels['Sous-Officiers']}} </td>
                <td> {{ $rpersonnels['Sous-Officiers'] }} </td>
                <td>
                  @if ($tpersonnels['Sous-Officiers'] - $rpersonnels['Sous-Officiers']>0)
                  {{$tpersonnels['Sous-Officiers'] - $rpersonnels['Sous-Officiers'] }} 
                  @endif
                </td>
                <td>
                  @if ($rpersonnels['Sous-Officiers'] - $tpersonnels['Sous-Officiers']>0)
                  {{$rpersonnels['Sous-Officiers'] - $tpersonnels['Sous-Officiers'] }} 
                  @endif 
                </td>
                <td> {{$tpersonnels['HDT']}} </td>
                <td> {{$rpersonnels['HDT']}} </td>
                <td>
                  @if ($tpersonnels['HDT'] - $rpersonnels['HDT']>0)
                  {{$tpersonnels['HDT'] - $rpersonnels['HDT'] }} 
                  @endif
                </td>
                <td>
                  @if ($rpersonnels['HDT'] - $tpersonnels['HDT']>0)
                  {{$rpersonnels['HDT'] - $tpersonnels['HDT'] }} 
                  @endif 
                </td>
                @if (($rpersonnels['Officiers'] + $rpersonnels['Sous-Officiers'] + $rpersonnels['HDT'])/($tpersonnels['Officiers'] + $tpersonnels['Sous-Officiers'] + $tpersonnels['HDT'])>=1)
                <td class="text-success">{{ ($rpersonnels['Officiers'] + $rpersonnels['Sous-Officiers'] + $rpersonnels['HDT'])*100/($tpersonnels['Officiers'] + $tpersonnels['Sous-Officiers'] + $tpersonnels['HDT']) }}%  <i class="mdi mdi-arrow-up"></i></td>
                @else
                <td class="text-danger">{{ ($rpersonnels['Officiers'] + $rpersonnels['Sous-Officiers'] + $rpersonnels['HDT'])*100/($tpersonnels['Officiers'] + $tpersonnels['Sous-Officiers'] + $tpersonnels['HDT']) }}%  <i class="mdi mdi-arrow-down"></i></td>
                @endif
                <td> {{ $tmateriels['VL']}} </td>
                <td> 65 </td>
                <td> 65 </td>
                <td> 100 </td>
                <td>
                  @if (!empty($tmateriels['EB']))
                  {{ $tmateriels['EB']}}
                  @else
                  {{0}}
                  @endif  
                </td>
                <td> 120 </td>
                <td> 65 </td>
                <td> 65 </td>
                <td>
                  @if (!empty($tmateriels['PL']))
                  {{ $tmateriels['PL']}}
                  @else
                  {{0}}
                  @endif
                   
                </td>
                <td> 100 </td>
                <td> 65 </td>
                <td> 120 </td>
                <td>
                  @if (!empty($tmateriels['VHF']))
                  {{ $tmateriels['VHF']}}
                  @else
                  {{0}}
                  @endif
                </td>
                <td> 65 </td>
                <td> 65 </td>
                <td> 100 </td>
                <td>
                  @if (!empty($tmateriels['HF']))
                  {{ $tmateriels['HF']}}
                  @else
                  {{0}}
                  @endif
                </td>
                <td> 
                  @if (!empty($rmateriels['HF']))
                  {{ $rmateriels['HF']}}
                  @else
                  {{0}}
                  @endif  
                </td>
                <td> 

                </td>
                <td> 65 </td>
                <td> 
                  @if (!empty($tmateriels['UHF']))
                  {{ $tmateriels['UHF']}}
                  @else
                  {{0}}
                  @endif
                </td>
                <td> 100 </td>
                <td> 65 </td>
                <td> 120 </td>
              </tr>
            </tbody>
            <tfoot>
              <tr>
                <th>Total</th>
                <th> T </th>
                <th> R </td>
                <th> D </th>
                <th> E </th>
                <th> T </th>
                <th> R </td>
                <th> D </th>
                <th> E </th>
                <th> T </th>
                <th> R </td>
                <th> D </th>
                <th> E </th>
                <th></th>


                <th> T </th>
                <th> R </td>
                <th> D </th>
                <th> E </th>
                <th> T </th>
                <th> R </td>
                <th> D </th>
                <th> E </th>
                <th> T </th>
                <th> R </td>
                <th> D </th>
                <th> E </th>

                <th> T </th>
                <th> R </td>
                <th> D </th>
                <th> E </th>
                <th> T </th>
                <th> R </td>
                <th> D </th>
                <th> E </th>
                <th> T </th>
                <th> R </td>
                <th> D </th>
                <th> E </th>

              </tr>

            </tfoot>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row align-items-center justify-content-center">
  <div class="col-lg-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <h2 class="card-title" style="text-align: center">Armement</h2>
        <div class="table-responsive" style="text-align: center">
          <table class="table table-striped table-bordered">
            <thead>
              <tr style="text-align: center">
                <th rowspan="3">Unite</th>
                <th colspan="40">Personnels</th>
              </tr>
              <tr>
                <th colspan="4"> PA </th>
                <th colspan="4"> FA  </th>
                <th colspan="4"> LR2  </th>
                <th colspan="4"> RPK </th>
                <th colspan="4"> PKMS  </th>
                <th colspan="4"> CQI  </th>

                <th colspan="4"> CSLM3 12,7 </th>
                <th colspan="4"> LG3  </th>
                <th colspan="4"> RPG7  </th>

                <th colspan="4"> 14,5  </th>
              </tr>
              <tr>
                <th> T </th>
                <th> R </td>
                <th> D </th>
                <th> E </th>
                <th> T </th>
                <th> R </td>
                <th> D </th>
                <th> E </th>
                <th> T </th>
                <th> R </td>
                <th> D </th>
                <th> E </th>
                


                <th> T </th>
                <th> R </td>
                <th> D </th>
                <th> E </th>
                <th> T </th>
                <th> R </td>
                <th> D </th>
                <th> E </th>
                <th> T </th>
                <th> R </td>
                <th> D </th>
                <th> E </th>

                <th> T </th>
                <th> R </td>
                <th> D </th>
                <th> E </th>
                <th> T </th>
                <th> R </td>
                <th> D </th>
                <th> E </th>
                <th> T </th>
                <th> R </td>
                <th> D </th>
                <th> E </th>

                <th> T </th>
                <th> R </td>
                <th> D </th>

              </tr>
            </thead>
            <tbody>
              <tr>
                <th> {{ $unite->libelle }} </th>
                <td> {{ $tmateriels['PA'] }} </td>
                <td> 65 </td>
                <td> 65 </td>
                <td>  </td>
                <td> {{ $tmateriels['FA'] }} </td>
                <td> 120 </td>
                <td> 65 </td>
                <td> 65 </td>
                <td>  </td>
                <td> 100 </td>
                <td> 65 </td>
                <td> 120 </td>
                <td></td>
                <td> {{ $tmateriels['PA'] }} </td>
                <td> 65 </td>
                <td> 65 </td>
                <td> 100 </td>
                <td> 65 </td>
                <td> 120 </td>
                <td> 65 </td>
                <td> 65 </td>
                <td> 65 </td>
                <td> 100 </td>
                <td> 65 </td>
                <td> 120 </td>
                <td> 111 </td>
                <td> 65 </td>
                <td> 65 </td>
                <td> 100 </td>
                <td> 65 </td>
                <td> 120 </td>
                <td> 65 </td>
                <td> 65 </td>
                <td> 65 </td>
                <td> 100 </td>
                <td> 65 </td>
                <td> 120 </td>

                <td> 65 </td>
                <td> 100 </td>
                <td> 65 </td>
              </tr>
            </tbody>
            <tfoot>
              <tr>
                <th>Total</th>
                <th> T </th>
                <th> R </td>
                <th> D </th>
                <th> E </th>
                <th> T </th>
                <th> R </td>
                <th> D </th>
                <th> E </th>
                <th> T </th>
                <th> R </td>
                <th> D </th>
                <th> E </th>
                <th></th>


                <th> T </th>
                <th> R </td>
                <th> D </th>
                <th> E </th>
                <th> T </th>
                <th> R </td>
                <th> D </th>
                <th> E </th>
                <th> T </th>
                <th> R </td>
                <th> D </th>
                <th> E </th>

                <th> T </th>
                <th> R </td>
                <th> D </th>
                <th> E </th>
                <th> T </th>
                <th> R </td>
                <th> D </th>
                <th> E </th>
                <th> T </th>
                <th> R </td>
                <th> D </th>
                <th> E </th>


                <th> R </td>
                <th> D </th>
                <th> E </th>



              </tr>

            </tfoot>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

@push('plugin-scripts')

    <script src="{{ asset('/js/adminlte.min.js')}}"></script>
@endpush

@push('custom-scripts')
@endpush