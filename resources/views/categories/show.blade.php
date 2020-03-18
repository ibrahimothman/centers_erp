<!-- categories.show -->
<li>
    <label class="checkbox"><input value="{{ $category->id }}" class="categories" type="checkbox">{{$category->name}}</label>
    @foreach ($category->children as $childCategory)
        <ul>
            @include('categories.show', ['category' => $childCategory])
        </ul>
    @endforeach
</li>
