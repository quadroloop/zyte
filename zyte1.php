<?php
  //compile single page javascript website
  $req = array("app.html","main.html","app.js","app.css");
  $file_missing = array();
  $missing = 0;
  $found = 0;


  $dir = new DirectoryIterator(dirname(__FILE__));
  foreach ($dir as $fileinfo) {
    if (!$fileinfo->isDot()) {
        $file = $fileinfo->getFilename();
        if(in_array($file, $req)){
        	$found++;  
          }else{
          	$missing++;
          }
    } 
}

  if($missing != 0 && $found != sizeof($req)){
        	echo "error! dev files are missing!<br> Make sure you have all files listed below before compiling again.";
        	foreach ($req as $rfiles) {
        		echo "<li>".$rfiles."</li>";
        	}
        }else{
        	compile();
        }
 
 function compile(){
 	 // create build folder if it doesnt exist
 	 if(!is_dir('build')){
 	 	mkdir('build');
 	 }

 	 if(is_dir("build")){
 	 	// compile main.html --> index.html
 	 	$m = file_get_contents('main.html');
 	 	    $css = '"./src/app.css"';
 	 	    $js = '"./src/app.js"';
 	 	    $rel='"stylesheet"';
 	 	    // $m0 = str_replace("</head>", "\n<link rel=".$rel." href=".$css.">\n</head>", $m);
 	 	    $m1 = str_replace("</body>", "</body>\n<script src=".$js."></script>", $m);
 	 	    file_put_contents("./build/index.html", $m1);
 	 }
 }
        //compile app.css --> app.css
       $appcss = file_get_contents('app.css');
           if(!is_dir("./build/src")){
             mkdir("./build/src");
           }
           $appcss0 = preg_replace('/\s+/S', " ", $appcss);
           // full js-css compile;
           $css_js0 = str_replace("'", '"', $appcss0);
           $css_js1 = "<style>".$css_js0."</style>";
   
        // compile app.js 
       $appjs = file_get_contents('app.js');
           $appbody = file_get_contents('app.html');
           $appbody0 = str_replace("'", "&apos;", $appbody);
           $appbody1 = preg_replace('/\s+/S', " ", $appbody0);
           $appbody2 = "document.getElementById('index').innerHTML ='".$css_js1.$appbody1."';";
           $appjs1 = $appbody2.$appjs;    
           // preg_replace('/\s+/S', " ", $appjs);
           file_put_contents("./build/src/app.js", $appjs1);
    $message = "Compile Successfully!";
      //work on assets
      
?>
<html>
<head>
	<title>
		▲ zyte
	</title>
	<style>
		body {
			margin: 0;
			padding: 0;
			font-family: 'arial';
		}

    #menu {
      position: fixed;
      z-index: 9999;
