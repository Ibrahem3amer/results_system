window.addEventListener("resize",  function(){
	
	alterTexts();
});

window.addEventListener("load",  function(){
	
	alterTexts();
	
	getAvailableNations();
	
	displayServerTime();
	
});


function displayServerTime(){
	
	var time = "";
	$.ajax({
       type: "POST",
       url: "./funcs/getTime.php",
	   data: {
	   },
       success: function(html){
		time = html;
		document.getElementById("serverTime").innerHTML = "Server Time: " + time;
       }
    });
	
}

function changeNation(){
	
	var name = getSelectedText(document.getElementById("optNationSelection"));
	console.log(name);
	$.ajax({
       type: "POST",
       url: "./funcs/selectLand.php",
	   data: {
		   nationName: name
	   },
       success: function(html){
		   window.location.reload();
       }
    });
	
	
}

/*
	function: getAvailableNations, gets the available nation 
*/
function getAvailableNations(){
	
	var menu = document.getElementById("optNationSelection");
	var nations = ["nation1", "nation2", "nation3"];
	
	while(nations.length>0){
		
		var curNation = nations.pop();
		
		var opt = document.createElement("OPTION");
		opt.innerText = curNation;
		menu.appendChild(opt);
		
	}
		

	
}


function alterTexts(){
	
	var w = document.getElementById("page-content-wrapper").offsetWidth;
	
	var altables = document.getElementsByClassName("altable");
	for(var i = 0; i <altables.length; i++){
		
		
		if(altables[i].innerHTML != altables[i].getAttribute("smlText")){
			altables[i].setAttribute("largeText", altables[i].innerHTML);
		}
		if(w < 700){
			
			altables[i].innerHTML = altables[i].getAttribute("smlText");
			
		}else{
			altables[i].innerHTML = altables[i].getAttribute("largeText");
		}
	}
	
}

function getSelectedText(e){
	
	return e.options[e.selectedIndex].text;
	
}

function getTbody(table){
	
	var c = table.childNodes;
	for(var i = 0; i<c.length; i++){
		if(c[i].nodeName == "TBODY"){
			return c[i];
		}
	}
	
}