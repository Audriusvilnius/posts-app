<div class="modal fade" id="deletePermission{{ $permission->id }}" tabindex="-1"
    aria-labelledby="deletePermission{{ $permission->id }}" aria-hidden="true" style="background-color: #80808090">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deletePermission{{ $permission->id }}">
                    {{ __('message.Delete permission') }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                {{ __('message.Delete permission') }}
                <b>
                    <i>
                        <code>
                            {{ $permission->name }}
                        </code>
                        {{ __('?') }}
                    </i>
                </b>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn rounded-1 btn-sm btn-secondary px-4"
                    data-bs-dismiss="modal">{{ __('message.Cancel') }}</button>
                <form action="{{ route('permissions.destroy', $permission->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i>
                        {{ __('message.Delete') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>
