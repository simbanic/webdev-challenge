@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">CSV Import</div>

                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="javascript:void(0)" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="file" class="col-md-4 control-label">CSV file to import</label>

                                <div class="col-md-6">
                                    <input id="csv_file" type="file" class="form-control" name="file" required>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary btn-submit">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="panel-body">
                        <table class="table table-hover table-bordered" border = "0" cellpadding = "10" width="100%"> 
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Category</th>
                                    <th>Total amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="3">No records</td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
