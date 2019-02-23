<div class="page-sidebar-wrapper">
    <div class="page-sidebar navbar-collapse collapse">
        <ul class="page-sidebar-menu  page-header-fixed page-sidebar-menu-hover-submenu page-sidebar-menu-compact" data-keep-expanded="false" 
            data-auto-scroll="true" data-slide-speed="200">
            @foreach(AdminMenu::$options as $options)
            @php ( $parent_selection =  in_array(Route::currentRouteName(), $options['selection']) ? "active" : "")
            @php ( $praent_link =  empty($options['children']) ? '/admin/'.$options['link'] : "javascript:;" )
            @php ( $praent_style =  empty($options['children']) ? "" : "nav-toggle" )
            <li class="nav-item start open {{$parent_selection}} ">
                <a href="{{$praent_link}}" class="nav-link {{$praent_style}}">
                    <i class="{{$options['icon']}}"></i>
                    <span class="title">{{$options['title']}}</span>
                     @if(in_array(Route::currentRouteName(), $options['selection']))
                    <span class="selected"></span>
                    @endif
                    @if(!empty($options['children']))
                        @if(in_array(Route::currentRouteName(), $options['selection']))
                        <span class="arrow open"></span>
                        @else
                            <span class="arrow"></span>
                        @endif
                    @endif
                </a>
                <ul class="sub-menu">
                    @foreach($options['children'] as $option)
                    @php ( $child_selection =  in_array(Route::currentRouteName(), $option['selection']) ? "active" : "")
                    <li class="nav-item start {{$child_selection}}">
                        <a href="/admin/{{$option['link']}}" class="nav-link ">
                            <i class="{{$option['icon']}}"></i>
                            <span class="title">{{$option['title']}}</span>
                            @if(in_array(Route::currentRouteName(), $option['selection']))
                                <span class="selected"></span>
                            @endif
                        </a>
                    </li>
                    @endforeach
                </ul>
            </li>
            @endforeach
        </ul>
    </div>
</div>