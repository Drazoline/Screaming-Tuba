$(document).ready(function() {
    
    /*
    *
    * Add/Remove external IP dynamically
    * Max fields = 10
    *
    */
    var max_ext      = 10;
    var external         = $(".input_fields_external");
    var add_ext_ip      = $(".add_external_ip");
    var count_ext = 1;
    
    $(add_ext_ip).click(function(e){
        e.preventDefault();
        if(count_ext < max_ext){
            count_ext++;
            $(external).append('<div><button style="margin-top:2.5px !important; float:right;" class="btn btn-sm btn-danger remove_ext_ip"><i class="fa fa-times"></i></button><input  type="text" style="width:90%;" name="ext_ip[]"/></div>');
        }
    });
    $(external).on("click",".remove_ext_ip", function(e){
        e.preventDefault(); $(this).parent('div').remove(); count_ext--;
    });
    
    /*
    *
    * Add/Remove internal IP dynamically
    * Max fields = 10
    *
    */
    var max_int      = 10;
    var internal         = $(".input_fields_internal");
    var add_int_ip      = $(".add_internal_ip");
    var count_int = 1;
    
    $(add_int_ip).click(function(e){
        e.preventDefault();
        if(count_int < max_int){
            count_int++;
            $(internal).append('<div><button style="margin-top:2.5px !important; float:right;" class="btn btn-sm btn-danger remove_int_ip"><i class="fa fa-times"></i></button><input  type="text" style="width:90%;" name="int_ip[]"/></div>');
        }
    });
    $(internal).on("click",".remove_int_ip", function(e){
        e.preventDefault(); $(this).parent('div').remove(); count_int--;
    });
    
    /*
    *
    * Add/Remove wireless SSID dynamically
    * Max fields = 5
    *
    */
    var max_ssid      = 5;
    var wireless         = $(".input_fields_ssid");
    var add_wl_ssid      = $(".add_wl_ssid");
    var count_ssid = 1;
    
    $(add_wl_ssid).click(function(e){
        e.preventDefault();
        if(count_ssid < max_ssid){
            count_ssid++;
            $(wireless).append('<div><button style="margin-top:2.5px !important; float:right;" class="btn btn-sm btn-danger remove_ssid"><i class="fa fa-times"></i></button><input type="text" style="width:90%;" name="ssid[]"/></div>'); 
        }
    });
    $(wireless).on("click",".remove_ssid", function(e){
        e.preventDefault(); $(this).parent('div').remove(); count_ssid--;
    });
    
    /*
    *
    * Add/Remove web App credentials dynamically
    * Max fields = 3
    *
    */
    var max_web_cred      = 3;
    var web_app         = $(".input_fields_web_cred");
    var add_web_cred      = $(".add_web_cred");
    var count_web_cred = 1;
    
    $(add_web_cred).click(function(e){
        e.preventDefault();
        if(count_web_cred < max_web_cred){
            count_web_cred++;
            $(web_app).append('<div><button style="margin-top:17.5px !important; float:right;" class="btn btn-sm btn-danger remove_web_cred"><i class="fa fa-times"></i></button><label for="web_login" style="float:left; line-height:30px; font-size:14px;">Login:</label><input class="form-control" style="float:left; width:25%; margin-left: 10px; margin-right: 10px;" type="text" name="web_login[]" id="web_login"><label for="web_password"  style="float:left; line-height:30px; font-size:14px;">Password: </label><input class="form-control" style="float:left; width:25%; margin-left: 10px; margin-right: 10px;" type="password" name="web_password[]" id="web_password"></div>'); 
        }
    });
    $(web_app).on("click",".remove_web_cred", function(e){
        e.preventDefault(); $(this).parent('div').remove(); count_web_cred--;
    });
    
    /*
    *
    * Add/Remove web App URL dynamically
    * Max fields = 7
    *
    */
    var max_web_url      = 7;
    var web_url         = $(".input_fields_web_url");
    var add_web_url      = $(".add_web_url");
    var count_web_url = 1;
    
    $(add_web_url).click(function(e){
        e.preventDefault();
        if(count_web_url < max_web_url){
            count_web_url++;
            $(web_url).append('<div><button style="margin-top:2.5px !important; float:right;" class="btn btn-sm btn-danger remove_web_url"><i class="fa fa-times"></i></button><input type="text" style="width:90%;" name="ssid[]"/></div>'); 
        }
    });
    $(web_url).on("click",".remove_web_url", function(e){
        e.preventDefault(); $(this).parent('div').remove(); count_web_url--;
    });
    
    /*
    *
    * Add/Remove mobile App credentials dynamically
    * Max fields = 3
    *
    */
    var max_mobile_cred      = 3;
    var mobile_app         = $(".input_fields_mobile_cred");
    var add_mobile_cred      = $(".add_mobile_cred");
    var count_mobile_cred = 1;
    
    $(add_mobile_cred).click(function(e){
        e.preventDefault();
        if(count_mobile_cred < max_mobile_cred){
            count_mobile_cred++;
            $(mobile_app).append('<div><button style="margin-top:17.5px !important; float:right;" class="btn btn-sm btn-danger remove_mobile_cred"><i class="fa fa-times"></i></button><label for="web_login" style="float:left; line-height:30px; font-size:14px;">Login:</label><input class="form-control" style="float:left; width:25%; margin-left: 10px; margin-right: 10px;" type="text" name="web_login[]" id="web_login"><label for="web_password"  style="float:left; line-height:30px; font-size:14px;">Password: </label><input class="form-control" style="float:left; width:25%; margin-left: 10px; margin-right: 10px;" type="password" name="web_password[]" id="web_password"></div>'); 
        }
    });
    $(mobile_app).on("click",".remove_mobile_cred", function(e){
        e.preventDefault(); $(this).parent('div').remove(); count_mobile_cred--;
    });
    
    // END OF FILE
});