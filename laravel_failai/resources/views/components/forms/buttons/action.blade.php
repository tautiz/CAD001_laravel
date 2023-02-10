<sl-button-group label="Actions">
    @if($displayShowLink)
        <sl-tooltip content="{{__('messages.show')}}">
            <sl-button
                size="small"
                pill
                variant="primary"
                outline
                href="{{ route($mainRoute . '.show', $model->id) }}"
            >
                <sl-icon name="eye" label="{{__('messages.show')}}"></sl-icon>
            </sl-button>
        </sl-tooltip>
    @endif
    <sl-tooltip content="{{__('messages.edit')}}">
        <sl-button
            size="small"
            pill
            variant="success"
            outline
            href="{{ route($mainRoute . '.edit', $model->id) }}"
        >
            <sl-icon name="pencil-square" label="{{__('messages.edit')}}"></sl-icon>
        </sl-button>
    </sl-tooltip>
    <sl-tooltip content="{{__('messages.delete')}}">
        <form action="" method="POST">
            @csrf
            @method('DELETE')
            <sl-button
                size="small"
                pill
                variant="danger"
                outline
            >
                <sl-icon name="trash" label="{{__('messages.delete')}}"></sl-icon>
            </sl-button>
        </form>
    </sl-tooltip>
</sl-button-group>
