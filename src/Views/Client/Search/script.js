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
                <button class="btn btn-edit" onclick="openBookingModal(${item.id})">Prendre RDV</button>
            </div>
        </div>
        `;
    container.innerHTML += card;
  });
}
performSearch();

async function openBookingModal(id) {
    const url = `index.php?page=client&action=getAvailability&id=${id}`;
    
    try {
        const response = await fetch(url);
        const disponibilite = await response.json(); 
        
        showModal(disponibilite, id);
    } catch (error) {
        console.error("Error fetching availability:", error);
    }
}


let calendarState = {
    currentDate: new Date(),
    selectedDate: null,
    selectedStartTime: null,
    selectedEndTime: null,
    schedule: {},
    proId: null
};

function showModal(data, proId) {
    let schedule = data;
    if (typeof data === 'string') {
        try { schedule = JSON.parse(data); } catch (e) { schedule = {}; }
    }
    calendarState.schedule = {};
    for (let key in schedule) {
        calendarState.schedule[key.toLowerCase()] = schedule[key];
    }
    calendarState.proId = proId;
    calendarState.selectedDate = null;
    calendarState.selectedStartTime = null;
    calendarState.selectedEndTime = null;
    console.log(calendarState);
    

    const modal = document.getElementById('booking-modal');
    modal.innerHTML = `
        <div class="modal-content calendar-modal">
            <div class="calendar-wrapper">
                <div class="calendar-navigation">
                    <button class="nav-btn" onclick="changeMonth(-1)">&#10094;</button>
                    <div id="calendar-header-left" class="month-title"></div>
                    <div id="calendar-header-right" class="month-title"></div>
                    <button class="nav-btn" onclick="changeMonth(1)">&#10095;</button>
                </div>
                
                <div class="months-container">
                    <div id="month-left" class="month-grid"></div>
                    <div id="month-right" class="month-grid"></div>
                </div>

                <div id="slots-area" class="slots-area" style="display:none;">
                    <h4>Horaires disponibles pour le <span id="selected-date-display"></span></h4>
                    <div id="time-slots-grid" class="time-slots-grid"></div>
                </div>

                <div class="modal-footer">
                    <button class="btn-cancel" onclick="closeModal()">Annuler</button>
                    <button id="btn-validate" class="btn-validate" onclick="submitBooking()" disabled>Valider</button>
                </div>
            </div>
        </div>
    `;
    
    modal.style.display = 'flex';
    renderDualCalendar();
}

function renderDualCalendar() {
    const today = new Date();
    const dateLeft = new Date(calendarState.currentDate);
    dateLeft.setDate(1);
    console.log(dateLeft)
    const dateRight = new Date(dateLeft);
    dateRight.setMonth(dateRight.getMonth() + 1);
    console.log(dateRight)

    document.getElementById('calendar-header-left').innerText = 
        dateLeft.toLocaleDateString('fr-FR', { month: 'long', year: 'numeric' });
    
    document.getElementById('calendar-header-right').innerText = 
        dateRight.toLocaleDateString('fr-FR', { month: 'long', year: 'numeric' });

    renderMonthGrid(dateLeft, 'month-left');
    renderMonthGrid(dateRight, 'month-right');
}

function renderMonthGrid(dateObj, containerId) {
    const container = document.getElementById(containerId);
    container.innerHTML = '';

    const days = ['H','Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam', 'Dim'];
    
    const headerRow = document.createElement('div');
    headerRow.className = 'calendar-row header-row';
    for(let i=1; i<=7; i++) {
        const d = document.createElement('div');
        d.className = 'cal-cell header-cell';
        d.innerText = days[i] || days[0];
        headerRow.appendChild(d);
    }
    container.appendChild(headerRow);

    const year = dateObj.getFullYear();
    const month = dateObj.getMonth();
    
    const firstDayInstance = new Date(year, month, 1);
    let startDay = firstDayInstance.getDay(); 
    if (startDay === 0) startDay = 7; 

    const daysInMonth = new Date(year, month + 1, 0).getDate();

    const gridDiv = document.createElement('div');
    gridDiv.className = 'calendar-grid';

    for (let i = 1; i < startDay; i++) {
        const empty = document.createElement('div');
        empty.className = 'cal-cell empty';
        gridDiv.appendChild(empty);
    }

    const daysEn = ['sunday','monday','tuesday','wednesday','thursday','friday','saturday'];

    for (let d = 1; d <= daysInMonth; d++) {
        const currentCheck = new Date(year, month, d);
        const dayName = daysEn[currentCheck.getDay()];
        const dateStr = currentCheck.toISOString().split('T')[0];
        
        const cell = document.createElement('div');
        cell.className = 'cal-cell day-cell';
        cell.innerText = d;

        const daySlots = calendarState.schedule[dayName];
        
        if (daySlots && daySlots.length > 0 && currentCheck >= new Date().setHours(0,0,0,0)) {
            cell.classList.add('available');
            cell.onclick = () => onDateSelect(dateStr, daySlots, cell);
            
            if (calendarState.selectedDate === dateStr) {
                cell.classList.add('selected');
            }
        } else {
            cell.classList.add('disabled');
        }

        gridDiv.appendChild(cell);
    }
    container.appendChild(gridDiv);
}

function changeMonth(delta) {
    calendarState.currentDate.setMonth(calendarState.currentDate.getMonth() + delta);
    renderDualCalendar();
}

function onDateSelect(dateStr, slots, cellElement) {
    document.querySelectorAll('.day-cell').forEach(el => el.classList.remove('selected'));
    cellElement.classList.add('selected');
    
    calendarState.selectedDate = dateStr;
    calendarState.selectedStartTime = null;
    calendarState.selectedEndTime = null;
    document.getElementById('btn-validate').disabled = true;

    const area = document.getElementById('slots-area');
    const display = document.getElementById('selected-date-display');
    const grid = document.getElementById('time-slots-grid');
    
    area.style.display = 'block';
    display.innerText = new Date(dateStr).toLocaleDateString('fr-FR', {weekday:'long', day:'numeric', month:'long'});
    grid.innerHTML = '';

    slots.forEach(range => {
        let start = new Date(`2000-01-01T${range.start}`);
        const end = new Date(`2000-01-01T${range.end}`);
        
        while(start < end) {
            const timeVal = start.toLocaleTimeString('fr-FR', {hour:'2-digit', minute:'2-digit'});
            
            const btn = document.createElement('button');
            btn.className = 'time-slot-pill';
            btn.innerText = timeVal;
            btn.onclick = () => onTimeSelect(timeVal, btn);
            grid.appendChild(btn);
            
            start.setMinutes(start.getMinutes() + 30);
        }
    });
}

function onTimeSelect(time, btn) {
    if (!calendarState.selectedStartTime || (calendarState.selectedStartTime && calendarState.selectedEndTime)) {
        calendarState.selectedStartTime = time;
        calendarState.selectedEndTime = null;
    } else {
        if (time < calendarState.selectedStartTime) {
            calendarState.selectedStartTime = time;
        } else if (time > calendarState.selectedStartTime) {
            calendarState.selectedEndTime = time;
        }
    }
    updateTimeSlotVisuals();
    
    const isValid = calendarState.selectedStartTime && calendarState.selectedEndTime;
    document.getElementById('btn-validate').disabled = !isValid;
}

function updateTimeSlotVisuals() {
    const pills = document.querySelectorAll('.time-slot-pill');
    const start = calendarState.selectedStartTime;
    const end = calendarState.selectedEndTime;

    pills.forEach(p => {
        const time = p.innerText;
        p.classList.remove('active');
        
        if (start && !end) {
            if (time === start) p.classList.add('active');
        } else if (start && end) {
            if (time >= start && time <= end) p.classList.add('active');
        }
    });
}

async function submitBooking() {
    if(!calendarState.selectedDate || !calendarState.selectedStartTime || !calendarState.selectedEndTime) return;

    const startDateTime = `${calendarState.selectedDate} ${calendarState.selectedStartTime}`;
    const endDateTime = `${calendarState.selectedDate} ${calendarState.selectedEndTime}`;
    
    const btn = document.getElementById('btn-validate');
    btn.innerText = "Traitement...";
    btn.disabled = true;

    try {
        const response = await fetch('index.php?page=demandes&action=store', {
            method: 'POST',
            headers: {'Content-Type': 'application/json'},
            body: JSON.stringify({
                client_id: 1, 
                professionel_id: calendarState.proId,
                start_datetime: startDateTime,
                end_datetime: endDateTime
            })
        });

        const result = await response.json();
        if(result.success) {
            alert("Rendez-vous confirmé avec succès!");
            closeModal();
        } else {
            alert("Erreur: " + result.message);
            btn.innerText = "Valider";
            btn.disabled = false;
        }
    } catch(e) {
        console.error(e);
        alert("Erreur de connexion.");
        btn.innerText = "Valider";
        btn.disabled = false;
    }
}

function closeModal() {
    const modal = document.getElementById('booking-modal');
    if(modal) modal.style.display = 'none';
}
