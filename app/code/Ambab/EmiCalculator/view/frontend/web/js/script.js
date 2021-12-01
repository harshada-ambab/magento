require(
    [
        'jquery',
        'Magento_Ui/js/modal/modal'
    ],
    function(
        $,
        modal
    ) {
        var options = {
            type: 'popup',
            responsive: true,
            innerScroll: true,
            title: '',
            buttons: [{
                text: $.mage.__('Close'),
                class: '',
                click: function () {
                    this.closeModal();
                }
            }]
        };

        
        var popup = modal(options, $('#header-mpdal'));
        $("#click-header").on('click',function(){ 
            var url = "<?php  echo $block->getUrl().'emi/index/content'?>"
                    $.ajax({
                        url: url,
                        cache: true,
                        dataType: 'json'
                    })                    
                    .done(function (data) {
                        $(element).html(data['html']);
                        
                    })
                    $("#header-mpdal").modal("openModal");
        });

    }
);
