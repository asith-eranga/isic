function confirmDelete(){

  $('.delete_view.modal')
    .modal('setting', {
      onDeny    : function(){
        return false;
      },
      onApprove : function() {
        doDelete();
      }
    })
    .modal('show')
  ;

}

function doDelete(){

    url_data = {};

    sendData("doDelete",url_data,"../system/user/controllers/activitylog-controller.php",function(res){

      adminLoadNav('activity-log');

    });

}