

$(function(){

  var data = {};
  var keys = Object.keys(glob);
  var glob ={};
  var modes = [
          "javascript",
          "css",
          "sass",
          "application/x-httpd-php",
          "text/html",
    ];



  var coreSettings = {
    init:function() {
      this.initLoadData();
      this.initAddbtn();
      this.initUpdatebtn();
      this.initCodeMirror();
    },
    initCodeMirror:function () {

      var code = [],
          data = {'action':'load'};

      jQuery.ajax({
          data: data,
          //type:'POST',
          async:false,
          success:function(data){
                code = JSON.parse(data);
          },
          beforeSend:function(){
            //console.log(data);

          }
      });

      $('textarea').each(function(index){

        var id = $(this).attr('id');
        var setMode ="";

        for (var i = 0; i <= modes.length -1; i++) {
              //var regex = /modes[i]/g
             if(modes[i] == id){
               setMode = modes[i];

             }
        }

        glob[id] = CodeMirror.fromTextArea(document.getElementById(id), {
          lineNumbers: true,
          //extraKeys: {"Ctrl-Space": "autocomplete"},
          mode: setMode,
          indentUnit: 4,
          indentWithTabs: true
        });

        /* get Source Code From server */
        for (var i = 0; i < modes.length -1; i++) {
          if(code[glob[id].options.mode]){ //check Mode
            glob[id].setValue(code[glob[id].options.mode]);
          }
        }

      });

    },
    initDataTables:function () {
      $('#modules_table').DataTable({
        processing: true,
        serverSide: true,
        paging: true,
        pageLength: 10,
        ajax:{
          url:"https://jsonplaceholder.typicode.com/comments",
             //dataSrc:"",

         } ,
        "columns": [
          { "data": "id"},
          { "data": "name"},
          { "data": "email"},
          { "data": "body"}
        ],

        });


    },
    initLoadData:function() {
        jQuery.ajax({
            data: {action:'load'},
            type:'POST',
            //dataType:'json',
            url:'ajax.php',
            beforeSend:function(){

               toastr.info('Loading...');

            },
            success: function(data){
                console.info(JSON.parse(data));

            },
            complete:function(){
                  toastr.success('Data Loaded!');
            }

      });
    },
    initAddbtn:function () {
      $('#add-btn').click(function(){

         for (var i = 0; i <= Object.keys(glob).length -1 ; i++) {

               if(glob[keys[i]] != undefined){
                 data[keys[i]] = glob[keys[i]].getValue();
               }

         }

         data["theme"] = $('#input-theme').val();
         data["type"] = $('#input-type').val();
         data["action"] = "insert";

         jQuery.ajax({
             data: data,
             type:'POST',
             //dataType:'json',
             url:'ajax.php',
             beforeSend:function(){

                toastr.info('Saving...');

             },
             success: function(data){
                 console.info(data);

             },
             complete:function(){
                   toastr.remove();
                   toastr.success('File Save!');
             }

         });

      });
    },
    initUpdatebtn:function () {


      $('#update-btn').click(function(){


         for (var i = 0; i <= Object.keys(glob).length -1 ; i++) {

               if(glob[keys[i]] != undefined){
                 data[keys[i]] = glob[keys[i]].getValue();
               }

         }

         data["theme"] = $('#input-theme').val();
         data["type"] = $('#input-type').val();
         data["action"] = "update";
         data["id"] = code['id'];

         jQuery.ajax({
             data: data,
             type:'POST',
             //dataType:'json',
             url:'ajax.php',
             beforeSend:function(){

                toastr.info('Saving...');

             },
             success: function(data){
                 console.info(data);

             },
             complete:function(){
                   toastr.remove();
                   toastr.success('File Updated!');
             }

         });

      });

    }


  }
  coreSettings.init();
});
