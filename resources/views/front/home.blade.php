@section('front-content')
    <div class="container">
        <div class="row justify-content-center ">
            <div class="col-md-12 justify-content-center d-flex">
                <h1>Welcome to the Home Page</h1>
            </div>
            @forelse ($products as $product)
                <div class="col-md-12">
                    <div class="card">
                        {{ $product->booked_from }} - {{ $product->booked_to }}
                        {{ $product->user->name }} {{ $product->deference }}min
                        {{-- <img src="{{ asset('storage/' . $produkt->image) }}" class="card-img-top" alt="{{ $produkt->name }}"> --}}
                        <div class="card-body">
                            <h5 class="card-title
                            ">{{ $product->name }}</h5>
                            <p class="card-text">{{ $product->detail }}</p>
                            {{-- <a href="{{ route('produkts.show', $product->id) }}" class="btn btn-primary">View</a> --}}
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-md-12">
                    <p>No products found</p>
                </div>
            @endforelse
        </div>
    </div>
@endsection
