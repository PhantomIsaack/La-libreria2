function addToFavorites(bookId) {
  
    if (!isLoggedIn) {
        alert("Debes iniciar sesión para agregar libros a favoritos.");
        window.location.href = "login.php"; 
        return;
    }

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "agregar_favorito.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.send("book_id=" + bookId);

    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            alert(xhr.responseText); 
        }
    };
}
