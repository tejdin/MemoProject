<div class="message">
    @if(session('error'))
        <div class="alert alert-danger mt-3">
            {{ session('error') }}
        </div>
    @endif
    @if(session('succes'))
        <div class="alert alert-success mt-3">
            {{ session('succes') }}
        </div>
    @endif
</div>


