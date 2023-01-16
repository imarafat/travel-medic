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
                <div class="card-header">{{ __('Agency') }}</div>

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
                  

                    <form method="POST" enctype="multipart/form-data" action="{{ url('new-agency') }}">
                        @csrf

                        
                        <div class="form-group row my-2">
                            <label for="agency_name" class="col-md-4 col-form-label text-md-right">{{ __('Agency Name') }}</label>

                            <div class="col-md-12">
                                <input id="agency_name" type="text" class="form-control" name="agency_name" required autocomplete="" autofocus>

                            </div>
                        </div>
                        
                        <div class="form-group row my-2">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                            <div class="col-md-12">
                                <input id="address" type="text" class="form-control" name="address" required autocomplete="" autofocus>

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
                <div class="card-header">{{ __('User List') }}</div>

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
                      <th>User Name</th>
                      <th>User Role</th>
                      <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        
                           @foreach($users ?? '' as $user)
<tr id="user_{{$user->id}}">
                      <td>{{ $user->id }}</td>
                      <td>{{ $user->name }}</td>
                      <td>{{ $user->user_types }}</td>
                     
                      <td> <a href="{{ url('user-edit', $user->id) }}" target="_blank"> Update </a> | 
                      <a href="javascript:void(0)" class="text-danger del_cat" onclick="delete_category({{$user->id}})" idd="{{$user->id}}"> DELETE </a></td>
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
