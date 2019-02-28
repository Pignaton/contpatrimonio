<style>
	/* Show "Left" drawer for the "Right" drawer in the demo */
.snapjs-right .snap-drawer-left {
	display: block;
	right: 0;
	left: auto;
}

/* Hide the actual "Right" drawer in the demo */
.snapjs-right .snap-drawer-right {
	display: none;
}

/* Show the "Drag" background in the demo */
#content {
	background: #BFC7D8 url(drag.png) center 75% no-repeat;
}

/* Demo toolbar styles */
#toolbar {
  background: #536ea7;
  border-bottom: 1px solid #111b32;
  position: absolute;
  top: 0;
  right: 0;
  left: 0;
  width: auto;
  height: 44px;
}

#toolbar h1 {
  color: #fff;
  font-size: 16px;
  line-height: 22px;
  text-align: center;
  text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.8);
  position: absolute;
  top: 0;
  right: 44px;
  left: 44px;
  width: auto;
  height: 44px;
}

#open-left {
  background: url(open.png) center center no-repeat;
  display: block;
  width: 44px;
  height: 44px;
}

/* Show the red "No Drag" box in the demo */
#no-drag,
#do-drag {
	position: absolute;
	top: 50%;
	left: 50%;
	width: 50%;
	height: 100px;
	margin-left: -25%;
	margin-top: -50px;
	background: red;
	color: #FFF;
	text-align: center;
	line-height: 100px;
}
#do-drag{
	background: green;
}

/* Styles for the social buttons in the demo */
.demo-social {
	padding: 0 15px;
}

/* Show the translucent white "Toggle" boxes in the demo */
.toggler {
	width: 80%;
	background: rgba(255,255,255,0.5);
	margin: 0 auto;
	position: relative;
	top: 70px;
	padding: 20px;
	margin-bottom: 20px;
	text-align: center;
}

/* Styles for expanding "Search" input in the "Expanding" demo */
.search {
	padding-bottom: 10px;
	border-bottom: 1px solid rgba(0, 0, 0, 0.2);
	-webkit-box-shadow: 0 1px 0 rgba(255, 255, 255, 0.1);
	   -moz-box-shadow: 0 1px 0 rgba(255, 255, 255, 0.1);
	        box-shadow: 0 1px 0 rgba(255, 255, 255, 0.1);
}

#search {
	height: 30px;
	width: 87%;
	margin: 7px 7px 0 7px;
	background: linear-gradient(#414A5A,#4C5464);
	background: -webkit-linear-gradient(#414A5A,#4C5464);
	padding-left: 15px;
	border: 1px solid #222936;
	-webkit-border-radius: 25px;
	   -moz-border-radius: 25px;
	        border-radius: 25px;
	-webkit-box-shadow: inset 0 1px 2px -1px rgba(0, 0, 0, 0.5),0 1px 2px -1px rgba(255, 255, 255, 0.4);
	   -moz-box-shadow: inset 0 1px 2px -1px rgba(0, 0, 0, 0.5),0 1px 2px -1px rgba(255, 255, 255, 0.4);
	        box-shadow: inset 0 1px 2px -1px rgba(0, 0, 0, 0.5),0 1px 2px -1px rgba(255, 255, 255, 0.4);
}

#search:focus {
	outline: none;
	border-color: #151515;
}

/* Styles for fading out the drawer content in the "Expanding" demo */
.drawer-inner {
	-webkit-transition: opacity 0.3s ease; 
	   -moz-transition: opacity 0.3s ease; 
	    -ms-transition: opacity 0.3s ease; 
	     -o-transition: opacity 0.3s ease; 
	        transition: opacity 0.3s ease; 
}

.snapjs-expand-left .drawer-inner,
.snapjs-expand-right .drawer-inner {
	opacity: 0;
}

/* Styles for the "Settings" demo */
.opt {
	padding: 20px;
	border-bottom: 1px solid rgba(0, 0, 0, 0.1);
}

.opt p {
	font-weight: bold;
	margin-top: 0;
	margin-bottom: 5px;
	color: #222;
	color: rgba(0, 0, 0, 0.6);
}

/* Default demo styles */
.snap-content {
  background: #BFC7D8;
}

