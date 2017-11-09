 <?php $settings =  array_dot($block->getSettings()); ?>

 <div class="row">
  <div class="card with-form col s12">
    <?php $icon = $block->getHeaderIcon(); ?>
    @if(!empty($icon))
    <div class="card-header sup card-header-icon red accent-2">
        {!! $icon !!}   
    </div>
    @endif
    <div class="card-content">

        <h4 class="card-title">{{ $block->getTitle() }}</h4>
        {!! $form !!}   

    </div>
  </div>  
</div>