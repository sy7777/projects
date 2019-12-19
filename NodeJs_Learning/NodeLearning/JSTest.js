const person = {
    name: "Godfery",
    age: 35
};
// JS对象深克隆,先变为Jason对象，在转变为JS对象
const p = JSON.parse(JSON.stringify(person));

p.name = "Gao";
// console.log(p);
// console.log(person);

const personList = []; //new Arrary(5)
personList.push(person);
personList.push(p);

// 普通for循环
for (let i = 0; i < personList.length; i++){
    console.log(personList[i]);
}

//better for loop, ele in -> index
for (const ele in personList){
    console.log(ele);
}

//for loop, ele in -> item
for (const ele of personList) {
    console.log(ele);
}

//ES6 loop
personList.forEach((item, index) => {
    console.log(`INDEX ${index} ITEM ${item}`);
    if (item.name === "Gao"){
        personList.splice(index, 1);
    }

} )
console.log(personList);

let i = 0;
while (i < 10){
    // console.log(i++);
    console.log("-------");
    console.log(++i);

}

let name = "BD";
switch (name){
    case "BD":
        console.log("BDNMSL");
        break;
    case "Google":
        console.log("ni");
        break;
    default:
        console.log("cannot find");
        break;


}


function exception(){
    try{
        console.log(a);
    }catch(e){
        console.log(e.message);
    }
    
}

exception();
console.log("Godfrey");