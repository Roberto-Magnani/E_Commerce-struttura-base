<x-layout>

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
    </div>

</x-layout>