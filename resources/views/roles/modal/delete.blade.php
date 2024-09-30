<div class="modal fade" id="deleteRoles{{ $role->id }}" tabindex="-1" aria-labelledby="deleteRoles{{ $role->id }}"
    aria-hidden="true" style="background-color: #80808090">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deleteRoles{{ $role->id }}">
                    {{ __('message.Delete role') }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                {{ __('message.Delete role') }}
                <b>
                    <i>
                        <code>
                            {{ $role->name }}
                        </code>
                        {{ __('?') }}
                    </i>
                </b>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn rounded-1 btn-sm btn-secondary px-4"
                    data-bs-dismiss="modal">{{ __('message.Cancel') }}</button>
                <form action="{{ route('roles.destroy', $role->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i>
                        {{ __('message.Delete') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>
