
function openSearchModal() {
    document.getElementById("searchModal").style.display = "flex";
    document.getElementById("searchInput").focus(); // Active le focus du curseur
}

function closeSearchModal() {
    document.getElementById("searchModal").style.display = "none";
}

function validateSearchForm() {
    const query = document.getElementById('searchInput').value.trim();
    const category = document.getElementById('categorySelect').value.trim();

    if (query === '' && category === '') {
        alert("Veuillez entrer un mot-clé ou choisir une catégorie.");
        return false; // Empêche la soumission du formulaire
    }
    
    return true; // Permet la soumission du formulaire si tout va bien
}