<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Treeview</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
    <link href="/css/treeview.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.0/dist/jquery.slim.min.js"></script>
</head>
<body>
    <div class="jumbotron">
        <h1 class="display-4 ms-5">Tree view</h1>
        <hr class="">
    </div>
    <div class="container">     
        <div class="row">
            <div class="col-md-3">
                <h6>Add new node</h6>
                <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#addNewNode">Add new node</button>

                <h6>Delete node</h6>
                <button type="button" class="btn btn-danger mb-3" data-bs-toggle="modal" data-bs-target="#deleteNode">Delete node</button>
                
                <h6>Update node</h6>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updateNode">Update node</button>
                
                <div class="mt-4">
                    <span class="text-danger">{{ $errors->first('id') }}</span>
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                    <span class="text-danger">{{ Session::get('err'); }}</span>
                </div>
            </div>

            <div class="col-md-3">
                <h6>Move node</h6>
                <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#moveNode">Move nodes</button>

                <h6>Sort nodes by</h6>
                <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#sortNodes">Sort nodes by</button>
                
                <h6>Expand/collapse all nodes</h6>
                <button class="btn btn-warning" onclick="rozwin()">Expand/collapse</button>
            </div>

            <div class="col-md-3">
                <h4 class="mb-4">Nodes</h4>
                <ul id="tree_struct" class="roots">
                    @if (Session::get('sorting') == 1)
                        @foreach($nodes->sortBy('name') as $node)
                            <li class="child_nodes">
                                {{ $node->name }}
                                @if(count($node->children))
                                    @include('manageChildren',['children' => $node->children])
                                @endif
                            </li>
                        @endforeach

                    @elseif (Session::get('sorting') == 2)
                        @foreach($nodes->sortByDesc('name') as $node)
                            <li class="child_nodes">
                                {{ $node->name }}
                                @if(count($node->children))
                                    @include('manageChildren',['children' => $node->children])
                                @endif
                            </li>
                        @endforeach
                    
                    @elseif (Session::get('sorting') == 5)
                        @foreach($nodes->sortBy('name') as $node)
                            <li class="child_nodes">
                                {{ $node->name }}
                                @if(count($node->children))
                                    @include('manageChildren',['children' => $node->children])
                                @endif
                            </li>
                        @endforeach
                    
                    @elseif (Session::get('sorting') == 6)
                        @foreach($nodes->sortByDesc('name') as $node)
                            <li class="child_nodes">
                                {{ $node->name }}
                                @if(count($node->children))
                                    @include('manageChildren',['children' => $node->children])
                                @endif
                            </li>
                        @endforeach

                    @else
                        @foreach($nodes as $node)
                            <li class="child_nodes">
                                {{ $node->name }}
                                @if(count($node->children))
                                    @include('manageChildren',['children' => $node->children])
                                @endif
                            </li>
                            @endforeach
                    @endif
                </ul>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addNewNode" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add new node</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {!! Form::open(['route'=>'add.node']) !!}
                    <div class="form-group mb-2">
                        {!! Form::label('Name:') !!}
                        {!! Form::text('name', old('name'), ['class'=>'form-control', 'placeholder'=>'Enter name']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('Node (optional):') !!}
                        {!! Form::select('parent_id', $allNodes, old('parent_id'), ['id'=>'mySelect', 'multiple'=>false, 'class'=>'form-control', 'placeholder'=>'Select node']) !!}
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="form-group">
                        <button class="btn btn-success">Add New</button>
                    </div>
                    {!! Form::close() !!}
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteNode" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete node</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {!! Form::open(['route'=>'delete.node']) !!}
                    <div class="form-groups mb-2">
                        {!! Form::label('Node:') !!}
                        {!! Form::select('id', $allNodes, old('parent_id'), ['id'=>'mySelect1', 'multiple'=>false, 'class'=>'form-control', 'placeholder'=>'Select node']) !!}
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="form-group">
                        <button class="btn btn-danger">Delete</button>
                    </div>
                    {!! Form::close() !!}
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="updateNode" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update node</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {!! Form::open(['route'=>'update.node']) !!}
                    <div class="form-group mb-2">
                        {!! Form::label('Node:') !!}
                        {!! Form::select('id', $allNodes, old('parent_id'), ['id'=>'mySelect2', 'multiple'=>false, 'class'=>'form-control', 'placeholder'=>'Select Node']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('Name:') !!}
                        {!! Form::text('name', old('name'), ['class'=>'form-control', 'placeholder'=>'Enter Name']) !!}
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="form-group">
                        <button class="btn btn-primary">Update</button>
                    </div>
                    {!! Form::close() !!}
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="moveNode" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Move node</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {!! Form::open(['route'=>'move.node']) !!}
                    <div class="form-group mb-2">
                        {!! Form::label('Node:') !!}
                        {!! Form::select('id', $allNodes, old('parent_id'), ['id'=>'mySelect3', 'multiple'=>false, 'class'=>'form-control', 'placeholder'=>'Select node']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('New location (optional):') !!}
                        {!! Form::select('id1', $allNodes, old('parent_id'), ['id'=>'mySelect4', 'multiple'=>false, 'class'=>'form-control', 'placeholder'=>'Select node']) !!}
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="form-group">
                        <button class="btn btn-primary">Move</button>
                    </div>
                    {!! Form::close() !!}
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="sortNodes" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Sort nodes</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {!! Form::open(['route'=>'sort.nodes']) !!}
                    <div class="form-group">
                        {!! Form::label('Node:') !!}
                        <select class="form-control" name="selection_list" required>
                            <option selected>Choose</option>
                            <option value="0">Default</option>
                            <option value="1">Sort roots by name ASC</option>
                            <option value="2">Sort roots by name DESC</option>
                            <option value="3">Sort child nodes by name ASC</option>
                            <option value="4">Sort child nodes by name DESC</option>
                            <option value="5">Sort all nodes by name ASC</option>
                            <option value="6">Sort all nodes by name DESC</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="form-group">
                        <button class="btn btn-success">Sort</button>
                    </div>
                    {!! Form::close() !!}
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script src="js/treeview.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script>
</body>
</html>