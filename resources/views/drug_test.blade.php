@extends('layouts.app')

<style type="text/css">
    
    li.nav-item#m_categories{
        color: green;
        background: greenyellow;
        opacity: 0.7;
    }
    
</style>    

@section('content')
      
        <div class="col-md-12">
            
            <div class="card" id="dashboard">
                <div class="card-header">{{ __('Drug Test') }}</div>

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
                  

                    <form method="POST" enctype="multipart/form-data" action="{{ url('new-drug-test') }}">
                        @csrf

                        
                        
                        <div class="form-group row my-2">
                            <label for="traveller" class="col-md-4 col-form-label text-md-right">{{ __('Traveller') }}</label>

                            <div class="col-md-12">
                            
                            <select id="traveller" class="form-control" name="traveller">
                                    
                                    <option value=""> Select Traveller </option>
                                    
                        @foreach($travellers ?? '' as $traveller)
                                     
                             <option value="{{ $traveller->id }}"> {{ $traveller->full_name }} - {{ $traveller->pasport_no }}  </option>

                        @endforeach   
                            
                                </select>

                            </div>
                        </div>
                        

                        
                        <div class="form-group row my-2">
                            <label for="eyes" class="col-md-4 col-form-label text-md-right">{{ __('Eyes') }}</label>

                            <div class="col-md-12">
                                <input id="eyes" type="text" class="form-control" name="eyes" required autocomplete="" autofocus>

                            </div>
                        </div>
                        
                        <div class="form-group row my-2">
                            <label for="lft" class="col-md-4 col-form-label text-md-right">{{ __('LFT') }}</label>

                            <div class="col-md-12">
                                <input id="lft" type="text" class="form-control" name="lft" required autocomplete="" autofocus>

                            </div>
                        </div>
                        
                        <div class="form-group row my-2">
                            <label for="remarks" class=" col-form-label text-md-right">{{ __('Remarks') }}</label>
  

                            <div class="col-md-8">

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="remarks" id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Yes
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="remarks" id="flexRadioDefault2" checked>
                                    <label class="form-check-label" for="flexRadioDefault2">
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
                <div class="card-header">{{ __('Drug Test Report') }}</div>

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
                      <th>Passport</th>
                      <th>Eyes</th>
                      <th>LFT</th>
                      <th>Remarks</th>
                      <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        
                           @foreach($drug_test ?? '' as $agent)
<tr id="agent_{{$agent->id}}">
                      <td>{{ $agent->date }}</td>
                      <td>{{ $agent->pasport_no }}</td>
                      <td>{{ $agent->eyes }}</td>
                      <td>{{ $agent->lft }}</td>
                      <td>{{ $agent->remarks }}</td>
                     
                      <td> <a href="{{ url('agent-edit', $agent->id) }}" target="_blank"> Update </a> | 
                      <a href="javascript:void(0)" class="text-danger del_cat" onclick="delete_category({{$agent->id}})" idd="{{$agent->id}}"> DELETE </a></td>
</tr>
                          @endforeach 

                    </tbody>
                  </table>
                  
                            
                            </div>
                        </div>
                

                </div>
            </div> <!--  All agent   -->


        </div>
    </div>
</div>
@endsection
