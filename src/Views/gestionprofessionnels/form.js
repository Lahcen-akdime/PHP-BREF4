document.addEventListener("DOMContentLoaded", () => {

    const Spesialete = document.getElementById("selectSpesialete");
    const Typesdactes = document.getElementById("selectTypesdactes");
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
    const step4 = document.getElementById("card-profil");
    const btnvalidation = document.getElementById("btnvalidation");

    // les div

    const nameafficher = document.getElementById("nameafficher");
    const emailafficher = document.getElementById("emailafficher");
    const anneExperienceafficher = document.getElementById("anneExperienceafficher");
    const Tarifafficher = document.getElementById("Tarifafficher");
    const typeacteafficher = document.getElementById("typeacteafficher");
    const villeafficher = document.getElementById("villeafficher");
    const Consultationafficher = document.getElementById("Consultationafficher");
    //ok





    btnAvocat.addEventListener("click", () => {
        // alert("click");
        Spesialete.style.display = "flex";
        Typesdactes.style.display = "none";
    });

    btnHuissier.addEventListener("click", () => {
        // alert("click");
        Typesdactes.style.display = "flex";
        Spesialete.style.display = "none";

    });

    btn1.addEventListener("click", () => {
        // if (!step1valide()) { return };

        step1.style.display = "none";
        step2.style.display = "block";
        step3.style.display = "none";
        step4.style.display = "none";


    });

    btn2.addEventListener("click", () => {
        if (!step2valide()) {
            return
        };
        step1.style.display = "none";
        step2.style.display = "none";
        step3.style.display = "block";
        step4.style.display = "none";

    });







    // btn3.addEventListener("click", () => {
    //     if (!step3valide()) { return }
    //     step1.style.display = "none";
    //     step2.style.display = "none";
    //     step3.style.display = "none";
    //     step4.style.display = "block";
    // });

    btnvalidation.addEventListener("click", () => {
        if (!step3valide()) return;

        afficher();

        step1.style.display = "none";
        step2.style.display = "none";
        step3.style.display = "none";
        step4.style.display = "block";
    });


    btnRetour1.addEventListener("click", () => {
        step2.style.display = "none";
        step1.style.display = "block";
        step3.style.display = "none";
        step4.style.display = "none";

    });

    btnRetour2.addEventListener("click", () => {
        step2.style.display = "block";
        step1.style.display = "none";
        step3.style.display = "none";
        step4.style.display = "none";
    })










    function step1valide() {
        const Nom = document.getElementById("Nom").value;
        const Email = document.getElementById("Email").value;

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
            alert("Veuillez remplir tous les champs");
            return false;
        }
        return true;
    }
})



function afficher() {

    const name = document.getElementById("Nom").value;
    const email = document.getElementById("Email").value;
    const anneExperience = document.getElementById("annees_experience").value;
    const tarif = document.getElementById("Tarif").value;
    const specialite = document.getElementById("selectSpesialete").value;
    const typeacte = document.getElementById("selectTypesdactes").value;
    const ville = document.getElementById("Ville").value;

    let consultation = "";
    if (document.getElementById("conseltationOui").checked) {
        consultation = "Oui";
    } else if (document.getElementById("conseltationNon").checked) {
        consultation = "Non";
    }

    document.getElementById("nameafficher").innerText = name;
    document.getElementById("emailafficher").innerText = email;
    document.getElementById("anneExperienceafficher").innerText = anneExperience;
    document.getElementById("Tarifafficher").innerText = tarif;
    document.getElementById("specialiteafficher").innerText = specialite;
    document.getElementById("typeacteafficher").innerText = typeacte;
    document.getElementById("villeafficher").innerText = ville;
    document.getElementById("Consultationafficher").innerText = consultation;
}


