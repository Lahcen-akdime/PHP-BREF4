

// _ _____ _____ search part ____ ______ ______ //

let search = document.getElementById("searchInput");
let rosterPlase = document.getElementsByClassName("roster-grid")[0]; 
search.addEventListener("input",async function (){
rosterPlase.innerHTML=``;
let array = await searched(search.value);
console.log(array);
array.forEach(element => {
   rosterPlase.innerHTML+=`
   
   `; 
});
})

async function searched (name){
 let response = await fetch("http://localhost/ISTICHARA/json&search="+name);
 let data = await response.json ();
 return data ;
}


























// _ _____ _____ filter part ____ ______ ______ //

let filter = document.getElementById("specialityFilter");
filter.addEventListener("change",function (){
let data = filterBy(filter.value);
document.getElementById("test").innerHTML=`${data}`;
})

async function filterBy (name){
 let response = await fetch("http://localhost/ISTICHARA/json&filter="+name);
 let data = await response.json();
 return data ;
}
