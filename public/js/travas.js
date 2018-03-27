$(document).ready(function(){

  $('.trava').click(function(e){

    console.log(event.target);

    var target = $(event.target);

    if(target.hasClass('travar')){

      target.html('<span class="fas fa-unlock" style="pointer-events: none"></span>');
      target.removeClass('btn-danger travar');
      target.addClass(' btn-primary destravar');

      var campo  = $('#campo-'+target.attr('id'));

      campo.prop('readOnly',true);

    }else if(target.hasClass('destravar')){

      target.html('<span class="fas fa-lock" style="pointer-events: none"></span>');
      target.removeClass('btn-primary destravar');
      target.addClass('btn-danger travar');

      var campo  = $('#campo-'+target.attr('id'));

      //console.log(campo.attr('readOnly'));

      campo.prop('readOnly',false);

    }

  });


});
