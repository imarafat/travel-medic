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
                <div class="card-header">{{ __('Remarks') }}</div>

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
                  

                    <form method="POST" enctype="multipart/form-data" action="{{ url('new-remarks') }}">
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
                            <label for="note" class="col-md-4 col-form-label text-md-right">{{ __('Note') }}</label>

                            <div class="col-md-12">
                                <input id="note" type="text" class="form-control" name="note" required autocomplete="" autofocus>

                            </div>
                        </div>
                        
                        <div class="form-group row my-2">
                            <label for="remarks" class="col-md-4 col-form-label text-md-right">{{ __('Remarks') }}</label>

                            <div class="col-md-12">
                                <input id="remarks" type="text" class="form-control" name="remarks" required autocomplete="" autofocus>

                            </div>
                        </div>


                        <div class="form-group row my-2">
                            <label for="status" class=" col-form-label text-md-right">{{ __('Status') }}</label>
  
                            <div class="col-md-8">

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" id="status1" value="1">
                                    <label class="form-check-label" for="status1">
                                    Published
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" id="eyes2" value="0" checked>
                                    <label class="form-check-label" for="status2">
                                    Unpublished
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
                <div class="card-header">{{ __('Remarks List') }}</div>

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
                      <th>Note</th>
                      <th>Remarks</th>
                      <th>Status</th>
                      <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        
                           @foreach($remarks ?? '' as $agent)
<tr id="agent_{{$agent->id}}">
                      <td>{{ $agent->pasport_no }}</td>
                      <td>{{ $agent->note }}</td>
                      <td>{{ $agent->remarks_txt }}</td>
                      
                    <td> @if($agent->status ==1)  
                            Published 
                        @else
                            Unpublished
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
            </div> <!--  All agent   -->


        </div>
    </div>
</div>
@endsection
