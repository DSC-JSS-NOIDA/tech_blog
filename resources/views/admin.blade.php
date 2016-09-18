@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Admin Dashboard</div>

                <div class="panel-body">
                    @if( $data == "1" )
                        {{ Html::linkaction('HomeController@stop','STOP TEST',[],['class' => 'btn']) }}
                    @else
                        {{ Html::linkaction('HomeController@start','START TEST',[],['class' => 'btn']) }}
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection