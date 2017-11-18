 <?php $settings =  array_dot($block->getSettings()); ?>

 <div class="row">
    <div class="col">  
        <div class="card with-form">
            <?php $icon = $block->getHeaderIcon(); ?>
            <div class="card-header sup card-header-icon red">
                @if(!empty($icon)) {!! $icon !!}  @endif
                <h4 class="card-title">{{ $block->getTitle() }}</h4>
            </div>
            
            <div class="card-body">                
                {!! $form !!}   
            </div>
        </div>     
    </div>  
</div>