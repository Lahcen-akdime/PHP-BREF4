function toggleFilters() {
  const role = document.getElementById("role").value;
  const specGroup = document.getElementById("specialite-group");
  const typeGroup = document.getElementById("type-acte-group");

  if (role === "avocat") {
    specGroup.style.display = "block";
    typeGroup.style.display = "none";
  } else {
    specGroup.style.display = "none";
    typeGroup.style.display = "block";
  }
}

async function performSearch() {
  const role = document.getElementById("role").value;
  const keyword = document.getElementById("keyword").value;
  const ville = document.getElementById("ville").value;

  let extraParam = "";
  if (role === "avocat") {
    const spec = document.getElementById("specialite").value;
    if (spec) extraParam = `&specialite=${spec}`;
  } else {
    const type = document.getElementById("type_acte").value;
    if (type) extraParam = `&specialite=${type}`;
  }

  const url = `index.php?page=client&action=search&role=${role}&search=${encodeURIComponent(keyword)}&ville=${ville}${extraParam}`;

  try {
    const response = await fetch(url);
    const data = await response.json();
    renderResults(data, role);
  } catch (error) {
    console.error("Error:", error);
  }
}

function renderResults(data, role) {
  const container = document.getElementById("results");
  container.innerHTML = "";

  if (data.length === 0) {
    container.innerHTML =
      '<div class="no-results">Aucun professionnel trouvé.</div>';
    return;
  }

  data.forEach((item) => {
    const isOnline = item.consultation_en_ligne;
    let subtitle =
      role === "avocat"
        ? item.specialite || "Avocat"
        : item.types_actes || "Huissier";
    subtitle = subtitle.replace(/_/g, " ");

    const card = `
        <div class="roster-card">
            <div class="card-header">
                <div class="card-avatar">${role === "avocat" ? "AV" : "HU"}</div>
                <div class="card-title-section">
                    <h3>${item.name}</h3>
                    <p>${subtitle}</p>
                </div>
            </div>
            <div class="card-details">
                <div class="detail-row">
                    <span class="detail-label">Expérience</span>
                    <span class="detail-value">${item.Annes_dex || item.annes_dex || 0} ans</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Localisation</span>
                    <span class="detail-value">${item.ville_name || "Ville Inconnue"}</span> 
                </div>
                <span class="consultation-badge ${isOnline ? "consultation-yes" : "consultation-no"}">
                    ${isOnline ? "✓ Consultation En Ligne" : "✖️ Pas de consultation"}
                </span>
            </div>
            <div class="card-actions">
                <button class="btn btn-edit">Prendre RDV</button>
            </div>
        </div>
        `;
    container.innerHTML += card;
  });
}
performSearch();
