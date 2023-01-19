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
                <div class="card-header">{{ __('Radiology Test') }}</div>

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
                  

                    <form method="POST" enctype="multipart/form-data" action="{{ url('new-radio-test') }}">
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
                            <label for="tb" class=" col-form-label text-md-right">{{ __('TB') }}</label>
  

                            <div class="col-md-8">

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="tb" id="tb1" value="1">
                                    <label class="form-check-label" for="tb1">
                                        Yes
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="tb" id="tb2" value="0" checked>
                                    <label class="form-check-label" for="tb2">
                                        No
                                    </label>
                                </div>

                            </div>

                            
                        
                        </div>
                        
                        
                        <div class="form-group row my-2">
                            <label for="xray" class=" col-form-label text-md-right">{{ __('Unexpectable Findings in chest X-Ray') }}</label>
  
                            <div class="col-md-8">

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="1" name="xray" id="xray1">
                                    <label class="form-check-label" for="xray1">
                                        Yes
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="0" name="xray" id="xray2" checked>
                                    <label class="form-check-label" for="xray2">
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
            </div> <!--  New Agency   -->


            <div class="card" id="all_cat">
                <div class="card-header">{{ __('Radiology Report') }}</div>

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
                      <th>TB</th>
                      <th>X-Ray</th>
                      <th>Remarks</th>
                      <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        
                           @foreach($radiology ?? '' as $agent)
<tr id="agent_{{$agent->id}}">
                      <td>{{ $agent->date }}</td>
                      <td>{{ $agent->pasport_no }}</td>
                      <td> @if($agent->tb ==1)  
                            Yes 
                        @else
                            No 
                        @endif 
                    </td>
                    
                    <td> @if($agent->unexpect_xray ==1)  
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