color: -webkit-linear-gradient(to right, #8E54E9, #4776E6);  /* Chrome 10-25, Safari 5.1-6 */
color: linear-gradient(to right, #8E54E9, #4776E6); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
 display: none;
    }

		iframe {
			width: 100%;
			height:100%;
			border:0px;
      position: absolute;
		}
		.toastify{padding:12px 20px;color:#fff;display:inline-block;box-shadow:0 3px 6px -1px rgba(0,0,0,.12),0 10px 36px -4px rgba(77,96,232,.3);background:-webkit-linear-gradient(315deg,#73a5ff,#5477f5);background:linear-gradient(135deg,#73a5ff,#5477f5);position:fixed;opacity:0;transition:all .4s cubic-bezier(.215,.61,.355,1);border-radius:2px;cursor:pointer;text-decoration:none;max-width:calc(50% - 20px)}.toastify.on{opacity:1}.toast-close{opacity:.4;padding:0 5px}.right{right:15px}.left{left:15px}.top{top:-150px}.bottom{bottom:-150px}.rounded{border-radius:25px}.avatar{width:1.5em;height:1.5em;margin:0 5px;border-radius:2px}@media only screen and (max-width:360px){.left,.right{margin-left:auto;margin-right:auto;left:0;right:0;max-width:fit-content}}
	</style>
</head>
	<body>
     <div id="menu"><h1>▲</h1></div>
		 <iframe src="./build/index.html"></iframe>
	</body>
	<script type="text/javascript">
		!function(t,o){"object"==typeof module&&module.exports?(require("./toastify.css"),module.exports=o()):t.Toastify=o()}(this,function(t){var i=function(t){return new i.lib.init(t)};function r(t,o){return!(!t||"string"!=typeof o)&&!!(t.className&&-1<t.className.trim().split(/\s+/gi).indexOf(o))}return i.lib=i.prototype={toastify:"1.2.2",constructor:i,init:function(t){return t||(t={}),this.options={},this.options.text=t.text||"Hi there!",this.options.duration=t.duration||3e3,this.options.selector=t.selector,this.options.callback=t.callback||function(){},this.options.destination=t.destination,this.options.newWindow=t.newWindow||!1,this.options.close=t.close||!1,this.options.gravity="bottom"==t.gravity?"bottom":"top",this.options.positionLeft=t.positionLeft||!1,this.options.backgroundColor=t.backgroundColor,this.options.avatar=t.avatar||"",this.options.className=t.className||"",this},buildToast:function(){if(!this.options)throw"Toastify is not initialized";var t=document.createElement("div");if(t.className="toastify on "+this.options.className,!0===this.options.positionLeft?t.className+=" left":t.className+=" right",t.className+=" "+this.options.gravity,this.options.backgroundColor&&(t.style.background=this.options.backgroundColor),t.innerHTML=this.options.text,""!==this.options.avatar){var o=document.createElement("img");o.src=this.options.avatar,o.className="avatar",!0===this.options.positionLeft?t.appendChild(o):t.insertAdjacentElement("beforeend",o)}if(!0===this.options.close){var i=document.createElement("span");i.innerHTML="&#10006;",i.className="toast-close",i.addEventListener("click",function(t){t.stopPropagation(),this.removeElement(t.target.parentElement),window.clearTimeout(t.target.parentElement.timeOutValue)}.bind(this));var n=0<window.innerWidth?window.innerWidth:screen.width;!0===this.options.positionLeft&&360<n?t.insertAdjacentElement("afterbegin",i):t.appendChild(i)}return void 0!==this.options.destination&&t.addEventListener("click",function(t){t.stopPropagation(),!0===this.options.newWindow?window.open(this.options.destination,"_blank"):window.location=this.options.destination}.bind(this)),t},showToast:function(){var t,o=this.buildToast();if(!(t=void 0===this.options.selector?document.body:document.getElementById(this.options.selector)))throw"Root element is not defined";return t.insertBefore(o,t.firstChild),i.reposition(),o.timeOutValue=window.setTimeout(function(){this.removeElement(o)}.bind(this),this.options.duration),this},removeElement:function(t){t.className=t.className.replace(" on",""),window.setTimeout(function(){t.parentNode.removeChild(t),this.options.callback.call(t),i.reposition()}.bind(this),400)}},i.reposition=function(){for(var t,o={top:15,bottom:15},i={top:15,bottom:15},n={top:15,bottom:15},e=document.getElementsByClassName("toastify"),s=0;s<e.length;s++){t=!0===r(e[s],"top")?"top":"bottom";var a=e[s].offsetHeight;(0<window.innerWidth?window.innerWidth:screen.width)<=360?(e[s].style[t]=n[t]+"px",n[t]+=a+15):!0===r(e[s],"left")?(e[s].style[t]=o[t]+"px",o[t]+=a+15):(e[s].style[t]=i[t]+"px",i[t]+=a+15)}return this},i.lib.init.prototype=i.lib,i});
	</script>
	<script>
	function status(message){
		Toastify({
			text: "▲ "+message,
			duration: 5000,
			newWindow: true,
			close: true,
			gravity: "top", // `top` or `bottom`
			positionRight: true, // `true` or `false`
			backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
      }).showToast();
	}

	setTimeout('status("Compile Complete!")',200)
	</script>	

</html>