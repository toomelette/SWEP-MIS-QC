@extends('layouts.admin-master')

@section('content')

<section class="content-header">
    <h1>Create Voucher</h1>
</section>

<section class="content">

    <div class="box">
        
      <div class="box-header with-border">
        <h3 class="box-title">Form</h3>
      </div>
      
      <form role="form" method="POST" autocomplete="off" action="{{ route('dashboard.disbursement_voucher.store') }}">

        <div class="box-body">
     
          @csrf    

          {!! FormHelper::select_dynamic(
            '4', 'project_id', 'Station:', old('project_id'), $global_projects_all, 'project_id', 'project_address', $errors->has('project_id'), $errors->first('project_id'), ''
          ) !!}

          {!! FormHelper::select_dynamic(
            '4', 'fund_source', 'Fund Source:', old('fund_source'), $global_fund_source_all, 'fund_source_id', 'description', $errors->has('fund_source'), $errors->first('fund_source'), ''
          ) !!}

          {!! FormHelper::select_dynamic(
            '4', 'mode_of_payment', 'Mode Of Payment:', old('mode_of_payment'), $global_mode_of_payment_all, 'mode_of_payment_id', 'description', $errors->has('mode_of_payment'), $errors->first('mode_of_payment'), ''
          ) !!}


          {!! FormHelper::textbox(
            '6', 'payee', 'text', 'Payee:', 'Payee', old('payee'), $errors->has('payee'), $errors->first('payee'), ''
          ) !!}

          {!! FormHelper::textbox(
            '3', 'tin', 'text', 'TIN/Employee No:', 'TIN / Employee No', old('tin'), $errors->has('tin'), $errors->first('tin'), ''
          ) !!}

          {!! FormHelper::textbox(
            '3', 'bur_no', 'text', 'BUR No:', 'BUR No', old('bur_no'), $errors->has('bur_no'), $errors->first('bur_no'), ''
          ) !!}


          {!! FormHelper::textbox(
            '6', 'address', 'text', 'Address:', 'Address', old('address'), $errors->has('address'), $errors->first('address'), ''
          ) !!}

          {!! FormHelper::select_dynamic(
            '2', 'department_name', 'Department:', old('department_name'), $global_departments_all, 'name', 'name', $errors->has('department_name'), $errors->first('department_name'), ''
          ) !!}

          {!! FormHelper::select_dynamic(
            '2', 'department_unit_name', 'Unit:', old('department_unit_name'), $global_department_units_all, 'name', 'name', $errors->has('department_unit_name'), $errors->first('department_unit_name'), ''
          ) !!}

          {!! FormHelper::select_dynamic(
            '2', 'account_code', 'Account Code:', old('account_code'), $global_accounts_all, 'account_code', 'account_code', $errors->has('account_code'), $errors->first('account_code'), ''
          ) !!}

          {!! FormHelper::textarea(
            '10', 'explanation', 'Explanation', old('explanation'), $errors->has('explanation'), $errors->first('explanation'), ''
          ) !!}

          {!! FormHelper::textbox_numeric(
            '2', 'amount', 'text', 'Amount:', 'Amount', old('amount'), $errors->has('amount'), $errors->first('amount'), ''
          ) !!}

        </div>

        <div class="box-footer">
          <button type="submit" class="btn btn-default">Save</button>
        </div>

      </form>

    </div>

</section>

@endsection


@section('modals')

  @include('modals.disbursement_voucher.create')

@endsection 


@section('scripts')

  @include('scripts.disbursement_voucher.create')
    
@endsection