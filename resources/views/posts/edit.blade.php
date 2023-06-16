<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Category Edit') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('posts.update',$post->id) }}">
                        @csrf
                        @method('put')
                        <div class="mb-6">
                            <label class="block">
                                <span class="text-gray-700">Title</span>
                                <input type="text" name="title"
                                    class="block w-full @error('title') border-red-500 @enderror mt-1 rounded-md"
                                    placeholder="" value="{{old('title',$post->title)}}" />
                            </label>
                            @error('title')
                            <div class="text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label class="block">
                                <span class="text-gray-700">Slug</span>
                                <input type="text" name="slug"
                                    class="block w-full @error('slug') border-red-500 @enderror mt-1 rounded-md"
                                    placeholder="" value="{{old('slug',$post->slug)}}" />
                            </label>
                            @error('slug')
                            <div class="text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label class="block">
                                <span class="text-gray-700">Select Category</span>
                                <select name="category_id" class="block w-full mt-1 rounded-md">
                                    @foreach ($categories as $category)
                                    <option @selected($category->id == $post->category_id)
                                        value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </label>
                            @error('category_id')
                            <div class="text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label class="block">
                                <span class="text-gray-700">Description</span>
                                <textarea class="block w-full mt-1 rounded-md" name="description"
                                    rows="3">{{ $post->description}}</textarea>
                            </label>
                            @error('description')
                            <div class="text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit"
                            class="text-white bg-blue-600  rounded text-sm px-5 py-2.5">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>