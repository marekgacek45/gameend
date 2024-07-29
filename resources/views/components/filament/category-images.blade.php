@props(['categories'])

<div style="display: flex; gap: 10px;">
    @foreach ($categories as $category)
        {{-- <img src="{{asset('storage/' . $category->thumbnail)  }}" alt="{{ $category->title }}" style="width: 40px; height: 40px; border-radius: 50%;"> --}}
        <p>test</p>
    @endforeach
</div>