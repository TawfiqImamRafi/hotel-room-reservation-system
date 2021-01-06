(function ($) {
    "use-strict"

    jQuery(document).ready(function () {

        if($('#checkInDate').length > 0) {
            $('#checkInDate').datepicker({
                todayHighlight: true,
                format: 'mm-dd-yyyy',
                autoclose: true,
            });
        }
        if($('#checkOutDate').length > 0) {
            $('#checkOutDate').datepicker({
                todayHighlight: true,
                format: 'mm-dd-yyyy',
                autoclose: true
            });
        }
        
        $(document).on('click', '.nav-bar', function() {
            $('.page-content-area').toggleClass('no-sidebar');
            $('.header-logo').toggleClass('no-header-logo');
        });

        $(document).on('change', '#cat_id, #room_type_id', function () {
            var cat_id = $('#cat_id').val();
            var type_id = $('#room_type_id').val();

            $.ajax({
                url: 'get-room.php',
                method: "POST",
                data: {
                    category_id:cat_id,
                    type_id: type_id
                },
                beforeSend: function() {
                    $('#rooms').html('<tr><td colspan="4">Loading.......</td></tr>');
                    $('#sub_total').val(0);
                },
                success: function (res) {
                    setTimeout(function() {
                        $('#rooms').html(res);
                    }, 500)
                }
            });
            
        });


        $(document).on('change', '#checkInDate, #checkOutDate, input[name="rooms[]"]', function() {
            var check_in = $('#checkInDate').val();
            var check_out = $('#checkOutDate').val();

            var room_rent = 0;
            var total_rent = 0;
            var vat=0;
            var grand_total=0;
            $('#paid').val(null);
            $('#discount').val(null);
            $('#due').val(null);
            

            if (check_in && check_out) {
                 var check_in_date = new Date(check_in);
                 var check_out_date = new Date(check_out);
                 var diff = (check_out_date-check_in_date)/(1000*60*60*24);

                 $.each($('input[name="rooms[]"'), function(i, v) {
                    if($(this).is(':checked')) {
                        var room_id = $(this).val();
                        room_rent += parseFloat($('.room_rent_'+room_id).text());
                    }
                });

                total_rent = diff*room_rent;

                vat  = (total_rent*15)/100;
                grand_total= total_rent+vat;
            }
            
            $('#sub_total').val(total_rent);
            $('#vat').val(vat);
            $('#grand_total').val(grand_total);
            $('#due').val(grand_total);
            
        });
        $(document).on('keyup', '#discount', function () {
            var discount = $('#discount').val();
            var grand_total = $('#grand_total').val();
            grand_total=grand_total-discount;
            $('#grand_total').val(grand_total);
            $('#due').val(grand_total);
        
            
        });
        $(document).on('keyup', '#paid', function () {
            var paid = $('#paid').val();
            var grand_total = $('#grand_total').val();
            grand_total=grand_total-paid;
            $('#due').val(grand_total);
        
            
        });
        $(document).on('keyup change', '#adult', function () {
            var adult = $('#adult').val();
            $('#guest_adult').html('');
            for(i=1; i<=adult;i++) {
                $('#guest_adult').append('<div class="row"><div class="col-lg-6"><input type="text" class="form-group form-control mem-info" name="adult_guest_name[]" id="guest_name" placeholder="Enter name..."></div><div class="col-lg-6"><input type="text" class="form-group form-control" name="adult_guest_age[]" id="guest_age" placeholder="Enter age..."></div></div>');
            };   
            
        });
        $(document).on('keyup change', '#child', function () {
            var child = $('#child').val();
            $('#guest_child').html('');
            for(i=1; i<=child;i++) {
                $('#guest_child').append('<div class="row"><div class="col-lg-6"><input type="text" class="form-group form-control mem-info" name="child_guest_name[]" id="guest_name" placeholder="Enter child name..."></div><div class="col-lg-6"><input type="text" class="form-group form-control" name="child_guest_age[]" id="guest_age" placeholder="Enter age..."></div></div>');
            };   
            
        });
        $(document).on('change', '#dpaid', function () {
            var grand_total = parseFloat($('#grand_total').val());
            var paid = parseFloat($('#paid').val());
            var dpaid = parseFloat($('#dpaid').val());
            var due = parseFloat($('#due').val());
            paid=paid + dpaid;
            due=grand_total - paid ;
            $('#due').val(due);
            $('#paid').val(paid);
        });    
        

    });

}(jQuery));