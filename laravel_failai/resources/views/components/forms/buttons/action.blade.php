<sl-button-group label="Actions">
    @if($displayShowLink)
        <sl-tooltip content="{{__('general.show')}}">
            <sl-button
                size="small"
                pill
                variant="primary"
                outline
                href="{{ route($mainRoute . '.show', $model->id) }}"
            >
                <sl-icon name="eye" label="{{__('general.show')}}"></sl-icon>
            </sl-button>
        </sl-tooltip>
    @endif
    <sl-tooltip content="{{__('general.edit')}}">
        <sl-button
            size="small"
            pill
            variant="success"
            outline
            href="{{ route($mainRoute . '.edit', $model->id) }}"
        >
            <sl-icon name="pencil-square" label="{{__('general.edit')}}"></sl-icon>
        </sl-button>
    </sl-tooltip>
    <sl-tooltip content="{{__('general.delete')}}">
        <form action="" method="POST">
            @csrf
            @method('DELETE')
            <sl-button
                size="small"
                pill
                variant="danger"
                outline
            >
                <sl-icon name="trash" label="{{__('general.delete')}}"></sl-icon>
            </sl-button>
        </form>
    </sl-tooltip>
</sl-button-group>
