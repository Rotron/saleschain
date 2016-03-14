@extends('layouts.app')
@section('title', ' - Profile')
@section('content')

<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <!-- <div class="panel-heading">Dashboard</div> -->
            <div class="panel-body">
                <br>
                <form class="form-horizontal" method="post" action="/profile">
                    {!! csrf_field() !!}
                    <div class="form-group">
                        <label class="col-sm-2 control-label" 
                            for="subscription">Subscription</label>
                        
                        <div class="col-sm-10">
                            
                            <select class="form-control" id="subscription" name="subscription">
                                
                                <option {!! ($sub == 'Platinum') ? 'selected' :'' !!}
                                        value="Platinum">Platinum</option>
                                <option {!! ($sub == 'Gold') ? 'selected' :'' !!}
                                        value="Gold">Gold</option>
                                <option {!! ($sub == 'Silver') ? 'selected' :'' !!}
                                        value="Silver">Silver</option>
                                <option {!! ($sub == 'Bronze') ? 'selected' :'' !!}
                                        value="Bronze">Bronze</option>
                            </select>
                        </div>
                    </div>
                    <br>
                    
                    <div class="col-sm-2"></div>
                    <button type="submit" class="col-sm-10 btn btn-success">
                        Send Change-Subscription Request
                    </button>

                </form>
            </div> <!-- end of panel-body -->
        </div>  <!-- end of panel (search) -->
    </div> <!-- end of col -->
</div> <!-- end of row -->

@endsection


@section('scripts')
<script>
(function () {
    $("li.active").removeClass('active');
    $("li.User").addClass('active');
})();
</script>

@stop