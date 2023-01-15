@extends('layouts.app')

<style type="text/css">
    
    li.nav-item#m_categories{
        color: green;
        background: greenyellow;
        opacity: 0.7;
    }
    
</style>    

@section('content')
      
        <div class="col-md-10">
            
            <div class="card" id="dashboard">
                <div class="card-header">{{ __('Travellers') }}</div>

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
                  

                    <form method="POST" enctype="multipart/form-data" action="{{ url('new-travellers') }}">
                        @csrf

                        

                        <div class="form-group row">
                            <label for="pasport_id" class="col-md-4 col-form-label text-md-right">{{ __('Pasport No') }}</label>

                            <div class="col-md-6">
                                <input id="pasport_id" type="text" class="form-control" name="pasport_id" required autocomplete="" autofocus>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="invoice_id" class="col-md-4 col-form-label text-md-right">{{ __('Invoice No') }}</label>

                            <div class="col-md-6">
                                <input id="invoice_id" type="text" class="form-control" name="invoice_id" required autocomplete="" autofocus>

                            </div>
                        </div>

                     
                     
                        <div class="form-group row">
                            <label for="parent_category" class="col-md-4 col-form-label text-md-right">{{ __('Parent Category') }}</label>

                            <div class="col-md-6">

                                <select id="parent_category" class="form-control" name="parent_category">
                                    
                                    <option value=""> Select Parent Category </option>
                                    
                        @foreach($travellers ?? '' as $traveller)
                                     
                                     <option value="{{ $traveller->pasport_no }}"> {{ $traveller->pasport_no }} </option>

                            @endforeach   
                            
                                </select>
                            </div>
                        </div>
                    

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Save') }}
                                </button>
                            </div>
                        </div>

                    </form>

                </div>
            </div> <!--  New Category   -->


            <div class="card" id="all_cat">
                <div class="card-header">{{ __('Travellers') }}</div>

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
                      <th>ID</th>
                      <th>Travellers Name</th>
                      <th>Pasport No.</th>
                      <th>Invoice</th>
                      <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        
                           @foreach($travellers ?? '' as $traveller)
<tr id="trval_{{$traveller->id}}">
                      <td>{{ $traveller->id }}</td>
                      <td>{{ $traveller->pasport_no }}</td>
                      <td>{{ $traveller->invoice_id }}</td>       

                      <td> <a href="{{ url('traveller-edit', $traveller->id) }}" target="_blank"> Update </a> | 
                      <a href="javascript:void(0)" class="text-danger del_cat" onclick="delete_category({{$traveller->id}})" idd="{{$traveller->id}}"> DELETE </a></td>
</tr>
                          @endforeach 

                    </tbody>
                  </table>
                  
                            
                            </div>
                        </div>
                

                </div>
            </div> <!--  All Travellers   -->


        </div>
    </div>
</div>
@endsection
