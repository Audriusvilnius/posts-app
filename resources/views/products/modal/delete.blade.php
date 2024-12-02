<div class="modal fade" id="deleteProduct{{ $product->id }}" tabindex="-1"
    aria-labelledby="deleteProduct{{ $product->id }}" aria-hidden="true" style="background-color: #80808090">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deleteProduct{{ $product->id }}">
                    {{ __('message.Delete reservation') }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                {{ __('message.Delete reservation') }}
                <b>
                    <i>
                        <code>
                            {{ $product->title }}
                        </code>
                        {{ __('?') }}
                    </i>
                </b>
                <div class="alert-danger rounded-1">
                    <i class="bi bi-exclamation-triangle-fill">
                        <small>{{ __('message.From ') }}
                            <code>{{ $product->booked_from }} - {{ $product->booked_to }}</code>
                        </small>
                    </i>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn rounded-1 btn-sm btn-secondary px-4"
                    data-bs-dismiss="modal">{{ __('message.Cancel') }}</button>
                <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i>
                        {{ __('message.Delete') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>
