const deleteImageAjax = (id) => {
    axios.delete('/admin/book-images/' + id)
        .then((response) => {
            document.getElementById('bookImageWrapper').style.display = 'none';
        })
        .catch((error) => {
            console.log(error);
        });
}
