$("#enviarp").click(function(){
    if($("#name").val().length === 0) {
        $("#name").css({ "border": "1px solid red"});
        $("#name").focus();
        return false;
    }
    if( $("#email").val().indexOf('@', 0) == -1 || $("#email").val().length === 0) {
        $("#email").css({ "border": "1px solid red"});
        $("#email").focus();
        return false;
    }

    $("#enviarp").html("Sending...").prop('disabled', true)

    $.ajax({
           type: "GET",
           url: $("#prayer-form").attr('action'),
           data: $("#prayer-form").serialize(), // Adjuntar los campos del formulario enviado.
           headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               },
           success: function(data)
           {
               $("#prayer-form").fadeOut(200);

               setTimeout(function() {
                $("#addrequest").fadeIn(300);
                  $("#addrequest").html(data);
               },300);

           }
         });

    return false; // Evitar ejecutar el submit del formulario.
 });



$("#enviarp2").click(function(){
    if($("#name2").val().length === 0) {
        $("#name2").css({ "border": "1px solid red"});
        $("#name2").focus();
        return false;
    }
    if( $("#email2").val().indexOf('@', 0) == -1 || $("#email2").val().length === 0) {
        $("#email2").css({ "border": "1px solid red"});
        $("#email2").focus();
        return false;
    }

    $("#enviarp2").html("Sending...").prop('disabled', true)

    $.ajax({
           type: "GET",
           url: $("#prayer-form2").attr('action'),
           data: $("#prayer-form2").serialize(), // Adjuntar los campos del formulario enviado.
           headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               },
           success: function(data)
           {
               $("#prayer-form2").fadeOut(200);

               setTimeout(function() {
                $("#addrequest2").fadeIn(300);
                  $("#addrequest2").html(data);
               },300);

           }
         });

    return false; // Evitar ejecutar el submit del formulario.
 });

$(function(){
    var _global = 0
    $(document).on('click', '.prayaction', function(){
        $(this).removeClass('prayaction')
        var id = this.id;
        var url = $(this).attr('href');
        var parametros = {'p': id};
        $.ajax({
               type: "GET",
               url: url,
               data: parametros,
               success: function(data)
               {
                    var cont = "#count"+id;
                    var sum = 1 + parseInt($(cont).html());

                    $(".pul"+id).addClass('pulse fa-heart red').removeClass('fa-heart-o');
                    $("#"+id).html('THANKS FOR PRAYING').addClass('yellow');

                    var val = "<b>"+sum+"</b>";
                   $(cont).html(val);
               }
             });

        return false; // Evitar ejecutar el submit del formulario.
     });
    $(document).on('click', '.w:not(.prayaction)', function(){
        return false;
    })


     //make it live
     $(".public_action").click(function(){
        var id = this.id;
        var parametros = {
          'p': id
        };
        $.ajax({
               type: "GET",
               url: "livepanel/prayer/publish",
               data: parametros,
               success: function(data)
               {
                    console.log(data)
                    id = "."+id;
                    $(id).fadeOut(200);
               }
             });

        return false; // Evitar ejecutar el submit del formulario.
     });
});
$(function(){
     $(".delete_action").click(function(){
        var id = this.id;
        var parametros = {'p': id,'publish': "delete"};
        $.ajax({
               type: "GET",
               url: "livepanel/prayer/delete",
               data: parametros,
               success: function(data)
               {
                    id = "."+id;
                    $(id).fadeOut(200);
               }
             });

        return false; // Evitar ejecutar el submit del formulario.
     });
});




$(function(){
     $(".save_action").click(function(){
        var id = this.id;
      var newText = $("#texto"+id).val();
      var oldText = $("#msg"+id).text();
        var name = $("h4.name"+id).text();


        var parametros = {
          'p': id,
          'publish': "save",
          'newText': newText,
          'oldText': oldText,
          'dataname': name
        };
        $.ajax({
               type: "GET",
               url: "livepanel/prayer/update",
               data: parametros,
               success: function(data)
               {

                  formText = "."+id+" form";
                  var msg = "#msg"+id
                    $(msg).html(newText);
                  $(formText).fadeOut(400);
               }
             });

        return false; // Evitar ejecutar el submit del formulario.
     });
});

$(function(){
     $(".edit_action").click(function(){
        var id = "#form-edit"+this.id;
        $(id).fadeIn(500);
        return false;
     });
});