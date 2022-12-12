<html>
 <head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Chat Application in Codeigniter</title>
  <meta content='width=device-width, initial-scale=1, maximum-scale=1' name='viewport'/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
  <style type="text/css">
   
   #chat_message_area
   {
    width: 100%;
    height: auto;
    min-height: 80px;
    overflow: auto;
    padding:6px 24px 6px 12px;
    border: 1px solid #CCC;
       border-radius: 3px;
   }

   .notification_circle {
    width: 16px;
    height: 16px;
    border-radius: 50%;
    background-color: #FF0000;
    text-align: center;
    color:#fff;
    padding:3px 6px;
   }
   .online
   {
    width: 16px;
    height: 16px;
    border-radius: 50%;
    background-color: #5cb85c;
    text-align: center;
    color:#fff;
    padding:3px 6px;
   }
   .offline
   {
    width: 16px;
    height: 16px;
    border-radius: 50%;
    background-color: #ccc;
    text-align: center;
    color:#fff;
    padding:3px 6px;
   }

  </style>
 </head>
 <body>
  <div clas="container-fluid">
   <br />
   <h2 align="center"><a href="#">Chat Application in Codeigniter</a></h2>
   <br />
   <div class="col-md-12" align="right">
    <a href="<?php echo base_url(); ?>google_login/logout">Logout</a>
   </div>
   <div class="col-md-3" style="padding-right:0;">
    <div class="panel panel-default" style="height: 700px; overflow-y: scroll;">
     <div class="panel-heading">Chat with User</div>
     <div class="panel-body" id="chat_user_area">

     </div>
     <input type="hidden" name="hidden_receiver_id_array" id="hidden_receiver_id_array" />
    </div>
   </div>
   <div class="col-md-6" style="padding-left:0; padding-right: 0;">
    <div class="panel panel-default" style="">
     <div class="panel-heading">Chat Area</div>
     <div class="panel-body">
      <div id="chat_header">
       <h2 align="center" style="margin:0; padding-bottom:16px;"><span id="dynamic_title">Welcome <?php echo $this->session->userdata('username'); ?></span></h2>
      </div>
      <div id="chat_body" style="height:406px; overflow-y: scroll;"></div>
      <div id="chat_footer" style="">
       <hr />
       <div class="form-group">
        <div id="chat_message_area" contenteditable class="form-control"></div>
       </div>
       <div class="form-group" align="right">
        <button type="button" name="send_chat" id="send_chat" class="btn btn-success btn-xs" disabled>Send</button>
       </div>
      </div>
     </div>
    </div>
   </div>
   <div class="col-md-3" style="padding-left:0;">
    <div class="panel panel-default" style="height: 300px; overflow-y: scroll;">
     <div class="panel-heading">Search User</div>
     <div class="panel-body">
      <div class="row">
       <div class="col-md-8">
        <input type="text" name="search_user" id="search_user" class="form-control input-sm" placeholder="Search User" />
       </div>
       <div class="col-md-4">
        <button type="button" name="search_button" id="search_button" class="btn btn-primary btn-sm">Search</button>
       </div>
      </div>
      
      <div id="search_user_area"></div>
      
     </div>
    </div>
    <div class="panel panel-default" style="height: 380px; overflow-y: scroll;">
     <div class="panel-heading">Nofication</div>
     <div class="panel-body" id="notification_area">
      
     </div>
    </div>
   </div>
  </div>
 </body>
</html>

<script>

