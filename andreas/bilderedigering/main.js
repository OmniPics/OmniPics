$(function () {

  'use strict';

  var console = window.console || { log: function () {} };
  var $body = $('body');


  //  tekst tooltip (for senere implementering)
  $('[data-toggle="tooltip"]').tooltip();
  $.fn.tooltip.noConflict();
  $body.tooltip();

    // Variabler 
  (function () {
    var $image = $('img'); // bilde
    var $actions = $('.docs-actions');
  /*   var $download = $('#download');  // */
    var $dataX = $('#dataX');
    var $dataY = $('#dataY');
    var $dataHeight = $('#dataHeight'); 
    var $dataWidth = $('#dataWidth');
    var $dataRotate = $('#dataRotate');
    var $dataScaleX = $('#dataScaleX'); // skala for x, brukt for zoom 
    var $dataScaleY = $('#dataScaleY'); // skala for y, brukt for zoom 
    var options = {    // parametere for bildeoperasjoner, x,y,w,h 
          aspectRatio: 16 / 9,   // forholdstall mellom bredde høyde
        //  preview: '.img-preview',
          crop: function (e) {      // 
            $dataX.val(Math.round(e.x));
            $dataY.val(Math.round(e.y));
            $dataHeight.val(Math.round(e.height));
            $dataWidth.val(Math.round(e.width));
            $dataRotate.val(e.rotate);
            $dataScaleX.val(e.scaleX);
            $dataScaleY.val(e.scaleY);
          }
        };
    // for implementering av plugin og logging av data
    $image.on({
      'build.cropper': function (e) {
      },
      'built.cropper': function (e) {
      },
      'cropstart.cropper': function (e) {
      },
      'cropmove.cropper': function (e) {
      },
      'cropend.cropper': function (e) {
      },
      'crop.cropper': function (e) {
        console.log(e.type, e.x, e.y, e.width, e.height, e.rotate, e.scaleX, e.scaleY);
      },
      'zoom.cropper': function (e) {
      }
    }).cropper(options);


    // knapper
    if (!$.isFunction(document.createElement('canvas').getContext)) {
      $('button[data-method="getCroppedCanvas"]').prop('disabled', true);
    }

    if (typeof document.createElement('cropper').style.transition === 'undefined') {
      $('button[data-method="rotate"]').prop('disabled', true);
      $('button[data-method="scale"]').prop('disabled', true);
    }


    // last ned
   /*  if (typeof $download[0].download === 'undefined') {
      $download.addClass('disabled');
    } */


    // altenativer
    $actions.on('change', ':checkbox', function () {
      var $this = $(this);
      var cropBoxData;
      var canvasData;

      if (!$image.data('cropper')) {
        return;
      }

      options[$this.val()] = $this.prop('checked');

      cropBoxData = $image.cropper('getCropBoxData');
      canvasData = $image.cropper('getCanvasData');
      options.built = function () {
        $image.cropper('setCropBoxData', cropBoxData);
        $image.cropper('setCanvasData', canvasData);
      };

      $image.cropper('destroy').cropper(options);
    });


    // metoder
    $actions.on('click', '[data-method]', function () {
      var $this = $(this);
      var data = $this.data();
      var $target;
      var result;

      if ($this.prop('disabled') || $this.hasClass('disabled')) {
        return;
      }

      if ($image.data('cropper') && data.method) {
        data = $.extend({}, data); // klon nytt data

        if (typeof data.target !== 'undefined') {
          $target = $(data.target);

          if (typeof data.option === 'undefined') { // håndterer feil etter at brukeren har trykket "clear" som gjør at crop box ikke dukker opp.
            try {
              data.option = JSON.parse($target.val());
            } catch (e) {
              console.log(e.message);
            }
          }
        }

        result = $image.cropper(data.method, data.option, data.secondOption); // resultat etter bildeoperasjoner. Hvis dere vil gjøre alle operasjonene i klienten så kan denne brukes.

        switch (data.method) {
          case 'scaleX':
          case 'scaleY':
            $(this).data('option', -data.option);
            break;
 /* 
          case 'getCroppedCanvas':     // bruker har valgt å lagre bilde. Kan fjernes
            if (result) {

              // bootstrap modal. Popup for å lagre bilde til disk
              $('#getCroppedCanvasModal').find('.modal-body').html(result);  

              if (!$download.hasClass('disabled')) {
                $download.attr('href', result.toDataURL());
              }
            } */

            
        }

      }
    });

  }());

});
