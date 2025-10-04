<!-- resources/views/articles/index.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">Daftar Artikel</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{ route('articles.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded">+ Tambah Artikel</a>
            <div class="mt-4 bg-white shadow-sm sm:rounded-lg p-6">
                @foreach ($articles as $article)
                    <div class="mb-4 border-b pb-2">
                        <h3 class="text-lg font-bold">{{ $article->title }}</h3>
                        <p>{{ $article->content }}</p>

                        @can('update', $article)
                            <a href="{{ route('articles.edit', $article) }}" class="text-blue-500">Edit</a>
                        @endcan
                        @can('delete', $article)
                            <form action="{{ route('articles.destroy', $article) }}" method="POST" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500">Hapus</button>
                            </form>
                        @endcan
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
