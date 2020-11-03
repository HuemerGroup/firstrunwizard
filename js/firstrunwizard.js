function showFirstRunWizard(){
	$.colorbox({
		opacity: 0.7,
		transition: 'elastic',
		speed: 100,
		width: '80%',
		height: '80%',
		href: OC.generateUrl('/apps/firstrunwizard/wizard'),
		onClosed : function() {
			$.ajax({
				url: OC.generateUrl('/apps/firstrunwizard/wizard'),
				type: 'delete'
            }).fail(function (jqXHR) {
                showFirstRunWizard();
            });
		}
	});
}

$(document).ready(function() {
	$('#showWizard').live('click', function () {
		showFirstRunWizard();
	});

	$('#closeWizard').live('click', function () {
		$.colorbox.close();
	});

    $('.checkbox.checkbox-confirm').live('change', function() {
        var i = 1;
        $('.checkbox.checkbox-confirm').each(function(){
            if((this.checked === false) && !($(this).hasClass('optional'))){
                $('#btn-confirm').prop('disabled', true);
                return;
            }
            if($('.checkbox.checkbox-confirm').length === i) {
                $('#btn-confirm').prop('disabled', false);
            }
            i++;
        });
    });

    $('#btn-confirm').live('click', function () {
        var agb = 0;
        if($('#checkbox-agb').is(':checked'))
            agb = 1;

        var privacy = 0;
        if($('#checkbox-privacy').is(':checked'))
            privacy = 1;

        var mail = 0;
        if($('#checkbox-mail').is(':checked'))
            mail = 1;

		var cookie = 0;
		if($('#checkbox-cookie').is(':checked'))
			cookie = 1;

        if((agb === 1) && (privacy === 1)) {
            $.post(
                OC.generateUrl('/apps/firstrunwizard/wizard/confirm'),
                {
                    agb: agb,
                    mail: mail,
                    privacy: privacy,
					cookie: cookie
                }
            ).done(function (data) {
                $.colorbox.close();
                //OC.msg.finishedSuccess('#checklist_msg', data.message);
            }).fail(function (jqXHR) {
                OC.msg.finishedError('#checklist_msg', JSON.parse(jqXHR.responseText).message);
            });
        }

    });
});
