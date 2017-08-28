 $(document).ready(function () {
                //create a new WebSocket object.
                var wsUri = "ws://192.168.1.250:9000/server.php";
                websocket = new WebSocket(wsUri);

                websocket.onopen = function (ev) { // connection is open
                   // $('#message_box').append("<div class=\"system_msg\">Connected1!</div>"); //notify user
                }

                //#### Message received from server?
                websocket.onmessage = function (ev) {
                    var msg = JSON.parse(ev.data); //PHP sends Json data
                    var type = msg.type; //message type
                    console.log(type);
                    
                    if (type == 'index')
                    {
                        window.location = "http://dbi-poc.com/websocket_event_demo/";
                    }
                    if (type == 'event')
                    {
                      window.location = "http://dbi-poc.com/websocket_event_demo/event.php";  
                    }
                    if (type == 'thanks')
                    {
                       window.location = "http://dbi-poc.com/websocket_event_demo/thanks.php"; 
                    }
                    

                };

                websocket.onerror = function (ev) {
                  //  $('#message_box').append("<div class=\"system_error\">Error Occurred - " + ev.data + "</div>");
                };
                websocket.onclose = function (ev) {
                  //  $('#message_box').append("<div class=\"system_msg\">Connection Closed</div>");
                };
            });