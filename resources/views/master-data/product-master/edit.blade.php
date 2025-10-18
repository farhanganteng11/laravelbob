<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Product
        </h2>
    </x-slot>
    
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="bg-white shadow sm:rounded-lg">
                <div class="p-6 lg:p-8">
                    
                    <h2 class="mb-8 text-3xl font-bold text-gray-800">Edit Product</h2>
                    
                    {{-- Status untuk pesan sukses/gagal --}}
                    <x-auth-session-status class="mb-4" :status="session('success')" />

                    {{-- FORM DIMULAI --}}
                    {{-- Action mengarah ke route product-update dan mengirim objek $product --}}
                    <form action="{{ route('product-update', $product)}}" method="POST" class="space-y-6"> 
                        @csrf 
                        @method('PUT') {{-- PENTING: Untuk override method menjadi PUT/PATCH --}}
                        
                        {{-- Product Name --}}
                        <div class="form-group">
                            <label for="product_name" class="block text-sm font-medium text-gray-700 mb-1">Product Name</label>
                            <input type="text" id="product_name" name="product_name"
                                class="block w-full p-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                value="{{ old('product_name', $product->product_name) }}" 
                                required>
                        </div>
        
                        {{-- Unit --}}
                        <div class="form-group">
                            <label for="unit" class="block text-sm font-medium text-gray-700 mb-1">Unit</label>
                            <select id="unit" name="unit"
                                class="block w-full p-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                required>
                                <option value="" disabled>Select a unit</option>
                                {{-- Menggunakan @selected untuk memilih nilai lama/saat ini --}}
                                <option value="kg" @selected(old('unit', $product->unit) == 'kg')>Kilogram (kg)</option>
                                <option value="ltr" @selected(old('unit', $product->unit) == 'ltr')>Liter (ltr)</option>
                                <option value="pcs" @selected(old('unit', $product->unit) == 'pcs')>Pieces (pcs)</option>
                                <option value="box" @selected(old('unit', $product->unit) == 'box')>Box</option>
                            </select>
                        </div>
                        
                        {{-- Type --}}
                        <div class="form-group">
                            <label for="type" class="block text-sm font-medium text-gray-700 mb-1">Type</label>
                            <input type="text" id="type" name="type"
                                class="block w-full p-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                value="{{ old('type', $product->type) }}" 
                                required>
                        </div>
                        
                        {{-- Information --}}
                        <div class="form-group">
                            <label for="information" class="block text-sm font-medium text-gray-700 mb-1">Information</label>
                            <textarea id="information" name="information" rows="3"
                                class="block w-full p-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm resize-y"
                                >{{ old('information', $product->information) }}</textarea> {{-- Value untuk textarea di antara tag --}}
                        </div>
        
                        {{-- Quantity --}}
                        <div class="form-group">
                            <label for="qty" class="block text-sm font-medium text-gray-700 mb-1">Quantity</label>
                            <input type="number" id="qty" name="qty"
                                class="block w-full p-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                value="{{ old('qty', $product->qty) }}" 
                                required>
                        </div>
        
                        {{-- Producer --}}
                        <div class="form-group">
                            <label for="producer" class="block text-sm font-medium text-gray-700 mb-1">Producer</label>
                            <input type="text" id="producer" name="producer"
                                class="block w-full p-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                value="{{ old('producer', $product->producer) }}" 
                                required>
                        </div>
                        <div class="pt-2">
                            <button type="submit"
                                class="px-6 py-2 bg-blue-600 text-white border rounded hover:bg-blue-700">
                                Update Product
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>