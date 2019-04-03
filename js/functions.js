

$(function(){

  var coreSettings = {

    init:function() {
       this.modes = [
              "javascript",
              "css",
              "sass",
              "application/x-httpd-php",
              "text/html",
        ];
        this.glob ={};
        this.data ={};

      this.initDataTables();
      // this.initLoadData();
      // this.initUpdatebtn();
      this.initCodeMirror();
      this.initAddbtn();
    },
    // initCodeMirror:function () {
    //
    //   var code = [],
    //       data = {'action':'load'};
    //
    //   jQuery.ajax({
    //       data: data,
    //       //type:'POST',
    //       async:false,
    //       success:function(data){
    //             code = JSON.parse(data);
    //       },
    //       beforeSend:function(){
    //         //console.log(data);
    //
    //       }
    //   });
    //
    //   $('textarea').each(function(index){
    //
    //     var id = $(this).attr('id');
    //     var setMode ="";
    //
    //     for (var i = 0; i <= modes.length -1; i++) {
    //           //var regex = /modes[i]/g
    //          if(modes[i] == id){
    //            setMode = modes[i];
    //
    //          }
    //     }
    //
    //     glob[id] = CodeMirror.fromTextArea(document.getElementById(id), {
    //       lineNumbers: true,
    //       //extraKeys: {"Ctrl-Space": "autocomplete"},
    //       mode: setMode,
    //       indentUnit: 4,
    //       indentWithTabs: true
    //     });
    //
    //     /* get Source Code From server */
    //     for (var i = 0; i < modes.length -1; i++) {
    //       if(code[glob[id].options.mode]){ //check Mode
    //         glob[id].setValue(code[glob[id].options.mode]);
    //       }
    //     }
    //
    //   });
    //
    // },
    initCodeMirror:function () {

      var modes = this.modes;
      var glob = this.glob;

      $('textarea').each(function(index){

        var id = $(this).attr('id');
        var setMode ="";
         if(id != undefined){
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

         }
       });

       this.glob = glob;
    },
    initDataTables:function () {
      $('#modules_table').DataTable({
        processing: true,
        // serverSide: true,
        autoFill: true,
        paging: true,
        pageLength: 10,
        order: [[ 1, "asc" ]],
        "columnDefs": [
              {
                  // The `data` parameter refers to the data for the cell (defined by the
                  // `data` option, which defaults to the column being worked with, in
                  // this case `data: 0`.
                  "render": function ( data, type, row ) {
                      return "<a href=/edit.php?id="+ data +" class='btn btn-success' data-toggle='tooltip' title='Edit File'><i class='fa fa-pencil-square-o' aria-hidden='true'></i></a><a href=/edit.php?id="+ data +" data-toggle='tooltip' title='Delete File' class='btn btn-danger'><i class='fa fa-trash' aria-hidden='true'></i></a>";
                  },
                  "targets": 7
              },
              {
                  "render": function ( data, type, row ) {
                      return "<a href=" + data +" data-lity><img src="+ data +"/></a>";
                  },
                  "targets": 0
              },
              // { "visible": false,  "targets": [ 3 ] }
        ],
        ajax:{
          data:{action:'load_modules'},
          url:"ajax.php",
          dataSrc:"",
          type:'POST',

          // dataType:'jsonp'
         } ,
        "columns": [
          { "data": "preview_image"},
          { "data": "module_name"},
          { "data": "status"},
          { "data": "canvas_link"},
          { "data": "description"},
          { "data": "tags"},
          { "data": "template_origin"},
          { "data": "id"},


        ],

        });
    },
    initLoadData:function() {
        jQuery.ajax({
            data: {action:'load', table_name:'modules'},
            type:'POST',
            //dataType:'json',
            url:'ajax.php',
            beforeSend:function(){

               toastr.info('Loading...');

            },
            success: function(data){
                // console.info(JSON.parse(data));
                console.log(data);

            },
            complete:function(){
                  toastr.success('Data Loaded!');
            }

      });
    },
    initAddbtn:function () {

        var _this = this;

       $('#add-btn').click(function(){

         _this.getData();

         _this.data["action"] = "insert_module";

         jQuery.ajax({
             data: _this.data,
             type:'POST',
             //dataType:'json',
             url:'ajax.php',
             beforeSend:function(){

                toastr.info('Saving...');

             },
             success: function(data){

                toastr.remove();

                var parseData = JSON.parse(data);

                console.log(parseData);

               if(parseData.message =="Module Saved!"){
                  toastr.success(parseData.message);
                  
                  $('input[name=module_name]').val(parseData.new_module_name);

                }else{
                  toastr.warning(parseData.message);
                  setTimeout(function(){
                    toastr.remove();
                    toastr.info("System will automatically adjust Module Count");

                    $('input[name=module_name]').val(parseData.new_module_name);

                  },2000);
                }
              },

         });
      });

    },
    initUpdatebtn:function () {

      var data = {};
      var glob ={};
      var keys = Object.keys(glob);
      var modes = [
              "javascript",
              "css",
              "sass",
              "application/x-httpd-php",
              "text/html",
        ];


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

    },
    getData:function(){
      var keys = Object.keys(this.glob),
          data = {};

      for (var i = 0; i <= Object.keys(this.glob).length -1 ; i++) {
            if(this.glob[keys[i]] != undefined){
              data[keys[i]] = this.glob[keys[i]].getValue();
            }
      }

         data['module_name'] = $('input[name=module_name]').val();
         data['canvas_link'] = $('input[name=canvas_link]').val();
         data['preview_image'] = $('input[name=preview_image]').val();
         data['description'] = $('textarea[name=description]').val();
         data['tags'] = $('input[name=tags]').val();
         data['Template_origin'] = $('input[name=Template_origin]').val();

         this.data = data;
    }

  }
  coreSettings.init();
});

//
//
// var glob ={};
//
//
// $('textarea').each(function(index){
//
//   var id = $(this).attr('id');
//   var setMode ="";
//
//   for (var i = 0; i <= modes.length -1; i++) {
//         //var regex = /modes[i]/g
//        if(modes[i] == id){
//          setMode = modes[i];
//
//        }
//   }
//
//     glob[id] = CodeMirror.fromTextArea(document.getElementById(id), {
//     lineNumbers: true,
//     //extraKeys: {"Ctrl-Space": "autocomplete"},
//     mode: setMode,
//     indentUnit: 4,
//     indentWithTabs: true
//   });
//
//
// });
