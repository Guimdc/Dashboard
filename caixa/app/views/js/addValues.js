let $value = document.querySelector(".value").innerHTML;

let arrayValues = [];

let removeArray = $value.replace("Array", '');
let removePar = removeArray.replace("(", '');
let removePar2 = removePar.replace(")", '');
let withoutSpace = removePar2.trim();
let withoutArrow = withoutSpace.replace(/\=&gt;/g,'')

let breakLine = withoutArrow.split("\n").length;

for(i = 0; i < breakLine; i++){
    withoutArrow = withoutArrow.replace('[' + i + ']', '');
    withoutArrow = withoutArrow.replace("\n", '');

    if(i == 0){
        withoutArrow = withoutArrow.replace("  ", '');
    }

    withoutArrow = withoutArrow.replace("      ", ';');
}

let newArray = withoutArrow.split(";");

var values = newArray.map(function (x) { 
    return parseFloat(x, 10); 
  });

let $input = document.querySelector(".input").innerHTML;

let arrayInputs = [];

let removeArrayInput = $input.replace("Array", '');
let removeParInput = removeArrayInput.replace("(", '');
let removePar2Input = removeParInput.replace(")", '');
let withoutSpaceInput = removePar2Input.trim();
let withoutArrowInput = withoutSpaceInput.replace(/\=&gt;/g,'')

let breakLineInput = withoutArrowInput.split("\n").length;

for(i = 0; i < breakLine; i++){
    withoutArrowInput = withoutArrowInput.replace('[' + i + ']', '');
    withoutArrowInput = withoutArrowInput.replace("\n", '');

    if(i == 0){
        withoutArrowInput = withoutArrowInput.replace("  ", '');
    }

    withoutArrowInput = withoutArrowInput.replace("      ", ';');
}

let newArrayInput = withoutArrowInput.split(";");

let inputs = newArrayInput;

let entradaValues = [];
let saidaValues = [];


for(let i = 0; i < inputs.length; i++){
    if(inputs[i] == '*'){
        entradaValues.push(values[i]);
    }
    else{
        saidaValues.push(values[i]);
    }
}

inputs.unshift(0);
entradaValues.unshift(0);
saidaValues.unshift(0);

console.log("entrada: " + entradaValues);
console.log("saida: " + saidaValues);

let $date = document.querySelector(".date").innerHTML;

let arraydates = [];

let removeArraydate = $date.replace("Array", '');
let removePardate = removeArraydate.replace("(", '');
let removePar2date = removePardate.replace(")", '');
let withoutSpacedate = removePar2date.trim();
let withoutArrowdate = withoutSpacedate.replace(/\=&gt;/g,'')

let breakLinedate = withoutArrowdate.split("\n").length;

for(i = 0; i < breakLine; i++){
    withoutArrowdate = withoutArrowdate.replace('[' + i + ']', '');
    withoutArrowdate = withoutArrowdate.replace("\n", '');

    if(i == 0){
        withoutArrowdate = withoutArrowdate.replace("  ", '');
    }

    withoutArrowdate = withoutArrowdate.replace("      ", ';');
}

let newArraydate = withoutArrowdate.split(";");

let dates = newArraydate;
let year = []

for(let k = 0; k < dates.length; k++){
    let res = dates[k].split('-');
    year.push(res[0]);
}
  
year.unshift(0);