$(document).ready(function(){

 function loading()
 {
  var output = '<div align="center"><br /><br /><br />';
  output += '<img src="<?php echo base_url(); ?>asset/loading.gif" /> Please wait...</div>';
  return output;
 }

 $(document).on('click', '#search_button', function(){
  var search_query = $.trim($('#search_user').val());
  $('#search_user_area').html('');
  if(search_query != '')
  {
   $.ajax({
    url:"<?php echo base_url(); ?>chat/search_user",
    method:"POST",
    data:{search_query:search_query},
    dataType:"json",
    beforeSend:function()
    {
     $('#search_user_area').html(loading());
     $('#search_button').attr('disabled', 'disabled');
    },
    success:function(data)
    {
     $('#search_button').attr('disabled', false);
     var output = '<hr />';
     var send_userid = "<?php echo $this->session->userdata('user_id'); ?>";
     if(data.length > 0)
     {
      for(var count = 0; count < data.length; count++)
      {
       output += '<div class="row">';
       output += '<div class="col-md-7"><img src="'+data[count].profile_picture+'" class="img-circle" width="40" /> <small>'+data[count].first_name+' '+data[count].last_name+'</small></div>';
       if(data[count].is_request_send == 'yes')
       {
        output += '<div class="col-md-5"><button type="button" name="request_button" class="btn btn-warning btn-xs">Request Sended</button></div>';
       }
       else
       {
        output += '<div class="col-md-5"><button type="button" name="request_button" class="btn btn-success btn-xs request_button" id="request_button'+data[count].user_id+'" data-receiver_userid="'+data[count].user_id+'" data-send_userid="'+send_userid+'">Send Request</button></div>';
       }
       output += '</div><hr />';
      }
     }
     else
     {
      output += '<div align="center"><b>No Data Found</b></div>';
     }
     output += '</div>';
     $('#search_user_area').html(output);
    }
   })
  }
 });

 $(document).on('click', '.request_button', function(){
  var id = $(this).attr('id');
  var receiver_userid = $(this).data('receiver_userid');
  var send_userid = $(this).data('send_userid');
  $.ajax({
   url:"<?php echo base_url(); ?>chat/send_request",
   method:"POST",
   data:{receiver_userid:receiver_userid, send_userid:send_userid},
   beforeSend:function()
   {
    $('#'+id).attr('disabled', 'disabled');
   },
   success:function(data)
   {
    $('#'+id).attr('disabled', false);
    $('#'+id).removeClass('btn-success');
    $('#'+id).addClass('btn-warning');
    $('#'+id).text('Request Sended');
   }
  })
 })

 load_notification();

 function load_notification()
 {
  $.ajax({
   url:"<?php echo base_url(); ?>chat/load_notification",
   method:"POST",
   data:{action:'load_notification'},
   dataType:"json",
   beforeSend:function()
   {
    $('#notification_area').html(loading());
   },
   success:function(data)
   {
    var output = '<hr />';
    //console.log(data.length);
    if(data.length > 0)
    {
     for(var count = 0; count < data.length; count++)
     {
      output += '<div class="row"><div class="col-md-7"><img src="'+data[count].profile_picture+'" class="img-circle" width="35" /> ' + data[count].first_name + ' ' +data[count].last_name + '</div>';

      output += '<div class="col-md-5"><button type="button" name="accept_button" class="btn btn-success btn-xs accept_button" id="accept_button'+data[count].user_id+'" data-chat_request_id="'+data[count].chat_request_id+'">Accept</button></div><hr />';
     }
    }
    else
    {
     output += '<div align="center"><b>No Data Found</b></div>';
    }
    //output += '</div><hr />';
    $('#notification_area').html(output);
   }
  }) 
 }

 $(document).on('click', '.accept_button', function(){
  var id = $(this).attr('id');
  var chat_request_id = $(this).data('chat_request_id');
  $.ajax({
   url:"<?php echo base_url(); ?>chat/accept_request",
   method:"POST",
   data:{chat_request_id:chat_request_id},
   beforeSend:function()
   {
    $('#'+id).attr('disabled','disabled');
   },
   success:function(data)
   {
    $('#'+id).attr('disabled', false);
    $('#'+id).removeClass('btn-success');
    $('#'+id).addClass('btn-warning');
    $('#'+id).text('Accepted');
   }
  })
 });

 load_chat_user();

 function load_chat_user()
 {
  $.ajax({
   url:"<?php echo base_url(); ?>chat/load_chat_user",
   method:"POST",
   data:{action:'load_chat_user'},
   dataType:'json',
   beforeSend:function()
   {
    $('#chat_user_area').html(loading());
   },
   success:function(data)
   {
    var output = '<div class="list-group">';
    if(data.length > 0)
    {
     var receiver_id_array = '';
     for(var count = 0; count < data.length; count++)
     {
      output += '<a href="javascript:void(0)" class="list-group-item user_chat_list" data-receiver_id="'+data[count].receiver_id+'">';

      output += '<img src="'+data[count].profile_picture+'" class="img-circle" width="35" />';

      output += ' ' + data[count].first_name + ' ' + data[count].last_name;

      output += '&nbsp;<span id="chat_notification_'+data[count].receiver_id + '"></span>';
      ///
      output += '&nbsp;<span id="type_notifitcation_'+data[count].receiver_id+'"></span>';
      
      ///

      output += ' <i class="offline" id="online_status_'+data[count].receiver_id+'" style="float:right;">&nbsp;</i></a>';

      receiver_id_array += data[count].receiver_id + ',';
     }
     $('#hidden_receiver_id_array').val(receiver_id_array);
    }
    else
    {
     output += '<div align="center"><b>No Data Found</b></div>';
    }
    output += '</div>';
    $('#chat_user_area').html(output);
   }
  })
 }

 var receiver_id;

 $(document).on('click', '.user_chat_list', function(){
  $('#send_chat').attr('disabled', false);
  receiver_id = $(this).data('receiver_id');
  var receiver_name = $(this).text();
  $('#dynamic_title').text('You Chat with ' + receiver_name);
  load_chat_data(receiver_id, 'yes');
 });

 $(document).on('click', '#send_chat', function(){
  var chat_message = $.trim($('#chat_message_area').html());
  if(chat_message != '')
  {
   $.ajax({
    url:"<?php echo base_url(); ?>chat/send_chat",
    method:"POST",
    data:{receiver_id:receiver_id, chat_message:chat_message},
    beforeSend:function()
    {
     $('#send_chat').attr('disabled','disabled');
    },
    success:function(data)
    {
     $('#send_chat').attr('disabled', false);
     $('#chat_message_area').html('');
     var html = '<div class="col-md-10 alert alert-warning">';
     html += chat_message;
     html += '</div>';
     $('#chat_body').append(html);
     $('#chat_body').scrollTop($('#chat_body')[0].scrollHeight);
    }
   });
  }
  else
  {
   alert('Type Something in chat box');
  }
 });

 function load_chat_data(receiver_id, update_data)
 {
  $.ajax({
   url:"<?php echo base_url(); ?>chat/load_chat_data",
   method:"POST",
   data:{receiver_id:receiver_id, update_data:update_data},
   dataType:"json",
   success:function(data)
   {
    var html = '';
    for(var count = 0; count < data.length; count++)
    {
     html += '<div class="row" style="margin-left:0; margin-right:0">';
     if(data[count].message_direction == 'right')
     {
      html += '<div align="left"><span class="text-muted"><small><b>'+data[count].chat_messages_datetime+'</b></small></span></div>';

      html += '<div class="col-md-10 alert alert-warning">';
     }
     else
     {
      html += '<div align="right"><span class="text-muted"><small><b>'+data[count].chat_messages_datetime+'</b></small></span></div>';
      html += '<div class="col-md-2">&nbsp;</div>';
      html += '<div class="col-md-10 alert alert-info">';
     }
     html += data[count].chat_messages_text + '</div></div>';
    }
    $('#chat_body').html(html);
    $('#chat_body').scrollTop($('#chat_body')[0].scrollHeight);
   }
  })
 }

 setInterval(function(){
  if(receiver_id > 0)
  {
   load_chat_data(receiver_id, 'yes');
  }
  check_chat_notification(receiver_id);
 }, 5000);

 function check_chat_notification(receiver_id)
 {
  var user_id_array = $('#hidden_receiver_id_array').val();

  ///
  var is_type = 'no';
  if(receiver_id > 0)
  {
   if($.trim($('#chat_message_area').text()) != '')
   {
    is_type = 'yes';
   }
  }
  ///

  $.ajax({
   url:"<?php echo base_url(); ?>chat/check_chat_notification",
   method:"POST",
   data:{user_id_array:user_id_array, is_type:is_type, receiver_id:receiver_id},
   dataType:"json",
   success:function(data)
   {
    if(data.length > 0)
    {
     for(var count = 0; count < data.length; count++)
     {
      var html = '';
      if(data[count].total_notification > 0)
      {
       if(data[count].user_id != receiver_id)
       {
        html = '<span class="notification_circle">'+data[count].total_notification+'</span>';
       }
      }
      console.log(data[count].status);

      if(data[count].status == 'online')
      {
       console.log('online_status_'+data[count].user_id);
       $('#online_status_'+data[count].user_id).addClass('online');
       $('#online_status_'+data[count].user_id).removeClass('offline');
       //
       if(data[count].is_type == 'yes')
       {
        $('#type_notifitcation_'+data[count].user_id).html('<i><small>Typing</small></i>');
       }
       else
       {
        $('#type_notifitcation_'+data[count].user_id).html('');
       }
      }
      else
      {
       $('#online_status_'+data[count].user_id).addClass('offline');

       $('#online_status_'+data[count].user_id).removeClass('online');

       //
       $('#type_notifitcation_'+data[count].user_id).html('');
      }

      $('#chat_notification_'+data[count].user_id).html(html);
     }
    }
   }
  })
 }

});

</script>