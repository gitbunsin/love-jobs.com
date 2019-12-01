@extends('backend.layouts.master')
@section('content')
@php
     use App\Model\city;use App\Model\country;
@endphp
    <div class="container-fluid">
            <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                    <div class="col-lg-11 col-md-5 col-sm-8 col-xs-10 bhoechie-tab-container">
                                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 bhoechie-tab-menu">
                                              <div class="list-group">
                                                    <a href="#"  class="list-group-item active text-center">
                                                            General Info
                                                    </a>
                                                    <a href="#"  class="list-group-item text-center">
                                                            Location
                                                      </a>
                                                      <a href="#"  class="list-group-item text-center">
                                                            Structure<br/>
                                                      </a>   
                                              </div>
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 bhoechie-tab">
                                                    <!-- flight section -->
                                                    <div class="bhoechie-tab-content active">
                                                            <div class="card-header">
                                                                    <div class="pull-right">
                                                                       <a class="btn btn-primary" onclick="myfunc()" data-toggle="tooltip" data-placement="top" title="Company"><i class="ti-plus"></i></a>  
                                                                    </div>
                                                                    <h3><span class="ti-home"></span> General Information</h3>
                                                                </div>
                                                                <div class="card-body">
                                                                        <table class="table" id='company_id'>
                                                                                <thead>
                                                                                  <tr>
                                                                                    <th scope="col">#No</th>
                                                                                    <th scope="col">Company Name</th>
                                                                                    <th scope="col">Phone</th>
                                                                                    <th scope="col">Email</th>
                                                                                    <th scope="col">Action</th>
                                                                                  </tr>
                                                                                </thead>
                                                                                <tbody>  
                                                                                @foreach ($company as $key => $companies)
                                                                                    <tr id="tbl_company{{$companies->id}}">
                                                                                        <th scope="row">{{$key + 1}}</th>
                                                                                        <td>{{$companies->company_name}}</td>
                                                                                        <td>{{$companies->phone}}</td></td>
                                                                                        <td>{{$companies->email}}</td>
                                                                                        <th>
                                                                                            <a onclick="Edit({{$companies->id}});"  data-toggle="modal" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="icon-edit"></i></a>
                                                                                            <a onclick="Delete({{$companies->id}});" data-toggle="modal" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Delete"><i class="ti-trash"></i></a>
                                                                                        </th>
                                                                                    </tr>
                                                                                  @endforeach
                                                                              
                                                                                </tbody>
                                                                              </table>
                                                                </div>
                                                    </div>
                                                    <div class="bhoechie-tab-content ">
                                                        <div class="card-header">
                                                                <div class="card-header">
                                                                        <div class="pull-right">
                                                                            <a  onclick="showLocation(this);"  href="#"  class="btn btn-success manage-btn" data-toggle="tooltip" data-placement="top" title="Create Location"><i class="ti-plus"></i></a>
                                                                        </div>
                                                                        <h3><span class="ti-home"></span> Location</h3>
                                                                    </div>
                                                                    <div class="card-body" id="jobCategory_id">
                                                                        <table class="table">
                                                                            <thead>
                                                                            <tr>
                                                                                <th scope="col">#No</th>
                                                                                <th scope="col">Name </th>
                                                                                <th scope="col">City</th>
                                                                                <th scope="col">Country</th>
                                                                                <th scope="col">Phone</th>
                                                                                <th scope="col">Num / Emp</th>
                                                                                <th scope="col">Action</th>
                                                                            </tr>
                                                                            </thead>
                                                                            <tbody id="location_list" name="location_list">
                                                                            @if(!$location->isEmpty())
                                                                                @foreach($location as $key => $locations)
                                                                                <tr id="location_id{{$locations->id}}">
                                                                                    <th scope="row">{{$key+1}}</th>
                                                                                    <td>{{$locations->name}}</td>
                                                                                    <td>{{$locations->city->name}}</td>
                                                                                    <td>{{$locations->country->name}}</td>
                                                                                    <td>{{$locations->phone}}</td>
                                                                                    <td></td>
                                                                                    <th>
                                                                                            <a onclick="EditLocation({{$locations->id}});"  data-toggle="modal" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="icon-edit"></i></a>
                                                                                            <a onclick="DeleteLocation({{$locations->id}});" data-toggle="modal" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Delete"><i class="ti-trash"></i></a>
                                                                                      </th>
                                                                                </tr>
                                                                                    @endforeach
                                                                                @endif
                                                                            </tbody>
                                                                        </table>
                                                        </div>
                                                    </div>
                                            </div>
                                            <div class="bhoechie-tab-content">
                                                    <div class="card-header">
                                                            <div class="pull-right">
                                                                <a class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-placement="top" title="Job Title"><i class="ti-plus"></i></a>
                                                            </div>
                                                            <h3><span class="ti-home"></span> Organization Structure</h3>
                                                        </div>
                                            </div>
                                    </div>
                            </div>
                        </div>
                    </div>
        </div>
        </div>
    </div>

    <div id="DeleteCategory" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="#" id="frmJobCategory">
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                    <input type="hidden" value="" id="jobCategory_id"/>
                    <div class="modal-header theme-bg">
                        <h4 class="modal-title">Location </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Do u want to delete this  ?</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="No">
                        <input type="submit" class="btn btn-danger" value="Yes">
                    </div>
                </form>
            </div>
        </div>
    </div>



    <!-- Edit Company -->
 <div id="EditCompany" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="frmCompanyEdit">
                    <input type="hidden" name="" val="" id="id_edit">
                    <div class="modal-header theme-bg">						
                        <h4 class="modal-title">Update Company</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                            <div class="row">
                                    <div class="col-md-12 col-sm-12">
                                        <!-- General Company Information  -->
                                        {{-- <div class="card"> --}}
                                            <div class="card-header">
                                                <h4>Company Address</h4>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <label>Company Name</label>
                                                        <input  name="company_name_edit" id="company_name_edit" type="text" class="form-control">
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <label>Phone No.</label>
                                                        <input name="phone_edit" id="phone_edit" type="text" class="form-control">
                                                    </div>
                        
                                                    <div class="col-sm-4">
                                                        <label>Email</label>
                                                        <input name="email_edit" id="email_edit" type="text" class="form-control">
                                                    </div>
                        
                                                    <div class="col-sm-4">
                                                        <label>Website Link</label>
                                                        <input name="website_link_edit" id="website_link_edit" type="text" class="form-control">
                                                    </div>
                        
                                                    <div class="col-sm-4">
                                                        <label>Address</label>
                                                        <input name="address_edit" id="address_edit" type="text" class="form-control">
                                                    </div>
                        
                                                    <div class="col-sm-4">
                                                        <label>City</label>
                                                        <?php $city = city::all(); ?>
                                                        <select name="city_id_edit" id="city_id_edit" class="form-control">
                                                            @foreach( $city as $cities)
                                                              <option value="{{$cities->id}}">{{$cities->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <label>State</label>
                                                        <input type="text" name="state_edit" id="state_edit" class="form-control">
                                                    </div>
                                                    <div class="col-sm-4 m-clear">
                                                        <label>Country</label>
                                                        <?php $country = country::all();?>
                                                        <select class="form-control" id="country_id_edit" name="country_id_edit">
                                                            @foreach( $country as $countries)
                                                                <option value="{{$countries->id}}">{{$countries->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-4 m-clear">
                                                        <label>Zip Code</label>
                                                        <input id="zip_code_edit" name="zip_code_edit"  type="text" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        <!-- Social Accounts -->
                                            <div class="card-header">
                                                <h4>Social Accounts</h4>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <label><i class="fa fa-facebook mrg-r-5"></i>Facebook</label>
                                                        <input name="facebook_link_edit" id="facebook_link_edit" type="text" class="form-control">
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <label><i class="fa fa-google-plus mrg-r-5"></i>Google +</label>
                                                        <input name="google_link_edit" id="google_link_edit" type="text" class="form-control">
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <label><i class="fa fa-twitter mrg-r-5"></i>Twitter</label>
                                                        <input name="twitter_link_edit" id="twitter_link_edit" type="text" class="form-control">
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <label><i class="fa fa-linkedin mrg-r-5"></i>LinkedIn</label>
                                                        <input name="linkedIn_link_edit" id="linkedIn_link_edit" type="text" class="form-control">
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <label><i class="fa fa-pinterest mrg-r-5"></i>Pinterest</label>
                                                        <input name="pinterest_link_edit" id="pinterest_link_edit" type="text" class="form-control">
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <label><i class="fa fa-instagram mrg-r-5"></i>Instagram</label>
                                                        <input name="instagram_link_edit" id="instagram_link_edit" type="text" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                            </div>	
                    </div>
                    <div class="modal-footer">
                            <input type="button" class="btn btn-danger" data-dismiss="modal" value="No">
                            <input type="submit" class="btn btn-success" value="Yes">
                    </div>
                </form>
            </div>
        </div>
 </div>
<!-- Send Message -->
<div id="AddCompany" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="frmCompany">
                    <input type="hidden" name="id" id="id">
                    <div class="modal-header theme-bg">						
                        <h4 class="modal-title">Create Company</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">					
                                <!-- /row -->
                                <div class="row">
                                    <div class="col-md-12 col-sm-12">
                                        <!-- General Company Information  -->
                                        {{-- <div class="card"> --}}
                                            <div class="card-header">
                                                <h4>Company Address</h4>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <label>Company Name</label>
                                                        <input  name="company_name" id="company_name" type="text" class="form-control">
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <label>Phone No.</label>
                                                        <input name="phone" id="phone" type="text" class="form-control">
                                                    </div>
                        
                                                    <div class="col-sm-4">
                                                        <label>Email</label>
                                                        <input name="email" id="email" type="text" class="form-control">
                                                    </div>
                        
                                                    <div class="col-sm-4">
                                                        <label>Website Link</label>
                                                        <input name="website_link" id="website_link" type="text" class="form-control">
                                                    </div>
                        
                                                    <div class="col-sm-4">
                                                        <label>Address</label>
                                                        <input name="address" id="address" type="text" class="form-control">
                                                    </div>
                        
                                                    <div class="col-sm-4">
                                                        <label>City</label>
                                                        <?php $city = city::all(); ?>
                                                        <select class="form-control">
                                                            @foreach( $city as $cities)
                                                              <option value="{{$cities->id}}">{{$cities->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <label>State</label>
                                                        <input type="text" name="state" id="state" class="form-control">
                                                    </div>
                                                    <div class="col-sm-4 m-clear">
                                                        <label>Country</label>
                                                        <?php $country = country::all(); ?>
                                                        <select class="form-control">
                                                            @foreach( $country as $countries)
                                                                <option value="{{$countries->id}}">{{$countries->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-4 m-clear">
                                                        <label>Zip Code</label>
                                                        <input id="zip_code" name="zip_code"  type="text" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        <!-- Social Accounts -->
                                            <div class="card-header">
                                                <h4>Social Accounts</h4>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <label><i class="fa fa-facebook mrg-r-5"></i>Facebook</label>
                                                        <input name="facebook_link" id="facebook_link" type="text" class="form-control">
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <label><i class="fa fa-google-plus mrg-r-5"></i>Google +</label>
                                                        <input name="google_link" id="google_link" type="text" class="form-control">
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <label><i class="fa fa-twitter mrg-r-5"></i>Twitter</label>
                                                        <input name="twitter_link" id="twitter_link" type="text" class="form-control">
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <label><i class="fa fa-linkedin mrg-r-5"></i>LinkedIn</label>
                                                        <input name="linkedIn_link" id="linkedIn_link" type="text" class="form-control">
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <label><i class="fa fa-pinterest mrg-r-5"></i>Pinterest</label>
                                                        <input name="pinterest_link" id="pinterest_link" type="text" class="form-control">
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <label><i class="fa fa-instagram mrg-r-5"></i>Instagram</label>
                                                        <input name="instagram_link" id="instagram_link" type="text" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                            </div>	
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" class="btn btn-success" value="Create">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Job Title -->
    <div id="showEditLocation" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form method="POST" action="#" id="frmEditLocation">
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                    <input type="hidden" value="" id="edit_id"/>
                    <input type="hidden" name="no" id="no" value=""/>
                    <div class="modal-header theme-bg">
                        <h4 class="modal-title">Edit Location</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-6">
                                        <div class="form-group">
                                                <label>Name</label>
                                                <input type="text" name="name_edit" id="name_edit" class="form-control"/>
                                            </div>
                                </div>
                                <div class="col-lg-6">
                                        <div class="form-group">
                                                <label>Country</label>
                                                <select class="form-control" id="country_code_edit" name="country_code_edit">
                                                    @php $country1 = country::all(); @endphp
                                                    @foreach($country1 as $countries1)
                                                        <option value="{{$countries1->id}}">{{$countries1->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                </div>
                                <div class="col-lg-6">
                                        <div class="form-group">
                                                <label>City</label>
                                                <select class="form-control" id="city_code_edit" name="city_code_edit">
                                                    @php $city1 = city::all(); @endphp
                                                    @foreach($city1 as $cities1)
                                                        <option value="{{$cities1->id}}">{{$cities1->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                </div>
                                <div class="col-lg-6">
                                        <div class="form-group">
                                                <label>Province</label>
                                                <select class="form-control" id="province_code_edit" name="province_code_edit">
                                                    @php use App\Model\province;$province1 = province::all(); @endphp
                                                    @foreach($province1 as $provinces1)
                                                        <option value="{{$provinces1->id}}">{{$provinces1->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                </div>
                                <div class="col-lg-6">
                                        <div class="form-group">
                                                <label>Phone</label>
                                                <input type="text" name="phone_edit" id="phone_edit" class="form-control"/>
                                            </div>
                                </div>
                                <div class="col-lg-6">
                                        <div class="form-group">
                                                <label>Fax</label>
                                                <input type="text" name="fax_edit" id="fax_edit" class="form-control"/>
                                            </div>
                                </div>
                                <div class="col-lg-12">
                                        <div class="form-group">
                                                <label>Zip Code</label>
                                                <input type="text" name="zip_code_edit" id="zip_code_edit" class="form-control"/>
                                            </div>
                                </div>
                                <div class="col-lg-12">
                                        <div class="form-group">
                                                <label>Address </label>
                                                <textarea rows="3" id="address_edit" name="address_edit" class="form-control"></textarea>
                                            </div>
                                </div>
                                <div class="col-lg-12">
                                        <div class="form-group">
                                                <label>Note </label>
                                                <textarea rows="3" id="note_edit" name="note_edit" class="form-control"></textarea>
                                            </div>
                                </div>
                    </div>
                </div>
                 <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" class="btn btn-danger" value="Save">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Edit Company -->

    <!-- Deleted Company -->
    <div id="showLocation" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form method="POST" action="#" id="frmAddLocation">
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                    <input type="hidden" value="" id="company_id_hidden"/>
                    <div class="modal-header theme-bg">
                        <h4 class="modal-title"> Location </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="row">

                        <div class="col-lg-6">
                                <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" name="name" id="name" class="form-control"/>
                                    </div>
                        </div>
                        <div class="col-lg-6">
                                <div class="form-group">
                                        <label>Country</label>
                                        <select class="form-control" id="country_code" name="country_code">
                                            @php $country = country::all(); @endphp
                                            @foreach($country as $countries)
                                                 <option value="{{$countries->id}}">{{$countries->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                        </div>
                        <div class="col-lg-6">
         
                                <div class="form-group">
                                        <label>City</label>
                                        <select class="form-control" id="city_code" name="city_code">
                                            @php $city = city::all(); @endphp
                                            @foreach($city as $cities)
                                                 <option value="{{$cities->id}}">{{$cities->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                        </div>
                        <div class="col-lg-6">
                                <div class="form-group">
                                        <label>Province</label>
                                        <select class="form-control" id="province_code" name="province_code">
                                            @php $province = province::all(); @endphp
                                            @foreach($province as $provinces)
                                                 <option value="{{$provinces->id}}">{{$provinces->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                        </div>
                        <div class="col-lg-6">
                             
                        <div class="form-group">
                                <label>Phone</label>
                                <input type="number" name="phone" id="phone" class="form-control"/>
                            </div>
                        </div>
                        <div class="col-lg-6">
                                <div class="form-group">
                                        <label>Fax</label>
                                        <input type="text" name="fax" id="fax" class="form-control"/>
                                    </div>
                        </div>
                        <div class="col-lg-12">
                                <div class="form-group">
                                        <label>Zip Code</label>
                                        <input type="text" name="zip_code" id="zip_code" class="form-control"/>
                                    </div>
                        </div>
                        <div class="col-lg-12">
                                <div class="form-group">
                                        <label>Address </label>
                                        <textarea rows="3" id="address" name="address" class="form-control"></textarea>
                                    </div>
                        </div>
                        <div class="col-lg-12">
                                <div class="form-group">
                                        <label>Note </label>
                                        <textarea rows="3" id="note" name="note" class="form-control"></textarea>
                                    </div>
                        </div>
                        </div>              
                    </div>   
                    <div class="modal-footer">
                            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                            <input type="submit" class="btn btn-primary" value="Save">
                    </div>   
                </form>
            </div>
        </div>
    </div>
    <!-- End Deleted Company -->
@endsection
@section('scripts')
    <script src="/js/backend/location.js"></script>
    <script src="/js/backend/company.js"></script>
@endsection