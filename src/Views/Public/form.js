document.addEventListener("DOMContentLoaded", () => {
    // const Spesialete = document.getElementById("selectSpesialete");
    // const Types_dactes = document.getElementById("selectTypesdactes");
    const btn1 = document.getElementById("btn1");
    const btn2 = document.getElementById("btn2");
    const btn3 = document.getElementById("btn3");
    const step1 = document.getElementById("step1");
    const step2 = document.getElementById("step2");
    const step3 = document.getElementById("step3");
    const btnHuissier = document.getElementById("btnHuissier");
    const btnAvocat = document.getElementById("btnAvocat");
    const btnRetour1 = document.getElementById("btnRetour1");
    const btnRetour2 = document.getElementById("btnRetour2");


    btn1.addEventListener("click", () => {
        if (!step1valide()) { return };

        step1.style.display = "none";
        step2.style.display = "block";
        step3.style.display = "none";
    });

    btn2.addEventListener("click", () => {
        if (!step2valide()) {
            return
        };
        step1.style.display = "none";
        step2.style.display = "none";
        step3.style.display = "block";
    });

    btn3.addEventListener("click", () => {
        if (!step3valide()) { return }
        step1.style.display = "block";
        step2.style.display = "none";
        step3.style.display = "none";
    });

    btnAvocat.addEventListener("click", () => {
        // alert("click")
        Spesialete.style.display = "flex";
        Types_dactes.style.display = "none";
    });

    btnHuissier.addEventListener("click", () => {
        // alert("click")
        Types_dactes.style.display = "flex";
        Spesialete.style.display = "none";
    });

    btnRetour1.addEventListener("click", () => {
        step2.style.display = "none";
        step1.style.display = "block";
        step3.style.display = "none";
    });

    btnRetour2.addEventListener("click", () => {
        step2.style.display = "block";
        step1.style.display = "none";
        step3.style.display = "none";
    })
})

function step1valide() {
    const Nom = document.getElementById("Nom").value.trim();
    const Email = document.getElementById("Email").value.trim();

    if (Nom === "" || Email === "") {
        alert("Veuillez remplir Nom et Email");
        return false;
    }
    return true;
}

function step2valide() {
    const Tarif = document.getElementById("Tarif").value;
    const annees_experience = document.getElementById("annees_experience").value;
    const selectSpesialete = document.getElementById("selectSpesialete").value;
    const selectTypesdactes = document.getElementById("selectTypesdactes").value;

    if (annees_experience === "" || Tarif === "") {
        alert("Veuillez remplir annees_experience et selectSpesialete");
        return false;
    }
    return true;
}

function step3valide() {
    const Ville = document.getElementById("Ville").value;
    const file = document.getElementById("file").value;

    const conseltationNon = document.getElementById("conseltationNon").checked;
    const conseltationOui = document.getElementById("conseltationOui").checked;
    if (file === "" || Ville === "" || (!conseltationNon && !conseltationOui)) {
        error;
        return false;
    }
    return true;
}










