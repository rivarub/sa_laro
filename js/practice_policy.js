$(document).ready(function () {
//checkbox
  activeSend = false;
  $("#sendCertify").attr('disabled', 'disabled');

  $("#certify").click(function (event) {
      activeSend = !activeSend;
      if (activeSend) {
          $("#sendCertify").removeAttr('disabled');
      } else {
          $("#sendCertify").attr('disabled', 'disabled');
      }
  });
});
