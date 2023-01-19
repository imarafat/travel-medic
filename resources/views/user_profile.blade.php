@extends('layouts.app')

<style type="text/css">
    
    li.nav-item#m_users{
        color: green;
        background: greenyellow;
        opacity: 0.7;
    }
    
</style>    

@section('content')
      
      
        <div class="col-md-10 mx-auto">
            
            <div class="card" id="dashboard">
                <div class="card-header">{{ __('User Information') }}</div>

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

@if(session()->has('warning'))
    <div class="alert alert-danger">
        {{ session()->get('warning') }}
    </div>
@endif
                  

                    <form method="POST" enctype="multipart/form-data" action="{{ url('update-user') }}">
                        @csrf

                        
 				
                       		<div class="form-group">
										    <label for="user_name">User Name</label>
											<input class="form-control" type="text" name="user_name" id="user_name" placeholder="user name" value="{{$usr->name}}" required/>
										
									</div>
									
									
                       		<div class="form-group">
										<label for="Email">Email</label>
										<input class="form-control" type="Email" name="email" id="email" placeholder="Email" value="{{$usr->email}}" required />
							</div>
											
								  		
									 <div class="form-group">
									 
									      <label for="role">Role</label>
											<select name="role" id="role" class="form-control">
											  @if( $usr->user_types !="" )
                                                <option selected="selected" value="{{$usr->user_types}}">
                                                    @if($usr->user_types == 1)
                                                        Admin
                                                    @elseif($usr->user_types == 2)
                                                        Registration Booth
                                                    @elseif($usr->user_types == 3)
                                                        LAB
                                                    @elseif($usr->user_types == 4)
                                                        Radiology
                                                    @elseif($usr->user_types == 5)
                                                        Physical Examiners
                                                    @elseif($usr->user_types == 6)
                                                        Report
                                                    @endif    
                                                        
                                                </option>
                                                @else
                                                <option selected="selected">Select the Role</option>
                                                @endif
                                                
											  <option value="1">Admin</option>
											  <option value="2">Registration Booth</option>
											  <option value="3">LAB</option>
											  <option value="4">Radiology</option>
											  <option value="5">Physical Examiners</option>
											  <option value="6">Report</option>
											</select>
									  </div>
									
									 
											
								  		
									
							

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-success">
                                    {{ __('Update') }}
                                </button>
                                 <input type="hidden" name="cid" value="{{ $usr->id }}"> </input>
                            </div>
                        </div>
                
                
                           
                    </form>

                </div>
            </div> <!--  Update Customer   -->



        </div>
    </div>
</div>
@endsection
