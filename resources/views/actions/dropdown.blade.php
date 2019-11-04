@component($typeForm,get_defined_vars())
    <button
        @include('platform::partials.fields.attributes', ['attributes' => $attributes])
            data-toggle="dropdown"
            aria-expanded="false"
    >
        <i class="{{ $icon ?? '' }} m-r-xs"></i>
        {{ $name ?? '' }}
    </button>

    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow bg-white text-dark"
         x-placement="bottom-end"
    >
        @foreach($list as $item)
            {!!  $item->class($item->get('class').' text-dark')->build($source) !!}
        @endforeach
    </div>
@endcomponent
