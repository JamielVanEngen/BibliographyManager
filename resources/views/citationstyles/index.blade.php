@extends('layouts.app')

@section('page-title')
Manage your citation styles
@endsection

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Citation styles:</h3>
            </div>
            <div class="panel-body">
                <div class="list-group">
                    @foreach($styles as $style)
                        <div href="#" class="list-group-item citation-style-list-item" data-id="{{ $style->id }}">
                            <span class="">{{ $style->name }}</span>
                            <span class="dropdown" style="float: right; color: gray;">
                                <span class="citation-style-dropdown dropdown-toggle glyphicon glyphicon-option-vertical" id="dropdownMenu{{ $style->id }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                </span>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenu{{ $style->id }}">
                                    <li><a href="{{ action('CitationStyleController@edit', $style->id) }}">Edit</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="#">Delete</a></li>
                                </ul>
                            </span>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="panel-footer">
                    <a class="btn btn-default" href="{{ action('CitationStyleController@create') }}">Add</a>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Resource types:</h3>
            </div>
            <div class="panel-body">
                <div id="resource-types-list" class="list-group">
                    <p>Click on a citation style to view its resource types</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('user-scripts')
    <script type="text/javascript" src="{{ asset('js/citationstyles/index.js') }}"></script>
@endsection
