(function(window, undefined) {
  'use strict';

    $('#phone').keyup(function(){
        if($.trim(this.value).length == 10){
            $.ajax({ 
                type        : 'POST',
                data        : {mobile_no : $("#phone").val()},
                url         : "Login/regPhoneCheck",
                success: function(data) {
                    if (data){
                        $("#checkPh").text('Phone no. already registered');
                        $(".actions ul li a[href='#next']").fadeOut();
                    }
                    else{
                        $("#checkPh").text('');
                        $(".actions ul li a[href='#next']").fadeIn();
                    }
                },
                error:function(data) {
                    alert('error');
                }
            });
        }
        else{
            $("#checkPh").text('');
        }
    });

    $(".actions ul li a[href='#next']").click(function(){
        if($("#name").valid() && $("#phone").valid()){
            $(".actions ul li a[href='#next']").fadeOut();
                if(!$("#phone").hasClass("sent")){
                    $("#phone").addClass("sent");
                    $.ajax({ 
                        type        : 'POST',
                        url         : "Login/regOtp", 
                        data        : {phone : $("#phone").val()},
                        success: function(data) {
                            console.log(data);
                        },
                        error:function(data) {
                            alert('error');
                        }
                    });
                }
        }

    });

    $('#otp').keyup(function(){
        if($.trim(this.value).length == 6){
            $.ajax({ 
                type        : 'POST',
                data        : {otp : $("#otp").val()},
                url         : "Login/verifyOtp",
                success: function(data) {
                    if (data){
                        $('#otp_status').removeClass("danger");
                        $('#otp_status').addClass("success");
                        $('#otp').attr("readonly","true");
                        $('#otp_status').text("✔ OTP verified");
                        $(".actions ul li a[href='#next']").fadeIn();
                        $(".actions ul li a[href='#previous']").fadeOut();
                    }
                    else{
                        $('#otp_status').removeClass("success");
                        $('#otp_status').addClass("danger");
                        $('#otp_status').text("✗ Wrong OTP");
                        $(".actions ul li a[href='#previous']").fadeIn();
                        console.log("wrong otp");
                    }
                },
                error:function(data) {
                    alert('error');
                }
            });
        }
        else{
            $('#fwd').hide();
            $('#otp_status').text('');

        }
    });
      
    $(".actions ul li a[href='#previous']").click(function(){
        $("#phone").removeClass("sent");
        $(".actions ul li a[href='#next']").fadeIn();
    });

    $('#select-files').change(function() {
        var file_data = $('#select-files').prop('files')[0];   
        var form_data = new FormData();                  
        form_data.append('file', file_data);             
        $.ajax({
            url: 'Edit/img_upload',
             
            dataType: 'text',
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,                         
            type: 'post',
            success: function(data){
                window.location.reload();
            }
        });
    });

    $('#reset-profile-img').click(function() {           
        $.ajax({
            url: 'Delete/profile_img',
            success: function(data){
                window.location.reload();
            }
        });
    });

    $('#pwd_change').validate({});

    
    $('.listOpen').click(function(){
        var id=$(this).data('id');
        $.ajax({
            url: 'Home/listFullDetails',
            type:'post',
            data: {id: id},
            beforeSend : function(){
                $('#listModal .modal-body').html('<div class="d-flex justify-content-center align-items-center"><i class="bx bx-loader-alt bx-spin"> </i>&nbsp; Loading...</div>');
                $('#listModal').modal('show');
            },
            success: function(response){
                $('#listModal .modal-body').html(response);
            },
            error: function(response){
                $('#listModal .modal-body').html('Error !');
            }
        });
    });

    
    $(".order-dt").on("click", ".pendingOrderApprove", function(){
        var id=$(this).data('id');
        var undo=$(this).data('undo');
        $.ajax({
            url: loc+"/Admin/pOrderApprove",
            type:'post',
            data: {id: id, undo: undo},
            beforeSend : function(){
                $('#orderModal .modal-body').html('<div class="d-flex justify-content-center align-items-center"><i class="bx bx-loader-alt bx-spin"> </i>&nbsp; Loading...</div>');
                $('#orderModal').modal('show');
            },
            success: function(res){
                $('#orderModal .modal-body').html(res);
                $('#orderModal .modal-body textarea').focus();
            },
            error: function(res){
                $('#orderModal .modal-body').html('Error !');
            }
        });
    });

    $(".order-dt").on("click", ".pendingOrderReject", function(){
        var id=$(this).data('id');
        var undo=$(this).data('undo');
        $.ajax({
            url: 'Admin/pDemandReject',
            type:'post',
            data: {id: id, undo: undo},
            beforeSend : function(){
                $('#orderModal .modal-body').html('<div class="d-flex justify-content-center align-items-center"><i class="bx bx-loader-alt bx-spin"> </i>&nbsp; Loading...</div>');
                $('#orderModal').modal('show');
            },
            success: function(response){
                $('#orderModal .modal-body').html(response);
                $('#orderModal .modal-body textarea').focus();
            },
            error: function(response){
                $('#orderModal .modal-body').html('Error !');
            }
        });
    });

    $(".order-dt").on("click", ".approvedDemandDetails", function(){
        var id=$(this).data('id');
        $.ajax({
            url: 'Admin/dDemandDetails',
            type:'post',
            data: {id: id},
            beforeSend : function(){
                $('#orderModal .modal-body').html('<div class="d-flex justify-content-center align-items-center"><i class="bx bx-loader-alt bx-spin"> </i>&nbsp; Loading...</div>');
                $('#orderModal').modal('show');
            },
            success: function(response){
                $('#orderModal .modal-body').html(response);
            },
            error: function(response){
                $('#orderModal .modal-body').html('Error !');
            }
        });
    });

    $(".order-dt").on("click", ".rejectedDemandDetails", function(){
        var id=$(this).data('id');
        $.ajax({
            url: 'Admin/rDemandDetails',
            type:'post',
            data: {id: id},
            beforeSend : function(){
                $('#orderModal .modal-body').html('<div class="d-flex justify-content-center align-items-center"><i class="bx bx-loader-alt bx-spin"> </i>&nbsp; Loading...</div>');
                $('#orderModal').modal('show');
            },
            success: function(response){
                $('#orderModal .modal-body').html(response);
            },
            error: function(response){
                $('#orderModal .modal-body').html('Error !');
            }
        });
    });

    $(".order-dt").on("click", ".userDetails", function(){
        var id=$(this).data('id');
        $.ajax({
            url: 'Admin/userDetails',
            type:'post',
            data: {id: id},
            beforeSend : function(){
                $('#orderModal .modal-body').html('<div class="d-flex justify-content-center align-items-center"><i class="bx bx-loader-alt bx-spin"> </i>&nbsp; Loading...</div>');
                $('#orderModal').modal('show');
            },
            success: function(response){
                $('#orderModal .modal-body').html(response);
            },
            error: function(response){
                $('#orderModal .modal-body').html('Error !');
            }
        });
    });

    

    $(".recent-dt").on("click", ".pendingDemandApprove", function(){
        var id=$(this).data('id');
        $.ajax({
            url: 'Admin/pDemandApprove',
            type:'post',
            data: {id: id},
            beforeSend : function(){
                $('#orderModal .modal-body').html('<div class="d-flex justify-content-center align-items-center"><i class="bx bx-loader-alt bx-spin"> </i>&nbsp; Loading...</div>');
                $('#orderModal').modal('show');
            },
            success: function(response){
                $('#orderModal .modal-body').html(response);
                $('#orderModal .modal-body textarea').focus();
            },
            error: function(response){
                $('#orderModal .modal-body').html('Error !');
            }
        });
    });

    $(".recent-dt").on("click", ".pendingDemandReject", function(){
        var id=$(this).data('id');
        $.ajax({
            url: 'Admin/pDemandReject',
            type:'post',
            data: {id: id},
            beforeSend : function(){
                $('#orderModal .modal-body').html('<div class="d-flex justify-content-center align-items-center"><i class="bx bx-loader-alt bx-spin"> </i>&nbsp; Loading...</div>');
                $('#orderModal').modal('show');
            },
            success: function(response){
                $('#orderModal .modal-body').html(response);
                $('#orderModal .modal-body textarea').focus();
            },
            error: function(response){
                $('#orderModal .modal-body').html('Error !');
            }
        });
    });
    
    $(".recent-dt").on("click", ".approvedDemandDetails", function(){
        var id=$(this).data('id');
        $.ajax({
            url: 'Admin/dDemandDetails',
            type:'post',
            data: {id: id},
            beforeSend : function(){
                $('#orderModal .modal-body').html('<div class="d-flex justify-content-center align-items-center"><i class="bx bx-loader-alt bx-spin"> </i>&nbsp; Loading...</div>');
                $('#orderModal').modal('show');
            },
            success: function(response){
                $('#orderModal .modal-body').html(response);
            },
            error: function(response){
                $('#orderModal .modal-body').html('Error !');
            }
        });
    });

    $(".recent-dt").on("click", ".rejectedDemandDetails", function(){
        var id=$(this).data('id');
        $.ajax({
            url: 'Admin/rDemandDetails',
            type:'post',
            data: {id: id},
            beforeSend : function(){
                $('#orderModal .modal-body').html('<div class="d-flex justify-content-center align-items-center"><i class="bx bx-loader-alt bx-spin"> </i>&nbsp; Loading...</div>');
                $('#orderModal').modal('show');
            },
            success: function(response){
                $('#orderModal .modal-body').html(response);
            },
            error: function(response){
                $('#orderModal .modal-body').html('Error !');
            }
        });
    });

    // $('#reportType').change(function() {
    //     $(`
    //     <label for=":">Select Item:</label>
    //     <select name="type" class="form-control mb-1" required>
    //         <option value="">-- Select report type --</option>
    //         <option value="orders">User demands</option>
    //         <option value="detailedOrders">User demands with details</option>
    //         <option value="detailedOrders">Item wise User demands</option>
    //         <option value="detailedOrders">Location wise user demands</option>
    //     </select>
    //     `).insertAfter('#reportType');
    // });


})(window);