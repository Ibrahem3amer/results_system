var chosenUnits = [];

var select_unit = document.getElementById("select_unit"),
	numBox_amount = document.getElementById("numBox_amount"),
	btn_addUnit = document.getElementById("btn_addUnit"),
	table_chosen_units = getTbody(document.getElementById("table_chosen_units"));
	
	
	
btn_addUnit.addEventListener("click", function(){
	
	var uName = getSelectedText(select_unit);
	var uAmount = parseInt(numBox_amount.value,10);
	
	var exists = false;
	for(var i =0; i <chosenUnits.length; i++){
		
		//already have some of this unit 
		if(chosenUnits[i].name == uName){
			chosenUnits[i].amount += uAmount;
			editTable(chosenUnits[i]);
			exists = true;
			break;			
		}
		
	} 

	if(!exists){
		var newUnit = new Unit(uName, uAmount);
		chosenUnits.push(newUnit);
		addToTable(newUnit);
	
	}
	
});



function addToTable(unit){
	
	var row = document.createElement("TR"),
		tCol = document.createElement("TD"),
		aCol = document.createElement("TD");
		
	tCol.innerHTML =unit.name;
	aCol.innerText = unit.amount;
	row.appendChild(tCol);
	row.appendChild(aCol);
	table_chosen_units.appendChild(row);

}

function editTable(unit){
	
	var c = table_chosen_units.childNodes;
	for(var i = 0; i<c.length; i++){
		if(typeof c[i].innerText != "undefined" && c[i].innerText.indexOf(unit.name) != -1){
			
			var node = c[i].childNodes[1];
			node.innerText = parseInt(unit.amount,10);
			break;
			
		}
	}
	
}


function Unit(name, amount){
	
	this.name = name;
	this.amount = amount;
	
}