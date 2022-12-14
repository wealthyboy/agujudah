
@extends('admin.layouts.app')

@section('content')

<div class="row">
        <div class="col-md-10">
            @include('errors.errors')
            <div class="card">
                <form id="" action="{{ route('permissions_create') }}" method="post">
                {{ csrf_field() }}
                    <div class="card-content">
                        <h4 class="card-title">Permissions</h4>
                        <div class="form-group label-floating">
                            <label class="control-label">
                                Permissions
                                <small>*</small>
                            </label>
                            <input class="form-control"
                                   name="name"
                                   type="text"
                                   required="true"
                             />
                        </div>

                        <div class="checkbox">
                            <label>
                                <input value="1" type="checkbox" name="code[]" >
                                Activity
                            </label>
                        </div>

                        <div class="checkbox">
                            <label>
                                <input value="2" type="checkbox" name="code[]">
                                Create 
                            </label>
                        </div>
                            
                        <div class="checkbox">
                            <label>
                                <input value="3"  type="checkbox" name="code[]"  checked="checked">
                                Read
                            </label>
                        </div>
                            
                        <div class="checkbox ">
                            <label>
                                <input value="4" type="checkbox" name="code[]" >
                                Update
                            </label>
                        </div>
                            
                        <div class="checkbox ">
                            <label>
                                <input  value="5" type="checkbox" name="code[]" >
                                Delete
                            </label>
                        </div>
                            
                        <div class="form-footer text-right">
                            <button type="submit" class="btn btn-rose btn-round  btn-fill">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection

@section('inline-scripts')
$(document).ready(function() {
		$('#datatables').DataTable({
			"pagingType": "full_numbers",
			"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
			responsive: true,
			language: {
			search: "_INPUT_",
			searchPlaceholder: "Search records",
			}

		});


		var table = $('#datatables').DataTable();

		// Edit record
		table.on( 'click', '.edit', function () {
			$tr = $(this).closest('tr');

			var data = table.row($tr).data();
			alert( 'You press on Row: ' + data[0] + ' ' + data[1] + ' ' + data[2] + '\'s row.' );
		} );

		// Delete a record
		table.on( 'click', '.remove', function (e) {
			$tr = $(this).closest('tr');
			table.row($tr).remove().draw();
			e.preventDefault();
		} );

		//Like record
		table.on( 'click', '.like', function () {
			alert('You clicked on Like button');
		});

		$('.card .material-datatables label').addClass('form-group');
	});
@stop






