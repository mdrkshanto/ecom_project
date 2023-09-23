<ul class="nav navbar-nav">
    @foreach($categories as $category)
        <li class="level{{count($category->subcategories) > 0 ? ' sub-megamenu' : null}}">
            @if($category->subcategories)
                <span class="opener plus"></span>
            @endif
            <a href="{{route('category.products',['slug'=>$category->slug])}}" class="page-scroll">{{$category->name}} ({{count($category->products)}})</a>
            @if(count($category->subcategories) > 0)
                <div class="megamenu mobile-sub-menu" style="width:240px;">
                    <div class="megamenu-inner-top">
                        <ul class="sub-menu-level2">
                            @foreach($category->subcategories as $subcategory)
                                <li class="level3 small">
                                    <a href="{{route('subcategory.products',['slug'=>$subcategory->slug])}}"><span>■</span>{{$subcategory->name}} ({{$subcategory->products->count()}})</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif
        </li>
    @endforeach
</ul>
