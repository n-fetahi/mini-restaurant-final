<x-admin.layout>
    <x-slot name="title">Products</x-slot>
    <x-admin.page-title>Add new product</x-admin.page-title>



        <form action="/admin/products" method="POST" class="container w-50 mt-5 card py-3 shadow"  enctype="multipart/form-data">
        @csrf
            <x-shared.input-field
             name="name"
             placeholder="Coffee"
             value="{{ old('name') }}"
             id="name"
             > Name </x-shared.input-field>


            <x-shared.input-field
             type="number"
             name="price"
             placeholder="200"
             value="{{ old('price') }}"
             id="price"
             > Price </x-shared.input-field>

            <x-shared.input-field
             type="textarea"
             name="description"
             value="{{ old('description') }}"
             id="description"
             > Description </x-shared.input-field>


            <x-shared.input-field
            type="file"
            name="image"
            id="image"
            > Image </x-shared.input-field>

            <x-shared.submit-button>Create</x-shared.submit-button>

    </form>
</x-admin.layout>
