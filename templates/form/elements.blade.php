{!! $formOpen !!}

  <?php $groupStack = []; ?>


  @foreach ($formFields as $field)
    @if(!is_null($field->getGroup()))
      <?php $groupName = $field->getGroup(); ?>
    @else
      <?php $groupName = $field->getName(); ?>
    @endif
    @push($groupName)
      @if($field->getType() == 'markdown')

        <div class="file-field @if(!is_null($field->getGroup())){{ array_get($settings, 'group.class.'.$groupName, 's3') }}@else s12 @endif">
            {!! $field->getLabel() !!}
            {!! $field !!}
            <script>
            var editor = new SimpleMDE({ 
              autoDownloadFontAwesome: false,
              element: document.getElementById('{{$field->getId()}}'),
              forceSync: true,
              promptURLs: true,
              jQValidation: true
            });

            editor.codemirror.on("change", function() {
                var element = $(editor.element);
                $(element).val(editor.value());
                $(element).trigger('keyup');
            });

            editor.codemirror.on("focus", function() {
                $(editor.element).trigger('focus');
            });

            editor.codemirror.on("blur", function() {
                $(editor.element).trigger('blur');
            });
            </script>
        </div>

      @elseif($field->getType() == 'html')  

        {!! $field !!}

      @elseif($field->getType() == 'file')

         <div class="file-field input-field  @if(!is_null($field->getGroup())){{ array_get($settings, 'group.class.'.$groupName, 's3') }}@else s12 @endif">
            <div class="btn">
              <span>{{ $field->getLabel()->getLabelTxt() }}</span>
              {!! $field !!}
            </div>
            <div class="file-path-wrapper">
              <input class="file-path {{$field->getClass()}}" type="text">
            </div>
          </div>

      @else
        <div class="@if(!in_array($field->getType(), ['radio', 'checkbox']))input-field @endif col @if(!is_null($field->getGroup())){{ array_get($settings, 'group.class.'.$groupName, 's3') }}@else s12 @endif">
          {!! $field !!}
          {!! $field->getLabel() !!}
          @if ($block->hasError($field->getName())) 
            <label id="{{$field->getName()}}-error" class="invalid" for="{{$field->getName()}}">{{ $block->getError($field->getName()) }}</label>
          @endif
        </div>
      @endif
    @endpush
    <?php $groupStack[$groupName] = $groupName; ?>
  @endforeach

  @foreach ($groupStack as $group)
    <div class="row">
      @stack($group)
    </div>
  @endforeach

{!! $formClose !!}