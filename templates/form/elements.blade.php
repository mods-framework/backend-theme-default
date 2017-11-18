{!! $formOpen !!}

  <?php $groupStack = []; ?>


  @foreach ($formFields as $field)
    @if(!is_null($field->getGroup()))
      <?php $groupName = $field->getGroup(); ?>
    @else
      <?php $groupName = $field->getName(); ?>
    @endif
    @push($groupName)
      <div class="form-group row">
          <div class="@if(!is_null($field->getGroup())){{ array_get($settings, 'group.class.'.$groupName, 'col-sm-3') }}@else col-sm-12 @endif">
            @if($field->getType() == 'editor')
              {!! $field->getLabel() !!}
              <div class="form-control with-editor">                     
                <div id="{{$field->getId()}}-container" class="pell editor" style="height: 350px;"></div>
                {!! $field !!}
              </div>  
              <script>
                funcQueue.add(function() {
                  $('#{{$field->getId()}}').css({
                      "visibility":"hidden",
                      "height":"0px",
                      "display": "block"
                  });
                  $('#{{$field->getId()}}-container').summernote({
                    height: 300,
                    callbacks: {
                        onFocus: function() {
                          $('#{{$field->getId()}}').trigger('focus');
                        },
                        onBlur: function() {
                          $('#{{$field->getId()}}').trigger('blur');
                        },
                        onChange: function(contents, $editable) {
                          var element = $('#{{$field->getId()}}');
                          if ($('#{{$field->getId()}}-container').summernote('isEmpty')) {
                            contents = '';
                          }else if(contents=='<p><br></p>'){
                            contents = '';
                          }
                          element.val(contents);
                          element.trigger('keyup');
                        }
                    }
                  });
                });
              </script>

            @elseif($field->getType() == 'html')  
                {!! $field !!}
            @else
                {!! $field->getLabel() !!}
                {!! $field !!}
            @endif
            @if ($block->hasError($field->getName())) 
                <div class="invalid-feedback">{{ $block->getError($field->getName()) }}</div>
            @endif
          </div>
      </div>
    @endpush
    <?php $groupStack[$groupName] = $groupName; ?>
  @endforeach

  @foreach ($groupStack as $group)    
      @stack($group)
  @endforeach

{!! $formClose !!}