.snap-drawers {
  background: #323949;
}

.snap-drawer {
	background: #323949;
	color: #eee;
}

.snap-drawer h3 {
  font-size: 36px;
  font-weight: normal;
  margin: 15px;
}

.snap-drawer h4 {
  padding: 15px;
  border-top: 1px solid rgba(255, 255, 255, 0.1);
  margin-bottom: 0;
}

.snap-drawer ul {
  padding: 0;
  margin: 0;
  list-style-type: none;
}

.snap-drawer li > a {
  display: block;
  border-bottom: 1px solid rgba(0,0,0, 0.1);
  border-top: 1px solid rgba(255, 255, 255, 0.1);
  padding: 15px;
  font-weight: bold;
  text-shadow: 0 1px 0 #000;
  text-decoration: none;
  color: #ccc;
  text-indent: 20px;
}

.snap-drawer p {
  opacity: 0.5;
  padding: 15px;
  font-size: 12px;
}

</style>
<div class="snap-drawers">
            <div class="snap-drawer snap-drawer-left">
                <div>
                    <h3>Snap.js</h3>
                    <div class="demo-social">
                        <a href="https://twitter.com/share" class="twitter-share-button" data-lang="en" data-text="Snap.js - A Library for creating beautiful mobile shelfs in Javascript" data-url="http://jakiestfu.github.com/Snap.js/" data-count="none" data-via="jakiestfu">Tweet</a>
                        <a href="https://twitter.com/jakiestfu" class="twitter-follow-button" data-show-count="false" data-lang="en">Follow @jakiestfu</a>
                        <iframe src="http://ghbtns.com/github-btn.html?user=jakiestfu&amp;repo=Snap.js&amp;type=watch&amp;count=true" allowtransparency="true" frameborder="0" scrolling="0" width="120" height="20"></iframe>
                    </div>
                    <h4>Demos</h4>
                    <ul>
                        <li><a href="default.html">Default</a></li>
                        <li><a href="noDrag.html">No Drag</a></li>
                        <li><a href="dragElement.html">Drag Element</a></li>
                        <li><a href="rightDisabled.html">Right Disabled</a></li>
                        <li><a href="hyperextend.html">Hyperextension Disabled</a></li>
                        <li><a href="skinnyThreshold.html">Skinny Threshold</a></li>
                        <li><a href="toggles.html">Toggles</a></li>
                        <li><a href="classNames.html">Class Names</a></li>
                        <li><a href="expand.html">Expanding</a></li>
                        <li><a href="settings.html">Settings</a></li>
                        <li><a href="ratchet/template.html">Ratchet</a></li>
                    </ul>
                    <div>
                        <p>The Default demo shows basic Snap.js functionality</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla non erat ac leo ultrices blandit sed vel risus. Pellentesque facilisis blandit auctor. Maecenas vestibulum vulputate tincidunt. Mauris nec quam libero. Fusce eget ligula non leo varius condimentum quis ac elit. Donec id urna ut neque semper ultrices. Proin ut suscipit felis. Nullam neque felis, ullamcorper scelerisque volutpat vel, vehicula vehicula neque. Aenean scelerisque elit ac erat sagittis ullamcorper.</p>
                    </div>
                </div>
            </div>
            <div class="snap-drawer snap-drawer-right"></div>
        </div>
<script>
var addEvent = function addEvent(element, eventName, func) {
	if (element.addEventListener) {
    	return element.addEventListener(eventName, func, false);
    } else if (element.attachEvent) {
        return element.attachEvent("on" + eventName, func);
    }
};

addEvent(document.getElementById('open-left'), 'click', function(){
	snapper.open('left');
});

/* Prevent Safari opening links when viewing as a Mobile App */
(function (a, b, c) {
    if(c in b && b[c]) {
        var d, e = a.location,
            f = /^(a|html)$/i;
        a.addEventListener("click", function (a) {
            d = a.target;
            while(!f.test(d.nodeName)) d = d.parentNode;
            "href" in d && (d.href.indexOf("http") || ~d.href.indexOf(e.host)) && (a.preventDefault(), e.href = d.href)
        }, !1)
    }
})(document, window.navigator, "standalone");
</script>