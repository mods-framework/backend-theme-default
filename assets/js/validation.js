import $ from 'jquery';
import 'jquery-validation';


var validation = $.isFunction($.fn.valid) ? 1 : 0;
if (validation) {
  $.validator.setDefaults({
       highlight: function(element) {
           $(element).addClass('is-invalid').removeClass('is-valid');
           $(element).closest('.form-group').addClass('has-error');
       },
       unhighlight: function(element) {
           $(element).addClass('is-valid').removeClass('is-invalid');
           $(element).closest('.form-group').removeClass('has-error');
       },
       errorElement: 'span',
       errorClass: 'invalid-feedback',
       errorPlacement: function(error, element) {
           if(element.parent('.input-group').length) {
               error.insertAfter(element.parent());
           } else {
               error.insertAfter(element);
           }
       },
       // This will ignore all hidden elements alongside `contenteditable` elements
       // that have no `name` attribute
       ignore: ":hidden, [contenteditable='true']:not([name])"
   });

   $(document).ready(function(){
      $("form[class~='validate']").each(function(){
         $(this).validate();
      });
   });
}