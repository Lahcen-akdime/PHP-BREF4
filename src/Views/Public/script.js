

// _ _____ _____ search part ____ ______ ______ //

let search = document.getElementById("searchInput");
let rosterPlase = document.getElementsByClassName("roster-grid")[0]; 
search.addEventListener("input",async function (){
rosterPlase.innerHTML=``;
let array = await searched(search.value);
for (let index = 0; index < array.length; index++) {
rosterPlase.innerHTML+=`
<div class='roster-card'>
                <div class='card-header'>
                    <div class='card-avatar'>AV</div>
                    <div class='card-title-section'>
                        <h3>${array[index]['name']}</h3>
                        <p>${array[index]['specialite']}</p>
                    </div>
                </div>
                <div class='card-details'>
                    <div class='detail-row'>
                        <span class='detail-label'>Expérience</span>
                        <span class='detail-value'>${array[index]['Annes_dex']} ans</span>
                    </div>
                    <div class='detail-row'>
                        <span class='detail-label'>Localisation</span>
                        <span class='detail-value'>${array[index]['ville_id']}</span>
                    </div>
                    <span class='consultation-badge consultation-yes'>${array[index]['consultation_en_ligne']}</span>
                </div>
                <div class='card-actions'>
                    <a href='editAvocat&id=${array[index]['id']}'><button type='button' class='btn btn-edit'>Edit</button></a>
                    <a href='DeleteAvocat&id=${array[index]['id']}'><button type='button' class='btn btn-delete'>Delete</button></a>
                </div>
            </div> 
`;    
}
});
async function searched (name){
 let response = await fetch("http://localhost/ISTICHARA/json&search="+name);
 let data = await response.json ();
 return data ;
}





// _ _____ _____ filter part ____ ______ ______ //

let filter = document.getElementById("specialityFilter");
filter.addEventListener("change", async function (){
rosterPlase.innerHTML=``;
let data = await filterBy(filter.value);
for (let index = 0; index < data.length; index++) {
rosterPlase.innerHTML+=`
<div class='roster-card'>
                <div class='card-header'>
                    <div class='card-avatar'>AV</div>
                    <div class='card-title-section'>
                        <h3>${data[index]['name']}</h3>
                        <p>${data[index]['specialite']}</p>
                    </div>
                </div>
                <div class='card-details'>
                    <div class='detail-row'>
                        <span class='detail-label'>Expérience</span>
                        <span class='detail-value'>${data[index]['Annes_dex']} ans</span>
                    </div>
                    <div class='detail-row'>
                        <span class='detail-label'>Localisation</span>
                        <span class='detail-value'>${data[index]['ville_id']}</span>
                    </div>
                    <span class='consultation-badge consultation-yes'>${data[index]['consultation_en_ligne']}</span>
                </div>
                <div class='card-actions'>
                    <a href='editAvocat&id=${data[index]['id']}'><button type='button' class='btn btn-edit'>Edit</button></a>
                    <a href='DeleteAvocat&id=${data[index]['id']}'><button type='button' class='btn btn-delete'>Delete</button></a>
                </div>
            </div> 
`;    
}

})

async function filterBy (specialite){
 let response = await fetch("http://localhost/ISTICHARA/json&filter="+specialite);
 let data = await response.json();
 return data ;
}
