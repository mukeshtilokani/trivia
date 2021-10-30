$(function () {
    var navListItems = $('div.setup-panel div a'),
        allWells = $('.setup-content'),
        allNextBtn = $('.nextBtn');

    allWells.hide();

    $(document).on("click","div.setup-panel div a",function(e) {
        e.preventDefault();
        var $target = $($(this).attr('href')),
            $item = $(this);

        if (!$item.hasClass('disabled')) {
            navListItems.removeClass('btn-success').addClass('btn-default');
            $item.addClass('btn-success');
            allWells.hide();
            $target.show();
            $target.find('input:eq(0)').focus();
        }
    });

    $(document).on("click",".nextBtn",function(e) {
        var curStep = $(this).closest(".setup-content"),
            curStepBtn = curStep.attr("id"),
            nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
            curInputs = curStep.find("input[type='text'],input[type='url']"),
            isValid = true;
        $(".form-group").removeClass("has-error");
        for (var i = 0; i < curInputs.length; i++) {
            if (!curInputs[i].validity.valid) {
                isValid = false;
                $(curInputs[i]).closest(".form-group").addClass("has-error");
            }
        }

        if(curStepBtn === 'step-2') {
            if (!$("input[name='best_cricketer']:checked").val()) {
                $("#step-2 .form-group").addClass("has-error");
                isValid = false;
            }
        }

        if(curStepBtn === 'step-3') {
            if (!$(".js-national-flag-color").is(':checked')) {
                $("#step-3 .form-group").addClass("has-error");
                isValid = false;
            } else {
                let flagColour = '';
                $(".js-national-flag-color:checked").each(function( index ) {
                    flagColour += index === 0 ? $(this).val() : ', ' + $(this).val();
                });
                $(".js-best-cricketer").html($("input[name='best_cricketer']:checked").val());
                $(".js-national-flag").html(flagColour);
            }
        }

        if (isValid) nextStepWizard.removeAttr('disabled').trigger('click');
    });

    $('div.setup-panel div a.btn-success').trigger('click');
});