<x-layout>

    @if (session()->has('errorMessage'))
        <div class="alert alert-danger text-center">
            {{ session('errorMessage') }}
        </div>
    @endif

    <div class="container-fluid text-center bg-body-tertiary">
        <div class="row vh-100 justify-content-center align-items-center">
            <div class="col-12">
                <h1 class="display-4">
                    E-commerce
                </h1>
                <div class="my-3">
                    @auth
                        <a href="{{ route('create.article') }}" class="btn btn-dark">Crea Articolo</a>
                    @endauth
                </div>
            </div>
        </div>
        <div class="row height-custom justify-content-center align-items-center py-5">
            @forelse ($articles as $article)
                <div class="col-12 col-md-3">
                    <x-card :article="$article" />
                </div>
            @empty
                <div class="col-12">
                    <h3 class="display-4 text-center">
                        Nessun articolo disponibile
                    </h3>
                </div>
            @endforelse
        </div>
    </div>

</x-layout>
