@foreach (config('menu') as $key=> $menu)

    @if(count($menu['children']))
        <li class="@if(isset($curMenu) &&$curMenu==$key) active @endif treeview">
            <a href="#"><i class="fa fa-link"></i> <span>{{$menu['text']}}</span> <i
                        class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
                @foreach($menu['children'] as $subKey=>$subMenu)
                    <li><a href="{{$subMenu['href']}}">{{$subMenu['text']}}</a></li>
                @endforeach
            </ul>
        </li>
    @else
        <li class="@if($curMenu==$key) active @endif"><a href="#"><i class="fa fa-link"></i>
                <span>{{$menu['text']}}</span></a></li>
    @endif

@endforeach