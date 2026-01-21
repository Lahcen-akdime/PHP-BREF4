function toggleFields(type) {
    const fieldAvocat = document.getElementById('field-avocat');
    const fieldHuissier = document.getElementById('field-huissier');
    
    if (type === 'avocat') {
        fieldAvocat.style.display = 'block';
        fieldHuissier.style.display = 'none';
        // On peut aussi ajouter une classe "active" sur la box si nécessaire
    } else {
        fieldAvocat.style.display = 'none';
        fieldHuissier.style.display = 'block';
    }
}