@extends('layouts.admin-master')

@section('page-title', trans('app.invoice'))
@section('page-heading', trans('app.invoice'))

@section('breadcrumbs')
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item">
            <a href="{{ route('user.list') }}">@lang('app.administration')</a>
        </div>
        <div class="breadcrumb-item">@lang('app.user_interface')</div>
        <div class="breadcrumb-item">@lang('app.invoice')</div>
    </div>
@stop

@section('content')

@include('partials.messages')

<div class="card">
    <div class="card-body">

        <form action="" method="GET" id="users-form" class="pb-2 mb-3 border-bottom-light">
            <div class="row my-3 flex-md-row flex-column-reverse">
                <div class="col-md-4 mt-md-0 mt-2">
                    <div class="input-group custom-search-form">
                        <input type="text"
                               class="form-control input-solid"
                               name="search"
                               value="{{ Request::has('search') ? Request::get('search') : '' }}"
                               placeholder="Search Invoice ...">

                            <span class="input-group-append">
                                @if (Request::has('search') && Request::get('search') != '')
                                    <a href="{{ route('laboratory.list') }}"
                                           class="btn btn-light d-flex align-items-center text-muted"
                                           role="button">
                                        <i class="fas fa-times"></i>
                                    </a>
                                @endif
                                <button class="btn btn-light" type="submit" id="search-users-btn">
                                    <i class="fas fa-search text-muted"></i>
                                </button>
                            </span>
                    </div>
                </div>

                <div class="col-md-3 mt-2 mt-md-0">
                    {!! Form::select('regions', $approval_statuses, Request::get('status'), ['id' => 'status', 'class' => 'form-control input-solid']) !!}
                </div>
                <div class="col-md-3 mt-2 mt-md-0">
                    {!! Form::select('regions', $validation_statuses, Request::get('status'), ['id' => 'status', 'class' => 'form-control input-solid']) !!}
                </div>

               

               

                <div class="col-md-2">
                    <a href="{{ route('content.create') }}" class="btn btn-primary btn-rounded float-right">
                        <i class="fas fa-plus mr-2"></i>
                       Add Invoice
                    </a>
                </div>
            </div>
        </form>

        <div class="table-responsive" id="users-table-wrapper">
            <table class="table table-borderless table-striped">
                <thead>
                <tr>
                   
                    <th class="min-width-150">Ref Number</th>
                    <th class="min-width-100">To</th>
                    <th class="min-width-80">Type Invoice</th>
                    <th class="min-width-80">Attachment</th>
                    <th class="min-width-80">Issued By/Date</th>
                    <th class="min-width-80">@lang('app.status')</th>
                    <th class="min-width-80">@lang('app.action')</th>
                </tr>
                </thead>
                <tbody>
                    @if (count($users))
                         <tr>
                            <td> <a href="#">ID-0042991-2399120-2911</a></td>
                            <td> <a href="#">Company 1</a></td>
                            <td> Commercial</td>
                            <td> <a href="#">Attachment_1.pdf</a><br>
                            <a href="#">Attachment_4.xls </a></td>
                            <td> <a href="#">Staff 1 </a><br> 20/07/2021</td>
                            <td> Approved</td>
                            
                            <td>

                            <a href=""
                                style="padding: 2px;" class="text-dark"
                                title="Edit"
                                data-toggle="tooltip" data-placement="top">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <a href=""
                                style="padding: 2px;" class="text-dark"
                                title="Approval"
                                data-toggle="tooltip" data-placement="top">
                                    <i class="fas fa-check-double"></i>
                                </a>
                                
                                <a href=""
                                style="padding: 2px;" class="text-dark"
                                title="Edit"
                                data-toggle="tooltip" data-placement="top">
                                    <i class="fas fa-trash"></i>
                                </a>

                              
                            </td>
                        </tr>
                       
                    @else
                        <tr>
                            <td colspan="7"><em>@lang('app.no_records_found')</em></td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>

{!! $users->render() !!}

@stop

@section('scripts')
    <script>
        $("#status").change(function () {
            $("#users-form").submit();
        });
    </script>
@stop
