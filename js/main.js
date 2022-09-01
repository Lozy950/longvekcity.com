
function doalert(obj) {
    return false;
}
function countChar(val) {
    var len = val.value.length;
    if (len >= 200) {
        val.value = val.value.substring(0, 200);
    }
            len_x = 200 - len;
            console.log(len_x);

            $('#char_count').text(200-len);
            if (len == 200){
                $('#char_count').text("0");
            }
            if (len_x <= 0){
                $('#char_count').text("0");
            }
    

};
$(document).ready(function() {
    lenx = $(".wrap_reg textarea").val();
    if (lenx != undefined ){
    if (lenx.length==200){
        $('#char_count').text("0");
    }else{
        $('#char_count').text(200-lenx.length );
    }
    }
    $(document).on("click","#btn_f_next",function() {
        $(".reg_first").css("display","none");
        $(".reg_second").css("display","block");
    });
    $(document).on("click","#btn_s_prev",function() {
        $(".reg_first").css("display","block");
        $(".reg_second").css("display","none");
    });
    $(document).on("click","#btn_s_next",function() {
        $(".reg_third").css("display","block");
        $(".reg_second").css("display","none");
    });
    $(document).on("click","#btn_t_prev",function() {
        $(".reg_third").css("display","none");
        $(".reg_second").css("display","block");
    });
    $(document).on("click","#submit_a",function() {
        var addressValue = $(this).attr("href");
        var arrText= new Array();
        var arrTextarea= new Array();
        $('.wrap_reg input').each(function(){
            arrText.push($(this).val());
        })
        $('.wrap_reg textarea').each(function(){
            arrTextarea.push($(this).val());
        })
        $.ajax({
            data:  {arrText:arrText,arrTextarea:arrTextarea},
            type: "post",
            url: addressValue,
            success: function(data){
            $('.txt_err').html(data);
            console.log(data);
            }
        });
    });
    var h =$(window).height();
    if (h < 1000) {
        $(".wrap_forums").css("padding-bottom","10%")
        console.log(h)
    }
});