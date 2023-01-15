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

                        

                        <div class=" row ">

                        <div class=" col-md-6 ">
                        
                        <div class="form-group row my-2">
                            <label for="full_name" class="col-md-4 col-form-label text-md-right">{{ __('Full Name') }}</label>

                            <div class="col-md-12">
                                <input id="full_name" type="text" class="form-control" name="full_name" required autocomplete="" autofocus>

                            </div>
                        </div>

                        <div class="form-group row my-2">
                            <label for="father_name" class="col-md-4 col-form-label text-md-right">{{ __('Father Name') }}</label>

                            <div class="col-md-12">
                                <input id="father_name" type="text" class="form-control" name="father_name" required autocomplete="" autofocus>

                            </div>
                        </div>

                        <div class="form-group row my-2">
                            <label for="mother_name" class="col-md-4 col-form-label text-md-right">{{ __('Mother Name') }}</label>

                            <div class="col-md-12">
                                <input id="mother_name" type="text" class="form-control" name="mother_name" required autocomplete="" autofocus>

                            </div>
                        </div>

                        <div class="form-group row my-2">
                            <label for="dob" class="col-md-4 col-form-label text-md-right">{{ __('Date of Birth') }}</label>

                            <div class="col-md-12">
                                <input id="dob" type="text" class="form-control" name="dob" required autocomplete="" autofocus>

                            </div>
                        </div>

                        <div class="form-group row my-2">
                            <label for="reg_no" class="col-md-4 col-form-label text-md-right">{{ __('Registration No') }}</label>

                            <div class="col-md-12">
                                <input id="reg_no" type="text" class="form-control" name="reg_no" required autocomplete="" autofocus>

                            </div>
                        </div>

                        <div class="form-group row my-2">
                            <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>

                            <div class="col-md-12">
                                
                            <select id="gender" class="form-control" name="gender">
                                    
                                    <option value=""> Select Gender </option>
                                    
                                     <option value="Male"> Male </option>
                                     <option value="Female"> Female </option>
                                     <option value="Others"> Others </option>
 
                            
                                </select>
                            </div>
                        </div>

                    </div>

                     
                        <div class=" col-md-6 ">
    
                        <div class="form-group row my-2">
                            <label for="pasport_no" class="col-md-4 col-form-label text-md-right">{{ __('Passport No') }}</label>

                            <div class="col-md-12">
                                <input id="pasport_no" type="text" class="form-control" name="pasport_no" required autocomplete="" autofocus>

                            </div>
                        </div>

                        <div class="form-group row my-2">
                            <label for="invoice_id" class="col-md-4 col-form-label text-md-right">{{ __('Invoice No') }}</label>

                            <div class="col-md-12">
                                <input id="invoice_id" type="text" class="form-control" name="invoice_id" required autocomplete="" autofocus>

                            </div>
                        </div>

                        <div class="form-group row my-2">
                            <label for="age" class="col-md-4 col-form-label text-md-right">{{ __('Age') }}</label>

                            <div class="col-md-12">
                                <input id="age" type="text" class="form-control" name="age" required autocomplete="" autofocus>

                            </div>
                        </div>

                        <div class="form-group row my-2">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                            <div class="col-md-12">
                                <input id="address" type="text" class="form-control" name="address" required autocomplete="" autofocus>

                            </div>
                        </div>

                        <div class="form-group row my-2">
                            <label for="country" class="col-md-4 col-form-label text-md-right">{{ __('Country') }}</label>

                            <div class="col-md-12">
                                <input id="country" type="text" class="form-control" name="country" required autocomplete="" autofocus>

                            </div>
                        </div>

                        <div class="form-group row my-2">
                            <label for="agency_id" class="col-md-4 col-form-label text-md-right">{{ __('Agency') }}</label>

                            <div class="col-md-12">
                            
                                <select id="agency_id" class="form-control" name="agency_id">
                                    
                                    <option value=""> Select Agency </option>
                                    
                        @foreach($agency ?? '' as $agent)
                                     
                                     <option value="{{ $agent->id }}"> {{ $agent->name }} </option>

                            @endforeach   
                            
                                </select>

                            </div>
                        </div>

                        <div class="form-group row my-2">
                            <label for="photo" class="col-md-4 col-form-label text-md-right">{{ __('Photo') }}</label>

                            <div class="col-md-12">
                                
                            <input id="photo" type="file" class="form-control custom-file-input" name="photo" autocomplete="photo">
                                <label for="photo" class="custom-file-label">{{ __('Upload image size 300w x 300h px') }}</label>
                              

                            </div>
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
                      <th>Photo</th>
                      <th>Travellers Name</th>
                      <th>Passport No.</th>
                      <th>Invoice</th>
                      <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        
                           @foreach($travellers ?? '' as $traveller)
<tr id="trval_{{$traveller->id}}">
                      <td>{{ $traveller->id }}</td>
                      <td> <img src="http://localhost:5173/storage/app/public/img/{{ $traveller->photo }}" height="100" /></td>
                      <td>{{ $traveller->full_name }}</td>
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
