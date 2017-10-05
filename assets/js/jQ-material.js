var validation = $.isFunction($.fn.valid) ? 1 : 0;

$.fn.isValid  = function() {
   if(validation){
      return this.valid();
   } else {
      return true;
   }
};

if (validation) {
   $.validator.setDefaults({
      errorClass: 'invalid',
      validClass: "valid",
      errorPlacement: function (error, element) {
         if(element.is(':radio') || element.is(':checkbox')) {
            error.insertBefore($(element).parent());
         } else {
            error.insertAfter(element);
         }
      },
      success: function (element) {
         if(!$(element).closest('li').find('label.invalid:not(:empty)').length){
            $(element).closest('li').removeClass('wrong');
         }
      }
   });

   $(document).ready(function(){
      $("form[class~='validate']").each(function(){
         $(this).validate();
      });
   });
}