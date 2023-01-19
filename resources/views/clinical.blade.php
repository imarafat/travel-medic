@extends('layouts.app')

<style type="text/css">
    
    li.nav-item#m_categories{
        color: green;
        background: greenyellow;
        opacity: 0.7;
    }
    
</style>    

@section('content')
      
        <div class="col-md-10 mx-auto">
            
            <div class="card" id="dashboard">
                <div class="card-header">{{ __('Clinical Test') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
                  

                    <form method="POST" enctype="multipart/form-data" action="{{ url('new-clinical-records') }}">
                        @csrf

                        
                        
                        <div class="form-group row my-2">
                            <label for="traveller" class="col-md-4 col-form-label text-md-right">{{ __('Traveller') }}</label>

                            <div class="col-md-12">
                            
                            <select id="traveller" class="form-control" name="traveller">
                                    
                                    <option value=""> Select Traveller </option>
                                    
                        @foreach($travellers ?? '' as $traveller)
                                     
                             <option value="{{ $traveller->pasport_no }}"> {{ $traveller->full_name }} - {{ $traveller->pasport_no }}  </option>

                        @endforeach   
                            
                                </select>

                            </div>
                        </div>
                        

                        <div class="form-group row my-2">
                            <label for="opiate" class=" col-form-label text-md-right">{{ __('HIV/AIDS') }}</label>
  

                            <div class="col-md-8">

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="hiv" id="hiv1" value="1">
                                    <label class="form-check-label" for="hiv1">
                                        Yes
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="hiv" id="hiv2" value="0" checked>
                                    <label class="form-check-label" for="hiv2">
                                        No
                                    </label>
                                </div>

                            </div>

                            
                        
                        </div>
                        
                        
                        <div class="form-group row my-2">
                            <label for="malaria" class=" col-form-label text-md-right">{{ __('Malaria') }}</label>
  
                            <div class="col-md-8">

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="1" name="malaria" id="malaria1">
                                    <label class="form-check-label" for="malaria1">
                                        Yes
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="0" name="malaria" id="malaria2" checked>
                                    <label class="form-check-label" for="malaria2">
                                        No
                                    </label>
                                </div>

                            </div>
                        
                        </div>
                        
                        
                        <div class="form-group row my-2">
                            <label for="leprosy" class=" col-form-label text-md-right">{{ __('Leprosy') }}</label>
  
                            <div class="col-md-8">

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="1" name="leprosy" id="leprosy1">
                                    <label class="form-check-label" for="leprosy1">
                                        Yes
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="0" name="leprosy" id="leprosy2" checked>
                                    <label class="form-check-label" for="leprosy2">
                                        No
                                    </label>
                                </div>

                            </div>
                        
                        </div>
                        
                        
                        
                        <div class="form-group row my-2">
                            <label for="Chronic" class=" col-form-label text-md-right">{{ __('Chronic Diseases') }}</label>
  
                            <div class="col-md-8">

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="1" name="chronic" id="chronic1">
                                    <label class="form-check-label" for="chronic1">
                                        Yes
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="0" name="chronic" id="chronic2" checked>
                                    <label class="form-check-label" for="chronic2">
                                        No
                                    </label>
                                </div>

                            </div>
                        
                        </div>
                        
                        
                        
                        <div class="form-group row my-2">
                            <label for="hepatitiesB" class=" col-form-label text-md-right">{{ __('Hepatities B') }}</label>
  
                            <div class="col-md-8">

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="1" name="hepatitiesB" id="hepatitiesB1">
                                    <label class="form-check-label" for="hepatitiesB1">
                                        Yes
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="0" name="hepatitiesB" id="hepatitiesB2" checked>
                                    <label class="form-check-label" for="hepatitiesB2">
                                        No
                                    </label>
                                </div>

                            </div>
                        
                        </div>
                        
                        
                        
                        
                        <div class="form-group row my-2">
                            <label for="hepatitiesC" class=" col-form-label text-md-right">{{ __('Hepatities C') }}</label>
  
                            <div class="col-md-8">

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="1" name="hepatitiesC" id="hepatitiesC1">
                                    <label class="form-check-label" for="hepatitiesC1">
                                        Yes
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="0" name="hepatitiesC" id="hepatitiesC2" checked>
                                    <label class="form-check-label" for="hepatitiesC2">
                                        No
                                    </label>
                                </div>

                            </div>
                        
                        </div>
                        
                        
                        
                        <div class="form-group row my-2">
                            <label for="leshman" class=" col-form-label text-md-right">{{ __('Leishmaniasis') }}</label>
  
                            <div class="col-md-8">

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="1" name="leshman" id="leshman1">
                                    <label class="form-check-label" for="leshman1">
                                        Yes
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="0" name="leshman" id="leshman2" checked>
                                    <label class="form-check-label" for="leshman2">
                                        No
                                    </label>
                                </div>

                            </div>
                        
                        </div>
                        
                        
                        
                        <div class="form-group row my-2">
                            <label for="syph" class=" col-form-label text-md-right">{{ __('Syphilts') }}</label>
  
                            <div class="col-md-8">

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="1" name="syph" id="syph1">
                                    <label class="form-check-label" for="syph1">
                                        Yes
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="0" name="syph" id="syph2" checked>
                                    <label class="form-check-label" for="syph2">
                                        No
                                    </label>
                                </div>

                            </div>
                        
                        </div>
                        
                        
                        
                        
                        <div class="form-group row my-2">
                            <label for="cancer" class=" col-form-label text-md-right">{{ __('Tumor/Cancer') }}</label>
  
                            <div class="col-md-8">

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="1" name="cancer" id="cancer1">
                                    <label class="form-check-label" for="cancer1">
                                        Yes
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="0" name="cancer" id="cancer2" checked>
                                    <label class="form-check-label" for="cancer2">
                                        No
                                    </label>
                                </div>

                            </div>
                        
                        </div>
                        
                        
                        
                        
                        <div class="form-group row my-2">
                            <label for="epil" class=" col-form-label text-md-right">{{ __('Epilepsy') }}</label>
  
                            <div class="col-md-8">

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="1" name="epil" id="epil1">
                                    <label class="form-check-label" for="epil1">
                                        Yes
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="0" name="epil" id="epil2" checked>
                                    <label class="form-check-label" for="epil2">
                                        No
                                    </label>
                                </div>

                            </div>
                        
                        </div>
                        
                        
                        
                        
                        <div class="form-group row my-2">
                            <label for="mental" class=" col-form-label text-md-right">{{ __('Mental Illness') }}</label>
  
                            <div class="col-md-8">

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="1" name="mental" id="mental1">
                                    <label class="form-check-label" for="mental1">
                                        Yes
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="0" name="mental" id="mental2" checked>
                                    <label class="form-check-label" for="mental2">
                                        No
                                    </label>
                                </div>

                            </div>
                        
                        </div>
                        
                        
                        
                        
                        <div class="form-group row my-2">
                            <label for="filaria" class=" col-form-label text-md-right">{{ __('Filariasis') }}</label>
  
                            <div class="col-md-8">

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="1" name="filaria" id="filaria1">
                                    <label class="form-check-label" for="filaria1">
                                        Yes
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="0" name="filaria" id="filaria2" checked>
                                    <label class="form-check-label" for="filaria2">
                                        No
                                    </label>
                                </div>

                            </div>
                        
                        </div>
                        
                        
                        <div class="form-group row my-2">
                            <label for="remarks" class=" col-form-label text-md-right">{{ __('Remarks') }}</label>
  
                            <div class="col-md-8">

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="1" name="remarks" id="remarks1">
                                    <label class="form-check-label" for="remarks1">
                                        Yes
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="0" name="remarks" id="remarks2" checked>
                                    <label class="form-check-label" for="remarks2">
                                        No
                                    </label>
                                </div>

                            </div>

                            
                        
                        </div>
                        
                        

                        <div class="form-group row my-2">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Save') }}
                                </button>
                            </div>
                        </div>

                    </form>

                </div>
            </div> <!--  New Clinical Records   -->


            <div class="card" id="all_cat">
                <div class="card-header">{{ __('Clinical Records') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
                  

                   
                        <div class="row">
                            

                            <div class="col-md-12">

<table id="product_list" class="table table-hover">
                    <thead class="text-primary">
                    <tr>    
                      <th>Date</th>
                      <th>Passport</th>
                      <th>HIV</th>
                      <th>Malaria</th>
                      <th>Leprosy</th>
                      <th>Chronic Diseases</th>
                      <th>Hepatities B</th>
                      <th>Hepatities C</th>
                      <th>Remarks</th>
                      <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        
                           @foreach($clinical ?? '' as $agent)
<tr id="agent_{{$agent->id}}">
                      <td>{{ $agent->date }}</td>
                      <td>{{ $agent->pasport_no }}</td>
                      <td> @if($agent->hiv ==1)  
                            Yes 
                        @else
                            No 
                        @endif 
                    </td>
                    
                    <td> @if($agent->malaria ==1)  
                            Yes 
                        @else
                            No 
                        @endif 
                    </td>
                    
                    
                    <td> @if($agent->leprosy ==1)  
                            Yes 
                        @else
                            No 
                        @endif 
                    </td>
                    
                    
                    <td> @if($agent->chronic ==1)  
                            Yes 
                        @else
                            No 
                        @endif 
                    </td>
                    
                    
                    <td> @if($agent->hepa_b ==1)  
                            Yes 
                        @else
                            No 
                        @endif 
                    </td>
                    
                    
                    
                    <td> @if($agent->hepa_c ==1)  
                            Yes 
                        @else
                            No 
                        @endif 
                    </td>
                    

                    <td> @if($agent->remarks ==1)  
                            Yes 
                        @else
                            No 
                        @endif 
                    </td>

                     
                      <td> <a href="{{ url('agent-edit', $agent->id) }}" target="_blank"> Update </a> | 
                      <a href="javascript:void(0)" class="text-danger del_cat" onclick="delete_category({{$agent->id}})" idd="{{$agent->id}}"> DELETE </a></td>
</tr>
                          @endforeach 

                    </tbody>
                  </table>
                  
                            
                            </div>
                        </div>
                

                </div>
            </div> <!--  All list   -->


        </div>
    </div>
</div>
@endsection
