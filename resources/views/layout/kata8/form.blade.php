<form action="{{ $action }}" id="{{ $formId }}" method="post">
    @csrf
    <div class="form-group">
        {{ $formContent }}
    </div>
</form>
