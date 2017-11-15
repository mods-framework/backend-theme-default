<div class="row">
    <div class="col-sm-12 col-md-8 col-lg-8">
        @foreach (session('flash_notification', collect())->toArray() as $message)
            @if ($message['overlay'])
                <div class="modal fade in flash-overlay-modal" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">{{ $message['title'] }}</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>{!!  $message['message'] !!}</p> 
                            </div>    
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>    
                </div>
                <script>
                    funcQueue.add(function(){
                        $('.flash-overlay-modal').modal();
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
</div>    