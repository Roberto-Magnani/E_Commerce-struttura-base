@if(session()->has('success'))
    <div class="alert alert-success text-center">
        {{ session('success') }}
    </div>
@endif

<form class="bg-body-tertiary shadow rounded p-5 my-5" wire:submit="store">
    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control" @error('title') is-invalid @enderror id="title" wire:model.blur="title">
        @error('title') 
            <p class="fst-italic text-danger">{{ $message }}</p> 
        @enderror
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control" id="description" @error('description') is-invalid @enderror wire:model.blur="description" rows="10" cols="30"></textarea>
        @error('description') 
            <p class="fst-italic text-danger">{{ $message }}</p> 
        @enderror
    </div>
    <div class="mb-3">
        <label for="price" class="form-label">Price</label>
        <input type="text" class="form-control" @error('price') is-invalid @enderror id="price" wire:model.blur="price">
        @error('price') 
            <p class="fst-italic text-danger">{{ $message }}</p> 
        @enderror
    </div>
    <div class="mb-3">
        <select id="category" class="form-control" @error('category') is-invalid @enderror wire:model.blur="category">
            <option label disabled>Select a category</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        @error('category') 
            <p class="fst-italic text-danger">{{ $message }}</p> 
        @enderror
    </div>
    <div class="d-flex justify-content-center">
        <button type="submit" class="btn btn-dark">Submit</button>
    </div>
</form>