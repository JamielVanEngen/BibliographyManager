@extends('layouts.app')

@section('page-title')
Manage your citation styles
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
            <div class="list-group" id="citation-style-list">
                @foreach($styles as $style)
                    <div class="list-group-item citation-style-list-item" data-id="{{ $style->id }}">
                        <span class="">{{ $style->name }}</span>
                        <span class="dropdown option-dropdown">
                            <span class="citation-style-dropdown dropdown-toggle glyphicon glyphicon-option-vertical" id="dropdownMenu{{ $style->id }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            </span>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu{{ $style->id }}">
                                <li><a href="{{ action('CitationStyleController@edit', $style->id) }}">Edit</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="#">Delete</a></li>
                            </ul>
                        </span>
                        <div class="resource-types-list">
                        </div>
                    </div>
                @endforeach
            </div>
            <a class="btn btn-primary" data-toggle="modal" data-target="#create-citation-style-modal">Add</a>
        </div>
    </div>
    <!--<div class="col-md-6">
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
    </div>-->
</div>

<div id="create-citation-style-modal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Create a citation style</h4>
      </div>
      <div class="modal-body">
          <form class="form-horizontal" role="form">
              <div class="form-group">
                  <label for="name" class="col-md-2 control-label">Name</label>
                  <div class="col-md-6">
                      <input id="new-citation-style-name" type="text" class="form-control" name="name" value="{{ old('name') }}" required>
                  </div>
              </div>
          </form>
      </div>
      <div class="modal-footer">
          <button id="add-citation-style" type="button" class="btn btn-primary pull-left">Add</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
@endsection

@section('user-scripts')
    <script type="text/javascript" src="{{ asset('js/citationstyles/index.js') }}"></script>
@endsection
