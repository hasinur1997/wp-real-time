(function ($) {
  $('document').ready(function () {

    Pusher.logToConsole = true;
    var pusher_app_key =  wpRealTime.pusher.app_key;
    var pusher_app_cluster =  wpRealTime.pusher.app_cluster;

    var pusher = new Pusher( pusher_app_key, {
      cluster: pusher_app_cluster,
      forceTLS: true
    });

    var channel = pusher.subscribe('test-channel');

    channel.bind('test-vent', function(data) {
      // alert(JSON.stringify(data));
      toastr.success(JSON.stringify(data));
    });
  });
})(jQuery);

