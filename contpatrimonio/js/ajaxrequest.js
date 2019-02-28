// Original JavaScript code by Chirp Internet: www.chirp.com.au
// Please acknowledge use of this code by including this header.

function AjaxRequest()
{
  var req = false;
  var method = "GET";
  var nocache = false;
  var initialHandler = false;
  var callbackTarget = false;
  var callbackParams = [];
  var timer = null;
  var timeout = 4000;

  // define public methods

  this.loadXMLDoc = function(url, params)
  {
    try {
      req = new XMLHttpRequest();
      if(!initialHandler) {
        initialHandler = processReqChange;
      }
      req.onreadystatechange = initialHandler;
      if(nocache) {
        // add timestamp to make requests unique
        params += (params != "") ? "&" + (new Date()).getTime() : (new Date()).getTime();
      }
      if(method == "POST") {

        req.open("POST", url, true);
        req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        req.send(params);

        // re-send in case of network failure
        var currentURL = url;
        var currentParams = params;
        timer = setTimeout(function() {
          req.abort();
          req.open("POST", currentURL, true);
          req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
          req.send(currentParams);
        }, timeout);

      } else { // send GET or other request

        if(params) {
          url += "?" + params;
        }
        req.open(method, url, true);
        req.send(null);

        // re-send in case of network failure
        var currentURL = url;
        timer = setTimeout(function() {
          req.abort();
          req.open(method, currentURL, true);
          req.send(null);
        }, timeout);

      }
      return true;
    } catch(e) {
      return false;
    }
  };

  this.setMethod   = function(newmethod) { method = newmethod.toUpperCase(); }
  this.nocache     = function() { nocache = true; }
  this.setHandler  = function(fn) { initialHandler = fn; }
  this.setCallback = function(fn) { callbackTarget = fn; }
  this.getResponse = function() { return req; }

  // define private methods

  var getNodeValue = function(parent, tagName)
  {
    var nodeList = parent.getElementsByTagName(tagName);
    if(nodeList.length > 1) {
      var params = new Array();
      for(var i=0; i < nodeList.length; i++) {
        if(nodeList[i].firstChild == null) { // empty
          params.push(null);
        } else {
          params.push(nodeList[i].firstChild.nodeValue);
        }
      }
      return params;
    } else if(nodeList.length == 1) {
      if(nodeList[0].firstChild == null) { // empty
        return "";
      } else {
        return nodeList[0].firstChild.nodeValue;
      }
    } else {
      return false;
    }
  };

  var processReqChange = function()
  {
    if(req.readyState != 4 || req.status != 200) {
      // data not ready
      return;
    }

    clearTimeout(timer);

    // received XML response
    if(req.responseXML == null) {
      console.log("Invalid XML response - please check the Ajax response data for invalid characters or formatting");
      return false;
    }

    var response  = req.responseXML.documentElement;
    var commands = response.getElementsByTagName("command");

    // process XML-embedded commands sequentially
    for(var i=0; i < commands.length; i++) {
      var method = commands[i].getAttribute("method");
      switch(method)
      {
        case "alert":
          var message = getNodeValue(commands[i], "message");
          window.alert(message);
          break;

        case "setvalue":
          var target = getNodeValue(commands[i], "target");
          var value = getNodeValue(commands[i], "value");
          if(target && value !== false) {
            var el = document.getElementById(target);
            if(el) {
              el.value = value;
            } else {
              console.log("Cannot target missing element: " + target);
            }
          }
          break;

        case "setdefault":
          var target = getNodeValue(commands[i], "target");
          if(target) {
            document.getElementById(target).value = document.getElementById(target).defaultValue;
          }
          break;

        case "focus":
          var target = getNodeValue(commands[i], "target");
          if(target) {
            document.getElementById(target).focus();
          }
          break;

        case "setcontent":
          var target = getNodeValue(commands[i], "target");
          var content = getNodeValue(commands[i], "content");
          var append = getNodeValue(commands[i], "append");
          if(target && (content !== false)) {
            var el = document.getElementById(target);
            if(el) {
              if(append !== false) {
                var newcontent = document.createElement("div");
                newcontent.innerHTML = content;
                while(newcontent.firstChild) {
                  el.appendChild(newcontent.firstChild);
                }
              } else {
                el.innerHTML = content;
              }
            } else {
              console.log("Cannot target missing element: " + target);
            }
          }
          break;

        case "setstyle":
          var target = getNodeValue(commands[i], "target");
          var property = getNodeValue(commands[i], "property");
          var value = getNodeValue(commands[i], "value");
          if(target && property && (value !== false)) {
            var el = document.getElementById(target);
            if(el) {
              el.style[property] = value;
            }
          }
          break;

        case "setproperty":
        case "setdata":
          var target = getNodeValue(commands[i], "target");
          var property = getNodeValue(commands[i], "property");
          var value = getNodeValue(commands[i], "value");
          if("true" == value) value = true;
          if("false" == value) value = false;
          if(target && document.getElementById(target)) {
            if("setdata" == method) {
              document.getElementById(target).dataset[property] = value;
            } else {
              document.getElementById(target)[property] = value;
            }
          }
          break;

        case "callback":
          callbackParams = getNodeValue(commands[i], "params");
          if(!Array.isArray(callbackParams)) {
            callbackParams = new Array(callbackParams);
          }
          break;

        default:
          console.log("Unrecognised method '" + method + "' in processReqChange()");

      }

    } // foreach command

    if(callbackTarget) {
      // call callback function with callpack parameters
      callbackTarget.apply(null, callbackParams);
    }

  }; // loadXMLDoc

} // AjaxRequest
