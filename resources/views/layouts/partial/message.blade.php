

@if(session('successMsg'))
    <div class="alert alert-success">
        <button onclick="this.parentElement.style.display='none';" type="button" class="close" data-dismiss="alert" aria-label="Close">
            <i class="material-icons">close</i>
        </button>
        <span>
                                    {{ session('successMsg') }}
                                </span>
    </div>
@endif
