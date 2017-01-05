@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">PDF Generator</div>

                <div class="panel-body">
                    Generate The PDF<br><br>
                    {{Form::open(array('url'=>'/openpdf','files'=>true))}} <br>
                    {{Form::label('','',array('id'=>'','class'=>''))}} <br>
                    {{Form::file('file','',array('id' =>'', 'class'=>''))}} <br>
                    <BUTTON type="submit" Name="loadFile">PDF Generate</BUTTON> 
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
