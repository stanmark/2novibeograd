 var DeleteRow = {
            initialize: function ($wrapper) {
                this.$wrapper = $wrapper;

                this.$wrapper.find('.js-delete-row').on(
                        'click',
                        this.handleDeleteRow
                        );

            },

            handleDeleteRow: function (e) {   
                 e.preventDefault();
                var deleteUrl = $(this).data('url');
                var $row = $(this).closest('tr');
                $.ajax({
                    url: deleteUrl,
                    method: 'DELETE',
                    success: function () {
                        $row.fadeOut();
                    }
                });
            }
        };

     



