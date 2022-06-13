<ul class="roots">
    @if (Session::get('sorting') == 3)
        @foreach($children->sortBy('name') as $child)
            <li class="child_nodes">
                {{ $child->name }}
                @if(count($child->children))
                    @include('manageChildren',['children' => $child->children])
                @endif
            </li>
        @endforeach
    
    @elseif (Session::get('sorting') == 4)
        @foreach($children->sortByDesc('name') as $child)
            <li class="child_nodes">
                {{ $child->name }}
                @if(count($child->children))
                    @include('manageChildren',['children' => $child->children])
                @endif
            </li>
        @endforeach
    
    @elseif (Session::get('sorting') == 5)
        @foreach($children->sortBy('name') as $child)
            <li class="child_nodes">
                {{ $child->name }}
                @if(count($child->children))
                    @include('manageChildren',['children' => $child->children])
                @endif
            </li>
        @endforeach
    
    @elseif (Session::get('sorting') == 4)
        @foreach($children->sortByDESC('name') as $child)
            <li class="child_nodes">
                {{ $child->name }}
                @if(count($child->children))
                    @include('manageChildren',['children' => $child->children])
                @endif
            </li>
        @endforeach
    
    @else
        @foreach($children as $child)
            <li class="child_nodes">
                {{ $child->name }}
                @if(count($child->children))
                    @include('manageChildren',['children' => $child->children])
                @endif
            </li>
        @endforeach
    @endif
</ul>