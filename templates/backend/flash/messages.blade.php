<div class="col s12">
    @foreach (session('flash_notification', collect())->toArray() as $message)
        @if ($message['overlay'])
            <div id="flash-overlay-modal" class="modal modal-fixed-footer">
                <div class="modal-content">
                    <h4 class="modal-title">{{ $message['title'] }}</h4>
                    <p>{!!  $message['message'] !!}</p>        
                </div>
                <div class="modal-footer">
                    <a href="javascript:void(0);" class="modal-action modal-close waves-effect waves-green btn-flat ">Close</a>
                </div>
            </div>
            <script>
                funcQueue.add(function(){
                    $('#flash-overlay-modal').modal('open');
                });
            </script>
        @else
            <div class="alert alert-{{ $message['level'] }} alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

                {!! $message['message'] !!}
            </div>
        @endif
    @endforeach

    {{ session()->forget('flash_notification') }}
</div>