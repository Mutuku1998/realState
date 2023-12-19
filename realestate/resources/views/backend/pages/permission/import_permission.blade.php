@extends('admin.admin_dashboard')

@section('admin')


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="page-content">

    <nav class="page_breadcrumb">
<ol class="breadcrumb">
    <a href="{{route('export')}}" class="btn btn-inverse-warning">
Download XLsx
    </a>

</ol>

    </nav>

    <div class="row profile-body">
      <!-- left wrapper start -->
   
      <!-- left wrapper end -->
      <!-- middle wrapper start -->
      <div class="col-md-8 col-xl-8 middle-wrapper">
        <div class="row">
            <div class="card">
                  <div class="card-body">
    
                                    <h6 class="card-title">Import Permission</h6>
    
                                    <form  id="myform"  method="POST" action="{{route('store.permission')}}" class="forms-sample">

                                        @csrf
                                     
                                          <div class="form-group mb-3">
                                            <label for="exampleInputEmail1" class="form-label">XLsx File import</label>
                                            <input type="file" class="form-control" id="import_file" name='import_file'  required>
                                
                                          </div>

                                        
                                     
                                        <button type="submit" class="btn btn-inverse-warning me-2">upload</button>
                                       
                                        </form>
                  </div>
                </div>

        </div>
      </div>
      <!-- middle wrapper end -->
      <!-- right wrapper start -->
      
      <!-- right wrapper end -->
    </div>

        </div>


        @endsection



