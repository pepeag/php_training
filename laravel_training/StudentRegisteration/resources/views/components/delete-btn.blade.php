<div class="d-inline-block">
    <button class="me-3 border-0 bg-transparent"
        onclick="document.getElementById('delete-form-{{ $id }}').submit()"><i
            class="fas fa-trash text-danger"></i></button>
    <form style="display: none" action="{{ $url }}" id="delete-form-{{ $id }}" method="POST">
        @csrf
        @method("DELETE")
    </form>
</div>
